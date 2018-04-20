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
<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>
<body>
<?php

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

	$time_block = mysqli_real_escape_string($db, $_GET['time_block']);
	$machine_id = mysqli_real_escape_string($db, $_GET['machine_id']);
	$student_id = mysqli_real_escape_string($db, $_GET['student_id']);
	$student_id = htmlspecialchars("yx68259");


	$result = mysqli_query($db,
		"SELECT * FROM Schedule WHERE time_block='$time_block' AND 
			machine_id= '$machine_id'");
	$num_rows = mysqli_num_rows($result);
	$already_reserved = $num_rows > 0;

	// instead of directing to another html page will use alert messages from Javascript in the next part 
	if ($already_reserved) {
		header('Location: error.html');
		die();
	} 
	else {
		mysqli_query($db,"INSERT INTO Schedule (time_block, student_id, machine_id) 
			VALUES ('$time_block', NULL, '$machine_id')");
		mysqli_query($db,"INSERT INTO Student_Machines (student_id, machine_id)
			VALUES('$student_id', '$machine_id')"); 
	// $results = mysqli_query($db, 'select * from Schedule JOIN Machines on Schedule.machine_id = Machines.machine_id');
	header('Location: confirmation.html');
	die();
	}	
?>
</body>
</html>
