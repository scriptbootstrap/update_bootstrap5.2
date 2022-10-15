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
$namaPerusahaan = $_POST["nama_perusahaan"];
$alamatPerusahaan = $_POST["alamat_perusahaan"];
$nomorNpwp = $_POST["nomor_npwp"];
$namaPekerjaan = $_POST["nama_pekerjaan"];
$tahunAnggaran = $_POST["tahun_anggaran"];
$kodeRup = $_POST["kode_rup"];
$hargaPenawaran = $_POST["harga_penawaran"];
$hargaPenawaranTerbilang = $_POST["harga_penawaran_terbilang"];
$hargaNegosiasi = $_POST["harga_negosiasi"];
$hargaNegosiasiTerbilang = $_POST["harga_negosiasi_terbilang"];
$selisih = $_POST["selisih"];
$selisihTerbilang = $_POST["selisih_terbilang"];
$nomorDipa = $_POST["nomor_dipa"];
$tglDipa = $_POST["tgl_dipa"];
$namaPp = $_POST["nama_pp"];
$nip = $_POST["nip"];
// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents("bahp.rtf");

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
$document = str_replace("%%nama_perusahaan%%", $namaPerusahaan, $document);
$document = str_replace("%%alamat_perusahaan%%", $alamatPerusahaan, $document);
$document = str_replace("%%nomor_npwp%%", $nomorNpwp, $document);
$document = str_replace("%%nama_pekerjaan%%", $namaPekerjaan, $document);
$document = str_replace("%%tahun_anggaran%%", $tahunAnggaran, $document);
$document = str_replace("%%kode_rup%%", $kodeRup, $document);
$document = str_replace("%%harga_penawaran%%", $hargaPenawaran, $document);
$document = str_replace("%%harga_penawaran_terbilang%%", $hargaPenawaranTerbilang, $document);
$document = str_replace("%%harga_negosiasi%%", $hargaNegosiasi, $document);
$document = str_replace("%%harga_negosiasi_terbilang%%", $hargaNegosiasiTerbilang, $document);
$document = str_replace("%%selisih%%", $selisih, $document);
$document = str_replace("%%selisih_terbilang%%", $selisihTerbilang, $document);
$document = str_replace("%%nomor_dipa%%", $nomorDipa, $document);
$document = str_replace("%%tgl_dipa%%", $tglDipa, $document);
$document = str_replace("%%nama_pp%%", $namaPp, $document);
$document = str_replace("%%nip%%", $nip, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=5_PP_BA Hasil Pengadaan Langsung.doc");
header("Content-length: " . strlen($document));
echo $document;
