<?php

$EmailTo = "email@example.com";
$Name = Trim(stripslashes($_POST['Name'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Subject = Trim(stripslashes($_POST['Subject']));
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/?page=error\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= $Message;

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$Email>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact_sent.php\">";
}
else{
  echo "<h2>Error!</h2> No mail server was found on this server. As a result, your message has not been sent. 
  You may email me at " . $EmailTo . " instead if you like.</h3>";
}
?>