<?php
require_once 'vendor/autoload.php';
define('MAILGUN__KEY', 'API KEY');
define('MAULGUN_PUBKEY', 'PUBLIC APIKEY');
define('MAILGUN_DOMAIN','KEY');
define('MAILGUN-LIST','KEY');
define('MAILGUN_SECRET','TEXT');

$mailgun =new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate =new Mailgun\Mailgun(MAILGUN_PUBLICKEY);

$MailgunOptIn= $mailgun->OptInHandler();
