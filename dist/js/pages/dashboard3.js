/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'line',
    data: {
      labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
        label: "Milyar",
          borderColor: '#007bff',
          data: [1000, 2000, 3000, 2500, 2700, 2500, 3000],
          fill: false,
          borderWidth: 2
        },
        {
        label: "Milyar",
          borderColor: '#d1553a',
          data: [700, 1700, 2700, 2000, 1800, 1500, 2000],
          fill: false,
          borderWidth: 2
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '1px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

  var donutChartCanvas = $('#pabeanChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Bea Masuk',
          'Bea Keluar',
          'Denda Adm. Pabean',
      ],
      datasets: [
        {
          data: [400,100,200,600],
      backgroundColor: ['#f6c23e', '#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#e8b638', '#2e59d9', '#17a673'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      legend : {
        display : false
      },
      layout: {
        padding: {
          top: 15
        }
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    var donutChartCanvas2 = $('#cukaiChart').get(0).getContext('2d')
    var donutData2        = {
      labels: [
          'Cukai MMEA',
          'Cukai HT',
          'Cukai Lainnya',
          'Denda Adm. Cukai'
      ],
      datasets: [
        {
          data: [700,200,300,100,900],
      backgroundColor: ['#f6c23e', '#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#e8b638', '#2e59d9', '#17a673', '#2c9faf'],
        }
      ]
    }
    var donutOptions2     = {
      maintainAspectRatio : false,
      responsive : true,
      legend : {
        display : false
      },
      layout: {
        padding: {
          top: 15
        }
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas2, {
      type: 'doughnut',
      data: donutData2,
      options: donutOptions2
    })

  $.ajax({
  type: "GET",
  data: "",
  url: "dataChartPDRI.php",
  success : function (result){

  var dataPDRI = JSON.parse(result);

    var donutChartCanvas1 = $('#PDRIChart').get(0).getContext('2d')
    var donutData1        = {
      labels: [dataPDRI[4],dataPDRI[5],dataPDRI[6],dataPDRI[7]],
      datasets: [
        {
          data: [dataPDRI[0],dataPDRI[1],dataPDRI[2],dataPDRI[3]],
          backgroundColor: ['#f6c23e', '#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#e8b638', '#2e59d9', '#17a673', '#2c9faf'],
        }
      ]
    }
    var donutOptions1     = {
      maintainAspectRatio : false,
      responsive : true,
      legend : {
        display : false,
        reverse : true
      },
      layout: {
        padding: {
          top: 15
        }
      },
      tooltips: {
        callbacks: {
        label: function(tooltipItem, data) {
          var datasetLabel = data.datasets[tooltipItem.datasetIndex].label || '';
          var label = data.labels[tooltipItem.index];
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          return label ;
        }
      }
    }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas1, {
      type: 'doughnut',
      data: donutData1,
      options: donutOptions1
    })

    }
  })

  var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [{
        type: 'line',
        data: [100, 120, 170, 167, 180, 177, 160],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false,
          borderWidth: 2
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type: 'line',
        data: [60, 80, 70, 67, 80, 77, 100],
        backgroundColor: 'tansparent',
        borderColor: '#ced4da',
        pointBorderColor: '#ced423',
        pointBackgroundColor: '#ced423',
        fill: false,
          borderWidth: 2
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        // mode: mode,
        // intersect: intersect
      },
      hover: {
        // mode: mode,
        // intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
})

// lgtm [js/unused-local-variable]
