<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dokumentasi Pekerjaan</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= site_url('managerumum/dashboard') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('managerumum/dokgampek') ?>">Dokumentasi Pekerjaan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Dokumentasi Pekerjaan</h4>
                        <a class="btn btn-primary ml-auto" href="<?= base_url('managerumum/dokgampek/tambah_dokgampek')?>">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Tambah Dokumentasi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                <th>ID Jadwal Service</th>
                                <th>Nama Pelanggan</th>
                                <th>Status</th>
                                <th>Terdaftar Tanggal</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <?php $dokgampek_id = $row->dokgampek_id;?>
                                    <td><?= $row->jadser_id;?></td>
                                    <td><?= $row->dokgampek_nama;?></td>
                                    <td>
                                        <?php if($row->dokgampek_status == '0'):?>
                                            <span class="badge badge-primary">Proses Validasi</span>
                                        <?php elseif($row->dokgampek_status == '1'):?>
                                            <span class="badge badge-success">Disetujui</span>
                                        <?php elseif($row->dokgampek_status == '2'):?>
                                            <span class="badge badge-danger">Ditolak</span>
                                        <?php endif;?>
                                    </td>
                                    <td><?= $row->dokgampek_datecreate;?></td>                                   
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a href="<?= base_url()?>managerumum/dokgampek/detail_dokgampek/<?= $dokgampek_id;?>"><i class="fa fa-eye"></i></a>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a href="<?= base_url()?>managerumum/dokgampek/edit_dokgampek/<?= $dokgampek_id;?>"><i class="fa fa-edit"></i></a>                                             
                                            </button>
                                            <?php if($row->dokgampek_status == '0'):?>
                                                <button type="button" data-toggle="tooltip" title="" class="btn-link"><a id="dokgampek-setuju" href="<?= base_url()?>managerumum/dokgampek/setuju_dokgampek/<?= $dokgampek_id;?>"><i class="fa fa-check"></i></a>                   
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="" class="btn-link"><a id="dokgampek-tolak" href="<?= base_url()?>managerumum/dokgampek/tolak_dokgampek/<?= $dokgampek_id;?>"><i class="fa fa-times"></i></a>                   
                                                </button>
                                            <?php endif;?>
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a id="tombol-hapus" href="<?= base_url()?>managerumum/dokgampek/hapus_dokgampek/<?= $dokgampek_id;?>"><i class="fa fa-trash"></i></a>                   
                                            </button>                                           
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>