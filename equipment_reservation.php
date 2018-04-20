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

<div class= "statement" style="text-align:  center">

	<h1>Equipment Registration </h1>
	<h2>View the available machines below.</h2>
	<p>
		Please select which equipment you would like to use then which equipment # and what time you intend on using it:
	</p>

	<form action="submit_reservation.php">
		<select name="machine_id">
			<option value="1" name="treadmill_1">Treadmill#1</option>
			<option value="2" name="treadmill_2">Treadmill#2</option>
			<option value="3" name="treadmill_3">Treadmill#3</option>
			<option value="4" name="treadmill_4">Treadmill#4</option>
			<option value="5" name="elliptical_1">Elliptical#1</option>
			<option value="6" name="elliptical_2">Elliptical#2</option>
			<option value="7" name="elliptical_3">Elliptical#3</option>
			<option value="8" name="elliptical_4">Elliptical#4</option>
			<option value="9" name="squatrack_1">Squat Rack#1</option>
			<option value="10" name="squatrack_2">Squat Rack#2</option>
			<option value="11" name="benchpress_1">Bench Press#1</option>
			<option value="12" name="benchpress_2">Bench Press#2</option>
		</select>

		<h2>View the available times below.</h2>
		<p>
			Please select what time you intend on using it:
		</p>

		<select name="time_block" size="1">
			<option value="7">7:00am</option>
			<option value="8">8:00am</option>
			<option value="9">9:00am</option>
			<option value="10">10:00am</option>
			<option value="11">11:00am</option>
			<option value="12">12:00pm</option>
		</select>
		
		<input type="hidden" value="anonymous" name="student_id">
		
		<button type="submit">Make a reservation</submit>
	</form>


</div>

</body>

</html>