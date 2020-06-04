angular.module("product-list", []).controller("productListController", function ($scope, $http, $routeParams) {
	 $scope.cars = [];
     $http.get("api/getCars.php")
     .then(function (response) {
     	$scope.cars = response.data;
     }, function (response) {
        console.log("Bad request.");
     });
});