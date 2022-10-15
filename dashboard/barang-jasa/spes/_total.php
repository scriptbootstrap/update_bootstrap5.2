<?php
//  Jumlah + PPN
$total = $rowSPes["harga_satuan"] * $rowSPes["vol"] +
  11 / 100 * $rowSPes["harga_satuan"] * $rowSPes["vol"];
echo number_format($total, 0, ',', '.');
