var app = angular.module('Order', []);
app.controller('OrderControler', function ($scope, $http) {
    var baseUrl = 'http://localhost:90/baocaotn/Backend/quanlynhahang/public/api/';

    $scope.getTable = function () {
        $http({
            method: 'GET',
            url:baseUrl+'gettable'
        }).then(function mySuccess(){
            $scope.tables=respone.data;
        });
    }
});
