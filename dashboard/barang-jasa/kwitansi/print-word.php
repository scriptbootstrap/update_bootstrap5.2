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
$namaTempat = $_POST["nama_tempat"];
$tglSurat = $_POST["tgl_surat"];
$namaSatker = $_POST["nama_satker"];
$namaPerusahaan = $_POST["nama_perusahaan"];
$namaPekerjaan = $_POST["nama_pekerjaan"];
$tahunAnggaran = $_POST["tahun_anggaran"];
$namaWakilPenyedia = $_POST["nama_wakil_penyedia"];
$jabatan = $_POST["jabatan"];
$jenisSurat = $_POST["jenis_surat"];
$noJenisSurat = $_POST["no_jenis_surat"];
$tglJenisSurat = $_POST["tgl_jenis_surat"];
$pembayaranResmi = $_POST["pembayaran_resmi"];
$pembayaranResmiTerbilang = $_POST["pembayaran_resmi_terbilang"];
$namaPpk = $_POST["nama_ppk"];
$nip = $_POST["nip"];
// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents("kwitansi.rtf");

// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("%%nama_tempat%%", $namaTempat, $document);
$document = str_replace("%%tgl_surat%%", $tglSurat, $document);
$document = str_replace("%%nama_satker%%", $namaSatker, $document);
$document = str_replace("%%nama_perusahaan%%", $namaPerusahaan, $document);
$document = str_replace("%%nama_pekerjaan%%", $namaPekerjaan, $document);
$document = str_replace("%%tahun_anggaran%%", $tahunAnggaran, $document);
$document = str_replace("%%nama_wakil_penyedia%%", $namaWakilPenyedia, $document);
$document = str_replace("%%jabatan%%", $jabatan, $document);
$document = str_replace("%%jenis_surat%%", $jenisSurat, $document);
$document = str_replace("%%no_jenis_surat%%", $noJenisSurat, $document);
$document = str_replace("%%tgl_jenis_surat%%", $tglJenisSurat, $document);
$document = str_replace("%%pembayaran_resmi%%", $pembayaranResmi, $document);
$document = str_replace("%%pembayaran_resmi_terbilang%%", $pembayaranResmiTerbilang, $document);
$document = str_replace("%%nama_ppk%%", $namaPpk, $document);
$document = str_replace("%%nip%%", $nip, $document);

// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=9_PPK_Kwitansi(10jt).doc");
header("Content-length: " . strlen($document));
echo $document;
