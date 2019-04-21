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
                        <div class="form-horizontal">
                            <div class="row form-group">
                                <div class="col-12 col-md-3">
                                    <select name="select" id="select" class="form-control">
                                        <option value=""> -- Pilih Kecamatan --</option>
                                        <?php 
                                            $result = $crud->get("SELECT * FROM tb_kecamatan");
                                            foreach ($result as $value) :
                                        ?>
                                        <option value="<?= $value['id_kecamatan']?>"><?= $value['kecamatan']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="col-12 col-md-3">
                                    <select name="select" id="select" class="form-control">
                                        <option value=""> -- Pilih Jenis Lahan --</option>
                                        <?php 
                                            $result = $crud->get("SELECT * FROM tb_jenis_lahan");
                                            foreach ($result as $value) :
                                        ?>
                                        <option value="<?= $value['id_jenis_lahan']?>"><?= $value['jenis_lahan']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="col-12 col-md-3">
                                    <select name="select" id="select" class="form-control">
                                        <option value=""> -- Pilih Kelompok Tani --</option>
                                        <?php 
                                            $result = $crud->get("SELECT * FROM tb_kelompok_tani");
                                            foreach ($result as $value) :
                                        ?>
                                        <option value="<?= $value['id_kelompok_tani']?>"><?= $value['kelompok_tani']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="map" style="min-height:400px"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="save" class="btn btn-success">
                                <i class="fa fa-check"></i> Simpan
                        </button>
                        <button type="reset" id="reset" class="btn btn-danger">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
        <!-- /# row -->
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Gmaps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1JuL6Rq5rIp65eOde2mBngeVlLr8lqEg&libraries=drawing&callback=initMap"></script>
<script>
initMap();

var json_poly
function initMap() {

    var mapOptions = {
        zoom: 13,
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

            latLng_poly = {"lat" : lat_poly, "lng" :lng_poly};
            newCordinates_poly.push(latLng_poly);
        }

        json_poly = newCordinates_poly;
        
        
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
    }

}

$("#save").click(function(){
     console.log(json_poly);

    var bermudaTriangle = new google.maps.Polygon({
            paths: json_poly,
            strokeColor: '#FF2200',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF2200',
            fillOpacity: 0.35
        });
    bermudaTriangle.setMap(map);

});

$("#reset").click(function(){
    json_poly = "";
    initMap();
});

</script>