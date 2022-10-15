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
// CEK LEVEL
include("../../../include/check-level.php");
if (($rowSession["level"] === $levelPPK)) {
  header("Location:../../");
  exit;
}
// membaca data dari form
$namaWakilPenyedia = $_POST['nama_wakil_penyedia'];
$jabatan = $_POST['jabatan'];
$alamatPerusahaan = $_POST['alamat_perusahaan'];
$namaPerusahaan = $_POST['nama_perusahaan'];
$namaPekerjaan = $_POST['nama_pekerjaan'];
$namaSatker = $_POST['nama_satker'];
$tahunAnggaran = $_POST['tahun_anggaran'];
$namaTempat = $_POST['nama_tempat'];
$tglBlnThn = $_POST['tgl_bln_thn'];
// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents("pibu.rtf");

// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("%%NAMA_WAKIL_PENYEDIA%%", $namaWakilPenyedia, $document);
$document = str_replace("%%JABATAN%%", $jabatan, $document);
$document = str_replace("%%ALAMAT_PERUSAHAAN%%", $alamatPerusahaan, $document);
$document = str_replace("%%NAMA_PERUSAHAAN%%", $namaPerusahaan, $document);
$document = str_replace("%%NAMA_PEKERJAAN%%", $namaPekerjaan, $document);
$document = str_replace("%%NAMA_SATKER%%", $namaSatker, $document);
$document = str_replace("%%TAHUN_ANGGARAN%%", $tahunAnggaran, $document);
$document = str_replace("%%NAMA_TEMPAT%%", $namaTempat, $document);
$document = str_replace("%%TGL_BLN_THN%%", $tglBlnThn, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=3b_Penyedia_Pakta Integritas Badan Usaha.doc");
header("Content-length: " . strlen($document));
echo $document;
