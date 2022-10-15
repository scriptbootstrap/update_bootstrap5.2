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

// DELETE/HAPUS DATA kwitansi
if (isset($_GET["id_del_kwitansi"])) {

  $id = $_GET["id_del_kwitansi"];
  if (deleteKwitansi($id) > 0) {
    echo "
    <script>
      document.location.href = '../barang-jasa';
    </script>";
  } else {
    echo "
    <script>
      alert('Data gagal di hapus!');
      document.location.href = '../barang-jasa';
    </script>";
  }
}


// CEK LEVEL
include("../../../include/check-level.php");
