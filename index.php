<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script>
    <meta charset="utf-8" />
	<style>


html, body {
	margin: 0;
	padding: 0;

  
  }
  canvas {
	display: block;
  }

  </style>
</head>
<body>

	<a href="logout.php">Logout</a>


	<br>
	Hello, <?php echo $user_data['user_name']; 
	$scour =0 ;
	$query = "insert into users (scour) values ('$scour')";

	?>
	<script src="naruto.js"></script>
    <script src="pain.js"></script>
    <script src="sasuke.js"></script>
    <script src="ramen.js"></script>
    <script src="wallpaper.js"></script>
</body>
</html>