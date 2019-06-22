<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kelompok Tani</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Master</a></li>
                    <li class="active">Tambah Kelompok Tani</li>
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
                        <strong>Tambah Kelompok Tani</strong> 
                    </div>

                    <form action="m_kelompok_tani/add.php" method="post">
                        <div class="card-body card-block">
                            
                            <div class="form-group">
                                <label class="form-control-label">Kelompok Tani</label>
                                <input type="text" name="kelompok_tani" placeholder="Kelompok Tani" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Kecamatan</label>
                                <select name="id_kecamatan" class="js-example-basic-single form-control" required>
                                    <option value=""> -- Pilih Kecamatan --</option>
                                    <?php 
                                        $result = $crud->get("SELECT * FROM tb_kecamatan");
                                        foreach ($result as $value) :
                                    ?>
                                    <option value="<?= $value['id_kecamatan']?>"><?= $value['kecamatan']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Pengguna</label>
                                <input type="text" name="pengguna" placeholder="Pengguna" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Kata Sandi</label>
                                <input type="password" name="kata_sandi" placeholder="Kata Sandi" class="form-control" required>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
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