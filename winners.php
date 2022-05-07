<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

	$db= $con;
	$tableName="users";
	$columns= ['user_name','score'];
	$fetchData = fetch_data($db, $tableName, $columns);
	
	function fetch_data($db, $tableName, $columns){
	 if(empty($db)){
	  $msg= "Database connection error";
	 }elseif (empty($columns) || !is_array($columns)) {
	  $msg="columns Name must be defined in an indexed array";
	 }elseif(empty($tableName)){
	   $msg= "Table Name is empty";
	}
  else{
	
	$columnName = implode(", ", $columns);
	$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY score DESC";
	$result = $db->query($query);
	
	if($result== true){ 
	 if ($result->num_rows > 0) {
		$row= mysqli_fetch_all($result, MYSQLI_ASSOC);
		$msg= $row;

	 } else {
		$msg= "No Data Found"; 
	 }
	}else{
	  $msg= mysqli_error($db);
	}
	}
	return $msg;
	}
	
	?>

<!DOCTYPE html>
<html>
<head>

<style>

body{
  color: #006400;
  font-family: Papyrus, fantasy;
  font-weight: bold;

  background-image: url("WinnersBackground.jpg");
 
  background-size: cover ;
 
}



th{
  color:#800080;
}


td{
color:red;
}

table, th, td {
  border: 1px solid;
}

tr:nth-child(even) {background-color: #FFB6C1;}


div{
background-color: aliceblue;
width: 330px;
padding-bottom: 20px;
padding-top: 20px;
padding-right: 20px;
padding-left: 20px;
margin-left: 380px;
margin-top: 50px;
border-radius: 25px;
opacity: 60%;
text-align: center;

}

a{

  color:#006400;
  text-decoration: none;
  padding: 13px;
}

#title{
  margin-left:365px;
  font-size:50px;
  
}

</style>


</head>



<body>

<h1 id="title">Naruto Evolution</h1>

  <div>
<h1 >You Scored: <?php echo( $user_data['score'] ); ?><h1>

      <table >
       <thead>
         
       <th >Winning Players</th>
         <th>Score</th>
       
    </thead>
    
    <tbody>
  <?php
  
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['user_name']??''; ?></td>
      <td><?php echo $data['score']??''; ?></td>
      
       
    
     <?php
      $sn++;
    }}
      
      else{ 
        
        ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
<br>
     
<a href="index.php" id="logout">Play Again</a>
<a href="logout.php" id="logout">Logout</a>


   </div>
   </div>

</body>
</html>