<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SIAK - Halaman Dashboard</title>
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
									<img src="<?= base_url()?>assets/profil/<?= $data_admin['user_picture'];?>". alt="#" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
												<img src="<?= base_url()?>assets/profil/<?= $data_admin['user_picture'];?>" alt="#" class="avatar-img rounded">
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
							<img src="<?= base_url()?>assets/profil/<?= $data_admin['user_picture'];?>" alt="#" class="avatar-img rounded-circle">
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
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="mt-2 mb-4">
							<h2 class="text-white pb-2">Selamat Datang, <?= $data_admin['user_nama'] ?></h2>
							<h5 class="text-white op-7 mb-4">Sistem Manajemen Layanan Elektronik CV. Kadang Bayu</h5>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Statistik Pekerjaan Bulanan</div>
								</div>
								<div class="card-body">
									<!-- <div class="card-sub">
										Sometimes you need a very complex legend. In these cases, it makes sense to generate an HTML legend. Charts provide a generateLegend() method on their prototype that returns an HTML string for the legend.
									</div> -->
									<div class="chart-container">
										<canvas id="htmlLegendsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
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

	<?php
		foreach ($pekerjaanMasuk as $row) {
			$bulanPm[] = date('m', strtotime($row['jadser_datecreate']));
		}

		foreach ($pekerjaanSelesai as $row) {
			$bulanPs[] = date('m', strtotime($row['jadser_datecreate']));
		}

		$hitung1 = array_count_values($bulanPm);
		$hitung2 = array_count_values($bulanPs);
		ksort($hitung1);
		ksort($hitung2);
	?>
	<script type="text/javascript">
		htmlLegendsChart = document.getElementById('htmlLegendsChart').getContext('2d');

		// Chart with HTML Legends

		var gradientStroke = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke.addColorStop(0, '#177dff');
		gradientStroke.addColorStop(1, '#80b6f4');

		var gradientFill = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill.addColorStop(0, "rgba(23, 125, 255, 0.7)");
		gradientFill.addColorStop(1, "rgba(128, 182, 244, 0.3)");

		var gradientStroke2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke2.addColorStop(0, '#f3545d');
		gradientStroke2.addColorStop(1, '#ff8990');

		var gradientFill2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill2.addColorStop(0, "rgba(243, 84, 93, 0.7)");
		gradientFill2.addColorStop(1, "rgba(255, 137, 144, 0.3)");

		var gradientStroke3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke3.addColorStop(0, '#fdaf4b');
		gradientStroke3.addColorStop(1, '#ffc478');

		var gradientFill3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill3.addColorStop(0, "rgba(253, 175, 75, 0.7)");
		gradientFill3.addColorStop(1, "rgba(255, 196, 120, 0.3)");

		var myHtmlLegendsChart = new Chart(htmlLegendsChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [ {
					label: "Pekerjaan Masuk",
					borderColor: gradientStroke2,
					pointBackgroundColor: gradientStroke2,
					pointRadius: 0,
					backgroundColor: gradientFill2,
					legendColor: '#f3545d',
					fill: true,
					borderWidth: 1,
					data: [<?= !empty($hitung1['01']) ? $hitung1['01'] : 0; ?>, <?= !empty($hitung1['02']) ? $hitung1['02'] : 0; ?>, <?= !empty($hitung1['03']) ? $hitung1['03'] : 0; ?>, <?= !empty($hitung1['04']) ? $hitung1['04'] : 0; ?>, <?= !empty($hitung1['05']) ? $hitung1['05'] : 0; ?>, <?= !empty($hitung1['06']) ? $hitung1['06'] : 0; ?>, <?= !empty($hitung1['07']) ? $hitung1['07'] : 0; ?>, <?= !empty($hitung1['08']) ? $hitung1['08'] : 0; ?>, <?= !empty($hitung1['09']) ? $hitung1['09'] : 0; ?>, <?= !empty($hitung1['10']) ? $hitung1['10'] : 0; ?>, <?= !empty($hitung1['11']) ? $hitung1['11'] : 0; ?>, <?= !empty($hitung1['12']) ? $hitung1['12'] : 0; ?>]
				}, {
					label: "Pekerjaan Selesai",
					borderColor: gradientStroke,
					pointBackgroundColor: gradientStroke,
					pointRadius: 0,
					backgroundColor: gradientFill,
					legendColor: '#177dff',
					fill: true,
					borderWidth: 1,
					data: [<?= !empty($hitung2['01']) ? $hitung2['01'] : 0; ?>, <?= !empty($hitung2['02']) ? $hitung2['02'] : 0; ?>, <?= !empty($hitung2['03']) ? $hitung2['03'] : 0; ?>, <?= !empty($hitung2['04']) ? $hitung2['04'] : 0; ?>, <?= !empty($hitung2['05']) ? $hitung2['05'] : 0; ?>, <?= !empty($hitung2['06']) ? $hitung2['06'] : 0; ?>, <?= !empty($hitung2['07']) ? $hitung2['07'] : 0; ?>, <?= !empty($hitung2['08']) ? $hitung2['08'] : 0; ?>, <?= !empty($hitung2['09']) ? $hitung2['09'] : 0; ?>, <?= !empty($hitung2['10']) ? $hitung2['10'] : 0; ?>, <?= !empty($hitung2['11']) ? $hitung2['11'] : 0; ?>, <?= !empty($hitung2['12']) ? $hitung2['12'] : 0; ?>]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				},
				scales: {
					yAxes: [{
						ticks: {
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "500",
							beginAtZero: false,
							maxTicksLimit: 5,
							padding: 20
						},
						gridLines: {
							drawTicks: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							zeroLineColor: "transparent"
						},
						ticks: {
							padding: 20,
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "500"
						}
					}]
				}, 
				legendCallback: function(chart) { 
					var text = []; 
					text.push('<ul class="' + chart.id + '-legend html-legend">'); 
					for (var i = 0; i < chart.data.datasets.length; i++) { 
						text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
						if (chart.data.datasets[i].label) { 
							text.push(chart.data.datasets[i].label); 
						} 
						text.push('</li>'); 
					} 
					text.push('</ul>'); 
					return text.join(''); 
				}  
			}
		});

		var myLegendContainer = document.getElementById("myChartLegend");

		// generate HTML legend
		myLegendContainer.innerHTML = myHtmlLegendsChart.generateLegend();

		// bind onClick event to all LI-tags of the legend
		var legendItems = myLegendContainer.getElementsByTagName('li');
		for (var i = 0; i < legendItems.length; i += 1) {
			legendItems[i].addEventListener("click", legendClickCallback, false);
		}
	</script>
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