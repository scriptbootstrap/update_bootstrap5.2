<!-- MODAL BARANG DAN JASA -->
<div class="modal fade" id="modalPengadaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengadaan </h5>
        <button type="button" class="btn bi bi-x-lg" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <div class="container text-center">
          <div class="row">

            <div class="col-12 mb-4 modal-pengadaan">
              <a class="col-md-4 p-0" href="<?php include("url.php"); ?>dashboard/barang-jasa/barang-jasa">
                <div class="quick-actions-item">
                  <i class="fas fa-envelope"></i>
                  <br>
                  <span class="text">Barang & Jasa <br>
                    < 50JT </span>
                </div>
              </a>
            </div>

            <div class="col-12 mb-4 modal-pengadaan">
              <a href="#" id="repairApp1">
                <!-- <a class="col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanBarang"> -->
                <div class=" quick-actions-item">
                  <i class="fas fa-envelope"></i>
                  <br>
                  <span class="text">Barang <br>50JT - 200JT</span>
                </div>
              </a>
            </div>

            <div class="col-12 mb-4 modal-pengadaan">
              <a href="#" id="repairApp2">
                <!-- <a class="col-md-4 p-0" href="#" data-toggle="modal" data-target="#modalPengadaanJasaLainnya"> -->
                <div class="quick-actions-item">
                  <i class="fas fa-envelope"></i>
                  <br>
                  <span class="text">Jasa Lainnya <br> 50JT - 200JT</span>
                </div>
              </a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- MODAL SEARCHING -->
<div class="modal fade" id="modalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARI</h5>
        <button type="button" class="btn bi bi-x-lg" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="<?php include("url.php"); ?>dashboard/search" method="get" class="navbar-left navbar-form nav-search mr-md-3">
          <div class="input-group">
            <input type="search" name="q" placeholder="Cari Fitur.." class="form-control" value="<?php if (isset($_GET["search"])) : ?><?= $keyword; ?><?php endif; ?>">
            <button type="submit" name="search" class="btn btn-search pl-1">
              <i class="fa fa-search search-icon"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Info repair app -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php for ($repairApp = 1; $repairApp < 20; $repairApp++) : ?>
  <script>
    const repairApp<?= $repairApp; ?> = document.getElementById('repairApp<?= $repairApp; ?>')

    repairApp<?= $repairApp; ?>.onclick = () => {
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
<?php for ($fixBugMobile = 1; $fixBugMobile < 20; $fixBugMobile++) : ?>
  <script>
    const fixBugMobile<?= $fixBugMobile; ?> = document.getElementById('fixBugMobile<?= $fixBugMobile; ?>')

    fixBugMobile<?= $fixBugMobile; ?>.onclick = () => {
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