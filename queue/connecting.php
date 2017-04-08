<?php 
	class connecting {
		var $name;
            
                function get_connection(){
                    $servername = "localhost";
                    $username = "root";
                    $password = "tech1933";
                    $dbname = "student";

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

            $sql = "select UTAID  AS UID FROM users WHERE UTAID ='".$UTAID."'";
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
		
          
          
          
	}
        
        
        
?>
