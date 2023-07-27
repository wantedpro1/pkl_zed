<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Forms</h4>
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
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('teknisi/garansi/tambah_garansi')?>">Tambah Garansi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Garansi</div>
                </div>
                <form method="POST" action="<?= base_url().'teknisi/garansi/simpan_garansi'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- Bagian Tanggal -->
                        <div class="row">  
                            <input type="hidden" name="garansi_id" value="<?= $garansi_id;?>" class="form-control" readonly>
                            <div class="col-md-6 col-lg-6">                                                              
                                <div class="form-group mb-3 <?= form_error('garansi_tgllaporan') ? 'has-error' : null?>">
                                    <label>Tanggal Laporan</label>
                                    <input type="datetime-local" name="garansi_tgllaporan" value="<?= set_value('garansi_tgllaporan')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_tgllaporan')?></small>
                                </div>
                               
                                <div class="form-group mb-3 <?= form_error('garansi_tglkunjungan') ? 'has-error' : null?>">
                                    <label>Tanggal Kunjungan</label>
                                    <input type="datetime-local" name="garansi_tglkunjungan" value="<?= set_value('garansi_tglkunjungan')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_tglkunjungan')?></small>
                                </div>                                
                            </div>
                            <div class="col-md-6 col-lg-6">                                                              
                                <div class="form-group mb-3 <?= form_error('garansi_tglperbaikan') ? 'has-error' : null?>">
                                    <label>Tanggal Perbaikan</label>
                                    <input type="datetime-local" name="garansi_tglperbaikan" value="<?= set_value('garansi_tglperbaikan')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_tglperbaikan')?></small>
                                </div>
                               
                                <div class="form-group mb-3 <?= form_error('garansi_tglselesai') ? 'has-error' : null?>">
                                    <label>Tanggal Selesai</label>
                                    <input type="datetime-local" name="garansi_tglselesai" value="<?= set_value('garansi_tglselesai')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_tglselesai')?></small>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">                                                              
                                <div class="form-group mb-3 <?= form_error('garansi_nowo') ? 'has-error' : null?>">
                                    <label>No. WO (Work Operational)</label>
                                    <input type="text" name="garansi_nowo" value="<?= set_value('garansi_nowo')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_nowo')?></small>
                                </div>                                   
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_nofaktur') ? 'has-error' : null?>">
                                    <label>No. Faktur</label>
                                    <input type="text" name="garansi_nofaktur" value="<?= set_value('garansi_nofaktur')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_nofaktur')?></small>
                                </div>                                
                            </div>                           
                        </div>
                        <hr class="my-4"> <!-- Bagian Profil -->
                        <div class="row">
                            <div class="col-md-6 col-lg-6">                                                              
                                <div class="form-group mb-3 <?= form_error('garansi_nama') ? 'has-error' : null?>">
                                    <label>Nama Konsumen</label>
                                    <input type="text" name="garansi_nama" value="<?= set_value('garansi_nama')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_nama')?></small>
                                </div>  
                                <div class="form-group mb-3 <?= form_error('garansi_alamat') ? 'has-error' : null?>">
                                    <label>Alamat</label>
                                    <input type="text" name="garansi_alamat" value="<?= set_value('garansi_alamat')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_alamat')?></small>
                                </div>                                   
                            </div>
                            <div class="col-md-6 col-lg-6">                                                                                             
                                <div class="form-group mb-3 <?= form_error('garansi_telepon') ? 'has-error' : null?>">
                                    <label>No. Telepon</label>
                                    <input type="text" name="garansi_telepon" value="<?= set_value('garansi_telepon')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_telepon')?></small>
                                </div>   
                                <div class="form-group mb-3 <?= form_error('garansi_kota') ? 'has-error' : null?>">
                                    <label>Kota</label>
                                    <input type="text" name="garansi_kota" value="<?= set_value('garansi_kota')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_kota')?></small>
                                </div>                               
                            </div>                           
                        </div>
                        <hr class="my-4"> <!-- Bagian 3 -->
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_keluhan') ? 'has-error' : null?>">
                                    <label>Keluhan</label>
                                    <input type="text" name="garansi_keluhan" value="<?= set_value('garansi_keluhan')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_keluhan')?></small>
                                </div>                                  
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_produk') ? 'has-error' : null?>">
                                    <label>Produk</label>
                                    <input type="text" name="garansi_produk" value="<?= set_value('garansi_produk')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_produk')?></small>
                                </div>                              
                            </div>                           
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_tglbeli') ? 'has-error' : null?>">
                                    <label>Tanggal Beli</label>
                                    <input type="date" name="garansi_tglbeli" value="<?= set_value('garansi_tglbeli')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_tglbeli')?></small>
                                </div>                                  
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3 <?= form_error('garansi_nobukkun') ? 'has-error' : null?>">
                                    <label>No. Bukti Kunjungan</label>
                                    <input type="text" name="garansi_nobukkun" value="<?= set_value('garansi_nobukkun')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_nobukkun')?></small>
                                </div>                              
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3 <?= form_error('garansi_bl') ? 'has-error' : null?>">
                                    <label>B/L</label>
                                    <select name="garansi_bl" class="form-control">
                                        <option value="B">B</option>
                                        <option value="L">L</option>
                                    </select>
                                    <small style="color: red;"><?= form_error('garansi_bl')?></small>
                                </div>                              
                            </div>                              
                        </div>
                        <hr class="my-4"> <!-- Bagian 3 -->
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_noseri') ? 'has-error' : null?>">
                                    <label>No. Seri</label>
                                    <input type="text" name="garansi_noseri" value="<?= set_value('garansi_noseri')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_noseri')?></small>
                                </div>                                  
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_partno') ? 'has-error' : null?>">
                                    <label>No. Spare Part</label>
                                    <input type="text" name="garansi_partno" value="<?= set_value('garansi_partno')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_partno')?></small>
                                </div>                              
                            </div>                           
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group mb-3 <?= form_error('garansi_aktivser') ? 'has-error' : null?>">
                                    <label>Aktivitas Service</label>
                                    <input type="text" name="garansi_aktivser" value="<?= set_value('garansi_aktivser')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_aktivser')?></small>
                                </div>                                  
                            </div>                                                
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_ongkostransport') ? 'has-error' : null?>">
                                    <label>Ongkos Transport</label>
                                    <input type="text" name="garansi_ongkostransport" value="<?= set_value('garansi_ongkostransport')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_ongkostransport')?></small>
                                </div>                                  
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3 <?= form_error('garansi_ongkoskerja') ? 'has-error' : null?>">
                                    <label>Ongkos Kerja</label>
                                    <input type="text" name="garansi_ongkoskerja" value="<?= set_value('garansi_ongkoskerja')?>" class="form-control">
                                    <small style="color: red;"><?= form_error('garansi_ongkoskerja')?></small>
                                </div>                              
                            </div>                           
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="<?= site_url('teknisi/garansi')?>" type="submit" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>