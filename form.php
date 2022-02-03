<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = $_POST['first_name'];
	$last = $_POST['last_name'];
	$email  = $_POST['email'];
	$sub = $_POST['subject'];
	$message = $_POST['message'];
	echo "SUCCESS!";



include('smtp\PHPMailerAutoload.php');
$html='name =' .$name.'<br> subject = '.$sub.'  <br>  email  = '.$email.'    <br>  message ='. $message.'' ;
// echo smtp_mailer('ritik.gupta@bonamisoftware.com','subject',$html);
// function smtp_mailer($to,$subject, $msg){
    $mail = new PHPMailer(); 
    // $mail->SMTPDebug  = 3;
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "Sheeshpalkotwal@gmail.com";
    $mail->Password = "KOTWAL8475819408sk";
    $mail->SetFrom("sheeshpalkotwal@gmail.com");
    $mail->Subject = 'New user';
    $mail->Body =$html;
    $mail->AddAddress($email);
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->send()){
        header("location:index.html");
    }
    else{
        echo 'sned';
    }
};

?>