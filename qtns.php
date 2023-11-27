<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Chat Page</title>
		
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
			padding: 25px 30px;
		}
		.form header{
			font-size:25px; 
			font-weight: 600;
			padding-bottom: 10px;
			border-bottom: 1px solid #e6e6e6;
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
			flex-direction:column;
			margin-bottom:10px;
		}
		.form form .field label{
			margin-bottom: 10px;
		}
		.form form .field input:hover{
			font-size:22px;
			transition: 0.5s;
		}
		.form form .input input{
			height: 30px;
			width:100%;
			font-size:16px;
			padding:0 10px;
			border: 1px solid #ccc;
			border-radius:5px;
		}
		.form form .image input{
			font-size:17px;
		}
		.form form .chat input{
			margin-top: 13px;
			margin-left: 150px;
			height:40px;
			width:120px;
			border:none;
			font-size:16px;
			font-weight: 500;
			background: #333;
			color:#fff;
			border-radius:8px;
			cursor:pointer;
		}
		.form form .chat input:hover{
			color: #fff6d5;
			font-size:18px;
		}
		.form .redirect{
			text-align: center;
			margin: 25px;
			margin-left: 40px;
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
			margin: 180px;
		}
		.select{
			border: 1px solid #ccc;
			margin-top: 5px;
			margin-bottom: 5px;
			padding: 10px;
			border-radius:5px;
		}
		.select:hover{
			font-size: 20px;
			transition: 0.5s;
		}

	</style>

	<body>
		<div class="wrapper">
			<a href="users.php" class="back-icon"><img src="imgs/cliniclogo.svg" style="width:100px; height:100px;" ></a>
			<section class="form login">
				<h2>Gynecologist Questions</h2>
				<form action="#" onsubmit="checkPregnancyStatus(event)">
								<div class="error-msg"></div>
								
									<div class="field input">
										<input type="text" placeholder="Patient Name.." name="name" required>
									</div>
									
									<div class="field input">
										<input type="text" placeholder="Age.." name="age" required>
									</div>
									
									<div class="field input">
										<select class="select" id="pregnancyStatus" required>
											<option>Pregnancy Status:</option>
											<option>Pregnant</option>
											<option>Not Pregnant</option>
										</select>
									</div>

									<div class="field input">
										<input type="text" placeholder="Your Symptoms.." required>
									</div>
									
									
									<div class="field input">
										<input type="textarea" placeholder="Additional Information"  required>
									</div>
									
									<div class="field chat">
										<input type="submit" class="book" value="Get Diagnosis">
									</div>
							</form>
				
				<div class="redirect">Go Back To<a href="index.html"> Home</a></div>
			</section>
		</div> 
		<script>
			function checkPregnancyStatus(event) {
				event.preventDefault();
				var pregnancyStatus = document.getElementById("pregnancyStatus").value;
				if (pregnancyStatus === "Pregnant") {
					alert("It is recommended that you visit the hospital as you are pregnant.");
				} else {
					// Your existing form submission logic here
					alert("Form submitted for non-pregnant user.");
				}
			}
</script>

	</body>

</html>