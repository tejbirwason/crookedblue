<?php

require_once('./MCAPI.class.php');
extract($_POST);

// Get your API key from http://admin.mailchimp.com/account/api/
define('MC_API_KEY', 'd1af3f7ab1fb3b4c1ad57f1f118b62e5-us5');

// Get your list unique id from http://admin.mailchimp.com/lists/
// under settings at the bottom of the page, look for unique id 
define('MC_LIST_ID', 'fa6e0596dc');

// check if email is valid 
if ( isset($email) && validEmail($email) ) {
		
	$api = new MCAPI(MC_API_KEY);
	$listID = MC_LIST_ID;

	if($api->listSubscribe($listID, $email, '') === true) {
		echo 'success';
	}else{
		echo 'subscribed';
	}
	
} else {
	echo 'invalid';
}

function validEmail($email=NULL)
{
	return preg_match( "/^[\d\w\/+!=#|$?%{^&}*`'~-][\d\w\/\.+!=#|$?%{^&}*`'~-]*@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/ix", $email );
}
