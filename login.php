<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include('clinicdb.php');
	}
	session_start();
	if (isset($_POST["submit"])) {
		$email = mysqli_real_escape_string($conn, $_POST['Email']);
		$password = mysqli_real_escape_string($conn, md5($_POST['Password']));

		$select = mysqli_query($conn, "SELECT * FROM signup WHERE  email='$email' AND password='$password'") or die("Query Failed");

		if (mysqli_num_rows($select) > 0) {
			$row = mysqli_fetch_assoc($select);
			$_SESSION['userId'] = $row['sId'];
			header('location:index.html');
		} else {
			$message[] = "Incorrest Password Or Email.";
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
		
		<title>Login Page</title>
		
	</head>
	
	<style>
		
		a{
			text-decoration:none;
			color:black;
		}
		a:hover{
			transition: 0.4s;
			border-radius: 6px;
			font-size:18px;
		}
		
		body{
			background-color: #fff6d5;
			font-family:sans-serif;
			font-size: 15px;
		}
		.pic{
			width:30%;
				height:auto;
				margin-bottom:0.5rem;
				margin-left:3rem;
				border:1px solid black;
				border-radius: 6px;
		}
		.card:hover{
			transition: 1.4s;
			background:#ff8080;
			border-radius: 20px;
		}
		.pic:hover{
			transition: 1.4s;
			background:#ff8080;
			border-radius: 20px;
		}
		.book{
			font-size:10px;
		}
		input{
			border: 1px solid black;
			border-radius: 5px;
			padding-left:20px;
			padding-right:20px;
		}
		.button{
			border: 1px solid black;
			border-radius: 5px;
			padding-left:20px;
			padding-right:20px;
			background:#ff8080;
		}
		.button:hover{
			background:#fff6d5;
			transition: 0.4s;
			border:2px solid black;
			border-radius: 6px;
			font-size:14px;
		}
	
	</style>

	<body>
	
		<table style="width:100%">
				
				<tr>
					<td colspan="8" align="center">
						<img src="imgs/cliniclogo.svg" height="150">
					</td>
				</tr>
				
				<tr style="background:#ff8080;">
					<td colspan="8" align="center" style="padding:10px;">
					<p style="color:#fff;">Login Page</p>
				</td>
			</tr>

			<tr>
				<td colspan="8" style="padding:5px 20px;">
				<h1 align="center">Enter Your Credentials</h1>
					<form align="center" method="POST" action="">
						<label><b>Your Name</b>(required)</label></br>
							<input type="text" name="Name" required></br>
							
						<label><b>Your Email</b>(required)</label></br>
							<input type="email" name="Email" required></br>
							
						<label><b>Password</b>(required)</label></br>
							<input type="password" name="Password"></br>
							
						</br><input type="submit" value="Login" class="button" name="submit"></br>
						
						</br><label><a href="signup.php"><b>Don't Have An Account?</b></a></label></br>
					
					</form>
				</td>
			</tr>
						
			
		</table>  
			
		
	</body>

</html>