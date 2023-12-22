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
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/jadser/detail_jadser') ?>">Detail Jadwal Service</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h4 class="card-title">Detail Jadwal Service <?=$data['jadser_id'];?></h4></div>
                        <div class="col-6">
                            <a class="btn btn-danger ml-auto pull-right" href="<?= site_url('admin/jadser')?>">
                                <span class="btn-label">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-2">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-profile-tab-con" data-toggle="pill" href="#v-pills-profile-con" role="tab" aria-controls="v-pills-profile-con" aria-selected="false">
                                    <i class="flaticon-user-1"></i>
                                    Profil Jadwal
                                </a>
                                <a class="nav-link" id="v-pills-detail-tab-prod" data-toggle="pill" href="#v-pills-detail-prod" role="tab" aria-controls="v-pills-detail-prod" aria-selected="true">
                                    <i class="flaticon-time"></i>
                                    Detail Barang
                                </a>
                            </div>
                        </div>
                        <div class="col-7 col-md-10">
                            <div class="tab-content" id="v-pills-with-icon-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-profile-con" role="tabpanel" aria-labelledby="v-pills-profile-tab-con">
                                    <p>ID Jadwal: <?=$data['jadser_id'];?></p>
                                    <p>Nama Pelanggan: <?=$data['jadser_nama'];?></p>
                                    <p>No Telepon: <?=$data['jadser_notelp'];?></p>
                                    <p>Alamat: <?=$data['jadser_alamat'];?></p>
                                    <p>Tanggal Didaftarkan: <?=$data['jadser_datecreate'];?></p>
                                    <p>Ditambahkan oleh: <?=$data['jadser_createby'];?></p>
                                    <p>Status:
                                        <?php if($data['jadser_status'] == '0'):?>
                                            <span class="badge badge-primary">Proses Perbaikan</span>
                                        <?php elseif($data['jadser_status'] == '1'):?>
                                            <span class="badge badge-warning">Selesai</span>
                                        <?php endif;?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-detail-prod" role="tabpanel" aria-labelledby="v-pills-detail-tab-prod">
                                    <p>Jenis Pekerjaan: <?=$data['jadser_jenpek'];?></p>
                                    <p>Merk Barang: <?=$data['jadser_merk'];?></p>
                                    <p>Jenis Barang: <?=$data['jadser_jenbar'];?></p>
                                    <p>Deskripsi Kerusakan: <?=$data['jadser_desker'];?></p>
                                    <p>Nomor Seri Unit: <?=$data['jadser_nsu'];?></p>
                                    <p>Model Unit: <?=$data['jadser_modun'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>