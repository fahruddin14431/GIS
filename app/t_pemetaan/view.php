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
                    <li class="active">Pemetaan</li>
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
                        <h4>Pemetaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="map" id="map-3" style="min-height:450px"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
        <!-- /# row -->
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Gmaps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1JuL6Rq5rIp65eOde2mBngeVlLr8lqEg"></script>
<script>
    initMap();

    function initMap() {
        var mapProp= {
            center:new google.maps.LatLng(-9.596159,119.178992),
            zoom:10,
        };


        var map = new google.maps.Map(document.getElementById("map-3"),mapProp);


        // Define the LatLng coordinates for the polygon's path.
        var triangleCoords = [
          {lat: -9.375373, lng: 118.915240},
          {lat: -9.321171, lng: 119.338029},
          {lat: -9.824920, lng: 119.372346},
          {lat: -9.803268, lng: 118.864451}
        ];

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
    }

</script>