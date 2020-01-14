<?php require APPROOT . '/views/inc/header.php' ; ?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <?php
                        echo "<pre>";
                        if(isset($_SESSION['productDetail']['errorMessage'])){
                            }else{
                            echo($_SESSION['productDetail']['type'] .' - '.$_SESSION['productDetail']['policyType']); 
                            }                            
                        echo "</pre>";
                    ?>
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    <?php
                        echo "<pre>";
                            var_dump($_SESSION['productDetail']);       
                        echo "</pre>";
                    ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>

