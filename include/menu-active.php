<?php
// ERROR REPORTING
error_reporting(1);

// =================
// CEK MENU ACTIVE
// =================

// KONFIGURASI URL ACTIVE (ONLINE)
// $urlActive = "";

// KONFIGURASI URL ACTIVE (LOCAL)
$urlActive = "/sikudabaja";

// GET URL
$url =  $_SERVER["REQUEST_URI"];

// Barang Dan Jasa
$idPaketActive = $_GET["id_paket"];
$idMemoActive = $_GET["id_memo"];
$idBaphkActive = $_GET["id_baphk"];
$idPipActive = $_GET["id_pip"];
$idPibuActive = $_GET["id_pibu"];
$idBahknActive = $_GET["id_bahkn"];
$idBahpActive = $_GET["id_bahp"];
$idSpesActive = $_GET["id_spes"];
$idBahppActive = $_GET["id_bahpp"];
$idBappActive = $_GET["id_bapp"];
$idBastActive = $_GET["id_bast"];
$idKwitansiActive = $_GET["id_kwitansi"];

// Barang Dan Jasa
$idBarangJasa = $_GET["id_barang_jasa"];

$idBapActive = $_GET["id_bap"];
$idEditUserActive = $_GET["id_user"];
$idEditAccountSettingsActive = $_GET["id_account"];
$idEditUserGuideActive = $_GET["id"];


// MENU ACTIVE DASHBOARD
if ($url === "$urlActive/dashboard/") {
  $activeDashboard = "active-skb";
  $activeMobileDashboard = "active-skb-mobile";
}


// MENU ACTIVE PENGADAAN BARANG DAN JASA
if (
  $url === "$urlActive/dashboard/barang-jasa/barang-jasa" or
  $url === "$urlActive/dashboard/barang-jasa/add-paket" or
  $url === "$urlActive/dashboard/barang-jasa/edit-paket?id_paket=$idPaketActive" or
  $url === "$urlActive/dashboard/barang-jasa/memo/add-memo?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/memo/edit-memo?id_memo=$idMemoActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/baphk/add-baphk?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/baphk/edit-baphk?id_baphk=$idBaphkActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/pip/add-pip?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/pip/edit-pip?id_pip=$idPipActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/pibu/add-pibu?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/pibu/edit-pibu?id_pibu=$idPibuActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/bahkn/add-bahkn?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/bahkn/edit-bahkn?id_bahkn=$idBahknActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/bahp/add-bahp?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/bahp/edit-bahp?id_bahp=$idBahpActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/spes/add-spes?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/spes/edit-spes?id_spes=$idSpesActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/bahpp/add-bahpp?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/bahpp/edit-bahpp?id_bahpp=$idBahppActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/bapp/add-bapp?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/bapp/edit-bapp?id_bapp=$idBappActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/bast/add-bast?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/bast/edit-bast?id_bast=$idBastActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/kwitansi/add-kwitansi?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/kwitansi/edit-kwitansi?id_kwitansi=$idKwitansiActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}

if (
  $url === "$urlActive/dashboard/barang-jasa/bap/add-bap?id_barang_jasa=$idBarangJasa" or
  $url === "$urlActive/dashboard/barang-jasa/bap/edit-bap?id_bap=$idBapActive"
) {
  $activeBarangJasa = "active-skb";
  $activeMobileBarangJasa = "active-skb-mobile";
}


// MENU ACTIVE SETTINGS
if (
  $url === "$urlActive/dashboard/settings/user" or
  $url === "$urlActive/dashboard/settings/add-user" or
  $url === "$urlActive/dashboard/settings/edit-user?id_user=$idEditUserActive"
) {
  $activeSettings = "active-skb";
}

// MENU ACTIVE ACCOUNT SETTINGS
if (
  $url === "$urlActive/dashboard/account-settings/account?id_account=$idEditAccountSettingsActive"
) {
  $activeMobileAccountSettings = "active-skb-mobile";
}

// MENU ACTIVE USER GUIDE
if (
  $url === "$urlActive/dashboard/help/user-guide/sikudabaja?id=$idEditUserGuideActive"
) {
  $activeUserGuide = "active-skb";
}

?>

<head>
  <style>
    .active-skb {
      background-color: #F675A8;
    }

    .active-skb i {
      color: white !important;
    }

    .active-skb p {
      color: white !important;
    }

    .active-skb span {
      color: white !important;
    }

    /* Active Menu Skb Mobile */
    .active-skb-mobile {
      background-color: #A460ED;
      border-radius: 50px;
    }
  </style>
</head>