<head>
	<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>

<div class = "menu">
	<a class= "menu_link" href = "https://swe.umbc.edu/~mbrooks3/is448/project2/studenthomepage.php">
	My Page
	</a>
	<br /><br />
	<a class= "menu_link" href ="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in.php">
	See Who's In
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php">
	Today's Schedule
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php">
	Equipment Registration
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~schultz4/is448/projectModified/logout.php" >
	Log-Out
	</a>
</div>

<?php

	session_start();
	if ($_SESSION['login_user']) {
	} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
	}

$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

$time_block = mysqli_real_escape_string($db, $_GET['time_block']);
$machine_id = mysqli_real_escape_string($db, $_GET['machine_id']);
$student_id = mysqli_real_escape_string($db, $_GET['student_id']);

$result = mysqli_query($db,
	"SELECT * FROM Schedule WHERE 
		time_block='$time_block' AND 
		machine_id=$machine_id
	");
$num_rows = mysqli_num_rows($result);
$already_reserved = $num_rows > 0;


// instead of directing to another html page will use alert messages from Javascript in the next part 

if ($already_reserved) {
	header('Location: error.html');
	die();
} else {

	mysqli_query($db,"INSERT INTO Schedule 
		(time_block, student_id, machine_id) VALUES 
		('$time_block', NULL, '$machine_id')");
	
	// $results = mysqli_query($db, 'select * from Schedule JOIN Machines on Schedule.machine_id = Machines.machine_id');
	header('Location: confirmation.html');
	die();
}	


