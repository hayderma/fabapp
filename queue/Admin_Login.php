<?php
/*
 *   CC BY-NC-AS UTA FabLab 2016-2017
 *   FabApp V 0.9
 */
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php');
$device_array = array();
$_SESSION['type'] = "home";
?>
<?php include("connecting.php"); ?> 


<title> Sign up for service</title>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">FabLab Queue System</h1>
                    
                    <a href="index.php">HOME</a>  <br> <br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> Administrative Login
                </div>
                <div class="panel-body">
                    
                    
                    
                    <form action="Auth_page.php" method="post">
                        <br> <br>
                        Username: <input type="text" name="uid" placeholder="Admin Username">
                        <br> <br>  
                        Password: <input type="password" name="pass" placeholder="Admin Password">
                        <br> <br>
                      
                        
                        <br><br>
                        <input type="submit" name="submit" value="Submit">
                    </form> 
                </div>
            </div>
        </div>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php
//Standard call for dependencies
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/footer.php');
?>
