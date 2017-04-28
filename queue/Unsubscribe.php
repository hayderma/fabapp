<?php include("connecting.php"); ?> 

<?php
 $encr_email= $_GET[email];
  
 $co = new connecting();
 $conn= $co->get_connection();

      
 $decrypted_email = $co->_crypt($encr_email, 'd' );
 
 $sql= 'UPDATE queue SET status ="Cancelled" WHERE email ="'.$decrypted_email.'"';
        
 if ($conn->query($sql) === TRUE) {
    echo '<script>'
     . 'alert("You have successfully cancelled your ticket and removed from waiting list, click OK to close window");'
            . 'window.close();'
            . '</script>';
       
} 
else {
     echo '<script>'
     . 'alert("Error while attempting to cancel ticket, click OK to close window");'
            . 'window.close();'
             . '</script>';
}     
        
        
        
        
        
 
        
?>

<title>Remove From FabLab Waitlist</title>

