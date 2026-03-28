<?php

session_start();

	$conn=mysqli_connect("localhost","root","phat0727","web_lab");

	if(isset($_POST['username'])){

		$u=$_POST['username'];
		$p=$_POST['password'];

		$result=mysqli_query($conn, "SELECT * FROM users WHERE username='$u'");

		if(mysqli_num_rows($result)>0){
	
			$result_password = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p'");
			if(mysqli_num_rows($result_password) > 0){
				$_SESSION['user']=$u;
				echo "<script>alert('Login successful')</script>";
			}else{
				echo "<script>alert('Wrong password')</script>";
			}

		}else{
			echo "<script>alert('Unknown user')</script>";
		}

	}

?>
<title>Demo User Enumeration & Brute Force</title>
<style>
	body{
		background-color: steelblue;
		color: white;
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}
	form{
		padding: 30px;
	}
	div{
		display: flex;
		margin: 5px;
	}
	div span{
		width: 80px;
	}
	input{
		outline: none;
	}
	input[type="submit"]{
		background-color: red;
		color: white;
		border: 0;
		padding: 5px 20px;
		margin: 5px;
	}

</style>
<form method="POST">

<h2>Login</h2>
<div><span>Username</span><input name="username"><br></div>
<div><span>Password</span><input type="password" name="password"><br></div>

<input type="submit">

</form>
