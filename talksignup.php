<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		header("location: ../users.php");
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Signup Page</title>
		
	</head>
	
	<style>
		*{
			margin:0;
			padding:0;
			box-sizing:borderbox;
			text-decoration:none;
			font-family:'Poppins', sans-serif;
		}
		body{
			display:flex;
			align-items:center;
			justify-content:center;
			min-height: 100vh;
			background:#fff6d5;
		}
		.wrapper{
			background:#fff;
			width:450px;
			border-radius:16px;
			box-shadow: 0 0 128px rgba(0,0,0,0.1),
						0 32px 64px -48px rgba(0,0,0,0.5);
		}
		.form{
			padding: 10px 30px;
		}
		.form header{
			font-size:25px; 
			font-weight: 600;
			padding-bottom: 10px;
			border-bottom: 2px solid #ff8080;
		}
		.form form{
			margin:20px 0;
		}
		.form form .error-msg{
			color: #721c24;
			background: #f87da;
			padding:8px 10px;
			text-align: center;
			border-radius: 5px;
			margin-bottom: 10px;
			border: 1px solid #f5c6cb;
			display: none;
		}
		.form form user-details{
			display:grid;
		}

		.form form .field{
			display:flex;
			flex-direction:grid;
			margin-bottom:10px;
		}
		.form form .field label{
			margin-bottom: 10px;
			margin-right: 40px;
			font-size:16px;
		}
		.form form .input input{
			height: 30px;
			width:50%;
			padding:0 10px;
			border: 1px solid #ccc;
			border-radius:5px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08); 
		}
		.form form .image input{
			font-size:15px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
			padding: 10px;
		}
		.form form .chat input{
			margin-top: 13px;
			margin-left: 160px;
			height:40px;
			width:80px;
			border:none;
			font-size:16px;
			font-weight: 500;
			background: #333;
			color:#fff;
			border-radius:5px;
			cursor:pointer;
		}
		.form form .chat input:hover{
			color: #fff6d5;
		}
		.form .redirect{
			text-align: center;
			margin: 20px;
			font-size:17px;
		}
		.form .redirect a{
			color:#333;
		}
		.form .redirect a:hover{
			text-decoration:underline;
			color: #ff8080;
		}
		.back-icon {
			margin: 150px;
			
		}
		.email{
			margin-right: 100px;
		}
		.pass{
			margin-left: 11px;
		}
	</style>

	<body>
	
		<div class="wrapper">
			<section class="form signup">
				<a href="users.php" class="back-icon"><img src="imgs/cliniclogo.svg" style="width:100px; height:100px;" ></a>
				<header align="center">Private Chat Room</header>
				<form action="#" enctype="multipart/form-data">
					<div class="error-msg"></div>
					<div class="user-details">
						<div class="field input">
							<label >First Name</label>
							<input type="text" name="fname">
						</div>
						
						<div class="field input">
							<label>Last Name</label>
							<input type="text" name="lname" required>
						</div>
					</div>
					
						<div class="field input">
							<label>Email Address</label>
							<input type="email" name="email" class="email" required>
						</div>
						
						<div class="field input">
							<label>Password</label>
							<input type="password" name="pass" class="pass" required>
						</div>
						
						<div class="field image">
							<label>Select Image</label>
							<input type="file" name="image" required>
						</div>
						
						<div class="field chat">
							<input type="submit" value="Signup">
						</div>
				</form>
				
				<div class="redirect">Already Signed Up? <a href="talkLogin.php">Login Now</a></div>
			</section>
		</div> 
		
		<script src="signup.js"></script>
	</body>

</html>