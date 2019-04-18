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
		
		if (!empty($_POST['Tax_ID']))
			$Tax_ID = $_POST['Tax_ID'];
		else 
			$error[] = "Please enter user name.";
			
		if (!empty($_POST['upass']))
			$upass= sha1($_POST['upass']);
		else 
			$error[] = "Please enter password.";
			
		if (!empty($_POST['upass2']))
			$upass2= sha1($_POST['upass2']);
		else 
			$error[] = "Please confirm password.";
			
		if ($upass != $upass2)
			$error[] = "Passwords do not match.";
			
		if (!empty($_POST['First_Name']))
			$First_Name = $_POST['First_Name'];
		else 
			$error[] = "Please enter first name.";
			
		if (!empty($_POST['Last_Name']))
			$Last_Name = $_POST['Last_Name'];
		else 
			$error[] = "Please enter last name.";
			
		if (!empty($_POST['email']))
			$email = $_POST['email'];
		else 
			$error[] = "Please enter email.";		

		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			//define database connection parameters
        	include("../../sqlfiles/bank_db_connection.php");
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 

			// sql to insert data to table
			$sql = "INSERT INTO Customers (First_Name, Last_Name, Tax_ID, email, upass)
					VALUES ('$First_Name', '$Last_Name', '$Tax_ID', '$email', '$upass')";

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$max = "SELECT MAX( Account_Number ) FROM Deposits";

			$newDep = "INSERT INTO Deposits (Account_number, Tax_ID, Current_Balance_Amount, Role)
					VALUES ($max+1, '$Tax_ID', 0, 'Primary')";
			if ($conn->query($newDep) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();	
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
			
			<form action="" method="post">
				<table>
					<tr>
						<td>Tax ID: </td>
						<td><input type="text" name="Tax_ID" 
							value=<?php if(isset($_POST['Tax_ID'])) echo $_POST['Tax_ID'] ?>></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="upass"></td>
					</tr>
					<tr>
						<td>Confirm Password: </td>
						<td><input type="password" name="upass2"></td>
					</tr>
					<tr>
						<td>First Name: </td>
						<td><input type="text" name="First_Name" 
							value=<?php if(isset($_POST['First_Name'])) echo $_POST['First_Name'] ?>></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><input type="text" name="Last_Name" 
							value=<?php if(isset($_POST['Last_Name'])) echo $_POST['Last_Name'] ?>></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="email" name="email" 
							value=<?php if(isset($_POST['email'])) echo $_POST['email'] ?>></td>
					</tr>
				</table>
				<input type="Submit">
			</form>
		</div>
	</div>
	
	<div class="footer">
  		<p>FUNDTHAT!</p>
	</div>
	</div>
</body>
</html>