<!--Author: Mary Brooks -->
<?php
#checks the session. Will redirect to the login page if there is no session user id.
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> All Machines </title>
<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>
<body>
<h1 class = "center"> All Machines </h1>
<?php
	//connect and check for error
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

	if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
	//retieve note data from database
	$last5_query = "SELECT * FROM Machines 
		INNER JOIN Student_Machines on Machines.machine_id = Student_Machines.machine_id 
		ORDER BY machine_use_id DESC";
	$last5_result = mysqli_query($db,$last5_query);
	if(! $last5_result){
		print("Error - query could not be executed");
		$error = mysqli_error();
		print "<p> . $error . </p>";
		exit;
	}
	//display All
	echo '<div class = "center">';
	$last5_rows = mysqli_num_rows($last5_result);
	for($row_num = 1; $row_num <= $last5_rows; $row_num++){
		$last5_array = mysqli_fetch_array($last5_result);
		
		print("<p>$row_num: $last5_array[machine_name]<br /></p>");
	}
?>
	<div class = "center">
		<a href = "https://swe.umbc.edu/~mbrooks3/is448/project2/studenthomepage.php">
		Return Home
		</a>
	</div>
</body>
</html>
