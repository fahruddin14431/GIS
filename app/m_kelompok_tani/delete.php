
<?php  
$id_pengguna = $_GET['id_pengguna'];

$res  = $crud->delete("tb_pengguna","id_pengguna = '$id_pengguna'");

if ($res) {
    header("location:index.php?p=view_kelompok_tani");
}
?>