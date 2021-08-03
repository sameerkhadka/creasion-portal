
Highcharts.chart('chart-gender', {
    chart: {
      type: 'variablepie'
    },
    colors: ['#4680ea', '#ef769d'],
    backgroundColor: "'#ef769d",
    title: {
      text: `  `
    },
    tooltip: {
      headerFormat: '',
      pointFormat: 'Total: <b>{point.y}</b><br/>' 
        // 'Population density (people per square km): <b>{point.z}</b><br/>'
    },
    series: [{
      minPointSize: 10,
      innerSize: '20%',
      zMin: 0,
      name: 'Gender',
      data: [{
        name: 'Male',
        y: 90,
        z: 40,
      
      }, {
        name: 'Female',
        y: 125,
        z: 50,
      
      }]
    }]
  });


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



  Highcharts.chart('chart-province-type', {
    chart: {
      type: 'bar'
    },
    
    
    title: {
      text: ``
    },
    
    xAxis: {
      categories: ['Province 1', 'Province 2', 'Bagmati', 'Gandaki', 'Lumbini', 'Karnali', 'Sudurpashchim'],
      title: {
        text: null
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Relief Bar',
        align: 'high'
      },
      labels: {
        overflow: 'justify'
      }
    },
    tooltip: {
      valueSuffix: ' millions'
    },
    plotOptions: {
      bar: {
        dataLabels: {
          enabled: true
        }
      }
    },
  
    credits: {
      enabled: false
    },
    series: [{
        name: "",
      data: [1.6, 2, 5, 2.8, 1, 0.5, 2]
    }]
  });

  $('.partner-slider').owlCarousel({
      loop: true,

      autoplay: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      margin: 15,
      smartSpeed: 2500,
      autoplayHoverPause:true,
      slideBy: 3,
      autoplayTimeout: 5000,
      responsive: {
          0: {
              items: 2,
          },
          768: {
              items: 3,
          
          },
          1200: {
              items: 6,
          }
      }
  });


