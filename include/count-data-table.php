<?php
// ==================================================================
// HITUNG BERAPA JUMLAH AKUN TERDAFTAR
// ==================================================================
$jmlhAkun = $conn->query("SELECT COUNT(*) jmlhAkun FROM tb_users");
$resultAkun = mysqli_fetch_assoc($jmlhAkun);

// ==================================================================
// HITUNG BERAPA JUMLAH AKUN TERDAFTAR (LEVEL SUPER ADMIN)
// ==================================================================
$jmlhAkunLevelSuperAdmin = $conn->query("SELECT COUNT(*) jmlhAkunLevelSuperAdmin FROM tb_users WHERE level = 'superadmin' ");
$resultAkunLevelSuperAdmin = mysqli_fetch_assoc($jmlhAkunLevelSuperAdmin);

// ==================================================================
// HITUNG BERAPA JUMLAH AKUN TERDAFTAR (LEVEL KABAN)
// ==================================================================
$jmlhAkunLevelKaban = $conn->query("SELECT COUNT(*) jmlhAkunLevelKaban FROM tb_users WHERE level = 'kaban' ");
$resultAkunLevelKaban = mysqli_fetch_assoc($jmlhAkunLevelKaban);

// ==================================================================
// HITUNG BERAPA JUMLAH AKUN TERDAFTAR (LEVEL USER)
// ==================================================================
$jmlhAkunLevelUser = $conn->query("SELECT COUNT(*) jmlhAkunLevelUser FROM tb_users WHERE level = 'user' ");
$resultAkunLevelUser = mysqli_fetch_assoc($jmlhAkunLevelUser);

// ==================================================================
// HITUNG BERAPA JUMLAH MEMO
// ==================================================================
$jmlhMemo = $conn->query("SELECT COUNT(*) jmlhMemo FROM tb_memo");
$resultMemo = mysqli_fetch_assoc($jmlhMemo);

// ==================================================================
// HITUNG BERAPA JUMLAH BAPHK
// ==================================================================
$jmlhBAPHK = $conn->query("SELECT COUNT(*) jmlhBAPHK FROM tb_baphk");
$resultBAPHK = mysqli_fetch_assoc($jmlhBAPHK);

// ==================================================================
// HITUNG BERAPA JUMLAH PIP
// ==================================================================
$jmlhPIP = $conn->query("SELECT COUNT(*) jmlhPIP FROM tb_pip");
$resultPIP = mysqli_fetch_assoc($jmlhPIP);

// ==================================================================
// HITUNG BERAPA JUMLAH PIBU
// ==================================================================
$jmlhPIBU = $conn->query("SELECT COUNT(*) jmlhPIBU FROM tb_pibu");
$resultPIBU = mysqli_fetch_assoc($jmlhPIBU);

// ==================================================================
// HITUNG BERAPA JUMLAH BAHKN
// ==================================================================
$jmlhBAHKN = $conn->query("SELECT COUNT(*) jmlhBAHKN FROM tb_bahkn");
$resultBAHKN = mysqli_fetch_assoc($jmlhBAHKN);

// ==================================================================
// HITUNG BERAPA JUMLAH BAHP
// ==================================================================
$jmlhBAHP = $conn->query("SELECT COUNT(*) jmlhBAHP FROM tb_bahp");
$resultBAHP = mysqli_fetch_assoc($jmlhBAHP);

// ==================================================================
// HITUNG BERAPA JUMLAH SPes
// ==================================================================
$jmlhSPes = $conn->query("SELECT COUNT(*) jmlhSPes FROM tb_spes");
$resultSPes = mysqli_fetch_assoc($jmlhSPes);

// ==================================================================
// HITUNG BERAPA JUMLAH BAHPP
// ==================================================================
$jmlhBAHPP = $conn->query("SELECT COUNT(*) jmlhBAHPP FROM tb_bahpp");
$resultBAHPP = mysqli_fetch_assoc($jmlhBAHPP);

// ==================================================================
// HITUNG BERAPA JUMLAH BAPP
// ==================================================================
$jmlhBAPP = $conn->query("SELECT COUNT(*) jmlhBAPP FROM tb_bapp");
$resultBAPP = mysqli_fetch_assoc($jmlhBAPP);

// ==================================================================
// HITUNG BERAPA JUMLAH BAST
// ==================================================================
$jmlhBAST = $conn->query("SELECT COUNT(*) jmlhBAST FROM tb_bast");
$resultBAST = mysqli_fetch_assoc($jmlhBAST);

// ==================================================================
// HITUNG BERAPA JUMLAH Kwitansi
// ==================================================================
$jmlhKwitansi = $conn->query("SELECT COUNT(*) jmlhKwitansi FROM tb_kwitansi");
$resultKwitansi = mysqli_fetch_assoc($jmlhKwitansi);

// ==================================================================
// HITUNG BERAPA JUMLAH BAP
// ==================================================================
$jmlhBAP = $conn->query("SELECT COUNT(*) jmlhBAP FROM tb_bap");
$resultBAP = mysqli_fetch_assoc($jmlhBAP);
