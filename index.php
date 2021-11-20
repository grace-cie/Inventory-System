<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
	body{
		background: #f1f1f1;
		
	}
	.main-container {
		background: #caebf2;
		height: 500px;
		width: 600px;
		border-radius: 14px;
		position: relative;
		top: 410px;
	}
	.login-form {
		position: relative;
		top: 98px;
	}
	h2 {
    	font-family: 'Public Sans', sans-serif;
		font-size: 52px;
    	color: #a9a9a9;
	}
	input[name="uname"]::placeholder {        
		text-align: center;
	}input[name="password"]::placeholder {        
		text-align: center;
	}
	input {
		height: 60px;
		width: 69%;
		font-size: 41px;
		border: none;
		text-align: center;
		font-family: 'Public Sans', sans-serif;
	}
	.pwdinput {
		position: relative;
		top: 11px;
	}
	button {
		height: 60px;
		width: 70%;
		position: relative;
		top: 24px;
		border: none;
		background: #ff3b3f;
		color: #ffffff;
		font-size: 36px;
		font-family: 'Public Sans', sans-serif;
	}
	p {
		font-size: 25px;
		font-family: arial;
		color: red;
		position: relative;
    	top: 23px;
	}
</style>
<center>
<body>
	<div class="main-container">
     <form class="login-form" action="includes/login.php" method="post">
     	<h2>CP Inventory System</h2>
     	<input type="text" name="uname" placeholder="User Name"><br>
     	<input class="pwdinput" type="password" name="password" placeholder="Password"><br>
     	<center><button type="submit">Login</button></center>
		 <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     </form>
	 </div>
</body>
</center>
</html>