<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Nepal Relief Fund</title>

        <link rel="stylesheet" href="/map-assets/css/bootstrap.css" />

        <link rel="stylesheet" href="/map-assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="/map-assets/css/owl.theme.default.min.css" />

        <link rel="stylesheet" href="/map-assets/css/animate.css" />

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" />

        <link rel="stylesheet" href="/map-assets/assets/fonts/Moderat/style.css" />
        <link rel="stylesheet" href="/map-assets/assets/fonts/Proxima Nova/stylesheet.css" />

        <link rel="stylesheet" href="/map-assets/css/style.css" />
        <link rel="stylesheet" href="/map-assets/css/reset.css" />
        <link rel="stylesheet" href="/map-assets/css/responsive.css" />
        @yield('css')
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-logo">
                        <a href="{{route('index')}}">
                            <img src="/map-assets/images/nepalreliefportal.svg" alt="" />
                        </a>
                    </div>
                    
                    @if(!Request::segment(1))
                    <div class="head-nav">
                        <ul>
                            <li>
                                <a href="" data-title="All" data-id="null" class="sidebar-project active" id="all"><span class="header-dots all"></span>All</a>
                            </li>
                            @foreach ($projects as $item)
                            <li>
                                <a href="#" data-title="{{ $item->title }}" data-id="{{ $item->id }}" class="sidebar-project" id="{{ 'project'.$item->id }}"><span class="header-dots {{ $item->title }}"></span>{{ $item->title }}  </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="menu-right">
                        <div class="request donate">
                            <a href="#" class="donate-btn"><ion-icon name="heart-outline"></ion-icon>Donate</a>
                        </div>

                        <div class="request">
                            <a href="{{ route('getRequest') }}"><ion-icon name="keypad-outline"></ion-icon> Request</a>
                        </div>

                        <div class="menu">
                            <a href="#" class="menu-btn"><ion-icon name="reorder-two-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>

                <div class="mb-header">
                    <div class="home-btn">
                        <a href="{{route('index')}}"><ion-icon name="home-outline"></ion-icon></a>
                    </div>

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
        </header>

        @yield('body')
        <footer>
            <div class="container">
                <div class="footer-container">
                    <div class="footer-div">
                        <p><img src="/map-assets/images/creasion.png" alt="" /><a href="https://creasion.org/">CREASION</a> All Rights Reserved</p>
                    </div>

                    <div class="footer-div">
                        
                     
                    </div>

                    <div class="footer-div">
                        <p>Powered by <a href="https://www.hueshine.com/">Hue Shine</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <div class="donate-popup">
            
            <div class="donate-container">
                <button class="hide-donate"><ion-icon name="close-outline"></ion-icon></button>
                <div class="donate-head">
                    <ion-icon name="heart-outline"></ion-icon> <h5>Donate</h5>
                </div>
                <div class="donate-body">
                    <ul>
                        <li><span>Bank Name:</span> NMB BANK  </li>
                        <li><span>Branch: </span> Boudha Branch </li>
                        <li><span>Swift Code:</span> NMBBNPKA</li>
                        <li><span>Account Name:</span> CREASION</li>
                        <li><span>Account Number: </span> 1510142939500013</li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="about-slide">
            <div class="abt-container">
                <button class="hide-abt"><ion-icon name="close-outline"></ion-icon></button>

                <div class="abt">
                    <!-- <img src="/map-assets/images/creasion.png" class="logo-spin" alt=""> -->
                    <img src="/map-assets/images/nepalreliefportal.svg" alt="" />
                    <p>
                        Nepal Relief is an initiative of CREASION for quick disaster response. The interventions are implemented in collaboration and through the support of civil society organizations, individual volunteers, NGOs, private
                        sectors and youth groups. Through Nepal Relief, we focus on quick response as a short- term solution and move towards rehabilitation as a long-term solution to disaster management.
                    </p>
                </div>

                <div class="abt-center">
                    <div class="navs">
                        <a href="{{route('faqs') }}"><span>FAQs</span> </a>
                        <a href="{{route('ofn-chapters') }}"><span>OFN Chapters</span></a>
                        <a href="{{route('success-stories') }}"><span>Success Stories</span></a>
                        <a href="{{route('covid-19-resources') }}"><span>COVID-19 Resources</span> </a>
                        <a href="{{route('important-links') }}"><span>Important Links</span></a>
                    </div>

                    <div class="social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="abt-footer">
                    <img src="/map-assets/images/creasion.png" alt="" />
                    <p>Initiated by: CREASION</p>
                </div>
            </div>
        </div>

        <script src="/map-assets/js/jquery.min.js"></script>
        <script src="/map-assets/js/bootstrap.js"></script>
        <script src="/map-assets/js/owl.carousel.min.js"></script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
            integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>

        <script src="/map-assets/js/gsap.min.js"></script>
        <script src="/map-assets/js/ScrollTrigger.min.js"></script>
        <script src="/map-assets/js/CSSRulePlugin.min.js"></script>
        
        <script src="/map-assets/js/gsapscripts.js"></script>
        
        @yield('script')
    </body>
    </html>
    

