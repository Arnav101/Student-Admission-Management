<?php include "db_connect.php"; ?>
<?php

if(isset($_POST["home"])) header('Location: index.php');
else {
	foreach ($_POST as $name => $val)
	{
		 $p = htmlspecialchars($name);
		if(substr($p, 0, 3) == 'del' && $p[3] != 'n'){
			$v = 'delno' . substr($p, 3, strlen($p) - 3);
			break;
		}
	}

		$delno = $_POST[$v];
			$quer = "delete from Student where RollNo = '$delno'";
			$q = mysqli_query($connect, $quer);
			header('Location: admits2.php');
}
?>
