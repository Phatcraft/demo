<?php

  session_start();

  $max_attempts = 3;
  if(!isset($_SESSION["attempt"])){
    $_SESSION["attempt"] = 0;
  }

  if($_SESSION["attempt"] >= $max_attempts){
    die("Too many attempts!!!");
  }

	$conn=mysqli_connect("localhost","root","phat0727","web_lab");

	if(isset($_POST['username'])){

		$u=$_POST['username'];
		$p=$_POST['password'];

		$result_password = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($result_password) > 0){
      $_SESSION['user']=$u;
      echo "<script>alert('Login successful')</script>";
    }else{
      echo "<script>alert('Wrong password or username. Number of attempts remaining: ".$max_attempts - $SESSION["attempts"]."')</script>";
      $_SESSION["attempt"]++;
    }

	}

?>
<title>Demo Secure Brute Force</title>
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
