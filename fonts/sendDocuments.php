<?php 
require_once 'sqlConfig.php';
require_once "class.phpmailer.php";
require_once "class.smtp.php";
$documentDownloaded = isset($_POST['documentName']) ? $_POST['documentName']:"Compumatrice" ;
$userEmail = $_POST['email'];
$userName = $_POST['name'];


//echo $userEmail ."ssssss : ".$documentDownloaded;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.live.com";
$mail->SMTPAuth= true;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->isHTML(true);
	 
$mail->Username = "support@compumatrice.com" ;//"patientportalcm@gmail.com";
$mail->Password = "15alov7r27##";//"aA@1234567";
$mail->SetFrom('support@compumatrice.com','Compumatrice Pvt.');
$mail->Body = "please go through the document";
$mail->Subject = $documentDownloaded." Document";
$mail->AddAddress($userEmail);
$mail->addAttachment('https://www.compumatrice.com/startupCM/documents/'.$documentDownloaded.'.pdf');
 if(!$mail->Send()) {
	 echo "Mail Not send contact to Admin";
	 echo $mail->ErrorInfo;
 } 
$sql = "INSERT INTO `userDetails`(`userEmail`,`documentDownloaded`,`userName`) 
VALUES ('".$userEmail."','".$documentDownloaded."','".$userName."')";
$result =sqlStatement($sql);

?>

  <!---  <script type="text/javascript">
				//alert('Document send on your email address');
				//document.getElementById('submit').innerHTML='Thank you form is submitted.';
				 document.getElementById('myModal').modal('hide');
				 document.getElementById('myModal').modal('show');
   				 document.location = "index.html";
				 
     </script> ---!>

