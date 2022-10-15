<?php
// DATABASE CONNECTION
$conn =
  new mysqli(
    $host = "localhost",
    $username = "root",
    $password = "",
    $database = "sikudabaja"
  );

// $conn =
//   new mysqli(
//     $host = "localhost",
//     $username = "sikudaba_root",
//     $password = "@Admin!@#$%^&*()",
//     $database = "sikudaba_pbj"
//   );

// ===============
// FUNCTION QUERY
// ===============
function query($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// ===============
// FUNCTION QUERY MEMO
// ===============
function queryMemo($queryMemo)
{
  global $conn;

  $resultMemo = mysqli_query($conn, $queryMemo);
  $rowsMemo = [];
  while ($rowMemo = mysqli_fetch_assoc($resultMemo)) {
    $rowsMemo[] = $rowMemo;
  }
  return $rowsMemo;
}


// ===============
// FUNCTION QUERY BAPHK
// ===============
function queryBAPHK($queryBAPHK)
{
  global $conn;

  $resultBAPHK = mysqli_query($conn, $queryBAPHK);
  $rowsBAPHK = [];
  while ($rowBAPHK = mysqli_fetch_assoc($resultBAPHK)) {
    $rowsBAPHK[] = $rowBAPHK;
  }
  return $rowsBAPHK;
}

// ===============
// FUNCTION QUERY PIP
// ===============
function queryPIP($queryPIP)
{
  global $conn;

  $resultPIP = mysqli_query($conn, $queryPIP);
  $rowsPIP = [];
  while ($rowPIP = mysqli_fetch_assoc($resultPIP)) {
    $rowsPIP[] = $rowPIP;
  }
  return $rowsPIP;
}

// ===============
// FUNCTION QUERY PIBU
// ===============
function queryPIBU($queryPIBU)
{
  global $conn;

  $resultPIBU = mysqli_query($conn, $queryPIBU);
  $rowsPIBU = [];
  while ($rowPIBU = mysqli_fetch_assoc($resultPIBU)) {
    $rowsPIBU[] = $rowPIBU;
  }
  return $rowsPIBU;
}

// ===============
// FUNCTION QUERY BAHKN
// ===============
function queryBAHKN($queryBAHKN)
{
  global $conn;

  $resultBAHKN = mysqli_query($conn, $queryBAHKN);
  $rowsBAHKN = [];
  while ($rowBAHKN = mysqli_fetch_assoc($resultBAHKN)) {
    $rowsBAHKN[] = $rowBAHKN;
  }
  return $rowsBAHKN;
}

// ===============
// FUNCTION QUERY BAHP
// ===============
function queryBAHP($queryBAHP)
{
  global $conn;

  $resultBAHP = mysqli_query($conn, $queryBAHP);
  $rowsBAHP = [];
  while ($rowBAHP = mysqli_fetch_assoc($resultBAHP)) {
    $rowsBAHP[] = $rowBAHP;
  }
  return $rowsBAHP;
}

// ===============
// FUNCTION QUERY SPes
// ===============
function querySPes($querySPes)
{
  global $conn;

  $resultSPes = mysqli_query($conn, $querySPes);
  $rowsSPes = [];
  while ($rowSPes = mysqli_fetch_assoc($resultSPes)) {
    $rowsSPes[] = $rowSPes;
  }
  return $rowsSPes;
}

// ===============
// FUNCTION QUERY BAHPP
// ===============
function queryBAHPP($queryBAHPP)
{
  global $conn;

  $resultBAHPP = mysqli_query($conn, $queryBAHPP);
  $rowsBAHPP = [];
  while ($rowBAHPP = mysqli_fetch_assoc($resultBAHPP)) {
    $rowsBAHPP[] = $rowBAHPP;
  }
  return $rowsBAHPP;
}

// ===============
// FUNCTION QUERY BAPP
// ===============
function queryBAPP($queryBAPP)
{
  global $conn;

  $resultBAPP = mysqli_query($conn, $queryBAPP);
  $rowsBAPP = [];
  while ($rowBAPP = mysqli_fetch_assoc($resultBAPP)) {
    $rowsBAPP[] = $rowBAPP;
  }
  return $rowsBAPP;
}

// ===============
// FUNCTION QUERY BAST
// ===============
function queryBAST($queryBAST)
{
  global $conn;

  $resultBAST = mysqli_query($conn, $queryBAST);
  $rowsBAST = [];
  while ($rowBAST = mysqli_fetch_assoc($resultBAST)) {
    $rowsBAST[] = $rowBAST;
  }
  return $rowsBAST;
}

// ===============
// FUNCTION QUERY BAP
// ===============
function queryBAP($queryBAP)
{
  global $conn;

  $resultBAP = mysqli_query($conn, $queryBAP);
  $rowsBAP = [];
  while ($rowBAP = mysqli_fetch_assoc($resultBAP)) {
    $rowsBAP[] = $rowBAP;
  }
  return $rowsBAP;
}

// ===============
// FUNCTION QUERY Kwitansi
// ===============
function queryKwitansi($queryKwitansi)
{
  global $conn;

  $resultKwitansi = mysqli_query($conn, $queryKwitansi);
  $rowsKwitansi = [];
  while ($rowKwitansi = mysqli_fetch_assoc($resultKwitansi)) {
    $rowsKwitansi[] = $rowKwitansi;
  }
  return $rowsKwitansi;
}

// =================
// FUNCTION REGISTER
// =================
function register($data)
{
  global $conn;

  $firstName = htmlspecialchars($data["first_name"]);
  $lastName = htmlspecialchars($data["last_name"]);
  $username = stripslashes(strtolower($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $level = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["level"]))))))))));

  // CEK MANIPULASI LEVEL AKUN
  if (!base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["level"])))))))))) {
    echo "
    <script>
      alert('Periksa kembali data-data anda!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }

  // CEK MANIPULASI NAMA DEPAN
  if (empty($firstName)) {
    echo "
    <script>
      alert('Nama depan tidak boleh kosong!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }

  // CEK MANIPULASI USERNAME / NAMA PENGGUNA
  if (empty($username)) {
    echo "
    <script>
      alert('Nama pengguna atau alamat email tidak boleh kosong!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }

  // CEK MANIPULASI KATA SANDI
  if (empty($password)) {
    echo "
    <script>
      alert('Kata sandi tidak boleh kosong!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }
  if (strlen($password) < 8) {
    echo "
    <script>
      alert('Untuk menjaga keamanan akun anda, gunakan minimal 8 karakter kata sandi!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }

  // CEK MANIPULASI LEVEL AKUN
  if (empty($level)) {
    echo "
    <script>
      alert('Pendaftaran akun gagal!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }


  // CEK DOUBLE USERNAME
  $result = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Nama pengguna atau alamat email ini sudah terdaftar. Silahkan gunakan yang lain!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }

  // CEK KONFIRMASI KATA SANDI
  if ($password !== $password2) {
    echo "
    <script>
      alert('Konfirmasi kata sandi tidak sesuai!');   
      document.location.href = 'register'; 
    </script>
    ";
    return false;
  }

  // ENKRIPSI KATA SANDI
  $password = password_hash($password, PASSWORD_DEFAULT);

  // INSERT DATA
  $query = "INSERT INTO tb_users VALUES(null, '$firstName', '$lastName', '$username', '$password', '$password2', '$level')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION Paket
// =================================================
// TAMBAH DATA Paket
function addPaket($data)
{
  global $conn;

  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaKegiatan = htmlspecialchars($data["nama_kegiatan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $noDipa = htmlspecialchars($data["no_dipa"]);
  $tglDipa = htmlspecialchars($data["tgl_dipa"]);
  $namaPPK = htmlspecialchars($data["nama_ppk"]);
  $nipPPK = htmlspecialchars($data["nip_ppk"]);
  $namaPP = htmlspecialchars($data["nama_pp"]);
  $nipPP = htmlspecialchars($data["nip_pp"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatanWakilPenyedia = htmlspecialchars($data["jabatan_wakil_penyedia"]);
  $npwp = htmlspecialchars($data["npwp"]);
  $jmlhPenawaran = htmlspecialchars($data["jmlh_penawaran"]);
  $jmlhNegosiasi = htmlspecialchars($data["jmlh_negosiasi"]);
  $ppn = htmlspecialchars($data["ppn"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);

  $jmlhPenawaran = preg_replace("/[^0-9]/", "", $jmlhPenawaran);
  $jmlhNegosiasi = preg_replace("/[^0-9]/", "", $jmlhNegosiasi);

  $query = "INSERT INTO tb_barang_jasa VALUES(null, '$namaSatker', '$alamatSatker', '$namaPerusahaan', '$alamatPerusahaan', '$namaKegiatan', '$namaPekerjaan', '$tahunAnggaran', '$noDipa', '$tglDipa', '$namaPPK', '$nipPPK', '$namaPP', '$nipPP', '$namaWakilPenyedia', '$jabatanWakilPenyedia', '$npwp', '$jmlhPenawaran', '$jmlhNegosiasi', '$ppn', '$namaTempat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA Paket
function editPaket($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaKegiatan = htmlspecialchars($data["nama_kegiatan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $noDipa = htmlspecialchars($data["no_dipa"]);
  $tglDipa = htmlspecialchars($data["tgl_dipa"]);
  $namaPPK = htmlspecialchars($data["nama_ppk"]);
  $nipPPK = htmlspecialchars($data["nip_ppk"]);
  $namaPP = htmlspecialchars($data["nama_pp"]);
  $nipPP = htmlspecialchars($data["nip_pp"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatanWakilPenyedia = htmlspecialchars($data["jabatan_wakil_penyedia"]);
  $npwp = htmlspecialchars($data["npwp"]);
  $jmlhPenawaran = htmlspecialchars($data["jmlh_penawaran"]);
  $jmlhNegosiasi = htmlspecialchars($data["jmlh_negosiasi"]);
  $ppn = htmlspecialchars($data["ppn"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);

  $jmlhPenawaran = preg_replace("/[^0-9]/", "", $jmlhPenawaran);
  $jmlhNegosiasi = preg_replace("/[^0-9]/", "", $jmlhNegosiasi);

  $query = "UPDATE tb_barang_jasa SET
  nama_satker = '$namaSatker',
  alamat_satker = '$alamatSatker',
  nama_perusahaan = '$namaPerusahaan',
  alamat_perusahaan = '$alamatPerusahaan',
  nama_kegiatan = '$namaKegiatan',
  nama_pekerjaan = '$namaPekerjaan',
  tahun_anggaran = '$tahunAnggaran',
  no_dipa = '$noDipa',
  tgl_dipa = '$tglDipa',
  nama_ppk = '$namaPPK',
  nip_ppk = '$nipPPK',
  nama_pp = '$namaPP',
  nip_pp = '$nipPP',
  nama_wakil_penyedia = '$namaWakilPenyedia',
  jabatan_wakil_penyedia = '$jabatanWakilPenyedia',
  npwp = '$npwp',
  jmlh_penawaran = '$jmlhPenawaran',
  jmlh_negosiasi = '$jmlhNegosiasi',
  ppn = '$ppn',
  nama_tempat = '$namaTempat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA Paket
function deletePaket($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_barang_jasa WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION MEMO
// =================================================
// TAMBAH DATA MEMO
function addMemo($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tglTerbit = htmlspecialchars($data["tgl_terbit"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $tglPermintaan = htmlspecialchars($data["tgl_permintaan"]);
  $fungsi = htmlspecialchars($data["fungsi"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_memo VALUES(null, '$idUser', '$namaSatker', '$namaPekerjaan', '$tglTerbit', '$tahunAnggaran', '$tglPermintaan', '$fungsi', '$namaPpk', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA MEMO
function editMemo($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tglTerbit = htmlspecialchars($data["tgl_terbit"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $tglPermintaan = htmlspecialchars($data["tgl_permintaan"]);
  $fungsi = htmlspecialchars($data["fungsi"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_memo SET
  id_user = '$idUser', 
  nama_satker = '$namaSatker', 
  nama_pekerjaan = '$namaPekerjaan', 
  tgl_terbit = '$tglTerbit', 
  tahun_anggaran = '$tahunAnggaran', 
  tgl_permintaan = '$tglPermintaan', 
  fungsi = '$fungsi', 
  nama_ppk = '$namaPpk',
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA MEMO
function deleteMemo($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_memo WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION BAPHK
// =================================================
// TAMBAH DATA BAPHK
function addBAPHK($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $noIzinUsaha = htmlspecialchars($data["no_izin_usaha"]);
  $tglTerbitNib = htmlspecialchars($data["tgl_terbit_nib"]);
  $perubahanKe = htmlspecialchars($data["perubahan_ke"]);
  $nomorNpwp = htmlspecialchars($data["nomor_npwp"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_baphk VALUES(null, '$idUser', '$tglSurat',  '$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$namaPerusahaan', '$alamatPerusahaan', '$noIzinUsaha', '$tglTerbitNib', '$perubahanKe', '$nomorNpwp', '$namaPekerjaan', '$tahunAnggaran', '$namaPp', '$namaWakilPenyedia', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAPHK
function editBAPHK($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $noIzinUsaha = htmlspecialchars($data["no_izin_usaha"]);
  $tglTerbitNib = htmlspecialchars($data["tgl_terbit_nib"]);
  $perubahanKe = htmlspecialchars($data["perubahan_ke"]);
  $nomorNpwp = htmlspecialchars($data["nomor_npwp"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_baphk SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  no_izin_usaha = '$noIzinUsaha', 
  tgl_terbit_nib = '$tglTerbitNib', 
  perubahan_ke = '$perubahanKe', 
  nomor_npwp = '$nomorNpwp', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_pp = '$namaPp', 
  nama_wakil_penyedia = '$namaWakilPenyedia', 
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAPHK
function deleteBAPHK($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_baphk WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}

// =================================================
// FUNCTION PIP
// =================================================
// TAMBAH DATA PIP
function addPIP($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $nama = htmlspecialchars($data["nama"]);
  $noIdentitas = htmlspecialchars($data["no_identitas"]);
  $alamatKtp = htmlspecialchars($data["alamat_ktp"]);
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_pip VALUES(null, '$idUser', '$nama', '$noIdentitas', '$alamatKtp', '$pekerjaan', '$namaPekerjaan', '$namaSatker', '$tahunAnggaran', '$namaTempat', '$tglSurat', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA PIP
function editPIP($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $nama = htmlspecialchars($data["nama"]);
  $noIdentitas = htmlspecialchars($data["no_identitas"]);
  $alamatKtp = htmlspecialchars($data["alamat_ktp"]);
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_pip SET
  id_user = '$idUser', 
  nama = '$nama', 
  no_identitas = '$noIdentitas', 
  alamat_ktp = '$alamatKtp', 
  pekerjaan = '$pekerjaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  nama_satker = '$namaSatker', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_tempat = '$namaTempat', 
  tgl_surat = '$tglSurat', 
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA PIP
function deletePIP($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_pip WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION PIBU
// =================================================
// TAMBAH DATA PIBU
function addPIBU($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_pibu VALUES(null, '$idUser', '$namaWakilPenyedia', '$jabatan', '$alamatPerusahaan', '$namaPerusahaan', '$namaPekerjaan', '$namaSatker', '$tahunAnggaran', '$namaTempat', '$tglSurat', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA PIBU
function editPIBU($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_pibu SET
  id_user = '$idUser', 
  nama_wakil_penyedia = '$namaWakilPenyedia', 
  jabatan = '$jabatan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nama_perusahaan = '$namaPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  nama_satker = '$namaSatker', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_tempat = '$namaTempat', 
  tgl_surat = '$tglSurat', 
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA PIBU
function deletePIBU($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_pibu WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}



// =================================================
// FUNCTION BAHKN
// =================================================
// TAMBAH DATA BAHKN
function addBAHKN($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $jmlhPenawaran = htmlspecialchars($data["jmlh_penawaran"]);
  $jmlhNegosiasi = htmlspecialchars($data["jmlh_negosiasi"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $jmlhPenawaran = preg_replace("/[^0-9]/", "", $jmlhPenawaran);
  $jmlhNegosiasi = preg_replace("/[^0-9]/", "", $jmlhNegosiasi);

  $query = "INSERT INTO tb_bahkn VALUES(null, '$idUser', '$tglSurat', '$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$namaPerusahaan', '$alamatPerusahaan',  '$namaPekerjaan', '$tahunAnggaran', '$jmlhPenawaran', '$jmlhNegosiasi', '$namaPp', '$namaWakilPenyedia', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAHKN
function editBAHKN($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $jmlhPenawaran = htmlspecialchars($data["jmlh_penawaran"]);
  $jmlhNegosiasi = htmlspecialchars($data["jmlh_negosiasi"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $jmlhPenawaran = preg_replace("/[^0-9]/", "", $jmlhPenawaran);
  $jmlhNegosiasi = preg_replace("/[^0-9]/", "", $jmlhNegosiasi);

  $query = "UPDATE tb_bahkn SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  jmlh_penawaran = '$jmlhPenawaran', 
  jmlh_negosiasi = '$jmlhNegosiasi', 
  nama_pp = '$namaPp', 
  nama_wakil_penyedia = '$namaWakilPenyedia', 
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAHKN
function deleteBAHKN($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_bahkn WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION BAHP
// =================================================
// TAMBAH DATA BAHP
function addBAHP($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $nomorNpwp = htmlspecialchars($data["nomor_npwp"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $kodeRup = htmlspecialchars($data["kode_rup"]);
  $hargaPenawaran = htmlspecialchars($data["harga_penawaran"]);
  $hargaNegosiasi = htmlspecialchars($data["harga_negosiasi"]);
  $nomorDipa = htmlspecialchars($data["nomor_dipa"]);
  $tglDipa = htmlspecialchars($data["tgl_dipa"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $hargaPenawaran = preg_replace("/[^0-9]/", "", $hargaPenawaran);
  $hargaNegosiasi = preg_replace("/[^0-9]/", "", $hargaNegosiasi);

  $query = "INSERT INTO tb_bahp VALUES(null, '$idUser', '$tglSurat','$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$namaPerusahaan', '$alamatPerusahaan', '$nomorNpwp',  '$namaPekerjaan', '$tahunAnggaran', '$kodeRup', '$hargaPenawaran', '$hargaNegosiasi', '$nomorDipa', '$tglDipa', '$namaPp', '$nip', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAHP
function editBAHP($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $nomorNpwp = htmlspecialchars($data["nomor_npwp"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $kodeRup = htmlspecialchars($data["kode_rup"]);
  $hargaPenawaran = htmlspecialchars($data["harga_penawaran"]);
  $hargaNegosiasi = htmlspecialchars($data["harga_negosiasi"]);
  $nomorDipa = htmlspecialchars($data["nomor_dipa"]);
  $tglDipa = htmlspecialchars($data["tgl_dipa"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $hargaPenawaran = preg_replace("/[^0-9]/", "", $hargaPenawaran);
  $hargaNegosiasi = preg_replace("/[^0-9]/", "", $hargaNegosiasi);

  $query = "UPDATE tb_bahp SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nomor_npwp = '$nomorNpwp', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  kode_rup = '$kodeRup', 
  harga_penawaran = '$hargaPenawaran', 
  harga_negosiasi = '$hargaNegosiasi', 
  nomor_dipa = '$nomorDipa', 
  tgl_dipa = '$tglDipa', 
  nama_pp = '$namaPp', 
  nip = '$nip', 
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAHP
function deleteBAHP($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_bahp WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION Spes
// =================================================
// TAMBAH DATA Spes
function addSpes($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $nomorDipa = htmlspecialchars($data["nomor_dipa"]);
  $tglBlnThnDipa = htmlspecialchars($data["tgl_bln_thn_dipa"]);
  $program = htmlspecialchars($data["program"]);
  $kegiatan = htmlspecialchars($data["kegiatan"]);
  $output = htmlspecialchars($data["output"]);
  $SubOutput = htmlspecialchars($data["sub_output"]);
  $komponen = htmlspecialchars($data["komponen"]);
  $SubKomponen = htmlspecialchars($data["sub_komponen"]);
  $akun = htmlspecialchars($data["akun"]);
  $rincianPok = htmlspecialchars($data["rincian_pok"]);
  $fromTgl = htmlspecialchars($data["from_tgl"]);
  $toTgl = htmlspecialchars($data["to_tgl"]);
  $nip = htmlspecialchars($data["nip"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $jenisSpesifikasi = htmlspecialchars($data["jenis_spesifikasi"]);
  $satuan = htmlspecialchars($data["satuan"]);
  $vol = htmlspecialchars($data["vol"]);
  $hargaSatuan = htmlspecialchars($data["harga_satuan"]);
  $ppn = htmlspecialchars($data["ppn"]);
  $keterangan = htmlspecialchars($data["keterangan"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $jmlhNegosiasi = htmlspecialchars($data["jmlh_negosiasi"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $hargaSatuan = preg_replace("/[^0-9]/", "", $hargaSatuan);
  $jmlhNegosiasi = preg_replace("/[^0-9]/", "", $jmlhNegosiasi);

  $query = "INSERT INTO tb_spes VALUES(null, '$idUser', '$tglSurat',  '$noKegiatan', '$namaSatker', '$alamatSatker', '$namaPerusahaan', '$alamatPerusahaan', '$namaWakilPenyedia', '$namaPekerjaan', '$tahunAnggaran', '$nomorDipa', '$tglBlnThnDipa', '$program', '$kegiatan', '$output', '$SubOutput', '$komponen', '$SubKomponen', '$akun', '$rincianPok', '$fromTgl', '$toTgl', '$nip', '$jabatan', '$namaTempat', '$jenisSpesifikasi', '$satuan', '$vol', '$hargaSatuan', '$ppn', '$keterangan', '$namaPp', '$jmlhNegosiasi', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA Spes
function editSpes($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $nomorDipa = htmlspecialchars($data["nomor_dipa"]);
  $tglBlnThnDipa = htmlspecialchars($data["tgl_bln_thn_dipa"]);
  $program = htmlspecialchars($data["program"]);
  $kegiatan = htmlspecialchars($data["kegiatan"]);
  $output = htmlspecialchars($data["output"]);
  $SubOutput = htmlspecialchars($data["sub_output"]);
  $komponen = htmlspecialchars($data["komponen"]);
  $SubKomponen = htmlspecialchars($data["sub_komponen"]);
  $akun = htmlspecialchars($data["akun"]);
  $rincianPok = htmlspecialchars($data["rincian_pok"]);
  $fromTgl = htmlspecialchars($data["from_tgl"]);
  $toTgl = htmlspecialchars($data["to_tgl"]);
  $nip = htmlspecialchars($data["nip"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $jenisSpesifikasi = htmlspecialchars($data["jenis_spesifikasi"]);
  $satuan = htmlspecialchars($data["satuan"]);
  $vol = htmlspecialchars($data["vol"]);
  $hargaSatuan = htmlspecialchars($data["harga_satuan"]);
  $ppn = htmlspecialchars($data["ppn"]);
  $keterangan = htmlspecialchars($data["keterangan"]);
  $namaPp = htmlspecialchars($data["nama_pp"]);
  $jmlhNegosiasi = htmlspecialchars($data["jmlh_negosiasi"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $hargaSatuan = preg_replace("/[^0-9]/", "", $hargaSatuan);
  $jmlhNegosiasi = preg_replace("/[^0-9]/", "", $jmlhNegosiasi);

  $query = "UPDATE tb_spes SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat',
  no_kegiatan = '$noKegiatan',
  nama_satker = '$namaSatker',
  alamat_satker = '$alamatSatker',
  nama_perusahaan = '$namaPerusahaan',
  alamat_perusahaan = '$alamatPerusahaan',
  nama_wakil_penyedia = '$namaWakilPenyedia',
  nama_pekerjaan = '$namaPekerjaan',
  tahun_anggaran = '$tahunAnggaran',
  nomor_dipa = '$nomorDipa',
  tgl_bln_thn_dipa = '$tglBlnThnDipa',
  program = '$program',
  kegiatan = '$kegiatan',
  output = '$output',
  sub_output = '$SubOutput',
  komponen = '$komponen',
  sub_komponen = '$SubKomponen',
  akun = '$akun',
  rincian_pok = '$rincianPok',
  from_tgl = '$fromTgl',
  to_tgl = '$toTgl',
  nip = '$nip',
  jabatan = '$jabatan',
  nama_tempat = '$namaTempat',
  jenis_spesifikasi = '$jenisSpesifikasi',
  satuan = '$satuan',
  vol = '$vol',
  harga_satuan = '$hargaSatuan',
  ppn = '$ppn',
  keterangan = '$keterangan',
  nama_pp = '$namaPp', 
  jmlh_negosiasi = '$jmlhNegosiasi', 
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA Spes
function deleteSpes($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_spes WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}



// =================================================
// FUNCTION BAHPP
// =================================================
// TAMBAH DATA BAHPP
function addBAHPP($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $namaPerwakilanSm = htmlspecialchars($data["nama_perwakilan_sm"]);
  $namaPetugasVerifikasiMdp = htmlspecialchars($data["nama_petugas_verifikasi_mdp"]);
  $namaPendukung1 = htmlspecialchars($data["nama_pendukung1"]);
  $namaPendukung2 = htmlspecialchars($data["nama_pendukung2"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_bahpp VALUES(null, '$idUser', '$tglSurat','$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$alamatSatker', '$namaPerusahaan', '$alamatPerusahaan', '$namaPekerjaan', '$tahunAnggaran', '$namaWakilPenyedia', '$jabatan', '$namaPpk', '$namaPerwakilanSm', '$namaPetugasVerifikasiMdp', '$namaPendukung1', '$namaPendukung2', '$jenisSurat', '$noJenisSurat', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAHPP
function editBAHPP($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $namaPerwakilanSm = htmlspecialchars($data["nama_perwakilan_sm"]);
  $namaPetugasVerifikasiMdp = htmlspecialchars($data["nama_petugas_verifikasi_mdp"]);
  $namaPendukung1 = htmlspecialchars($data["nama_pendukung1"]);
  $namaPendukung2 = htmlspecialchars($data["nama_pendukung2"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_bahpp SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  alamat_satker = '$alamatSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_wakil_penyedia = '$namaWakilPenyedia',
  jabatan = '$jabatan',
  nama_ppk = '$namaPpk',
  nama_perwakilan_sm = '$namaPerwakilanSm',
  nama_petugas_verifikasi_mdp = '$namaPetugasVerifikasiMdp',
  nama_pendukung1 = '$namaPendukung1',
  nama_pendukung2 = '$namaPendukung2',
  jenis_surat = '$jenisSurat',
  no_jenis_surat = '$noJenisSurat',
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAHPP
function deleteBAHPP($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_bahpp WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION BAPP
// =================================================
// TAMBAH DATA BAPP
function addBAPP($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $nomorBahpp = htmlspecialchars($data["no_bahpp"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_bapp VALUES(null, '$idUser', '$tglSurat','$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$alamatSatker', '$namaPerusahaan', '$alamatPerusahaan',   '$namaPekerjaan', '$tahunAnggaran', '$namaWakilPenyedia', '$jabatan',   '$nomorBahpp', '$jenisSurat', '$noJenisSurat', '$namaPpk', '$nip', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAPP
function editBAPP($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $nomorBahpp = htmlspecialchars($data["no_bahpp"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_bapp SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  alamat_satker = '$alamatSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_wakil_penyedia = '$namaWakilPenyedia',
  jabatan = '$jabatan',
  no_bahpp = '$nomorBahpp',
  jenis_surat = '$jenisSurat',
  no_jenis_surat = '$noJenisSurat',
  nama_ppk = '$namaPpk',
  nip = '$nip',
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAPP
function deleteBAPP($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_bapp WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}



// =================================================
// FUNCTION BAST
// =================================================
// TAMBAH DATA BAST
function addBAST($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $nomorBapp = htmlspecialchars($data["no_bapp"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "INSERT INTO tb_bast VALUES(null, '$idUser', '$tglSurat','$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$alamatSatker', '$namaPerusahaan', '$alamatPerusahaan',   '$namaPekerjaan', '$tahunAnggaran', '$namaWakilPenyedia', '$jabatan',   '$nomorBapp', '$jenisSurat', '$noJenisSurat', '$namaPpk', '$nip', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAST
function editBAST($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $nomorBapp = htmlspecialchars($data["no_bapp"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $query = "UPDATE tb_bast SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  alamat_satker = '$alamatSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_wakil_penyedia = '$namaWakilPenyedia',
  jabatan = '$jabatan',
  no_bapp = '$nomorBapp',
  jenis_surat = '$jenisSurat',
  no_jenis_surat = '$noJenisSurat',
  nama_ppk = '$namaPpk',
  nip = '$nip',
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAST
function deleteBAST($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_bast WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}



// =================================================
// FUNCTION Kwitansi
// =================================================
// TAMBAH DATA Kwitansi
function addKwitansi($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $pembayaranResmi = htmlspecialchars($data["pembayaran_resmi"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $pembayaranResmi = preg_replace("/[^0-9]/", "", $pembayaranResmi);

  $query = "INSERT INTO tb_kwitansi VALUES(null, '$idUser', '$namaTempat', '$tglSurat', '$namaSatker',  '$namaPerusahaan', '$namaPekerjaan', '$tahunAnggaran', '$namaWakilPenyedia', '$jabatan',  '$jenisSurat', '$noJenisSurat', '$pembayaranResmi', '$namaPpk', '$nip', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA Kwitansi
function editKwitansi($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $namaTempat = htmlspecialchars($data["nama_tempat"]);
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $pembayaranResmi = htmlspecialchars($data["pembayaran_resmi"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $pembayaranResmi = preg_replace("/[^0-9]/", "", $pembayaranResmi);

  $query = "UPDATE tb_kwitansi SET
  id_user = '$idUser', 
  nama_tempat = '$namaTempat', 
  tgl_surat = '$tglSurat', 
  nama_satker = '$namaSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_wakil_penyedia = '$namaWakilPenyedia',
  jabatan = '$jabatan',
  jenis_surat = '$jenisSurat',
  no_jenis_surat = '$noJenisSurat',
  pembayaran_resmi = '$pembayaranResmi',
  nama_ppk = '$namaPpk',
  nip = '$nip',
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA Kwitansi
function deleteKwitansi($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_kwitansi WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}




// =================================================
// FUNCTION BAP
// =================================================
// TAMBAH DATA BAP
function addBAP($data)
{
  global $conn;

  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $nomorBast = htmlspecialchars($data["no_bast"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $noDipa = htmlspecialchars($data["no_dipa"]);
  $tglDipa = htmlspecialchars($data["tgl_dipa"]);
  $pembayaranResmi = htmlspecialchars($data["pembayaran_resmi"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $pembayaranResmi = preg_replace("/[^0-9]/", "", $pembayaranResmi);

  $query = "INSERT INTO tb_bap VALUES(null, '$idUser', '$tglSurat','$noKegiatan', '$hariTerbilang', '$tglTerbilang', '$blnTerbilang', '$thnTerbilang', '$namaSatker', '$alamatSatker', '$namaPerusahaan', '$alamatPerusahaan',   '$namaPekerjaan', '$tahunAnggaran', '$namaWakilPenyedia', '$jabatan',   '$nomorBast', '$jenisSurat', '$noJenisSurat', '$noDipa', '$tglDipa', '$pembayaranResmi', '$namaPpk', '$nip', '$tglBuat') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// EDIT/UBAH DATA BAP
function editBAP($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $idUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id_user"]))))))))));
  $tglSurat = htmlspecialchars($data["tgl_surat"]);
  $noKegiatan = htmlspecialchars($data["no_kegiatan"]);
  $hariTerbilang = htmlspecialchars($data["hari_terbilang"]);
  $tglTerbilang = htmlspecialchars($data["tgl_terbilang"]);
  $blnTerbilang = htmlspecialchars($data["bln_terbilang"]);
  $thnTerbilang = htmlspecialchars($data["thn_terbilang"]);
  $namaSatker = htmlspecialchars($data["nama_satker"]);
  $alamatSatker = htmlspecialchars($data["alamat_satker"]);
  $namaPerusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $alamatPerusahaan = htmlspecialchars($data["alamat_perusahaan"]);
  $namaPekerjaan = htmlspecialchars($data["nama_pekerjaan"]);
  $tahunAnggaran = htmlspecialchars($data["tahun_anggaran"]);
  $namaWakilPenyedia = htmlspecialchars($data["nama_wakil_penyedia"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $nomorBast = htmlspecialchars($data["no_bast"]);
  $jenisSurat = htmlspecialchars($data["jenis_surat"]);
  $noJenisSurat = htmlspecialchars($data["no_jenis_surat"]);
  $noDipa = htmlspecialchars($data["no_dipa"]);
  $tglDipa = htmlspecialchars($data["tgl_dipa"]);
  $pembayaranResmi = htmlspecialchars($data["pembayaran_resmi"]);
  $namaPpk = htmlspecialchars($data["nama_ppk"]);
  $nip = htmlspecialchars($data["nip"]);
  $tglBuat = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["tgl_buat"]))))))))));

  $pembayaranResmi = preg_replace("/[^0-9]/", "", $pembayaranResmi);

  $query = "UPDATE tb_bap SET
  id_user = '$idUser', 
  tgl_surat = '$tglSurat', 
  no_kegiatan = '$noKegiatan', 
  hari_terbilang = '$hariTerbilang', 
  tgl_terbilang = '$tglTerbilang', 
  bln_terbilang = '$blnTerbilang', 
  thn_terbilang = '$thnTerbilang', 
  nama_satker = '$namaSatker', 
  alamat_satker = '$alamatSatker', 
  nama_perusahaan = '$namaPerusahaan', 
  alamat_perusahaan = '$alamatPerusahaan', 
  nama_pekerjaan = '$namaPekerjaan', 
  tahun_anggaran = '$tahunAnggaran', 
  nama_wakil_penyedia = '$namaWakilPenyedia',
  jabatan = '$jabatan',
  no_bast = '$nomorBast',
  jenis_surat = '$jenisSurat',
  no_jenis_surat = '$noJenisSurat',
  no_dipa = '$noDipa',
  tgl_dipa = '$tglDipa',
  pembayaran_resmi = '$pembayaranResmi',
  nama_ppk = '$namaPpk',
  nip = '$nip',
  tgl_buat = '$tglBuat'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE/HAPUS DATA BAP
function deleteBAP($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_bap WHERE id = '$id' ");
  return mysqli_affected_rows($conn);
}



// =================================================
// FUNCTION ACCOUNT SUPER ADMIN, KEPALA BADAN, USER
// =================================================
// FUNCTION TAMBAH ACCOUNT
function addAccount($data)
{
  global $conn;

  $gambar = uploadPhotoProfile();
  if (!$gambar) {
    return false;
  }

  $firstName = htmlspecialchars($data["first_name"]);
  $lastName = htmlspecialchars($data["last_name"]);
  $username = strtolower(stripslashes($data["username"]));
  $nip = htmlspecialchars($data["nip"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $level = mysqli_real_escape_string($conn, $data["level"]);

  // check empty data
  if (empty($firstName)) {
    echo "
    <script>
      alert('Nama tidak boleh kosong!');
    </script>
    ";
    return false;
  }

  // check empty data
  if (empty($username)) {
    echo "
    <script>
      alert('Nama tidak boleh kosong!');
    </script>
    ";
    return false;
  }

  // check empty data
  if (empty($password)) {
    echo "
    <script>
      alert('Nama tidak boleh kosong!');
    </script>
    ";
    return false;
  }

  // check empty data
  if (empty($level)) {
    echo "
    <script>
      alert('Nama tidak boleh kosong!');
    </script>
    ";
    return false;
  }

  // check double username
  $result = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Nama pengguna ini sudah di ada. Silahkan gunakan nama pengguna yang lain');
    </script>
    ";
    return false;
  }

  // check confirmation password
  if ($password !== $password2) {
    echo "
    <script>
      alert('Konfirmasi kata sandi tidak sesuai!');
    </script>
    ";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // query
  $query = "INSERT INTO tb_users VALUES(null, '$gambar', '$firstName', '$lastName', '$username', '$nip', '$password', '$password2', '$level') ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION EDIT ACCOUNT
// =================================================
// FUNCTION EDIT FOTO PROFIL
function editPhotoProfile($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $imgOld = htmlspecialchars($data["img_old"]);

  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $imgOld;
  } else {
    $gambar = uploadPhotoProfile();
  }


  $query = "UPDATE tb_users SET 
  gambar = '$gambar'
  WHERE id = '$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// FUNCTION UPLOAD FOTO PROFIL
function uploadPhotoProfile()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah ada gambar yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Pilih gambar terlebih dahulu');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
		<script>
			alert('Yang anda upload bukan gambar');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file gambar yang diupload
  if ($ukuranFile > 5000000) {
    echo "
		<script>
			alert('Ukuran gambar terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $namaFileBaru = uniqid($namaFile . '_');
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, '../../assets/img/photo-profile/' . $namaFileBaru);
  return $namaFileBaru;
}


// FUNCTION EDIT NAMA 
function editName($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $firstName = htmlspecialchars($data["first_name"]);
  $lastName = htmlspecialchars($data["last_name"]);

  $query = "UPDATE tb_users SET 
  first_name = '$firstName',
  last_name = '$lastName'
  WHERE id = '$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// FUNCTION EDIT NAMA PENGGUNA 
function editUsername($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $username = strtolower(stripslashes($data["username"]));

  $result = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Nama pengguna ini sudah digunakan. Silahkan gunakan nama pengguna yang lain!');
    </script>
    ";
    return false;
  }
}

// FUNCTION EDIT NIP 
function editNip($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $nip = htmlspecialchars($data["nip"]);

  $query = "UPDATE tb_users SET 
  nip = '$nip'
  WHERE id = '$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// FUNCTION EDIT NAMA PENGGUNA 
function editPassword($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  if ($password !== $password2) {
    echo "
    <script>
      alert('Konfirmasi kata sandi tidak sesuai!');
    </script>
    ";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "UPDATE tb_users SET 
  password = '$password',
  password2 = '$password2'
  WHERE id = '$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// FUNCTION LEVEL ACCOUNT 
function editLevel($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $levelAccount = htmlspecialchars($data["level"]);

  $query = "UPDATE tb_users SET 
  level = '$levelAccount'
  WHERE id = '$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// FUNCTION DELETE ACCOUNT
function deleteAccount($idAccount)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_users WHERE id = '$idAccount' ");
  return mysqli_affected_rows($conn);
}





// =================================================
// FUNCTION SEARCHING FITUR
// =================================================
// FUNCTION SEARCH FITUR
function searchFitur($q)
{

  $query = "SELECT * FROM tb_search
  WHERE tag_search LIKE '%$q%' ";

  if (strlen($q) > 50) {
    header("Location:search?q=ㅤ&search=");
  }

  // Validation Input Search
  if (empty($_GET["q"])) {
    header("Location:search?q=ㅤ&search=");
    exit;
  }

  if ($_GET["q"] === "'") {
    header("Location:search?q=ㅤ&search=");
    exit;
  }

  $filterSearch = "/";

  if ($_GET["q"] === $filterSearch) {
    header("Location:search?q=ㅤ&search=");
    exit;
  }

  return query($query);
}



// =================================================
// FUNCTION SEARCHING FITUR
// =================================================
// EDIT/UBAH DATA USER QUIDE
function editUserGuide($data)
{
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $description = $data["description"];

  $query = "UPDATE tb_user_guide SET
  description = '$description'
  WHERE id = '$id' ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// =================================================
// FUNCTION UPLOAD FILE IMAGE USER GUIDE
// =================================================
// EDIT/UBAH DATA USER QUIDE
function imgUserGuide($data)
{
  global $conn;

  $gambar = uploadImgUserGuide();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO tb_user_guide_img VALUES(null, '$gambar')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function uploadImgUserGuide()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah ada file yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Pilih file terlebih dahulu');
      document.location.href = 'register';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah file
  $ekstensiFileValid = ['jpg', 'jpeg', 'png'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
  if (!in_array($ekstensiFile, $ekstensiFileValid)) {
    echo "
		<script>
			alert('Yang anda upload bukan gambar');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file file yang diupload
  if ($ukuranFile > 5000000) {
    echo "
		<script>
			alert('Ukuran file terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, file siap di upload
  // generate nama file baru
  $namaFileBaru = uniqid($namaFile . '_');
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiFile;

  move_uploaded_file($tmpName, '../../../uploads/images/' . $namaFileBaru);
  return $namaFileBaru;
}

// DELETE IMG USER GUIDE
function deleteImgUserGuide($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_user_guide_img WHERE id = '$id' ");
  return false;
}
