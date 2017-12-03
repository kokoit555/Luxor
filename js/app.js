
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

