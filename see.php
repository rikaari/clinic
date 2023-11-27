<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UFT-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" type="css" href="../css/trials.css">
		<title>Demo Web</title>
	</head> 
	<style>
		*{
			margin:0;
			padding:0;
			box-sizing: border-box;
			font-family: 'Stencil',sans-serif;
			}

			body{
				font-family: 'Stencil',sans-serif;
				font-size: 30px;
				background: linear-gradient(to left,#fff,#ADD8E6); 
			}
			.imagelogo{
				text-align: left;
			}

			.navdiv{
				dispaly:flex;
				box-shadow:0 15px rgba(173,216,230);
				
			}
			nav{
				dispaly: inline-block;
				padding: 20px;
				text-align: center;
			}
			nav ul{
				dispaly: inline-block;
				list-style-type:none;
			}
			nav ul li{
				dispaly: inline-block;
				margin-right: 20px;
			}
			a{
				text-decoration:none;
				color:#555;
				font-size: 10px;
			}
			.container{
				max-width:1300px;
				margin:auto;
				padding-left:25px;
				padding-right:25px;
				justify-content: space-between;
				align-items: center;
				dispaly: flex;
				
			}
			.header{
				dispaly:flex;
				align-items:center; 
				flex-wrap: wrap;
				justify-content: space-around;
				box-shadow:0 15px rgba(173,216,230);
			}
			.intro{
				flex-basis:50%;
				min-width:300px;
				text-align: center; 
			}
			.intro h1{
				padding: 10px 0;
				font-size: 50px;
				line-height:60px;
				margin:10px;
				text-align:centre;
				position:relative;
			}
			.intro h1::after{
				content:'';
				background:#ff523b;
				width:150px;
				height:5px;
				border-radius:5px;
				position:absolute;
				bottom:0;
				left:50%;
				transform:translateX(-50%);
			}
			.phrase{
				padding: 30px;
				font-size: 20px;
			}

			
			.space{
				padding: 8px;
			}
			.btn{
				dispaly:inline-block;
				background:#ff523b;
				color:#fff; 
				padding:8px 30px;
				margin:30px 0;
				border-radius:30px;
				transition: background 0.9s;
			}
			.btn:hover{
				background:#563434;
			}
			.home{
				background: linear-gradient(to left,#fff,#ADD8E6); 
				width: 100%;
				height:100%;
			}
			
			h2.fph2{
				text-align:centre;
				margin:0 auto 80px;
				position:relative;
				line-height:60px;
				color:#555;
			}
			a.active,a:hover{
				background:#ff523b;
				transition: .5s;
				
			}
			h1::after{
				content:'';
				background:#ff523b;
				width:80px;
				height:5px;
				border-radius:5px;
				position:absolute;
				bottom:0;
				left:50%;
				transform:translateX(-50%);
			}
			.imagelogo{
				box-shadow:0 15px rgba(173,216,230);
			}
			
		
			.imagelogo img{
				width: 100%;
				text-align: center;
			}
			.lfig{
				text-align: center;
				font-size: 10px;
			}
			.fig{
				text-align: center;
				font-size: 10px;
			}
			hr{
				color:#555;
			}
			.dets:hover{
				background: hsl(195,53%,73%);
				transition: background 1s;
				padding:10px;
			}
			main{
				box-shadow:0 15px rgba(173,216,230);
			}
			.footer{
				background: linear-gradient(to left,#fff,#ADD8E6); 
				padding:50px;
			}
			.footer .container .navdiv nav ul{
				dispaly: flex;		
				justify-content: space-between;
				align-items: center;			
			}
			@media only screen and (max:width 600px){
				.imagelogo img{
				width: 100%;
				text-align: center;
			}
			}
	</style>
	
	<body>
<div class="home">
		<div class="imagelogo">
		<figure>
			<figcaption class="lfig">Alien G</figure>
			<img src="imgs/logo.jpeg" id = "alien" class="logo" alt="Logo" width="140" height="100" title"Alien G Logo">
			<figcaption class="fig">Mysterious Minds</figure>
		</figure>
			
		</div>
		

<main>
	<!-- Page Redirect-->
	<div class="header">
		<div class="intro">
		<h1 class="name" >SAFE HEALTH</h1>
		<div class="phrase">
			<p><em>Your Safety,Our Concern</em>
		</div>
		<table style="width:100%">
	
			<tr>
					<td colspan="2"><img src="imgs/cliniclogo.svg" height="80"></td>
					<td colspan="2">
						<p><b>Monday-Sunday</b></p>
						<p>Open 24/7</p>
					</td>
					<td colspan="2">
						<p><b>Location</b></p>
						<p>Mbarara Referal Hospital</p>
					</td>
					<td colspan="3">
						<p><b>Contact Us</b></p>
						<p>+256 780609786</p>
					</td>
				</tr>	

				<tr style="background:#32d4e9f7;">
					<td align="center" style="padding:10px;"><a href="index.html" style="color:#fff;">Home</a></td>
					<td align="center" style="padding:10px;"><a href="about.html" style="color:#fff;">About</a></td>
					<td align="center" style="padding:10px;"><a href="services.html" style="color:#fff;">Services</a></td>
					<td align="center" style="padding:10px;"><a href="doctors.html" style="color:#fff;">Doctors</a></td>
					<td align="center" style="padding:10px;"><a href="appointment.html" style="color:#fff;">Appointment</a></td>
					<td colspan="2" align="center" style="padding:10px;"><a href="contact.html" style="color:#fff;">Contact</a></td>
				</tr>
				
				<tr>
					<td colspan="8"><img src="imgs/logo.jpeg" style="width:100%;"></td>
				</tr>

			<tr>
				<td colspan="8" style="padding:5px 20px;"><h1>Our Services</h1></td>
			</tr>
						
			<tr>
				<td colspan="2" style="padding:20px;">
					<img src="imgs/docimg2.jpeg" style="width:330px; height:300px;">
					<p>Want To Make Appointments?</p>
					<h4>Make Appointment</h4>
					<p>Our doctors are one schedule away</p>
				</td>
				
				<td colspan="2" style="padding:20px;">
					<img src="imgs/docimg1.jpeg" style="width:300px; height:300px;">
					<p>Take a look at our drug shop</p>
					<h4>Drug Shop</h4>
					<p>We provide drugs to our patients</p>
				</td>
				
				<td colspan="2" style="padding:20px;">
					<img src="imgs/docimg3.jpeg" style="width:300px; height:300px;">
					<p>Have an issue you'd like to consult?</p>
					<h4>Private Consultation</h4>
					<p>You can converse with our doctors to tell them how you feel.</p>
				</td>
			</tr>
						
			<tr>
				<td colspan="8" style="padding:5px 20px;"><h1>Our Team</h1></td>
			</tr>
			
			<tr>
				<td colspan="2" style="padding:20px;">
					<img src="imgs/docimg2.jpeg" style="width:330px; height:300px;">
					<p>Gynacologist</p>
					<h4>Jane Doe</h4>
				</td>
				
				<td colspan="2" style="padding:20px;">
					<img src="imgs/docimg1.jpeg" style="width:300px; height:300px;">
					<p>Gynacologist</p>
					<h4>John Doe</h4>
				</td>
				
				<td colspan="2" style="padding:20px;">
					<img src="imgs/docimg3.jpeg" style="width:300px; height:300px;">
					<p>Gynacologist</p>
					<h4>Jane Doe</h4>
				</td>
			</tr>
			
			<tr style="background:#32d4e9f7;">
				<td colspan="8" align="center" style="padding:10px;">
					<p style="color:#fff;">Visit anytime</p>
				</td>
			</tr>
		</table>  


<footer class= "footer">
	<!-- Navigation Bar -->
	<div  class="container">
		<div class="navdiv">
				<nav>
					<ul id="NavBar" class="navigate">
						<li><a href="demologin.php">Login<a/></li>
						<li><a href="demoContact.html">Contact Us</a></li>
						<li><a href="demoAbout.html">About Us</a></li>
					</ul>
				</nav>
		</div>
	</div>
</footer>

</div>
	
	<script src='trial.js'></script>
	</body>
<html> 
 