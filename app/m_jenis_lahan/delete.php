
<?php  
$id_jenis_lahan = $_GET['id_jenis_lahan'];

$res  = $crud->delete("tb_jenis_lahan","id_jenis_lahan = '$id_jenis_lahan'");

if ($res) {
    header("location:index.php?p=view_jenis_lahan");
}
?>