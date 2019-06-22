
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_pemetaan = $crud->makeId("tb_pemetaan", "id_pemetaan", "PEM");

$data = array(
    'id_pemetaan'      => $id_pemetaan,
    'id_jenis_lahan'   => $_POST['id_jenis_lahan'], 
    'id_kelompok_tani' => $_POST['id_kelompok_tani'], 
    'lat_lng'          => $_POST['lat_lng'], 
    'total_produksi'   => $_POST['total_produksi']
    
);
echo $crud->post("tb_pemetaan",$data);


?>