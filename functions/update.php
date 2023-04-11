<?php
include('include/config.php');
function updateCoor(){
    global $conn;
    $id = $_POST['id'];
    $name=$_POST['name'];
    $viewQuery = "select * from election_2023 where name = '$name'";
    $viewSql = mysqli_query($conn, $viewQuery);
    $viewData = mysqli_fetch_array($viewSql);
    $updateId = $viewData['id'];

    $updateCoors = "UPDATE `election_2023` SET `pos`='1'
    WHERE id='$updateId'";
    $coorsQry = mysqli_query($conn, $updateCoors);
    if ($coorsQry == TRUE) {
        echo json_encode('success');
    }

    $updateCoor = "UPDATE `election_2023` SET `pos`='', `coordinator_id`='' 
    WHERE id='$id'";
    $coorQry = mysqli_query($conn, $updateCoor);
    if ($coorQry == TRUE) {
        echo json_encode('success');
    }
    $updateQry = "select * from election_2023 where coordinator_id='$id'";
    $resultUpdate = mysqli_query($conn, $updateQry); 
    if ($resultUpdate->num_rows > 0) {
        while($row = mysqli_fetch_array($resultUpdate)){
            $update = "UPDATE `election_2023` SET `coordinator_id`='$updateId' 
            WHERE id='".$row['id']."'";
            $updateQry = mysqli_query($conn, $update);
            if ($updateQry == TRUE) {
                echo json_encode('success');
            }
        }
    }

}
//* leader updates
function updateLeader(){
    global $conn;
    $leaderId = $_POST['leaderId'];
    $leaderName = $_POST['leaderName'];

    $viewQuery = "select * from election_2023 where name = '$leaderName'";
    $viewSql = mysqli_query($conn, $viewQuery);
    $viewData = mysqli_fetch_array($viewSql);

    $viewCoordinatorQuery = "select * from election_2023 where id = '$leaderId'";
    $viewCoordinatorSql = mysqli_query($conn, $viewCoordinatorQuery);
    $viewCoordinatorData = mysqli_fetch_array($viewCoordinatorSql);
    
// Leader updates
    $updateMemQry = ("UPDATE `election_2023` SET `pos`='2', `coordinator_id`='".$viewCoordinatorData['coordinator_id']."'
    WHERE id='".$viewData['id']."'");
    $updateMemResult = mysqli_query($conn, $updateMemQry);
    if ($updateMemResult == TRUE){
        echo json_encode('success');
    }
//leader to none position 
    $updateQry = ("UPDATE `election_2023` SET `pos`='', `leader_id`='', `coordinator_id`=''
    WHERE id='$leaderId'");
    $updateResult = mysqli_query($conn, $updateQry);
    if ($updateResult == TRUE){
        echo json_encode('success');
    }
//update Members
    $updateQry = "select * from election_2023 where leader_id='$leaderId'";
    $resultUpdate = mysqli_query($conn, $updateQry); 
    if ($resultUpdate->num_rows > 0) {
        while($row = mysqli_fetch_array($resultUpdate)){
            $update = "UPDATE `election_2023` SET `leader_id`='".$viewData['id']."' 
            WHERE id='".$row['id']."'";
            $updateQry = mysqli_query($conn, $update);
            if ($updateQry == TRUE) {
                echo json_encode('success');
            }else{
                echo json_encode('error');
            }
        }
    }
}
//* leader updates

//update Members
function updateMem(){
    global $conn;
    $memberId = $_POST['memberId'];
    $memNewName = $_POST['memNewName'];

    $viewQuery = "select * from election_2023 where id = '$memberId'";
    $viewSql = mysqli_query($conn, $viewQuery);
    $viewData = mysqli_fetch_array($viewSql);

    $viewNewQuery = "select * from election_2023 where name = '$memNewName'";
    $viewNewSql = mysqli_query($conn, $viewNewQuery);
    $viewNewData = mysqli_fetch_array($viewNewSql);


    //new Member
    $updateMemQry = ("UPDATE `election_2023` SET `pos`='3', `coordinator_id`='".$viewData['coordinator_id']."', `leader_id`='".$viewData['leader_id']."'
    WHERE id='".$viewNewData['id']."'");
    $updateMemResult = mysqli_query($conn, $updateMemQry);
    if ($updateMemResult == TRUE){
        echo json_encode('success');
    }
//member to none position 
    $updateQry = ("UPDATE `election_2023` SET `pos`='', `leader_id`='', `coordinator_id`=''
    WHERE id='$memberId'");
    $updateResult = mysqli_query($conn, $updateQry);
    if ($updateResult == TRUE){
        echo json_encode('success');
    }
}