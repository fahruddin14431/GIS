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
                    <li class="active">Kelompok Tani</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3"><!-- conten -->
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Kelompok Tani</strong>
                        <a href="?p=add_kelompok_tani" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelompok Tani</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1; 
                                $result = $crud->get("SELECT * FROM tb_kelompok_tani");
                                foreach ($result as $value): ?> 
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['kelompok_tani'] ?></td>
                                    <td>
                                        <a href="?p=edit_kelompok_tani&id_kelompok_tani=<?= $value['id_kelompok_tani']?>" class="btn btn-warning text-white"><i class="fa fa-pencil"></i> Ubah</a>
                                        <a href="?p=delete_kelompok_tani&id_kelompok_tani=<?= $value['id_kelompok_tani']?>" onClick="return confirm('Data Akan Dihapus !')"  class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
