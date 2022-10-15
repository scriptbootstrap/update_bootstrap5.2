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
$nama = $_POST['nama'];
$noIdentitas = $_POST['no_identitas'];
$alamatKtp = $_POST['alamat_ktp'];
$pekerjaan = $_POST['pekerjaan'];
$namaPekerjaan = $_POST['nama_pekerjaan'];
$namaSatker = $_POST['nama_satker'];
$tahunAnggaran = $_POST['tahun_anggaran'];
$namaTempat = $_POST['nama_tempat'];
$tglBlnThn = $_POST['tgl_bln_thn'];
// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents("pip.rtf");

// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("%%NAMA%%", $nama, $document);
$document = str_replace("%%NO_IDENTITAS%%", $noIdentitas, $document);
$document = str_replace("%%ALAMAT_KTP%%", $alamatKtp, $document);
$document = str_replace("%%PEKERJAAN%%", $pekerjaan, $document);
$document = str_replace("%%NAMA_PEKERJAAN%%", $namaPekerjaan, $document);
$document = str_replace("%%NAMA_SATKER%%", $namaSatker, $document);
$document = str_replace("%%TAHUN_ANGGARAN%%", $tahunAnggaran, $document);
$document = str_replace("%%NAMA_TEMPAT%%", $namaTempat, $document);
$document = str_replace("%%TGL_BLN_THN%%", $tglBlnThn, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=3a_Penyedia_Pakta Integritas Perorangan.doc");
header("Content-length: " . strlen($document));
echo $document;
