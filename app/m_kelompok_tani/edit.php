<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_kelompok_tani = $_POST['id_kelompok_tani'];

$data = array(
    'kelompok_tani' => $_POST['kelompok_tani'], 
    'id_kecamatan'  => $_POST['id_kecamatan'], 
);

$res = $crud->update("tb_kelompok_tani",$data, "id_kelompok_tani = '$id_kelompok_tani'");

if ($res) {
    header("location:../index.php?p=view_kelompok_tani");
}

?>