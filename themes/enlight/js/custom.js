jQuery(document).ready(function() {
	
	"use strict";

	// Products
  $(".img-product").hover(function() {
    var source = $(this).attr("src");

    $(".img-product").css("border", "1px solid #ddd");
    $(this).css("border", "1px solid #ee4d2d");
    $(".img-product-active").attr("src", source);
    $(".link-product-active").attr("href", source);
  });

});
