<?php

// FORMAT TANGGAL INDONESIA
function tgl_indo_notif($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

<head>
  <style>
    /* FEEDBACK */
    .card-feedback button,
    .read-all-feedback-user button {
      border: none;
      background-color: transparent;
      cursor: pointer;
      width: 100%;
      text-align: left;
      padding: 0;
      border-bottom: 1px solid #eee;
    }

    .unread-message {
      background-color: #177cff23;
    }

    .notif-img img {
      width: 40px !important;
      object-fit: cover;
      height: 40px !important;
    }

    /* BACKGROUND COLOR SIDEBAR */
    .bg-skb-1 {
      background-color: #F675A8 !important;
    }

    .bg-skb-2 {
      background-color: #ce4e81 !important;
    }

    .bg-skb-3 {
      background-color: #A460ED !important;
    }

    .bg-skb-4 {
      background-color: #8449c4 !important;
    }

    /* Text Color */
    .text-skb-1 {
      color: #F675A8 !important;
    }

    .text-skb-2 {
      color: #F675A8 !important;
    }

    .text-skb-3 {
      color: #A460ED !important;
    }

    .text-skb-4 {
      color: #8449c4 !important;
    }
  </style>
</head>

<nav class="navbar navbar-header navbar-expand-lg bg-skb-1">

  <div class="container-fluid">
    <!-- search -->
    <div class="collapse" id="search-nav">
      <form action="<?php include("url.php"); ?>dashboard/search" method="get" class="navbar-left navbar-form nav-search mr-md-3">
        <div class="input-group">
          <input type="search" name="q" placeholder="Cari Fitur.." class="form-control" value="<?php if (isset($_GET["search"])) : ?><?= $keyword; ?><?php endif; ?>">
          <button type="submit" name="search" class="btn btn-search pl-1">
            <i class="fa fa-search search-icon"></i>
          </button>
        </div>
      </form>
    </div>
    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
      <li class="nav-item toggle-nav-search hidden-caret">
        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
          <i class="fa fa-search"></i>
        </a>
      </li>
      <!-- end search -->

      <!-- shortcut -->
      <li class="nav-item dropdown hidden-caret">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" title="Opsi Cepat">
          <i class="fas fa-layer-group"></i>
        </a>
        <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
          <div class="bg-skb-1 quick-actions-header">
            <span class="title mb-1">Opsi Cepat</span>
            <span class="subtitle op-8">Jalan pintas</span>
          </div>
          <div class="quick-actions-scroll scrollbar-outer">
            <div class="quick-actions-items">
              <div class="row m-0 options-widget">

                <a class="col-6 col-md-4 p-0" href="<?php include("url.php"); ?>dashboard/barang-jasa/barang-jasa">
                  <div class="quick-actions-item">
                    <i class="flaticon-envelope"></i>
                    <span class="text text-skb-1">Pengadaan Barang & Jasa < 50JT</span>
                  </div>
                </a>

                <a class="col-6 col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanBarang" id="appRepair3">
                  <div class="quick-actions-item">
                    <i class="flaticon-envelope"></i>
                    <span class="text text-skb-1">Pengadaan Baran 50JT - 200JT</span>
                  </div>
                </a>

                <a class="col-6 col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanJasaLainnya" id="appRepair4">
                  <div class="quick-actions-item">
                    <i class="flaticon-envelope"></i>
                    <span class="text text-skb-1">Pengadaan Jasa Lainnya 50JT - 200JT</span>
                  </div>
                </a>


                <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
                  <a class="col-6 col-md-4 p-0" href="<?php include("url.php"); ?>dashboard/settings/user">
                    <div class="quick-actions-item">
                      <i class="flaticon-user"></i>
                      <span class="text text-skb-1">Tambah Akun</span>
                    </div>
                  </a>
                <?php endif; ?>

                <a class="col-6 col-md-4 p-0" href="<?php include("url.php"); ?>dashboard/account-settings/account?id_account=<?= $rowSession["id"]; ?>">
                  <div class="quick-actions-item">
                    <i class="flaticon-pen"></i>
                    <span class="text text-skb-1">Ubah Profil</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </li>
      <!-- end shortcut -->


      <!-- profile -->
      <li class="nav-item dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
          <div class="avatar-sm">
            <img src="<?php include("url.php"); ?>assets/img/photo-profile/<?= $rowSession["gambar"]; ?>" alt="..." class="avatar-img rounded-circle">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
          <div class="dropdown-user-scroll scrollbar-outer">
            <li>
              <div class="user-box">
                <div class="avatar-lg"><img src="<?php include("url.php"); ?>assets/img/photo-profile/<?= $rowSession["gambar"]; ?>" alt="image profile" class="avatar-img rounded"></div>
                <div class="u-text">
                  <h4><?= $rowSession["first_name"]; ?> <?= $rowSession["last_name"]; ?></h4>
                  <p class="text-muted"><?= $rowSession["username"]; ?></p>
                  <a href="<?php include("url.php"); ?>dashboard/account-settings/account?id_account=<?= $rowSession["id"]; ?>" class="btn btn-xs bg-skb-2 text-white btn-sm">Lihat Profil</a>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php include("url.php"); ?>dashboard/account-settings/account?id_account=<?= $rowSession["id"]; ?>">Pengaturan Akun</a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>

            </li>
          </div>
        </ul>
      </li>
      <!-- end profile -->

    </ul>
  </div>
</nav>


<!-- MODAL BARANG DAN JASA -->
<div class="modal fade" id="modalPengadaanBaranJasa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengadaan </h5>
        <button type="button" class="btn bi bi-x-lg" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <div class="container text-center">
          <div class="row">

            <div class="col-4 mb-3 modal-pengadaan">
              <a class="col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanBarangJasa">
                <div class="quick-actions-item">
                  <i class="fas fa-envelope"></i>
                  <br>
                  <span class="text">Barang & Jasa <br>
                    < 50JT </span>
                </div>
              </a>
            </div>

            <div class="col-4 mb-3 modal-pengadaan">
              <a class="col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanBarang" onclick="confirm('Fitur Dalam Pengembangan Developer..');">
                <div class=" quick-actions-item">
                  <i class="fas fa-envelope"></i>
                  <br>
                  <span class="text">Barang <br>50JT - 200JT</span>
                </div>
              </a>
            </div>

            <div class="col-4 mb-3 modal-pengadaan">
              <a class="col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanJasaLainnya" onclick="confirm('Fitur Dalam Pengembangan Developer..');">
                <div class="quick-actions-item">
                  <i class="fas fa-envelope"></i>
                  <br>
                  <span class="text">Jasa Lainnya 50JT - 200JT</span>
                </div>
              </a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>