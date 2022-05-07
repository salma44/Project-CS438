<?php 
session_start();

	include("connection.php");
	include("functions.php");

	

	$user_id = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Naruto Running Game</title>
	<script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script>
	<style>


html, body {
  background-color:#FFFFE0;
  margin-left:60px;
	padding: 0;
  font-family: Papyrus, fantasy;
  font-weight: bold;
  
  }
  canvas {
	display: block;
  }

  h2{
    margin-left:-25px;
	color:red;
  }

  div{
    margin-left:400px;

  }

  a{

color:red;
text-decoration: none;
padding: 13px;
}

#button{
padding: 7px;
color: white;
background-color: green;
opacity: 70%;
border: solid thin;
border-top-left-radius:25px;  
border-top-right-radius:25px;  
border-bottom-right-radius:25px;  
border-bottom-left-radius:25px;
font-family: Papyrus, fantasy;
margin-left:25px;
}
  </style>

</head>
<body>
 
<div>

	<h2>Enjoy playing <?php echo $user_id['user_name']; 
	?>!</h2>
	

<form method="post" action="score.php" id="form">

<input type="hidden" id = "scores" name="scores" >

<input id="button" type="submit" value="Pass Your Score">
<br>

<a href="winners.php" >Winners</a>
<form method="post" action="score.php" id="form" >

<a href="logout.php">Logout</a>

</form>
</div>

	<script src="naruto.js"></script>
    <script src="pain.js"></script>
    <script src="sasuke.js"></script>
    <script src="ramen.js"></script>
    <script src="wallpaper.js"></script>
</body>
</html>



