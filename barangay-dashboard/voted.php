<?php
include('../functions/dashboard/view.php');

voted($total);
supp($sup);
$totalVoted = $total / $sup * 100;
echo $totalVoted;
