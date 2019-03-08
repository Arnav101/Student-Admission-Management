<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<?php include "db_connect.php"; ?>
<?php
	$error = "";
	if(isset($_POST["login"])){
		$uname = $_POST["uname"];
		$pass = $_POST["pass"];
		$quer = mysqli_query($connect,"Select * from Management where User = '$uname' AND Pass = '$pass'");
		if(mysqli_num_rows($quer)==0){
			$error = "Invalid details";
		} else{
			$_SESSION["uname"] = $uname;
			header('Location: stud.php');
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body class = 'ind'>
    <header>
      <div class="transbox">
   <h1>Login</h1>
 </div>
</header>

<div class="container">
	<div class="divs">
  <div class="column login">
	  <div class="frms">
    <form class="" action="index.php" method="post">
		
		Username:<br>
      <input type="text" name="uname" value="" required>
      <br>

       Password:<br>
      <input type="password" name="pass" value="" required>
      <br>
	<p style="color:red"><?php echo $error ?></p>
   <br>
   <input type="submit" name="login" value="LOGIN">
	  </div>
		</div>
  </div>

</div>
  </body>
</html>
