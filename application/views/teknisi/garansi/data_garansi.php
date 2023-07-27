<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Garansi</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('teknisi/garansi') ?>">Data Garansi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Garansi</h4>
                        <a class="btn btn-primary ml-auto" href="<?= base_url('teknisi/garansi/tambah_garansi')?>">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Tambah Garansi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                <th>Id Garansi</th>
                                <th>Tanggal Laporan</th>
                                <th>Nama Konsumen</th>
                                <th>Ongkos Transport</th>
                                <th>Ongkos Kerja</th>
                                <th>Total Ongkos</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->garansi_id;?></td>
                                    <td><?= $row->garansi_tgllaporan;?></td>
                                    <td><?= $row->garansi_nama;?></td>
                                    <td>Rp <?= $row->garansi_ongkostransport;?></td>
                                    <td>Rp <?= $row->garansi_ongkoskerja;?></td>
                                    <td>Rp <?= $row->garansi_totalongkos;?></td>                       
                                    <td>
                                        <div class="form-button-action">
                                            <?php $garansi_id = $row->garansi_id;?>
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Detail"><a href="<?= base_url()?>teknisi/garansi/detail_garansi/<?= $garansi_id;?>"><i class="fa fa-eye"></i></a>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit"><a href="<?= base_url()?>teknisi/garansi/edit_garansi/<?= $garansi_id;?>"><i class="fa fa-edit"></i></a>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Remove"><a id="tombol-hapus" href="<?= base_url()?>teknisi/garansi/hapus_garansi/<?= $garansi_id;?>"><i class="fa fa-times"></i></a>                   
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