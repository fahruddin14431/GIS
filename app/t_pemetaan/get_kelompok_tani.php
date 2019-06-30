<?php 
    include "../helper/crud.php";
    $crud = new Crud();
    $id_kecamatan = $_POST['id_kecamatan'];
?>
<option value="all"> -- Pilih Kelompok Tani --</option>
<?php 
    $result = $crud->get("SELECT * FROM tb_kelompok_tani WHERE id_kecamatan = '$id_kecamatan'");
    foreach ($result as $value) :
?>
<option value="<?= $value['id_kelompok_tani']?>"><?= $value['kelompok_tani']?></option>
<?php endforeach ?>