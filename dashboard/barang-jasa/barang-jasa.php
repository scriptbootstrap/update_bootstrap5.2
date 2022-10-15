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

	// Count data table
	include("../../include/count-data-table.php");
}

// query table barang jasa
$queryPaket = query("SELECT * FROM tb_barang_jasa");

// CHECK TEMPLATE MEMO
$queryMemo = queryMemo("SELECT * FROM tb_memo");

// CHECK TEMPLATE BAPHK
$queryBAPHK = queryBAPHK("SELECT * FROM tb_baphk");

// CHECK TEMPLATE PIP
$queryPIP = queryPIP("SELECT * FROM tb_pip");

// CHECK TEMPLATE PIBU
$queryPIBU = queryPIBU("SELECT * FROM tb_pibu");

// CHECK TEMPLATE BAHKN
$queryBAHKN = queryBAHKN("SELECT * FROM tb_bahkn");

// CHECK TEMPLATE BAHP
$queryBAHP = queryBAHP("SELECT * FROM tb_bahp");

// CHECK TEMPLATE SPes
$querySPes = querySPes("SELECT * FROM tb_spes");

// CHECK TEMPLATE BAHPP
$queryBAHPP = queryBAHPP("SELECT * FROM tb_bahpp");

// CHECK TEMPLATE BAPP
$queryBAPP = queryBAPP("SELECT * FROM tb_bapp");

// CHECK TEMPLATE BAST
$queryBAST = queryBAST("SELECT * FROM tb_bast");

// CHECK TEMPLATE BAP
$queryBAP = queryBAP("SELECT * FROM tb_bap");

// CHECK TEMPLATE Kwitansi
$queryKwitansi = queryKwitansi("SELECT * FROM tb_kwitansi");



// check empty account
if (empty($rowSession["id"])) {
	header("Location:../../auth/logout");
	exit;
}

// CEK LEVEL
include("../../include/check-level.php");

// SET DATE
setlocale(LC_ALL, 'id_ID');
date_default_timezone_set('Asia/Makassar');


// tanggal, bulan, tahun
$tbh = date("d M Y");

include("../../include/romawi-month.php");

// Format Romawi Month
include("../../include/romawi-month.php");

// Fungsi Terbilang
include("../../include/fungsi-terbilang.php");

// Format Hari Indonesia
$hari = array(
	1 =>    'Senin',
	'Selasa',
	'Rabu',
	'Kamis',
	'Jumat',
	'Sabtu',
	'Minggu'
);

// Format Tanggal Indonesia
include("../../include/tgl-indo.php");

// Format Bulan Indonesia
include("../../include/bln-indo.php");

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
	<title>Data Paket - SiKuDaBaJa</title>
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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css" class="css">

	<!-- My Style Css  -->
	<link rel="stylesheet" href="../../assets/css/skb.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../assets/css/style.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../assets/css/responsive.min.css?v=<?= time(); ?>" class="css">

	<!-- Style Dashboard -->
	<link rel="stylesheet" href="../../assets/css/dashboard.min.css?v=<?= time(); ?>" class="css">


</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-skb-1">

				<a href="../" class="logo text-white">
					<img src="../assets/img/Logo_BPS.png?v=<?= time(); ?>" alt="SiKuDa BaJa" width="40"> SiKuDa BaJa
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
						<h4 class="page-title">Data Paket</h4>
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
								<a href="#">Data Paket</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<a href="add-paket" class="btn bg-skb-3 text-white btn-round"><i class="fa fa-plus"></i> Buat Paket</a>
										<h4 class="card-title ml-auto"><?php echo "{$result["jmlh"]}"; ?> Data Paket</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th style="width: 10%">Opsi</th>
													<th>Nama Paket</th>
													<th>Memo</th>
													<th>BAPHK</th>
													<th>PI-P</th>
													<th>PI-BU</th>
													<th>BAHKN</th>
													<th>BAHP</th>
													<th>SPES</th>
													<th>BAHPP</th>
													<th>BAPP</th>
													<th>BAST</th>
													<th>BAP</th>
													<th>KWITANSI</th>
													<th>COVER</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th style="width: 10%">Opsi</th>
													<th>Nama Paket</th>
													<th>Memo</th>
													<th>BAPHK</th>
													<th>PI-P</th>
													<th>PI-BU</th>
													<th>BAHKN</th>
													<th>BAHP</th>
													<th>SPES</th>
													<th>BAHPP</th>
													<th>BAPP</th>
													<th>BAST</th>
													<th>BAP</th>
													<th>KWITANSI</th>
													<th>COVER</th>
												</tr>
											</tfoot>
											<tbody>
												<?php $noTable = 1; ?>
												<?php foreach ($queryPaket as $row) : ?>
													<tr>
														<td><?= $noTable; ?></td>
														<td>
															<div class="form-button-action">
																<div class="dropdown show">
																	<a class="show-opsi bg-skb-3 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		Opsi
																	</a>

																	<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																		<a class="dropdown-item text-light bg-skb-3" href="edit-paket?id_paket=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Edit</a>

																		<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#delete-paket<?= $row["id"]; ?>"><i class=" fa fa-trash"></i> Hapus</a>

																	</div>
																</div>
															</div>
														</td>
														<td><?= $row["nama_pekerjaan"]; ?></td>

														<!-- TEMPLATE MEMO -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryMemo)) : ?>
																<?php foreach ($queryMemo as $rowMemo) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>memo/edit-memo?id_memo=<?= $rowMemo["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="memo/print-word" method="post">
																					<input type="text" hidden name="nama_satker" value="<?= $rowMemo["nama_satker"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowMemo["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tgl_terbit" value="<?= tgl_indo(date($rowMemo["tgl_terbit"])); ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowMemo["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="tgl_permintaan" value="<?= tgl_indo(date($rowMemo["tgl_permintaan"])); ?>">
																					<input type="text" hidden name="fungsi" value="<?= $rowMemo["fungsi"]; ?>">
																					<input type="text" hidden name="nama_ppk" value="<?= $rowMemo["nama_ppk"]; ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-memo<?= $rowMemo["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryMemo)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>memo/add-memo?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>

														<!-- TEMPLATE BAPHK -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAPHK)) : ?>
																<?php foreach ($queryBAPHK as $rowBAPHK) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>baphk/edit-baphk?id_baphk=<?= $rowBAPHK["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<!-- Check Empty Perubahan -->
																				<?php if (empty($rowBAPHK["perubahan_ke"])) : ?>
																					<form action="baphk/print-word-perubahan" method="post">
																						<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAPHK["tgl_surat"], -5, 2); ?>">
																						<input type="text" hidden name="no_tgl" value="<?= substr($rowBAPHK["tgl_surat"], -2, 2); ?>">
																						<input type="text" hidden name="no_kegiatan" value="<?= $rowBAPHK["no_kegiatan"]; ?>">
																						<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																						<input type="text" hidden name="no_tahun" value="<?= substr($rowBAPHK["tgl_surat"], 0, 4); ?>">

																						<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAPHK["tgl_surat"]))]; ?>">

																						<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAPHK["tgl_surat"]))); ?>">

																						<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAPHK["tgl_surat"]); ?>">

																						<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAPHK["tgl_surat"]))); ?>">

																						<input type="text" hidden name="nama_satker" value="<?= $rowBAPHK["nama_satker"]; ?>">
																						<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAPHK["nama_perusahaan"]; ?>">
																						<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAPHK["alamat_perusahaan"]; ?>">
																						<input type="text" hidden name="no_izin_usaha" value="<?= $rowBAPHK["no_izin_usaha"]; ?>">
																						<input type="text" hidden name="tgl_terbit_nib" value="<?= tgl_indo(date($rowBAPHK["tgl_terbit_nib"])); ?>">
																						<input type="text" hidden name="tgl_surat" value="<?= tgl_indo(date($rowBAPHK["tgl_surat"])); ?>">
																						<input type="text" hidden name="perubahan_ke" value="<?= $rowBAPHK["perubahan_ke"]; ?>">
																						<input type="text" hidden name="nomor_npwp" value="<?= $rowBAPHK["nomor_npwp"]; ?>">
																						<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAPHK["nama_pekerjaan"]; ?>">
																						<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAPHK["tahun_anggaran"]; ?>">
																						<input type="text" hidden name="nama_pp" value="<?= $rowBAPHK["nama_pp"]; ?>">
																						<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAPHK["nama_wakil_penyedia"]; ?>">
																						<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																					</form>
																				<?php endif; ?>

																				<!-- Check Perubahan -->
																				<?php if (!empty($rowBAPHK["perubahan_ke"])) : ?>
																					<form action="baphk/print-word" method="post">
																						<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAPHK["tgl_surat"], -5, 2); ?>">
																						<input type="text" hidden name="no_tgl" value="<?= substr($rowBAPHK["tgl_surat"], -2, 2); ?>">
																						<input type="text" hidden name="no_kegiatan" value="<?= $rowBAPHK["no_kegiatan"]; ?>">
																						<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																						<input type="text" hidden name="no_tahun" value="<?= substr($rowBAPHK["tgl_surat"], 0, 4); ?>">
																						<input type="text" hidden name="hari_terbilang" value="<?= $rowBAPHK["hari_terbilang"]; ?>">
																						<input type="text" hidden name="tgl_terbilang" value="<?= $rowBAPHK["tgl_terbilang"]; ?>">
																						<input type="text" hidden name="bln_terbilang" value="<?= $rowBAPHK["bln_terbilang"]; ?>">
																						<input type="text" hidden name="thn_terbilang" value="<?= $rowBAPHK["thn_terbilang"]; ?>">
																						<input type="text" hidden name="nama_satker" value="<?= $rowBAPHK["nama_satker"]; ?>">
																						<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAPHK["nama_perusahaan"]; ?>">
																						<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAPHK["alamat_perusahaan"]; ?>">
																						<input type="text" hidden name="no_izin_usaha" value="<?= $rowBAPHK["no_izin_usaha"]; ?>">
																						<input type="text" hidden name="tgl_terbit_nib" value="<?= tgl_indo(date($rowBAPHK["tgl_terbit_nib"])); ?>">
																						<input type="text" hidden name="tgl_surat" value="<?= tgl_indo(date($rowBAPHK["tgl_surat"])); ?>">
																						<input type="text" hidden name="perubahan_ke" value="<?= $rowBAPHK["perubahan_ke"]; ?>">
																						<input type="text" hidden name="nomor_npwp" value="<?= $rowBAPHK["nomor_npwp"]; ?>">
																						<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAPHK["nama_pekerjaan"]; ?>">
																						<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAPHK["tahun_anggaran"]; ?>">
																						<input type="text" hidden name="nama_pp" value="<?= $rowBAPHK["nama_pp"]; ?>">
																						<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAPHK["nama_wakil_penyedia"]; ?>">
																						<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																					</form>
																				<?php endif; ?>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-baphk<?= $rowBAPHK["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAPHK)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>baphk/add-baphk?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE PIP -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryPIP)) : ?>
																<?php foreach ($queryPIP as $rowPIP) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>pip/edit-pip?id_pip=<?= $rowPIP["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="pip/print-word" method="post">
																					<input type="text" hidden name="nama" value="<?= $rowPIP["nama"]; ?>">
																					<input type="text" hidden name="no_identitas" value="<?= $rowPIP["no_identitas"]; ?>">
																					<input type="text" hidden name="alamat_ktp" value="<?= $rowPIP["alamat_ktp"]; ?>">
																					<input type="text" hidden name="pekerjaan" value="<?= $rowPIP["pekerjaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowPIP["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="nama_satker" value="<?= $rowPIP["nama_satker"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowPIP["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_tempat" value="<?= $rowPIP["nama_tempat"]; ?>">
																					<input type="text" hidden name="tgl_bln_thn" value="<?= tgl_indo(date($rowPIP["tgl_surat"])); ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-pip<?= $rowPIP["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryPIP)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>pip/add-pip?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE PIBU -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryPIBU)) : ?>
																<?php foreach ($queryPIBU as $rowPIBU) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>pibu/edit-pibu?id_pibu=<?= $rowPIBU["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="pibu/print-word" method="post">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowPIBU["nama_wakil_penyedia"]; ?>">
																					<input type="text" hidden name="jabatan" value="<?= $rowPIBU["jabatan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowPIBU["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowPIBU["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowPIBU["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="nama_satker" value="<?= $rowPIBU["nama_satker"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowPIBU["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_tempat" value="<?= $rowPIBU["nama_tempat"]; ?>">
																					<input type="text" hidden name="tgl_bln_thn" value="<?= tgl_indo(date($rowPIBU["tgl_surat"])); ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-pibu<?= $rowPIBU["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryPIBU)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>pibu/add-pibu?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE BAHKN -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAHKN)) : ?>
																<?php foreach ($queryBAHKN as $rowBAHKN) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bahkn/edit-bahkn?id_bahkn=<?= $rowBAHKN["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="bahkn/print-word" method="post">
																					<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAHKN["tgl_surat"], -5, 2); ?>">
																					<input type="text" hidden name="no_tgl" value="<?= substr($rowBAHKN["tgl_surat"], -2, 2); ?>">
																					<input type="text" hidden name="no_kegiatan" value="<?= $rowBAHKN["no_kegiatan"]; ?>">
																					<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																					<input type="text" hidden name="no_tahun" value="<?= substr($rowBAHKN["tgl_surat"], 0, 4); ?>">
																					<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAHKN["tgl_surat"]))]; ?>">

																					<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAHKN["tgl_surat"]))); ?>">

																					<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAHKN["tgl_surat"]); ?>">

																					<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAHKN["tgl_surat"]))); ?>">

																					<input type="text" hidden name="nama_satker" value="<?= $rowBAHKN["nama_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAHKN["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAHKN["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAHKN["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAHKN["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="jmlh_penawaran" value="<?= number_format($rowBAHKN["jmlh_penawaran"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="jmlh_penawaran_terbilang" value="<?= terbilang($rowBAHKN["jmlh_penawaran"]); ?>">
																					<input type="text" hidden name="jmlh_negosiasi" value="<?= number_format($rowBAHKN["jmlh_negosiasi"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="jmlh_negosiasi_terbilang" value="<?= terbilang($rowBAHKN["jmlh_negosiasi"]); ?>">
																					<input type="text" hidden name="selisih" value="<?= number_format($rowBAHKN["jmlh_penawaran"] - $rowBAHKN["jmlh_negosiasi"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="selisih_terbilang" value="<?= terbilang($rowBAHKN["jmlh_penawaran"] - $rowBAHKN["jmlh_negosiasi"]); ?>">
																					<input type="text" hidden name="nama_pp" value="<?= $rowBAHKN["nama_pp"]; ?>">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAHKN["nama_wakil_penyedia"]; ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-bahkn<?= $rowBAHKN["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAHKN)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bahkn/add-bahkn?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>

														<!-- TEMPLATE BAHP -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAHP)) : ?>
																<?php foreach ($queryBAHP as $rowBAHP) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bahp/edit-bahp?id_bahp=<?= $rowBAHP["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="bahp/print-word" method="post">
																					<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAHP["tgl_surat"], -5, 2); ?>">
																					<input type="text" hidden name="no_tgl" value="<?= substr($rowBAHP["tgl_surat"], -2, 2); ?>">
																					<input type="text" hidden name="no_kegiatan" value="<?= $rowBAHP["no_kegiatan"]; ?>">
																					<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																					<input type="text" hidden name="no_tahun" value="<?= substr($rowBAHP["tgl_surat"], 0, 4); ?>">
																					<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAHP["tgl_surat"]))]; ?>">

																					<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAHP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAHP["tgl_surat"]); ?>">

																					<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAHP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="nama_satker" value="<?= $rowBAHP["nama_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAHP["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAHP["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nomor_npwp" value="<?= $rowBAHP["nomor_npwp"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAHP["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAHP["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="kode_rup" value="<?= $rowBAHP["kode_rup"]; ?>">
																					<input type="text" hidden name="harga_penawaran" value="<?= number_format($rowBAHP["harga_penawaran"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="harga_penawaran_terbilang" value="<?= terbilang($rowBAHP["harga_penawaran"]); ?>">
																					<input type="text" hidden name="harga_negosiasi" value="<?= number_format($rowBAHP["harga_negosiasi"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="harga_negosiasi_terbilang" value="<?= terbilang($rowBAHP["harga_negosiasi"]); ?>">
																					<input type="text" hidden name="selisih" value="<?= number_format($rowBAHP["harga_penawaran"] - $rowBAHP["harga_negosiasi"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="selisih_terbilang" value="<?= terbilang($rowBAHP["harga_penawaran"] - $rowBAHP["harga_negosiasi"]); ?>">
																					<input type="text" hidden name="nomor_dipa" value="<?= $rowBAHP["nomor_dipa"]; ?>">
																					<input type="text" hidden name="tgl_dipa" value="<?= tgl_indo(date($rowBAHP["tgl_dipa"])); ?>">
																					<input type="text" hidden name="tgl_bln_thn" value="<?= tgl_indo(date($rowBAHP["tgl_surat"])); ?>">
																					<input type="text" hidden name="nama_pp" value="<?= $rowBAHP["nama_pp"]; ?>">
																					<input type="text" hidden name="nip" value="<?= $rowBAHP["nip"]; ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-bahp<?= $rowBAHP["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAHP)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bahp/add-bahp?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>

														<!-- TEMPLATE SPES -->
														<td>
															<!-- READY -->
															<?php if (!empty($querySPes)) : ?>
																<?php foreach ($queryPaket as $row) : ?>
																	<?php foreach ($querySPes as $rowSPes) : ?>
																		<div class="form-button-action">
																			<div class="dropdown show">
																				<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																					<i class="fa fa-check"></i>
																				</a>

																				<div class="dropdown-menu dropdown-menu-opsi template-spes" aria-labelledby="dropdownMenuLink">
																					<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>spes/edit-spes?id_spes=<?= $rowSPes["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																					<!-- CEK JIKA USER TIDAK MEMILIH PPN -->
																					<?php if ($row["ppn"] === "0") : ?>
																						<form action="spes/print-word-cover" method="post">
																							<input type="text" hidden name="no_bln_angka" value="<?= substr($rowSPes["tgl_surat"], -5, 2); ?>">
																							<input type="text" hidden name="no_tgl" value="<?= substr($rowSPes["tgl_surat"], -2, 2); ?>">
																							<input type="text" hidden name="no_kegiatan" value="<?= $rowSPes["no_kegiatan"]; ?>">
																							<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowSPes["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																							<input type="text" hidden name="no_tahun" value="<?= substr($rowSPes["tgl_surat"], 0, 4); ?>">

																							<input type="text" hidden name="nama_satker" value="<?= $rowSPes["nama_satker"]; ?>">
																							<input type="text" hidden name="alamat_satker" value="<?= $rowSPes["alamat_satker"]; ?>">
																							<input type="text" hidden name="nama_perusahaan" value="<?= $rowSPes["nama_perusahaan"]; ?>">
																							<input type="text" hidden name="alamat_perusahaan" value="<?= $rowSPes["alamat_perusahaan"]; ?>">
																							<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowSPes["nama_wakil_penyedia"]; ?>">
																							<input type="text" hidden name="jabatan" value="<?= $rowSPes["jabatan"]; ?>">
																							<input type="text" hidden name="nama_pekerjaan" value="<?= $rowSPes["nama_pekerjaan"]; ?>">
																							<input type="text" hidden name="tahun_anggaran" value="<?= $rowSPes["tahun_anggaran"]; ?>">
																							<input type="text" hidden name="nomor_dipa" value="<?= $rowSPes["nomor_dipa"]; ?>">
																							<input type="text" hidden name="tgl_bln_thn_dipa" value="<?= tgl_indo(date($rowSPes["tgl_bln_thn_dipa"])); ?>">
																							<input type="text" hidden name="program" value="<?= $rowSPes["program"]; ?>">
																							<input type="text" hidden name="kegiatan" value="<?= $rowSPes["kegiatan"]; ?>">
																							<input type="text" hidden name="output" value="<?= $rowSPes["output"]; ?>">
																							<input type="text" hidden name="sub_output" value="<?= $rowSPes["sub_output"]; ?>">
																							<input type="text" hidden name="komponen" value="<?= $rowSPes["komponen"]; ?>">
																							<input type="text" hidden name="sub_komponen" value="<?= $rowSPes["sub_komponen"]; ?>">
																							<input type="text" hidden name="akun" value="<?= $rowSPes["akun"]; ?>">
																							<input type="text" hidden name="rincian_pok" value="<?= $rowSPes["rincian_pok"]; ?>">
																							<input type="text" hidden name="from_tgl" value="<?= substr($rowSPes["from_tgl"], -2, 3); ?>">
																							<input type="text" hidden name="to_tgl" value="<?= tgl_indo(date($rowSPes["to_tgl"])); ?>">
																							<input type="text" hidden name="range" value="<?php include("spes/_range.php") ?>">
																							<input type="text" hidden name="range_spelling" value="<?php include("spes/_range_spelling.php") ?>">
																							<input type="text" hidden name="nama_tempat" value="<?= $rowSPes["nama_tempat"]; ?>">
																							<input type="text" hidden name="tgl_bln_thn" value="<?= tgl_indo(date($rowSPes["tgl_surat"])); ?>">
																							<input type="text" hidden name="jenis_spesifikasi" value="<?= $rowSPes["jenis_spesifikasi"]; ?>">
																							<input type="text" hidden name="satuan" value="<?= $rowSPes["satuan"]; ?>">
																							<input type="text" hidden name="vol" value="<?= $rowSPes["vol"]; ?>">
																							<input type="text" hidden name="harga_satuan" value="<?= number_format($rowSPes["harga_satuan"], 0, ',', '.'); ?>">
																							<input type="text" hidden name="total_harga" value="<?= number_format($rowSPes["harga_satuan"] * $rowSPes["vol"], 0, ',', '.'); ?>">

																							<input type="text" hidden name="total_harga_terbilang" value="<?= terbilang($rowSPes["harga_satuan"] * $rowSPes["vol"]); ?>">

																							<input type="text" hidden name="keterangan" value="<?= $rowSPes["keterangan"]; ?>">

																							<input type="text" hidden name="nama_pp" value="<?= $rowSPes["nama_pp"]; ?>">

																							<input type="text" hidden name="nip" value="<?= $rowSPes["nip"]; ?>">
																							<input type="text" hidden name="jmlh_negosiasi" value="<?= number_format($rowSPes["jmlh_negosiasi"], 0, ',', '.'); ?>">
																							<input type="text" hidden name="jmlh_negosiasi_terbilang" value="<?= terbilang($rowSPes["jmlh_negosiasi"]); ?>">


																							<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																						</form>
																					<?php endif; ?>

																					<!-- CEK JIKA USER MEMILIH PPN -->
																					<?php if ($row["ppn"] === "1") : ?>
																						<form action="spes/print-word" method="post">
																							<input type="text" hidden name="no_bln_angka" value="<?= substr($rowSPes["tgl_surat"], -5, 2); ?>">
																							<input type="text" hidden name="no_tgl" value="<?= substr($rowSPes["tgl_surat"], -2, 2); ?>">
																							<input type="text" hidden name="no_kegiatan" value="<?= $rowSPes["no_kegiatan"]; ?>">
																							<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowSPes["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																							<input type="text" hidden name="no_tahun" value="<?= substr($rowSPes["tgl_surat"], 0, 4); ?>">

																							<input type="text" hidden name="nama_satker" value="<?= $rowSPes["nama_satker"]; ?>">
																							<input type="text" hidden name="alamat_satker" value="<?= $rowSPes["alamat_satker"]; ?>">
																							<input type="text" hidden name="nama_perusahaan" value="<?= $rowSPes["nama_perusahaan"]; ?>">
																							<input type="text" hidden name="alamat_perusahaan" value="<?= $rowSPes["alamat_perusahaan"]; ?>">
																							<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowSPes["nama_wakil_penyedia"]; ?>">
																							<input type="text" hidden name="jabatan" value="<?= $rowSPes["jabatan"]; ?>">
																							<input type="text" hidden name="nama_pekerjaan" value="<?= $rowSPes["nama_pekerjaan"]; ?>">
																							<input type="text" hidden name="tahun_anggaran" value="<?= $rowSPes["tahun_anggaran"]; ?>">
																							<input type="text" hidden name="nomor_dipa" value="<?= $rowSPes["nomor_dipa"]; ?>">
																							<input type="text" hidden name="tgl_bln_thn_dipa" value="<?= tgl_indo(date($rowSPes["tgl_bln_thn_dipa"])); ?>">
																							<input type="text" hidden name="program" value="<?= $rowSPes["program"]; ?>">
																							<input type="text" hidden name="kegiatan" value="<?= $rowSPes["kegiatan"]; ?>">
																							<input type="text" hidden name="output" value="<?= $rowSPes["output"]; ?>">
																							<input type="text" hidden name="sub_output" value="<?= $rowSPes["sub_output"]; ?>">
																							<input type="text" hidden name="komponen" value="<?= $rowSPes["komponen"]; ?>">
																							<input type="text" hidden name="sub_komponen" value="<?= $rowSPes["sub_komponen"]; ?>">
																							<input type="text" hidden name="akun" value="<?= $rowSPes["akun"]; ?>">
																							<input type="text" hidden name="rincian_pok" value="<?= $rowSPes["rincian_pok"]; ?>">
																							<input type="text" hidden name="from_tgl" value="<?= substr($rowSPes["from_tgl"], -2, 3); ?>">
																							<input type="text" hidden name="to_tgl" value="<?= tgl_indo(date($rowSPes["to_tgl"])); ?>">
																							<input type="text" hidden name="range" value="<?php include("spes/_range.php") ?>">
																							<input type="text" hidden name="range_spelling" value="<?php include("spes/_range_spelling.php") ?>">
																							<input type="text" hidden name="nama_tempat" value="<?= $rowSPes["nama_tempat"]; ?>">
																							<input type="text" hidden name="tgl_bln_thn" value="<?= tgl_indo(date($rowSPes["tgl_surat"])); ?>">
																							<input type="text" hidden name="jenis_spesifikasi" value="<?= $rowSPes["jenis_spesifikasi"]; ?>">
																							<input type="text" hidden name="satuan" value="<?= $rowSPes["satuan"]; ?>">
																							<input type="text" hidden name="vol" value="<?= $rowSPes["vol"]; ?>">
																							<input type="text" hidden name="harga_satuan" value="<?= number_format($rowSPes["harga_satuan"], 0, ',', '.'); ?>">
																							<input type="text" hidden name="total_harga" value="<?= number_format($rowSPes["harga_satuan"] * $rowSPes["vol"], 0, ',', '.'); ?>">

																							<input type="text" hidden name="ppn" value="<?= number_format(11 / 100 * $rowSPes["jmlh_negosiasi"], 0, ',', '.'); ?>">
																							<input type="text" hidden name="total" value="<?php
																																														//  Jumlah + PPN
																																														$total = $rowSPes["harga_satuan"] * $rowSPes["vol"] +
																																															11 / 100 * $rowSPes["harga_satuan"] * $rowSPes["vol"];
																																														echo number_format($total, 0, ',', '.');
																																														?>">
																							<input type="text" hidden name="rounded" value="<?php include("spes/_rounded.php"); ?>">

																							<input type="text" hidden name="rounded_spelling" value="<?php include("spes/_rounded_spelling.php"); ?>">

																							<input type="text" hidden name="keterangan" value="<?= $rowSPes["keterangan"]; ?>">

																							<input type="text" hidden name="nama_pp" value="<?= $rowSPes["nama_pp"]; ?>">

																							<input type="text" hidden name="nip" value="<?= $rowSPes["nip"]; ?>">

																							<input type="text" hidden name="jmlh_negosiasi" value="<?= number_format($rowSPes["jmlh_negosiasi"], 0, ',', '.'); ?>">
																							<input type="text" hidden name="jmlh_negosiasi_terbilang" value="<?= terbilang($rowSPes["jmlh_negosiasi"]); ?>">


																							<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																						</form>
																					<?php endif; ?>

																					<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-spes<?= $rowSPes["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																				</div>


																			</div>
																		</div>
																	<?php endforeach; ?>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($querySPes)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>spes/add-spes?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>

														<!-- TEMPLATE BAHPP -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAHPP)) : ?>
																<?php foreach ($queryBAHPP as $rowBAHPP) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bahpp/edit-bahpp?id_bahpp=<?= $rowBAHPP["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="bahpp/print-word" method="post">
																					<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAHPP["tgl_surat"], -5, 2); ?>">
																					<input type="text" hidden name="no_tgl" value="<?= substr($rowBAHPP["tgl_surat"], -2, 2); ?>">
																					<input type="text" hidden name="no_kegiatan" value="<?= $rowBAHPP["no_kegiatan"]; ?>">
																					<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																					<input type="text" hidden name="no_tahun" value="<?= substr($rowBAHPP["tgl_surat"], 0, 4); ?>">
																					<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAHPP["tgl_surat"]))]; ?>">

																					<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAHPP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAHPP["tgl_surat"]); ?>">

																					<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAHPP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="nama_satker" value="<?= $rowBAHPP["nama_satker"]; ?>">
																					<input type="text" hidden name="alamat_satker" value="<?= $rowBAHPP["alamat_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAHPP["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAHPP["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAHPP["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAHPP["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAHPP["nama_wakil_penyedia"]; ?>">
																					<input type="text" hidden name="jabatan" value="<?= $rowBAHPP["jabatan"]; ?>">
																					<input type="text" hidden name="nama_ppk" value="<?= $rowBAHPP["nama_ppk"]; ?>">
																					<input type="text" hidden name="nama_perwakilan_sm" value="<?= $rowBAHPP["nama_perwakilan_sm"]; ?>">
																					<input type="text" hidden name="nama_petugas_verifikasi_mdp" value="<?= $rowBAHPP["nama_petugas_verifikasi_mdp"]; ?>">
																					<input type="text" hidden name="nama_pendukung1" value="<?= $rowBAHPP["nama_pendukung1"]; ?>">
																					<input type="text" hidden name="nama_pendukung2" value="<?= $rowBAHPP["nama_pendukung2"]; ?>">
																					<input type="text" hidden name="jenis_surat" value="<?= $rowBAHPP["jenis_surat"]; ?>">
																					<input type="text" hidden name="no_jenis_surat" value="<?= $rowBAHPP["no_jenis_surat"]; ?>">
																					<input type="text" hidden name="tgl_jenis_surat" value="<?= tgl_indo(substr($rowBAHPP["no_jenis_surat"], -4, 5) . "-" . substr($rowBAHPP["no_jenis_surat"], 0, 2) . "-" . substr($rowBAHPP["no_jenis_surat"], 3, 2)); ?>">
																					<input type="text" hidden name="tgl_surat" value="<?= tgl_indo(date($rowBAHPP["tgl_surat"])); ?>">
																					<input type="text" hidden name="uraian" value="<?= $rowBAHPP["uraian"]; ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-bahpp<?= $rowBAHPP["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAHPP)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bahpp/add-bahpp?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE BAPP -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAPP)) : ?>
																<?php foreach ($queryBAPP as $rowBAPP) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bapp/edit-bapp?id_bapp=<?= $rowBAPP["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="bapp/print-word" method="post">
																					<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAPP["tgl_surat"], -5, 2); ?>">
																					<input type="text" hidden name="no_tgl" value="<?= substr($rowBAPP["tgl_surat"], -2, 2); ?>">
																					<input type="text" hidden name="no_kegiatan" value="<?= $rowBAPP["no_kegiatan"]; ?>">
																					<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																					<input type="text" hidden name="no_tahun" value="<?= substr($rowBAPP["tgl_surat"], 0, 4); ?>">
																					<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAPP["tgl_surat"]))]; ?>">

																					<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAPP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAPP["tgl_surat"]); ?>">

																					<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAPP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="nama_satker" value="<?= $rowBAPP["nama_satker"]; ?>">
																					<input type="text" hidden name="alamat_satker" value="<?= $rowBAPP["alamat_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAPP["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAPP["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAPP["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAPP["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAPP["nama_wakil_penyedia"]; ?>">
																					<input type="text" hidden name="jabatan" value="<?= $rowBAPP["jabatan"]; ?>">
																					<input type="text" hidden name="no_bahpp" value="<?= $rowBAPP["no_bahpp"]; ?>">
																					<input type="text" hidden name="tgl_no_bahpp" value="<?= tgl_indo(substr($rowBAPP["no_bahpp"], -4, 5) . "-" . substr($rowBAPP["no_bahpp"], 0, 2) . "-" . substr($rowBAPP["no_bahpp"], 3, 2)); ?>">
																					<input type="text" hidden name="jenis_surat" value="<?= $rowBAPP["jenis_surat"]; ?>">
																					<input type="text" hidden name="no_jenis_surat" value="<?= $rowBAPP["no_jenis_surat"]; ?>">
																					<input type="text" hidden name="tgl_jenis_surat" value="<?= tgl_indo(substr($rowBAPP["no_jenis_surat"], -4, 5) . "-" . substr($rowBAPP["no_jenis_surat"], 0, 2) . "-" . substr($rowBAPP["no_jenis_surat"], 3, 2)); ?>">
																					<input type="text" hidden name="nama_ppk" value="<?= $rowBAPP["nama_ppk"]; ?>">
																					<input type="text" hidden name="nip" value="<?= $rowBAPP["nip"]; ?>">
																					<input type="text" hidden name="tgl_surat" value="<?= tgl_indo(date($rowBAPP["tgl_surat"])); ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-bapp<?= $rowBAPP["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAPP)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bapp/add-bapp?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE BAST -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAST)) : ?>
																<?php foreach ($queryBAST as $rowBAST) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bast/edit-bast?id_bast=<?= $rowBAST["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="bast/print-word" method="post">
																					<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAST["tgl_surat"], -5, 2); ?>">
																					<input type="text" hidden name="no_tgl" value="<?= substr($rowBAST["tgl_surat"], -2, 2); ?>">
																					<input type="text" hidden name="no_kegiatan" value="<?= $rowBAST["no_kegiatan"]; ?>">
																					<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAST["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																					<input type="text" hidden name="no_tahun" value="<?= substr($rowBAST["tgl_surat"], 0, 4); ?>">
																					<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAST["tgl_surat"]))]; ?>">

																					<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAST["tgl_surat"]))); ?>">

																					<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAST["tgl_surat"]); ?>">

																					<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAST["tgl_surat"]))); ?>">

																					<input type="text" hidden name="nama_satker" value="<?= $rowBAST["nama_satker"]; ?>">
																					<input type="text" hidden name="alamat_satker" value="<?= $rowBAST["alamat_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAST["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAST["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAST["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAST["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAST["nama_wakil_penyedia"]; ?>">
																					<input type="text" hidden name="jabatan" value="<?= $rowBAST["jabatan"]; ?>">
																					<input type="text" hidden name="no_bapp" value="<?= $rowBAST["no_bapp"]; ?>">
																					<input type="text" hidden name="tgl_no_bapp" value="<?= tgl_indo(substr($rowBAST["no_bapp"], -4, 5) . "-" . substr($rowBAST["no_bapp"], 0, 2) . "-" . substr($rowBAST["no_bapp"], 3, 2)); ?>">
																					<input type="text" hidden name="jenis_surat" value="<?= $rowBAST["jenis_surat"]; ?>">
																					<input type="text" hidden name="no_jenis_surat" value="<?= $rowBAST["no_jenis_surat"]; ?>">
																					<input type="text" hidden name="tgl_jenis_surat" value="<?= tgl_indo(substr($rowBAST["no_jenis_surat"], -4, 5) . "-" . substr($rowBAST["no_jenis_surat"], 0, 2) . "-" . substr($rowBAST["no_jenis_surat"], 3, 2)); ?>">
																					<input type="text" hidden name="nama_ppk" value="<?= $rowBAST["nama_ppk"]; ?>">
																					<input type="text" hidden name="nip" value="<?= $rowBAST["nip"]; ?>">
																					<input type="text" hidden name="tgl_surat" value="<?= tgl_indo(date($rowBAST["tgl_surat"])); ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-bast<?= $rowBAST["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAST)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bast/add-bast?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE BAP -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryBAP)) : ?>
																<?php foreach ($queryBAP as $rowBAP) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bap/edit-bap?id_bap=<?= $rowBAP["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="bap/print-word" method="post">
																					<input type="text" hidden name="no_bln_angka" value="<?= substr($rowBAP["tgl_surat"], -5, 2); ?>">
																					<input type="text" hidden name="no_tgl" value="<?= substr($rowBAP["tgl_surat"], -2, 2); ?>">
																					<input type="text" hidden name="no_kegiatan" value="<?= $rowBAP["no_kegiatan"]; ?>">
																					<input type="text" hidden name="no_bln_romawi" value="<?php if ($month01 === substr($rowBAP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>">
																					<input type="text" hidden name="no_tahun" value="<?= substr($rowBAP["tgl_surat"], 0, 4); ?>">
																					<input type="text" hidden name="hari_terbilang" value="<?= $hari[date('N', strtotime($rowBAP["tgl_surat"]))]; ?>">

																					<input type="text" hidden name="tgl_terbilang" value="<?= terbilang(date('d', strtotime($rowBAP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="bln_terbilang" value="<?= bln_indo($rowBAP["tgl_surat"]); ?>">

																					<input type="text" hidden name="thn_terbilang" value="<?= terbilang(date('Y', strtotime($rowBAP["tgl_surat"]))); ?>">

																					<input type="text" hidden name="nama_satker" value="<?= $rowBAP["nama_satker"]; ?>">
																					<input type="text" hidden name="alamat_satker" value="<?= $rowBAP["alamat_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowBAP["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="alamat_perusahaan" value="<?= $rowBAP["alamat_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowBAP["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowBAP["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowBAP["nama_wakil_penyedia"]; ?>">
																					<input type="text" hidden name="jabatan" value="<?= $rowBAP["jabatan"]; ?>">
																					<input type="text" hidden name="no_bast" value="<?= $rowBAP["no_bast"]; ?>">
																					<input type="text" hidden name="tgl_no_bast" value="<?= tgl_indo(substr($rowBAP["no_bast"], -4, 5) . "-" . substr($rowBAP["no_bast"], 0, 2) . "-" . substr($rowBAP["no_bast"], 3, 2)); ?>">
																					<input type="text" hidden name="jenis_surat" value="<?= $rowBAP["jenis_surat"]; ?>">
																					<input type="text" hidden name="no_jenis_surat" value="<?= $rowBAP["no_jenis_surat"]; ?>">
																					<input type="text" hidden name="tgl_jenis_surat" value="<?= tgl_indo(substr($rowBAP["no_jenis_surat"], -4, 5) . "-" . substr($rowBAP["no_jenis_surat"], 0, 2) . "-" . substr($rowBAP["no_jenis_surat"], 3, 2)); ?>">
																					<input type="text" hidden name="no_dipa" value="<?= $rowBAP["no_dipa"]; ?>">
																					<input type="text" hidden name="tgl_dipa" value="<?= tgl_indo($rowBAP["tgl_dipa"]); ?>">
																					<input type="text" hidden name="pembayaran_resmi" value="<?= number_format($rowBAP["pembayaran_resmi"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="pembayaran_resmi_terbilang" value="<?= terbilang($rowBAP["pembayaran_resmi"]); ?>">
																					<input type="text" hidden name="nama_ppk" value="<?= $rowBAP["nama_ppk"]; ?>">
																					<input type="text" hidden name="nip" value="<?= $rowBAP["nip"]; ?>">
																					<input type="text" hidden name="tgl_surat" value="<?= tgl_indo(date($rowBAP["tgl_surat"])); ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-bap<?= $rowBAP["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryBAP)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>bap/add-bap?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE Kwitansi -->
														<td>
															<!-- READY -->
															<?php if (!empty($queryKwitansi)) : ?>
																<?php foreach ($queryKwitansi as $rowKwitansi) : ?>
																	<div class="form-button-action">
																		<div class="dropdown show">
																			<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																				<i class="fa fa-check"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																				<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>kwitansi/edit-kwitansi?id_kwitansi=<?= $rowKwitansi["id"]; ?>"><i class="fa fa-edit"></i> Ubah</a>

																				<form action="kwitansi/print-word" method="post">
																					<input type="text" hidden name="nama_tempat" value="<?= $rowKwitansi["nama_tempat"]; ?>">
																					<input type="text" hidden name="tgl_surat" value="<?= tgl_indo($rowKwitansi["tgl_surat"]); ?>">
																					<input type="text" hidden name="nama_satker" value="<?= $rowKwitansi["nama_satker"]; ?>">
																					<input type="text" hidden name="nama_perusahaan" value="<?= $rowKwitansi["nama_perusahaan"]; ?>">
																					<input type="text" hidden name="nama_pekerjaan" value="<?= $rowKwitansi["nama_pekerjaan"]; ?>">
																					<input type="text" hidden name="tahun_anggaran" value="<?= $rowKwitansi["tahun_anggaran"]; ?>">
																					<input type="text" hidden name="nama_wakil_penyedia" value="<?= $rowKwitansi["nama_wakil_penyedia"]; ?>">
																					<input type="text" hidden name="jabatan" value="<?= $rowKwitansi["jabatan"]; ?>">
																					<input type="text" hidden name="jenis_surat" value="<?= $rowKwitansi["jenis_surat"]; ?>">
																					<input type="text" hidden name="no_jenis_surat" value="<?= $rowKwitansi["no_jenis_surat"]; ?>">
																					<input type="text" hidden name="tgl_jenis_surat" value="<?= tgl_indo(substr($rowKwitansi["no_jenis_surat"], -4, 5) . "-" . substr($rowKwitansi["no_jenis_surat"], 0, 2) . "-" . substr($rowKwitansi["no_jenis_surat"], 3, 2)); ?>">
																					<input type="text" hidden name="pembayaran_resmi" value="<?= number_format($rowKwitansi["pembayaran_resmi"], 0, ',', '.'); ?>">
																					<input type="text" hidden name="pembayaran_resmi_terbilang" value="<?= terbilang($rowKwitansi["pembayaran_resmi"]); ?>">
																					<input type="text" hidden name="nama_ppk" value="<?= $rowKwitansi["nama_ppk"]; ?>">
																					<input type="text" hidden name="nip" value="<?= $rowKwitansi["nip"]; ?>">
																					<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																				</form>

																				<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#reset-kwitansi<?= $rowKwitansi["id"]; ?>"><i class=" fa fa-times"></i> Reset</a>

																			</div>


																		</div>
																	</div>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($queryKwitansi)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>

																		<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																			<a class="dropdown-item text-light bg-skb-3" href="<?php include("url.php"); ?>kwitansi/add-kwitansi?id_barang_jasa=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Tambah</a>
																		</div>
																	</div>
																</div>
															<?php endif; ?>
														</td>


														<!-- TEMPLATE COVER -->
														<td>
															<!-- READY -->
															<?php if (!empty($querySPes)) : ?>
																<?php foreach ($queryPaket as $row) : ?>
																	<?php foreach ($querySPes as $rowSPes) : ?>
																		<div class="form-button-action">
																			<div class="dropdown show">
																				<a class="show-opsi bg-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																					<i class="fa fa-check"></i>
																				</a>

																				<div class="dropdown-menu dropdown-menu-opsi template-cover" aria-labelledby="dropdownMenuLink">
																					<form action="spes/print-word-cover" method="post">
																						<input type="text" hidden name="no_spes" value="<?= substr($rowSPes["tgl_surat"], -5, 2); ?>.<?= substr($rowSPes["tgl_surat"], -2, 2); ?>/SPes/<?= $rowSPes["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($rowSPes["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowSPes["tgl_surat"], 0, 4); ?>">
																						<input type="text" hidden name="tgl_no_spes" value="<?= tgl_indo(date($rowSPes["tgl_surat"])); ?>">
																						<input type="text" hidden name="nama_satker" value="<?= strtoupper($rowSPes["nama_satker"]); ?>">
																						<input type="text" hidden name="nama_perusahaan" value="<?= strtoupper($rowSPes["nama_perusahaan"]); ?>">
																						<input type="text" hidden name="nama_pekerjaan" value="<?= strtoupper($rowSPes["nama_pekerjaan"]); ?>">
																						<input type="text" hidden name="tahun_anggaran" value="<?= $rowSPes["tahun_anggaran"]; ?>">
																						<input type="text" hidden name="no_dipa" value="<?= strtoupper($rowSPes["nomor_dipa"]); ?>">
																						<input type="text" hidden name="tgl_dipa" value="<?= strtoupper(tgl_indo(date($rowSPes["tgl_bln_thn_dipa"]))); ?>">
																						<input type="text" hidden name="range" value="<?php include("spes/_range.php") ?>">
																						<input type="text" hidden name="range_spelling" value="<?php include("spes/_range_spelling.php") ?>">
																						<input type="text" hidden name="jmlh_negosiasi" value="<?= number_format($rowSPes["jmlh_negosiasi"], 0, ',', '.'); ?>">
																						<input type="text" hidden name="jmlh_negosiasi_terbilang" value="<?= terbilang($rowSPes["jmlh_negosiasi"]); ?>">

																						<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																					</form>
																				</div>


																			</div>
																		</div>
																	<?php endforeach; ?>
																<?php endforeach; ?>
															<?php endif; ?>

															<!-- NOT READY -->
															<?php if (empty($querySPes)) : ?>
																<div class="form-button-action">
																	<div class="dropdown show">
																		<a class="show-opsi bg-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fas fa-undo"></i>
																		</a>
																	</div>
																</div>
															<?php endif; ?>
														</td>


													</tr>
													<?php $noTable++; ?>

												<?php endforeach; ?>

											</tbody>
										</table>
									</div>
								</div>
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
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Pilih "Keluar" jika anda yakin ingin mengakhiri sesi anda saat ini.</div>
					<div class="modal-footer">
						<button class="btn bg-skb-3" type="button" data-dismiss="modal">Batal</button>
						<a class="btn bg-skb-1" href="../../auth/logout">Keluar</a>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal Delete Paket -->
		<?php foreach ($queryPaket as $row) : ?>
			<div class="modal fade" id="delete-paket<?= $row["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Hapus Paket?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Data paket ini akan dihapus secara permanen</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="delete-paket?id_del_paket=<?= $row["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Hapus</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<!-- Modal Reset Memo -->
		<?php foreach ($queryMemo as $rowMemo) : ?>
			<div class="modal fade" id="reset-memo<?= $rowMemo["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset Memo?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowMemo["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowMemo["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Terbit</td>
									<td>: <?= tgl_indo(date($rowMemo["tgl_terbit"])); ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowMemo["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Permintaan</td>
									<td>: <?= tgl_indo(date($rowMemo["tgl_permintaan"])); ?></td>
								</tr>
								<tr>
									<td>Fungsi</td>
									<td>: <?= $rowMemo["fungsi"]; ?></td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $rowMemo["nama_ppk"]; ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="memo/delete-memo?id_del_memo=<?= $rowMemo["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<!-- Modal Resey baphk -->
		<?php foreach ($queryBAPHK as $rowBAPHK) : ?>
			<div class="modal fade" id="reset-baphk<?= $rowBAPHK["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAPHK?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAPHK["tgl_surat"], -5, 2); ?>.<?= substr($rowBAPHK["tgl_surat"], -2, 2); ?>/BAPHK/<?= $rowBAPHK["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAPHK["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAPHK["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAPHK["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAPHK["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAPHK["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAPHK["tgl_surat"]))); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAPHK["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAPHK["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAPHK["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Izin Usaha</td>
									<td>: <?= $rowBAPHK["no_izin_usaha"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Penerbitan NIB</td>
									<td>: <?= tgl_indo(date($rowBAPHK["tgl_terbit_nib"])); ?></td>
								</tr>
								<tr>
									<td>Perubahan Ke</td>
									<td>:
										<?php if (empty($rowBAPHK["perubahan_ke"])) : ?>
											-
										<?php endif; ?>
										<?php if (!empty($rowBAPHK["perubahan_ke"])) : ?>
											<?= $rowBAPHK["perubahan_ke"]; ?>
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td>Nomor NPWP</td>
									<td>: <?= $rowBAPHK["nomor_npwp"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAPHK["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAPHK["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama PP</td>
									<td>: <?= $rowBAPHK["nama_pp"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowBAPHK["nama_wakil_penyedia"]; ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="baphk/delete-baphk?id_del_baphk=<?= $rowBAPHK["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset PIP -->
		<?php foreach ($queryPIP as $rowPIP) : ?>
			<div class="modal fade" id="reset-pip<?= $rowPIP["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset PIP?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nama</td>
									<td>: <?= $rowPIP["nama"]; ?></td>
								</tr>
								<tr>
									<td>No. Identitas</td>
									<td>: <?= $rowPIP["no_identitas"]; ?></td>
								</tr>
								<tr>
									<td>Alamat KTP</td>
									<td>: <?= $rowPIP["alamat_ktp"]; ?></td>
								</tr>
								<tr>
									<td>Pekerjaan</td>
									<td>: <?= $rowPIP["pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowPIP["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowPIP["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowPIP["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Tempat</td>
									<td>: <?= $rowPIP["nama_tempat"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowPIP["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="pip/delete-pip?id_del_pip=<?= $rowPIP["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset PIBU -->
		<?php foreach ($queryPIBU as $rowPIBU) : ?>
			<div class="modal fade" id="reset-pibu<?= $rowPIBU["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset PIBU?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowPIBU["nama_wakil_penyedia"]; ?></td>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowPIBU["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowPIBU["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowPIBU["nama_perusahaan"]; ?></td>
								</tr>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowPIBU["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowPIBU["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowPIBU["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Tempat</td>
									<td>: <?= $rowPIBU["nama_tempat"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowPIBU["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="pibu/delete-pibu?id_del_pibu=<?= $rowPIBU["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset bahkn -->
		<?php foreach ($queryBAHKN as $rowBAHKN) : ?>
			<div class="modal fade" id="reset-bahkn<?= $rowBAHKN["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAHKN?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAHKN["tgl_surat"], -5, 2); ?>.<?= substr($rowBAHKN["tgl_surat"], -2, 2); ?>/BAHKN/<?= $rowBAHKN["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAHKN["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAHKN["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAHKN["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAHKN["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAHKN["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAHKN["tgl_surat"]))); ?>

									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAHKN["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAHKN["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAHKN["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAHKN["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAHKN["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Jumlah Penawaran</td>
									<td>Rp. <?= number_format($rowBAHKN["jmlh_penawaran"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Jumlah Negosiasi</td>
									<td>Rp. <?= number_format($rowBAHKN["jmlh_negosiasi"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Selisih</td>
									<td>
										Rp.
										<?= number_format($rowBAHKN["jmlh_penawaran"] -
											$rowBAHKN["jmlh_negosiasi"], 0, ',', '.');
										?>
									</td>
								</tr>
								<tr>
									<td>Nama PP</td>
									<td>: <?= $rowBAHKN["nama_pp"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowBAHKN["nama_wakil_penyedia"]; ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="bahkn/delete-bahkn?id_del_bahkn=<?= $rowBAHKN["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset bahp -->
		<?php foreach ($queryBAHP as $rowBAHP) : ?>
			<div class="modal fade" id="reset-bahp<?= $rowBAHP["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAHP?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAHP["tgl_surat"], -5, 2); ?>.<?= substr($rowBAHP["tgl_surat"], -2, 2); ?>/BAHP/<?= $rowBAHP["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAHP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAHP["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAHP["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAHP["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAHP["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAHP["tgl_surat"]))); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAHP["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAHP["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAHP["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nomor NPWP</td>
									<td>: <?= $rowBAHP["nomor_npwp"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAHP["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAHP["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Kode RUP</td>
									<td>: <?= $rowBAHP["kode_rup"]; ?></td>
								</tr>
								<tr>
									<td>Harga Penawaran</td>
									<td>Rp. <?= number_format($rowBAHP["harga_penawaran"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Harga Negosiasi</td>
									<td>Rp. <?= number_format($rowBAHP["harga_negosiasi"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Selisih</td>
									<td>
										Rp.
										<?= number_format($rowBAHP["harga_penawaran"] -
											$rowBAHP["harga_negosiasi"], 0, ',', '.');
										?>
									</td>
								</tr>
								<tr>
									<td>Nomor DIPA</td>
									<td>: <?= $rowBAHP["nomor_dipa"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal DIPA</td>
									<td>: <?= tgl_indo(date($rowBAHP["tgl_dipa"])); ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowBAHP["tgl_surat"])); ?></td>
								</tr>
								<tr>
									<td>Nama PP</td>
									<td>: <?= $rowBAHP["nama_pp"]; ?></td>
								</tr>
								<tr>
									<td>NIP</td>
									<td>: <?= $rowBAHP["nip"]; ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="bahp/delete-bahp?id_del_bahp=<?= $rowBAHP["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset spes -->
		<?php foreach ($querySPes as $rowSPes) : ?>
			<div class="modal fade" id="reset-spes<?= $rowSPes["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset SPes?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowSPes["tgl_surat"], -5, 2); ?>.<?= substr($rowSPes["tgl_surat"], -2, 2); ?>/SPes/<?= $rowSPes["no_kegiatan"]; ?>/PP/<?php if ($month01 === substr($rowSPes["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowSPes["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowSPes["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowSPes["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Satker</td>
									<td>: <?= $rowSPes["alamat_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowSPes["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowSPes["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowSPes["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowSPes["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan Pengadaan</td>
									<td>: <?= $rowSPes["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowSPes["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nomor DIPA</td>
									<td>: <?= $rowSPes["nomor_dipa"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal DIPA</td>
									<td>: <?= tgl_indo(date($rowSPes["tgl_bln_thn_dipa"])); ?></td>
								</tr>
								<tr>
									<td>Program</td>
									<td>: <?= $rowSPes["program"]; ?></td>
								</tr>
								<tr>
									<td>Kegiatan</td>
									<td>: <?= $rowSPes["kegiatan"]; ?></td>
								</tr>
								<tr>
									<td>Output</td>
									<td>: <?= $rowSPes["output"]; ?></td>
								</tr>
								<tr>
									<td>Sub Output</td>
									<td>: <?= $rowSPes["sub_output"]; ?></td>
								</tr>
								<tr>
									<td>Komponen</td>
									<td>: <?= $rowSPes["komponen"]; ?></td>
								</tr>
								<tr>
									<td>Sub Komponen</td>
									<td>: <?= $rowSPes["sub_komponen"]; ?></td>
								</tr>
								<tr>
									<td>Akun</td>
									<td>: <?= $rowSPes["akun"]; ?></td>
								</tr>
								<tr>
									<td>Rincian POK</td>
									<td>: <?= $rowSPes["rincian_pok"]; ?></td>
								</tr>
								<tr>
									<td>Waktu Penyelesaian Pekerjaan</td>
									<td>:
										<?= substr($rowSPes["from_tgl"], -2, 3); ?> <strong>sd</strong> <?= tgl_indo(date($rowSPes["to_tgl"])); ?>
										<br>
										<?php include("spes/_range.php"); ?>
										(<?php include("spes/_range_spelling.php"); ?>) hari
									</td>
								</tr>
								<tr>
									<td>Nama Tempat</td>
									<td>: <?= $rowSPes["nama_tempat"]; ?></td>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowSPes["tgl_surat"])); ?></td>
								</tr>
								<tr>
									<td>Jenis/Spesifikasi</td>
									<td>: <?= $rowSPes["jenis_spesifikasi"]; ?></td>
								</tr>
								<tr>
									<td>Satuan</td>
									<td>: <?= $rowSPes["satuan"]; ?></td>
								</tr>
								<tr>
									<td>Vol</td>
									<td>: <?= $rowSPes["vol"]; ?></td>
								</tr>
								<tr>
									<td>Harga Satuan</td>
									<td>: Rp. <?= number_format($rowSPes["harga_satuan"], 0, ',', '.'); ?></td>
								</tr>
								<!-- <tr>
									<td>Total Harga</td>
									<td>: Rp. <?= number_format($rowSPes["harga_satuan"] * $rowSPes["vol"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Jumlah</td>
									<td>: Rp.
										<!-- Mencari sebuah nilai dari 11% -->
								<?= number_format($rowSPes["harga_satuan"] * $rowSPes["vol"], 0, ',', '.'); ?>
								</td>
								</tr>

								<?php if ($rowSPes["ppn"] === "1") : ?>
									<tr>
										<td>PPN</td>
										<td>: Rp.
											<?= number_format(11 / 100 * $rowSPes["harga_satuan"] * $rowSPes["vol"], 0, ',', '.'); ?>
										</td>
									</tr>
									<tr>
										<td>Total</td>
										<td>: Rp.
											<?php include("spes/_total.php"); ?>
										</td>
									</tr>
									<tr>
										<td>Dibulatkan</td>
										<td>: Rp.
											<?php include("spes/_rounded.php"); ?>
										</td>
									</tr>
								<?php endif; ?> -->

								<!-- <tr>
									<td>Terbilang</td>
									<td>:
										<?php if ($rowSPes["ppn"] === "0") : ?>
											<?= terbilang($rowSPes["harga_satuan"] * $rowSPes["vol"]); ?>
										<?php endif; ?>

										<?php if ($rowSPes["ppn"] === "1") : ?>
											<?php include("spes/_rounded_spelling.php"); ?> Rupiah
										<?php endif; ?>
									</td>
								</tr> -->
								<tr>
									<td>Keterangan</td>
									<td>: <?= $rowSPes["keterangan"]; ?></td>
								</tr>
								<tr>
									<td>Nama PP</td>
									<td>: <?= $rowSPes["nama_pp"]; ?></td>
								<tr>
									<td>NIP</td>
									<td>: <?= $rowSPes["nip"]; ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="spes/delete-spes?id_del_spes=<?= $rowSPes["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset bahpp -->
		<?php foreach ($queryBAHPP as $rowBAHPP) : ?>
			<div class="modal fade" id="reset-bahpp<?= $rowBAHPP["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAHPP?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAHPP["tgl_surat"], -5, 2); ?>.<?= substr($rowBAHPP["tgl_surat"], -2, 2); ?>/BAHPP/<?= $rowBAHPP["no_kegiatan"]; ?>/PPK/<?php if ($month01 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAHPP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAHPP["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAHPP["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAHPP["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAHPP["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAHPP["tgl_surat"]))); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAHPP["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Satker</td>
									<td>: <?= $rowBAHPP["alamat_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAHPP["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAHPP["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAHPP["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAHPP["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowBAHPP["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowBAHPP["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $rowBAHPP["nama_ppk"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perwakilan SM</td>
									<td>: <?= $rowBAHPP["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Petugas Verifikasi MDP</td>
									<td>: <?= $rowBAHPP["nama_petugas_verifikasi_mdp"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pendukung Lainnya</td>
									<td>: <?= $rowBAHPP["nama_pendukung1"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pendukung Lainnya</td>
									<td>: <?= $rowBAHPP["nama_pendukung2"]; ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>: <?= $rowBAHPP["jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Jenis Surat</td>
									<td>: <?= $rowBAHPP["no_jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Uraian</td>
									<td>: <?= $rowBAHPP["uraian"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowBAHPP["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="bahpp/delete-bahpp?id_del_bahpp=<?= $rowBAHPP["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Delete bapp -->
		<?php foreach ($queryBAPP as $rowBAPP) : ?>
			<div class="modal fade" id="reset-bapp<?= $rowBAPP["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAPP?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAPP["tgl_surat"], -5, 2); ?>.<?= substr($rowBAPP["tgl_surat"], -2, 2); ?>/BAPP/<?= $rowBAPP["no_kegiatan"]; ?>/PPK/<?php if ($month01 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAPP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAPP["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAPP["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAPP["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAPP["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAPP["tgl_surat"]))); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAPP["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Satker</td>
									<td>: <?= $rowBAPP["alamat_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAPP["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAPP["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAPP["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAPP["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowBAPP["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowBAPP["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Nomor BAHPP</td>
									<td>: <?= $rowBAPP["no_bahpp"]; ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>: <?= $rowBAPP["jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Jenis Surat</td>
									<td>: <?= $rowBAPP["no_jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $rowBAPP["nama_ppk"]; ?></td>
								</tr>
								<tr>
									<td>NIP PPK</td>
									<td>: <?= $rowBAPP["nip"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowBAPP["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="bapp/delete-bapp?id_del_bapp=<?= $rowBAPP["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset bast -->
		<?php foreach ($queryBAST as $rowBAST) : ?>
			<div class="modal fade" id="reset-bast<?= $rowBAST["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAST?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAST["tgl_surat"], -5, 2); ?>.<?= substr($rowBAST["tgl_surat"], -2, 2); ?>/BAST/<?= $rowBAST["no_kegiatan"]; ?>/PPK/<?php if ($month01 === substr($rowBAST["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAST["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAST["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAST["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAST["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAST["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAST["tgl_surat"]))); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAST["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Satker</td>
									<td>: <?= $rowBAST["alamat_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAST["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAST["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAST["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAST["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowBAST["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowBAST["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Nomor BAPP</td>
									<td>: <?= $rowBAST["no_bapp"]; ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>: <?= $rowBAST["jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Jenis Surat</td>
									<td>: <?= $rowBAST["no_jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $rowBAST["nama_ppk"]; ?></td>
								</tr>
								<tr>
									<td>NIP PPK</td>
									<td>: <?= $rowBAST["nip"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowBAST["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="bast/delete-bast?id_del_bast=<?= $rowBAST["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Hapus</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Reset bap -->
		<?php foreach ($queryBAP as $rowBAP) : ?>
			<div class="modal fade" id="reset-bap<?= $rowBAP["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset BAP?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nomor</td>
									<td>:
										<?= substr($rowBAP["tgl_surat"], -5, 2); ?>.<?= substr($rowBAP["tgl_surat"], -2, 2); ?>/BAP/<?= $rowBAP["no_kegiatan"]; ?>/PPK/<?php if ($month01 === substr($rowBAP["tgl_surat"], -5, 2)) : ?><?php endif; ?><?php if ($month02 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>II<?php endif; ?><?php if ($month03 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>III<?php endif; ?><?php if ($month04 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>IV<?php endif; ?><?php if ($month05 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>V<?php endif; ?><?php if ($month06 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>VI<?php endif; ?><?php if ($month07 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>VII<?php endif; ?><?php if ($month08 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>VIII<?php endif; ?><?php if ($month09 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>IX<?php endif; ?><?php if ($month10 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>X<?php endif; ?><?php if ($month11 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>XI<?php endif; ?><?php if ($month12 === substr($rowBAP["tgl_surat"], -5, 2)) : ?>XII<?php endif; ?>/<?= substr($rowBAP["tgl_surat"], 0, 4); ?>
									</td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>:
										<?= $hari[date('N', strtotime($rowBAP["tgl_surat"]))]; ?>,
										<?= terbilang(date('d', strtotime($rowBAP["tgl_surat"]))); ?>,
										<?= bln_indo($rowBAP["tgl_surat"]); ?>,
										<?= terbilang(date('Y', strtotime($rowBAP["tgl_surat"]))); ?>
									</td>
								</tr>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowBAP["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Satker</td>
									<td>: <?= $rowBAP["alamat_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowBAP["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Alamat Perusahaan</td>
									<td>: <?= $rowBAP["alamat_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowBAP["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowBAP["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowBAP["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowBAP["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Nomor BAST</td>
									<td>: <?= $rowBAP["no_bast"]; ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>: <?= $rowBAP["jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Jenis Surat</td>
									<td>: <?= $rowBAP["no_jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor DIPA</td>
									<td>: <?= $rowBAP["no_dipa"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal DIPA</td>
									<td>: <?= tgl_indo($rowBAP["tgl_dipa"]); ?></td>
								</tr>
								<tr>
									<td>Pembayaran Resmi</td>
									<td>: Rp. <?= number_format($rowBAP["pembayaran_resmi"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>: <?= terbilang($rowBAP["pembayaran_resmi"]); ?> Rupiah</td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $rowBAP["nama_ppk"]; ?></td>
								</tr>
								<tr>
									<td>NIP PPK</td>
									<td>: <?= $rowBAP["nip"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowBAP["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="bap/delete-bap?id_del_bap=<?= $rowBAP["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<!-- Modal Delete kwitansi -->
		<?php foreach ($queryKwitansi as $rowKwitansi) : ?>
			<div class="modal fade" id="reset-kwitansi<?= $rowKwitansi["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Reset Kwitansi?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $rowKwitansi["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $rowKwitansi["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $rowKwitansi["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $rowKwitansi["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $rowKwitansi["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $rowKwitansi["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>: <?= $rowKwitansi["jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Jenis Surat</td>
									<td>: <?= $rowKwitansi["no_jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $rowKwitansi["nama_ppk"]; ?></td>
								</tr>
								<tr>
									<td>NIP PPK</td>
									<td>: <?= $rowKwitansi["nip"]; ?></td>
								</tr>
								<tr>
									<td>Pembayaran Resmi</td>
									<td>: Rp. <?= number_format($rowKwitansi["pembayaran_resmi"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>: <?= terbilang($rowKwitansi["pembayaran_resmi"]); ?> Rupiah</td>
								</tr>
								<tr>
									<td>Nama Tempat</td>
									<td>: <?= $rowKwitansi["nama_tempat"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($rowKwitansi["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="kwitansi/delete-kwitansi?id_del_kwitansi=<?= $rowKwitansi["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Reset</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<!-- === BOTTOM MENU === -->
		<?php include("../../include/bottom-menu.php"); ?>

		<!-- BUTTON OTOMATIS CLICK -->
		<button class="btn-onlick" id="clickBtn" hidden></button>


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

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

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


	<!-- === SUCCESS CLICK BUTTON === -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btn-onlick').trigger('click');
		})
	</script>

	<!-- SUCCESS PAKET -->
	<?php if (isset($_POST["paket"])) : ?>
		<?php if (addPaket($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_paket"])) : ?>
		<?php if (editPaket($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>



	<!-- SUCCESS MEMO -->
	<?php if (isset($_POST["memo"])) : ?>
		<?php if (addMemo($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_memo"])) : ?>
		<?php if (editMemo($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<!-- SUCCESS BAPHK -->
	<?php if (isset($_POST["baphk"])) : ?>
		<?php if (addBAPHK($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_baphk"])) : ?>
		<?php if (editBAPHK($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<!-- SUCCESS PIP -->
	<?php if (isset($_POST["pip"])) : ?>
		<?php if (addPIP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_pip"])) : ?>
		<?php if (editPIP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS PIBU -->
	<?php if (isset($_POST["pibu"])) : ?>
		<?php if (addPIBU($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_pibu"])) : ?>
		<?php if (editPIBU($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS BAHKN -->
	<?php if (isset($_POST["bahkn"])) : ?>
		<?php if (addBAHKN($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_bahkn"])) : ?>
		<?php if (editBAHKN($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS BAHP -->
	<?php if (isset($_POST["bahp"])) : ?>
		<?php if (addBAHP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_bahp"])) : ?>
		<?php if (editBAHP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS SPES -->
	<?php if (isset($_POST["spes"])) : ?>
		<?php if (addSPes($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_spes"])) : ?>
		<?php if (editSPes($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS BAHPP -->
	<?php if (isset($_POST["bahpp"])) : ?>
		<?php if (addBAHPP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_bahpp"])) : ?>
		<?php if (editBAHPP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS BAPP -->
	<?php if (isset($_POST["bapp"])) : ?>
		<?php if (addBAPP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_bapp"])) : ?>
		<?php if (editBAPP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<!-- SUCCESS BAST -->
	<?php if (isset($_POST["bast"])) : ?>
		<?php if (addBAST($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_bast"])) : ?>
		<?php if (editBAST($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<!-- SUCCESS BAP -->
	<?php if (isset($_POST["bap"])) : ?>
		<?php if (addBAP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_bap"])) : ?>
		<?php if (editBAP($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


	<!-- SUCCESS KWITANSI -->
	<?php if (isset($_POST["kwitansi"])) : ?>
		<?php if (addKWITANSI($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil ditambahkan!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_POST["edit_kwitansi"])) : ?>
		<?php if (editKWITANSI($_POST) > 0) : ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script>
				const clickBtn = document.getElementById('clickBtn')

				clickBtn.onclick = () => {
					Swal.fire({ //displays a pop up with sweetalert
						icon: 'success',
						title: 'Data berhasil diubah!',
						showConfirmButton: false,
						window: 'index',
						timer: 1500
					});
					setTimeout(function() {
						window.location.href = ('barang-jasa');
					}, 1500);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


</body>

</html>