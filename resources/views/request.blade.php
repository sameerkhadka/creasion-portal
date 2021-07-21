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
    <link rel="stylesheet" href="{{ asset('css/vue2Dropzone.min.css') }}">

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
                    <a href="{{ route('index') }}">
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


<section class="section-request" id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="general-info">
                        <h5>General Information</h5>

                        <div class="user-type">
                            <p>
                                <input type="radio" id="individual" v-model="modelData.userType" name="user-type" value="individual">
                                <label for="individual">Individual</label>
                            </p>

                            <p>
                                <input type="radio" id="institution" v-model="modelData.userType" name="user-type" value="institution">
                                <label for="institution">Institution</label>
                            </p>
                        </div>

                        <div class="info-form" id="individual-form">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-card">
                                        <p>Full Name</p>
                                        <input type="text" v-model="modelData.individual.fullName">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Contact Number</p>
                                        <input type="number" v-model="modelData.individual.contactNumber">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-card">
                                        <p>Gender</p>
                                        <select class="form-select" v-model="modelData.individual.gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-card">
                                        <p>Age</p>
                                        <input type="number" v-model="modelData.individual.age">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-form" id="institution-form">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-card">
                                        <p>Organization's Name</p>
                                        <input type="text" v-model="modelData.institution.organizationName">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Organization's Type</p>
                                        <input type="text" v-model="modelData.institution.organizationType">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Organization's Address</p>
                                        <input type="text" v-model="modelData.institution.organizationAddress">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Contact Person</p>
                                        <input type="text" v-model="modelData.institution.contactPerson">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-card">
                                        <p>Contact Number</p>
                                        <input type="number" v-model="modelData.institution.contactNumber">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="project-select">
                            <h5>Select Project</h5>
                            <div class="project-type">
                                @foreach($projects as $item)
                                <p>
                                    <input type="checkbox" id="{{ $item->title }}" name="project-type" v-model.number="modelData.projectType" value="{{ $item->id }}">
                                    <label for="{{ $item->title }}">{{ $item->title }}</label>
                                </p>
                                @endforeach
                            </div>

                            <div class="project-req-date">
                                <h5>Request Date</h5>

                                <vuejs-datepicker v-model="modelData.requestDate"></vuejs-datepicker>
                            </div>

                            <div class="upload-doc" id="individualOxygen">
                                <h5>Files</h5>
                                <vue-dropzone v-model="modelData.files" ref="myVueDropzone" id="customdropzone"
                                @vdropzone-complete="successFileUpload"
                                @vdropzone-removed-file="deleteFile"
                                :options="{
                                    url: 'https://httpbin.org/post',
                                    thumbnailWidth: 150,
                                    maxFilesize: 12,
                                    headers: { 'My-Awesome-Header': 'header value' },
                                    addRemoveLinks: true,
                                }"></vue-dropzone>
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

                                        <select class="for-niceselect"  id="provinces">
                                            <option value="-1" selected disabled>Select Province</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="filter-card form-card">
                                        <p>District</p>

                                        <select class="for-niceselect" id="districts">
                                            <option value="-1" selected disabled>Select District</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-card">
                                        <p>Local Address</p>
                                        <input type="text" v-model="modelData.localAddress">
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

                <div class="col-md-4">
                    <div class="item-list-wrapper">
                        <div v-for="project in projectsWithInventories" class="item-listing">
                            <h5>@{{ project.title }}</h5>
                            <div v-for="inventoryItem in project.inventories" class="item-lists">
                                <p>
                                    <input type="checkbox" :id="inventoryItem.title" v-model="inventoryItem.checked" name="inventories" >
                                    <label :for="inventoryItem.title">@{{ inventoryItem.title }}</label>
                                </p>

                                <p>
                                    <label for="" class="label-small">Qty</label>
                                    <input :disabled = "!inventoryItem.checked" type="number" v-model.number="inventoryItem.requestQuantity">
                                </p>

                                <p>
                                    <label for="" class="label-small">Units</label>
                                    <select :disabled = "!inventoryItem.checked" class="form-select" v-model="inventoryItem.units">
                                        <option value="Pcs">Pcs </option>
                                        <option value="Boxes">Boxes </option>
                                        <option value="Packets">Packets</option>
                                    </select>

                                    {{-- <input :disabled = "!inventoryItem.checked" type="text" v-model.number="inventoryItem.units"> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <button class="btn btn-success" :disabled="processing" v-on:click="submit">Submit</button>
                </div>

            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vuejs-datepicker/1.6.2/vuejs-datepicker.min.js" integrity="sha512-SxUBqfNhPSntua7WUkt171HWx4SV4xoRm14vLNsdDR/kQiMn8iMUeopr8VahPpuvRjQKeOiMJTJFH5NHzNUHYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/vue2dropzone.js') }}"></script>
<script>
    class GetDefaultData {
        constructor(){
            this.data = {
                projects : @json($projects),
                myFiles:[],
                modelData: {
                    userType: 'individual',
                    projectType: [],
                    requestDate: '',
                    district : 0,
                    province : 0,
                    localAddress: '',
                    coordinate:[],
                    individual:{
                        fullName: "",
                        contactNumber: "",
                        gender: "Male",
                        age: "",
                    },
                    institution: {
                        organizationName: "",
                        organizationType: "",
                        organizationAddress: "",
                        contactPerson: "",
                        contactNumber: "",
                    }
                },
                processing:false
            };
        }
    }
    var myInitial = new GetDefaultData();
    var myDynamic = new GetDefaultData();
    var app = new Vue({
            el: '#app',
            components: {
                vuejsDatepicker,
                vueDropzone: vue2Dropzone
            },
            data: function(){
                return myDynamic.data;
            },
            computed:{
                projectsWithInventories : function() {
                    var tempthis = this;
                    return this.projects.filter(function(item){
                        return tempthis.modelData.projectType.includes(+item.id);
                    })
                }
            },
            watch:{
                'modelData.userType' :function(val){
                    if(val==='institution'){
                        this.modelData.individual = JSON.parse(JSON.stringify(myInitial.data.modelData.individual));
                    }
                    else if(val==='individual'){
                        this.modelData.institution = JSON.parse(JSON.stringify(myInitial.data.modelData.institution));
                    }
                }
            },
            methods:{
                deleteFile(file, error, xhr){
                    this.myFiles.splice(this.myFiles.indexOf(file), 1);

                },
                successFileUpload(file){
                    this.myFiles.push(file);
                },
                customFormatter(date) {
                     return moment(date).format('m/d/Y g:i A');
                },
                submit(){
                    var formData = new FormData(); // Currently empty
                    var tempthis = this;
                    this.processing = true;
                    if (this.myFiles.length > 0) {
                        for (var i = 0; i < this.myFiles.length; i++) {
                            let file = this.myFiles[i];
                            formData.append(`myFiles[${i}]`, file);
                        }
                    }
                    formData.append('modelData', JSON.stringify(this.modelData));
                    formData.append('projectWithInventories', JSON.stringify(this.projectsWithInventories));
                    axios.post('{{ route("request") }}',formData).then(function(response){
                        window.location = document.referrer;
                        tempthis.processing = false;
                    }).catch(function(error){
                        if (error.response) {
                            Object.values(error.response.data.errors).forEach((error)=>{
                                // toastr.error(error[0]);
                                toastr.error(error[0]);

                            })
                            tempthis.processing = false;

                        }
                    })
                },
                getProvince(){
                    this.modelData.province = +document.getElementById('provinces').value;
                },
                getDistrict(){
                    this.modelData.district = +document.getElementById('districts').value;
                },
                setLongLat(long,lat){
                    this.modelData.coordinate = [long,lat];
                },
                checkItem(inventoryItem){
                    if(inventoryItem.checked){
                        inventoryItem.requestQuantity = null;
                        inventoryItem.units = null;
                    }
                }
            }
        });
</script>
<script>
@if(session('success'))
    toastr.success('{{ session("success") }}')
@endif
</script>
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
    <script type="module" src="/map-assets/js/script.js"></script>
    <script type="module" src="/map-assets/js/request.js"></script>
    <!-- Load the `mapbox-gl-geocoder` plugin. -->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">
 
<!-- Promise polyfill script is required -->
<!-- to use Mapbox GL Geocoder in IE 11. -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

    <script>

        var coordinates = document.getElementById('coordinates');
        mapboxgl.accessToken = "pk.eyJ1Ijoia2hhZGthc2FtIiwiYSI6ImNrcmJzczRjZDBlMzQzMHBleXUzN3I5cnQifQ.lptDLSXqDJJ-foFLioGRZA";
        
        var map = new mapboxgl.Map({
            container: "map-select",
            style: 'mapbox://styles/khadkasam/ckrd0c9tc212j17qyc5egnqm3',
            center: [84.1074, 28.4764],
            minZoom: 5.4, // note the camel-case
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
        app.setLongLat(lngLat.lng,lngLat.lat);
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
        
            map.addControl(
            new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
            })
            );
            </script>
        

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
