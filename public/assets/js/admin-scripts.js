$(document).ready(function () {
    var pageId = document.querySelector("body").id;

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});