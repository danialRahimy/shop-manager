$ = jQuery;

$(document).ready(function () {

    //START //add favorite product
    $("[data-favorite]").click(function () {

        var productId = $(this).data("product-id");

        clientFavoriteProduct(productId, $(this));
    })
    //END //add favorite product

    //START //add like product
    $("[data-like]").click(function () {

        var productId = $(this).data("product-id");

        clientLikeProduct(productId, $(this));
    })
    //END //add like product

});

