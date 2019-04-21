<?php 

$id_kelompok_tani = $_GET['id_kelompok_tani'];
$result = $crud->get("SELECT * FROM tb_kelompok_tani WHERE id_kelompok_tani = '$id_kelompok_tani'")[0];

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kelompok tani</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Master</a></li>
                    <li class="active">Ubah Kelompok tani</li>
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
                        <strong>Ubah Kelompok tani</strong> 
                    </div>

                    <form action="m_kelompok_tani/edit.php" method="post">
                        <div class="card-body card-block">
                            
                            <div class="form-group">
                                <label class="form-control-label">Kelompok tani</label>
                                <input type="text" value="<?= $result['kelompok_tani']?>" name="kelompok_tani" placeholder="Kelompok tani" class="form-control" required>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="id_kelompok_tani" value="<?= $id_kelompok_tani ?>" class="btn btn-success">
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