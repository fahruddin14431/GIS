<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_jenis_lahan = $_POST['id_jenis_lahan'];

$data = array(
    'jenis_lahan'  => $_POST['jenis_lahan'], 
    'luas_tanah'   => $_POST['luas_tanah'],
    'warna'        => $_POST['warna'],
);

$res = $crud->update("tb_jenis_lahan",$data, "id_jenis_lahan = '$id_jenis_lahan'");

if ($res) {
    header("location:../index.php?p=view_jenis_lahan");
}

?>