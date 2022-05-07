<?php 
session_start();

include("connection.php");
include("functions.php");

$user_id = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	
		$score = $_POST['scores'];
	
			$query ="UPDATE users SET score = '$score' WHERE user_name = '$user_id[user_name]'";
			mysqli_query($con, $query);

            header("Location: index.php");


		die;
	
	}
?>

