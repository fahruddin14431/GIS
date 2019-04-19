<?php 

session_start();

include 'app/helper/crud.php';

$pengguna    = $_POST['pengguna'];
$kata_sandi  = md5($_POST['kata_sandi']);

// fecth data
$crud   = new Crud();
$sql    = "SELECT * FROM tb_pengguna WHERE pengguna = '$pengguna' AND kata_sandi = '$kata_sandi'";
$check  = $crud->checkIfExist($sql);

//check condition
$_SESSION['sess_user'] = array();
if ($check) {
    $res = $crud->get($sql)[0];
    $_SESSION['sess_user'] = array(
        "sess_id_pengguna"  => $res['id_pengguna'],
        "sess_peran"        => $res['peran']
    );
    header("location:app/index.php?page=view_dashbord");
}else{
    echo "<script>alert('Login Gagal'); window.location = '../gis';</script>";
}

?>