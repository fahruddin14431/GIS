
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_kelompok_tani = $crud->makeId("tb_kelompok_tani", "id_kelompok_tani", "KTN");

$data = array(
    'id_kelompok_tani'  => $id_kelompok_tani,
    'kelompok_tani'     => $_POST['kelompok_tani'], 
    
);
$res = $crud->post("tb_kelompok_tani",$data);

if ($res) {
    header("location:../index.php?p=view_kelompok_tani");
}

?>