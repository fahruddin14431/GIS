<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Hasil Panen Dan Pemetaan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Transaksi</a></li>
                    <li class="active">Hasil Panen Dan Pemetaan</li>
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
                        <strong class="card-title">Hasil Panen Dan Pemetaan</strong>
                        <?php if($_SESSION['sess_user']['sess_peran']=="admin"): ?>
                        <a href="?p=add_pemetaan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="row form-group">

                                <div class="col-12 col-md-3">
                                    <label for="">Pilih Kecamatan</label>
                                    <select name="select" id="kecamatan" class="js-example-basic-single form-control" required>
                                        <option value="all"> -- Pilih Kecamatan --</option>
                                        <?php
                                            $result = $crud->get("SELECT * FROM tb_kecamatan");
                                            foreach ($result as $value) :
                                        ?>
                                        <option value="<?= $value['id_kecamatan']?>"><?= $value['kecamatan']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label for="">Pilih Kelompok Tani</label>
                                    <select name="select" id="kelompok_tani" class="js-example-basic-single form-control" required>
                                        <option value=""> -- Pilih Kelompok Tani --</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="">Pilih Jenis Lahan Panen</label>
                                    <select name="select" id="jenis_lahan" class="js-example-basic-single form-control" required>
                                        <option value="all"> -- Pilih Semua Jenis Lahan Panen --</option>
                                        <?php
                                            $result = $crud->get("SELECT * FROM tb_jenis_lahan");
                                            foreach ($result as $value) :
                                        ?>
                                        <option value="<?= $value['id_jenis_lahan']?>"><?= $value['jenis_lahan']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="col-12 col-md-2">
                                    <br>
                                    <button id="terapkan" class="btn btn-primary"><i class="fa fa-search"></i> Terapkan</button>
                                </div>

                            </div>
                        </form>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1JuL6Rq5rIp65eOde2mBngeVlLr8lqEg&libraries=drawing&callback=initMap"></script>
<script>
// $( document ).ready(function() {
//     $('#map').html('<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d251754.74929241597!2d118.9542483!3d-9.6238314!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4ac38e5758f27d%3A0xc25885a40f28f950!2sKabupaten+Sumba+Barat+Daya%2C+Nusa+Tenggara+Tim.!5e0!3m2!1sid!2sid!4v1561940455626!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0"></iframe>');
//     $('.place-card-large').css('display', 'none');
// });
initMap();
var map, polyline, marker, i;
var infowindow = new google.maps.InfoWindow();
    function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
             zoom: 9,
             center: {lat: -9.429470, lng: 119.237701},
             mapTypeId: 'roadmap'
           });

           // Define the LatLng coordinates for the polygon.
           var triangleCoords = [
              {lat :-9.828258, lng: 119.680313},
              {lat :-9.818399, lng: 119.689942},
              {lat :-9.813269, lng: 119.689423},
              {lat :-9.810986999999898, lng: 119.68447},
              {lat :-9.80417, lng: 119.68445},
              {lat :-9.80489, lng: 119.675727},
              {lat :-9.79722, lng: 119.671944},
              {lat :-9.794445, lng: 119.67778},
              {lat :-9.79008, lng: 119.67840500000011},
              {lat :-9.78167, lng: 119.671944},
              {lat :-9.776625, lng: 119.659675},
              {lat :-9.777153, lng: 119.652015},
              {lat :-9.78412, lng: 119.646392},
              {lat :-9.78868, lng: 119.650224},
              {lat :-9.79402, lng: 119.646461},
              {lat :-9.7925, lng: 119.64111400000013},
              {lat :-9.79972, lng: 119.62777700000015},
              {lat :-9.79805, lng: 119.6175},
              {lat :-9.77917, lng: 119.62750300000016},
              {lat :-9.77417, lng: 119.625274},
              {lat :-9.76741, lng: 119.62687600000015},
              {lat :-9.763128, lng: 119.61634900000013},
              {lat :-9.775, lng: 119.60972600000014},
              {lat :-9.777779999999893, lng: 119.601936},
              {lat :-9.77778, lng: 119.59278},
              {lat :-9.76271, lng: 119.58496100000013},
              {lat :-9.76667, lng: 119.577775},
              {lat :-9.76944, lng: 119.56565200000011},
              {lat :-9.76403, lng: 119.559181},
              {lat :-9.76639, lng: 119.55417000000011},
              {lat :-9.76306, lng: 119.55},
              {lat :-9.75223, lng: 119.54696700000011},
              {lat :-9.75327, lng: 119.54200800000012},
              {lat :-9.76609, lng: 119.535355},
              {lat :-9.76528, lng: 119.52333},
              {lat :-9.75972, lng: 119.51805900000011},
              {lat :-9.75862, lng: 119.510207},
              {lat :-9.75323, lng: 119.504516},
              {lat :-9.755, lng: 119.501107},
              {lat :-9.75167, lng: 119.488328},
              {lat :-9.7437, lng: 119.480086},
              {lat :-9.74083, lng: 119.471389},
              {lat :-9.74221, lng: 119.45229},
              {lat :-9.75028, lng: 119.4475010000001},
              {lat :-9.75521, lng: 119.448044},
              {lat :-9.758055999999897, lng: 119.438889},
              {lat :-9.756666, lng: 119.4294440000001},
              {lat :-9.76083, lng: 119.41695},
              {lat :-9.76778, lng: 119.411942},
              {lat :-9.78028, lng: 119.40944700000011},
              {lat :-9.78833, lng: 119.41083500000013},
              {lat :-9.79722, lng: 119.39667},
              {lat :-9.79778, lng: 119.389167},
              {lat :-9.795277, lng: 119.383057},
              {lat :-9.78556, lng: 119.37417},
              {lat :-9.77587, lng: 119.37388},
              {lat :-9.76, lng: 119.349724},
              {lat :-9.75611, lng: 119.34166800000014},
              {lat :-9.76167, lng: 119.331658},
              {lat :-9.7675, lng: 119.3308320000001},
              {lat :-9.76694, lng: 119.320273},
              {lat :-9.759998, lng: 119.310279},
              {lat :-9.74889, lng: 119.306945},
              {lat :-9.74389, lng: 119.30194},
              {lat :-9.74944, lng: 119.28694},
              {lat :-9.74472, lng: 119.27333},
              {lat :-9.74744, lng: 119.25002},
              {lat :-9.74194, lng: 119.243332},
              {lat :-9.74472, lng: 119.23139200000014},
              {lat :-9.73778, lng: 119.221108},
              {lat :-9.74361, lng: 119.19972},
              {lat :-9.75, lng: 119.19278},
              {lat :-9.75481, lng: 119.193129},
              {lat :-9.75972, lng: 119.18833},
              {lat :-9.745277, lng: 119.179726},
              {lat :-9.74055, lng: 119.172501},
              {lat :-9.74243, lng: 119.16342},
              {lat :-9.73611, lng: 119.158058},
              {lat :-9.72806, lng: 119.13777800000014},
              {lat :-9.73111, lng: 119.13472},
              {lat :-9.73, lng: 119.12805100000014},
              {lat :-9.72583, lng: 119.123046},
              {lat :-9.72722, lng: 119.11805700000014},
              {lat :-9.721108999999899, lng: 119.11584},
              {lat :-9.71361, lng: 119.10555},
              {lat :-9.71528, lng: 119.09166700000014},
              {lat :-9.7025, lng: 119.07389},
              {lat :-9.69722, lng: 119.057717},
              {lat :-9.69278, lng: 119.048331},
              {lat :-9.68917, lng: 119.04667},
              {lat :-9.67806, lng: 119.03},
              {lat :-9.6675, lng: 119.020546},
              {lat :-9.65222, lng: 119.013335},
              {lat :-9.64667, lng: 119.00889},
              {lat :-9.635833, lng: 119.0066690000001},
              {lat :-9.62861, lng: 119.002776},
              {lat :-9.63055, lng: 119},
              {lat :-9.62528, lng: 118.99360700000011},
              {lat :-9.6125, lng: 118.985001},
              {lat :-9.60803, lng: 118.98481600000014},
              {lat :-9.59944, lng: 118.97361},
              {lat :-9.59194, lng: 118.966392},
              {lat :-9.58194, lng: 118.95333},
              {lat :-9.57056, lng: 118.941666},
              {lat :-9.561112, lng: 118.93},
              {lat :-9.55083, lng: 118.92694},
              {lat :-9.53389, lng: 118.93222100000014},
              {lat :-9.51611, lng: 118.94027800000015},
              {lat :-9.50194, lng: 118.95194200000014},
              {lat :-9.49555, lng: 118.955001},
              {lat :-9.47944, lng: 118.96694100000013},
              {lat :-9.47639, lng: 118.971107},
              {lat :-9.45667, lng: 118.98889},
              {lat :-9.446388999999897, lng: 119.00361},
              {lat :-9.43694, lng: 119.02417},
              {lat :-9.430278, lng: 119.033891},
              {lat :-9.42417, lng: 119.052498},
              {lat :-9.4241, lng: 119.06733},
              {lat :-9.42222, lng: 119.07584},
              {lat :-9.417777, lng: 119.082778},
              {lat :-9.420548, lng: 119.087776},
              {lat :-9.42167, lng: 119.09999900000014},
              {lat :-9.41639, lng: 119.10806300000013},
              {lat :-9.408609999999896, lng: 119.114166},
              {lat :-9.395831, lng: 119.13667},
              {lat :-9.38504, lng: 119.15134400000011},
              {lat :-9.375828999999896, lng: 119.171669},
              {lat :-9.37382, lng: 119.19347},
              {lat :-9.37722, lng: 119.198891},
              {lat :-9.38694, lng: 119.20778},
              {lat :-9.39306, lng: 119.218612},
              {lat :-9.386459, lng: 119.228561},
              {lat :-9.379369, lng: 119.234352},
              {lat :-9.37556, lng: 119.24500300000011},
              {lat :-9.369164999999896, lng: 119.256111},
              {lat :-9.36861, lng: 119.27111000000014},
              {lat :-9.35857, lng: 119.2883680000001},
              {lat :-9.35694, lng: 119.30111000000011},
              {lat :-9.366666999999893, lng: 119.315833},
              {lat :-9.37222, lng: 119.328613},
              {lat :-9.37639, lng: 119.34722},
              {lat :-9.37972, lng: 119.37500000000011},
              {lat :-9.38306, lng: 119.38444500000014},
              {lat :-9.38265, lng: 119.394721},
              {lat :-9.373404, lng: 119.409232},
              {lat :-9.37522, lng: 119.42734},
              {lat :-9.363609, lng: 119.443046},
              {lat :-9.35799, lng: 119.46730700000012},
              {lat :-9.35861, lng: 119.477502},
              {lat :-9.366666999999893, lng: 119.48777800000016},
              {lat :-9.368609, lng: 119.50083},
              {lat :-9.37556, lng: 119.51389},
              {lat :-9.37778, lng: 119.52167},
              {lat :-9.37778, lng: 119.53806},
              {lat :-9.37056, lng: 119.55417000000011},
              {lat :-9.35502, lng: 119.571931},
              {lat :-9.35028, lng: 119.58445},
              {lat :-9.34611, lng: 119.60445},
              {lat :-9.34556, lng: 119.63111100000015},
              {lat :-9.356668999999897, lng: 119.64194},
              {lat :-9.369164999999896, lng: 119.658606},
              {lat :-9.37056, lng: 119.663887},
              {lat :-9.378332, lng: 119.67611000000011},
              {lat :-9.38278, lng: 119.686943},
              {lat :-9.38528, lng: 119.71083},
              {lat :-9.38944, lng: 119.730278},
              {lat :-9.38805, lng: 119.746665},
              {lat :-9.38528, lng: 119.76166400000011},
              {lat :-9.39639, lng: 119.772224},
              {lat :-9.39972, lng: 119.785},
              {lat :-9.39896, lng: 119.79654},
              {lat :-9.39444, lng: 119.805832},
              {lat :-9.37944, lng: 119.821663},
              {lat :-9.36372, lng: 119.83417},
              {lat :-9.35, lng: 119.853607},
              {lat :-9.33984, lng: 119.870988},
              {lat :-9.36525, lng: 119.90538},
              {lat :-9.376458999999898, lng: 119.914398},
              {lat :-9.39651, lng: 119.9209},
              {lat :-9.41394, lng: 119.92282200000011},
              {lat :-9.43458, lng: 119.92691800000011},
              {lat :-9.45347, lng: 119.93329700000015},
              {lat :-9.464789, lng: 119.92841},
              {lat :-9.47851, lng: 119.92846},
              {lat :-9.49596, lng: 119.92459},
              {lat :-9.50714, lng: 119.920226},
              {lat :-9.51263, lng: 119.89494400000012},
              {lat :-9.51783, lng: 119.884697},
              {lat :-9.52599, lng: 119.879822},
              {lat :-9.53464, lng: 119.87847},
              {lat :-9.5518, lng: 119.87085800000011},
              {lat :-9.56183, lng: 119.86218},
              {lat :-9.56949, lng: 119.848686},
              {lat :-9.574119, lng: 119.845726},
              {lat :-9.5797, lng: 119.8475810000001},
              {lat :-9.596701, lng: 119.84496200000012},
              {lat :-9.634639, lng: 119.84777},
              {lat :-9.638437999999894, lng: 119.84548900000016},
              {lat :-9.6514, lng: 119.843957},
              {lat :-9.66313, lng: 119.83968},
              {lat :-9.669378, lng: 119.83383100000015},
              {lat :-9.67093, lng: 119.82746},
              {lat :-9.66553, lng: 119.80506800000012},
              {lat :-9.6672, lng: 119.77892},
              {lat :-9.67049, lng: 119.744591},
              {lat :-9.66837, lng: 119.732902},
              {lat :-9.67319, lng: 119.72731},
              {lat :-9.69132, lng: 119.723236},
              {lat :-9.70877, lng: 119.72205},
              {lat :-9.722888999999896, lng: 119.726837},
              {lat :-9.73975, lng: 119.75321},
              {lat :-9.75434, lng: 119.75988700000016},
              {lat :-9.7644, lng: 119.7593},
              {lat :-9.771481, lng: 119.756181},
              {lat :-9.785541, lng: 119.73921900000016},
              {lat :-9.791899, lng: 119.737198},
              {lat :-9.82079, lng: 119.73688},
              {lat :-9.82814, lng: 119.742417},
              {lat :-9.83437, lng: 119.740753},
              {lat :-9.83709, lng: 119.73137},
              {lat :-9.83723, lng: 119.721841},
              {lat :-9.83349, lng: 119.70706},
              {lat :-9.83077, lng: 119.687043},
              {lat :-9.828258, lng: 119.680313},
           ];

           // Construct the polygon.
           var bermudaTriangle = new google.maps.Polygon({
             paths: triangleCoords,
             strokeColor: '#FF0000',
             strokeOpacity: 0.8,
             strokeWeight: 1,
             fillOpacity: 0
           });
           bermudaTriangle.setMap(map);

}

// var areas
let area, color, k_tani, kecamatan, j_lahan, total_produksi, areas, res = ""
function getAllPeta(kecamatan ="all", lahan="all", kelompok_tani="all"){
    let param = {id_kecamatan : kecamatan, id_jenis_lahan : lahan, id_kelompok_tani : kelompok_tani};
    $.post("t_pemetaan/get_all_peta.php",param, function(data, status){

        res = JSON.parse(data)
        $.each(res, function(i,items) {
            area            = JSON.parse(res[i].lat_lng)
            color           = res[i].warna
            k_tani          = res[i].kelompok_tani
            kecamatan       = res[i].kecamatan
            j_lahan         = res[i].jenis_lahan
            total_produksi  = res[i].total_produksi+" Ton"

            // Construct the polygon.
            areas = null
            areas = new google.maps.Polygon({
                paths: area,
                strokeColor: color,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color,
                fillOpacity: 0.35,
            })

            //pop up
            google.maps.event.addListener(areas, 'click', function(e) {
                infowindow.setContent(
                    `<div>
                        <table>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>`+ kecamatan +`</td>
                            </tr>
                            <tr>
                                <td>Kelompok Tani</td>
                                <td>:</td>
                                <td>`+ k_tani +`</td>
                            </tr>
                            <tr>
                                <td>Jenis Lahan Panen</td>
                                <td>:</td>
                                <td>` + j_lahan + `</td>
                            </tr>
                            <tr>
                                <td>Total Produksi</td>
                                <td>:</td>
                                <td>` + total_produksi + `</td>
                            </tr>
                        </table>
                    </div>`
                );
                infowindow.setPosition(e.latLng);
                infowindow.open(map);
            });
        })

        areas.setMap(map);
        var bounds = new google.maps.LatLngBounds();
          areas.getPath().forEach(function (path, index) {
            bounds.extend(path);
          });
        map.fitBounds(bounds);
    })

}

$("#terapkan").click(function(e){
    e.preventDefault()
    let id_kecamatan     = document.getElementById("kecamatan").value
    let id_jenis_lahan   = document.getElementById("jenis_lahan").value
    let id_kelompok_tani = document.getElementById("kelompok_tani").value

    if(id_kecamatan == "" ||id_jenis_lahan == "" || id_kelompok_tani == ""){
        swal({
            title: "Pesan",
            text: "Lengkapi Form",
            icon: "warning",
        })
    }else{
        getAllPeta(id_kecamatan, id_jenis_lahan, id_kelompok_tani)
        // console.log(areas);
        // console.log(map);
    }
})

$("#kecamatan").change(function(){
    let id_kecamatan = $(this).val()
    $.post("t_pemetaan/get_kelompok_tani.php", {id_kecamatan : id_kecamatan}, function(data, status){
        $("#kelompok_tani").html(data)
    })
})
</script>
