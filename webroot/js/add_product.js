var id=0;
$(function () {
    $('#get-gallery').popup({
        opacity: 0.3,
        transition: 'all 0.3s',
        beforeopen : function(){
            var data = [];
            $('.product-group li.list-group-item input[type=checkbox]').each(function (i, v) {
                data.push($(v).val());
            });
            $('#group-name').val('');
            $.ajax({
                url : gallery,
                data : {not_in :data},
                success : function(data){
                    $('.product-gallery').html(data);
                }
            });
        }
    });
    $(document).on('click','#add-btn',function(){
        $('#get-gallery').popup('show');
    });
    $('#close-gallery').on('click',function(){
        $('#get-gallery').popup('hide');
    });

    $('#accept-gallery').on('click',function(){
        var uuid =  $('#uuid').val();
        var group_name = $('#group-name').val();
        if($('#get-gallery input:checked').length > 0){
            var template = '<li class="list-group-item" id="item-'+uuid+'">'
                +'<div class="form-group">'
                +'<label>Tên nhóm</label>'
                +'<input class="form-control" name="group['+uuid+'][name]" value="'+group_name+'" placeholder="Tên nhóm">'
                +'</div>'
                +'<div class="form-group">'
                +'<ul class="sub-gallery">';
            var img_list = '';
            $('#get-gallery input:checked').each(function(){
                var id = $(this).val();
                img_list += '<li>';
                img_list += $('#img-' + id).html();
                img_list += '</li>';
                $('#img-' + id).remove();
            });
            template += img_list + '</ul>'
                +'</div>'
                +'</li>';
            $('.product-group').append(template);
            $('.product-group input[type=checkbox]').attr('checked','checked').attr('onclick','return false;');
        }
        $('#get-gallery').popup('hide');
    });
});
