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
                <a href="<?= site_url('admin/profil') ?>">Profil</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h4 class="card-title">Data Profil</h4></div>
                        <div class="col-6">
                            <a class="btn btn-danger ml-auto pull-right" href="<?= site_url('admin/dashboard')?>">
                                <span class="btn-label">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 col-md-3">
                            <img class="avatar-img rounded-circle" src="<?= base_url()?>assets/profil/<?= $data['user_picture'];?>" style="width:100%" alt="">
                        </div>
                        <div class="col-9 col-md-9">
                            <p><b>ID Pengguna:</b> <?=$data['user_id'];?></p>
                            <p>Nama Lengkap: <?=$data['user_nama'];?></p>
                            <p>Email: <?=$data['user_email'];?></p>
                            <p>Username: <?=$data['user_username'];?></p>
                            <p>Role/ Jabatan: <?=$data['user_role'];?></p>
                            <p>Status:
                                <?php if($data['user_active'] == '0'):?>
                                    <span class="badge badge-warning">Offline</span>
                                <?php elseif($data['user_active'] == '1'):?>
                                    <span class="badge badge-success">Online</span>
                                <?php endif;?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>