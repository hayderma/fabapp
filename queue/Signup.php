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
            <a href="Admin_Login.php">Admin Login</a>  <br>
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
                        <br> <br><br>

                       
                        <?php 
                        //$mail = new Mailer();
                          //  $mail->send_email("8327945660@txt.att.net","FabLab", "Finally got that done!!");
                        
                        $select = new connecting(); //creating object to access class where function is
                        
                        echo 'Service :&nbsp;';
                        $select->machine_selector(); //drop down list to select machine
                    
                        ?>
                        <br><br>
                         <?php
                         
                       
                      
                            
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
