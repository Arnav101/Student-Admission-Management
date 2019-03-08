<?php include "db_connect.php"; ?>
<?php
    ob_start();
    session_start();
	if(!isset($_SESSION["uname"])) {
		header('Location: index.php');
	} else {
		$error="";
		$succ="";
		$un = $_SESSION["uname"];
		if(isset($_POST["submit"]))
		{
			$rno=$_POST["rno"];
		    $name=$_POST["name"];
		    $class=$_POST["class"];
		    $d=$_POST["div"];
		    $query=mysqli_query($connect,"SELECT * FROM Student
		                                    WHERE RollNo='$rno'");
		    
		    if(mysqli_num_rows($query)!=0)
		    {
				$error = "Student Already exists";
		    }
		    else
		    {
		        mysqli_query($connect,"insert into Student values('$rno','$name','$class','$d', '$un')");
				$succ = "Details Successfully Added";
		    }
		}
    }
?>
<html>
	<head>
		<title>Student Admission</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="ind">
    <header>
      <div class="transbox">
   <h1>Admission</h1>
 </div>
</header>

<div class="container">
	<div class="divs">
  <div class="column login">
	  <div class="frms">
    <form class="" action="stud.php" method="post">
		
		Roll no:<br>
      <input type="text" name="rno" value="" required>
      <br>

       Name:<br>
      <input type="text" name="name" value="" required>
      <br>

      Class:<br>
      <select name="class">
  <option value="FE">FE</option>
  <option value="SE">SE</option>
  <option value="TE">TE</option>
  <option value="BE">BE</option>
</select> 
     <br>

     Division:<br>
     <select name="div">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
</select> 
    <br>
	<p style="color:red"><?php echo $error ?></p>
	<p style="color:green"><?php echo $succ ?></p>
   <br>
   <input type="submit" name="submit" value="SUBMIT">
	<br>
	  </form>
	  <form action="admits2.php" method="post">
   <input type="submit" name="admit" value="View Admissions">
	<br>
    </form>
    <form action="logout.php" method="post">
   <input type="submit" name="logout" value="LOGOUT">

    </form>
	  </div>
		</div>
  </div>

</div>
  </body>
</html>
