<?php
include("connecting.php");

   if(isset($_POST['submit'])) {
    // form submitted, now we can look at the data that came through
    // the value inside the brackets comes from the name attribute of the input field. (just like submit above)
    $user_id = $_POST['uid'];
    $password = $_POST['pass'];
    $select = new connecting();
    
    if ($select->validate_admin($user_id, $password)){
        
        header("Location: manage.php"); /* Redirect browser */
        exit();
        
    }

    elseif ( ! $select->validate_admin($user_id, $password)) {
        echo 'Invalid Login';
    
}
    
 

    // Now you can do whatever with this variable.
    
  
}


?>