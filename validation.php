<?php
/*=============================================================*/
#### How to Validate Form with PHP - Server Side Validation ####
#### Author	: 	Arpan Das						####
/*=============================================================*/
 
$error = 0; // Initialize error as blank
$email_error = "";
$fullname_error ="";
$password_error ="";
$cpassword_error = "";
 
if (isset($_POST['daftar'])) { // check if the form is submitted
	#### removing extra white spaces & escaping harmful characters ####
	$email				= $_POST['email'];
	$name				= trim($_POST['name']);
	$fullname 			= $_POST['name'];
	$password 			= $_POST['password'];
	$cpassword 			= $_POST['cpassword'];
 
	#### start validating input data ####
	#####################################
 	# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // you can also use regex to do same
			$error = 1;
			$email_error .= '<p class="text-danger">Email is not valid</p>';
		}

	# Validate Fullname #
		// if its not alpha numeric, throw error
		if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        	$error = 1;
        	$fullname_error .= '<p class="text-danger">Full name do not contain number and special characters</p>';
    	}
 
	# Validate Password #
		// if first_name is not 3-20 characters long, throw error
		if (strlen($password) < 6 OR strlen($password) > 20) {
			$error = 1;
			$password_error .= '<p class="text-danger">Password at least contains 6 characters and  maximum 20 characters</p>';
		}
 
	# Validate Confirm Password #
		// if first_name is not 3-20 characters long, throw error
		if ($cpassword != $password) {
			$error = 1;
			$cpassword_error .= '<p class="text-danger">Password is unmatched</p>';
		}
 }
	#### end validating input data ####
	#####################################
?>