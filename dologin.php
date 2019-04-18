<?php
$email = $_POST['uid'];
$upass = $_POST['upass'];

include("../../sqlfiles/bank_db_connection.php");

$dologin = "select id,pass from users where Email = $email and upass = $upass ";
$result = mysql_query( $dologin );

if($result)
{
 echo "Successfully Logged In";
}
else
{
 echo "Wrong Id Or Password";
}
?>