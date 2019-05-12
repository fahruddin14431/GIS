
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_jenis_lahan = $crud->makeId("tb_jenis_lahan", "id_jenis_lahan", "JLH");

$data = array(
    'id_jenis_lahan'  => $id_jenis_lahan,
    'jenis_lahan'     => $_POST['jenis_lahan'], 
    'luas_tanah'      => $_POST['luas_tanah'], 
    'warna'           => $_POST['warna'], 
    
);
$res = $crud->post("tb_jenis_lahan",$data);

if ($res) {
    header("location:../index.php?p=view_jenis_lahan");
}

?>
