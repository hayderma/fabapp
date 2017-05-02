<?php
/*
 *   CC BY-NC-AS UTA FabLab 2016-2017
 *   FabApp V 0.9
 */
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php');



$device_array = array();
$_SESSION['type'] = "home";
?>
<?php include("connecting.php"); 

?>


<?php


    
     if(isset($_POST['submit'])) {
    // form submitted, now we can look at the data that came through
    // the value inside the brackets comes from the name attribute of the input field. (just like submit above)
    $u_id = $_POST['nid'];
    $ph_num = $_POST['phone'];
    $mach = $_POST['machine_select'];
    $material =" "; //$_POST['material_select'];
    $num_hours = 0;//$_POST['hour_select'];
    $num_minutes =0; //$_POST['minute_select'];
    $num_seconds = 0;//$_POST['second_select'];
    $_device_id =  0;//$_POST['device_select'];
    if (strlen($num_hours)==1){
        $num_hours = '0'.$num_hours;
    }
     if (strlen($num_minutes)==1){
        $num_minutes = '0'.$num_minutes;
    }
     if (strlen($num_seconds)==1){
        $num_seconds = '0'.$num_seconds;
    }
    $remaining = $num_hours.":".$num_minutes.":".$num_seconds;
    
    $valid_email=true;
    $e_mail=$_POST['email'];
    if(! "" == trim($_POST['email'])){  //checks if email field is not empty
        
        if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {  //checks if email is not valid
           $valid_email=false;
        }
    }

    // Now you can do whatever with this variable.
    
  
}
else{
    echo 'null pointer';
}



    

    
function get_server_timestamp(){
    
        $time_stamp="";
        $co = new connecting();
        $conn = $co->get_connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}

$sql = "select DATE_FORMAT(NOW(),'%h:%i %p') AS timestamp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    if($row = $result->fetch_assoc()) {
        $time_stamp=$row["timestamp"];
    }
} else {
    echo "0 results";
}
    

    

$conn->close();

return $time_stamp;
    }
   
    
 $req_var=false; //var to store training req. status, it's updated to 0 in the insert_q function if req are not met.
    
function insert_q($id,$machine_t,$e_add,$ph_n,$device_id,$devicename,$waittime,$_material){
    
        
        $co = new connecting();
        $conn = $co->get_connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}

$ticket_number = $co->generate_ticket($machine_t); //variable for ticket number


$status_sucess = "You successfully Signed Up, your Ticket number is ".$ticket_number.".<br> <br> If you provided Email/Phone information, they will be used to notify you when your turn is comping up.<br>Your estimated wait time will be updating automatically on the screen";


// insert item to queue
$sql = 'INSERT INTO queue (
q_id ,
dg_id ,
UTAID ,
CODE ,
created ,
q_start ,
duration ,
email ,
phone ,
ca_id,
ticket_num,
status,
device_used,
wait_countdown,
material
)
VALUES (
NULL , 0, '.$device_id.', '.$id.', "'. $id.'" , "'. get_server_timestamp().'" , "unknown yet", "'.$e_add.'" , "'.$ph_n.'" , 1, "'.$ticket_number.'", "Not Activated", "'.$devicename.'", "'.$waittime.'", "'.$_material.'"
)';

if($co->req_met($id)){
    global $req_var;
    $req_var=true;
    if ($conn->query($sql) === TRUE) {
    echo $status_sucess ;
        /*
        
        $phone = $co->get_phone($ticket_number);
        $email = $co->get_email($ticket_number);
        $title= "Confirmation";
        $msg = "Sir/Mam: \r\nThis Message is to confirm your signup for a FabLab service.\r\nYour "
                . "Ticket Number is: ".$ticket_number."\r\nYour Ticket Number is now in the queue.";
        send_email($phone."@txt.att.net",$title, $msg);*/
} 
else {
    echo "Error While Signing up, Please call a staff member for help. <br> <br> Database Error Message :<br>" . $sql . "<br>" . $conn->error;
}
    
    
}
else {
    global $req_var;
    $req_var=false;  
  echo 'User Training Requirements Not Complete, Signup to Waitlist can not be completed.';
}


    

    

$conn->close();


    }
    

//get_server_timestamp();

 


?> 


<title> Results</title>
 <script>
function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
}

$(document).ready(function(){
    $(document).bind("keydown", disable_f5);    
});
</script> 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Results</h1>
            
            <a href="index.php">Back to Home</a>  <br> <br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> Signup
                    
                </div>
                <div class="panel-body">
                    
                    
    

                 
                  <?php
                    //creating connecting object 
                        $v = new connecting();
                        $vali = $v->validate_user($u_id);   
                        if($vali && $valid_email){
                            insert_q($u_id,$mach,$e_mail,$ph_num,$_device_id,$mach,$remaining,$material);  //insert to queue
                        }
                        else{
                        if (!$vali) {
                            echo 'Invalid User';
                        
                        }
                        if (! $valid_email) {
                            echo 'Invalid Email Address';
                        
                    }
                    }
                  
                  
                  ?>
                </div>
                
                
            </div>
        </div>
        <!-- /.col-lg-8 -->
    </div>
    
       <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> User Training Requirements
                    
                </div>
                <div class="panel-body">
                    
                    
    

                 
                  <?php
                    //creating connecting object 
                  if($req_var){  
                  echo 'Completed';
                  }
                  elseif(!$req_var) {
                  echo 'Not Completed';
                    }
                    
                  
                  
                  ?>
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
