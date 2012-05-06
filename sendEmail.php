<?php
	
	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	

	$site_owners_email = 'test@test.com'; // Replace this with your own email address
	$site_owners_name = 'Test Name'; // replace with your name
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";	
	}
	
	if (!$error) {
		
		$to = $site_owners_email;
		$subject = "Spot the Difference Contest Entry";
		$body = "Email: $email\n";
		$headers .= 'From: ' . $email . "\r\n";
		mail($to, $subject, $body, $headers);
		
		echo "<li class='success'> Success!  Your email address was entered to win. </li>";
		
	} # end if no error
	else {

		$response = (isset($error['name'])) ? "<li>" . $error['name'] . "</li> \n" : null;
		$response .= (isset($error['email'])) ? "<li>" . $error['email'] . "</li> \n" : null;
		$response .= (isset($error['comments'])) ? "<li>" . $error['comments'] . "</li>" : null;
		
		echo $response;
	} # end if there was an error sending

?>