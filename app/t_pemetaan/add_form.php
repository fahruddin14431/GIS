<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pemetaan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Transaksi</a></li>
                    <li><a href="#">Pemetaan</a></li>
                    <li class="active">Tambah Pemetaan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tambah Pemetaan</strong>
                    </div>
                    <div class="card-body">
                        <div id="map" style="min-height:450px"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
        <!-- /# row -->
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Gmaps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1JuL6Rq5rIp65eOde2mBngeVlLr8lqEg&libraries=drawing&callback=initMap"
         async defer></script>
<script>
initMap();

function initMap() {

    var mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(-9.429470, 119.237701),
        mapTypeId: google.maps.MapTypeId.terrain
    };

    map = new google.maps.Map(document.getElementById('map'),mapOptions);

        //garis area
        polyline = new google.maps.Polyline({
            strokeColor: 'red',
            strokeWeight: 3,
            editable: true,
            map: map
        });


        google.maps.event.addListener(map, 'click', firstDraw);
            google.maps.event.addListener(polyline.getPath(), "dragend", nextDraw);
            google.maps.event.addListener(polyline.getPath(), "insert_at", nextDraw);
            google.maps.event.addListener(polyline.getPath(), "remove_at", nextDraw);
            google.maps.event.addListener(polyline.getPath(), "set_at", nextDraw);

    //function polyline
    function nextDraw() {
            var cordinates_poly = polyline.getPath().getArray();
            var newCordinates_poly = [];

            for (var i = 0; i < cordinates_poly.length; i++){
                lat_poly = cordinates_poly[i].lat();
                lng_poly = cordinates_poly[i].lng();

                latLng_poly = [lat_poly, lng_poly];
                newCordinates_poly.push(latLng_poly);
            }

            var str_cordinates_poly = JSON.stringify(newCordinates_poly);
            var json_poly = "{\"cordiates\":"+str_cordinates_poly+"}";
            // document.getElementById('json_polyline').value = str_cordinates_poly;
            console.log(str_cordinates_poly);
            
    }

    function firstDraw(event) {
        var path = polyline.getPath();
        path.push(event.latLng);

        var cordinates_poly = polyline.getPath().getArray();
        var newCordinates_poly = [];

        for (var i = 0; i < cordinates_poly.length; i++){
            lat_poly = cordinates_poly[i].lat();
            lng_poly = cordinates_poly[i].lng();

            latLng_poly = [lat_poly, lng_poly];
            newCordinates_poly.push(latLng_poly);
        }

        var str_cordinates_poly = JSON.stringify(newCordinates_poly);
        var json_poly = "{\"cordiates\":"+str_cordinates_poly+"}";
        // document.getElementById('json_polyline').value = str_cordinates_poly;
        console.log(str_cordinates_poly);
    }

}
</script>