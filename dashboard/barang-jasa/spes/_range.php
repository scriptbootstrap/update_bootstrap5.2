<?php
$fromTgl = strtotime($rowSPes["from_tgl"]);
$toTgl = strtotime($rowSPes["to_tgl"]);
$difference = $toTgl - $fromTgl;
$TimeDifference = $difference / 60 / 60 / 24 + 1;
echo $TimeDifference;
