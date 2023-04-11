<script>
    function add_coordinator(){
        $(document).on('click','#add_coor',function(){
            var id = $(this).attr('add-coor');
            $.ajax({
                url:'add_coordinator.php',
                method: 'post',
                data: {id:id},
                dataType:'JSON',
                success: function(data){
                    Swal.fire(
                        "",
                        "Coordinator has been Added!",
                        "success"
                    )
                    // document.getElementById('name').value='';
                    residents_breakdown();
                    
                }
            })
        })
        
    }
    function add_leader(){
        $(document).on('click','#add_lead',function(){
            var ids = $(this).attr('add-lead');
            var coor_id = document.getElementById('name1').value;
            
            $.ajax({
                url:'add_leader.php',
                method: 'post',
                data: {id:ids, coor_id:coor_id},
                dataType:'JSON',
                success: function(data){
                    Swal.fire(
                        "",
                        "Leader has been added!",
                        "success"
                    )
			        leads();
                }
            })
        })
        
    }
    function add_member(){
        $(document).on('click','#add_member',function(){
            var ids = $(this).attr('add-member');
            var coor_id = document.getElementById('name1').value;
            var lead_id = document.getElementById('lead_ids').value;
            console.log(ids);
            console.log(coor_id);
            console.log(lead_id);
            $.ajax({
                url:'add_member.php',
                method: 'post',
                data: {id:ids, coor_id:coor_id, lead_id: lead_id},
                dataType:'JSON',
                success: function(data){
                    Swal.fire(
                        "",
                        "Member has been added!",
                        "success"
                    )
			        mem();
                }
            })
        })
        
    }

    
</script>