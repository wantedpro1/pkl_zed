<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Detail Data Garansi</h4>
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
                <a href="<?= site_url('teknisi/garansi/detail_garansi') ?>">Detail Data Garansi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Data Garansi <?=$data['garansi_id'];?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-2">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="false">
                                    <i class="flaticon-user-1"></i>
                                    Profil Konsumen
                                </a>
                                <a class="nav-link" id="v-pills-home-tab-icons" data-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
                                    <i class="flaticon-time"></i>
                                    Detail Garansi
                                </a>
                                <a class="nav-link" id="v-pills-tag-tab-icons" data-toggle="pill" href="#v-pills-tag-icons" role="tab" aria-controls="v-pills-tag-icons" aria-selected="false">
                                    <i class="flaticon-list"></i>
                                    Detail Pemesanan
                                </a>
                            </div>
                        </div>
                        <div class="col-7 col-md-10">
                            <div class="tab-content" id="v-pills-with-icon-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <p>ID Garansi: <?=$data['garansi_id'];?></p>
                                    <p>Nama Konsumen: <?=$data['garansi_nama'];?></p>
                                    <p>Alamat: <?=$data['garansi_alamat'];?></p>
                                    <p>Kota: <?=$data['garansi_kota'];?></p>
                                    <p>Telepon: <?=$data['garansi_telepon'];?></p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                    <p>Tanggal Laporan: <?=$data['garansi_tgllaporan'];?></p>
                                    <p>Tanggal Kunjungan: <?=$data['garansi_tglkunjungan'];?></p>
                                    <p>Tanggal Perbaikan: <?=$data['garansi_tglperbaikan'];?></p>
                                    <p>Tanggal Selesai: <?=$data['garansi_tglselesai'];?></p>
                                    <p>No. WO: <?=$data['garansi_nowo'];?></p>
                                    <p>No. Faktur: <?=$data['garansi_nofaktur'];?></p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-tag-icons" role="tabpanel" aria-labelledby="v-pills-tag-tab-icons">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Keluhan: <?=$data['garansi_keluhan'];?></p>
                                            <p>Produk: <?=$data['garansi_produk'];?></p>
                                            <p>Tanggal Beli: <?=$data['garansi_tglbeli'];?></p>
                                            <p>No. Bukti Kunjungan: <?=$data['garansi_nobukkun'];?></p>
                                            <p>B/L: <?=$data['garansi_bl'];?></p>
                                            <p>No. Seri: <?=$data['garansi_noseri'];?></p>
                                        </div>
                                        <div class="col-6">
                                            <p>Aktivitas Service: <?=$data['garansi_aktivser'];?></p>
                                            <p>No. Spare Part: <?=$data['garansi_partno'];?></p>
                                            <p>Ongkos Transport: Rp <?=$data['garansi_ongkostransport'];?></p>
                                            <p>Ongkos Kerja: Rp <?=$data['garansi_ongkoskerja'];?></p>
                                            <p>Total Ongkos: Rp <?=$data['garansi_totalongkos'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="<?= site_url('teknisi/garansi')?>" type="submit" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>