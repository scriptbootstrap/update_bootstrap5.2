<?php
//  Jumlah + PPN
$total = $rowSPes["harga_satuan"] * $rowSPes["vol"] +
  11 / 100 * $rowSPes["harga_satuan"] * $rowSPes["vol"];

// Bulatkan Hasil Penjumlahan antara (Jumlah + PPN) nilai < 999999 
if ($total < 999999) {
  $jumlahBulatan =  substr(number_format($total, 0, ',', '.'), 0, 3);
  echo $jumlahBulatan . "." . "000";
}

// // Bulatkan Hasil Penjumlahan antara (Jumlah + PPN) nilai < 9999999 
if ($total > 1000000 and  $total < 9999999) {
  $jumlahBulatan =  substr(number_format($total, 0, ',', '.'), 0, 5);
  echo $jumlahBulatan . "." . "000";
}

// Bulatkan Hasil Penjumlahan antara (Jumlah + PPN) > 1000000
if ($total > 10000000) {
  $jumlahBulatan =  substr(number_format($total, 0, ',', '.'), 0, 6);
  echo $jumlahBulatan . "." . "000";
}


// // Bulatkan Hasil Penjumlahan antara (Jumlah + PPN) nilai < 999999 
// if ($total < 999999) {
//   $jumlahBulatan =  number_format($total, 0, ',', '.');
//   $jumlahBulatanTerbilang = number_format(round($jumlahBulatan), 0, ',', '.') . "." . "000";

//   // clear simbol TITIK(.)
//   $jumlahBulatanTerbilang = preg_replace("/[^0-9]/", "", $jumlahBulatanTerbilang);
//   echo terbilang($jumlahBulatanTerbilang);
// }

// // // Bulatkan Hasil Penjumlahan antara (Jumlah + PPN) nilai < 9999999 
// if ($total > 1000000 and  $total < 9999999) {
//   $jumlahBulatan =  substr(number_format($total, 0, ',', '.'), 0, 5);
//   $jumlahBulatanTerbilang = round($jumlahBulatan, 1) . "00" . "." . "000";

//   // clear simbol TITIK(.)
//   $jumlahBulatanTerbilang = preg_replace("/[^0-9]/", "", $jumlahBulatanTerbilang);
//   echo terbilang($jumlahBulatanTerbilang);
// }

// // Bulatkan Hasil Penjumlahan antara (Jumlah + PPN) > 1000000
// if ($total > 10000000) {
//   $jumlahBulatan =  substr(number_format($total, 0, ',', '.'), 0, 6);
//   $jumlahBulatanTerbilang =  round($jumlahBulatan, 1) . "00" . "." . "000";

//   // clear simbol TITIK(.)
//   $jumlahBulatanTerbilang = preg_replace("/[^0-9]/", "", $jumlahBulatanTerbilang);
//   echo terbilang($jumlahBulatanTerbilang);
// }
