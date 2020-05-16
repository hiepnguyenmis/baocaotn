var app = angular.module('Order', []);

app.controller('OrderControler', function ($scope, $http) {

    var baseUrl = 'http://localhost:90/baocaotn/Backend/quanlynhahang/public/api/';

    this.$onInit = function () {
        $scope.getTable();
        $scope.getFoods();
        $scope.buttonfoodstatus = '';
    }

    $scope.getTable = function () {
        $http({
            method: 'GET',
            url: baseUrl + 'gettable'
        }).then(function mySuccess(response) {
            $scope.tables = response.data;

        });
    }

    $scope.putTable = function (table) {
        let data = {
            TABLE_STATUS: 1
        };
        $http.put(baseUrl + 'puttable' + table.id, data).then((response) => {
            $scope.getTable();
        }, (err) => {
            alert('Sửa thất bại');
        });
    }

    $scope.getFoods = function () {
        $http({
            method: 'GET',
            url: baseUrl + 'getfoods'
        }).then(function mySuccess(response) {
            $scope.foods = response.data;
        });
    }

    $scope.postBills = function (table_id) {

        var bill_id = null;
        var date= new Date();
        var year = date.getFullYear();
        var month = date.getMonth();
        var day = date.getDay();
        var randomNumber = Math.floor(Math.random()*(99999)+10000);
        var bill_id='HD' + year.toString() + month.toString() + day.toString() + randomNumber.toString();

        let data = {
                "BILL_NO": bill_id ,
                "BILL_DATE": date.getDate(),
                "BILL_STATUS": "0",
                "BILL_TAX":'',
                "CUSTOMER_ID":'',
                "TABLE_ID": table_id,
                "EMPLOYEE_ID": "1"
        };

        $http.post(baseUrl+'createbill', data).then((response) => {
            console.log('=>>>>done');

            return true;
        }, (err) => {

            console.log('=>>>error create bill');
            return false;

        });



        return true;
    }

    $scope.UpdateStatusTable= function(table,status){
        let data={
            'TABLE_STATUS':status
        };

        $http.put(baseUrl+'puttable/'+table.TABLE_ID, data).then((response)=>{
            $scope.getTable();
        },(err)=>{
            console.log('=>>Error update status table');
            return false;
        });
        return true;
    }

    $scope.CreateBill = function (id_table) {
        $http({
            method: 'GET',
            url: baseUrl + 'getonetable/' + id_table
        }).then(function mySuccess(response) {
            $scope.tableswithtable = response.data;
        });

        angular.forEach($scope.tableswithtable, function (table) {
            if (table.TABLE_STATUS == 0) {
                if($scope.postBills(table_ID)==true){
                    $scope.UpdateStatusTable(table,1);  
                }
                $scope.getFoods();
                $scope.buttonfoodstatus =null;
            }
        });
    }
});
