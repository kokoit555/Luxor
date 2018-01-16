
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



var app = angular.module("ListProduct",[]);
app.controller("UserListProduct",function($scope,$http){
    $scope.displayListProduct = function(){
        $http.get("Codephp/CodeFront/listproduct.php").then(function(response){
          $scope.masterListProdut = response.data.records;  
          $scope.listproduct = $scope.masterListProdut; 
          
        })
    }
    // $scope.insertcart = function(){
    //   $http.post("Codephp/CodeFront/addcartangular.php",{'idproduct':$scope.idproduct , 'NameProduct':$scope.NameProduct, 'PriceProduct':$scope.PriceProduct, 'thumb':$scope.thumb, 'qtyproduct':$scope.qtyproduct})
    //       .then(function(data){
    //           $scope.idproduct = null;
    //           $scope.NameProduct = null;
    //           $scope.PriceProduct = null;
    //           $scope.thumb = null;
    //           $scope.qtyproduct = null;
    //       })
    // }
    $scope.updateTypeFilter = function(){
      $scope.listproduct = $scope.masterListProdut;
      var criteria = [];
      for (let i = 1; i <= 6; i ++) {
        let checkBox = document.querySelector("input[name='filterCheckbox'][value='" + i +"']");
        if (checkBox.checked){
          criteria.push(i);
        } 
      }

      if (criteria.length > 0) {
        $scope.listproduct = $scope.listproduct.filter((e)=>{
          return  criteria.indexOf(parseInt(e.idtype)) != -1; 
        });
      }
    }

    $scope.currentPage = 0;
    $scope.pageSize = 12;
    $scope.numberOfPages=function(){
        return Math.ceil($scope.listproduct.length/$scope.pageSize);                
    }
});
app.filter('startFrom', function() {
  return function(input, start) {
      start = +start; //parse to int
      return input.slice(start);
  }
});