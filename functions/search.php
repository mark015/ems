<?php
include('include/config.php');
function searchCoor(){
    global $conn;
    $brgy_value = "";
    $brgy_id = $_POST['brgyId'];
    $searchCoorVal = $_POST['searchCoorVal'];
    
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
     where election_2023.pos='1' && election_2023.brgy='$brgy_id'  && election_2023.name like '%$searchCoorVal%'
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
    }else{
        $brgy_value .= 'No Result'; 
    } 
    $brgy_value .= '</tbody>';
    $brgy_value .= "";
    echo $brgy_value;
}