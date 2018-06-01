<!--
templete :https://getbootstrap.com/
login:https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
login:https://www.tutorialspoint.com/php/php_mysql_login.htm
login:https://www.formget.com/login-form-in-php/
delete:https://stackoverflow.com/questions/14475096/delete-multiple-rows-by-selecting-checkboxes-using-php
delete image:https://stackoverflow.com/questions/27917503/how-to-delete-image-from-database-and-image-folder-in-codeigniter
delete image:https://www.sitepoint.com/community/t/when-delete-image-from-mysql-to-delete-also-from-folder/41106
-->
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../index.php"); // Redirecting To Home Page
}
?>
