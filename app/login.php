<?php
require_once 'common-php/dbconfig.php';

if($user->is_loggedin()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['submit']))
{
 $uname = $_POST['txt_uname_email'];
 $upass = $_POST['txt_password'];
  
 if($user->login($uname,$umail,$upass))
 {
  $user->redirect('../landing.php');
 }
 else
 {
  // $error = "Wrong Details !";
    $error = "Wrong Details !";

 } 
}
?>