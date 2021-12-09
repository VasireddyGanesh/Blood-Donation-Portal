<?php

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = new Mailgun('YOUR_API_KEY');
$domain = "YOUR_DOMAIN_NAME";
# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'	=> 'Excited User <mailgun@YOUR_DOMAIN_NAME>',
	'to'	=> 'Baz <YOU@YOUR_DOMAIN_NAME>',
	'subject' => 'Hello',
	'text'	=> 'Testing some Mailgun awesomness!'
));

?>