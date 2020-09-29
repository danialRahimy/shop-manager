function clientFavoriteProduct(productId, element) {

    productId = parseInt(productId);

    if (productId < 1)
        return false;

    var request = $.ajax({
        "url" : "/product/toggleFavorite/" + productId,
    });

    request.done(function (data) {

        if (data == 1){

            var icon = $(element).find("i");
            icon.toggleClass("fa-bookmark-o", "fa-bookmark");
            icon.toggleClass("fa-bookmark", "fa-bookmark-o");
        }
    });
}

function clientLikeProduct(productId, element) {

    productId = parseInt(productId);

    if (productId < 1)
        return false;

    var request = $.ajax({
        "url" : "/product/toggleLike/" + productId,
    });

    request.done(function (data) {
        if (data == 1){

            var icon = $(element).find("i");
            icon.toggleClass("fa-heart-o", "fa-heart");
            icon.toggleClass("fa-heart", "fa-heart-o");
        }
    });
}

function copyShareLink(e) {
    e.preventDefault();
    var thiz = $(this);
    copyClipboard(window.location.protocol + "//" + window.location.hostname+$(this).attr('href'));
    var preHtml = $(this).html();
    $(this).html('کپی شد');
    setTimeout(function() {
        thiz.html(preHtml)
    }, 3000)
}
function copyClipboard(text) {
    var aux = document.createElement("input");
    aux.setAttribute("value", text);
    aux.setAttribute("contenteditable", true); //IOS compatibility
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
}