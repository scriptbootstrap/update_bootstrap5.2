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
$noBlnAngka = $_POST["no_bln_angka"];
$noTgl = $_POST["no_tgl"];
$noKegiatan = $_POST["no_kegiatan"];
$noBlnRomawi = $_POST["no_bln_romawi"];
$noTahun = $_POST["no_tahun"];
$hariTerbilang = $_POST["hari_terbilang"];
$tglTerbilang = $_POST["tgl_terbilang"];
$blnTerbilang = $_POST["bln_terbilang"];
$thnTerbilang = $_POST["thn_terbilang"];
$namaSatker = $_POST["nama_satker"];
$alamatSatker = $_POST["alamat_satker"];
$namaPerusahaan = $_POST["nama_perusahaan"];
$alamatPerusahaan = $_POST["alamat_perusahaan"];
$namaPekerjaan = $_POST["nama_pekerjaan"];
$tahunAnggaran = $_POST["tahun_anggaran"];
$namaWakilPenyedia = $_POST["nama_wakil_penyedia"];
$jabatan = $_POST["jabatan"];
$noBahpp = $_POST["no_bahpp"];
$tglNoBahpp = $_POST["tgl_no_bahpp"];
$jenisSurat = $_POST["jenis_surat"];
$noJenisSurat = $_POST["no_jenis_surat"];
$tglJenisSurat = $_POST["tgl_jenis_surat"];
$namaPpk = $_POST["nama_ppk"];
$nip = $_POST["nip"];
$tglSurat = $_POST["tgl_surat"];
// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents("bapp.rtf");

// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("%%no_bln_angka%%", $noBlnAngka, $document);
$document = str_replace("%%no_tgl%%", $noTgl, $document);
$document = str_replace("%%no_kegiatan%%", $noKegiatan, $document);
$document = str_replace("%%no_bln_romawi%%", $noBlnRomawi, $document);
$document = str_replace("%%no_tahun%%", $noTahun, $document);
$document = str_replace("%%hari_terbilang%%", $hariTerbilang, $document);
$document = str_replace("%%tgl_terbilang%%", $tglTerbilang, $document);
$document = str_replace("%%bln_terbilang%%", $blnTerbilang, $document);
$document = str_replace("%%thn_terbilang%%", $thnTerbilang, $document);
$document = str_replace("%%nama_satker%%", $namaSatker, $document);
$document = str_replace("%%alamat_satker%%", $alamatSatker, $document);
$document = str_replace("%%nama_perusahaan%%", $namaPerusahaan, $document);
$document = str_replace("%%alamat_perusahaan%%", $alamatPerusahaan, $document);
$document = str_replace("%%nama_pekerjaan%%", $namaPekerjaan, $document);
$document = str_replace("%%tahun_anggaran%%", $tahunAnggaran, $document);
$document = str_replace("%%nama_wakil_penyedia%%", $namaWakilPenyedia, $document);
$document = str_replace("%%jabatan%%", $jabatan, $document);
$document = str_replace("%%no_bahpp%%", $noBahpp, $document);
$document = str_replace("%%tgl_no_bahpp%%", $tglNoBahpp, $document);
$document = str_replace("%%jenis_surat%%", $jenisSurat, $document);
$document = str_replace("%%no_jenis_surat%%", $noJenisSurat, $document);
$document = str_replace("%%tgl_jenis_surat%%", $tglJenisSurat, $document);
$document = str_replace("%%nama_ppk%%", $namaPpk, $document);
$document = str_replace("%%nip%%", $nip, $document);
$document = str_replace("%%tgl_surat%%", $tglSurat, $document);

// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=8_PPK_BAPP.doc");
header("Content-length: " . strlen($document));
echo $document;
