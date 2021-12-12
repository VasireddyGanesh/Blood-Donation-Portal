<?php
require_once 'init.php';

if(isset($_GET['hash']))
{
  $hash =$mailgunOptIn->validateHash(MAILGUN_SECRET,$GET['hash']);
  if($hash)
  {
    $list =$hash['mailingLIst'];
    $email=$hash['reciepentAddress'];

    $mailgun->put('lists/' . MAILGUN_LIST . '/members' .$email,[
      'subscribed'  =>'yes'
      ]);
      $mailgun->sendMessage(MAILGUN_DOMAIN,[
         'from'  =>'noreply@phpacademy.org',
         'to'    =>$email,
         'subject'=>'you have just subscribed',
         'text'   =>'thanks for confirming you are now subscribed'
      ]);
      header('Location: ./');
  }
}

 ?>
