<?php
include('../functions/dashboard/view.php');

lossingPercent($total);
supp($sup);
notSupp($notSup);
$tt = $notSup+$sup;
$TotalLossing = $total/$tt * 100;
echo $TotalLossing;

