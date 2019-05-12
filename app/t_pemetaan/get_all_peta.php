
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_kecamatan       = $_POST['id_kecamatan'];
$id_jenis_lahan     = $_POST['id_jenis_lahan'];
$id_kelompok_tani   = $_POST['id_kelompok_tani'];

$filter = "";
if($id_kecamatan <> "all"){
    $filter .= " AND tk.id_kecamatan = '$id_kecamatan'";
}
if($id_jenis_lahan <> "all"){
    $filter .= " AND tjl.id_jenis_lahan = '$id_jenis_lahan'";
}
if($id_kelompok_tani <> "all"){
    $filter .= " AND tkt.id_kelompok_tani = '$id_kelompok_tani'";
}

$result = $crud->get("SELECT 
                        tp.id_pemetaan,
                        tkt.kelompok_tani,
                        tjl.jenis_lahan,
                        tjl.warna,
                        tk.kecamatan,
                        tp.lat_lng
                    FROM tb_pemetaan AS tp
                    INNER JOIN tb_kelompok_tani AS tkt
                    ON tp.id_kelompok_tani = tkt.id_kelompok_tani
                    INNER JOIN tb_kecamatan AS tk
                    ON tp.id_kecamatan = tk.id_kecamatan
                    INNER JOIN tb_jenis_lahan AS tjl
                    ON tp.id_jenis_lahan = tjl.id_jenis_lahan ". $filter);
                    
echo json_encode($result);

?>