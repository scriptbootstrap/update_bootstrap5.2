<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location:../../../auth/login");
	exit;
}

require('../../../funct/functions.php');

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

// ============================================
// query table barang_jasa berdasarkan URL [0]
// ============================================
if (isset($_GET["id_barang_jasa"])) {
	$idBarangJasa = $_GET["id_barang_jasa"];
	$queryIdBarangJasa = query("SELECT * FROM tb_barang_jasa WHERE id = '$idBarangJasa' ")[0];
}


// check empty account
if (empty($rowSession["id"])) {
	header("Location:../../../auth/logout");
	exit;
}


// query table satker
$resultSatker = query("SELECT * FROM tb_satker");

// query table surat pesanan
$resultSPes = query("SELECT * FROM tb_spes");

// query table surat bahpp
$resultBahpp = query("SELECT * FROM tb_bahpp");

// CEK LEVEL
include("../../../include/check-level.php");

// SET DATE
date_default_timezone_set('Asia/Makassar');

// === RUMUS MEMBUAT HARI, TANGGAL, BULAN, TAHUN (MENJADI TEXT) ===
$day = date("l");
$tglTxt = date("d");
$blnTxt = date("m");
$thnText = date("Y");

// tanggal, bulan, tahun
$tbh = date("Y-m-d");
$time = date("h:i");

// Format Romawi Month
include("../../../include/romawi-month.php");

// Fungsi Terbilang
include("../../../include/fungsi-terbilang.php");

// Konfigurasi SEO
include("../../../include/seo.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="<?= $metaDescription; ?>">
	<meta name="keywords" content="<?= $metaKeywords; ?>">
	<meta name="author" content="<?= $metaAuthor; ?>">
	<title>Buat Berita Acara Penyelesaian Pekerjaan - SiKuDaBaJa</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/Logo_BPS.png?v=<?= time(); ?>" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css" class="css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">

	<!-- My Style Css -->
	<link rel="stylesheet" href="../../../assets/css/style.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../../assets/css/skb.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../../assets/css/responsive.min.css?v=<?= time(); ?>" class="css">

	<!-- Style Dashboard -->
	<link rel="stylesheet" href="../../../assets/css/dashboard.min.css?v=<?= time(); ?>" class="css">

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-skb-1">

				<a href="../../" class="logo text-white">
					<img src="../../assets/img/Logo_BPS.png?v=<?= time(); ?>" alt="SiKuDa BaJa" width="40"> SiKuDa BaJa
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
			<?php include("../../../include/navbar.php"); ?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php include("../../../include/sidebar.php"); ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Buat Berita Acara Penyelesaian Pekerjaan</h4>
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
								<a href="#">Barang & Jasa < 50JT</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="bapp">Data Berita Acara Penyelesaian Pekerjaan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Buat BAPP</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-form">
								<form action="../barang-jasa" method="post" class="user" enctype="multipart/form-data">
									<input type="hidden" name="id_user" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowSession["id"]))))))))); ?>">
									<br>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<label for="tgl_surat"><i class="bi bi-calendar2-date-fill"></i> Tanggal Surat</label>
											<input id="tgl_surat" name="tgl_surat" type="date" class="form-control input-border-bottom" required="">
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="no_kegiatan" name="no_kegiatan" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["nama_kegiatan"]; ?>">
											<label for="no_kegiatan" class="placeholder"><i class="bi bi-grid-1x2-fill"></i> Kegiatan</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input hidden id="hari_terbilang" name="hari_terbilang" type="text" required="" value="<?php include("../../../include/rumus-day-text.php"); ?>">

											<input hidden id="tgl_terbilang" name="tgl_terbilang" type="text" required="" value="<?= terbilang($tglTxt); ?>">

											<input hidden id="bln_terbilang" name="bln_terbilang" type="text" required="" value="<?php include("../../../include/rumus-month-text.php"); ?>">

											<input hidden id="thn_terbilang" name="thn_terbilang" type="text" required="" value="<?= terbilang($thnText); ?>">
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input list="nama_satker" name="nama_satker" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('nama_satker harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off" value="<?= $queryIdBarangJasa["nama_satker"]; ?>">
											<label for="nama_satker" class="placeholder"><i class="bi bi-pin-map-fill"></i> Nama Satker</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="alamat_satker" name="alamat_satker" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["alamat_satker"]; ?>">
											<label for="alamat_satker" class="placeholder"><i class="bi bi-geo-alt-fill"></i> Alamat Satker</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_perusahaan" name="nama_perusahaan" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["nama_perusahaan"]; ?>">
											<label for="nama_perusahaan" class="placeholder"><i class="bi bi-building"></i> Nama Perusahaan</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="alamat_perusahaan" name="alamat_perusahaan" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["alamat_perusahaan"]; ?>">
											<label for="alamat_perusahaan" class="placeholder"><i class="bi bi-geo-alt-fill"></i> Alamat Perusahaan</label>
										</div>
									</div>


									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_pekerjaan" name="nama_pekerjaan" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["nama_pekerjaan"]; ?>">
											<label for="nama_pekerjaan" class="placeholder"><i class="bi bi-person-video3"></i> Nama Pekerjaan</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="tahun_anggaran" name="tahun_anggaran" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["tahun_anggaran"]; ?>">
											<label for="tahun_anggaran" class="placeholder"><i class="bi bi-calendar-event-fill"></i> Tahun Anggaran</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="nama_wakil_penyedia" name="nama_wakil_penyedia" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["nama_wakil_penyedia"]; ?>">
											<label for="nama_wakil_penyedia" class="placeholder"><i class="bi bi-person-fill"></i> Nama Wakil Penyedia</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<input id="jabatan" name="jabatan" type="text" class="form-control input-border-bottom" required="" value="<?= $queryIdBarangJasa["jabatan_wakil_penyedia"]; ?>">
											<label for="jabatan" class="placeholder"><i class="bi bi-award-fill"></i> Jabatan</label>
										</div>
									</div>


									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<br>
											<select id="no_bahpp" name="no_bahpp" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('Jenis surat harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">

												<?php foreach ($resultBahpp as $row) : ?>
													<option value="<?= substr($row["tgl_surat"], -5, 2); ?>.<?= substr($row["tgl_surat"], -2, 2); ?>/BAHPP/<?= $row["no_kegiatan"]; ?>/PPK/<?php if ($month01 === substr($row["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($row["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($row["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($row["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($row["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($row["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($row["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($row["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($row["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($row["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($row["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($row["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($row["tgl_surat"], 0, 4); ?>">
														<?= substr($row["tgl_surat"], -5, 2); ?>.<?= substr($row["tgl_surat"], -2, 2); ?>/BAHPP/<?= $row["no_kegiatan"]; ?>/PPK/<?php if ($month01 === substr($row["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($row["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($row["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($row["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($row["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($row["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($row["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($row["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($row["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($row["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($row["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($row["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($row["tgl_surat"], 0, 4); ?>
													</option>
												<?php endforeach; ?>

											</select>
											<label for="no_bahpp" class="placeholder"><i class="bi bi-envelope-fill mb-2"></i> Nomor BAHPP</label>
										</div>
									</div>


									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<br>
											<select id="jenis_surat" name="jenis_surat" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('Jenis surat harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">
												<option value="Surat Pesanan">Surat Pesanan</option>
												<option value="Surat Perintah Kerja">Surat Perintah Kerja</option>
											</select>
											<label for="jenis_surat" class="placeholder"><i class="bi bi-envelope-fill mb-2"></i> Pilih Jenis Surat</label>
										</div>
									</div>

									<div class="form-add">
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<br>
											<select id="no_jenis_surat" name="no_jenis_surat" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('Jenis surat harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">

												<?php foreach ($resultSPes as $row) : ?>
													<option value="<?= substr($row["tgl_surat"], -5, 2); ?>.<?= substr($row["tgl_surat"], -2, 2); ?>/SPes/<?= $row["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($row["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($row["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($row["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($row["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($row["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($row["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($row["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($row["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($row["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($row["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($row["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($row["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($row["tgl_surat"], 0, 4); ?>">Surat Pesanan -
														<?= substr($row["tgl_surat"], -5, 2); ?>.<?= substr($row["tgl_surat"], -2, 2); ?>/SPes/<?= $row["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($row["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($row["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($row["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($row["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($row["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($row["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($row["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($row["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($row["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($row["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($row["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($row["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($row["tgl_surat"], 0, 4); ?>
													</option>
												<?php endforeach; ?>

												<option value="-">Surat Perintah Kerja - Nomor Surat Belum Tersedia</option>

											</select>
											<label for="no_jenis_surat" class="placeholder"><i class="bi bi-envelope-paper-fill mb-2"></i> Nomor Jenis Surat</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<select name="nama_ppk" id="nama_ppk" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('Bidang ini harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">
												<option value="<?= $queryIdBarangJasa["nama_ppk"]; ?>">
													<?= $queryIdBarangJasa["nama_ppk"]; ?>
												</option>
											</select>
											<label for="nama_ppk" class="placeholder"><i class="bi bi-person-fill"></i> Nama PPK</label>
										</div>
									</div>

									<div class="form-add" hidden>
										<div class="form-group form-floating-label col-sm-6 mb-2 mb-sm-0">
											<select name="nip" id="nip" class="form-control input-border-bottom" required oninvalid="this.setCustomValidity('Bidang ini harus diisi!')" oninput="setCustomValidity('')" placeholder=" " autocomplete="off">
												<option value="<?= $queryIdBarangJasa["nip_ppk"]; ?>">
													<?= $queryIdBarangJasa["nip_ppk"]; ?>
												</option>
											</select>
											<label for="nip" class="placeholder"><i class="bi bi-person-fill"></i> NIP <sup>PPK</sup></label>
										</div>
									</div>

									<input type="hidden" name="tgl_buat" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($tbh))))))))); ?>">

									<div class="card-body row">
										<div class="form-group btn-form form-floating-label col-sm-6 mb-3 mb-sm-0">
											<button type="submit" name="bapp" class="btn bg-skb-3">SIMPAN <i class="fa fa-save"></i></button>
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
			<?php include("../../../include/footer.php"); ?>
		</div>


		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">??</span>
						</button>
					</div>
					<div class="modal-body">Pilih "Keluar" jika anda yakin ingin mengakhiri sesi anda saat ini.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
						<a class="btn btn-primary" href="../../../auth/logout">Keluar</a>
					</div>
				</div>
			</div>
		</div>

		<!-- === BOTTOM MENU === -->
		<?php include("../../../include/bottom-menu.php"); ?>


	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo.js"></script>
	<script src="../../assets/js/demo.js"></script>

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
	<script src="../../../assets/js/rupiah-format.js"></script>


</body>

</html>