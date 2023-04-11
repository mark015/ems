<?php
    include('include/config.php');
function add_coor(){
    global $conn;
    $id = $_POST['id'];
    $query = "UPDATE `election_2023` SET `pos`='1' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
        if ($result == TRUE) {
            echo json_encode('success');
        } else { 
    }
}  
function add_lead(){
    global $conn;
    $id = $_POST['id'];
    $coor_id = $_POST['coor_id'];
    $query = "UPDATE `election_2023` SET `pos`='2', coordinator_id='$coor_id' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
        if ($result == TRUE) {
            echo json_encode('success');
        } else { 
    }
}  
function add_mem(){
    global $conn;
    $id = $_POST['id'];
    $coor_id = $_POST['coor_id'];
    $lead_id = $_POST['lead_id'];
    $query = "UPDATE `election_2023` SET `pos`='3',
     coordinator_id='$coor_id', leader_id='$lead_id' 
     WHERE id='$id'";
    $result = mysqli_query($conn, $query);
        if ($result == TRUE) {
            echo json_encode('success');
        } else { 
    }
}  
?>