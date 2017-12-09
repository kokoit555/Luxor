
    $(document).ready(function() {
        $('#product').DataTable();
    });
    $(document).ready(function() {
        $('#store').DataTable();
    });
    $(document).ready(function() {
        $('#order').DataTable();
    });

    var room = 1;
    function addproduct() {
     
        room++;
        var objTo = document.getElementById('addimgproduct')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass"+room);
        var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="form-group"><label class="col-md-3"></label><button class="btn btn-danger col-md-9" type="button"onclick="remove_education_fields('+ room +');"> - ลบลายสินค้า</button></div><div class="form-group"><label class="col-md-3 control-label" for="name">ลายสินค้า*</label><div class="col-md-9"><input name="input-file-img-product-thumb[]" type="file" class="form-control"></div></div><div class="form-group"><label class="col-md-3 control-label" for="name">รูปสินค้า*</label><div class="col-md-9"><input name="input-file-img-product[]" type="file" class="form-control"></div></div><div class="form-group"><label class="col-md-3 control-label">จำนวนสินค้า*</label><div class="col-md-9"><input type="number" name="quant[]" class="form-control" style="text-align:center;" value="1" min="1" max="999"></div></div>';
        objTo.appendChild(divtest)
    }
       function remove_education_fields(rid) {
           $('.removeclass'+rid).remove();
    }

    

    
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
                    $http.post('../Codephp/CodeBack/deleteProduct.php',{'id':$scope.id}).then(function(data){
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

