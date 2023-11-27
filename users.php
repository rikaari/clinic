<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location:talkLogin.php");
	} 
?>

<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Users Page</title>
		
		
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
			height:45px;
			border:none;
			font-size:17px;
			font-weight: 500;
			background: #333;
			color:#fff;
			border-radius:5px;
			cursor:pointer;
		}
		.wrapper img{
			object-fit: cover;
			border-radius:50%;
		}
		.users{
			padding:25px 30px;
		}
		.users header, .users-list a{
			align-items: center;
			padding-bottom: 20px;
			justify-content: space-between;
			border-bottom: 1px solid #e6e6e6;
		}
		.users header .content img{
			height: 50px;
			width:40px;
		}
		.users header .content{
			display:flex;
		}
		:is(.users, .users-list) .details{
			margin-left: 15px;
			color:#000;
		}
		:is(.users, .users-list) .details span{
			font-size: 18px;
			font-weight: 650;
		}
		.users header .logout img{
			margin: -60px 345px 30px;
			height:40px;
			width:40px;
		}
		.users .search{
			margin:20px 0;
			display:flex;
			position:relative;
			align-items: center;
			justify-content:space-between;
		}
		.users .search .text{
			font-size: 20px;
		}
		.users .search input{
			position: absolute;
			height:42px;
			width:calc(100% - 75px);
			border: 1px solid #ccc;
			padding: 0 8px;
			font-size: 16px;
			border-radius:5px;
			outline:none;
			opacity: 0;
			pointer-events: none;
			transition: all 0.3s ease;
		}
		.users .search input.active{
			opacity: 1;
			pointer-events: auto;
		}
		.users .search button{
			width: 55px;
			height: 42px;
			border: none;
			otline:none;
			color:#fff;
			background:#333;
			font-size: 17px;
			border-radius:0 5px 5px 0;
			transition: all 0.2s ease;
		}
		.users .search button:hover{
			background:#ccc;
			color:#333;
		}
		.users .search button.active{
			color: #ccc;
			background: #333;
		}
		.users-list{
			max-height:250px;
			overflow-y:auto;
		}
		.users-list a .content img{
			height:40px;
			width:45px;
		}
		.users-list::-webkit-scrollbar{
			width:0px;
		}
		.users-list a .content{
			display:flex;
			align-items:center;
		}
		.users-list a .content p{
			color:#67676a;
		}
		.users-list a .status-dot{
			font-size: 12px;
			color: #468669;
			margin-left: 350px;
		}
		.users-list a .status-dot.offline{
			color: #ccc;
		}
		.users-list a{
			padding-right: 15px;
			padding-right:15px;
			border-bottom-color:#f1f1f1;
		}

	</style>

	<body>
	
		<div class="wrapper">
			<section class="users">
				<header>
					<?php
						include_once "php/config.php";
						$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
						if(mysqli_num_rows($sql) > 0){
							$row = mysqli_fetch_assoc($sql);
						}
					?>
				
					<div class="content">
						<img src="php/images/<?php echo $row['img']?>" alt="">
						<div class="details">
							<span><?php echo $row['fname']." ".$row['lname']?></span>
							<p><?php echo $row['status']?></p>
						</div>
					</div>
					<a href="php/logout.php?logout_id=<?php echo $row['user_id']?>" class="logout"><img src="imgs/power-off.svg" alt=""></a>
									
				</header>
					
					<div class="search">
						<span class="text">Select a user to start chat</span>
						<input type="text" placeholder="Enter name to search....">
						<button class="search">Search</button>
					</div>
					
					<div class="users-list">	
						
					</div>

			</section>
		</div> 
			
		
		<script src="users.js"></script>
	</body>

</html>