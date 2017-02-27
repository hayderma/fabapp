
<?php include("connecting.php"); ?>
<?php
    
     if(isset($_POST['submit'])) {
    // form submitted, now we can look at the data that came through
    // the value inside the brackets comes from the name attribute of the input field. (just like submit above)
    $u_id = $_POST['nid'];
    $ph_num = $_POST['phone'];
    $mach = $_POST['machine_select'];
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
    
function insert_q($id,$machine_t,$e_add,$ph_n){
    
        
        $co = new connecting();
        $conn = $co->get_connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}


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
status
)
VALUES (
NULL , 1, '.$id.', "code", "string", "'. get_server_timestamp().'" , "string", "'.$e_add.'" , "'.$ph_n.'" , 1, "'.$co->generate_ticket($machine_t).'", "Not Activated"
)';

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    

    

$conn->close();


    }
    

//get_server_timestamp();

 


?> 


<!DOCTYPE html>
<html>
    <h2> Result(s): </h2>
<head>
    <title>Result</title>
<style>
  
table, th, td {
    border: 5px solid black;
    border-collapse: collapse;
    text-align:center; 
    vertical-align:middle;
}
th, td {
    padding: 15px;
}
h2{
    text-align:center; 
}
</style>
</head>
<body>
    <a href="index.php">HOME</a>  <br> <br>


 
  <?php
    //creating connecting object 
        $v = new connecting();
        $vali = $v->validate_user($u_id);   
        if($vali && $valid_email){
            insert_q($u_id,$mach,$e_mail,$ph_num);  //insert to queue
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
 
 
 
</table>



</body>
</html>
