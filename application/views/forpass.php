<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <title>SMALENIK - Halaman Login</title>

    <!-- Core Styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/siqtheme.css">

    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/logo/image.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/logo/image.png">
</head>

<body class="theme-default">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashdata');?>"></div>

    <div class="login-wrapper">
        <div class="d-flex justify-content-center mt-5">
            <div class="card" id="login-card">
                <div class="row text-center">
                    <div class="col-md-2 col-lg-2">
                        <div class="card-body">
                            <img src="<?= base_url()?>assets/logo/image.png" style="width:85px" alt="#" class="avatar-img rounded">
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-10">
                        <div class="card-body">
                            <h3>Sistem Manajemen Layanan Elektronik <span class="text-carolina bold"> CV. Kadang Bayu</span></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('login/conf_forpass')?>" enctype="multipart/form-data">
                        <div class="text-center pb-3">
                            <h5 class="text-center bold">Ganti Password</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-3 <?= form_error('user_email') ? 'has-error' : null?>">
                                    <label><i class="ti-email"></i> <b>Email</b></label>
                                    <input type="text" name="user_email" class="form-control" placeholder="email">
                                    <small style="color: red;"><?= form_error('user_email')?></small>
                                </div>
                                <div class="form-group mb-3 <?= form_error('user_username') ? 'has-error' : null?>">
                                    <label><i class="ti-user"></i> <b>Username</b></label>
                                    <input type="text" name="user_username" class="form-control" placeholder="username">
                                    <small style="color: red;"><?= form_error('user_username')?></small>
                                </div>
                                <div class="form-group mb-3 <?= form_error('user_newpass') ? 'has-error' : null?>">
                                    <label><i class="ti-lock"></i> <b>Password Baru</b></label>
                                    <input type="password" name="user_newpass" class="form-control" placeholder="masukkan password baru">
                                    <small style="color: red;"><?= form_error('user_newpass')?></small>
                                </div>
                                <div class="form-group mb-3 <?= form_error('user_confnewpass') ? 'has-error' : null?>">
                                    <label><i class="ti-key"></i> <b>Konfirmasi Password Baru</b></label>
                                    <input type="password" name="user_confnewpass" class="form-control" placeholder="konfirmasi password baru">
                                    <small style="color: red;"><?= form_error('user_confnewpass')?></small>
                                </div>
                            </div>
                        </div>       
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-carolina">Ganti Password</button>
                        </div>
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <p class="card-text">Sudah ingat password? <a href="<?= site_url('login')?>" class="card-link">Login</a></p> 
                    </li>
                </ul>
                <div class="card-footer">
                    <p class="card-text">Sistem Manajemen Layanan Elektronik CV. Kadang Bayu.</p>
                    <p><small> &copy; <?= date('Y') ?> Sistem Manajemen Layanan Elektronik CV. Kadang Bayu. All rights reserved. </small></p>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/login/scripts/siqtheme.js"></script>
    <script src="<?= base_url(); ?>assets/login/scripts/pages/pg_login.js" type="text/javascript"></script>

    <!-- Sweet Alert 2 -->
	<script src="<?= base_url(); ?>assets/script/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/script/loginscript.js"></script>
</body>

</html>