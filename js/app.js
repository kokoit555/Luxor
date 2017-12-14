
$(function () {
  
      var goToCartIcon = function($addTocartBtn){
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
        $addTocartBtn.prepend($image);
        var position = $cartIcon.position();
        $image.animate({
          top: position.top,
          left: position.left
        }, 500 , "linear", function() {
          $image.remove();
        });
}
$('.my-cart-btn').myCart({
  currencySymbol: '$',
  classCartIcon: 'my-cart-icon',
  classCartBadge: 'my-cart-badge',
  classProductQuantity: 'my-product-quantity',
  classProductRemove: 'my-product-remove',
  classCheckoutCart: 'my-cart-checkout',
  affixCartIcon: true,
  showCheckoutModal: true,
  
  clickOnAddToCart: function($addTocart){
    goToCartIcon($addTocart);
  },
  afterAddOnCart: function(products, totalPrice, totalQuantity) {
    console.log("afterAddOnCart", products, totalPrice, totalQuantity);
  },
  clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
    console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
  },
  checkoutCart: function(products, totalPrice, totalQuantity) {
    var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
    $.each(products, function(){
        shoppingcart(this.id, this.quantity, this.price * this.quantity);
    });
    console.log("checking out", products, totalPrice, totalQuantity);
  },
  getDiscountPrice: function(products, totalPrice, totalQuantity) {
    console.log("calculating discount", products, totalPrice, totalQuantity);
    return totalPrice * 0.99;
  }
});

});


$('.rio-promos').slick({
  dots: false,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

	$('.center').slick({
  centerMode: true,
  autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
          speed: 300,
  slidesToShow: 5,
  responsive: [
   {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }
  ]
});

$('.rio-promos').each(function(){
  $(this).find('.slick-slide').addClass('slick-current');
});

    /* Demo purposes only */
  $(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );
		
$(document).on('ready', function () {
    $(".bannerhome").slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
            });
        });


$(document).ready(function () {
  
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".btn-primary").click(function (e) {

        var $active = $('.wizard .nav-wizard li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}