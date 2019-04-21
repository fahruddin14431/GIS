
<?php  
$id_kelompok_tani = $_GET['id_kelompok_tani'];

$res  = $crud->delete("tb_kelompok_tani","id_kelompok_tani = '$id_kelompok_tani'");

if ($res) {
    header("location:index.php?p=view_kelompok_tani");
}
?>