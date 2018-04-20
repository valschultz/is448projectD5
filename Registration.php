<?php
			session_start();?>
<!--Author: Valerie Schultz	-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> RAC MockUp Registration Page </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
			<!--Linking this page to the CSS style sheet: mockUp.css-->
		<link rel="stylesheet" type="text/css" href="mockup.css" />
		<body>
			<p>
				<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="150"/>				
			</p>
			<?php
	#connect to mysql database
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

	if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");

	if (isset($_POST['idNum'])  && !empty($_POST['idNum']) && isset($_POST['pass'])  && !empty($_POST['pass']))
	{
		$id = $_POST['idNum'];
		$password = $_POST['pass'];
		$id = htmlspecialchars($_POST['idNum']);
		$password = htmlspecialchars($_POST['pass']);
		$id = mysqli_real_escape_string($db,$id);
		$password = mysqli_real_escape_string($db,$password);
		
	if(preg_match("/^[A-z]{2}\d{5}\$/", $id))
		{
			#This is where you check the database to ensure that the student id and password match to a row in the database
			#This requires JavaScript onclic, but logic is here
		$checkLogIn_query = "Select student_id, student_password, student_first_name, student_last_name FROM Student WHERE student_id = '$id' AND student_password = '$password'";

		#Execute query
		$result = mysqli_query($db, $checkLogIn_query);

		if(!$result){
			print("Error - query could not be executed");
			$error = mysqli_error($db);
			print "<p> . $error . </p>";
			exit;
		}
		
		$num_rows = mysqli_num_rows($result);
		
		if((!$id=="") && (!$password=="")){
			if($num_rows==1){
				$_SESSION['login_user']=$id;
				header("location: https://swe.umbc.edu/~mbrooks3/is448/project2/studenthomepage.php");
			}

   else{?>
			<div class = "center">
				<p>
					Incorrect id or password, try again! <br />
					Click <a href="https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html"> HERE</a> to go back
				</p>
			</div>
			
		<?php
   }
 }
	}
		else{
			?>
				<div class = "center">
				<p>
					Invalid student id. Must be 2 letters followed by 5 numbers. <br />
					Click <a href="https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html"> HERE</a> to go back
				</p>
			</div>
			<?php
		}
	}
	?>
</body>
</html>