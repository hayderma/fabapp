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

$sql = "select status,ticket_num,q_start FROM queue WHERE status ='Not Activated' OR status ='Activated'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $one_row= ' <tr>
    <td>'. $row["ticket_num"].'</td> 
    <td>'. $row["status"].'</td>
    <td>'. $row["q_start"].'</td>
    <td>To be determined by machine</td>
  </tr>';
        echo $one_row;
    }
} else {
    echo "0 results";
}
 

 
    

$conn->close();
//echo $ctr;f
//return $ctr;
    }



?> 

<title> Screen Waitlist</title>
<script> 
setTimeout(function(){
   window.location.reload(1);
}, 10000);

</script>

<div id="page-wrapper">
    <div class="row">
       
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="font-size:120%">
                    <i class="fa fa-ticket fa-fw"></i> Current Queue
                </div>
                <div class="panel-body" style="font-size:120%">
                    <table class="table table-striped table-bordered table-hover">
                        <tr class="tablerow">
                            <th>Ticket Number</th> 
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


