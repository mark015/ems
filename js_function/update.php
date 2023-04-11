<script>


function name(){
    $.ajax({
        type: 'post',
        url: 'nameData.php',
        data:{brgy_id: <?php echo $brgy_id;?> },
        success: function(val){
        var name = [];
        for (var i in val) {
            name.push(val[i].name);
        }
        $( function() {
            $( "#changeName" ).autocomplete({
                    source: function(request, response) {
                        var results = $.ui.autocomplete.filter(name, request.term);        
                        response(results.slice(0, 10));
                    }
                });
            });
        }
    })
    
}


    function updateCoor(){
        $(document).on('click', '#update', function(){
            var id = $('#inputName').attr('update-id');
            var name = document.getElementById('changeName').value;
            console.log(id + '<br>' + name);
            $.ajax({
                type: 'post',
                url: 'updateCoor.php',
                data:{id: id, name: name},
                success: function(val){
                    Swal.fire(
                            "",
                            "Updated Successfully!",
                            "success"
                        )
                    $('#updateModal').hide();
			        $('#LeaderChangeName').val('');
                    residents_breakdown();
                    // name();
                }

            })
        })
    }
    function updateLeader(){
        $(document).on('click', '#updateLeader', function(){
            var id = $('#updateLeader').attr('updateLeader-id');
            var name = document.getElementById('changeName').value;

            $.ajax({
                type: 'post',
                url: 'updateLeader.php',
                data:{id: id, name: name},
                success: function(val){
                    Swal.fire(
                            "",
                            "Updated Successfully!",
                            "success"
                        )
                    $('#updateModal').hide();
                    
                }

            })
        })
    }



// update leaders 
function leaderUpdateModal(){
	$(document).on('click', '#updateLeader', function(){
		var leaderId = $(this).attr('updateLeader-id');
		var currentRow=$(this).closest("tr");
        var leaderName=currentRow.find("td:eq(0)").text();
		document.getElementById('viewNameLead').innerHTML="<input type='text' class='form form-control hidden' id='inputLeaderUpdates' value='"+leaderId+"'><input type='text' class='form form-control' id='leaderUpdates' value='"+leaderName+"'>"
	})
}
function leaderAutocomplete(){
	$.ajax({
        type: 'post',
        url: 'nameData.php',
        data:{brgy_id: <?php echo $brgy_id;?> },
        success: function(val){
        var name = [];
        for (var i in val) {
            name.push(val[i].name);
        }
        $( function() {
            $( "#LeaderChangeName" ).autocomplete({
                    source: function(request, response) {
                        var results = $.ui.autocomplete.filter(name, request.term);        
                        response(results.slice(0, 10));
                    }
                });
            });
        }
    })
}
function updateleaderButton(){
	$(document).on('click', '#updateLeaderButton', function(){
		var leaderName = document.getElementById('LeaderChangeName').value;
		var leaderId = $('#inputLeaderUpdates').val();
		$.ajax({
			type: 'post',
			url:'updateleader.php',
			data: {brgyId: <?php echo $brgy_id;?>, leaderName: leaderName, leaderId:leaderId},
			success: function(val){
				Swal.fire(
					"",
					"Updated Successfully!",
					"success"
				)
				leads();
				$('#leaderUpdateModal').hide();
				$('#LeaderChangeName').val('');

			}
		})
	})
}
// end update leaders
// Update Members
function membersUpdateModal(){
	$(document).on('click','#viewModalMembers', function(){
        var memberId = $(this).attr('updateMemId-id');
		var currentRow=$(this).closest("tr");
        var memberName=currentRow.find("td:eq(0)").text();
		document.getElementById('viewNameMem').innerHTML="<input type='text' class='form form-control hidden' id='inputMemUpdates' value='"+memberId+"'><input type='text' class='form form-control' id='leaderUpdates' value='"+memberName+"'>";
    })
}
function MemAutocomplete(){
	$.ajax({
        type: 'post',
        url: 'nameData.php',
        data:{brgy_id: <?php echo $brgy_id;?> },
        success: function(val){
        var name = [];
        for (var i in val) {
            name.push(val[i].name);
        }
        $( function() {
            $( "#MemChangeName" ).autocomplete({
                    source: function(request, response) {
                        var results = $.ui.autocomplete.filter(name, request.term);        
                        response(results.slice(0, 10));
                    }
                });
            });
        }
    })
}
function updateMember(){
    $(document).on('click', '#updateMemberButton', function(){
        var memberId = $('#inputMemUpdates').val();
        var memNewName = $('#MemChangeName').val();
        $.ajax({
            type: 'post',
            url: 'updateMember.php',
            data: {memberId:memberId, memNewName: memNewName},
            success: function(val){
                Swal.fire(
					"",
					"Updated Successfully!",
					"success"
				)
                mem(val);
                $('#MemberUpdateModal').hide();
				$('#MemChangeName').val('');

            }
        })
    })
}

</script>