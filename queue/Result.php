
<?php
    
     if(isset($_POST['submit'])) {
    // form submitted, now we can look at the data that came through
    // the value inside the brackets comes from the name attribute of the input field. (just like submit above)
    $netid = $_POST['nid'];

    // Now you can do whatever with this variable.
}
else{
    echo 'null pointer';
}

    
function get_connection(){
  $servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
return $conn;
    }
    
function get_server_timestamp(){
    
        $time_stamp="";
        $conn = get_connection();
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
    
function insert_q($id){
    
        
        $conn = get_connection();
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
ca_id
)
VALUES (
NULL , 1, '.$id.', "code", "string", "'. get_server_timestamp().'" , "string", "myemail" , "8179999999" , 1
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
 
  insert_q($netid)
  
  ?>
 
 
 
</table>



</body>
</html>
