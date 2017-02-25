
<?php
    
    
    
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
    echo 'starting';
        $time_stamp=" time sta";
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
echo $time_stamp;
return $time_stamp;
    }
    
function get_q_count(){
    
        $ctr==0;
        $conn = get_connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}

$sql = "select COUNT(*) AS CTR FROM queue";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    if($row = $result->fetch_assoc()) {
        $ctr=$row["CTR"];
    }
} else {
    echo "0 results";
}
    

    

$conn->close();
echo $ctr;
return $ctr;
    }
    
 function get_q_all(){
    
        $ctr==0;
        $conn = get_connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}

$sql = "select q_id,UTAID,email FROM queue";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $one_row= ' <tr>
    <td>'. $row["q_id"].'</td>
    <td>'. $row["UTAID"].'</td>   
    <td>'. $row["email"].'</td>
    <td>To be determined by machine</td>
  </tr>';
        echo $one_row;
    }
} else {
    echo "0 results";
}
    

    

$conn->close();
echo $ctr;
return $ctr;
    }
//get_server_timestamp();

  if(isset($_POST['submit'])) {
    // form submitted, now we can look at the data that came through
    // the value inside the brackets comes from the name attribute of the input field. (just like submit above)
    $netid = $_POST['nid'];

    // Now you can do whatever with this variable.
}
else{
    echo 'null pointer';
}
$conn = get_connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM info WHERE NETID='".$netid."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo "NETID_t: " . $row["NETID"]. " ,  Name: " . $row["Firstname"]. " " . $row["Lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();


?> 


<!DOCTYPE html>
<html>
<head>
    <title>Show Waitlist</title>
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
</style>
</head>
<body>

<table style="width:80%">
  <tr>
    <th>Number</th>
    <th>UTAID</th> 
    <th>Signed In</th>
    <th>Expected Wait</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Hayder MA</td>
    <td>1:00 PM</td>
    <td>1 Hour</td>
  </tr>
  <?php
 // for ($c=0; $c< get_q_count();$c++){
 get_q_all();
  
  ?>
 
 
 
</table>

<p>Try to change the padding to 5px.</p>

</body>
</html>
