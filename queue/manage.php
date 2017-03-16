<?php
/*
 *   CC BY-NC-AS UTA FabLab 2016-2017
 *   FabApp V 0.9
 */
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php');
$device_array = array();
$_SESSION['type'] = "home";
?>
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
    
        $ctr = 0;
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
    
        $ctr = 0;
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



?> 

<title><?php echo $sv['site_name'];?> Waitlist Management</title>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Queue</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> Queue Status
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr class="tablerow">
                            <th>Number</th>
                            <th>UTAID</th> 
                            <th>Signed In</th>
                            <th>Expected Wait</th>
                        </tr>
 
                        <?php

                        get_q_all();
                        ?>

                    </table>
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
