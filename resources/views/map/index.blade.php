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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css"  />

    <link rel="stylesheet" href="/map-assets/assets/fonts/Moderat/style.css">
    <link rel="stylesheet" href="/map-assets/assets/fonts/Proxima Nova/stylesheet.css">

    <link rel="stylesheet" href="/map-assets/css/reset.css">
    <link rel="stylesheet" href="/map-assets/css/style.css">
    <link rel="stylesheet" href="/map-assets/css/responsive.css">

</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="header-logo">
                    <a href="">
                        <img src="/map-assets/images/nepalreliefportal.svg" alt="">
                    </a>
                </div>

                <div class="head-nav">
                    <ul>
                        <li ><a href="" data-title="All" data-id="null" class="sidebar-project active" id="all"><span></span>All</a> </li>
                            @foreach ($projects as $item)
                        <li><a href="#" data-title= "{{ $item->title }}" data-id="{{ $item->id }}" class="sidebar-project" id="{{ 'project'.$item->id }}"><span></span>{{ $item->title }} </a> </li>
                        @endforeach
                    </ul>
                </div>

                <div class="request">
                    <a href=""><ion-icon name="keypad-outline"></ion-icon> Request</a>
                </div>
            </div>
        </div>
    </header>

    <section class="map-wrapper">
        <div class="row">
            <div class="col-md-3 bg-color  ">
                
                <div class="sidebar">
                    <div class="sidebar-header">
                        <!-- <ul>
                            <li ><a href="" data-id="null" class="sidebar-project active" id="all"><span></span>All</a> </li>
                             @foreach ($projects as $item)
                            <li><a href="#" data-id="{{ $item->id }}" class="sidebar-project" id="{{ 'project'.$item->id }}"><span></span>{{ $item->title }} </a> </li>
                            @endforeach
                        </ul> -->

                        <div class="selected-project">
                            <span class="icon"></span>

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
                </div>
            </div>

            <div class="col-md-9 ">
            <!-- <section class="filter">
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
                        <button id="reset-btn"><ion-icon name="refresh-outline"></ion-icon> Reset</button>
                    </div>
                </div>
            </section> -->
                <div id="map"></div>
            </div>
        </div>

        

        
    </section>

    <section class="numbers" id="section-demographs">
        <div class="container">
            <div class="nums-head">
                <h4>
                    <ion-icon name="stats-chart-outline"></ion-icon> DEMOGRAPHICS
                </h4>

                <p>
                    Lorem ipsum dolor sit amet, consectet ipsum dolor sit amet, consectetipsum dolor sit amet, consectet
                    ipsum dolor sit amet, consectetipsum dolor sit amet, consectet
                    ipsum dolor sit amet, consectet
                </p>
            </div>

                

                <div class="demographs">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- <div class="chart-sing">
                                <figure class="highcharts-figure">
                                    <div id="chart-gender"></div>
                                  </figure>
                            </div> -->

                            <div class="chart-sing">
                                <figure class="highcharts-figure">
                                    <div id="chart-type"></div>
                                  </figure>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="chart-sing">
                                <figure class="highcharts-figure">
                                    <div id="chart-category"></div>
                                  </figure>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="chart-sing">
                                <figure class="highcharts-figure">
                                    <div id="chart-inst-type"></div>
                                  </figure>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>

    <section class="partners" id="section-partners">
        <div class="container">
            <div class="partner-slider owl-carousel">
                <div class="item">
                    <img src="/map-assets/images/american-nepal-medical-foundation.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/animal-nepal.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/batas-foundation.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/be-artsy.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/covid-alliance-for-nepal.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/covid19-rapid-action-task-force-c19-rat.jpg" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/humanity-foundation-nepal.jpg" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/jagadamba-steels.jpg" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/merging-nepsocs.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/mission-rebuild-nepal.png" alt="">
                </div>
                <div class="item">
                    <img src="/map-assets/images/nepal-rising.png" alt="">
                </div>
                <div class="item">
                    <img src="/map-assets/images/student-coalition-for-nepal.png" alt="">
                </div>
                <div class="item">
                    <img src="/map-assets/images/syakar-trading-company-pvt-ltd.png" alt="">
                </div>

                <div class="item">
                    <img src="/map-assets/images/the-coca-cola-foundation.png" alt="">
                </div>

            </div>
        </div>
    </section>


   

    <script src="/map-assets/js/jquery.min.js"></script>
    <script src="/map-assets/js/bootstrap.js"></script>
    <script src="/map-assets/js/owl.carousel.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="/map-assets/js/chart.js"></script>

    <script type="module" src="/map-assets/js/script.js"></script>

</body>
</html>
