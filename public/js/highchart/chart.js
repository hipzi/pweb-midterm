let $data = $('#serverData')

var month = $data.data('month');
var month_name = $data.data('month_name');

var year = $data.data('year');
var year_name = $data.data('year_name');

var mobile = $data.data('mobile');
var website = $data.data('website');
var desktop = $data.data('desktop');

var software = $data.data('software');
var software_name = $data.data('software_name');

Highcharts.chart('container', {
    credits: {
        enabled: false
    },
    title: {
        text: 'Sales Rate per Month'
    },
    xAxis: {
        categories: ['October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September']
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: '',
        data: month
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});

Highcharts.chart('container', {
    credits: {
        enabled: false
    },
    title: {
        text: 'Sales Rate per Year'
    },
    xAxis: {
        categories: year_name
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: '',
        data: year
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});

Highcharts.chart('container-3', {
    credits: {
        enabled: false
        },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sofware Sales Rate'
    },
    accessibility: {
        announceNewData: {
        enabled: true
        }
    },
    xAxis: {
        categories: software_name
    },
    yAxis: {
        title: {
        text: ''
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y:.f}'
        }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px"></span><br>',
        pointFormat: '<b>{point.y:.f}</b> of Software<br/>'
    },
    series: [
        {
        name: software_name,
        colorByPoint: true,
        data: software
        }
    ]
});

Highcharts.chart('container-4', {
    credits: {
        enabled: false
    },
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Categories'
    },
    tooltip: {
        pointFormat: '<b>{point.percentage:.0f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        colorByPoint: true,
        data: [{
            name: 'Mobile',
            data: dosen,
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Website',
            data: tendik,
            y: 11.84
        }, {
            name: 'Desktop',
            data: mahasiswa,
            y: 10.85
        }]
    }]
  });