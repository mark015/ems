<?php
include('../functions/dashboard/view.php');

notVoted($total);
supp($sup);
$totalNotVoted = $total / $sup * 100;
echo $totalNotVoted;
