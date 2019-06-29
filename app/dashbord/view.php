<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3"><!-- conten -->
    <div class="animated fadeIn">
        <div class="col-sm-12 mb-4">
            <div class="card-group">

                <div class="card col-lg-4 col-md-6 no-padding bg-flat-color-1">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-map-marker text-light"></i>
                        </div>

                        <div class="h4 mb-0 text-light">
                            <span class="count"><?= $crud->getCount("tb_kecamatan")?></span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light">Total Kecamatan</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>

                <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                    <div class="card-body bg-flat-color-4">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-tags text-light"></i>
                        </div>
                        <div class="h4 mb-0 text-light">
                            <span class="count"><?= $crud->getCount("tb_jenis_lahan")?></span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light">Total Jenis Lahan Panen</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>

                <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                    <div class="card-body bg-flat-color-3">
                        <div class="h1 text-right mb-4">
                            <i class="fa fa-users text-light"></i>
                        </div>
                        <div class="h4 mb-0 text-light">
                            <span class="count"><?= $crud->getCount("tb_kelompok_tani")?></span>
                        </div>
                        <small class="text-light text-uppercase font-weight-bold">Total Kelompok Tani</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>

                <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                    <div class="card-body bg-flat-color-5">
                        <div class="h1 text-right text-light mb-4">
                            <i class="fa fa-map-o"></i>
                        </div>
                        <div class="h4 mb-0 text-light">
                            <span class="count"><?= $crud->getCount("tb_pemetaan")?></span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light">Total Hasil Panen Dan Pemetaan</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>