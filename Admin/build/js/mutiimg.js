
var room = 1;
function addproduct() {
 
    room++;
    var objTo = document.getElementById('addimgproduct')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass"+room);
    var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12"></label><button class="btn btn-danger col-md-6 col-sm-6 col-xs-9" type="button" onclick="remove_education_fields('+ room +');"> - ลบลายสินค้า</button></div><div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12">ลายสินค้า '+ room +'*<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-9"><input name="input-file-img-product-thumb[]" type="file" class="form-control" required="required"></div></div><div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12">รูปสินค้า '+ room +'*<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-9"><input name="input-file-img-product[]" type="file" class="form-control" required="required"></div></div><div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12">จำนวนสินค้า '+ room +'*<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-9"><input type="number" name="quant[]" class="form-control" value="1" min="1" max="999" data-validate-minmax="5,999" required="required"></div></div>';

    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
       $('.removeclass'+rid).remove();
}

/*
var registerstore = angular.module('registerstore',[]);
app.controller('Formregisterstore',function($scope,$http){

    $scope.deleteData = function(id){
        $scope.id = id;
    
          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            closeComfirm: false
          }).then((result) => {
            if (result.value) {
                $http.post('./CodeBack/deleteProduct.php',{'id':$scope.id}).then(function(data){
                    swal("Complete","Delete","success");
                    window.location.reload();
                });
            }
          });

    }

});*/

    
var app = angular.module('ListProduct',[]);
app.controller('UserListProduct',function($scope,$http){

    $scope.deleteData = function(id){
        $scope.id = id;
    
          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            closeComfirm: false
          }).then((result) => {
            if (result.value) {
                $http.post('./CodeBack/deleteProduct.php',{'id':$scope.id}).then(function(data){
                    swal("Complete","Delete","success");
                    window.location.reload();
                });
            }
          });

    }

});


var store = angular.module('ListStore',[]);
store.controller('UserListStore',function($scope,$http){

    $scope.deleteData = function(id){
        $scope.id = id;
    
          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            closeComfirm: false
          }).then((result) => {
            if (result.value) {
                $http.post('../Codephp/CodeBack/deleteStore.php',{'id':$scope.id}).then(function(data){
                    swal("Complete","Delete","success");
                    window.location.reload();
                });
            }
          });

    }

});