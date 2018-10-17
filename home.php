<?php


session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdbase');

?>

<html>
<head>
<title>
	</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="container">
		<br><h2 class="text-center text-primary">WEBDEVELOPER QUIZ</h2><br> 
<h3 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?></h3>
<div class="col-lg-8 m-auto d-block">
<div class="card">


	<h4 class="text-center card-header">Welcome <?php echo $_SESSION['username']; ?> , you have to select only one out of 4. Best of luck :) </h4>

</div><br>
<form action="check.php" method="post">

<?php


for($i=1; $i<6; $i++)
{
$q = "select * from questions where qid = $i";
$query = mysqli_query($con, $q);

while($rows = mysqli_fetch_array($query)){
	?>
	<div class="card">
		<h5 class="card-header"><?php echo $rows['question'] ?> </h5>


		<?php


				$q = "select * from answers where ans_id = $i";
$query = mysqli_query($con, $q);

while($rows = mysqli_fetch_array($query)){
	?>
	<div class="card-body">
		<input type="radio" name="quizcheck[<?php echo $rows['ans_id'];  ?>]" value="<?php echo $rows['aid']; ?>">
		<?php echo $rows['answer'];?> 
	</div>
	

<?php

}
} 
}

?>
<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">

</form>
</div> 

</div><br><br>


<div class="m-auto d-block">

<a href="logout.php" class="btn btn-primary ">LOGOUT</a></div><br>

<div class="text-center">
	@2018 Webdeveloper Quiz
	</div><br>
</div> 



	</body>
</html>