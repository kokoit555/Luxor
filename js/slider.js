$(document).ready(function(){
    
    $('#itemslider').carousel({ interval: 3000 });
    
    $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);
    
    for (var i=1;i<6;i++) {
    itemToClone = itemToClone.next();
    
    if (!itemToClone.length) {
    itemToClone = $(this).siblings(':first');
    }
    
    itemToClone.children(':first-child').clone()
    .addClass("cloneditem-"+(i))
    .appendTo($(this));
    }
    });
    });


    $(document).ready(function() {
        
        var sliding = false,
            curSlide = 1,
            numOfSlides = $(".slider--el").length;
        
        $(document).on("click", ".slider--control", function() {
          if (sliding) return;
          sliding = true;
          $(".slider--el").show();
          $(".slider--el").css("top");
          $(".slider--el.active").addClass("removed");
          ($(this).hasClass("right")) ? curSlide++ : curSlide--;
          if (curSlide < 1) curSlide = numOfSlides;
          if (curSlide > numOfSlides) curSlide = 1;
          $(".slider--el-" + curSlide).addClass("next");
          
          setTimeout(function() {
            $(".slider--el.removed").hide();
            $(".slider--el").removeClass("active next removed");
            $(".slider--el-" + curSlide).addClass("active");
            sliding = false;
          }, 1800);
        });
        
      });