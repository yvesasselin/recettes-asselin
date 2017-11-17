<?php
//Helper functions. Likely place in external file
function _e( $string ) {
	return htmlentities( $string, ENT_QUOTES, 'UTF-8', false );
}

/* ------------------------------------------------------------------
   STUFF YOU NEED TO CHANGE FOR YOUR SPECIFIC FORM
--------------------------------------------------------------------*/

// Specify the form field names your form will accept
$whitelist = array( 'name', 'email', 'message');

// Set the email address submissions will be sent to
$email_address = 'yvesasselin@videotron.ca';

// Set the subject line for email messages
$subject = 'Email Commentaires';

/* ------------------------------------------------------------------
   END STUFF YOU NEED TO CHANGE FOR YOUR SPECIFIC FORM
--------------------------------------------------------------------*/

// Instantiate variables we'll use
$errors = array();
$fields = array();

// Check for form submission
if ( ! empty( $_POST ) ) {

	// Validate math
	if ( intval( $_POST['human'] ) !== 7 ) {
		$errors[] = 'Your math is suspect.';
	}

	// Validate email address
	if ( ! empty( $_POST['email'] ) && ! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
		$errors[] = 'That is not a valid email address';
	}

	// Perform field whitelisting
	foreach ( $whitelist as $key ) {
		$fields[$key] = $_POST[$key];
	}

	// Validate field data
	foreach ( $fields as $field => $data ) {
		if ( empty( $data ) ) {
			$errors[] = 'Please enter your ' . $field;
		}
	}

	// Check and process
	if ( empty( $errors ) ) {
		$sent = mail( $email_address, $subject, $fields['message'] );
	}
}
?>