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
        <div class="container">
            <div class="header-wrap">
                <div class="header-logo">
                    <a href="">
                        NEPAL RELIEF <span>PORTAL</span>
                    </a>
                </div>

                <div class="head-nav">
                    <a href="" class="active">Respond Maps</a>
                    <a href="">DEMOGRAPHICS</a>
                    <a href="">Responds</a>
                </div>

                <div class="request">
                    <a href=""><ion-icon name="keypad-outline"></ion-icon> Request</a>
                </div>
            </div>
        </div>
    </header>

    <section class="map-wrapper">
        <div id="map"></div>

        <section class="filter">
            <div class="filter-head">
                <h4><ion-icon name="funnel-outline"></ion-icon> Filter Results</h4>
            </div>

            <div class="filter-card-wrap">

                <div class="filter-card">
                    <label>Relief Project</label>
                    <select id="projects">
                        <option data-display="Select Project" value="" selected>Select Projects</option>
                        @foreach ($projects as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>

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



                <!-- <div class="filter-card">
                    <label>Institutions Type</label>

                    <select id="institutions_type">
                        <option  value="" select >Select All</option>
                        <option value="1">Community Hospital</option>
                        <option value="2">NGO</option>
                        <option value="3">Local Municipality</option>
                        <option value="4">Community Hospital</option>
                        <option value="5">Goverment Hospital</option>
                    </select>

                </div> -->

                <div class="filter-card">
                    <a href="" class="update">Update</a>
                    <button><ion-icon name="refresh-outline"></ion-icon> Reset</button>
                </div>
            </div>
        </section>
    </section>



    <script src="/map-assets/js/jquery.min.js"></script>
    <script src="/map-assets/js/bootstrap.js"></script>
    <script src="/map-assets/js/owl.carousel.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="module" src="/map-assets/js/script.js"></script>

</body>
</html>
