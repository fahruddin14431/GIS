<?php 

$id_jenis_lahan = $_GET['id_jenis_lahan'];
$result = $crud->get("SELECT * FROM tb_jenis_lahan WHERE id_jenis_lahan = '$id_jenis_lahan'")[0];

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jenis Lahan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Master</a></li>
                    <li class="active">Ubah Jenis Lahan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3"><!-- conten -->
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <strong>Ubah Jenis Lahan</strong> 
                    </div>

                    <form action="m_jenis_lahan/edit.php" method="post">
                        <div class="card-body card-block">
                            
                            <div class="form-group">
                                <label class="form-control-label">Jenis Lahan</label>
                                <input type="text" value="<?= $result['jenis_lahan']?>" name="jenis_lahan" placeholder="Jenis Lahan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Luas Tanah</label>
                                <input type="number" value="<?= $result['luas_tanah']?>" name="luas_tanah" placeholder="Luas Tanah" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Warna</label>
                                <select name="warna" required class="form-control">
                                    <option value=""> -- Pilih Warna --</option>
                                    <?php
                                         $arr_warna = array(
                                                        'red'    => "Merah", 
                                                        'yellow' => "Kuning", 
                                                        'green'  => "Hijau", 
                                            );
                                            foreach ($arr_warna as $key => $value) :
                                    ?>
                                    <option <?= $result['warna']==$key?"selected":""?> value="<?= $key ?>"> <?= $value ?> </option>
                                    <?php endforeach ?>

                                </select>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="id_jenis_lahan" value="<?= $id_jenis_lahan ?>" class="btn btn-success">
                                <i class="fa fa-check"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-danger">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>