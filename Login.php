<!DOCTYPE html>
<html>
<head>
   <title> FUNDTHAT! </title>

   <link rel="stylesheet" type="text/css" href="css/landingPage.css">
</head>

<body>
<?php 
   if ($_SERVER['REQUEST_METHOD']=='POST'){     
      //retrieve form data
      $error = array();
      
      if (!empty($_POST['Email']))
         $Email = $_POST['Email'];
      else 
         $error[] = "Please enter user name.";
         
      if (!empty($_POST['upass']))
         $upass= sha1($_POST['upass']);
      else 
         $error[] = "Please enter password.";
         
      if(!empty($error)){
         foreach ($error as $msg){
            echo $msg;
            echo '<br>';
         }
      }
      else {
         //connect to db
         include("../../sqlfiles/bank_db_connection.php");
         
         $q = "SELECT * FROM Customers WHERE Email = '$Email'";
         
         $result = $conn->query($q); //execute select
         if ($result->num_rows > 0) {
            if ($result->num_rows == 1){
               //one record found. right case.
               $row = $result->fetch_assoc();
   
               if ($row['upass'] == $upass){
                                    //let user log in
                  //set session variable
                  session_start();
               
                  //set session variables
                  $_SESSION['Email'] = $Email;
                  $_SESSION['First_Name'] = $row['First_Name'];                  
                                 
                     header('LOCATION: accountView.php?email=$Email');
                  
                  }
               else {
                  echo "Either username or password does not match.";
               }     
            }
            else {
               echo "More than one record found with the same user name. DB corrupted.";
            }

         } 
         else {
            echo "User name not found in database.";
         }
      }
   }

?>
   <div id = "container">
   <div class="header">
      <h1>FUNDTHAT!</h1>
   </div>

   <div class="clearfix">
      <div class="column menu">
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Login.php">Login</a></li>
            <li><a href="signup.php">Sign up</a></li>
         </ul>
         <br><br>
         
         <form action = "" method = "post">
            <p> User name:</p>
            <p> <input type = "text" name = "Email">
            <p> Password:</p>
            <p> <input type = "password" name = "upass"> 
            <p> <input type = "submit" value = "Login">
         </form>     
         
         <br><p>Forgot your Password? <a href="reset_password.php"><font color="black"> Click here</font></a></p>

      </div>
      
   </div>

   <div class="footer">
      <p>&copy FUNDTHAT! | 2019 | 400 Cedar Ave, West Long Branch, New Jersey</p>
   </div>
   </div>
</body>
</html>
