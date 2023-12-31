<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Admin</h4>
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
                <a href="<?= site_url('managerumum/admin') ?>">Data Admin</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Admin</h4>
                        <a class="btn btn-primary ml-auto" href="<?= base_url('managerumum/admin/tambah_admin')?>">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Tambah Admin
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Terdaftar Tanggal</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->user_id;?></td>
                                    <td><?= $row->user_nama;?></td>
                                    <td><?= $row->user_email;?></td>
                                    <td><?= $row->user_username;?></td>
                                    <td>
                                        <?php if($row->user_active == '1'):?>
                                            <span class="badge badge-success">Online</span>
                                        <?php elseif($row->user_active == '0'):?>
                                            <span class="badge badge-warning">Offline</span>
                                        <?php endif;?>
                                    </td>
                                    <td><?= $row->user_datecreate;?></td>                                   
                                    <td>
                                        <div class="form-button-action">
                                            <?php $user_id = $row->user_id;?>
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a href="<?= base_url()?>managerumum/admin/edit_admin/<?= $user_id;?>"><i class="fa fa-edit"></i></a>                                             
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="" class="btn-link"><a id="tombol-hapus" href="<?= base_url()?>managerumum/admin/hapus_admin/<?= $user_id;?>"><i class="fa fa-times"></i></a>                   
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>