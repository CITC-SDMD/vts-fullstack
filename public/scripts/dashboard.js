$(document).ready(function () {
    $('.dashboard-button').addClass('active-link');

    var clients = {
        series: [{
            data: clientsPerMonth
        }],
        chart: {
            type: 'area',
            height: 80,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0
        },
        colors: ['#D397F8'],
    };

    var clientChart = new ApexCharts(document.querySelector("#client-chart"), clients);
    clientChart.render();

    var cases = {
        series: [{
            data: casesPerMonth
        }],
        chart: {
            type: 'area',
            height: 80,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0
        },
        colors: ['#D397F8'],
    };

    var caseChart = new ApexCharts(document.querySelector("#case-chart"), cases);
    caseChart.render();

    var caseLogs = {
        series: [{
            data: caseLogsPerMonth
        }],
        chart: {
            type: 'area',
            height: 80,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0
        },
        colors: ['#D397F8'],
    };

    var caseLogChart = new ApexCharts(document.querySelector("#caselogs-chart"), caseLogs);
    caseLogChart.render();

    var women = {
        series: [{
            name: 'First Quarter',
            data: womentFirstQuarter
        }, {
            name: 'Second Quarter',
            data: womenSecondQuarter
        }, {
            name: 'Third Quarter',
            data: womenThirdQuarter
        }, {
            name: 'Fourth Quarter',
            data: womenFourthQuarter
        }],
        title: {
            text: 'Summary of number of women clients assisted by CMO-IGDD',
            align: 'left'
        },
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0
        },
    }

    var womenChart = new ApexCharts(document.querySelector("#women-chart"), women);
    womenChart.render();
});
