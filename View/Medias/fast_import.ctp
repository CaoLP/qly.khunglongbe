<div class="bloc">
    <div class="content">
		<div id="plupload">
		    <div id="droparea" href="#">
		    	<p><?php echo __d('media',"Déplacer les fichiers ici"); ?></p>
		    	<?php echo __d('media',"ou"); ?><br/>
		    	<a id="browse" href="#"><?php echo __d('media',"Parcourir"); ?></a>
		    	<p class="small">(<?php echo __d('media','%s seulement',implode(', ', $extensions)); ?>)</p>
		    </div>
		</div>
		<table class="head" cellspacing="0">
			<thead>
				<tr>
					<th style="width:55%"><?php echo __d('media',"Médias"); ?></th>
					<th style="width:20%"> &nbsp; </th>
					<th style="width:25%"><?php echo __d('media',"Actions"); ?></th>
				</tr>
			</thead>
		</table>
		<div id="filelist">
			<?php echo $this->Form->create('Media',array('url'=>array('controller'=>'medias','action'=>'order'))); ?>
			<?php foreach($medias as $media): $media = current($media);  ?>
				<?php require('media.ctp'); ?>
			<?php endforeach; ?>
			<?php echo $this->Form->end(); ?>
		</div>

    </div>
</div>

<?php $this->Html->script('jquery.form.js',array('inline'=>false)); ?>
<?php $this->Html->script('plupload.js',array('inline'=>false)); ?>
<?php $this->Html->script('plupload.html5.js',array('inline'=>false)); ?>
<?php $this->Html->script('plupload.flash.js',array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline'=>false)); ?>


jQuery(function(){
	$( "#filelist>form" ).sortable({
		update:function(){
			i = 0;
			$('#filelist>form>div').each(function(){
				i++;
				$(this).find('input').val(i);
			});
			$('#MediaIndexForm').ajaxSubmit();
		}
	});

	var theFrame = $("#medias-<?php echo $ref; ?>-<?php echo $ref_id; ?>", parent.document.body);
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash',
		container: 'plupload',
		browse_button : 'browse',
		max_file_size : '50mb',
		flash_swf_url : '<?php echo Router::url('/media/js/plupload.flash.swf'); ?>',
		url : '<?php echo Router::url(array('controller'=>'medias','action'=>'upload',$ref,$ref_id,'editor'=>$editor,'?' => "id=$id")); ?>',
		 filters : [
			{title : "Accepted files", extensions : "<?php echo implode(',', $extensions); ?>"},
		],
		drop_element : 'droparea',
		multipart:true,
		urlstream_upload:true
	});

	uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
		for (var i in files) {
			$('#filelist>form').prepend('<div class="item" id="' + files[i].id + '">&nbsp; &nbsp;' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <div class="progressbar"><div class="progress"></div></div></div>');
		}
		uploader.start();
		$('#droparea').removeClass('dropping');
		theFrame.css({ height:$('body').height() + 40 });

	});

	uploader.bind('UploadProgress', function(up, file) {
		$('#'+file.id).find('.progress').css('width',file.percent+'%')
	});

	uploader.bind('FileUploaded', function(up, file, response){
		var response = jQuery.parseJSON(response.response);
		if(response.error){
			alert(response.error)
		}else{
			$('#'+file.id).before(response.content);
		}
		$('#'+file.id).remove();
	});
	uploader.bind('Error',function(up, err){
		alert(err.message);
		$('#droparea').removeClass('dropping');
		uploader.refresh();
	});
	$('#droparea').bind({
       dragover : function(e){
           $(this).addClass('dropping');
       },
       dragleave : function(e){
           $(this).removeClass('dropping');
       }
	});

	$('a.del').live('click',function(e){
		e.preventDefault();
		elem = $(this);
		if(confirm('<?php echo __d('media',"Voulez vous vraiment supprimer ce média ?"); ?>')){
			$.post(elem.attr('href'),{},function(data){
				elem.parents('.item').slideUp();
			});
		}
		theFrame.animate({ height:theFrame.height() - 40 });
	});

	$('a.toggle').live('click',function(e){
		e.preventDefault();
		var a = $(this);
		var height = a.parent().parent().find('.expand').outerHeight();
		if(a.text() == '<?php echo __d('media', "Afficher"); ?>'){
			a.text('<?php echo __d('media', "Cacher"); ?>');
			a.parent().parent().animate({
				height : 40 + height
			});
			theFrame.animate({
				height : theFrame.height() + height
			});
		}else{
			a.text('<?php echo __d('media', "Afficher"); ?>');
			a.parent().parent().animate({
				height : 40
			});
			theFrame.animate({
				height : theFrame.height() - height
			});
		}
	});

	theFrame.height($(document.body).height() + 50);

	<?php if($editor): ?>
		$('a.submit').live('click', function(){
			var $this = $(this);
			var html = createHtmlElement($this);
			var editor = '<?php echo $editor; ?>';
			var win = window.dialogArugments || opener || parent || top;
			win.send_to_<?php echo $editor; ?>(html, window, "<?php echo $id; ?>");
			return false;
		});

		function createHtmlElement($this) {
			var item = $this.parents('.item');
			var type = $('.filetype', item).val();
			if(type === 'pic') {

				var html = '<img src="'+$('.file', item).val()+'"';
				if( $('.alt', item).val() != '' ){
					html += ' alt="'+$('.alt', item).val()+'"';
				}
				if( $('.align:checked', item).val() != 'none' ){
					html += ' class="align'+$('.align:checked', item).val()+'"';
				}
				html += ' />';
				if( $('.href', item).val() != '' ){
					html = '<a href="'+$('.href', item).val()+'" title="'+$('.title', item).val()+'">'+html+'</a>';
				}
			} else {
				html = '<a href="'+$('.href', item).val()+'" title="'+$('.title', item).val()+'">' + $('.title', item).val() + '</a>';
			}
			return html;
		}

	<?php endif; ?>
});

<?php $this->Html->scriptEnd(); ?>
