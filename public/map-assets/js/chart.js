
// Create the chart
Highcharts.chart('chart-inst-type', {
    chart: {
      type: 'column'
    },
    title: {
      text: ``
    },
    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Relief reached out'
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
          format: '{point.y:.1f}%'
        }
      }
    },
  
    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },
  
    series: [
      {
        name: "Browsers",
        colorByPoint: true,
        data: [
          {
            name: "Government Hospitals",
            y: 5,
           
          },
          {
            name: "Private Hospitals ",
            y: 10.57,

          },
          {
            name: "Isolation Center ",
            y: 7.23,
            
          },
          {
            name: "Community Health Centers ",
            y: 5.58,
           
          },
          {
            name: "Orphanages ",
            y: 4.02,
           
          },
          {
            name: "Others",
            y: 1.92,
            
          }
        ]
      }
    ]
  });


