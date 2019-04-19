
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_kecamatan = $crud->makeId("tb_kecamatan", "id_kecamatan", "KEC");

$data = array(
    'id_kecamatan'  => $id_kecamatan,
    'kecamatan'     => $_POST['kecamatan'], 
    'luas_tanah'    => $_POST['luas_tanah'], 
    
);
$res = $crud->post("tb_kecamatan",$data);

if ($res) {
    header("location:../index.php?p=view_kecamatan");
}

?>