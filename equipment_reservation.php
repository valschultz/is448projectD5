<!--Author: Shinyoung Caleb Lee -->
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">


<?php
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
}
?>
	
<head>
	<title> Equipment Registration </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!--Linking this page to the CSS style sheet: mockUp.css-->
	<link rel="stylesheet" type="text/css" href="mockUp.css" />
<head>	
	
<body>
	<p>
				
	<a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
	<img src = "UMBC.jpg"  alt = "UMBC retriever" height="150"/>
	</a>				
	</p>



<h1 align="center">Equipment Registration</h1>

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


	<form action="submit_reservation.php" >
		<p>
		<h2> Which equipment would you like to reserve? </h2>
	</p>

<select name="machine_id">
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
		<h2> Please select the time to reserve the machine: </h2>
	</p>

<select name="time_block" size="1">
	<option value="7">7:00 am</option>
	<option value="8">8:00 am</option>
	<option value="9">9:00 am</option>
	<option value="10">10:00 am</option>
	<option value="11">11:00 am</option>
	<option value="12">12:00 pm</option>
</select>

		
		<input type="hidden" value="anonymous" name="student_id"> </input>
		
		<button type="submit">Make a reservation</submit> </button>
	</form>


</div>

</body>

</html>