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
                        <strong class="card-title">Pemetaan</strong>
                        <a href="?p=add_pemetaan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
    var map, polyline, marker, i;

    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(-9.429470, 119.237701),
        mapTypeId: google.maps.MapTypeId.terrain
    };

    map = new google.maps.Map(document.getElementById('map'),mapOptions);


    // Define the LatLng coordinates for the polygon's path.
    // var triangleCoords = [
    //       {lat: -9.375373, lng: 118.915240},
    //       {lat: -9.321171, lng: 119.338029},
    //       {lat: -9.824920, lng: 119.372346},
    //       {lat: -9.803268, lng: 118.864451}
    //     ];

        
         var triangleCoords = [
                                // {lat: -9.375373, lng: 118.915240},
                                // {lat: -9.321171, lng: 119.338029},
                                // {lat: -9.824920, lng: 119.372346},
                                // {lat: -9.803268, lng: 118.864451},
                                {lat: 7.687124197254878,    lng: 104.36221271875002},
                                {lat: 7.774216005176154,    lng: 131.34463459375002},
                                {lat: -8.952279019933842,   lng: 130.02627521875002},
                                {lat: -7.211995525492896,   lng: 105.24111896875002},
                                {lat: 6.3787134957259966,   lng: 104.18643146875002},
                                {lat: 7.687124197254904,    lng: 104.36221271875002}
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