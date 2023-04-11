<?php
include('include/config.php');
function delete_coordinator(){
    $coor_id = $_POST['coor_id'];
    global $conn;
    
    $query1 = "UPDATE `election_2023` SET `pos`='', leader_id='', coordinator_id=''
    WHERE id='$coor_id'";
    $result1 = mysqli_query($conn, $query1);
       if ($result1 == TRUE) {
            $sql = "select * from election_2023 where coordinator_id='$coor_id'
                ";
            $result_coor = mysqli_query($conn, $sql);
            if ($result_coor->num_rows > 0) {
                while($row = mysqli_fetch_array($result_coor)){
                    $query = "UPDATE `election_2023` SET `pos`='', leader_id='', coordinator_id=''
                        WHERE id='".$row['id']."'";
                    $result = mysqli_query($conn, $query);
                        if ($result == TRUE) {
                            echo json_encode('success');
                        } else { 
                    }
                }
            }
       } else { 
   }  
}

function delete_leader(){
    $lead_id =$_POST['lead_id'];
    global $conn;
    
    $query1 = "UPDATE `election_2023` SET `pos`='', leader_id='', coordinator_id=''
    WHERE id='$lead_id'";
    $result1 = mysqli_query($conn, $query1);
       if ($result1 == TRUE) {
            $sql = "select * from election_2023 where leader_id='$lead_id'
                ";
            $result_coor = mysqli_query($conn, $sql);
            if ($result_coor->num_rows > 0) {
                while($row = mysqli_fetch_array($result_coor)){
                    $query = "UPDATE `election_2023` SET `pos`='', leader_id='', coordinator_id=''
                        WHERE id='".$row['id']."'";
                    $result = mysqli_query($conn, $query);
                        if ($result == TRUE) {
                            echo json_encode('success');
                        } else { 
                    }
                }
            }
       } else { 
   }  
}
function delete_member(){
    global $conn;
    $member_id = $_POST['mem_id'];
    $query = "UPDATE `election_2023` SET `pos`='', leader_id='', coordinator_id=''
    WHERE id='$member_id'";
    $result = mysqli_query($conn, $query);
    if ($result == TRUE) {
        echo json_encode('success');
    } else { 
}
}
    
