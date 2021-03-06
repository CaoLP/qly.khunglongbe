$(function () {
    $('.currency').maskMoney({thousands: ',', decimal: '.', 'precision': 0, allowZero: false, suffix: ' VNĐ'}).focus();

    $("#wareHouseModal").on("show.bs.modal", function (e) {
        var link = $(this).data('href');
        var body = $(this).find(".modal-body");
        $.ajax(
            {
                url: link,
                success: function (data) {
                    body.html(data);
                    setUpFormAjax($(body).find('form'), body);
                    $('.currency').maskMoney({thousands: ',', decimal: '.', 'precision': 0, allowZero: false, suffix: ' VNĐ'}).focus();
                }
            }
        );
    });

    $('.option-checkbox').each(function () {
        var id = $(this).val();
        if ($(this).is(':checked')) {
            $('.parent-' + id).each(function () {
                $(this).closest('.icheckbox_flat').addClass('checked');
                $(this).attr('checked', 'checked');
            })
        } else {
            $('.parent-' + id).each(function () {
                $(this).closest('.icheckbox_flat').removeClass('checked');
                $(this).removeAttr('checked');
            })
        }
    });

    $('.checkbox ins, .checkbox label').on('click', function () {
        var input = $(this).parent().find('.option-checkbox');
        var id = input.val();
        if (input.is(':checked')) {
            $('.parent-' + id).each(function () {
                $(this).closest('.icheckbox_flat').addClass('checked');
                $(this).attr('checked', 'checked');
            })
        } else {
            $('.parent-' + id).each(function () {
                $(this).closest('.icheckbox_flat').removeClass('checked');
                $(this).removeAttr('checked');
            })
        }
    });

    $(document).on('change', '#WarehouseProductId', function () {
        if ($(this).val()) {
            var href = $('#warehouse-options').data('href');
            $('#warehouse-options').load(href + '/' + $(this).val(), function () {
                $('#warehouse-options input').iCheck({checkboxClass: 'icheckbox_flat'});
            });
        } else {
            $('#warehouse-options').html('');
        }
    });
    $(document).on('keydown', '*[data-type=number]', function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(document).on('click', '#more-option', function () {
        var render = true;
        $('.options select').each(function(index){
            if($(this).val() == '') {
                alert('Vui lòng hoàn chọn xong các thuôc tính');
                render = false;
                return false;
            }
        });
        if(render){
        var uId = new Date().getTime() + Math.round(Math.random());
        var template = $('#template').html();
        template = template.replace(/{{no}}/g, uId);
        template = template.replace(/disabled/g, '');
        $('#warehouse-options .list-group').append(template);
        }

    });
    var lastSel;
    $(document).on('click', '.options select', function (e) {
        lastSel = $(this).find('option:selected');
    });
    $(document).on('change', '.options select', function (e) {
        var curVals = $(this).closest('.options').find('select').map(function () {
            return this.value;
        }).get().join(',');
        $('.options').each(function(index){
            var vals = $(this).find('select').map(function () {
                return this.value;
            }).get().join(',');
            if(index < $('.options').length -1){
                console.log(vals);
                if(vals == curVals){
                    alert('Thuộc tính này đã được chọn rồi');
                    lastSel.attr("selected", true);
                }
            }
        });
    });
    $(document).on('click','.add-option',function(){
        formOptionAjax('#option-add-form form',addOption, $(this).data('target'),$('#option-add-form'));
        $('#option-add-form').popup({
            opacity: 0.3,
            transition: 'all 0.3s'
        });
        $('#error').hide();
        var option_cat = $(this).data('option_cat');
        var option_group =$(this).data('option_group');
        $('#option_cat').val(option_cat);
        $('#option_group').val(option_group);
        $('#option_name').val('');
        $('#option-add-form').popup('show');
    });
    $(document).on('click','.close-options',function(){
        $('#option-add-form').popup('hide');
    });

    if($('#AdminMenuUrl').length > 0){
        $('#AdminMenuUrl').on('change',function(){
            if($(this).val() =='other'){
                $('#AdminMenuUrlOther').attr('disabled', false);
            }else{
                $('#AdminMenuUrlOther').attr('disabled', true);
            }
        });
    }
    if($('#product_list_form').length > 0){
        $('#product_list_form').on('submit',function(e){
            $.ajax({
                url : $(this).attr('action'),
                data : $(this).serializeArray(),
                type : 'post',
                success : function(response){
                    alert('Lưu thành công');
                }
            });
            e.preventDefault();
            return false;
        });
    }
});
var addOption = function(id,name,target){
       var template =
           '<div class="list-option">'
               +'<div class="checkbox">'
                   +'<input type="checkbox"  name="data[ProductOption][]"  class="option-checkbox" id="flat-checkbox-{id}" value="{id}">'
                   +'<label for="flat-checkbox-{id}">{name}</label>'
               +'</div>'
           +'</div>';
       template = template.replace(/{id}/g, id);
       template = template.replace(/{name}/g, name);
        $(target).append(template);
    $('#flat-checkbox-'+id).iCheck({checkboxClass: 'icheckbox_flat'});
};
var setUpFormAjax = function (form, div, popup, callback) {
    $(form).ajaxForm(
        {
            beforeSubmit: function (e) {

            },
            beforeSend: function () {

            },
            uploadProgress: function (event, position, total, percentComplete) {


            },
            success: function () {

            },
            complete: function (xhr) {
                $(div).html(xhr.responseText);
                setUpFormAjax($(div).find('form'), div, popup, callback);
            }
        }
    );
};
var formOptionAjax = function (form, callback, target,pop) {
    $(form).ajaxForm(
        {
            beforeSubmit: function (e) {
                var ok = true;
                $(e).each(function(index,value){
                    if(value.value.length==0) {
                        $('#error #msg').text('Không được bỏ trống');
                        ok = false;
                    }
                });
                if(!ok){
                    $('#error').show();
                }
            },
            beforeSend: function () {
                $('#error').hide();
            },
            uploadProgress: function (event, position, total, percentComplete) {


            },
            success: function () {

            },
            complete: function (xhr) {
                try{
                    var item = JSON.parse(xhr.responseText);
                    if(typeof item.error == 'undefined'){
                        addOption(item.id,item.name ,target);
                        pop.popup('hide');
                    }else{
                        $('#error').show();
                        $('#error #msg').text(item.error);
                    }
                }catch (e){
                    alert(e);
                }
            }
        }
    );
};