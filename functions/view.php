<?php

include('include/config.php');
include('phpqrcode/qrlib.php');
require 'vendor/autoload.php';

function brgy_records(){
    global $conn; 
    $brgy_id = $_GET['id'];
    $brgy_value = "";
    $brgy_value .= '
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Precinct #</th>
            <th>position</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *, brgy.brgy as bb, position.pos as posi from election_2023 
    inner join brgy on election_2023.brgy=brgy.id
    inner join position on election_2023.pos=position.id
     where election_2023.brgy='$brgy_id' && election_2023.pos='1'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        
        while($row = mysqli_fetch_array($result)){
            $address = $row['prk']. ", ".$row['bb'];
            $brgy_value .= "<tr class='m'>   
            <td>".$row['name']."</td>
            <td>".$address."</td>
            <td>".$row['pn']."</td>
            <td>".$row['posi']."</td>
            <td>". $row['status']."</td>
            <td>
            <button class='btn btn-success'><i class='fa fa-eye'></i></button>
            <button class='btn btn-danger' id='delete_coor' delete_coor='".$row['id']."'><i class='fa fa-trash-o'></i></button>
            </td>
            
            </tr>";
        }
    }
    $brgy_value .= '</tbody>';
    $brgy_value .= "";
    echo $brgy_value;

}
// coordinator views
function residents_breakdown(){
    global $conn; 
    $brgy_id = $_POST['brgy_id'];
    $brgy_value = "";
    $brgy_value .= '
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Precinct #</th>
            <th>position</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *,election_2023.id as ids , brgy.brgy as bb, position.pos as posi from election_2023 
    inner join brgy on election_2023.brgy=brgy.id
    inner join position on election_2023.pos=position.id
     where election_2023.pos='1' && election_2023.brgy='$brgy_id'
     ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        
        while($row = mysqli_fetch_array($result)){
            $address = $row['prk']. ", ".$row['bb'];
            $brgy_value .= "<tr class='m'>   
            <td>".$row['name']."</td>
            <td>".$address."</td>
            <td>".$row['pn']."</td>
            <td>".$row['posi']."</td>
            <td>". $row['status']."</td>
            <td>
            <button class='btn btn-primary' id='view_coor' leader-view='".$row['ids']."'><i class='fa fa-eye'></i></button>
            <button class='btn btn-success' id='viewUpdate' viewUpdate-id='".$row['ids']."' data-toggle='modal' data-target='#updateModal'><i class='fa fa-edit'></i></button>
            <button class='btn btn-danger' id='delete_coor' delete_coor='".$row['ids']."'><i class='fa fa-trash-o'></i></button>
            </td>
            
            </tr>";
        }   
    }
    $brgy_value .= '</tbody>';
    $brgy_value .= "";
    echo $brgy_value;

}
// leader views
function leader(){
    global $conn;
    $id = $_POST['id'];
    $brgy_value = "";
    $brgy_value .= '
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Precinct #</th>
            <th>position</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *,election_2023.id as ids , brgy.brgy as bb, position.pos as posi from election_2023 
    inner join brgy on election_2023.brgy=brgy.id
    inner join position on election_2023.pos=position.id
     where election_2023.pos='2' && coordinator_id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        
        while($row = mysqli_fetch_array($result)){
            $address = $row['prk']. ", ".$row['bb'];
            $brgy_value .= "<tr class='m'>   
            <td>".$row['name']."</td>
            <td>".$address."</td>
            <td>".$row['pn']."</td>
            <td>".$row['posi']."</td>
            <td>". $row['status']."</td>
            <td>
            <button class='btn btn-primary' id='view_member' member-view='".$row['ids']."'><i class='fa fa-eye'></i></button>
            <button  id='updateLeader'  updateLeader-id='".$row['ids']."' class='btn btn-success' data-toggle='modal' data-target='#leaderUpdateModal' ><i class='fa fa-edit'></i></button>
            <button class='btn btn-danger' id='delete_lead' delete-lead='".$row['ids']."'><i class='fa fa-trash-o'></i></button>
            </td>
            </tr>";
        }
    }
    $brgy_value .= '</tbody>';
    
    $brgy_value .= "";
    echo $brgy_value;

}
function member(){
    global $conn;
    $id = $_POST['id'];
    $brgy_value = "";
    $brgy_value .= '
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Precinct #</th>
            <th>position</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *,election_2023.id as ids , brgy.brgy as bb, position.pos as posi from election_2023 
    inner join brgy on election_2023.brgy=brgy.id
    inner join position on election_2023.pos=position.id
     where election_2023.pos='3' && leader_id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        
        while($row = mysqli_fetch_array($result)){
            $address = $row['prk']. ", ".$row['bb'];
            $brgy_value .= "<tr class='m'>   
            <td>".$row['name']."</td>
            <td>".$address."</td>
            <td>".$row['pn']."</td>
            <td>".$row['posi']."</td>
            <td>". $row['status']."</td>
            <td>
            <button class='btn btn-success' data-toggle='modal' id='viewModalMembers' updateMemId-id='".$row['ids']."' data-target='#MemberUpdateModal'><i class='fa fa-edit'></i></button>
            <button class='btn btn-danger' id='delete_mem' delete-mem='".$row['ids']."'><i class='fa fa-trash-o'></i></button>
            </td>
            
            </tr>";
        }
    }
    $brgy_value .= '</tbody>';
    
    $brgy_value .= "";
    echo $brgy_value;

}

//add coordinator views
function add_coordinator(){
    global $conn;
    $brgy_id = $_POST['brgy_id'];
    $coor_value = $_POST['get_option'];
    $brgy_value = "";
    if($coor_value == ''){

    }else{
    $brgy_value .= '
    <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brgy</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *,election_2023.id as ids, brgy.brgy as b from election_2023 inner join brgy on election_2023.brgy=brgy.id
     where name like '%$coor_value%' && election_2023.brgy='$brgy_id' && pos=''  limit 5";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)){
            $brgy_value .= "<tr class='m'>   
            <td>".$row['name']."</td> 
            <td>".$row['b']."</td>
            <td>
            <button class='btn btn-success' id='add_coor' add-coor='".$row['ids']."'><i class='fa fa-plus'></i></button>
            </td>
            </tr>";
        }
    }
    $brgy_value .= '</tbody></table>';
}
    $brgy_value .= "";
    echo $brgy_value;

}

// add leader views
function add_leader(){
    global $conn;
    $brgy_id = $_POST['brgy_id'];
    $coor_value = $_POST['get_option'];
    $brgy_value = "";
    $brgy_value .= '
    <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brgy</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *,election_2023.id as ids, brgy.brgy as b from election_2023 inner join brgy on election_2023.brgy=brgy.id
     where name like '%$coor_value%' && election_2023.brgy='$brgy_id' && pos='' limit 5";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)){
            $brgy_value .= "<tr class='m'>
            <td>".$row['name']."</td> 
            <td>".$row['b']."</td>
            <td>
            <button class='btn btn-success' id='add_lead' add-lead='".$row['ids']."'><i class='fa fa-plus'></i></button>
            </td>
            </tr>";
        }
    }
    $brgy_value .= '</tbody></table>';
    $brgy_value .= "
            <script>
            $('#brgy_records').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'print',
                    'excel',
                    'pdf'
                ]
            })
            </script>
            ";
    $brgy_value .= "";
    echo $brgy_value;

}

function add_member(){
    global $conn;
    $brgy_id = $_POST['brgy_id'];
    $coor_value = $_POST['get_option'];
    $brgy_value = "";
    $brgy_value .= '
    <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brgy</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="brgy_records">';
    $sql = "select *,election_2023.id as ids, brgy.brgy as b from election_2023 inner join brgy on election_2023.brgy=brgy.id
     where name like '%$coor_value%' && election_2023.brgy='$brgy_id' && pos='' limit 5";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)){
            $brgy_value .= "<tr class='m'>
                <td>".$row['name']."</td> 
                <td>".$row['b']."</td>
                <td>
                    <button class='btn btn-success' id='add_member' add-member='".$row['ids']."'><i class='fa fa-plus'></i></button>
                </td>
            </tr>";
        }
    }
    $brgy_value .= '</tbody></table>';
    $brgy_value .= "";
    echo $brgy_value;

}

//view update
function viewUpdate(){
    global $conn;
    $id = $_POST['id'];
    $value = "";
    $queryUpdate = "select * from election_2023 where id='$id'";
    $result = $conn->query($queryUpdate);
    $dataUpdate = $result -> fetch_assoc();
    $value .= "<input type='text' class='form form-control' update-id='".$dataUpdate['id']."'  id='inputName' value='".$dataUpdate['name']."'>"; 
    echo $value;
}






//qr coordinator 
function qr_coor(){
    global $conn;
    $brgy_id = $_POST['id'];
    $sql = "SELECT * FROM election_2023 where pos='1' && brgy='$brgy_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //data to be stored in qr
            
            $text = "sd". $row['id'];
            
            //file path
            $file = "img/". $row['id'];
            
            //other parameter
            $ecc = 'H';
            $pixel_size = 2;
            $frame_size = 2;
            
            // Generates QR Code and Save as PNG
            QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);
            // Displaying the stored QR code if you want
            $values = '
                <td class=" bb"> 
                    <img src="'.$file.'" class="img">
                    <h5>'.$row['name'].'</h5>
                </td>
            ';
           
            echo $values;
            
        }
    }
}

?>