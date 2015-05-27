<?php $sizes = getimagesize(WWW_ROOT.trim($media['file'], '/'));  ?>

<div class="item col-md-3 thumbnail">

		<input type="hidden" value="<?php echo $media['position']; ?>" name="data[Media][<?php echo $media['id']; ?>]">

		<div class="visu"><?php echo $this->Html->image($media['icon'],array('class'=>'img-responsive')); ?></div>

		<div class="actions">
			<?php echo $this->Html->link(__d('media',"Supprimer"),array('action'=>'delete',$media['id']),array('class'=>'del btn btn-sm btn-danger')); ?>
		</div>
</div>