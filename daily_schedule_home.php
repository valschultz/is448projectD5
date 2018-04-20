<!--Author: Raymond Tsang -->
<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
}
?>
<head>
	<title> Daily Schedule </title>
	<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>

<body>
<div class = "image">
	<a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
	<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="150"/>
	</a>
</div>

<h1 class = "equ_center"> Daily Schedule </h1>

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

<form method="POST" action="daily_schedule.php">
	<p>
		<h2> Which equipment would you like to use? </h2>
	</p>

<select name="machine" size="1">
	<option value="1">Treadmill #1</option>
	<option value="2">Treadmill #2</option>
	<option value="3">Treadmill #3</option>
	<option value="4">Treadmill #4</option>
	<option value="5">Elliptical #1</option>
	<option value="6">Elliptical #2</option>
	<option value="7">Elliptical #3</option>
	<option value="8">Elliptical #4</option>
	<option value="9">Squat Rack #1</option>
	<option value="10">Squat Rack #2</option>
	<option value="11">Bench Press #1</option>
	<option value="12">Bench Press #2</option>
</select>

	<p>
		<h2> Please select the time in which you would like to use the machine: </h2>
	</p>

<select name="machine_times" size="1">
	<option value="7">7:00 am</option>
	<option value="8">8:00 am</option>
	<option value="9">9:00 am</option>
	<option value="10">10:00 am</option>
	<option value="11">11:00 am</option>
	<option value="12">12:00 pm</option>
</select>

<input type="Submit" name="Submit"/>
</form>

</body>
</html>