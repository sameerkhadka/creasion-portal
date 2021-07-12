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

    <style>
        #map-select { 
                position: relative;
                top: 0;
                bottom: 0;
                width: 100%;
                height: 300px; 
        }
    </style>

</head>

<body>

<header>
        <div class="container">
            <div class="header-wrap">
                <div class="header-logo">
                    <a href="index.html">
                        NEPAL RELIEF <span>PORTAL</span>
                    </a>
                </div>

                <div class="head-nav">
                    <a href="#section-map" class="active">Respond Maps</a>
                    <a href="#section-demographs">DEMOGRAPHICS</a>
                    <a href="#section-respond">Responds</a>
                </div>

                <div class="request">
                    <a href=""><ion-icon name="keypad-outline"></ion-icon> Request</a>
                </div>
            </div>
        </div>
    </header>


<section class="section-request">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="general-info">
                        <h5>General Information</h5>

                        <div class="user-type">
                            <p>
                                <input type="radio" id="individual" name="user-type" checked>
                                <label for="individual">Individual</label>
                            </p>

                            <p>
                                <input type="radio" id="institution" name="user-type" >
                                <label for="institution">Institution</label>
                            </p>
                        </div>

                        <div class="info-form" id="individual-form">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-card">
                                        <p>Full Name</p>
                                        <input type="text" value="Yogesh Karki">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Contact Number</p>
                                        <input type="number" value="9860895638">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-card">
                                        <p>Gender</p>
                                        <input type="text" value="Male">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-card">
                                        <p>Age</p>
                                        <input type="number" value="34">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-form" id="institution-form">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-card">
                                        <p>Organization's Name</p>
                                        <input type="text" value="Creasion Nepal">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Organization's Type</p>
                                        <input type="text" value="Hospital">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Organization's Address</p>
                                        <input type="text" value="Lazimpat, Kathmandu">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Contact Person</p>
                                        <input type="text" value="Yogesh Karki">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Contact Number</p>
                                        <input type="number" value="9860895638">
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        <div class="project-select">
                            <h5>Select Project</h5>

                            <div class="project-type">
                                <p>
                                    <input type="checkbox" id="oxygen" name="project-type" checked>
                                    <label for="oxygen">Oxygen</label>
                                </p>

                                <p>
                                    <input type="checkbox" id="covid19-safety" name="project-type" >
                                    <label for="covid19-safety">Covid 19 Safety Kit</label>
                                </p>

                                <p>
                                    <input type="checkbox" id="essential" name="project-type" >
                                    <label for="essential">Essentials</label>
                                </p>
                            </div>

                            <div class="upload-doc" id="individualOxygen">
                                <h5>Upload Document</h5>

                                <form action="/file-upload" class="dropzone">
                                    <div class="fallback">
                                      <input name="file" type="file" multiple />
                                    </div>
                                  </form>
                            </div>
                        </div>
                        
                    </div>

                </div>
    
                <div class="col-md-4">
                    <div class="location-info">
                        <h5>Relief Request Location</h5>

                        <div class="address-info-form" >
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="filter-card form-card">
                                        <p>Province</p>
                        
                                        <select id="provinces">
                                            <option value="-1" selected disabled>Select Province</option>
                                        </select>
                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="filter-card form-card">
                                        <p>District</p>
                        
                                        <select id="districts">
                                            <option value="-1" selected disabled>Select District</option>
                                        </select>
                        
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-card">
                                        <p>Local Address</p>
                                        <input type="text" value="Local Address">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-card location">
                                        <p>You can click on map to generate the location of your address</p>

                                        <div id="map-select"></div>
                                        <pre id="coordinates" class="coordinates"></pre>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="item-listing">
                        <h5>Oxygen</h5>

                        <div class="item-lists">
                            <p>
                                <input type="checkbox" id="oxygen_cylinder" name="inventories" >
                                <label for="oxygen_cylinder">Oxygen Cylinder</label>
                            </p>

                            <p>
                                <label for="" class="label-small">Qty</label>
                                <input type="text">
                            </p>

                            <p>
                                <label for="" class="label-small">Units</label>
                                <input type="text">
                            </p>
                        </div>

                        <div class="item-lists">
                            <p>
                                <input type="checkbox" id="oxygen_regulator" name="inventories" >
                                <label for="oxygen_regulator">Oxygen Regulator</label>
                            </p>

                            <p>
                                <label for="" class="label-small">Qty</label>
                                <input type="text">
                            </p>

                            <p>
                                <label for="" class="label-small">Units</label>
                                <input type="text">
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- <form action="{{ route('request') }}" method="POST">
        @csrf
        <label for="type">Who are you:</label>

        <select name="req_type" id="type">
            <option value="individual">Individual</option>
            <option value="institution">Institution</option>
        </select>
        <br>
        <br>

        Project:
        <select name="project">
            @foreach ($project as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select> <br> <br>
        Name: <input type="text" name="name"> <br> <br>

        <div id="individual" class="group">
            Gender:
            <select name="gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select> <br> <br>
            Age:<input type="number" name="age"> <br> <br>
        </div>

        <div id="institution" class="group">
            Institution type:
            <select name="type">
                <option selected></option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select> <br> <br>
            Contact Person:<input type="text" name="contact_person"> <br> <br>
        </div>
        Contact Number:<input type="text" name="phone"> <br> <br>    
        <div class="filter-card">
            <label>Province</label>

            <select name="province_id" id="provinces">
                <option value="-1" selected >Select</option>
            </select>

        </div>

        <div class="filter-card">
            <label>District</label>

            <select name="district_id" id="districts">
                <option value="-1" selected >Select</option>
            </select>

        </div>
        <div class="filter-card">
            <label>Municipality</label>

            <select name="local_level_id" id="municipalities">
                <option value="-1" selected >Select</option>
            </select>
        </div>
        Request Date:<input type="text" class="datepicker" name="date"> <br> <br>     
        Coordinates:<input type="text" name="coordinate"> <br> <br>
        <textarea name="detail" rows="4" cols="50"> Message </textarea> <br> <br>
        <button type="submit">Request</button>
    </form> -->
</body>

<script src="/map-assets/js/jquery.min.js"></script>
    <script src="/map-assets/js/bootstrap.js"></script>
    <script src="/map-assets/js/owl.carousel.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="/map-assets/js/chart.js"></script> -->

    <script>

var coordinates = document.getElementById('coordinates');
mapboxgl.accessToken = "pk.eyJ1IjoieW9nZXNoa2Fya2kiLCJhIjoiY2txZXphNHNlMGNybDJ1cXVmeXFiZzB1eSJ9.A7dJUR4ppKJDKWZypF_0lA";

var map = new mapboxgl.Map({
    container: "map-select",
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [84.0074, 28.4764],
    minZoom: 5, // note the camel-case
     maxZoom: 15
});
 
var marker = new mapboxgl.Marker({
draggable: true
})
.setLngLat([85.32399, 27.70254])
.addTo(map);
 
function onDragEnd() {
var lngLat = marker.getLngLat();
coordinates.style.display = 'block';
coordinates.innerHTML =
'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
}
 
marker.on('dragend', onDragEnd);

    map.addControl(
        new mapboxgl.GeolocateControl({
            positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
        })
    );

    </script>

    <script type="module" src="/map-assets/js/script.js"></script>
    <script type="module" src="/map-assets/js/request.js"></script>


<script type="module" src="{{ asset('js/custom.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.group').hide();
        $('#individual').show();
        $('#type').change(function() {
            $('.group').hide();
            $('#' + $(this).val()).show();
        })
    });
</script>
<!-- <script type="text/javascript">
    $(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-dd-mm'
        });
    });
</script> -->

<script>


var check = $("#individual").prop("checked");
if(check){
    $("#individual-form").addClass("activeTab");
}

$("#individual").on("click", function(){
    check = $(this).prop("checked");
    $("#institution-form").removeClass("activeTab");
    $("#individual-form").addClass("activeTab");
    
})

$("#institution").on("click", function(){
    check = $(this).prop("checked");
    $("#individual-form").removeClass("activeTab");
    $("#institution-form").addClass("activeTab");
})






</script>


</html>
