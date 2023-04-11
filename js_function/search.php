<script>
    function searchCoor(){
        $(document).keydown('#searchCoor', function(){
            var searchCoorVal = $('#searchCoor').val();
            $.ajax({
                type: 'post',
                url: 'searchCoor.php',
                data:{searchCoorVal:searchCoorVal, brgyId: <?php echo $brgy_id;?>},
                success: function(val){
                    document.getElementById("residents_breakdown").innerHTML=val;
                }
            });
        })
    }
    function searchLead(){
        $('#searchLeader').keyup(function(){
            var searchLeaderVal = $('#searchLeader').val();
            // console.log(searchLeaderVal);
            // $.ajax({
            //     type: 'post',
            //     url: '',
            //     data:{searchLeaderVal:searchLeaderVal},
            //     success: function(val){
            //         document.getElementById("residents_breakdown").innerHTML=val;
            //     }
            // });
        })
    }
</script>