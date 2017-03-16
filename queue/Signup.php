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

<?php
 /*
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as $v){
echo "I like " . $v. "<br>";
}
$x=false;
if($x){
    echo 'x is true';
}
elseif (!$x){
    echo 'x is false';
}*/

?> 
<title><?php echo $sv['site_name'];?> - Sign up for waitlist</title>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">FabLab Queue System</h1>
                    <a href="manage.php">Admin Login</a>  <br>
                    <a href="index.php">HOME</a>  <br> <br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> Sign Up
                </div>
                <div class="panel-body">
                    <p>Enter Email and/or Phone number to be notified when you're turn is coming up</p> <br> <br>
                    
                    
                    <form action="Result.php" method="post">
                        UTA ID: <input type="text" name="nid" placeholder="Your UTA ID #">
                        <br> <br>
                        Email :  <input type="text" name="email" placeholder="Email (Optional)">
                        <br> <br>
                        Phone: <input type="text" name="phone" placeholder="Phone# (Optional)">
                        <br> <br>

                        <p>Available Machines (Choose one to use) : </p>
                        <?php 
                        $select = new connecting();
                        $select->machine_selector();
                        ?>
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
