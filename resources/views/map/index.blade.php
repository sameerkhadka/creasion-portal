<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Relief Fund</title>




    <link rel="stylesheet" href="/map-assets/css/bootstrap.css">

    <link rel="stylesheet" href="/map-assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/map-assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/map-assets/css/animate.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css"  />

    <link rel="stylesheet" href="/map-assets/assets/fonts/Moderat/style.css">
    <link rel="stylesheet" href="/map-assets/assets/fonts/Proxima Nova/stylesheet.css">

    
    <link rel="stylesheet" href="/map-assets/css/style.css">
    <link rel="stylesheet" href="/map-assets/css/reset.css">
    <link rel="stylesheet" href="/map-assets/css/responsive.css">

</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="header-logo">
                    <a href="{{route('index')}}">
                        <img src="/map-assets/images/nepalreliefportal.svg" alt="">
                    </a>
                </div>

                <div class="head-nav">
                    <ul>
                        <li ><a href="" data-title="All" data-id="null" class="sidebar-project active" id="all"><span class="header-dots all"></span>All</a> </li>
                            @foreach ($projects as $item)
                        <li><a href="#" data-title= "{{ $item->title }}" data-id="{{ $item->id }}" class="sidebar-project" id="{{ 'project'.$item->id }}"><span class="header-dots {{ $item->title }}"></span>{{ $item->title }} </a> </li>
                        @endforeach
                    </ul>
                </div>

                <div class="menu-right">
                    <div class="request donate">
                        <a href=""><ion-icon name="heart-outline"></ion-icon>Donate</a>
                    </div>

                    <div class="request">
                        <a href="{{ route('getRequest') }}"><ion-icon name="keypad-outline"></ion-icon> Request</a>
                    </div>

                    <div class="menu">
                        <a href="#" class="menu-btn"><ion-icon name="reorder-two-outline"></ion-icon></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="map-wrapper">
        <div class="row">
            <div class="col-md-3 bg-color  ">
                
                <div class="sidebar">
                    <div class="sidebar-header">

                        <div class="selected-project">
                            <span class="icon icon-color"></span>

                            <div class="text">
                                <p>Selected Project</p>
                                <h4 class="sidebar-selected">All</h4>
                            </div>
                        </div>

                        <div class="responded-num">
                            <h4 class="total-responds">00</h4>
                            <p>Responds</p>
                            
                        </div>
                    </div>
                    <div id="map-lists"></div>

                    <div class="list-pagination">
                            <div class="prev-next">
                            <button class="paginateBtn" data-type="back" disabled>←</button>
                            <div id="paginateDetail"></div>
                            <button class=" paginateBtn" data-type="forward">→</button>
                            </div>
                            
                    </div>
                </div>
            </div>

            <div class="col-md-9 padding-left-none ">
                <section class="filter">
                    <div class="filter-head">
                        <h4><ion-icon name="funnel-outline"></ion-icon> Filter Results</h4>
                    </div>

                    <div class="filter-card-wrap">

                        <div class="filter-card">
                            <label>Province</label>

                            <select  id="provinces">
                                <option value="-1" selected disabled>Select Province</option>
                            </select>

                        </div>

                        <div class="filter-card">
                            <label>District</label>

                            <select  id="districts">
                                <option value="-1" selected disabled>Select District</option>
                            </select>

                        </div>



                        <div class="filter-card">
                            <a href="" class="update">Update</a>
                            <button id="reset-btn"><ion-icon name="refresh-outline"></ion-icon> Clear</button>
                        </div>
                    </div>
                </section>
                <div id="map"></div>
            </div>
        </div>

        

        
    </section>

    <section class="data-display">
        <div class="container">
            <div class="data-card">
                <div class="row ">
                    <div class="col-md-4">
                        <div class="chart-sing">
                            <h4 class="chart-title">Relief Impacts by Gender</h4>

                            <figure class="highcharts-figure">
                                <div id="chart-gender"></div>
                            </figure>
                            <?php $item = \App\Models\ChartData::where('id',3)->first(); ?>
                            <p>
                               {{ $item->description }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="chart-sing">
                            <h4 class="chart-title">Relief Impacts by Province</h4>

                            <figure class="highcharts-figure">
                                <div id="chart-province-type"></div>
                            </figure>
                            <?php $item = \App\Models\ChartData::where('id',2)->first(); ?>
                            <p>
                               {{ $item->description }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="chart-sing">
                            <h4 class="chart-title">Relief Impacts by Institution  Types</h4>

                            <figure class="highcharts-figure">
                                <div id="chart-inst-type"></div>
                            </figure>
                            <?php $item = \App\Models\ChartData::where('id',1)->first(); ?>
                            <p>
                               {{ $item->description }}
                            </p>
                        </div>
                    </div>

                    
                </div>

            </div>


        </div>
    </section>

    <section class="partners" id="section-partners">
        <div class="container">
            <div class="partner-slider owl-carousel">
                @foreach($partners as $partner)
                <div class="item">
                    <img src="{{Voyager::image($partner->image)}}" alt="">
                </div>
                @endforeach

                

            </div>
        </div>
    </section>

    <div class="about-slide">
        

        <div class="abt-container">
            <button class="hide-abt"><ion-icon name="close-outline"></ion-icon></button> 

            <div class="abt">
                <!-- <img src="/map-assets/images/creasion.png" class="logo-spin" alt=""> -->
                <img src="/map-assets/images/nepalreliefportal.svg" alt="">
                <p>
                Nepal Relief is an initiative of CREASION for quick disaster response. 
                The interventions are implemented in collaboration and through the support
                 of civil society organizations, individual volunteers, NGOs, private 
                 sectors and youth groups. Through Nepal Relief, we focus on quick response
                  as a short- term solution and move towards rehabilitation as a 
                  long-term solution to disaster management.  
                </p>
            </div>

            <div class="abt-center">
                <div class="navs">
                    <a href=""><span>FAQs</span> </a>
                    <a href=""><span>OFN Chapters</span></a>
                    <a href=""><span>Success Stories</span></a>
                    <a href=""><span>COVID-19 Resources</span> </a>
                    <a href=""><span>Important Links</span></a>
                </div>

                <div class="social">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="abt-footer">

                <img src="/map-assets/images/creasion.png"  alt=""><p> Initiated by: CREASION</p>

            </div>
        </div>
    </div>
   
    <script src="/map-assets/js/jquery.min.js"></script>
    <script src="/map-assets/js/bootstrap.js"></script>
    <script src="/map-assets/js/owl.carousel.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="/map-assets/js/gsap.min.js"></script>
    <script src="/map-assets/js/ScrollTrigger.min.js"></script>
    <script src="/map-assets/js/CSSRulePlugin.min.js"></script>

    <script src="/map-assets/js/chart.js"></script>
    <script src="/map-assets/js/gsapscripts.js"></script>

    <script type="module" src="/map-assets/js/script.js"></script>

    <script>
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
      data: @json($genderData)
    }]
  });

    </script>
    <script>
        
  Highcharts.chart('chart-province-type', {
    chart: {
      type: 'bar'
    },
    
    
    title: {
      text: ``
    },
    
    xAxis: {
      categories: @json($provinceName),
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
      data: @json($values)
    }]
  });

  $('.partner-slider').owlCarousel({
      loop: true,

      autoplay: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      margin: 15,
      smartSpeed: 4500,
      autoplayHoverPause:true,
      slideBy: 3,
      autoplayTimeout: 5000,
      responsive: {
          0: {
              items: 2,
          },
          768: {
              items: 4,
          
          },
          1200: {
              items: 7,
          }
      }
  });
    </script>
<script>
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
        data: @json($institutionchart)
      }
    ]
  });



</script>
</body>
</html>
