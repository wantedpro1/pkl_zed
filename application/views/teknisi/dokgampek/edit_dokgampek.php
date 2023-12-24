<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Forms</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= site_url('teknisi/dashboard') ?>">
                    <i class="flaticon-home"></i>
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
                <a href="<?= base_url('teknisi/dokgampek/edit_dokgampek')?>">Edit Dokumentasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Dokumentasi</div>
                </div>
                <form method="POST" action="<?= base_url().'teknisi/dokgampek/update_dokgampek'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <input type="hidden" name="dokgampek_id" value="<?= $data['dokgampek_id'];?>" class="form-control" readonly>
                                <input type="hidden" name="jadser_id" value="<?= $data['jadser_id'];?>" class="form-control" readonly>
                                <input type="hidden" name="dokgampek_nama" value="<?= $data['dokgampek_nama'];?>" class="form-control" readonly>
                                <input type="hidden" name="dokgampek_datecreate" value="<?= $data['dokgampek_datecreate'];?>" class="form-control" readonly>
                                
                                <div class="form-group mb-3">
                                    <label for="id_jadser">Jadwal Service</label>
                                    <input type="text" value="<?= $data['jadser_id'].' - '.$data['dokgampek_nama'];?>" class="form-control" id="id_jadser" readonly>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="nopem_dokgampek">Nota Pembelian</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_nopem" id="nopem_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_nopem'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_nopem'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="kargar_dokgampek">Kartu Garansi</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_kargar" id="kargar_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_kargar'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_kargar'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="parbar_dokgampek">Part Baru (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_parbar" id="parbar_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_parbar'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_parbar'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>
                                    </div>                                   
                                </div>   

                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="fotpek1_dokgampek">Foto Pekerjaan 1</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_fotpek1" id="fotpek1_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_fotpek1'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_fotpek1'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>    
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="fotpek2_dokgampek">Foto Pekerjaan 2 (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_fotpek2" id="fotpek2_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_fotpek2'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_fotpek2'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>    
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="fotpek3_dokgampek">Foto Pekerjaan 3 (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_fotpek3" id="fotpek3_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_fotpek3'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_fotpek3'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>    
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="nsu_dokgampek">Nomor Seri Unit</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_nsu" id="nsu_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_nsu'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_nsu'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="modun_dokgampek">Model Unit</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_modun" id="modun_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_modun'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_modun'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>    
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="doklai_dokgampek">Dokumentasi Lainnya (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_doklai" id="doklai_dokgampek">
                                            Dokumentasi Sebelumnya: 
                                            <?php if (!empty($data['dokgampek_doklai'])):?>                                              
                                                <a href="<?= base_url().'assets/dokumentasi/'.$data['jadser_id'].' '.str_replace( ':', '.', $data['dokgampek_datecreate']).' - '.$data['dokgampek_nama'].'/'.$data['dokgampek_doklai'];?>">Lihat</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>   

                            </div>
                        </div>
                    </div>
                    <div class="card-action pull-right">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="<?= site_url('teknisi/dokgampek')?>" type="submit" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>