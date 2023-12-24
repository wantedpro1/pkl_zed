<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <title>CV. KADANG BAYU - Halaman Login</title>

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
                <div class="card-body text-center">
                    <h3>Sistem Manajemen Layanan Elektronik<br><span class="text-carolina bold"> CV. Kadang Bayu</span></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('login/auth')?>" enctype="multipart/form-data">
                        <div class="text-center pb-3">
                            <h5 class="text-center bold">Masuk ke Sistem</h5>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" name="user_username" class="form-control" placeholder="username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" name="user_password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-carolina">Login</button>
                        </div>
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <p class="card-text">Kamu melupakan password? <a href="<?= site_url('login/forpass')?>" class="card-link">Ganti Password</a></p> 
                    </li>
                </ul>
                <div class="card-footer">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem sapiente illum obcaecati unde cum alias assumenda eos animi, temporibus molestiae dignissimos debitis consequatur id aut praesentium nisi accusamus quos possimus.</p>
                    <p><small> &copy; <?= date('Y') ?> PKL Zed. All rights reserved. </small></p>
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