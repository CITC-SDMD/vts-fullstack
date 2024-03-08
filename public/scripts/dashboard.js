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

    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();

    var women = {
        series: [{
            name: 'Total',
            data: womenCount
        }],
        dataLabels: {
            enabled: false
        },
        title: {
            text: 'Number of women client assisted by CMO-IGDD',
            align: 'left'
        },
        subtitle: {
            text: 'January ' + currentYear + ' - ' + ' December ' + currentYear,
            align: 'left'
        },
        xaxis: {
            type: 'date',
            categories: ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"]
        },
        chart: {
            height: 350,
            type: 'area'
        },
        colors: ['#F9A8D4'],
        dataLabels: {
            enabled: true
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

    var casesPie = {
        series: casesCount,
        chart: {
            type: 'pie',
        },
        labels: casesSummary,
        title: {
            text: 'Summary of cases reported to CMO-IGDD',
            align: 'left'
        },
        subtitle: {
            text: 'January ' + currentYear + ' - ' + ' December ' + currentYear,
            align: 'left'
        },
    }

    var casePieChart = new ApexCharts(document.querySelector("#cases-pie"), casesPie);
    casePieChart.render();
});
