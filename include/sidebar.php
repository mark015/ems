<?php
    include('include/config.php');
?>

<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
    
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="index.php">
                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Barangay</span>
                        </a>
                        <ul class="nav nav-children">
                            
                            <?php
                                $query_brgy = "SELECT * FROM `brgy`";
                                $result_brgy = mysqli_query($conn, $query_brgy);
                                if (mysqli_num_rows($result_brgy) > 0) {
                                    while ($row_brgy = mysqli_fetch_array($result_brgy)) {
                                ?>
                                <li>
                                    <a href="brgy.php?id=<?php echo $row_brgy['id'];?>">
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
                    </li>

                    
                    
                   
        
                </ul>
            </nav>

  
        </div>

    </div>

</aside>
<!-- end: sidebar -->