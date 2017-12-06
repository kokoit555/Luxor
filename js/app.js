
    $(document).ready(function() {
        $('#product').DataTable();
    });

    $(document).ready(function() {
        $('#store').DataTable();
    });

    $(document).ready(function() {
        $('#order').DataTable();
    });
    
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
                        $scope.displayListProduct();
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
                        $scope.displayListStore();
                    });
                }
              });

        }

    });

