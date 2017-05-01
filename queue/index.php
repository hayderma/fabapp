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
if (isset($_POST['ticket_num'])) {
    $ticket_num = $_POST['ticket_num'];
    if (strcmp($ticket_num, " ") != 0) {
        $co = new connecting();
        $conn = $co->get_connection();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return;
        }
        $sql = 'SELECT status FROM queue WHERE ticket_num="' . $ticket_num . '"';
        $result = $conn->query($sql);
        if ($result->num_rows != 1) {
            die("Error getting status");
            return;
        } else {
            $row = $result->fetch_assoc();
            $status = $row['status'];
            echo '<script type="text/javascript">
                    var cell = document.getElementById("status_' . $ticket_num . '");
                    cell.innerHTML = "' . $status  . '";
                 </script>';
        }
    }
}
    
            
    
function get_server_timestamp(){
    echo 'starting';
        $time_stamp="";
        //creating connecting object
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
echo $time_stamp;
return $time_stamp;
    }
    
function get_q_count(){
    
        $ctr = 0;
        $co = new connecting();
        $conn = $co->get_connection();
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
    
    
       // $ctr = 0;
        $co = new connecting();
        $conn = $co->get_connection();
     
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}
$sql = "select status,ticket_num,q_start,device_used,wait_countdown FROM queue WHERE status ='Not Activated' OR status ='Activated'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $one_row= ' <tr>
    <td>'. $row["ticket_num"].'</td> 
    <td>'. $row["device_used"].'</td>  
    <td id="status_' . $row["ticket_num"] . '">'. $row["status"].'</td>
    <td>'. $row["q_start"].'</td>
    <td>'. $row["wait_countdown"].'</td>
  </tr>';
        echo $one_row;
    }
} else {
    echo "0 results";
}
 
 
    
$conn->close();
    }
?> 

<title> Waitlist</title>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" >Wait List</h1>
            <a href="Signup.php">Signup to waitlist to use a machine</a>  <br> <br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket fa-fw"></i> Queue Status
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr class="tablerow">
                            <th>Ticket Number</th> 
                            <th>Service</th>
                            <th>Ticket Status</th>
                            <th>Signed In</th>
                            <th>Expected Wait</th>
                        </tr>

                        <?php
                        get_q_all(); // gets all queue contents
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
//last line comment
?>