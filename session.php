<?php
   include("../../sqlfiles/bank_db_connection.php");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select Email from Customers where Email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['Email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>