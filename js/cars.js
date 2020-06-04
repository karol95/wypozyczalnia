angular.module("cars", []).controller("carDetailsController", function ($scope, $http, $routeParams) {
	 $scope.id = parseInt($routeParams.id);
	 $scope.cars = [];
	 $scope.curr_car = {};
     $http.get("api/getCars.php")
     .then(function (response) {
     	$scope.cars = response.data;
     	$scope.curr_car = findByID();
        console.log($scope.curr_car);
     }, function (response) {
        console.log("Bad request.");
     });
     function findByID() {
     	for(var i = 0; i < $scope.cars.length; i++) {
     		if($scope.cars[i].id == $scope.id)
     			return $scope.cars[i];
     	}
     	return null;
     };
});