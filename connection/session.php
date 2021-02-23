<?php

?>
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connect = mysqli_connect("localhost", "root", "");
// Selecting Database
$userdb = mysqli_select_db($connect,"registration");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
//$user_check='login_session';
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connect, "SELECT username FROM user_detail WHERE username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];

$ses_sql2=mysqli_query($connect, "SELECT *FROM user_data WHERE USERNAME='$user_check' ORDER BY ID DESC");
$row2 = mysqli_fetch_assoc($ses_sql2);
$login_user_name =$row2['NAME'];

$ses_sql3=mysqli_query($connect, "SELECT *FROM user_image WHERE USERNAME='$user_check' ORDER BY ID DESC");
$row3 = mysqli_fetch_array($ses_sql3,MYSQLI_BOTH);

$login_user_image =$row3['IMAGE'];
//if(!isset($login_session))
if(!isset($_SESSION['login_user']))
{
mysql_close($connect); // Closing Connection
header('Location:index.php'); // Redirecting To Home Page
}

?>
