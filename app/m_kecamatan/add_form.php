<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kecamatan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Master</a></li>
                    <li class="active">Tambah Kecamatan</li>
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
                        <strong>Tambah Kecamatan</strong> 
                    </div>

                    <form action="m_kecamatan/add.php" method="post">
                        <div class="card-body card-block">
                            
                            <div class="form-group">
                                <label class="form-control-label">Kecamatan</label>
                                <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Luas Tanah</label>
                                <input type="number" name="luas_tanah" placeholder="Luas Tanah" class="form-control" required>
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