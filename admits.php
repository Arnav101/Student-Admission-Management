<?php
    ob_start();
    session_start();
	if(!isset($_SESSION["uname"])) {
		header('Location: index.php');
	}
?>
<?php include "db_connect.php"; ?>
<?php
	$quer = mysqli_query($connect, "SELECT * from Student");
?>
<html>
	<head>
		<title>Details</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body class = 'ind'>
		<header>
		  <div class="transbox">
		   <h1>
			   <?php if(mysqli_num_rows($quer)!=1)echo mysqli_num_rows($quer) . ' students'; else echo mysqli_num_rows($quer) . ' student';?>
			   &nbsp;students enrolled
		   </h1>
			 </div>
		</header>
		<div>
			<table class="ctable">
				<thead>
				<tr>
				<th>Roll No</th>
				<th>Name</th>
				<th>Class</th>
				<th>Division</th>
				</tr>
				</thead>
				<tbody>
				<?php
					while($q = mysqli_fetch_assoc($quer)){
					echo '<tr><td>' . $q['RollNo'] . '</td><td>'.$q['Name'].'</td><td>'.$q['Class'].'</td><td>'.$q['Division'].'</td></tr>';
					}
				?>
				</tbody>
			</table>
		</div>
		<form action="stud.php" method="post">
   <input type="submit" name="home" value="Back to home page">
	<br>
    </form>
    <form action="logout.php" method="post">
   <input type="submit" name="logout" value="LOGOUT">

    </form>
	</body>
</html>
