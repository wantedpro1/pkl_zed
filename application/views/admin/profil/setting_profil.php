<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Profil</h4>
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
                <a href="<?= site_url('admin/profil/settings') ?>">Pengaturan Akun</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Akun</h4>
                </div>
                <form method="POST" action="<?= base_url().'admin/profil/update_profil'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <input type="hidden" name="user_id" value="<?= $data['user_id'];?>" class="form-control" readonly>
                                <input type="hidden" name="user_usernameold" value="<?= $data['user_username'];?>" class="form-control" readonly>
                                
                                <div class="form-group mb-3 <?= form_error('user_nama') ? 'has-error' : null?>">
                                    <label for="nama_user">Nama Lengkap</label>
                                    <input type="text" name="user_nama" value="<?= $data['user_nama'];?>" class="form-control" id="nama_user" placeholder="Masukkan Nama Lengkap">
                                    <small style="color: red;"><?= form_error('user_nama')?></small>
                                </div>  
                                <div class="form-group mb-3 <?= form_error('user_email') ? 'has-error' : null?>">
                                    <label for="email_user">Email</label>
                                    <input type="text" name="user_email" value="<?= $data['user_email'];?>" class="form-control" id="email_user" placeholder="Masukkan Email">
                                    <small style="color: red;"><?= form_error('user_email')?></small>
                                </div>  
                                <div class="form-group mb-3 <?= form_error('user_username') ? 'has-error' : null?>">
                                    <label for="username_user">Username</label>
                                    <input type="text" name="user_username" value="<?= $data['user_username'];?>" class="form-control" id="username_user" placeholder="Masukkan Username">
                                    <small style="color: red;"><?= form_error('user_username')?></small>
                                </div>  
                                <div class="form-group">
                                    <label for="picture_user">Foto Profil</label>
                                    <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-file" name="user_picture" id="picture_user">
                                    Foto Sebelumnya: 
                                    <?php if (!empty($data['user_picture'])):?>                                              
                                        <a href="<?= base_url().'assets/profil/'.$data['user_picture'];?>">Lihat</a>
                                    <?php endif;?>
                                </div>  

                            </div>
                        </div>
                    </div>
                    <div class="card-action pull-right">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="<?= site_url('admin/Dashboard')?>" type="submit" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Password</h4>
                </div>
                <form method="POST" action="<?= base_url().'admin/profil/update_password'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <input type="hidden" name="user_username" value="<?= $data['user_username'];?>" class="form-control" readonly>
                                <input type="hidden" name="user_password" value="<?= $data['user_password'];?>" class="form-control" readonly>
                                <p class="mb-2">Spesifikasi Password</p>                            
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minimal 8 Karakter</li>
                                    <li>Password harus mudah diingat</li>
                                    <li>Tidak boleh sama dengan password sebelumnya</li>
                                </ul>
                                <hr>
                                <div class="form-group mb-3 <?= form_error('user_passwordold') ? 'has-error' : null?>">
                                    <label for="passwordold_user">Password Lama</label>
                                    <input type="password" name="user_passwordold" value="<?= set_value('user_passwordold')?>" class="form-control" id="passwordold_user" placeholder="Masukkan Password Lama">
                                    <small style="color: red;"><?= form_error('user_passwordold')?></small>
                                </div>  
                                <div class="form-group mb-3 <?= form_error('user_passwordnew') ? 'has-error' : null?>">
                                    <label for="passwordnew_user">Password Baru</label>
                                    <input type="password" name="user_passwordnew" value="<?= set_value('user_passwordnew')?>" class="form-control" id="passwordnew_user" placeholder="Masukkan Password Baru">
                                    <small style="color: red;"><?= form_error('user_passwordnew')?></small>
                                </div>  
                                <div class="form-group mb-3 <?= form_error('user_passwordconfnew') ? 'has-error' : null?>">
                                    <label for="passwordconfnew_user">Konfirmasi Password Baru</label>
                                    <input type="password" name="user_passwordconfnew" value="<?= set_value('jadser_jenbar')?>" class="form-control" id="passwordconfnew_user" placeholder="Ulangi Password Baru">
                                    <small style="color: red;"><?= form_error('user_passwordconfnew')?></small>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="card-action pull-right">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="<?= site_url('admin/Dashboard')?>" type="submit" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>