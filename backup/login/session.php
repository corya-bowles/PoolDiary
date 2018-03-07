<?php
// Connection to server
$connection = mysql_connect("localhost", "spujet_pooldiary", "CAB:pool");
// Select database
$db = mysql_select_db("spujet_pooldiary", $connection);
session_start(); // Starting session
$user_check=$_SESSION['login_user']; // Storing Session
// SQRY grabs user information
$ses_sql=mysql_query("select * from User where Email='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['Email'];
$avatar_path =$row['AvatarPath'];
if(!isset($login_session)){
mysql_close($connection); // Close connection
header('Location: landing.php'); // Sends user back to home page
}
?>