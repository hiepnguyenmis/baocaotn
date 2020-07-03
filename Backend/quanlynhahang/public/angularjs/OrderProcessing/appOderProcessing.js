var app = angular.module('OrderProcess',[]);

ap.controller('OrderProcessControllers',function($scope,$http){
    var baseUrl = 'http://127.0.0.1:8000/public/api/';

    this.$onInit= function(){
        $sccope.getBillWaiting();
    }

    $sccope.getBillWaiting =function(){
        $scope.waiting=true;
        $http({
            method:'GET',
            url:baseUrl + 'getbillwaiting'
        }).then(function mySuccess(response){
            $scope.billwaitings = response.data;
        });
    }


});
