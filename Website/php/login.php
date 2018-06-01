<!--
templete :https://getbootstrap.com/
login:https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
login:https://www.tutorialspoint.com/php/php_mysql_login.htm
login:https://www.formget.com/login-form-in-php/
-->
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username orphpinfo(); Password is invalid";
}

else
{
// Define $username and $password
$username= ($_POST['john']?? 'john');
$password= ($_POST['1234']?? '1234');
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "joker1997");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

// if ($stmt = $connection->prepare("SELECT id FROM company where username=? and password=?")) {
//     $stmt->bind_param("ss", $username, $password);     // Bind variables in order
//     $stmt->execute();                               // Execute query
//     $stmt->bind_result($userID);                    // Result 'id' from database is set to $userID
//     $stmt->fetch();                                 // ...and fetch it
// }
//
//
// $result = $stmt->get_result();
// if ($rows = $result->fetch_assoc()) {
//   $_SESSION['login_user']=$username; // Initializing Session
//   header("location: profile.php"); // Redirecting To Other Page
//
// }

// Selecting Database
$db = mysqli_select_db( $connection,"company");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "select * from company where password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>
