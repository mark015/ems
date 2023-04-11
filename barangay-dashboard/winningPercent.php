<?php
include('../functions/dashboard/view.php');

winningPercent($total);
supp($sup);
notSupp($notSup);
$tt = $notSup+$sup;
$TotalWinning = $total/$tt * 100;
echo $TotalWinning;


