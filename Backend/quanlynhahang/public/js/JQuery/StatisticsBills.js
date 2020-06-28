$(document).ready(function () {
    var ctx = document.getElementById('salesChart');
    var baseURL = 'http://127.0.0.1:8000/api/'

    console.log('1');
    var month;
    var sumBillMonth;
    var year;
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var yearStatisticsYear = currentDate.getFullYear();
    var date = currentDate.getDate();
    var monthCurrrent = currentDate.getMonth() + 1;

    var arrayMonthFormat = [];
    var arrayMonthStaticsFormat = [];
    var arrayRevelar;

    $('#approx-time').text('Thống kê đến ' + date + '/' + monthCurrrent + '/' + year);
    console.log('Thống kê từ: 1 tháng 1 năm ' + year + '- Đến ' + date + ' tháng ' + monthCurrrent + ' năm' + year);

    $('#approx-month-time').text('Thống kê đến ' + date + '/' + monthCurrrent + '/' + year);

    $('.dropdown-statatics').text(year)
    $(".bill-statistics").click(function () {

        var arrayMonthFormat = [];

        console.log(year);
        year = $(this).text()
        $('#approx-time').text('Thống kê đến ' + date + '/' + monthCurrrent + '/' + year);
        $('.dropdown-statatics').text(year)
        $.ajax({
            method: "GET",
            url: baseURL + 'getbilldate/' + year,
            dataType: "json",
            success: function (response) {

                month = response.map((item, response) => {
                    return item.month;
                });
                sumBillMonth = response.map((item, response) => {
                    return item.sum_bill;
                });
                for (i = 0; i < month.length; i++) {
                    var monthFomat = 'Tháng ' + month[i];
                    arrayMonthFormat.push(monthFomat);
                }
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: arrayMonthFormat,
                        datasets: [{
                            label: '# Doanh thu',
                            data: sumBillMonth,
                            backgroundColor: [
                                'rgba(255, 255, 255, 0.2)',
                                'rgba(255, 255, 255, 0.2)',
                                'rgba(255, 255, 255, 0.2)',
                                'rgba(255, 255, 255, 0.2)',
                                'rgba(255, 255, 255, 0.2)',
                                'rgba(255, 255, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },

                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

        });

        $.ajax({
            method: "GET",
            url: baseURL + 'getstatistics-revernue/' + year,
            dataType: "json",
            success: function (response) {
                arrayRevelarYear = response.map((item, response) => {
                    return item.total_revenue;
                });
                arrayCostYear = response.map((item, response) => {
                    return item.totalCost;
                });
                arrayProfitYear = response.map((item, response) => {
                    return item.totalProfit;
                });
                var revelarYear = numeral(arrayRevelarYear[0]).format('0,0[.]00 ');
                var costYear = numeral(arrayCostYear[0]).format('0,0[.]00 ');
                var profitYear = numeral(arrayProfitYear[0]).format('0,0[.]00 ');
                console.log(revelarYear);

                $('.revenueYear').text(revelarYear + ' Vnđ');
                $('.costYear').text(costYear + ' Vnđ');
                $('.profitYear').text(profitYear + ' Vnđ');


            }
        });

    });
    $.ajax({
        method: "GET",
        url: baseURL + 'getbilldate/' + year,
        dataType: "json",
        success: function (response) {
            console.log(response);

            month = response.map((item, response) => {
                return item.month;
            });
            sumBillMonth = response.map((item, response) => {
                return item.sum_bill;
            });
            for (i = 0; i < month.length; i++) {
                var monthFomat = 'Tháng ' + month[i];
                arrayMonthFormat.push(monthFomat);
            }
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: arrayMonthFormat,
                    datasets: [{
                        label: '# Doanh thu',
                        data: sumBillMonth,
                        backgroundColor: [
                            'rgba(100,149,237, 1)',

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

    });
    $.ajax({
        method: "GET",
        url: baseURL + 'getstatistics-revernue/' + year,
        dataType: "json",
        success: function (response) {
            arrayRevelarYear = response.map((item, response) => {
                return item.total_revenue;
            });
            arrayCostYear = response.map((item, response) => {
                return item.totalCost;
            });
            arrayProfitYear = response.map((item, response) => {
                return item.totalProfit;
            });
            var revelarYear = numeral(arrayRevelarYear[0]).format('0,0[.]00 ');
            var costYear = numeral(arrayCostYear[0]).format('0,0[.]00 ');
            var profitYear = numeral(arrayProfitYear[0]).format('0,0[.]00 ');
            console.log(revelarYear);

            $('.revenueYear').text(revelarYear + ' Vnđ');
            $('.costYear').text(costYear + ' Vnđ');
            $('.profitYear').text(profitYear + ' Vnđ');

        }
    });

    //month
    $('.dropdown-statatics-month').text(monthCurrrent);
    $('.dropdown-statatics-year').text(yearStatisticsYear);
    $.ajax({
        method: "GET",
        url: baseURL + 'getbillmonth/' + yearStatisticsYear + '/' + monthCurrrent,
        dataType: "json",
        success: function (response) {
            console.log(response);

            date = response.map((item, response) => {
                return item.date;
            });
            sumBillMonth = response.map((item, response) => {
                return item.sum_bill;
            });

            console.log(arrayMonthStaticsFormat);

            var ctx = document.getElementById('salesChartMonth');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: date,
                    datasets: [{
                        label: '# of Votes',
                        data: sumBillMonth,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(127,255,0, 0.2)',
                            'rgba(210,105,30, 0.2)',
                            'rgba(255,127,80, 0.2)',
                            'rgba(100,149,237, 0.2)',
                            'rgba(255,248,220, 0.2)',
                            'rgba(220,20,60, 0.2)',
                            'rgba(0,255,255, 0.2)',
                            'rgba(0,0,139, 0.2)',
                            'rgba(0,139,139, 0.2)',
                            'rgba(184,134,11, 0.2)',
                            'rgba(169,169,169, 0.2)',
                            'rgba(0,100,0, 0.2)',
                            'rgba(169,169,169, 0.2)',
                            'rgba(189,183,107, 0.2)',
                            'rgba(189,183,107, 0.2)',
                            'rgba(189,183,107, 0.2)',
                            'rgba(255,140,0, 0.2)',
                            'rgba(153,50,204, 0.2)',
                            'rgba(139,0,0, 0.2)',
                            'rgba(233,150,122, 0.2)',
                            'rgba(143,188,143, 0.2)',
                            'rgba(72,61,139, 0.2)',
                            'rgba(47,79,79, 0.2)',
                            'rgba(47,79,79, 0.2)',
                            'rgba(0,206,209, 0.2)'

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(127,255,0, 1)',
                            'rgba(210,105,30, 1)',
                            'rgba(255,127,80, 1)',
                            'rgba(100,149,237, 1)',
                            'rgba(255,248,220, 1)',
                            'rgba(220,20,60, 1)',
                            'rgba(0,255,255, 1)',
                            'rgba(0,0,139, 1)',
                            'rgba(0,139,139, 1)',
                            'rgba(184,134,11, 1)',
                            'rgba(169,169,169, 1)',
                            'rgba(0,100,0, 1)',
                            'rgba(169,169,169, 1)',
                            'rgba(189,183,107, 1)',
                            'rgba(189,183,107, 1)',
                            'rgba(189,183,107, 1)',
                            'rgba(255,140,0, 1)',
                            'rgba(153,50,204, 1)',
                            'rgba(139,0,0, 1)',
                            'rgba(233,150,122, 1)',
                            'rgba(143,188,143, 1)',
                            'rgba(72,61,139, 1)',
                            'rgba(47,79,79, 1)',
                            'rgba(47,79,79, 1)',
                            'rgba(0,206,209, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

    });
    $.ajax({
        method: "GET",
        url: baseURL + 'getstatistics-revernue-month/' +  yearStatisticsYear + '/' + monthCurrrent,
        dataType: "json",
        success: function (response) {
            console.log(response);

            arrayRevelarMonth = response.map((item, response) => {
                return item.totalRevenueMonth;
            });
            console.log(arrayRevelarMonth);
            arrayCostMonth = response.map((item, response) => {
                return item.totalCostMonth;
            });
            arrayProfitMonth = response.map((item, response) => {
                return item.totalProfitMonth;
            });
            var revelarMonth = numeral(arrayRevelarMonth[0]).format('0,0[.]00 ');
            var costMonth = numeral(arrayCostMonth[0]).format('0,0[.]00 ');
            var profitMonth = numeral(arrayProfitMonth[0]).format('0,0[.]00 ');

            $('.revelarMonth').text(revelarMonth + ' Vnđ');
            $('.costMonth').text(costMonth + ' Vnđ');
            $('.profitMonth').text(profitMonth + ' Vnđ');


        }
    });
    $("#dropdownMonthLink").prop("disabled", true);
    $('.bill-year-statistics').click(function () {
        yearStatisticsMonth = $(this).text();
        $('.dropdown-statatics-year').text(yearStatisticsMonth);

        $.ajax({
            method: "GET",
            url: baseURL + 'getmonthbillofyear/' + yearStatisticsMonth,
            dataType: "json",
            success: function (response) {
                var s = '</a>';
                for (var i = 0; i < response.length; i++) {
                    s += '<a class="dropdown-item month-statistics bill-month-statistics">' + response[i].month + '</a>';
                }
                $("#dropdown-statatics-month").html(s);
            }
        });
        $("#dropdownMonthLink").prop("disabled", false);
        $(document).on('click','.bill-month-statistics',function(){

            var arrayStatisticsMonthFormat=[];
            monthStatisticsMonth=$(this).text();
            $('.dropdown-statatics-month').text(monthStatisticsMonth);
            console.log(yearStatisticsMonth +'/' +monthStatisticsMonth);

            $.ajax({
                method: "GET",
                url: baseURL + 'getbillmonth/' + yearStatisticsMonth + '/' + monthStatisticsMonth,
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    date = response.map((item, response) => {
                        return item.date;
                    });
                    sumBillMonth = response.map((item, response) => {
                        return item.sum_bill;
                    });
                    for (i = 0; i < date.length; i++) {
                        var arraydate =date[i];
                        arrayStatisticsMonthFormat.push(arraydate);
                    }
                    console.log(arrayStatisticsMonthFormat);

                    var ctx = document.getElementById('salesChartMonth');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: arrayStatisticsMonthFormat,
                            datasets: [{
                                label: '# of Votes',
                                data: sumBillMonth,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(127,255,0, 0.2)',
                                    'rgba(210,105,30, 0.2)',
                                    'rgba(255,127,80, 0.2)',
                                    'rgba(100,149,237, 0.2)',
                                    'rgba(255,248,220, 0.2)',
                                    'rgba(220,20,60, 0.2)',
                                    'rgba(0,255,255, 0.2)',
                                    'rgba(0,0,139, 0.2)',
                                    'rgba(0,139,139, 0.2)',
                                    'rgba(184,134,11, 0.2)',
                                    'rgba(169,169,169, 0.2)',
                                    'rgba(0,100,0, 0.2)',
                                    'rgba(169,169,169, 0.2)',
                                    'rgba(189,183,107, 0.2)',
                                    'rgba(189,183,107, 0.2)',
                                    'rgba(189,183,107, 0.2)',
                                    'rgba(255,140,0, 0.2)',
                                    'rgba(153,50,204, 0.2)',
                                    'rgba(139,0,0, 0.2)',
                                    'rgba(233,150,122, 0.2)',
                                    'rgba(143,188,143, 0.2)',
                                    'rgba(72,61,139, 0.2)',
                                    'rgba(47,79,79, 0.2)',
                                    'rgba(47,79,79, 0.2)',
                                    'rgba(0,206,209, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(127,255,0, 1)',
                                    'rgba(210,105,30, 1)',
                                    'rgba(255,127,80, 1)',
                                    'rgba(100,149,237, 1)',
                                    'rgba(255,248,220, 1)',
                                    'rgba(220,20,60, 1)',
                                    'rgba(0,255,255, 1)',
                                    'rgba(0,0,139, 1)',
                                    'rgba(0,139,139, 1)',
                                    'rgba(184,134,11, 1)',
                                    'rgba(169,169,169, 1)',
                                    'rgba(0,100,0, 1)',
                                    'rgba(169,169,169, 1)',
                                    'rgba(189,183,107, 1)',
                                    'rgba(189,183,107, 1)',
                                    'rgba(189,183,107, 1)',
                                    'rgba(255,140,0, 1)',
                                    'rgba(153,50,204, 1)',
                                    'rgba(139,0,0, 1)',
                                    'rgba(233,150,122, 1)',
                                    'rgba(143,188,143, 1)',
                                    'rgba(72,61,139, 1)',
                                    'rgba(47,79,79, 1)',
                                    'rgba(47,79,79, 1)',
                                    'rgba(0,206,209, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }

            });
            $.ajax({
                method: "GET",
                url: baseURL + 'getstatistics-revernue-month/' +  yearStatisticsYear + '/' + monthCurrrent,
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    arrayRevelarMonth = response.map((item, response) => {
                        return item.totalRevenueMonth;
                    });
                    console.log(arrayRevelarMonth);
                    arrayCostMonth = response.map((item, response) => {
                        return item.totalCostMonth;
                    });
                    arrayProfitMonth = response.map((item, response) => {
                        return item.totalProfitMonth;
                    });
                    var revelarMonth = numeral(arrayRevelarMonth[0]).format('0,0[.]00 ');
                    var costMonth = numeral(arrayCostMonth[0]).format('0,0[.]00 ');
                    var profitMonth = numeral(arrayProfitMonth[0]).format('0,0[.]00 ');

                    $('.revelarMonth').text(revelarMonth + ' Vnđ');
                    $('.costMonth').text(costMonth + ' Vnđ');
                    $('.profitMonth').text(profitMonth + ' Vnđ');


                }
            });
        });
    });

});
