<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

<style type="text/css">

body{
  color: #8B8000;
  font-family: Papyrus, fantasy;
  font-weight: bold;
  background-image: url("signupBackground.jpg");
  background-size: cover ;
 
}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: green;
		border: solid thin white;
		border-top-left-radius:25px;  
        border-top-right-radius:25px;  
        border-bottom-right-radius:25px;  
        border-bottom-left-radius:25px;
		font-family: Papyrus, fantasy;
	}

	#box{

background-color: aliceblue;
width: 330px;
padding-bottom: 20px;
padding-top: 20px;
padding-right: 20px;
padding-left: 20px;
margin-left: 250px;
margin-top: 50px;
border-radius: 25px;
opacity: 60%;
text-align: center;


	}

	a{
		text-decoration: none;
		color:#8B8000;

	}

	h1{
	margin-left:250px;
	font-size:50px;
}

	</style>

	<h1>Naruto Evolution</h1>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: green;">Signup</div>

			<label >User Name:	<input id="text" type="text" name="user_name"><br><br></label>


			<label >Password: <input id="text" type="password" name="password"><br><br></label>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Login</a><br><br>
		</form>
	</div>
</body>
</html>