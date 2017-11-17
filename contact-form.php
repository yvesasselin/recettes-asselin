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
	
	}
}
?>
        


        <style>
			.errors p,
			.success p {
				padding: 15px;
			}
        </style>

	<section class="section" id="contact-form">
		<div class="container">
			<div class="row">
				<div class="large-12">
					<?php if ( ! empty( $errors ) ) : ?>
					<div class="errors">
                    <p class="bg-danger"><?php echo implode( '</p><p class="bg-danger">', $errors ); ?></p>
					</div>
					<?php elseif ( $sent ) : ?>
                    
					<div class="success">
						<p class="bg-success">Votre message à été envoyer. Merci.</p>
					</div>
					<?php endif; ?>
					<form role="form" method="post" action="../../contact-form.php">
						<div class="form-group">
							<label for="name" class="§">Nom</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="e.g. John Doe"
								   value="<?php echo isset( $fields['name'] ) ? _e( $fields['name'] ) : '' ?>">
						</div>
						<div class="form-group">
							<label for="email" class="control-label">Courriel</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="e.g. example@domain.com"
								  value="<?php echo isset( $fields['email'] ) ? _e( $fields['email'] ) : '' ?>">
						</div>
						<div class="form-group">
							<label for="message" class="control-label">Message</label>
							<textarea class="form-control" rows="4" name="message"><?php echo isset( $fields['message'] ) ? _e( $fields['message'] ) : '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="human" class="control-label">5 + 2 = ?</label>
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
						</div>
						<div class="form-group">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>