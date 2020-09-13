$(document).ready(function () {
    var pageId = document.querySelector("body").id;

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $(document).on('click', '.upload-field', function(){
        var file = $(this).parent().parent().parent().find('.input-file');
        file.trigger('click');
    });
    $(document).on('change', '.input-file', function(){
        var fileName = $(this).parent().find('.form-control');
        fileName.val($(this).val().replace(/C:\\fakepath\\/i, ''));
        fileName.addClass("left-to-right");
    });

    try {
        $('[data-mask-price]').mask('000,000,000,000,000,000,000');
    }catch (e) {

    }

    if (pageId === "add-product") {

        $("[name=category]").change(function () {

            var i;
            var categoryId = $(this).val();
            var subCategories;

            for (i in categories){

                if (categories[i].parent_id == categoryId){

                    subCategories += `<option value='${categories[i].id}'>${categories[i].title}</option>`;
                }
            }

            $("[name=sub-category]").empty();
            $("[name=sub-category]").html(subCategories);
        })
    }

});