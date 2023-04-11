<?php

include('../include/config.php');
$total = '';
$sup = '';
$notSup='';
function notSupp(){
    global $conn;
    global $notSup;
    $brgyId = $_POST['brgyId'];
    $notSuppQry = "select count(*) as notSuppCount from election_2023 where pos = '' && brgy='$brgyId'";
    $notSuppRes = mysqli_query($conn, $notSuppQry);
    $notSuppData = mysqli_fetch_array($notSuppRes);

    $notSup = $notSuppData['notSuppCount'];
}

function supp(){
    global $conn;
    global $sup;
    $brgyId = $_POST['brgyId'];
    $notSuppQry = "select count(*) as notSuppCount from election_2023 where pos != ''  && brgy='$brgyId'";
    $notSuppRes = mysqli_query($conn, $notSuppQry);
    $notSuppData = mysqli_fetch_array($notSuppRes);
    $sup = $notSuppData['notSuppCount'];
}

function coor(){
    global $conn;
    $brgyId = $_POST['brgyId'];
    $notSuppQry = "select count(*) as notSuppCount from election_2023 where pos = '1'  && brgy='$brgyId'";
    $notSuppRes = mysqli_query($conn, $notSuppQry);
    $notSuppData = mysqli_fetch_array($notSuppRes);

    echo $notSuppData['notSuppCount'];
}

function lead(){
    global $conn;
    $brgyId = $_POST['brgyId'];
    $notSuppQry = "select count(*) as notSuppCount from election_2023 where pos = '2'  && brgy='$brgyId'";
    $notSuppRes = mysqli_query($conn, $notSuppQry);
    $notSuppData = mysqli_fetch_array($notSuppRes);

    echo $notSuppData['notSuppCount'];
}

function mem(){
    global $conn;
    $brgyId = $_POST['brgyId'];
    $notSuppQry = "select count(*) as notSuppCount from election_2023 where pos = '3'  && brgy='$brgyId'";
    $notSuppRes = mysqli_query($conn, $notSuppQry);
    $notSuppData = mysqli_fetch_array($notSuppRes);
    
    echo $notSuppData['notSuppCount'];
}
function winningPercent(){
    global $conn;
    global $total;
    $brgyId = $_POST['brgyId'];
    $WinningPerQry = "select count(id) as voted from election_2023 where status = 'Voted'  && brgy='$brgyId'";
    $WinningPerRes = mysqli_query($conn, $WinningPerQry);
    $notWinningPer = mysqli_fetch_array($WinningPerRes);
    $total = $notWinningPer['voted'];
}
function lossingPercent(){
    global $conn;
    global $total;
    $brgyId = $_POST['brgyId'];
    $WinningPerQry = "select count(id) as notVoted from election_2023 where status = 'Not Voted'  && brgy='$brgyId'";
    $WinningPerRes = mysqli_query($conn, $WinningPerQry);
    $notWinningPer = mysqli_fetch_array($WinningPerRes);
    $total = $notWinningPer['notVoted'];
}

function voted(){
    global $conn;
    global $total;
    $brgyId = $_POST['brgyId'];
    $votedQry = "select count(id) as Voted from election_2023 where status = 'Voted' && pos!='' && brgy='$brgyId'";
    $votedResult = mysqli_query($conn, $votedQry);
    $voted = mysqli_fetch_array($votedResult);
    $total = $voted['Voted'];
}

function notVoted(){
    global $conn;
    global $total;
    $brgyId = $_POST['brgyId'];
    $nootVotedQry = "select count(id) as notVoted from election_2023 where status = 'Not Voted' && pos!='' && brgy='$brgyId'";
    $NotVotedResult = mysqli_query($conn, $nootVotedQry);
    $NotVoted = mysqli_fetch_array($NotVotedResult);
    $total = $NotVoted['notVoted'];
}