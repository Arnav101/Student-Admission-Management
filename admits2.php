<?php
    ob_start();
    session_start();
	if(!isset($_SESSION["uname"])) {
		header('Location: index.php');
	}
?>
<?php include "db_connect.php"; ?>
<?php
	$un = $_SESSION["uname"];
	$quer = mysqli_query($connect, "SELECT * from Student where User = '$un' or User is NULL");
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
					$i = 0;
					while($q = mysqli_fetch_assoc($quer)){
					$i++;
					$p = $q['RollNo'];
					echo '<tr><td>' . $p . '</td><td>'.$q['Name'].'</td><td>'.$q['Class'].'</td><td>'.$q['Division'].'</td><td><form action = "del.php" method = "post"><input type = "hidden" name = "delno' . $i . '" value ="' . $p . '"><input type = "submit" name = "del' . $i . '" value = "DELETE"></td></tr>';
					}
				?>
				</tbody>
			</table>
		</div>
		<form action="stud.php" method="post">
   <input type="submit" name="home" value="Back to home page">
	<br>
    </form>
    <form action="admits.php" method="post">
   <input type="submit" name="showall" value="Show all">
	<br>
    </form>
    <form action="logout.php" method="post">
   <input type="submit" name="logout" value="LOGOUT">

    </form>
	</body>
</html>
