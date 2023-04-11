<header class="page-header">
<nav class="navbar-inverse" style="background-color:#34495e">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
    <?php
                                $query_brgy = "SELECT * FROM `brgy`";
                                $result_brgy = mysqli_query($conn, $query_brgy);
                                if (mysqli_num_rows($result_brgy) > 0) {
                                    while ($row_brgy = mysqli_fetch_array($result_brgy)) {
                                ?>
                                <li>
                                    <a href="brgy-dashboard.php?id=<?php echo $row_brgy['id'];?>">
                                            <?php
                                                echo $row_brgy['brgy'];
                                            ?>
                                    </a>
                                </li>

                            <?php 
                                    }
                                } 
                            ?>
     
    </ul>
  </div>
</nav>

    <div class="right-wrapper pull-right">
        

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        
    </div>

</header>