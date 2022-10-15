<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location:../../auth/login");
	exit;
}

require('../../funct/functions.php');

// SESSION USER LOGIN
if (isset($_SESSION["login"])) {

	$userSession = $_SESSION["username"];
	$resultSession = $conn->query("SELECT * FROM tb_users WHERE username = '$userSession' ");
	$rowSession = mysqli_fetch_assoc($resultSession);
	$idSession = $rowSession["id"];

	// QUERY TABLE USER (LEVEL PP & PPK)
	$resultUsersLevelPP = query("SELECT * FROM tb_users WHERE level = 'pp' ");
	$resultUsersLevelPPK = query("SELECT * FROM tb_users WHERE level = 'ppk' ");
}


// check empty account
if (empty($rowSession["id"])) {
	header("Location:../../auth/logout");
	exit;
}

// query table satker
$resultSatker = query("SELECT * FROM tb_satker");

$readNotificationSm = "1";
$readAllNotificationSm = "0";

// CEK LEVEL
include("../../include/check-level.php");

// SET DATE
date_default_timezone_set('Asia/Makassar');

// tanggal, bulan, tahun
$tbh = date("Y-m-d");
$time = date("h:i");

// Konfigurasi SEO
include("../../include/seo.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="<?= $metaDescription; ?>">
	<meta name="keywords" content="<?= $metaKeywords; ?>">
	<meta name="author" content="<?= $metaAuthor; ?>">
	<title>Buat Paket - SiKuDa BaJa</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/Logo_BPS.png?v=<?= time(); ?>" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css" class="css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

	<!-- My Style Css -->
	<link rel="stylesheet" href="../../assets/css/style.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../assets/css/skb.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../assets/css/responsive.min.css?v=<?= time(); ?>" class="css">

	<!-- Style Dashboard -->
	<link rel="stylesheet" href="../../assets/css/dashboard.css?v=<?= time(); ?>" class="css">

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-skb-1">

				<a href="../" class="logo text-white">
					<img src="../assets/img/Logo_BPS.png?v=<?= time(); ?>" alt="SiKuDa BaJa" width="40"> SiKuDaBaJa
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
			<?php include("../../include/navbar.php"); ?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php include("../../include/sidebar.php"); ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Buat Paket</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="barang-jasa">Barang & Jasa < 50JT</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="barang-jasa">Data Paket</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Buat Paket</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-form">
								<form action="barang-jasa" method="post" class="user" enctype="multipart/form-data">

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_pekerjaan" name="nama_pekerjaan" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_pekerjaan" class="placeholder"><i class="bi bi-person-video3"></i> Nama Pekerjaan</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input list="nama_satker" name="nama_satker" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('Nama satker harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">
											<label for="nama_satker" class="placeholder"><i class="bi bi-pin-map-fill"></i> Nama Satker</label>
											<datalist id="nama_satker">
												<?php foreach ($resultSatker as $row) : ?>
													<option value="<?= $row["uraian_satker"]; ?>">
														<?= $row["kode_satker"]; ?>
													</option>
												<?php endforeach; ?>
											</datalist>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="alamat_satker" name="alamat_satker" type="text" class="form-control input-border-bottom" required="">
											<label for="alamat_satker" class="placeholder"><i class="bi bi-geo-alt-fill"></i> Alamat Satker</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_perusahaan" name="nama_perusahaan" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_perusahaan" class="placeholder"><i class="bi bi-building"></i> Nama Perusahaan</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="alamat_perusahaan" name="alamat_perusahaan" type="text" class="form-control input-border-bottom" required="">
											<label for="alamat_perusahaan" class="placeholder"><i class="bi bi-geo-alt-fill"></i> Alamat Perusahaan</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_kegiatan" name="nama_kegiatan" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_kegiatan" class="placeholder"><i class="bi bi-grid-1x2-fill"></i> Nama Kegiatan</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="tahun_anggaran" name="tahun_anggaran" type="text" class="form-control input-border-bottom" required="">
											<label for="tahun_anggaran" class="placeholder"><i class="bi bi-calendar-event-fill"></i> Tahun Anggaran</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="no_dipa" name="no_dipa" type="text" class="form-control input-border-bottom" required="">
											<label for="no_dipa" class="placeholder"><i class="bi bi-2-square-fill"></i> Nomor DIPA</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<label for="tgl_dipa"><i class="bi bi-card-text"></i> Tanggal DIPA</label>
											<input id="tgl_dipa" name="tgl_dipa" type="date" class="form-control input-border-bottom" required="">
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_ppk" name="nama_ppk" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_ppk" class="placeholder"><i class="bi bi-person-fill"></i> Nama PPK</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nip_ppk" name="nip_ppk" type="text" class="form-control input-border-bottom" required="">
											<label for="nip_ppk" class="placeholder"><i class="bi bi-person-fill"></i> NIP PPK</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_pp" name="nama_pp" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_pp" class="placeholder"><i class="bi bi-person-fill"></i> Nama PP</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nip_pp" name="nip_pp" type="text" class="form-control input-border-bottom" required="">
											<label for="nip_pp" class="placeholder"><i class="bi bi-person-fill"></i> NIP PP</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_wakil_penyedia" name="nama_wakil_penyedia" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_wakil_penyedia" class="placeholder"><i class="bi bi-person-fill"></i> Nama Wakil Penyedia</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="jabatan_wakil_penyedia" name="jabatan_wakil_penyedia" type="text" class="form-control input-border-bottom" required="">
											<label for="jabatan_wakil_penyedia" class="placeholder"><i class="bi bi-award-fill"></i> Jabatan Wakil Penyedia</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="npwp" name="npwp" type="text" class="form-control input-border-bottom" required="">
											<label for="npwp" class="placeholder"><i class="bi bi-postcard-fill"></i> NPWP</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="jmlh_penawaran" name="jmlh_penawaran" type="text" class="form-control input-border-bottom" required="">
											<label for="jmlh_penawaran" class="placeholder"><i class="bi bi-cash-stack"></i> Jumlah Penawaran</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="jmlh_negosiasi" name="jmlh_negosiasi" type="text" class="form-control input-border-bottom" required="">
											<label for="jmlh_negosiasi" class="placeholder"><i class="bi bi-cash-stack"></i> Jumlah Negosiasi</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<br>
											<select id="ppn" name="ppn" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('PPN harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">
												<option value="1">Tambahkan PPN</option>
												<option value="0">Tidak Ditambahkan PPN</option>
											</select>
											<label for="ppn" class="placeholder"><i class="bi bi-percent mb-2"></i> PILIH PPN</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_tempat" name="nama_tempat" type="text" class="form-control input-border-bottom" required="">
											<label for="nama_tempat" class="placeholder"><i class="bi bi-map-fill"></i> Nama Tempat</label>
										</div>
									</div>


									<div class="card-body row">
										<div class="form-group btn-form form-floating-label col-sm-6 mb-3 mb-sm-0">
											<button type="submit" name="paket" id="clickBtn" class="btn bg-skb-3">SIMPAN <i class="fa fa-save"></i></button>
											<button type="reset" class="btn bg-skb-1">RESET <i class="fa fa-times"></i></button>
											<a href="javascript:window.history.go(-1);" class="btn bg-skb-6">BATAL</a>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("../../include/footer.php"); ?>
		</div>


		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Pilih "Keluar" jika anda yakin ingin mengakhiri sesi anda saat ini.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
						<a class="btn btn-primary" href="../../auth/logout">Keluar</a>
					</div>
				</div>
			</div>
		</div>

		<!-- === BOTTOM MENU === -->
		<?php include("../../include/bottom-menu.php"); ?>


	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script src="../assets/js/demo.js"></script>



	<script>
		$(document).ready(function() {
			$('#basic-datatables').DataTable({});

			$('#multi-filter-select').DataTable({
				"pageLength": 5,
				initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function() {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function(d, j) {
							select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
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

	<!-- Format Rupiah -->
	<script src="../../assets/js/rupiah-format.js"></script>



</body>

</html>