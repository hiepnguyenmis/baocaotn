var app = angular.module('Order', []);
app.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

app.controller('OrderControler', function ($scope, $http) {

    var baseUrl = 'http://localhost:90/baocaotn/Backend/quanlynhahang/public/api/';
    $scope.tableIndex = null;
    $scope.savephoneCustomer = null;
    $scope.addPromotion = {
        name: "coin"
    }
    this.$onInit = function () {
        $scope.getTable();
        $scope.getFoods();
        $scope.buttonfoodstatus = '';
        $scope.getAllBill();
        $scope.employees();
        id_table = null;
        $scope.GetBillWithTable(table);
        // $scope.GetBillWithDetail();
        $scope.GetAllIdBillStatusFalse();
    }

    $scope.getTable = function () {

        $scope.loading = true;
        $http({
            method: 'GET',
            url: baseUrl + 'gettable'
        }).then(function mySuccess(response) {
            $scope.tables = response.data;
            $scope.loading = false;
        });
    }
    //
    $scope.employees = function () {
        $http({
            method: 'GET',
            url: baseUrl + 'employees'
        }).then(function mySuccess(response) {
            $scope.employees = response.data;

        });
    }
    $scope.putTable = function (table_id, status) {
        let data = {
            TABLE_STATUS: status
        };
        $http.put(baseUrl + 'puttable/' + table_id, data).then((response) => {
            $scope.getTable();
            $scope.GetBillWithTable(table_id);
        }, (err) => {
            alert('Sửa thất bại');
        });
    }
    $scope.GetIdStatusFalse = function (idBill, idTable, index) {
        $scope.indexId = index;

        if (idTable == null || idTable == 0) {
            $http({
                method: 'GET',
                url: baseUrl + 'getbillwithtable/' + table_id
            }).then(function mySuccess(response) {
                $scope.getonebill = null;
                const {
                    foods
                } = response.data[0];

                if (!IsEmptyObject(foods)) {
                    $scope.getonebill = foods;

                    $scope.total = 0;
                    $scope.detail = foods;
                    angular.forEach($scope.detail, function (detail) {
                        $scope.total = $scope.total + (detail.pivot.BILLDETAIL_PRICE * detail.pivot.BILLDETAIL_AMOUNT);
                    });
                    $scope.loadingDeleteDetailBill = false;
                } else {
                    $scope.getonebill = [];
                    $scope.total = 0;
                }

            });
        } else {
            $scope.tableIndex = idTable;
            $scope.GetBillWithTable(idTable);
        }

    }
    $scope.getFoods = function () {
        $http({
            method: 'GET',
            url: baseUrl + 'getfoods'
        }).then(function mySuccess(response) {
            $scope.foods = response.data;
        });
    }

    $scope.getAllBill = function () {
        $http({
            method: 'GET',
            url: baseUrl + 'getallbills'
        }).then(function mySuccess(response) {
            $scope.allbill = response.data;
        });
    }
    $scope.GetBillWithTable = function (table_id) {

        $http({
            method: 'GET',
            url: baseUrl + 'getbillwithtable/' + table_id
        }).then(function mySuccess(response) {
            $scope.getonebill = null;
            const {
                foods
            } = response.data[0];

            if (!IsEmptyObject(foods)) {
                $scope.getonebill = foods;

                $scope.total = 0;
                $scope.detail = foods;
                angular.forEach($scope.detail, function (detail) {
                    $scope.total = $scope.total + (detail.pivot.BILLDETAIL_PRICE * detail.pivot.BILLDETAIL_AMOUNT);
                });
                $scope.loadingDeleteDetailBill = false;
            } else {
                $scope.getonebill = [];
                $scope.total = 0;
            }

        });
    }
    $scope.GetAllIdBillStatusFalse = function () {
        $http({
            method: 'GET',
            url: baseUrl + 'getallidbillsfalse'
        }).then(function (response) {
            $scope.allidstatusfalse = response.data;
        });
    }
    // $scope.GetBillWithDetail = function () {

    //     $http({
    //         method: 'GET',
    //         url: baseUrl + 'getallbillswithdetail'
    //     }).then(function mySuccess(response) {
    //         $scope.getBillWithDetail = response.data;
    //     });

    // }
    $scope.GetIdBill = function (id_table) {
        $http({
            method: 'GET',
            url: baseUrl + 'getidbilloftable/' + id_table
        }).success(function (response) {
            $scope.billid = response.data;
        });
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    function IsEmptyObject(object) {
        if (object.length === 0) {
            return true;
        } else {
            return false;
        }
    }
    $scope.postBills = function (table_id) {
        var idTable = $scope.tableIndex;
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var day = date.getDate();
        var current_date = year + '-' + month + '-' + day;

        let data = {
            "BILL_DATE": current_date,
            "BILL_STATUS": 0,
            "BILL_TAX": "",
            "CUSTOMER_ID": "",
            "TABLE_ID": table_id,
            "EMPLOYEE_ID": "1"
        };

        $http.post(baseUrl + 'createbill', data).then((response) => {
            return
        }, (err) => {
            console.log('=>>>error create bill');
            return false;
        });
        return true;
    }
    console.log($scope.ArrayBill);
    $scope.DeleteBillEmpty = function (id_table) {
        $http.delete(baseUrl + 'deletebill/' + id_table).then((response) => {
            alert('Xóa thành công');
        }, (err) => {
            alert('Lỗi thay đổi trạng thái');
        });
    }
    $scope.UpdateStatusTable = function (table, status) {
        let data = {
            'TABLE_STATUS': status
        };
        $http.put(baseUrl + 'puttable/' + table.TABLE_ID, data).then((response) => {
            $scope.getTable();
        }, (err) => {
            alert('Lỗi thay đổi trạng thái');
            return false;
        });
        return true;
    }

    $scope.GetBillOfTable = function (table) {

        if (table.TABLE_STATUS == 0) {
            $scope.postBills(table.TABLE_ID);
            $scope.tableIndex = table.TABLE_ID;
            console.log($scope.tableIndex);
            $scope.putTable(table.TABLE_ID, 1);

        } else if (table.TABLE_STATUS == 1) {
            $scope.tableIndex = null;

            $http({
                method: 'GET',
                url: baseUrl + 'getbillwithtable/' + table.TABLE_ID
            }).then(function mySuccess(response) {

                const {
                    foods
                } = response.data[0];
                $scope.checkbillnull = foods;
                if (IsEmptyObject($scope.checkbillnull)) {
                    $scope.DeleteBillEmpty(table.TABLE_ID);
                    $scope.putTable(table.TABLE_ID, 0);
                } else {
                    $scope.GetBillWithTable(table.TABLE_ID);
                    $scope.tableIndex = table.TABLE_ID;
                    console.log($scope.tableIndex);
                }
            });
        }
    }

    $scope.AddFoodToBill = function (food) {
        var idTable = $scope.tableIndex;
        $http({
            method: 'GET',
            url: baseUrl + 'getidbilloftable/' + idTable
        }).then(function mySuccess(response) {
            var getidbilloftable = response.data[0];
            console.log(getidbilloftable);
            if (!IsEmptyObject(getidbilloftable)) {
                $http({
                    method: 'GET',
                    url: baseUrl + 'findfoodinbilldetail/' + getidbilloftable.BILL_ID + '/' + food.FOOD_ID
                }).then(function mySuccess(response) {
                    var findBillElement = response.data[0];
                    if (IsEmptyObject(response.data)) {
                        let data = {
                            "BILLDETAIL_ID": getidbilloftable.BILL_ID,
                            "FOOD_ID": food.FOOD_ID,
                            "BILLDETAIL_PRICE": food.FOOD_PRICE,
                            "BILLDETAIL_AMOUNT": 1
                        }
                        $scope.loadingCreateBillDetail = true;
                        $http.post(baseUrl + 'createbilldetail', data).then((response) => {
                            $scope.GetBillWithTable(idTable);
                            $scope.loadingCreateBillDetail = true
                        }, (err) => {
                            return;
                        });
                    } else {
                        var billAmountUpdate = findBillElement.BILLDETAIL_AMOUNT + 1;
                        let data = {

                            "BILLDETAIL_AMOUNT": billAmountUpdate
                        }
                        $scope.loadingCreateBillDetail = true;
                        $http.put(baseUrl + 'updatebilldetail/' + getidbilloftable.BILL_ID + '/' + food.FOOD_ID, data).then((response) => {
                            console.log(false);
                            $scope.GetBillWithTable(idTable);
                            $scope.loadingCreateBillDetail = true
                        }, (err) => {
                            return;
                        });
                    }
                });
            }
        });
    }

    $scope.DeleteDetailBill = function (food) {
        var idTable = $scope.tableIndex;
        $scope.loadingDeleteDetailBill = true;
        $http({
            method: 'GET',
            url: baseUrl + 'getidbilloftable/' + idTable
        }).then(function mySuccess(response) {
            var getidbilloftable = response.data[0];
            console.log(getidbilloftable);
            if (!IsEmptyObject(getidbilloftable)) {
                $scope.loadingDeleteDetailBill = true;
                $http.delete(baseUrl + 'deletebilldetail/' + getidbilloftable.BILL_ID + '/' + food.FOOD_ID).then((response) => {
                    $scope.GetBillWithTable(idTable);
                    $scope.loadingDeleteDetailBill = false;
                }, (err) => {
                    return;
                });
            }
        })
    }
    $scope.updatePromotion = function (promotion, idTable) {
        $http({
            method: 'GET',
            url: baseUrl + 'getidbilloftable/' + idTable
        }).then(function mySuccess(response) {

            var checkidbill = response.data[0];
            if (!IsEmptyObject(checkidbill)) {
                console.log($scope.customerbyphone.CUSTOMER_ID);
                let data = {

                    "BILL_PROMOTION": promotion
                }
                console.log(checkidbill.BILL_ID);
                $http.put(baseUrl + 'updateBill/' + checkidbill.BILL_ID, data).then((response) => {
                    return
                }, (err) => {
                    console.log('lỗi cập nhật ');
                });
            }
        });
    }
    $scope.UpAmountBillDetail = function (food) {
        var idTable = $scope.tableIndex;
        var billAmountUp = food.pivot.BILLDETAIL_AMOUNT + 1;
        let data = {

            "BILLDETAIL_AMOUNT": billAmountUp
        }
        console.log(data);
        console.log(food.pivot.BILLDETAIL_ID);
        $scope.loadingCreateBillDetail = true;
        $http.put(baseUrl + 'updatebilldetail/' + food.pivot.BILLDETAIL_ID + '/' + food.FOOD_ID, data).then((response) => {

            $scope.GetBillWithTable(idTable);
            $scope.loadingCreateBillDetail = true
        }, (err) => {
            return;
        });
    }
    $scope.DownAmountBillDetail = function (food) {
        var idTable = $scope.tableIndex;
        var billAmountDown = food.pivot.BILLDETAIL_AMOUNT - 1;
        if (billAmountDown != 0) {
            let data = {

                "BILLDETAIL_AMOUNT": billAmountDown
            }
            console.log(data);
            console.log(food.pivot.BILLDETAIL_ID);
            $scope.loadingCreateBillDetail = true;
            $http.put(baseUrl + 'updatebilldetail/' + food.pivot.BILLDETAIL_ID + '/' + food.FOOD_ID, data).then((response) => {

                $scope.GetBillWithTable(idTable);
                $scope.loadingCreateBillDetail = true
            }, (err) => {
                return;
            });
        } else {
            $scope.DeleteDetailBill(food);
        }

    }

    $scope.PayBill = function () {

        var idTable = $scope.tableIndex;
        $scope.checPayBillStatus = null;
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var day = date.getDate();
        var bill_id = null;
        var randomNumber = Math.floor(Math.random() * (99999) + 10000);
        var bill_id = 'HD' + year.toString() + month.toString() + day.toString() + randomNumber.toString();
        var promotion = null;
        $http({
            method: 'GET',
            url: baseUrl + 'getidbilloftable/' + idTable
        }).then(function mySuccess(response) {
            var checkidbill = response.data[0];
            if (!IsEmptyObject(checkidbill)) {
                console.log(bill_id);
                let data = {
                    "BILL_NO": bill_id,
                    "BILL_STATUS": 1
                }
                $http.put(baseUrl + 'updateBill/' + checkidbill.BILL_ID, data).then((response) => {
                    $scope.putTable(idTable, 0);
                    $scope.GetBillWithTable(idTable);
                    $scope.getonebill = {};
                    console.log('done');
                }, (err) => {
                    return;
                });
            }
        });

    }

    $scope.CheckPromotion = function () {
        var idTable = $scope.tableIndex;
        $scope.savephoneCustomer = $scope.checkPhoneCus;
        $http({
            method: 'GET',
            url: baseUrl + 'getonecustomer/' + $scope.checkPhoneCus
        }).then(function mySuccess(response) {

            $scope.customerbyphone = response.data[0];
            console.log($scope.customerbyphone);

            if (!IsEmptyObject(response.data)) {
                $scope.IsCustomer = true;
                $scope.rankCustomer = '';
                let promotionPersent = 0;
                $scope.promotion = $scope.customerbyphone.CUSTOMER_MARK;
                $promotionTotal = null;
                $http({
                    method: 'GET',
                    url: baseUrl + 'getbillwithtable/' + idTable
                }).then(function mySuccess(response) {

                    const {
                        foods
                    } = response.data[0];
                    if (!IsEmptyObject(foods)) {
                        $scope.totalbill = 0;
                        $scope.promotionTotal = 0;
                        $scope.detailbill = foods;
                        angular.forEach($scope.detailbill, function (item) {
                            $scope.totalbill = $scope.totalbill + (item.pivot.BILLDETAIL_PRICE * item.pivot.BILLDETAIL_AMOUNT);
                        });
                        if ($scope.promotion < 2) {
                            promotionPersent = 0;
                            $scope.rankCustomer = 'Khách hàng tìm năng';
                        } else if ($scope.promotion >= 2 && $scope.promotion < 10) {
                            promotionPersent = 5;
                            $scope.rankCustomer = 'Khách hàng thân thiết';
                        } else if ($scope.promotion >= 10 && $scope.promotion < 20) {
                            promotionPersent = 10;
                            $scope.rankCustomer = 'Khách VIP 1';
                        } else if ($scope.promotion >= 20) {
                            promotionPersent = 20;
                            $scope.rankCustomer = 'Khách VIP 2';
                        }
                        $scope.promotionforProtentialCustomer = $scope.totalbill * (promotionPersent / 100);
                        console.log('done');
                        $scope.allPromotionOfBill = $scope.promotionforProtentialCustomer;
                        $http({
                            method: 'GET',
                            url: baseUrl + 'getidbilloftable/' + idTable
                        }).then(function mySuccess(response) {

                            var checkidbill = response.data[0];
                            if (!IsEmptyObject(checkidbill)) {
                                console.log($scope.customerbyphone.CUSTOMER_ID);
                                let data = {
                                    "CUSTOMER_ID": $scope.customerbyphone.CUSTOMER_ID,
                                    "BILL_PROMOTION": $scope.promotionforProtentialCustomer
                                }
                                console.log(checkidbill.BILL_ID);
                                $http.put(baseUrl + 'updateBill/' + checkidbill.BILL_ID, data).then((response) => {
                                    return
                                }, (err) => {
                                    console.log('lỗi cập nhật ');
                                });
                            }
                        });

                    } else {
                        $scope.getonebill = [];
                    }
                });
            } else {
                $scope.IsCustomer = false;
                $scope.phoneCustomer = $scope.checkPhoneCus;
            }
            console.log($scope.IsCustomer);
        });

    }

    $scope.AddNewCustomer = function () {

    }

    $scope.AddPromotion = function () {
        var idTable = $scope.tableIndex;
        console.log(true);
        var promotion = parseInt($scope.newPromotion);
        $http({
            method: 'GET',
            url: baseUrl + 'getbillwithtable/' + idTable
        }).then(function mySuccess(response) {

            const {
                foods
            } = response.data[0];
            if (!IsEmptyObject(foods)) {
                $scope.totalAddNewPromotion = 0;
                var detailBill = response.data[0];
                console.log(detailBill);
                $scope.detailBillAddPromotion = foods;
                angular.forEach($scope.detailBillAddPromotion, function (itemDetail) {
                    console.log(itemDetail);

                    $scope.totalAddNewPromotion = $scope.totalAddNewPromotion + (itemDetail.pivot.BILLDETAIL_PRICE * itemDetail.pivot.BILLDETAIL_AMOUNT);

                });
                $scope.Allpromotion = 0;
                if ($scope.addPromotion.name == 'coin') {
                    if (promotion <= 1000 || promotion >= $scope.totalAddNewPromotion || promotion >= ($scope.totalAddNewPromotion - ($scope.totalAddNewPromotion * 0.8))) {
                        $scope.addNewPromotionStatus = 'Vượt quá khuyến mãi cho phép';
                    } else {
                        $scope.addNewPromotionStatus = '';
                        if (detailBill.BILL_PROMOTION != null || detailBill.BILL_PROMOTION != 0 && (detailBill.BILL_PROMOTION + promotion) <= (($scope.totalAddNewPromotion - ($scope.totalAddNewPromotion * 0.8)))) {

                            console.log('done');
                            $scope.Allpromotion = detailBill.BILL_PROMOTION + promotion;
                            $scope.allPromotionOfBill = $scope.Allpromotion;
                            $scope.updatePromotion($scope.Allpromotion, idTable);
                            console.log($scope.Allpromotion);
                        } else {
                            $scope.addNewPromotionStatus = 'Vượt quá khuyến mãi cho phép';
                        }
                    }
                } else if ($scope.addPromotion.name == 'percent') {
                    var promotionPercent = $scope.totalAddNewPromotion
                    if (promotion > 100) {
                        $scope.addNewPromotionStatus = 'Phần trăm nhập vào vượt quá 100%';
                    } else {
                        var percentPromotion = ((detailBill.BILL_PROMOTION + ($scope.totalAddNewPromotion * promotion / 100)) / $scope.totalAddNewPromotion) * 100;

                        if (detailBill.BILL_PROMOTION != null || detailBill.BILL_PROMOTION != 0 && percentPromotion <= 80) {
                            $scope.Allpromotion = (detailBill.BILL_PROMOTION + ($scope.totalAddNewPromotion * promotion / 100));
                            $scope.allPromotionOfBill = $scope.Allpromotion;
                            $scope.updatePromotion($scope.Allpromotion, idTable);
                        } else {
                            $scope.addNewPromotionStatus = 'Vượt quá khuyến mãi cho phép';
                        }
                    }
                } else if ($scope.addPromotion.name == 'free') {
                    $scope.Allpromotion = $scope.totalAddNewPromotion;
                    $scope.allPromotionOfBill = $scope.totalAddNewPromotion;
                    $scope.updatePromotion($scope.Allpromotion, idTable);
                }
            } else {
                $scope.getonebill = [];
            }

        });

    }
    $scope.putBill = function (idBillDetail, idFood, data) {
        $http.put(baseUrl + 'updatebilldetail/' + idBillDetail + '/' + idFood, data).then((response) => {
            console.log(false);

            $scope.loadingmerge = true
        }, (err) => {
            return;
        });

    }
    $scope.MergeBillWithBill = function () {
        var mergebillwith = document.getElementById('mergebillwith').value;
        var mergebillwithbill = document.getElementById('mergebillwithbill').value;
        $http({
            method: 'GET',
            url: baseUrl + 'getonebilll/' + mergebillwith
        }).then(function mySuccess(response) {
            const {
                foods
            } = response.data[0];
            $scope.mergeWithBill = foods;
            console.log($scope.mergeWithBill);

            $http({
                method: 'GET',
                url: baseUrl + 'getonebilll/' + mergebillwithbill
            }).then(function mySuccess(response) {
                const {
                    foods
                } = response.data[0];

                $scope.mergeByBill = foods;
                console.log($scope.mergeByBill);
                $scope.loadingmerge = false;
                angular.forEach($scope.mergeWithBill, function (itemBillMerge) {
                    angular.forEach($scope.mergeByBill, function (itemmergeByBill) {
                        if (itemBillMerge.FOOD_ID == itemmergeByBill.FOOD_ID) {
                            var billId = itemmergeByBill.pivot.BILLDETAIL_ID;
                            var amount = itemmergeByBill.pivot.BILLDETAIL_AMOUNT + itemBillMerge.pivot.BILLDETAIL_AMOUNT;

                            let data = {
                                "BILLDETAIL_ID": billId,
                                "BILLDETAIL_AMOUNT": amount
                            }
                            console.log(itemBillMerge.pivot.BILLDETAIL_ID);
                            console.log(itemBillMerge.FOOD_ID);



                            $scope.putBill(itemBillMerge.pivot.BILLDETAIL_ID,itemBillMerge.FOOD_ID,data);
                        }
                    });
                });
            });
        });


    }

});
