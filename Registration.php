<?php
session_start();
$SESSION['id'] = 'idNum';
?>
<!--Author: Valerie Schultz
	This page is the check for the Registration.html page, so that the correct student id and password are entered, check against the database and confirmed to be correct.
	-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> RAC MockUp Registration Page </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
			<!--Linking this page to the CSS style sheet: mockUp.css-->
		<link rel="stylesheet" type="text/css" href="mockUp.css" />
		<body>
			<p>
				<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="100"/>				
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
			echo "Valid name. <br />";
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
		if($result){
			$num_rows = mysqli_num_rows($result);
	
//todo: if query returned a row, display the temperature and units returned by table
	if($num_rows != 0)
		{
			for($row_num = 0; $row_num < $num_rows; $row_num++)
			{
					$row_array = mysqli_fetch_array($result);
					print("For $id, $password <br /><br /> id is: $row_array[student_id] <br /> password is: $row_array[student_password]
					<br /> first name is: $row_array[student_first_name]
					<br /> last name is: $row_array[student_last_name] <br />");
				}
	}
			?>
			<div class = "center">
				<p>
					<a href="https://swe.umbc.edu/~mbrooks3/is448/projectModifed/studenthomepage.php"> Next</a>
				</p>
			</div>
			
		<?php
		}
	//If query returned 0 rows, display error message
		else{
			echo "No user matching your query of: student id: $id, password: $password";
		}
	}
		else{
			echo "Invalid student id. Must be 2 letters followed by 5 numbers. <br />";
		}
	}
	?>
</body>
</html>