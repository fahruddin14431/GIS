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
                        <button id="clear">clear</button>
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
initMap();
var map, polyline, marker, i;
var infowindow = new google.maps.InfoWindow();
function initMap() {    

    var mapOptions = {
        zoom: 9,
        center: new google.maps.LatLng(-9.429470, 119.237701),
        mapTypeId: google.maps.MapTypeId.terrain
    };

    map = new google.maps.Map(document.getElementById('map'),mapOptions);    
    // getAllPeta()
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
            areas = new google.maps.Polygon({
                paths: area,
                strokeColor: color,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color,
                fillOpacity: 0.35,
            })      

            areas.setMap(null) 
            areas.setMap(map)   
            
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
        // console.log(res)
        // console.log(map)
        
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
        areas.setMap(null)
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

$("#clear").click(function(){    
    areas.setMap(null)
})

</script>
