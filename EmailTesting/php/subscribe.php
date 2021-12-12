<?php

require_once 'init.php';
if(isset($_POSTTT['name'],$_POST['email']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $validate =$mailgunValidate->get('address/validate',['address'=>$email])->http_response_body;
  if($validate->is_valid)
  {
    $hash=$mailgunOptIn->generateHas(MAILGUN_LIST,MAILGUN_SECRET,$EMAIL);
    $mailgun->sendMessage(MAILGUN_DOMAIN,[
      'from' =>'noreply@phpacademy.org',
      'to' =>$email,
      'subject' =>'please confirm your subscription',
      'html'  =>"
             Hello{$name},<br><br>
             you signed up to our mailing list.please confirm below.<br><br>
             http-site link?hash ={$hash}"
    ]);
    $mailgun->post('lists/' .MAILGUN_LIST . '/members',[
      'name'  =>$name,
      'address'  =>$email,
      'subscribed' =>'no'
    ]);
    header('Location: ./');
  }
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Subscribe mailing list
    </title>
    <link rel="stylesheet" href="css/global.css">
  </head>
  <body>
    <div class="container">
      <form  action="subscribe.php" method="post">
        <div class="field">
          <label>
                 Name
                 <input type="text" name="name" autocomplete="off">
          </label>

        </div>
        <div class="field">
          <label>
            Email
            <input type="text" name="email" autocomplete="off">
          </label>

        </div>

      </form>

    </div>
  </body>
</html>
