<?php

// membaca data dari form
$namaSatker = $_POST['nama_satker'];
$namaPekerjaan = $_POST['nama_pekerjaan'];
$tglTerbit = $_POST['tgl_terbit'];
$tahunAnggaran = $_POST['tahun_anggaran'];
$tglPermintaan = $_POST['tgl_permintaan'];
$fungsi = $_POST['fungsi'];
$namaPpk = $_POST['nama_ppk'];
// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents("memo.rtf");

// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("%%NAMA_SATKER%%", $namaSatker, $document);
$document = str_replace("%%NAMA_PEKERJAAN%%", $namaPekerjaan, $document);
$document = str_replace("%%TGL_TERBIT%%", $tglTerbit, $document);
$document = str_replace("%%TAHUN_ANGGARAN%%", $tahunAnggaran, $document);
$document = str_replace("%%TGL_PERMINTAAN%%", $tglPermintaan, $document);
$document = str_replace("%%FUNGSI%%", $fungsi, $document);
$document = str_replace("%%NAMA_PPK%%", $namaPpk, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=1_PPK_Memo.doc");
header("Content-length: " . strlen($document));
echo $document;
