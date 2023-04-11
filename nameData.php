<?php
header('Content-Type: application/json');
require_once('include/config.php');
$brgy_id = $_POST['brgy_id'];
$sqlQuery = "select name from election_2023 where pos='' && brgy='$brgy_id'";
$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);