<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location:../dashboard/");
  exit;
}
require('../funct/functions.php');
include("proses-login.php");


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
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <title>Masuk Akun Sistem Dokumen Pengadaan Barang Dan Jasa - SiKuDaBaJa</title>

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- MY STYLE CSS -->
  <link rel="stylesheet" href="../assets/css/responsive.min.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="../assets/css/style.min.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="../assets/css/skb.min.css?v=<?= time(); ?>">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

  <!-- CSS Files -->
  <link rel="stylesheet" href="../dashboard/assets/css/bootstrap.min.css">

  <link rel="icon" href="../assets/img/Logo_BPS.png?v=<?= time(); ?>" type="image/x-icon" />

</head>

<body class="bg-img">

  <div class="container box-form-login-container">

    <div class="card col-md-6 ml-auto mr-auto border-0 rounded-4 col-lg-6 my-5 box-form box-form-login">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <img src="../assets/img/Logo_BPS.png" alt="SiKuDaBaJa" width="100" class="mb-2">
                <h1 class="h4 mb-2 ff-poppins">
                  SISTEM DOKUMEN <br>PENGADAAN BARANG DAN JASA<br>
                  <span class="text-skb-1">SiKuDaBaJa</span>
                </h1>
                <span class="text-secondary ff-poppins-14">Selamat datang di Sistem Dokumen Pengadaan Barang Dan Jasa SiKuDaBaJa
                </span>
              </div>

              <!-- ERROR LOGIN/MASUK AKUN -->
              <?php if (!isset($error)) : ?>
                <div class="alert alert-info-login alert-dismissible fade show ff-poppins" role="alert">
                  <strong><i class="bi bi-info-circle-fill"></i> </strong>
                  Anda harus login untuk melanjutkan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <!-- ERROR LOGIN/MASUK AKUN -->
              <?php if (isset($error)) : ?>
                <div class="my-2 alert alert-error-login alert-danger alert-dismissible fade show ff-poppins-14" role="alert">
                  <strong><i class="fa fa-exclamation-triangle"></i> Oops!</strong> Nama pengguna atau kata sandi yang anda masukan tidak sesuai!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <form action="" method="post" class="my-form user my-3">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                  <input type="text" name="username" class="form-control ff-poppins-14" placeholder="Nama Pengguna" required oninvalid="this.setCustomValidity('Nama pengguna harus diisi!')" oninput="setCustomValidity('')" autofocus autocomplete="off">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                  <input type="password" name="password" class="form-control form-control-user ff-poppins-14" placeholder="Kata Sandi" id="id_password">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-eye-slash" id="togglePassword" id="togglePassword" style="cursor: pointer;" title="Lihat Kata Sandi"></i>
                  </span>
                </div>

                <div class="input-group mb-3">
                  <button type="submit" name="login" class="border-0 rounded-2 bg-skb-1-hover ff-poppins-14">Masuk Akun</button>
                </div>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Messenger Plugin Obrolan Code -->
  <div id="fb-root"></div>

  <!-- Your Plugin Obrolan code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "102670204873890");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v15.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/id_ID/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

  <!-- VIEW / HIDE PASSWORD -->
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function(e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('bi-eye');
    });
  </script>
  <!-- End Messenger Plugin Obrolan Code -->

  <!-- Plugin Zotabox -->
  <script async src="https://static.zotabox.com/d/2/d262cd9329a87bf9457fe66f97f96000/widgets.js?v=<?php time(); ?>"></script>

</body>

</html>