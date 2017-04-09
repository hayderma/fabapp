<?php

/*

The package that I used was PHPMailer

*/
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require ('PHPMailer/PHPMailerAutoload.php');
require ('PHPMailer/class.phpmailer.php');
include("connecting.php");

    

 

if (isset($_POST['ticket_num'])) {
        $co = new connecting();
        $tick=$_POST['ticket_num'];
        $phone = $co->get_phone($tick);
        $email = $co->get_email($tick);
        $title= "Service Available";
        $msg = "Sir/Mam: \r\n \r\nThe Service which you have signed up for is now available for use,"
                . "head over to FabLab and ask a staff member to initiate your service for you.\r\n"
                . "Your Ticket Number is: ".$tick." \r\n \r\nUTA FabLab Queue System";
        send_email($email,$phone,$title, $msg);
        
        
}
//$phone="8327945660";




function send_email($e_addr,$phone,$title,$msg){

$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;
$m->Host = 'smtp.gmail.com';
$m->Username = 'fablaboo2014@gmail.com'; //email I made for Fablab
$m->Password = 'FabPassword'; //Password I made for Fablab
$m->SMTPSecure = 'ssl';
$m->Port = 465;//gmail port

$m->From = 'fablaboo2014@gmail.com';
$m->FromName = 'FABLAB';


//$m->From='fablaboo2014@gmail.com';
//You can use as many addAddress's as you want. This is will send the email to various places
$m->addAddress($e_addr);

$m->addAddress($phone.'@tmomail.net');
$m->addAddress($phone.'@vtext.comt');
$m->addAddress($phone.'@tmomail.net');
  
$m->addAddress($phone.'@messaging.sprintpcs.com');
$m->addAddress($phone.'@vmobl.com');
$m->addAddress($phone.'@txt.att.net');
$m->addAddress($phone.'@msg.fi.google.com');

$m->isHTML(false);


/*
For messaging there needs to be a way to loop through all of the major carriers
*/

//$m->addAddress('8327945660@txt.att.net','Kevin Childs'); //my real number

$m->Subject = $title;
$m->Body = $msg;


if(!$m->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $m->ErrorInfo;
 } else {
    echo 'Message has been sent';
}

}

//send_email("8327945660@txt.att.net","FabLab", "Finally got that done!!");


?>