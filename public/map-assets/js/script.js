import {
    districts,
    provinces
} from "../resources.js";


$('.sidebar-project').on('click',function(e){
    e.preventDefault();

    var projectID =$(this).data("id");
    
    axios.post('/filter-response', {
        'selectedProject': projectID,
        'selectedProvince': null,
        'selectedDistrict': null
    }).then((response) => {
        map.getSource('cylinders').setData(response.data);
        document.querySelector('#map-lists').innerHTML = "";
        buildLists(response.data)
    });
});

function buildLists(portalData) {
    portalData.features.forEach(function(data) {
        const latlng = data.geometry.coordinates



        var prop = data.properties;
        var indId = prop.individual_id;


        var name = indId ? prop.individual.name : prop.institution.name;


        var userRequests = prop.user_request.projects



        var requestedProjects = [];
        userRequests.forEach(function(request) {
            requestedProjects.push(request.title);

        })



        var projectColor;


        if (requestedProjects.length > 1) {
            projectColor = "main-color"
        } else if (requestedProjects == "Oxygen") {
            projectColor = "prj-oxy"


        } else if (requestedProjects == "COVID19 Safety Kit") {
            projectColor = "prj-cov"
        } else if (requestedProjects == "Essentials") {
            projectColor = "prj-ess"
        }

        var listingitems = `
                            <div class="list-wrap">
                                <div class="icon ${projectColor}">
                                    
                                </div>

                                <div class="des">
                                    <h4>${name}</h4>
                                    <p class= " forProject" > ${requestedProjects}</p>
                                    <div class="date">
                                        <p><ion-icon name="today-outline"></ion-icon><span>2021-07-08 </span> </p>
                                    </div>
                                  
                                </div>
                            </div>
                        `



        var listings = document.getElementById('map-lists');


        var listing = listings.appendChild(document.createElement('div'));
        listing.className = 'data-item';

        var link = listing.appendChild(document.createElement('a'));
        link.className = 'title';
        link.href = "#"
        link.id = 'link-' + prop.id;
        link.innerHTML = listingitems;



        link.addEventListener("click", () => {
            var coords = latlng;


            map.flyTo({
                center: coords,
                zoom: 10,
                essential: true,
            });
        })



    })
}


// Distirct with respect to province
provinces.forEach((item) => {
    $("#provinces").append(`<option value="${item.id}">${item.title}</option>`);
});

$("#provinces").on("change", function() {
    var provinceID = $(this).val();
    $("#districts").html("");
    $("#districts").siblings(".nice-select").remove();
    var items = districts.filter((item) => {
        return item.province == provinceID;
    });
    $("#districts").append(`<option value="-1" selected disabled>Select</option>`);
    items.forEach((item) => {
        $("#districts").append(`<option value="${item.id}">${item.title}</option>`);
    });
    $("select.for-niceselect").niceSelect();

});



$(".update").on("click", (e) => {
    e.preventDefault();
    var selectedProject = $("#projects").val();
    var selectedProvince = $("#provinces").val();

    var selectedDistrict = $("#districts").val();
    axios.post('/filter-response', {
        'selectedProject': selectedProject,
        'selectedProvince': selectedProvince,
        'selectedDistrict': selectedDistrict
    }).then((response) => {
        map.getSource('cylinders').setData(response.data);
        document.querySelector('#map-lists').innerHTML = "";
        buildLists(response.data)
    });

    if(map.getLayer("poi-labels")) {
        map.removeLayer("poi-labels")
    }


    map.getStyle().layers.filter(layer => layer.type === 'line').forEach(item => {
        if (map.getLayer(item.id))
            map.removeLayer(item.id)
    })

    map.getStyle().layers.filter(layer => layer.id.includes('district-labels--')).forEach(item => {
        if (map.getLayer(item.id))
            map.removeLayer(item.id)
    })

    const currentTimestamp = Date.now()
    map.addSource(`district-label${selectedProvince}-${currentTimestamp}`, {
        'type': 'geojson',
        'data': `../json/coordinates/label-province${selectedProvince}.geojson`
    });

    map.addLayer({
        'id': `district-labels--${Date.now()}`,
        'type': 'symbol',
        'source': `district-label${selectedProvince}-${currentTimestamp}`,
        'layout': {
            'text-field': ['get', 'description'],
            'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
            'text-radial-offset': 0.5,
            'text-justify': 'auto',
            "text-size": 10,
        }
    });

    map.addSource(`province${selectedProvince}-${currentTimestamp}`, {
        type: "geojson",
        data: `../json/coordinates/Province-${selectedProvince}.geojson`,
    });

    map.addLayer({
        id: `province${selectedProvince}-${Date.now()}-fill`,
        type: "line",
        source: `province${selectedProvince}-${currentTimestamp}`,
        layout: {},
        paint: {
            "line-color": "#0a405a",
        },
    });

// Map Fly to the Province
    if (selectedProvince == 3) {
        var bbox = [
            83.9187728578849,
            26.9191431698797,
            86.5727626547517,
            28.3862845807188
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });


    } else if (selectedProvince == 1) {
        var bbox = [
            86.1559244137852,
            26.3478370706644,
            88.2016677742523,
            28.1130612812249
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });


    } else if (selectedProvince == 2) {
        var bbox = [
            84.4838899645418,
            26.4223835197793,
            87.0145939355117,
            27.4631790982775
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });

    } else if (selectedProvince == 4) {
        var bbox = [
            82.8773532738891,
            27.4378229151552,
            85.1980163344162,
            29.3313585169325
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });

    } else if (selectedProvince == 5) {
        var bbox = [
            81.0592010293138,
            27.3302256530826,
            84.0285404645032,
            28.8692280187363
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });

    } else if (selectedProvince == 6) {
        var bbox = [
            80.981051199357,
            28.1511099599141,
            83.6804351913103,
            30.4472763312289
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });

    } else if (selectedProvince == 7) {
        var bbox = [
            80.0585843010467,
            28.3945109653181,
            81.8082221152366,
            30.246722785497
        ];
        map.fitBounds(bbox, {
            padding: {
                top: 100,
                bottom: 25,
                left: 15,
                right: 5
            }
        });

    }



});




$("#reset-btn").on('click', (e) => {

    map.getStyle().layers.filter(layer => layer.type === 'line').forEach(item => {
        if (map.getLayer(item.id))
            map.removeLayer(item.id)
    })

    map.getStyle().layers.filter(layer => layer.type === 'symbol').forEach(item => {
        if (map.getLayer(item.id))
            map.removeLayer(item.id)
    })

  


    const timeStamp = Date.now()

    map.addSource(`province-label-${timeStamp}`, {
        'type': 'geojson',
        'data': "/map-assets/json/label-province.geojson"
    });

    map.addLayer({
        'id': `poi-labels${timeStamp}`,
        'type': 'symbol',
        'source': `province-label-${timeStamp}`,
        'layout': {
            'text-field': ['get', 'description'],
            'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
            'text-radial-offset': 0.5,
            'text-justify': 'auto',
            "text-size": 10,
        }
    });

    


    map.addSource(`urban-areas-${timeStamp}`, {
        type: "geojson",
        data: "/map-assets/json/region.geojson",
    });

    map.addLayer({
        id: `urban-areas-${timeStamp}-fill`,
        type: "line",
        source: `urban-areas-${timeStamp}`,
        layout: {},
        paint: {
            "line-color": "#0a405a",
        },
    });

    map.flyTo({
        center: [83.0074, 28.4764],
        zoom: 6, // note the camel-case
    })

})

$("select.for-niceselect").niceSelect();




// Map
mapboxgl.accessToken = "pk.eyJ1Ijoia2hhZGthc2FtIiwiYSI6ImNrcmJzczRjZDBlMzQzMHBleXUzN3I5cnQifQ.lptDLSXqDJJ-foFLioGRZA";


var map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/khadkasam/ckrbta57z0vdg17n0161z08k6",

    center: [84.1074, 28.4764],
    minZoom: 6.7, // note the camel-case
    maxZoom: 20
});


function loadMapData() { 
    axios.post('/filter-response', {
        'selectedProject': null,
        'selectedProvince': null,
        'selectedDistrict': null
    }).then((response) => {
        map.getSource('cylinders').setData(response.data);




        var portalData = response.data;

        buildLists(portalData);

        

    });
}


// Map

map.on('load', function() {

    
    
    loadMapData();


    // loading the respond data
    map.addSource("cylinders", {
        type: "geojson",
        data: "/map-assets/cylinder.json",
        cluster: true,
        clusterMaxZoom: 14,
        clusterRadius: 70,
    });

    // boundry for the states
    map.addSource("urban-areas", {
        type: "geojson",
        data: "/map-assets/json/region.geojson",
    });

    map.addLayer({
        id: "urban-areas-fill",
        type: "line",
        source: "urban-areas",
        layout: {
            // 'text-field': ['get', 'description'],


        },
        paint: {
            "line-color": "#0a405a",
        },
    });




    map.addLayer({
        id: "clusters",
        type: "circle",
        source: "cylinders",
        filter: ["has", "point_count"],
        paint: {
            "circle-color": ["step", ["get", "point_count"], "#51bbd6", 100, "#f1f075", 750, "#f28cb1"],
            "circle-radius": ["step", ["get", "point_count"], 12 ,43 , 2],
        },
    });

    map.addLayer({
        id: "cluster-count",
        type: "symbol",
        iconAllowOverlay: true,
        source: "cylinders",
        filter: ["has", "point_count"],
        layout: {
            "text-field": "{point_count_abbreviated}",

            "text-size": 12,
        },
    });

    map.addLayer({
        id: "unclustered-point",
        type: "symbol",
        iconAllowOverlay: true,
        source: "cylinders",
        filter: ["!", ["has", "point_count"]],
        layout: {
            "icon-image": "pulsing-dot",
        },
    });

    map.addSource("dot-point", {
        type: "geojson",
        data: {
            type: "FeatureCollection",
            features: [{
                type: "Feature",
                geometry: {
                    type: "Point",
                    coordinates: [83.0074, 28.4764], // icon position [lng, lat]
                },
            }, ],
        },
    });

    var size = 80;

    var pulsingDot = {
        width: size,
        height: size,
        data: new Uint8Array(size * size * 4),

        // When the layer is added to the map,
        // get the rendering context for the map canvas.
        onAdd: function() {
            var canvas = document.createElement("canvas");
            canvas.width = this.width;
            canvas.height = this.height;
            this.context = canvas.getContext("2d");
        },

        // Call once before every frame where the icon will be used.
        render: function() {
            var duration = 1000;
            var t = (performance.now() % duration) / duration;

            var radius = (size / 2) * 0.3;
            var outerRadius = (size / 2) * 0.4 * t + radius;
            var context = this.context;

            // Draw the outer circle.
            context.clearRect(0, 0, this.width, this.height);
            context.beginPath();
            context.arc(this.width / 2, this.height / 2, outerRadius, 0, Math.PI * 2);
            context.fillStyle = "rgba(195, 234, 243," + (1 - t) + ")";
            context.fill();

            // Draw the inner circle.
            context.beginPath();
            context.arc(this.width / 2, this.height / 2, radius, 0, Math.PI * 2);
            context.fillStyle = "#11b4da";
            context.strokeStyle = "white";
            context.lineWidth = 2 + 4 * (1 - t);
            context.fill();
            context.stroke();

            // Update this image's data with data from the canvas.
            this.data = context.getImageData(0, 0, this.width, this.height).data;

            // Continuously repaint the map, resulting
            // in the smooth animation of the dot.
            map.triggerRepaint();

            // Return `true` to let the map know that the image was updated.
            return true;
        },
    };

    map.addImage("pulsing-dot", pulsingDot, {
        pixelRatio: 2
    });

    // inspect a cluster on click
    map.on("click", "clusters", function(e) {
        var features = map.queryRenderedFeatures(e.point, {
            layers: ["clusters"],
        });
        var clusterId = features[0].properties.cluster_id;
        map.getSource("cylinders").getClusterExpansionZoom(clusterId, function(err, zoom) {
            if (err) return;

            map.easeTo({
                center: features[0].geometry.coordinates,
                zoom: zoom,
            });
        });
    });




    map.on("click", "unclustered-point", function(e) {
        loadMarkerData(e);
        // console.log(e)
    });


    map.addSource('province-label', {
        'type': 'geojson',
        'data': "/map-assets/json/label-province.geojson"
    });

    map.addLayer({
        'id': 'poi-labels',
        'type': 'symbol',
        'iconAllowOverlay': 'true',
        'source': 'province-label',
        'layout': {
            'text-field': ['get', 'description'],
            'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
            'text-radial-offset': 0.5,
            'text-justify': 'auto',
            
            "text-size": 11,
        }
    });



});

function loadMarkerData(e) {
    var coordinates = e.features[0].geometry.coordinates.slice();

    var type = e.features[0].properties.type;

    var institution = e.features[0].properties.institution_id;
    var individual = e.features[0].properties.individual_id;


    var getInstitution = JSON.parse(e.features[0].properties.institution)
    var getIndividual = JSON.parse(e.features[0].properties.individual)


    var name = getInstitution ? getInstitution.name : getIndividual.name,
        provinceId = getInstitution ? getInstitution.province.id : getIndividual.province.id,
        provinceName = getInstitution ? getInstitution.province.title : getIndividual.province.title,
        districtId = getInstitution ? getInstitution.district.id : getIndividual.district.id,
        districtName = getInstitution ? getInstitution.district.title : getIndividual.district.title,
        localLevelName = getInstitution ? getInstitution.local_level?.title : getIndividual.local_level?.title,


        type = getInstitution ? getInstitution.organizationType : "Individual",
        elective1 = getInstitution ? getInstitution.contact_person : getIndividual.gender,
        elective2 = getInstitution ? getInstitution.contact_number : getIndividual.age;

    var inventories = JSON.parse(e.features[0].properties.inventories);

    var items = "";

    inventories.forEach(inventory => {
        var inventoryTitle = inventory.title;
        var inventoryQunatity = inventory.pivot.quantity;

        // console.log(inventoryTitle, inventoryQunatity)

        items = items + `
                            <div class="info-desc-wrapper">
                                <div class="data">
                                    <div class="title">${inventoryTitle}</div>
                                    <div class="text">${inventoryQunatity}</div>

                                </div>
                            </div>

                            `


    });




    new mapboxgl.Popup()
        .setLngLat(coordinates)
        .setHTML(
            `
                        <div class="info-card">
                            <div class="info-card-header">
                                <h4>${name}</h4>


                            </div>

                            <div class="info-desc">
                                <div class="info-desc-wrapper">
                                    <div class="data">
                                        <div class="title">${getInstitution ? "Instituation Type" : "Respone Type"}</div>
                                        <div class="text">${type}</div>

                                    </div>

                                </div>
                                <div class="info-desc-wrapper">
                                    <div class="data">
                                        <div class="title">Province</div>
                                        <div class="text">${provinceName}</div>

                                    </div>
                                </div>
                                <div class="info-desc-wrapper">
                                    <div class="data">
                                        <div class="title">${getInstitution ? "Contact Person" : "Gender"}</div>
                                        <div class="text">${elective1}</div>
                                    </div>
                                </div>
                                <div class="info-desc-wrapper">
                                    <div class="data">
                                        <div class="title">District</div>
                                        <div class="text">${districtName}</div>
                                    </div>
                                </div>

                                <div class="info-desc-wrapper">
                                    <div class="data">
                                        <div class="title">${getInstitution ? "Contact Number" : "Age"}</div>
                                        <div class="text">${elective2 ? elective2 :""}</div>
                                    </div>
                                </div>
                                <div class="info-desc-wrapper">
                                    <div class="data">
                                        <div class="title">Municipality</div>
                                        <div class="text">${ localLevelName || '' }</div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <h5>Responded with</h5>
                                <div class="item-wrapper">
                                    ${items}

                                </div>
                            </div>

                        </div>
                        `
        )
        .addTo(map);


        

}