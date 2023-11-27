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
		<title>Chatb Page</title>
		
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
			height: 5opx;
			width:50px;
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
		.users header .logout{
			margin:0 320px;
			color: #fff;
			font-size:17px;
			padding:7px 15px;
			background: #333;
			border-radius:5px;
		}
		.users header .logout:hover{
			background:#ccc;
			color:#333;
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
		}
		.users .search button:hover{
			background:#ccc;
			color:#333;
		}
		.users-list{
			max-height:250px;
			overflow-y:auto;
		}
		.users-list a .content img{
			height:40px;
			width:40px;
		}
		:is(.users-list, .chat-box)::-webkit-scrollbar{
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
			margin-left: 150px;
		}
		.users-list a .status-dot.offline{
			color: #ccc;
		}
		.users-list a{
			padding-right: 15px;
			padding-right:15px;
			border-bottom-color:#f1f1f1;
		}
		.chat-area header {
			display: flex;
			align-items: center;
			justify-content: space-between; /* Add this line */
			padding: 18px 30px;
		}

		.chat-area header img {
			height: 45px;
			width: 45px;
		}

		.chat-area header .back-icon {
			margin: -20px 2px 10px;
			height: 15px;
			width: 25px;
		}

		.chat-area header .content {
			display: flex;
			align-items: center;
			margin-left: 15px; /* Add some left margin for spacing */
		}

		.chat-area header .details {
			margin-right: 100px;
			color: #000;
		}

		.chat-area header .details span {
			font-size: 18px;
			font-weight: 650;
		}

		.chat-area header .logout {
			font-size: 17px;
			padding: 7px 15px;
			border-radius: 5px;
			cursor: pointer;
		}

		.chat-area header .logout:hover {
			background: #ccc;
			color: #333;
		}
		.chat-box{
			height:400px;
			overflow-y: auto;
			background:#f7f7f7;
			padding: 10px 30px 20px 30px;
			box-shadow: insert 0 32px 32px 32px rgb(0 0 0 / 5%),
						insert 0 -32px 32px -32px rgb(0 0 0 / 5%);
			border-radius: 20px;
		}
		.chat-box .chat{
			margin: 15px 0;
		}
		.chat-box .outgoing{
			display: flex;
		}
		.chat-box .chat p{
			word-wrap: break-word;
			padding:8px 16px;
			box-shadow:  0 0 32px rgb(0 0 0 / 8%),
						 0 16px 16px -16px rgb(0 0 0 / 10%);
		}
		.outgoing .details{
			margin-left: auto;
			max-width: calc(100% - 130px);
		}
		.outgoing .details p{
			background: #333;
			color: #fff;
			border-radius: 18px 18px 0 18px;
		}
		.chat-box .incoming{
			display: flex;
			align-items: flex-end;
		}
		.chat-box .incoming img{
			height: 35px;
			width: 35px;
		}
		.incoming .details p{
			background: #ccc;
			color: #333;
			border-radius: 18px 18px 18px 0;
		}
		.incoming .details{
			margin-left: 10px;
			margin-right: auto;
			max-width: calc(100% - 130px);
		}
		.chat-area .typing-area{
			padding: 18px 30px;
			display: flex;
			justify-content: space-between;
		}
		.typing-area input{
			height: 45px;
			width: calc(100% - 70px);
			font-size: 17px;
			border: 1px solid #ccc;
			padding: 0 10px;
			border-radius: 5px 0 0 5px;
			outline:none;
		}
		.typing-area button{
			border:none;
			outline:none;
			border-radius:  0 5px 5px 0 ;
			cursor:pointer;
		}
		.send{
			height: 32px;
			width: 32px;
			padding: 7px; /* Adjust the padding value as needed */
		}
	
	</style>

	<body>
	
		<div class="wrapper">
			<section class="chat-area">
				<header>
					<?php
						include_once "php/config.php";
						$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
						$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$user_id}");
						if(mysqli_num_rows($sql) > 0){
							$row = mysqli_fetch_assoc($sql);
						}
					?>
					<a href="users.php" class="back-icon"><img src="imgs/left.svg" alt=""></a>
					<div class="content">
						<img src="php/images/<?php echo $row['img']?>" alt="">
						<div class="details">
							<span><?php echo $row['fname']." ".$row['lname']?></span>
							<p><?php echo $row['status']?></p>
						</div>
					</div>
					
				</header>
				
				<div class="chat-box">
										
					
				</div>
				
				<form action="#" class="typing-area" autocomplete="off">
					<input type="text" name="outgoing_id" value="<?php echo $_SESSION['user_id'];?>" hidden>
					<input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
					<input type="text" name="message" class="input-field" placeholder="Type Your Message Here...">
					<button><img src="imgs/send.svg" align="center" class ="send" alt="#"></button>
				</form>
				
			</section>
		</div> 
		
		<script src="chat.js"></script>
		
	</body>

</html>