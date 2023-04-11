<script>

//Delete Coordinator
function delete_coordinator(){
    $(document).on('click', '#delete_coor',function(){
        event.preventDefault();
        var coor_id = $(this).attr('delete_coor');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: 'delete_coor.php',
                    data:{
                        coor_id:coor_id
                    }, 
                    success: function(){
                        Swal.fire(
                            'Deleted!',
                            'Successfully Deleted',
                            'success'
                        )
                        residents_breakdown();
                    }

                })
                
            }else{
                Swal.fire(
                '',
                'Your file has been Safe.',
                'error'
                )
            }
        })
    })
}
//End delete coordinator function

//Delete Leader function
function delete_leader(){
    $(document).on('click','#delete_lead', function(){
        lead_id = $(this).attr('delete-lead');
       Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
       }).then(result => {
            if(result.isConfirmed){
                $.ajax({
                    type:'post',
                    url: 'delete_leader.php',
                    data: {
                        lead_id:lead_id
                    },
                    success: function(){
                        Swal.fire(
                            "",
                            "Remove Leader Successfully",
                            "success"
                        )
                        leads();
                    }
                })
            }else{
                Swal.fire(
                    "",
                    "Your File has been safe",
                    "error"
                )
            }
       })

    })
}
//end delete leader function

//delete member function 
function delete_member(){
    $(document).on("click","#delete_mem" , function(){
        var mem_id = $(this).attr('delete-mem');
        Swal.fire({
            title: 'Are you sure!',
            text: "You won't be able to revert this!",
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if(result.isConfirmed){
                $.ajax({
                    type: 'post',
                    url: 'delete_member.php',
                    data: {mem_id: mem_id},
                    success:function(){
                        Swal.fire(
                            "",
                            "Member has been remove!",
                            "success"
                        )
                        mem();   
                    }
                })
                
            }else{
                Swal.fire(
                    "",
                    "Cancel",
                    "error"
                )
            }
        })

    });
}

</script>