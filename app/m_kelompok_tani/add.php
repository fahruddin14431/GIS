
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_kelompok_tani = $crud->makeId("tb_kelompok_tani", "id_kelompok_tani", "KTN");
$id_pengguna      = $crud->makeId("tb_pengguna", "id_pengguna", "PEN");

$data1 = array(
    'id_pengguna'   => $id_pengguna,
    'pengguna'      => $_POST['pengguna'], 
    'kata_sandi'    => md5($_POST['kata_sandi']) 
    
);
$res1 = $crud->post("tb_pengguna",$data1);

$data = array(
    'id_kelompok_tani'  => $id_kelompok_tani,
    'kelompok_tani'     => $_POST['kelompok_tani'], 
    'id_kecamatan'      => $_POST['id_kecamatan'], 
    'id_pengguna'       => $id_pengguna,
    
);
$res = $crud->post("tb_kelompok_tani",$data);

if ($res1 && $res) {
    header("location:../index.php?p=view_kelompok_tani");
}

?>