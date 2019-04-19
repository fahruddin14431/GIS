<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_kecamatan = $_POST['id_kecamatan'];

$data = array(
    'kecamatan'    => $_POST['kecamatan'], 
    'luas_tanah'   => $_POST['luas_tanah']
);

$res = $crud->update("tb_kecamatan",$data, "id_kecamatan = '$id_kecamatan'");

if ($res) {
    header("location:../index.php?p=view_kecamatan");
}

?>