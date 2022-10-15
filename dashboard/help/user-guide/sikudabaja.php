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
}

// query tabel user
$queryAccount = query("SELECT * FROM tb_users");

// query tabel user guide
$queryUserGuide = query("SELECT * FROM tb_user_guide");

// query tabel user guide images
$queryUserGuideImg = query("SELECT * FROM tb_user_guide_img");

// ============================================
// query table User Guide berdasarkan URL [0]
// ============================================
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $queryId = query("SELECT * FROM tb_user_guide WHERE id = '$id' ")[0];
}


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

// URL

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
  <title>Panduan Penggunaan - SiKuDa BaJa</title>
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

  <!-- ckeditor -->
  <script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/atlantis.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="../../assets/css/demo.css">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css" class="css">

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

        <a href="" class="logo text-white">
          <img src="../../assets/img/Logo_BPS.png?v=<?= time(); ?>" alt="SiKuDa BaJa" width="40">
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
      <?php include("../../../include/navbar.php"); ?>
      <!-- End Navbar -->

    </div>

    <!-- Sidebar -->
    <?php include("../../../include/sidebar.php"); ?>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="content">
        <div class="panel-header">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Panduan Penggunaan</h4>
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
                  <a href="#">Bantuan</a>
                </li>
                <li class="separator">
                  <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Panduan Penggunaan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-md-12">
              <div class="card">

                <div class="card-body card-account">
                  <?php if ((($rowSession["level"] === $levelSuperAdmin))) : ?>
                    <ul class="nav nav-pills nav-info" id="pills-tab" role="tablist">
                      <li class="nav-item col-md-4 ">
                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="true"><i class="bi bi-card-text"></i> Panduan</a>
                      </li>
                      <li class="nav-item col-md-4">
                        <a class="nav-link" id="pills-account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="pills-account" aria-selected="false"><i class="bi bi-pencil-square"></i> Edit</a>
                      </li>
                      <li class="nav-item col-md-4">
                        <a class="nav-link" id="pills-file-tab" data-toggle="pill" href="#file" role="tab" aria-controls="pills-file" aria-selected="false"><i class="bi bi-file-earmark"></i> File</a>
                      </li>
                    </ul>
                  <?php endif; ?>
                  <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div class="card-body">
                        <?php foreach ($queryUserGuide as $row) : ?>
                          <?= $row["description"]; ?>
                        <?php endforeach; ?>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="pills-account-tab">
                      <div class="data-account">
                        <form action="" method="post">
                          <input type="text" hidden name="id" value="<?= $queryId["id"]; ?>">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="editor1"><i class="fas fa-user"></i> Deskripsi</label>
                              <textarea id="editor1" name="description">
                                <?= $queryId["description"]; ?>
                              </textarea>
                            </div>
                            <div class="col-sm-12">
                              <button type="submit" name="save" class="btn bg-skb-3"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                    <!-- PANEL 2 -->
                    <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="pills-file-tab">
                      <div class="data-file">
                        <input type="text" hidden name="id" value="<?= $queryId["id"]; ?>">
                        <div class="form-group row">
                          <div class="col-sm-12">

                            <?php if ((($rowSession["level"] === $levelSuperAdmin))) : ?>
                              <!-- Link Panel 2 -->
                              <ul class="nav nav-pills nav-info" id="pills-tab" role="tablist">
                                <li class="nav-item col-md-4 ">
                                  <a class="nav-link active" id="pills-image-tab" data-toggle="pill" href="#image" role="tab" aria-controls="pills-image" aria-selected="true"><i class="bi bi-images"></i> Gambar</a>
                                </li>
                                <li class="nav-item col-md-4">
                                  <a class="nav-link" id="pills-video-tab" data-toggle="pill" href="#video" role="tab" aria-controls="pills-video" aria-selected="false"><i class="bi bi-file-earmark-play"></i> Video</a>
                                </li>
                                <li class="nav-item col-md-4">
                                  <a class="nav-link" id="pills-document-tab" data-toggle="pill" href="#document" role="tab" aria-controls="pills-document" aria-selected="false"><i class="bi bi-file-earmark-text"></i> Dokumen</a>
                                </li>
                              </ul>
                            <?php endif; ?>

                            <!-- Tab Panel 2 -->
                            <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="pills-image-tab">
                              <div class="data-image">

                                <div class="form-group row">
                                  <div class="card-body">
                                    <div class="row text-center">

                                      <?php foreach ($queryUserGuideImg as $row) : ?>
                                        <div class="col-md-3 mb-4 box-tab-panel ml-auto mr-auto">
                                          <img src="<?php include("../../../include/url.php"); ?>uploads/images/<?= $row["gambar"]; ?>" alt="" width="100%" class="mb-2">
                                          <table>
                                            <tr>
                                              <td>
                                                <a href="?id=<?= $_GET["id"]; ?>?del_user_guide_img=<?= $row["id"]; ?>" class="delete-btn bi bi-trash3" class="btn btn-copy btn-circle" title="Hapus" onclick="return confirm('Hapus?');"></a>
                                              </td>
                                              <td>
                                                <input type="text" value="<?php include("../../../include/url.php"); ?>uploads/images/<?= $row["gambar"]; ?>" id="copyText<?= $row["id"]; ?>" readonly>
                                              </td>
                                              <td>
                                                <span id="copyBtn<?= $row["id"]; ?>" class="copy-btn bi bi-clipboard" onclick="copyText()" title="Salin URL"></span>
                                              </td>
                                            </tr>
                                          </table>
                                        </div>
                                      <?php endforeach; ?>


                                    </div>
                                  </div>
                                </div>

                                <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group row">
                                    <label for="gambar" class="placeholder"><i class="bi bi-map-fill"></i> Upload Gambar</label>
                                    <input id="gambar" name="gambar" type="file" class="form-control input-border-bottom" required="">
                                    <span>Format File : jpg, jpeg, png. Dengan Ukurang maksimal 5MB</span>
                                  </div>
                                  <div class="form-group row">
                                    <button type="submit" name="upload_img" class="btn bg-skb-3"><i class="fa fa-save"></i> Simpan</button>
                                  </div>
                                </form>

                              </div>
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>

                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("../../../include/footer.php"); ?>
    </div>
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
          <a class="btn bg-skb-1" href="../../../auth/logout">Keluar</a>
        </div>
      </div>
    </div>
  </div>


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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <?php foreach ($queryUserGuideImg as $row) : ?>
    <script>
      const copyBtn<?= $row["id"]; ?> = document.getElementById('copyBtn<?= $row["id"]; ?>')
      const copyText<?= $row["id"]; ?> = document.getElementById('copyText<?= $row["id"]; ?>')

      copyBtn<?= $row["id"]; ?>.onclick = () => {
        copyText<?= $row["id"]; ?>.select(); // Selects the text inside the input
        document.execCommand('copy'); // Simply copies the selected text to clipboard 
        Swal.fire({ //displays a pop up with sweetalert
          icon: 'success',
          title: 'Teks disalin ke papan klip',
          showConfirmButton: false,
          timer: 1000
        });
      }
    </script>
  <?php endforeach; ?>



  <script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  </script>

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


  <?php if (isset($_POST["save"])) : ?>
    <?php if (editUserGuide($_POST) > 0) : ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script>
        const clickBtn = document.getElementById('clickBtn')

        clickBtn.onclick = () => {
          Swal.fire({ //displays a pop up with sweetalert
            icon: 'success',
            title: 'Data berhasil diubah!',
            showConfirmButton: true,
            window: 'index',
            timer: 2000
          });
          setTimeout(function() {
            window.location.href = ('');
          }, 2000);
        }
      </script>
    <?php endif; ?>
  <?php endif; ?>

  <!-- check success upload images user guide -->
  <?php if (isset($_POST["upload_img"])) : ?>
    <?php if (imgUserGuide($_POST) > 0) : ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script>
        const clickBtn = document.getElementById('clickBtn')

        clickBtn.onclick = () => {
          Swal.fire({ //displays a pop up with sweetalert
            icon: 'success',
            title: 'Gambar berhasil diupload!',
            showConfirmButton: true,
            window: 'index',
            timer: 2000
          });
          setTimeout(function() {
            window.location.href = ('');
          }, 2000);
        }
      </script>
    <?php endif; ?>
  <?php endif; ?>

  <?php $id = $_GET["del_user_guide_img"]; ?>

  <!-- check success upload images user guide -->
  <?php if (isset($_GET["del_user_guide_img"])) : ?>
    <?php if (deleteImgUserGuide($_POST) > 0) : ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script>
        const clickBtn = document.getElementById('clickBtn')

        clickBtn.onclick = () => {
          Swal.fire({ //displays a pop up with sweetalert
            icon: 'success',
            title: 'Gambar berhasil dihapus!',
            showConfirmButton: true,
            window: 'index',
            timer: 2000
          });
          setTimeout(function() {
            window.location.href = ('');
          }, 2000);
        }
      </script>
    <?php endif; ?>
  <?php endif; ?>



</body>

</html>