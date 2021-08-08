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

        <section class="faq">
            <div class="container">
                <div class="faq-head">
                    <h4>Frequently Asked Questions</h4>
                    <p>Nepal Relief is an initiative of CREASION for quick disaster response.
                    hrough Nepal Relief, we focus on quick response as a short- term solution 
                    and move towards rehabilitation as a long-term solution to disaster management. 
                    </p>
                </div>

                <div class="faq-wrap">
                    <div class="faq-accordion-content">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>What is Nepal Relief?
                                </a>

                                <p class="accordion-content">
                                    <span>
                                        Nepal Relief is a disaster response and management initiative that aims to provide quick support to affected individuals, families and communities of any kind of disasters. Nepal Relief Portal has
                                        been envisioned by CREASION as a one-stop platform to request for help for any emergency resources required during disasters. Currently, the portal focuses on facilitating an efficient medium for
                                        individuals and institutions to request assistance for necessities to fight COVID-19 pandemic such as oxygen cylinders, concentrators and safety gear such as masks, PPE sets, gloves, etc. Along with
                                        that, request for relief materials for flood displaced communities can also be made.
                                    </span>
                                </p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>What are the current ongoing projects implemented by Nepal Relief?
                                </a>

                                <p class="accordion-content">
                                    <span>
                                        In response to the COVID-19 pandemic, we have initiated Oxygen for Nepal campaign that primarily caters to the need of oxygen through provisions of oxygen cylinders and oxygen concentrators. We have
                                        already provided over 600 oxygen cylinders and three oxygen concentrators to patients in need. In partnership with civil- society organizations and the private sector, Oxygen for Nepal has also
                                        procured 10 Oxygen Generating Units. Each unit can serve 50 beds and 15 cylinders at the same time, 24 hours a day. That is 650 patients who will receive continuous oxygen at any given time.
                                    </span>

                                    <span>
                                        Along with the provision of these essential resources, we are also involved in the arrangement and distribution of basic safety gear such as gloves, masks, PPEs and sanitizers to the front-line
                                        workers. We have already distributed over 1600 PPE sets to different frontline workers all over Nepal.
                                    </span>

                                    <span>
                                        As part of the COVID-19 intervention, we launched #FeedTheWorkers campaign to help sustain the livelihoods of vulnerable communities of waste worker, daily wage labourers, children and the
                                        differently- abled. Through the campaign, over 1200 ration packages have been distributed in Kathmandu, Lalitpur, Bhaktapur, Nuwakot, Chitwan and Rautahat.
                                    </span>

                                    <span>
                                        As we were dealing with the COVID-19 crisis, the catastrophe caused by the monsoon floods led us to quickly respond through COVID-19 Monsoon Relief campaign. In collaboration with Nepal Share and
                                        other organizations, we have already reached over 500 families in flood-hit areas of Sindhupalchowk and Lamjung with food, medical and safety kit, daily essentials such as mosquito nets, tarpaulins
                                        and solar lamps.
                                    </span>
                                </p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>Why are we doing this and why are we also appealing to you?
                                </a>

                                <p class="accordion-content">
                                    <span>
                                        Because we love our country and its people. And because we believe we can, and should, help to solve the current crisis in whichever little or big way we can. We believe you love Nepal and its people
                                        too and will stand with us at this time.
                                    </span>
                                </p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>Where are the oxygen cylinders and oxygen generating units coming from?
                                </a>

                                <p class="accordion-content">
                                    <span>
                                        We were able to source 11 oxygen generating units from NOVAIR, an ISO 9001 and ISO 13485 certified French manufacturer specialized in the design and manufacture of the medical gas system. For now – 10
                                        of those have been procured. If we are able to bring in more money, we will negotiate the remaining one.
                                    </span>

                                    <span>
                                        As for the oxygen cylinders, we are making the procurements from China. We have already purchased over 300 oxygen cylinders and are in the process of transporting more oxygen cylinders to Nepal.
                                    </span>
                                </p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>How is the relief being managed for flood displaced communities?  
                                </a>

                                <p class="accordion-content">
                                    <span>
                                    We have launched #FillTheBucket campaign through which one can support a flood displaced family with average of 5 members at an amount of Rs. 3000. Besides, our supporting partners and other anonymous
                                    partners have provided us help to arrange the required relief materials.
                                    </span>
                                </p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>How can we donate?
                                </a>

                                <p class="accordion-content">
                                    <span>
                                        You can donate to us
                                    </span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="footer-container">
                    <img src="/map-assets/images/creasion.png" alt="" />
                    <p>Initiated by: CREASION</p>
                </div>
            </div>
        </footer>

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
                    <div class="navs">
                            <a href="{{route('faqs') }}"><span>FAQs</span> </a>
                            <a href="{{route('ofn-chapters') }}"><span>OFN Chapters</span></a>
                            <a href="{{route('success-stories') }}"><span>Success Stories</span></a>
                            <a href="{{route('covid-19-resources') }}"><span>COVID-19 Resources</span> </a>
                            <a href="{{route('important-links') }}"><span>Important Links</span></a>
                        </div>
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
    </body>
</html>
