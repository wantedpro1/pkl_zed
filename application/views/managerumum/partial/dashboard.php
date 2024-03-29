<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SMALENIK - Manager Umum</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url(); ?>assets/logo/image.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url(); ?>assets/dashboard/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/demo.css">
</head>
<body>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashdata');?>"></div>
	<?php
      $user_id = $this->session->userdata('user_id');
      if (!$user_id) {
        redirect('login');
      } else {
        $data_admin = $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array();

        $timeout = 1; // setting timeout dalam menit
        $logout = site_url('login'); // redirect halaman logout

        $timeout = $timeout * 1500; // menit ke detik
        if(isset($_SESSION['start_session'])){
          $elapsed_time = time()-$_SESSION['start_session'];
          if($elapsed_time >= $timeout){
            $this->db->query("UPDATE user SET user_active = '0' WHERE user_id='$user_id'");
            session_destroy();
            echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
          }
        }

        $_SESSION['start_session']=time();
      }
    ?>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<img src="<?= base_url(); ?>assets/logo/image.png" alt="navbar brand" class="navbar-brand" style="max-width: 45px">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<?php if($data_admin['user_picture']):?>
									<img src="<?= base_url()?>assets/profil/<?= $data_admin['user_picture'];?>". alt="#" class="avatar-img rounded-circle">
								<?php else:?>
									<img src="<?= base_url()?>assets/profil/original.jpg". alt="#" class="avatar-img rounded-circle">
								<?php endif;?>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
											<?php if($data_admin['user_picture']):?>
												<img src="<?= base_url()?>assets/profil/<?= $data_admin['user_picture'];?>". alt="#" class="avatar-img rounded">
											<?php else:?>
												<img src="<?= base_url()?>assets/profil/original.jpg". alt="#" class="avatar-img rounded">
											<?php endif;?>
											</div>
											<div class="u-text">
												<h4><?= $data_admin['user_nama'] ?></h4>
												<p class="text-muted"><?= $data_admin['user_role'] ?></p>
												<a href="<?= site_url('managerumum/profil') ?>" class="btn btn-xs btn-secondary btn-sm">Lihat Profil</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('managerumum/profil/settings') ?>">Pengaturan</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" id="tombol-logout" href="<?= site_url('login/logout') ?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						<?php if($data_admin['user_picture']):?>
							<img src="<?= base_url()?>assets/profil/<?= $data_admin['user_picture'];?>". alt="#" class="avatar-img rounded-circle">
						<?php else:?>
							<img src="<?= base_url()?>assets/profil/original.jpg". alt="#" class="avatar-img rounded-circle">
						<?php endif;?>
						</div>
						<div class="info">
							<a>
								<span>
									<?= $data_admin['user_nama'] ?>
									<span class="user-level"><?= $data_admin['user_role'] ?></span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav nav-primary">
                        <li class="nav-item">
							<a href="<?= site_url('managerumum/dashboard') ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="<?= site_url('managerumum/admin') ?>">
								<i class="fas fa-users"></i>
								<p>Kelola Data Admin</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="<?= site_url('managerumum/teknisi') ?>">
								<i class="fas fa-wrench"></i>
								<p>Kelola Data Teknisi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('managerumum/jadser') ?>">
								<i class="fas fa-toolbox"></i>
								<p>Jadwal Service</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('managerumum/dokgampek') ?>">
								<i class="fas fa-image"></i>
								<p>Dokumentasi Pekerjaan</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
                <?php $this->load->view($content);?>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<!-- <nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav> -->
					<div class="copyright ml-auto">
						&copy; <?= date('Y') ?> PKL Zed. All rights reserved.
					</div>				
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="<?= base_url(); ?>assets/dashboard/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/dashboard/js/core/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/dashboard/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url(); ?>assets/dashboard/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert 2 -->
	<script src="<?= base_url(); ?>assets/script/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/script/myscript.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url(); ?>assets/dashboard/js/atlantis.min.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>