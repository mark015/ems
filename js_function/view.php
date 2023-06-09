<script>


// coordinator views     
function residents_breakdown(val)
{
    $.ajax({
        type: 'post',
        url: 'coordinator.php',
        data: {
            get_option:val, brgy_id:<?php echo $brgy_id;?>
        },
        success: function (val) {
            
            document.getElementById("residents_breakdown").innerHTML=val;
            document.getElementById("position").innerHTML='<div style="background-color:#B22222;padding:15px;color:#ffffff">Coordinator List</div>'; 
            document.getElementById("input_name").innerHTML='<input type="text" onchange="add_list_coordinator(this.value);" value="" id="name" class="form-control">';
            document.getElementById("qr_code").innerHTML='<button type="button" id="qr_coor" class="btn btn-dark"><i class="fa fa-qrcode"></i></button>';
            document.getElementById("search").innerHTML='<input type="text"  id="searchCoor" placeholder="Search Coordinator" class="form form-control fa fa-search"/>';
        }
    });
}
// leader views
function leader(val){
    $(document).on('click','#view_coor',function(){
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    var id = $(this).attr('leader-view');
    
    $.ajax({
        type: 'post',
        url: 'leader.php',
        data: {
            get_option:val, id:id
        },
        
        success: function (val) {
            document.getElementById("residents_breakdown").innerHTML=val;
            document.getElementById("position").innerHTML='<div style="background-color:#008080;padding:15px;color:#ffffff">Leader List <button class="btn btn-success" id="BackCoordinator" style="float:right;"><i class="fa fa-arrow-left"><i></button></div>';
            document.getElementById("coor_hidden").innerHTML='<input  value="'+id+'" type="text" id="name1" class=" hidden form-control">';
            document.getElementById("input_name").innerHTML='<input type="text" onchange="add_list_leader(this.value);" coorindator_id="'+id+'" id="name_leader" class="form-control">';
            document.getElementById("qr_code").innerHTML='<button type="button" class="btn btn-dark"><i class="fa fa-qrcode"></i></button>';
            document.getElementById("labelPosition").innerHTML = "Leader Name";
            document.getElementById("search").innerHTML='<input type="text" id="searchLeader" placeholder="Search Leader" class="form form-control fa fa-search"/>';
            // $('#inputDiv').reload();
              
        }
    });
    
    })
}
// view leaders
function leads(val){
    var coor_id = document.getElementById('name1').value;
    $.ajax({
        type: 'post',
        url: 'leader.php',
        data: {
            get_option:val, id:coor_id
        },
        success: function (val) {
            document.getElementById("names").innerHTML = '';
            document.getElementById("residents_breakdown").innerHTML=val;
            document.getElementById("position").innerHTML='<div style="background-color:#008080;padding:15px;color:#ffffff">Leader List<button class="btn btn-success" id="BackCoordinator" style="float:right;"><i class="fa fa-arrow-left"><i></div>';
            document.getElementById("coor_hidden").innerHTML='<input  value="'+coor_id+'" type="text" id="name1" class=" hidden form-control">';
            document.getElementById("input_name").innerHTML='<input type="text" onchange="add_list_leader(this.value);" id="name_leader" class="form-control">';
            document.getElementById("qr_code").innerHTML='<button type="button" class="btn btn-dark"><i class="fa fa-qrcode"></i></button>';
            document.getElementById("search").innerHTML='<input type="text" id="searchLeader" placeholder="Search Leader" class="form form-control fa fa-search"/>';
        }
    });
}
// view members
function member(val){
    $(document).on('click','#view_member',function(){
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        var leader_id = $(this).attr('member-view');
        var coor_id = document.getElementById('name1').value;
        $.ajax({
            type: 'post',
            url: 'member.php',
            data: {
                get_option:val, id:leader_id
            },
            success: function (val) {
                document.getElementById("residents_breakdown").innerHTML=val;
                document.getElementById("position").innerHTML='<div style="background-color:#708090;padding:15px;color:#ffffff">Member List<button class="btn btn-success" id="BackLeader" style="float:right;"><i class="fa fa-arrow-left"><i></div>';
                document.getElementById("coor_hidden").innerHTML='<input  value="'+leader_id+'" type="text" id="lead_ids"  class="hidden form-control">';
                document.getElementById("lead_hidden").innerHTML='<input  value="'+coor_id+'" type="text" id="name1"  class="hidden form-control">';
                document.getElementById("input_name").innerHTML='<input type="text" onchange="add_list_member(this.value);" id="name_members" class="form-control">';
                document.getElementById("qr_code").innerHTML='<button type="button" class="btn btn-dark"><i class="fa fa-qrcode"></i></button>';
            }
        });
        
    })
}
function mem(val){
    var lead_id = document.getElementById('lead_ids').value;
    var coor_id = document.getElementById('name1').value;
    $.ajax({
        type: 'post',
        url: 'member.php',
        data: {
            get_option:val, id:lead_id
        },
        success: function (val) {
            document.getElementById("residents_breakdown").innerHTML=val;
            document.getElementById("coor_hidden").innerHTML='<input  value="'+leader_id+'" type="text" id="lead_ids"  class="hidden form-control">';
                document.getElementById("lead_hidden").innerHTML='<input  value="'+coor_id+'" type="text" id="name1"  class="hidden form-control">';
            document.getElementById("position").innerHTML='<div style="background-color:#708090;padding:15px;color:#ffffff">Member List<button class="btn btn-success" id="BackLeader" style="float:right;"><i class="fa fa-arrow-left"><i></div>';
            document.getElementById("input_name").innerHTML='<input type="text" onchange="add_list_member(this.value);" id="name_members" class="form-control">';
            document.getElementById("qr_code").innerHTML='<button type="button" class="btn btn-dark"><i class="fa fa-qrcode"></i></button>';
        }
    });
}

// coordinator add Views
function add_list_coordinator(val){
    
    $.ajax({
        type: 'post', 
        url: 'view_add_coordinator.php',
        data: {
            get_option:val, brgy_id: <?php echo $brgy_id?>
        },
        success: function (val) {
            document.getElementById("names").innerHTML=val; 
        }
    });
}
// leader add Modal
function add_list_leader(val){
    var id = document.getElementById("name1").value;
    $.ajax({
        type: 'post',
        url: 'view_add_leader.php',
        data: {
            get_option:val, brgy_id: <?php echo $brgy_id?>
        },
        success: function (val) {
            document.getElementById("names").innerHTML=val;
            // console.log(id);
            
        }
    });
}

// leader add views
function add_list_member(val){
    var coor_ids = document.getElementById("name1").value;
    var lead_ids = document.getElementById("lead_ids").value;
    $.ajax({
        type: 'post',
        url: 'view_add_member.php',
        data: {
            get_option:val, brgy_id: <?php echo $brgy_id?>
        },
        success: function (val) {
            document.getElementById("names").innerHTML=val;
            // console.log(id);
            
        }
    });
}

function qr_code(val){
    $(document).on('click','#qr_coor', function(){
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form

        $.ajax({
            type:'post',
            url: 'qr_coor.php',
            data: {
                id:<?php echo $brgy_id;?>, get_option:val
            },
            success:function(val){
                document.getElementById("residents_breakdown").innerHTML=val;
            }
        })
    })
    
}


function viewUpdate(){
    $(document).on('click', '#viewUpdate', function(){
        var id=$(this).attr('viewUpdate-id');
        $.ajax({
            type: 'post' ,
            url: 'viewUpdate.php' ,
            data: {id: id},
            success: function(val){
                document.getElementById('viewNameCoor').innerHTML=val;
            }
        })
    })

    
}

// arrow back coordinator

function backCoor(){
    $(document).on('click', '#BackCoordinator', function(){
        residents_breakdown();
    })
}
function backLead(){
    $(document).on('click', '#BackLeader', function(){
        leads();
    })
}


</script>