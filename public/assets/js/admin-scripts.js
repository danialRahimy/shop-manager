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
});