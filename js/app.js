
    $(document).ready(function() {
        $('#example').DataTable();
    });

    var order = angular.module('Listorder',[]);
    order.controller('UserListorder',function($scope,$http){

        $scope.displayListorder = function(){
            $http.get("../Codephp/CodeBack/showinfoOrder.php").then(function(response){
                $scope.listorder = response.data.records;
            })
        }
    });

    
    var app = angular.module('ListProduct',[]);
    app.controller('UserListProduct',function($scope,$http){

        $scope.displayListProduct = function(){
            $http.get("../Codephp/CodeBack/showinfoproduct.php").then(function(response){
                $scope.listproduct = response.data.records;
            })
        }

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
                        $scope.displayListProduct();
                    });
                }
              });

        }

    });


    var store = angular.module('ListStore',[]);
    store.controller('UserListStore',function($scope,$http){

        $scope.displayListStore = function(){
            $http.get("../Codephp/CodeBack/showinfostore.php").then(function(response){
                $scope.liststore = response.data.records;
            })
        }

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
                        $scope.displayListStore();
                    });
                }
              });

        }

    });

