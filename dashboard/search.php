<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location:../auth/login");
	exit;
}

require('../funct/functions.php');

// SESSION USER LOGIN
if (isset($_SESSION["login"])) {

	$userSession = $_SESSION["username"];
	$resultSession = $conn->query("SELECT * FROM tb_users WHERE username = '$userSession' ");
	$rowSession = mysqli_fetch_assoc($resultSession);
	$idSession = $rowSession["id"];

	// Count data table
	include("../include/count-data-table.php");
}

// query table user
$queryUsers = query("SELECT * FROM tb_users");

// query table search
$querySearchAllData = query("SELECT * FROM tb_search");
$querySearch = query("SELECT * FROM tb_search");

if (isset($_GET["search"])) {

	$querySearch = searchFitur(htmlspecialchars($_GET["q"]));
	$keyword = htmlspecialchars($_GET["q"]);
	$countSearch = count($querySearch);
}



// check empty account
if (empty($rowSession["id"])) {
	header("Location:../auth/logout");
	exit;
}

// SET DATE
date_default_timezone_set('Asia/Makassar');

// tanggal, bulan, tahun
$date = date("d M Y");
$time = date("h:m");

// Check Level
include("../include/check-level.php");

// Konfigurasi SEO
include("../include/seo.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="<?= $metaDescription; ?>">
	<meta name="keywords" content="<?= $metaKeywords; ?>">
	<meta name="author" content="<?= $metaAuthor; ?>">
	<title>Hasil Pencarian Dari Keyword - <?= $keyword; ?> - SiKuDa BaJa</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/Logo_BPS.png?v=<?= time(); ?>" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" class="css">

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">

	<!-- My Style Css -->
	<link rel="stylesheet" href="../assets/css/responsive.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../assets/css/style.min.css?v=<?= time(); ?>" class="css">
	<link rel="stylesheet" href="../assets/css/skb.min.css?v=<?= time(); ?>" class="css">

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-skb-1">

				<a href="" class="logo text-white">
					<img src="assets/img/Logo_BPS.png?v=<?= time(); ?>" alt="SiKuDa BaJa" width="40">
					SiKuDa BaJa
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
			<?php include("../include/navbar.php"); ?>
			<!-- End Navbar -->

		</div>

		<!-- Sidebar -->
		<?php include("../include/sidebar.php"); ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="pb-2 fw-bold">Hasil Pencarian Dari Keyword - <?= $keyword; ?></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height pb-4">
								<div class="card-header">
									<div class="card-category url-search">
										<span>Sekitar
											<?php if (isset($_GET["search"])) : ?>
												<?= $countSearch; ?>
											<?php endif; ?>
											Hasil
										</span>
									</div>
								</div>

								<?php if (isset($_GET["search"])) : ?>
									<?php if (empty($querySearch)) : ?>
										<div class="card-body card-search empty-search">
											<div class="icon-empty-search">
												<span><i class="bi bi-search"></i></span>
											</div>

											<div class="description-empty-search">
												<div class="card-title title-search">
													<h3>Penelusuran Anda tidak cocok dengan dokumen apa pun</h3>
												</div>
												<div class="card-category tips-search">
													<p>Anda juga dapat mencoba penelusuran berikut:</p>
												</div>
												<div class="card-category saran-search">
													<hr>
													<p>
														<i class="bi bi-search"></i>
														<a href="?q=Data Memo&search=">
															Data Memo
														</a>
													</p>
													<hr>
													<p>
														<i class="bi bi-search"></i>
														<a href="?q=Buat Memo&search=">
															Buat Memo
														</a>
													</p>
													<hr>
												</div>
											</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php foreach ($querySearch as $row) : ?>
									<div class="card-body card-search">
										<div class="card-category url-search">
											<a href="<?php include("url.php"); ?>barang-jasa/<?= $row["url_search"]; ?>">
												https://sikudabaja.com/dashboard/<?php include("url.php"); ?>barang-jasa/<?= $row["url_search"]; ?>
											</a>
										</div>
										<div class="card-title title-search">
											<a href="<?php include("url.php"); ?>barang-jasa/<?= $row["url_search"]; ?>"><?= $row["title_search"]; ?></a>
										</div>
										<div class="card-category description-search">
											<span><?= $row["description_search"]; ?></span>
										</div>
									</div>
								<?php endforeach; ?>

							</div>
						</div>
					</div>


				</div>
			</div>
			<?php include("../include/footer.php"); ?>
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
						<a class="btn bg-skb-1" href="../auth/logout">Keluar</a>
					</div>
				</div>
			</div>
		</div>

		<!-- === WARNING INFORMATION === -->
		<?php if ($rowSession["password2"] === "123456") : ?>
			<!-- info account-->
			<input type="checkbox" id="check-info-account">
			<label for="check-info-account">
				<i class="bi bi-x-circle-fill"></i>
				<i id="btn-bg-close"></i>
			</label>
			<div class="container box-info-account">
				<p>Anda masih menggunakan kata sandi yang standar. Silahkan ubah kata sandi anda di <br> <a href="<?php include("url.php"); ?>account-settings/account?id_account=<?= $rowSession["id"]; ?>">Pengaturan Akun</a> > Akun</p>
			</div>
		<?php endif; ?>


		<!-- === BOTTOM MENU === -->
		<?php include("../include/bottom-menu.php"); ?>



	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>
	<script>
		Circles.create({
			id: 'barang-jasa',
			radius: 45,
			value: <?php echo "
			{$resultMemo["jmlhMemo"]} + 
			{$resultBAPHK["jmlhBAPHK"]} +
			{$resultPIP["jmlhPIP"]} +
			{$resultPIBU["jmlhPIBU"]} +
			{$resultBAHKN["jmlhBAHKN"]} +
			{$resultBAHP["jmlhBAHP"]}
			"; ?>,
			maxValue: 100,
			width: 7,
			text: <?php echo "
			{$resultMemo["jmlhMemo"]} + 
			{$resultBAPHK["jmlhBAPHK"]} +
			{$resultPIP["jmlhPIP"]} +
			{$resultPIBU["jmlhPIBU"]} +
			{$resultBAHKN["jmlhBAHKN"]} +
			{$resultBAHP["jmlhBAHP"]}
			"; ?>,
			colors: ['#f1f1f1', '#F675A8'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})


		Circles.create({
			id: 'circles-users',
			radius: 45,
			value: <?php echo "{$resultAkun["jmlhAkun"]}"; ?>,
			maxValue: 5,
			width: 7,
			text: <?php echo "{$resultAkun["jmlhAkun"]}"; ?>,
			colors: ['#f1f1f1', '#A460ED'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})



		$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});


		// VAR Bar Chart, doughnut Chart
		var barChart = document.getElementById('barChart').getContext('2d'),
			doughnutChart = document.getElementById('doughnutChart').getContext('2d');

		var myDoughnutChart = new Chart(doughnutChart, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						<?php echo "
							{$resultMemo["jmlhMemo"]} + 
							{$resultBAPHK["jmlhBAPHK"]} +
							{$resultPIP["jmlhPIP"]} +
							{$resultPIBU["jmlhPIBU"]} +
							{$resultBAHKN["jmlhBAHKN"]} +
							{$resultBAHP["jmlhBAHP"]}
							";
						?>,
						<?php echo "{$resultAkun["jmlhAkun"]}"; ?>
					],
					backgroundColor: ['#F675A8', '#A460ED']
				}],

				labels: [
					'Barang & Jasa < 50JT',
					'Jumlah Pengguna'
				]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					position: 'bottom'
				},
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		});
	</script>
</body>

</html>