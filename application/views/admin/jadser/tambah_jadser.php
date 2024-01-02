<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Forms</h4>
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
                <a href="<?= base_url('admin/jadser/tambah_jadser')?>">Tambah Jadwal</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Jadwal</div>
                </div>
                <form method="POST" action="<?= base_url().'admin/jadser/simpan_jadser'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>ID Jadwal Service</label>
                                            <input type="text" name="jadser_id" value="<?= $jadser_id;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Ditambahkan Tanggal</label>
                                            <input type="datetime" value="<?= date('Y-m-d H:i:s');?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3 <?= form_error('jadser_nama') ? 'has-error' : null?>">
                                            <label for="nama_jadser">Nama Pelanggan</label>
                                            <input type="text" name="jadser_nama" value="<?= set_value('jadser_nama')?>" class="form-control" id="nama_jadser" placeholder="Masukkan Nama Pelanggan">
                                            <small style="color: red;"><?= form_error('jadser_nama')?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3 <?= form_error('jadser_notelp') ? 'has-error' : null?>">
                                            <label for="notelp_jadser">No Telepon</label>
                                            <input type="text" name="jadser_notelp" value="<?= set_value('jadser_notelp')?>" class="form-control" id="notelp_jadser" placeholder="Masukkan No Telepon">
                                            <small style="color: red;"><?= form_error('jadser_notelp')?></small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Alamat</label>
                                            <textarea name="jadser_alamat" class="form-control" rows="4" placeholder="Alamat Pelanggan"></textarea>
                                        </div>
                                    </div>
                                </div>   

                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group mb-3 <?= form_error('jadser_jenpek') ? 'has-error' : null?>">
                                            <label for="jenpek_jadser">Jenis Pekerjaan</label>
                                            <select name="jadser_jenpek" class="form-control">
                                                <!-- <option value="-">Select</option> -->
                                                <?php foreach ($jenpek as $row) { ?>
                                                    <option value="<?= $row->jenpek_nama;?>"><?= $row->jenpek_nama; "selected";?></option>
                                                <?php }?>
                                            </select>
                                            <small style="color: red;"><?= form_error('jadser_jenpek')?></small>
                                        </div>
                                    </div>
                                </div>  
                              
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3 <?= form_error('jadser_merk') ? 'has-error' : null?>">
                                            <label for="merk_jadser">Merk Barang (Midea, Toshiba, Modena, dll)</label>
                                            <input type="text" name="jadser_merk" value="<?= set_value('jadser_merk')?>" class="form-control" id="merk_jadser" placeholder="Masukkan Merk Barang">
                                            <small style="color: red;"><?= form_error('jadser_merk')?></small>
                                        </div>  
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3 <?= form_error('jadser_jenbar') ? 'has-error' : null?>">
                                            <label for="jenbar_jadser">Jenis Barang (Kulkas, Air Cooler, AC Split, AC Casset, Mesin Cuci, dll)</label>
                                            <input type="text" name="jadser_jenbar" value="<?= set_value('jadser_jenbar')?>" class="form-control" id="jenbar_jadser" placeholder="Masukkan Merk Barang">
                                            <small style="color: red;"><?= form_error('jadser_jenbar')?></small>
                                        </div>      
                                    </div>
                                </div>   
                                
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Deskripsi Kerusakan</label>
                                            <textarea name="jadser_desker" class="form-control" rows="4" placeholder="Deskripsikan Kerusakan"></textarea>
                                        </div>
                                    </div>
                                </div>   
                                
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3 <?= form_error('jadser_nsu') ? 'has-error' : null?>">
                                            <label for="nsu_jadser">Nomor Seri Unit</label>
                                            <input type="text" name="jadser_nsu" value="<?= set_value('jadser_nsu')?>" class="form-control" id="nsu_jadser" placeholder="Masukkan Nomor Seri Unit">
                                            <small style="color: red;"><?= form_error('jadser_nsu')?></small>
                                        </div>  
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3 <?= form_error('jadser_modun') ? 'has-error' : null?>">
                                            <label for="modun_jadser">Model Unit</label>
                                            <input type="text" name="jadser_modun" value="<?= set_value('jadser_modun')?>" class="form-control" id="modun_jadser" placeholder="Masukkan Model Unit">
                                            <small style="color: red;"><?= form_error('jadser_modun')?></small>
                                        </div>  
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action pull-right">
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                        <a href="<?= site_url('admin/jadser')?>" type="submit" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>