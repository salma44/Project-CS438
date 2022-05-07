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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">

body{
  color: purple;
  font-family: Papyrus, fantasy;
  font-weight: bold;
  background-image: url("loginBackground.png");
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
		background-color: purple;
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
margin-left: 690px;
margin-top: 50px;
border-radius: 25px;
opacity: 60%;
text-align: center;


	}

	a{
		text-decoration: none;
	}
h1{
	margin-left:690px;
	font-size:50px;
}

	</style>

	<h1>Naruto Evolution</h1>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: purple;">Login</div>

			<label >User Name: <input id="text" type="text" name="user_name"></label>
			
			<br><br>

			<label>Password: <input id="text" type="password" name="password"></label><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Sign-Up</a><br><br>
		</form>
	</div>
</body>
</html>