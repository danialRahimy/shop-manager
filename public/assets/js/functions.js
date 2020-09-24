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
            console.log(icon);
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
            console.log(icon);
            icon.toggleClass("fa-heart-o", "fa-heart");
            icon.toggleClass("fa-heart", "fa-heart-o");
        }
    });
}