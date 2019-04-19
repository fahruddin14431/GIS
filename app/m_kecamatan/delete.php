
<?php  
$id_kecamatan = $_GET['id_kecamatan'];

$res  = $crud->delete("tb_kecamatan","id_kecamatan = '$id_kecamatan'");

if ($res) {
    header("location:index.php?p=view_kecamatan");
}
?>