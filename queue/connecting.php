<?php 
	class connecting {
		var $name;
            
                function get_connection(){
                    $servername = "localhost";
                    $username = "root";
                    $password = "tech1933";
                    $dbname = "fabapp";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    return $conn;
                    }
                    
                function validate_user($UTAID){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $sql = "select operator  AS UID FROM users WHERE operator ='".$UTAID."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $id_num=$row["UID"];
                if(strcmp($id_num, $UTAID)==0){
                    $res=true;
                }
             }
        } 
     
        $conn->close();
        
        return $res;
    }
    
    
    
       function validate_admin($user,$pass){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $sql = "select user,pass  FROM admins WHERE user ='".$user."' AND pass ='".$pass."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $res=true;
             }
        } 
     
        $conn->close();
        
        return $res;
    }
    
    
         function ticket_exists_already($ticket_number){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $sql = "select ticket_num FROM queue WHERE ticket_num ='".$ticket_number."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $t_num=$row["ticket_num"];
                if(strcmp($t_num, $ticket_number)==0){
                    $res=true;
                }
             }
        } 
     
        $conn->close();
        
        return $res;
    }
    
    
    //get max q_id from table
    
          function get_q_max(){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $q_max=0;
            $sql = "select MAX(q_id) as M from queue";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $q_max=$row["M"];
                
             }
        } 
     
        $conn->close();
        
        return $q_max;
    }
    
      function generate_ticket($machine_type){
                    $dash='-';
                   $conn = $this->get_connection();
                      if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                return;
                    }
                $q_max= $this->get_q_max() + 1;
                $ticket_num = "$machine_type".$dash."".$q_max."";
                return $ticket_num;
          }
                    
                    
          function machine_selector(){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            
            $sql = "SELECT UPPER( LEFT(dg_name , 3)) AS dg_name,dg_desc  FROM device_group; ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output machine names to selector in HTML
                echo '<select name="machine_select">'; 
  

                while($row = $result->fetch_assoc()) {
                   $one_option='<option value='.$row["dg_name"].'>'.$row["dg_desc"].'</option>'; 
                   echo $one_option;
               
                
             }
             echo '</select>'; 
        } 
     
        $conn->close();
        
        
    }   
    
    
    function device_selector(){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            
            $sql = "SELECT device_desc,d_id  FROM devices; ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output machine names to selector in HTML
                echo '<select name="device_select">'; 
  

                while($row = $result->fetch_assoc()) {
                   $one_option='<option value='.$row["d_id"].'>'.$row["device_desc"].'</option>'; 
                   echo $one_option;
               
                
             }
             echo '</select>'; 
        } 
     
        $conn->close();
        
        
    }  
    
    
    
      function device_name($id){
    
                    
                    
                     $conn = $this->get_connection();
                     
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            
            $sql = "SELECT device_desc FROM devices WHERE d_id ='".$id."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output machine names to selector in HTML
                if($row = $result->fetch_assoc()) {
                   $name= $row["device_desc"];
 
             }
            
        } 
     
        $conn->close();
        return $name;
        
        
    }
    
    
        function material_selector(){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            
            $sql = "SELECT m_name AS name FROM materials; ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output machine names to selector in HTML
                echo '<select name="material_select">'; 
  

                while($row = $result->fetch_assoc()) {
                    $name =$row["name"];
                   $one_option='<option value='.$name.'>'.$name.'</option>'; 
                   echo $one_option;
               
                
             }
             echo '</select>'; 
        } 
     
        $conn->close();
        
        
    }  
    
    
    function minute_selector(){
        
        
                        echo '<select name="minute_select">'; 
                         for ($i=0; $i<=59; $i++){
                            echo "<option value='".$i."'>" . $i ."</option>";
                            }
                            echo '</select>';
    }
    
    
    function hour_selector(){
        
        
                    echo '<select name="hour_select">'; 
                         for ($i=0; $i<=12; $i++){
                            echo "<option value='".$i."'>" . $i ."</option>";
                            }
                            echo '</select>';
    }
    
      function second_selector(){
        
        
                    echo '<select name="second_select">'; 
                         for ($i=0; $i<=59; $i++){
                            echo "<option value='".$i."'>" . $i ."</option>";
                            }
                            echo '</select>';
    }
    
     function color_selector($material){
    
                    
                    
                     $conn = $this->get_connection();
                     $res=false;
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            
            $sql = "SELECT color_hex AS color FROM materials WHERE m_name=".$material." ; ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output machine names to selector in HTML
                echo '<select name="machine_select">'; 
  

                while($row = $result->fetch_assoc()) {
                   
                   $color = $row["color"];
                   if ($color == NULL){
                       $color ='No Color Defined';
                   }
                   $one_option='<option value='.$color.'>'.$color.'</option>'; 
                   echo $one_option;
               
                
             }
             echo '</select>'; 
        } 
     
        $conn->close();
        
        
        
    }
    
            function get_email($ticket){
    
                    
                    
                     $conn = $this->get_connection();
                     
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $sql = "select email FROM queue WHERE ticket_num ='".$ticket."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $email_addr=$row["email"];
               
             }
        } 
     
        $conn->close();
        
        return $email_addr;
    }
    
    
     function get_phone($ticket){
    
                    
                    
                     $conn = $this->get_connection();
                     
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $sql = "select phone FROM queue WHERE ticket_num ='".$ticket."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $phone_num=$row["phone"];
               
             }
        } 
     
        $conn->close();
        
        return $phone_num;
    }
    
      function get_q_id($ticket){
    
                    
                    
                     $conn = $this->get_connection();
                     
                    // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            return;
            }

            $sql = "select q_id FROM queue WHERE ticket_num ='".$ticket."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) {
                $queue_id=$row['q_id'];
               
             }
        } 
     
        $conn->close();
        
        return $queue_id;
    }
     
	}
        
        
        
?>