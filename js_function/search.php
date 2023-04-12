<script>
    function searchCoor(event){
        const searchTerm = event.target.value;
        // Perform search using searchTerm
        console.log(searchTerm);
            $.ajax({
                type: 'post',
                url: 'searchCoor.php',
                data:{searchCoorVal:searchTerm, brgyId: <?php echo $brgy_id ?>},
                success: function(val){
                    document.getElementById("residents_breakdown").innerHTML=val;
                }
            });
    }
    function searchLead(event){
        const searchTerm = event.target.value;
        var coorId = $('#name1').val();
        
            $.ajax({
                type: 'post',
                url: 'searchLead.php',
                data:{searchLeaderVal:searchTerm, brgyId: <?php echo $brgy_id ?>, coorId:coorId},
                success: function(val){
                    document.getElementById("residents_breakdown").innerHTML=val;
                }
            });
    }

    function searchMem(event){
        const searchTerm = event.target.value;
        var leadId = $('#lead_ids').val();
        // console.log(searchTerm);
            $.ajax({
                type: 'post',
                url: 'searchMem.php',
                data:{
                    searchMemberVal:searchTerm,
                    brgyId: <?php echo $brgy_id; ?>,
                    leadId:leadId
                },
                success: function(val){
                    document.getElementById("residents_breakdown").innerHTML=val;
                }
            });
    }
</script>