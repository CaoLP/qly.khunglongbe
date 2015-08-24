$(function () {
    $("#list-promote a").on("click", function () {
        $("#list-promote a").each(function (i, e) {
            $(e).removeClass("active");
        });
        $(this).addClass("active");
        var id = $(this).data("id");
        $.ajax({
            url : product_promote_url,
            data : {promote_id : id},
            success : function (data) {
                $("#product-list").html($(data).filter("#product-list").html())
            }
        });
    })
});