<?php include("menu-active.php"); ?>
<div class="bottom-menu">
  <div class="container">
    <div class="row">

      <div class="col <?= $activeMobileDashboard; ?>">
        <a href="<?php include("url.php"); ?>dashboard/">
          <i class="bi bi-house-fill"></i>
          <br>
          <span>Beranda</span>
        </a>
      </div>

      <div class="col">
        <a href="#" data-toggle="modal" data-target="#modalSearch">
          <i class="bi bi-search"></i>
          <br>
          <span>Cari</span>
        </a>
      </div>

      <div class="col <?= $activeMobileBarangJasa; ?>">
        <a href="#" data-toggle="modal" data-target="#modalPengadaan">
          <i class="bi bi-envelope-plus-fill"></i>
          <br>
          <span>Pengadaan</span>
        </a>
      </div>

      <div class="col <?= $activeMobileAccountSettings; ?>">
        <a href="<?php include("url.php"); ?>dashboard/account-settings/account?id_account=<?= $rowSession["id"]; ?>">
          <img src="<?php include("url.php"); ?>assets/img/photo-profile/<?= $rowSession["gambar"]; ?>" alt="Akun" class="avatar-img rounded-circle">
          <br>
          <span>Akun</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php include("modal-mobile.php"); ?>


<!-- Info repair app -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php for ($repairApp = 1; $repairApp < 20; $repairApp++) : ?>
  <script>
    const appRepair<?= $repairApp; ?> = document.getElementById('appRepair<?= $repairApp; ?>')

    appRepair<?= $repairApp; ?>.onclick = () => {
      Swal.fire({ //displays a pop up with sweetalert
        icon: 'info',
        title: 'Fitur ini belum tersedia!',
        showConfirmButton: true,
        window: 'index',
        timer: 5000
      });
    }
  </script>
<?php endfor; ?>


<!-- Info fix bug app -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php for ($fixBug = 1; $fixBug < 20; $fixBug++) : ?>
  <script>
    const fixBug<?= $fixBug; ?> = document.getElementById('fixBug<?= $fixBug; ?>')

    fixBug<?= $fixBug; ?>.onclick = () => {
      Swal.fire({ //displays a pop up with sweetalert
        icon: 'info',
        title: 'Mohon Maaf, Fitur masih dalam perbaikan bug!',
        showConfirmButton: true,
        window: 'index',
        timer: 7000
      });
    }
  </script>
<?php endfor; ?>