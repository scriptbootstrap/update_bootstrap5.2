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

	// Count data table
	include("../../../include/count-data-table.php");
}

// query table kwitansi
$queryKwitansi = query("SELECT * FROM tb_kwitansi");

// check empty account
if (empty($rowSession["id"])) {
	header("Location:../../../auth/logout");
	exit;
}

// CEK LEVEL
include("../../../include/check-level.php");


// SET DATE
date_default_timezone_set('Asia/Makassar');

// tanggal, bulan, tahun
$tbh = date("d M Y");


// Format Romawi Month
include("../../../include/romawi-month.php");

// Format Tanggal Indonesia
include("../../../include/tgl-indo.php");

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
	<title>Data Kwitansi/Bukti Pembayaran - SiKuDa BaJa</title>
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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css" class="css">

	<!-- My Style Css  -->
	<link rel="stylesheet" href="../../../assets/css/skb.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../../../assets/css/style.min.css?v=<?= time(); ?>" class="css">
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
						<h4 class="page-title">Data Kwitansi/Bukti Pembayaran </h4>
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
								<a href="#">Data Kwitansi/Bukti Pembayaran
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<a href="add-kwitansi" class="btn bg-skb-3 text-white btn-round"><i class="fa fa-plus"></i> Buat Kwitansi</a>
										<h4 class="card-title ml-auto"><?php echo "{$resultKwitansi["jmlhKwitansi"]}"; ?> Data Kwitansi</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th style="width: 10%">Opsi</th>
													<th>Nama Satker</th>
													<th>Nama Perusahaan</th>
													<th>Nama Pekerjaan</th>
													<th>Tahun Anggaran</th>
													<th>Nama Wakil Penyedia</th>
													<th>Jabatan</th>
													<th>Jenis Surat</th>
													<th>Nomor Jenis Surat</th>
													<th>Tanggal Jenis Surat</th>
													<th>Nama PPK</th>
													<th>Nip PPK</th>
													<th>Pembayaran Resmi</th>
													<th>Terbilang</th>
													<th>Nama Tempat</th>
													<th>Tanggal Surat</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th style="width: 10%">Opsi</th>
													<th>Nama Satker</th>
													<th>Nama Perusahaan</th>
													<th>Nama Pekerjaan</th>
													<th>Tahun Anggaran</th>
													<th>Nama Wakil Penyedia</th>
													<th>Jabatan</th>
													<th>Jenis Surat</th>
													<th>Nomor Jenis Surat</th>
													<th>Tanggal Jenis Surat</th>
													<th>Nama PPK</th>
													<th>Nip PPK</th>
													<th>Pembayaran Resmi</th>
													<th>Terbilang</th>
													<th>Nama Tempat</th>
													<th>Tanggal Surat</th>
												</tr>
											</tfoot>
											<tbody>
												<?php $noTable = 1; ?>
												<?php foreach ($queryKwitansi as $row) : ?>
													<tr>
														<td><?= $noTable; ?></td>
														<td>
															<div class="form-button-action">
																<div class="dropdown show">
																	<a class="show-opsi bg-skb-3 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		Opsi
																	</a>

																	<div class="dropdown-menu dropdown-menu-opsi" aria-labelledby="dropdownMenuLink">
																		<a class="dropdown-item text-light bg-skb-3" href="edit-kwitansi?id_kwitansi=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Edit</a>

																		<form action="print-word" method="post">
																			<input type="text" hidden name="nama_tempat" value="<?= $row["nama_tempat"]; ?>">
																			<input type="text" hidden name="tgl_surat" value="<?= tgl_indo($row["tgl_surat"]); ?>">
																			<input type="text" hidden name="nama_satker" value="<?= $row["nama_satker"]; ?>">
																			<input type="text" hidden name="nama_perusahaan" value="<?= $row["nama_perusahaan"]; ?>">
																			<input type="text" hidden name="nama_pekerjaan" value="<?= $row["nama_pekerjaan"]; ?>">
																			<input type="text" hidden name="tahun_anggaran" value="<?= $row["tahun_anggaran"]; ?>">
																			<input type="text" hidden name="nama_wakil_penyedia" value="<?= $row["nama_wakil_penyedia"]; ?>">
																			<input type="text" hidden name="jabatan" value="<?= $row["jabatan"]; ?>">
																			<input type="text" hidden name="jenis_surat" value="<?= $row["jenis_surat"]; ?>">
																			<input type="text" hidden name="no_jenis_surat" value="<?= $row["no_jenis_surat"]; ?>">
																			<input type="text" hidden name="tgl_jenis_surat" value="<?= tgl_indo(substr($row["no_jenis_surat"], -4, 5) . "-" . substr($row["no_jenis_surat"], 0, 2) . "-" . substr($row["no_jenis_surat"], 3, 2)); ?>">
																			<input type="text" hidden name="pembayaran_resmi" value="<?= number_format($row["pembayaran_resmi"], 0, ',', '.'); ?>">
																			<input type="text" hidden name="pembayaran_resmi_terbilang" value="<?= terbilang($row["pembayaran_resmi"]); ?>">
																			<input type="text" hidden name="nama_ppk" value="<?= $row["nama_ppk"]; ?>">
																			<input type="text" hidden name="nip" value="<?= $row["nip"]; ?>">
																			<button type="submit" value="print" class="btn-opsi bg-skb-1"><i class="fa fa-print"></i> Cetak Word</button>
																		</form>

																		<a class="dropdown-item text-light bg-skb-6" href="#" data-toggle="modal" data-target="#delete-kwitansi<?= $row["id"]; ?>"><i class=" fa fa-trash"></i> Hapus</a>

																	</div>
																</div>
															</div>
														</td>
														<td><?= $row["nama_satker"]; ?></td>
														<td><?= $row["nama_perusahaan"]; ?></td>
														<td><?= $row["nama_pekerjaan"]; ?></td>
														<td><?= $row["tahun_anggaran"]; ?></td>
														<td><?= $row["nama_wakil_penyedia"]; ?></td>
														<td><?= $row["jabatan"]; ?></td>
														<td><?= $row["jenis_surat"]; ?></td>
														<td><?= $row["no_jenis_surat"]; ?></td>
														<td>
															<?= tgl_indo(substr($row["no_jenis_surat"], -4, 5) . "-" . substr($row["no_jenis_surat"], 0, 2) . "-" . substr($row["no_jenis_surat"], 3, 2)); ?>
														</td>
														<td><?= $row["nama_ppk"]; ?></td>
														<td><?= $row["nip"]; ?></td>
														<td>Rp. <?= number_format($row["pembayaran_resmi"], 0, ',', '.'); ?></td>
														<td><?= terbilang($row["pembayaran_resmi"]); ?> Rupiah</td>
														<td><?= $row["nama_tempat"]; ?></td>
														<td><?= tgl_indo(date($row["tgl_surat"])); ?></td>
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
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
						<a class="btn btn-primary" href="../../../auth/logout">Keluar</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Delete kwitansi -->
		<?php foreach ($queryKwitansi as $row) : ?>
			<div class="modal fade" id="delete-kwitansi<?= $row["id"]; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Hapus Kwitansi?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>Nama Satker</td>
									<td>: <?= $row["nama_satker"]; ?></td>
								</tr>
								<tr>
									<td>Nama Perusahaan</td>
									<td>: <?= $row["nama_perusahaan"]; ?></td>
								</tr>
								<tr>
									<td>Nama Pekerjaan</td>
									<td>: <?= $row["nama_pekerjaan"]; ?></td>
								</tr>
								<tr>
									<td>Tahun Anggaran</td>
									<td>: <?= $row["tahun_anggaran"]; ?></td>
								</tr>
								<tr>
									<td>Nama Wakil Penyedia</td>
									<td>: <?= $row["nama_wakil_penyedia"]; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>: <?= $row["jabatan"]; ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>: <?= $row["jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nomor Jenis Surat</td>
									<td>: <?= $row["no_jenis_surat"]; ?></td>
								</tr>
								<tr>
									<td>Nama PPK</td>
									<td>: <?= $row["nama_ppk"]; ?></td>
								</tr>
								<tr>
									<td>NIP PPK</td>
									<td>: <?= $row["nip"]; ?></td>
								</tr>
								<tr>
									<td>Pembayaran Resmi</td>
									<td>: Rp. <?= number_format($row["pembayaran_resmi"], 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td>Terbilang</td>
									<td>: <?= terbilang($row["pembayaran_resmi"]); ?> Rupiah</td>
								</tr>
								<tr>
									<td>Nama Tempat</td>
									<td>: <?= $row["nama_tempat"]; ?></td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>: <?= tgl_indo(date($row["tgl_surat"])); ?></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn bg-skb-3 text-white" data-dismiss="modal">Batal</button>
							<a href="delete-kwitansi?id_del_kwitansi=<?= $row["id"]; ?>" type="button" class="btn bg-skb-1 text-white">Hapus</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<!-- === BOTTOM MENU === -->
		<?php include("../../../include/bottom-menu.php"); ?>

		<!-- BUTTON OTOMATIS CLICK -->
		<button class="btn-onlick" id="clickBtn" hidden></button>


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


	<!-- === SUCCESS CLICK BUTTON === -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btn-onlick').trigger('click');
		})
	</script>

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
						timer: 2000
					});
					setTimeout(function() {
						window.location.href = ('kwitansi');
					}, 2000);
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
						timer: 2000
					});
					setTimeout(function() {
						window.location.href = ('kwitansi');
					}, 2000);
				}
			</script>
		<?php endif; ?>
	<?php endif; ?>


</body>

</html>