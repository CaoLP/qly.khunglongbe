$isloading = false;
$(function () {
    $(".tree a").on('click', function () {
        if($isloading) { alert('Đang load dữ liệu xin đợi một xíu'); return false;}
        var cate_id = $(this).data('id');
        var not_in = [];
        $("#product_promote_list .p-media").each(function(i,v){
            not_in.push($(v).data('id'));
        });
        $.ajax({
            url : product_not_inpromote,
            type: 'post',
            data : {
                category_id : cate_id ,
                promote_id: $('#promote_id').val(),
                not_in : not_in
            },
            beforeSend: function () {
                $isloading = true;
                $('#product_list').html("<div class='loading'>Loading...</div>");
            },
            success : function(data){
                $isloading = false;
                $('#product_list').html(data);
            }
        });
    });

});
function add_item(id){
    $("#product_" + id + " .plugs").addClass('hidden');
    $("#product_" + id + " .minus").removeClass('hidden');
    $("#product_" + id).appendTo($("#product_promote_list"));
}
function remove_item(id){
    $("#product_" + id + " .minus").addClass('hidden');
    $("#product_" + id + " .plugs").removeClass('hidden');
    $("#product_" + id).appendTo($("#product_list"));
}
function add_all(){
    $("#product_list .p-media").each(function(i,v){
        add_item($(v).data('id'));
    });
}
function save_data(){
    var products = [];
    var promote_id = $('#promote_id').val();
    $("#product_promote_list .p-media").each(function(i,v){
        products.push($(v).data('id'));
    });
    $.ajax({
        url : saved,
        type: 'post',
        data : {
            promote_id: promote_id,
            products : products
        },
        success : function(data){
            if(data == 1){
                location.href = index;
            }
        }
    });
}