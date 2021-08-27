@extends('layouts.app')
@section('body')
        <section class="map-wrapper">
            <div id="loading"></div>
            <div class="row">
                <div class="col-md-3 bg-color">
                    <div class="sidebar">
                        <div class="mb-mapheader">
                            <div class="project-wrap">
                                <span class="icon icon-color"></span>

                                <div class="project-dropdown">
                                    <p>Selected Project </p>

                                    <select class="form-select" id="m-project-select" >
                                        <option value="all" selected>All</option>
                                        @foreach ($projects as $item)
                                            <option value="{{ $item->id }}" >{{ $item->title }}</option>

                                        
                                        @endforeach

                                
                                    </select>
                                </div>
                            </div>

                            <div class="responds">
                                <h4>00</h4>
                                <p>Responds</p>
                            </div>
                        </div>

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
                                <button class="paginateBtn" data-type="forward">→</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 padding-left-none">
                    <section class="filter">
                        <div class="filter-head">
                            <h4><ion-icon name="funnel-outline"></ion-icon> Filter Results</h4>
                        </div>

                        <div class="filter-card-wrap">
                            <div class="filter-card">
                                <label>Province</label>

                                <select id="provinces">
                                    <option value="-1" selected disabled>Select Province</option>
                                </select>
                            </div>

                            <div class="filter-card">
                                <label>District</label>

                                <select id="districts">
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="chart-sing">
                                <h4 class="chart-title">Relief Impacts by Gender</h4>

                                <figure class="highcharts-figure">
                                    <div id="chart-gender"></div>
                                    <!-- <div id="forGender"></div> -->
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

                                    <!-- <div id="forProvince"></div> -->
                                </figure>
                                <?php $item = \App\Models\ChartData::where('id',2)->first(); ?>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="chart-sing">
                                <h4 class="chart-title">Relief Impacts by Institution Types</h4>

                                <figure class="highcharts-figure">
                                  <!-- <div id="chartdiv"></div> -->
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
                        <img src="{{Voyager::image($partner->image)}}" alt="" />
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection

@section('script')      
        <script src="https://code.highcharts.com/highcharts.js"></script> 
        <script src="https://code.highcharts.com/modules/variable-pie.js"></script> 
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>    
        
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

        <script src="/map-assets/js/chart.js"></script> 

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
              legend: {
                  enabled: true
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

                
              colors:["#7cb5ec"],

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
   @endsection