<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jadwal Service</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= site_url('admin/dashboard') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/jadser') ?>">Jadwal Service</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Jadwal Service</h4>
                        <a class="btn btn-primary ml-auto" href="<?= base_url('admin/jadser/tambah_jadser')?>">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Tambah Jadwal
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                <th>Nama Pelanggan</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Merk Barang</th>
                                <th>Jenis Barang</th>
                                <th>Tanggal Didaftarkan</th>
                                <th>Status</th>
                                <th style="width: 50px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <?php $jadser_id = $row->jadser_id;?>
                                    <td><?= $row->jadser_nama;?></td>
                                    <td><?= $row->jadser_jenpek;?></td>
                                    <td><?= $row->jadser_merk;?></td>
                                    <td><?= $row->jadser_jenbar;?></td>
                                    <td><?= $row->jadser_datecreate;?></td>
                                    <td>
                                        <?php if($row->jadser_status == '0'):?>
                                            <span class="badge badge-primary">Proses Perbaikan</span>
                                        <?php elseif($row->jadser_status == '1'):?>
                                            <span class="badge badge-warning">Selesai</span>
                                        <?php endif;?>
                                    </td>                             
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a href="<?= base_url()?>admin/jadser/detail_jadser/<?= $jadser_id;?>"><i class="fa fa-eye"></i></a>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a href="<?= base_url()?>admin/jadser/edit_jadser/<?= $jadser_id;?>"><i class="fa fa-edit"></i></a>                                             
                                            </button>
                                            <?php if($row->jadser_status == '0'):?>
                                                <button type="button" data-toggle="tooltip" title="" class="btn-link"><a id="jadser-selesai" href="<?= base_url()?>admin/jadser/selesai_jadser/<?= $jadser_id;?>"><i class="fa fa-check"></i></a>                   
                                                </button>
                                            <?php endif;?>
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a id="tombol-hapus" href="<?= base_url()?>admin/jadser/hapus_jadser/<?= $jadser_id;?>"><i class="fa fa-trash"></i></a>                   
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