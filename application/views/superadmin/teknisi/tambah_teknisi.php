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
                <a href="<?= site_url('superadmin/teknisi') ?>">Data Teknisi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('superadmin/teknisi/tambah_teknisi')?>">Tambah Teknisi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Teknisi</div>
                </div>
                <form method="POST" action="<?= base_url().'superadmin/teknisi/simpan_teknisi'?>" class="form-sample" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <input type="hidden" name="user_id" value="<?= $user_id;?>" class="form-control" readonly>
                                
                                <div class="form-group mb-3 <?= form_error('user_nama') ? 'has-error' : null?>">
                                    <label for="nama_teknisi">Nama Teknisi</label>
                                    <input type="text" name="user_nama" value="<?= set_value('user_nama')?>" class="form-control" id="nama_teknisi" placeholder="Masukkan Nama">
                                    <small style="color: red;"><?= form_error('user_nama')?></small>
                                </div>
                               
                                <div class="form-group mb-3 <?= form_error('user_email') ? 'has-error' : null?>">
                                    <label for="email_teknisi">Email Teknisi</label>
                                    <input type="email" name="user_email" value="<?= set_value('user_email')?>" class="form-control" id="email_teknisi" placeholder="Masukkan Email">
                                    <small class="form-text text-muted">Kami tidak akan pernah menyebarkan emailmu ke orang lain.</small>
                                    <small style="color: red;"><?= form_error('user_email')?></small>
                                </div>

                                <div class="form-group mb-3 <?= form_error('user_username') ? 'has-error' : null?>">
                                    <label for="username_teknisi">Username Teknisi</label>
                                    <input type="text" name="user_username" value="<?= set_value('user_username')?>" class="form-control" id="username_teknisi" placeholder="Masukkan Username">
                                    <small style="color: red;"><?= form_error('user_username')?></small>
                                </div>

                                <div class="form-group mb-3 <?= form_error('user_password') ? 'has-error' : null?>">
                                    <label for="password_teknisi">Password Teknisi</label>
                                    <input type="password" name="user_password" value="<?= set_value('user_password')?>" class="form-control" id="password_teknisi" placeholder="Masukkan Password">
                                    <small style="color: red;"><?= form_error('user_password')?></small>
                                </div>

                                <div class="form-group">
                                    <label>Terdaftar Pada Tanggal</label>
                                    <input type="date" name="user_datecreate" value="<?= date('Y-m-d');?>" class="form-control" readonly>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="<?= site_url('superadmin/teknisi')?>" type="submit" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>