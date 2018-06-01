<!--
templete :https://getbootstrap.com/
login:https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
login:https://www.tutorialspoint.com/php/php_mysql_login.htm
login:https://www.formget.com/login-form-in-php/
-->
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "*********");
// Selecting Database
$db = mysqli_select_db($connection, "company" );
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query( $connection, "select username from company where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
