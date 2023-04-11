<script>
    function nonSupp(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/notSupporters.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('nonSupporters').innerHTML=val;
				}
			})
		}

		function supp(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/supporters.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('supporters').innerHTML=val;
				}
			})
		}
		function coordinators(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/coordinators.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('coordinators').innerHTML=val;
				}
			})
		}

		function leaders(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/leaders.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('leaders').innerHTML=val;
				}
			})
		}

		function members(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/members.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('members').innerHTML=val;
				}
			})
		}

		function winningPercent(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/winningPercent.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('WinningPercent').innerHTML=val + " %";
					console.log(val);
				}
			})
		}
		function lossingPercent(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/lossingPercent.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('LossingPercent').innerHTML=val + " %";
					console.log(val);
				}
			})
		}

		function voted(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/voted.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('voted').innerHTML=val + " %";
					console.log(val);
				}
			})
		}

		function notVoted(){
			$.ajax({
				type:'post',
				url:'barangay-dashboard/notVoted.php',
				data:{brgyId: <?php echo $brgy_id;?>},
				success: function(val){
					document.getElementById('notVoted').innerHTML=val + " %";
					console.log(val);
				}
			})
		}
</script>