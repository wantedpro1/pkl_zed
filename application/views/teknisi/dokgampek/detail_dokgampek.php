<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dokumentasi Pekerjaan</h4>
        <ul class="breadcrumbs">
            <li class="nav-detail">
                <a href="<?= site_url('teknisi/dashboard') ?>">
                    <i class="flaticon-detail"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('teknisi/dokgampek') ?>">Dokumentasi Pekerjaan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('teknisi/dokgampek/detail_dokgampek') ?>">Detail Dokumentasi Pekerjaan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h4 class="card-title">Dokumentasi Pekerjaan</h4></div>
                        <div class="col-6">
                            <a class="btn btn-danger ml-auto pull-right" href="<?= site_url('teknisi/dokgampek')?>">
                                <span class="btn-label">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                Kembali
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="true">Detail Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-doc1-tab" data-toggle="pill" href="#pills-doc1" role="tab" aria-controls="pills-doc1" aria-selected="false">Dokumentasi 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-doc2-tab" data-toggle="pill" href="#pills-doc2" role="tab" aria-controls="pills-doc2" aria-selected="false">Dokumentasi 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-doc3-tab" data-toggle="pill" href="#pills-doc3" role="tab" aria-controls="pills-doc3" aria-selected="false">Dokumentasi 3</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                            <p>ID Dokumentasi: <?=$data['dokgampek_id'];?></p>
                            <p>ID Jadwal: <?=$data['jadser_id'];?></p>
                            <p>Nama Pelanggan: <?=$data['dokgampek_nama'];?></p>
                            <p>Ditambahkan oleh: <?=$data['dokgampek_createby'];?></p>
                            <p>Tanggal Dibuat: <?=$data['dokgampek_datecreate'];?></p>
                            <p>Nama File: <?= $lokasi = $data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'];?></p>
                            <p>Status: 
                                <?php if($data['dokgampek_status'] == '0'):?>
                                    <span class="badge badge-primary">Proses Validasi</span>
                                <?php elseif($data['dokgampek_status'] == '1'):?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php elseif($data['dokgampek_status'] == '2'):?>
                                    <span class="badge badge-danger">Ditolak</span>
                                <?php endif;?>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-doc1" role="tabpanel" aria-labelledby="pills-doc1-tab">
                            <div class="row">
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Nomor Pembelian</b>
                                    <img name="dokgampek_nopem" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_nopem'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_nopem'];?></p>
                                </div>
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Kartu Garansi</b>    
                                    <img name="dokgampek_kargar" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_kargar'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_kargar'];?></p>
                                </div>
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Nomor Seri Unit</b>
                                    <img name="dokgampek_nsu" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_nsu'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_nsu'];?></p>
                                </div>
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="pills-doc2" role="tabpanel" aria-labelledby="pills-doc2-tab">
                            <div class="row">
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Foto Pekerjaan 1</b>
                                    <img name="dokgampek_fotpek1" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_fotpek1'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_fotpek1'];?></p>
                                </div>
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Foto Pekerjaan 2</b>
                                    <img name="dokgampek_fotpek2" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_fotpek2'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_fotpek2'];?></p>
                                </div>
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Foto Pekerjaan 3</b>
                                    <img name="dokgampek_fotpek3" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_fotpek3'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_fotpek3'];?></p>
                                </div>
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="pills-doc3" role="tabpanel" aria-labelledby="pills-doc3-tab">
                            <div class="row">
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Model Unit</b>
                                    <img name="dokgampek_modun" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_modun'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_modun'];?></p>
                                </div>
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Part Baru</b>
                                    <img name="dokgampek_parbar" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_parbar'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_parbar'];?></p>
                                </div>
                                <div class="col-6 col-sm-4 text-center">
                                    <b>Dokumentasi Lainnya</b>
                                    <img name="dokgampek_doklai" src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$data['dokgampek_doklai'];?>" style="width:100%;" alt="">
                                    <br>
                                    <p><?=$data['dokgampek_doklai'];?></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>