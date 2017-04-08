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


<title><?php echo $sv['site_name'];?> - Sign up for service</title>

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
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> Sign Up For Service
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

                       
                        <?php 
                        
                        $select = new connecting(); //creating object to access class where function is
                        echo 'Service :&nbsp;';
                        $select->machine_selector(); //drop down list to select machine
                        echo '&nbsp; &nbsp; &nbsp;';
                        echo 'Material:&nbsp;';
                        $select->material_selector();
                       
                     
                       // echo 'Color :&nbsp;';
                        //$select->color_selector();
                        ?>
                        <br><br>
                         <?php
                         echo '<strong>A Staff Member Must Enter the Following Information</strong> <br><br>';
                         echo 'Expected Wait Time <br><br>'; 
                        echo 'Hours : <select name="hour_select">'; 
                         for ($i=0; $i<=12; $i++){
                            echo "<option value='".$i."'>" . $i ."</option>";
                            }
                            echo '</select>'; 
                            echo '&nbsp; &nbsp; Minutes : <select name="minute_select">'; 
                         for ($i=0; $i<=59; $i++){
                            echo "<option value='".$i."'>" . $i ."</option>";
                            }
                            echo '</select>'; 
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
