<?php
require_once 'init.php';

if(isset($_POST['subject'],$_POST['body']))
{
  $subject=$_POST['subject'];
  $body=$_POST['body'];

  $mailgun->sendMessage(MAILGUN_DOMAIN,[
    'from'=>'noreply@phpacademy.org',
    'to'  =>MAILGUN_LIST,
    'subject' =>$subject,
    'html' =>"{$body}<br><br> <a href=\"%unsubscribe_url%\">unsubscribe</a> "
  ]);
  header('Location: ./');
}



 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <form class="" action="send.php" method="post">
        <div class="field">
          <label>
              Subject
              <input type="text" name="subjecct" autocomplete="off">
          </label>

        </div>
        <div class="field">
           <label>
              <body>
                <textarea name="body" rows="8"></textarea>
              </body>
           </label>

        </div>
        <input type="submit" class="button" value="send">
      </form>

    </div>

  </body>
</html>
