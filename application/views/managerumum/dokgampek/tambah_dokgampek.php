<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Forms</h4>
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
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('managerumum/dokgampek/tambah_dokgampek')?>">Tambah Dokumentasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Dokumentasi</div>
                </div>
                <form method="POST" action="<?= base_url().'managerumum/dokgampek/simpan_dokgampek'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <input type="hidden" name="dokgampek_id" value="<?= $dokgampek_id;?>" class="form-control" readonly>
                                
                                <div class="form-group mb-3 <?= form_error('jadser_id') ? 'has-error' : null?>">
                                    <label for="id_jadser">Jadwal Service</label>
                                    <select name="jadser_id" class="form-control">
                                        <?php foreach ($jadser as $row) { ?>
                                            <option value="<?= $row->jadser_id;?>"><?= $row->jadser_id." - ".$row->jadser_nama; "selected";?></option>
                                        <?php }?>
                                    </select>
                                    <small style="color: red;"><?= form_error('jadser_id')?></small>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="nopem_dokgampek">Nota Pembelian</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_nopem" id="nopem_dokgampek" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="kargar_dokgampek">Kartu Garansi</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_kargar" id="kargar_dokgampek" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="parbar_dokgampek">Part Baru (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_parbar" id="parbar_dokgampek">
                                        </div>
                                    </div>
                                </div>   

                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="fotpek1_dokgampek">Foto Pekerjaan 1</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_fotpek1" id="fotpek1_dokgampek" required>
                                        </div>    
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="fotpek2_dokgampek">Foto Pekerjaan 2 (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_fotpek2" id="fotpek2_dokgampek">
                                        </div>    
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="fotpek3_dokgampek">Foto Pekerjaan 3 (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_fotpek3" id="fotpek3_dokgampek">
                                        </div>    
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="nsu_dokgampek">Nomor Seri Unit</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_nsu" id="nsu_dokgampek" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="modun_dokgampek">Model Unit</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_modun" id="modun_dokgampek" required>
                                        </div>    
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="doklai_dokgampek">Dokumentasi Lainnya (Opsional)</label>
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="dokgampek_doklai" id="doklai_dokgampek">
                                        </div>
                                    </div>
                                </div>   

                            </div>
                        </div>
                    </div>
                    <div class="card-action pull-right">
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                        <a href="<?= site_url('managerumum/dokgampek')?>" type="submit" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>