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
<title> Student Home Page </title>
<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>
<body>
<?php
	//connect and check for error
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");
	
	if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
?>

<div class = "image">
	<a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
	<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="150"/>
	</a>
</div>

<!-- The Heading will use the students log in information to display their name-->
<h1 class = "name" > *Student Name* 's Home Page </h1>

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
	<a class= "menu_link" href = "https://swe.umbc.edu/~ix32419/is448/Project/equipmentregistrationpart1.html">
	Equipment Registration
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~schultz4/is448/projectModified/logout.php" >
	Log-Out
	</a>
</div>

<?php
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
	//display last5
	echo '<div class = "last5">';
	print ("<p> Last 5 Machines:</p>");
	$last5_rows = mysqli_num_rows($last5_result);
	for($row_num = 1; $row_num <= $last5_rows && $row_num <= 5; $row_num++){
		$last5_array = mysqli_fetch_array($last5_result);
		
		print("<p>$row_num: $last5_array[machine_name]<br /></p>");
	}
?>
		<!-- This clickable will allow the user to view more of their last used machines
		right now it only links to google -->
		<a href="https://swe.umbc.edu/~mbrooks3/is448/project2/seepastmachines.php">
		See More Past Machines
		</a>

<?php
	echo '</div>';
?>

<div class = "tips">
	<!-- This section will include a set of randomized tips based on the users last 5 machines
	right now it only displays one pre-set tip -->
	<h2> <span class = "home_page_headings" > Tips: </span> </h2>
	<p>
		It seems you've been using the same machine every time... 
		<br />
		Try switching it up to exercise different muscles.
	</p>

</div>	

<div class = "notes_top">
	<h2> <span class = "home_page_headings" > Your Notes: </span> </h2>
</div>
<?php
	//retieve note data from database
	$notes_query = "SELECT * FROM Student_Notes ORDER BY note_id DESC";
	$notes_result = mysqli_query($db,$notes_query);
	if(! $notes_result){
		print("Error - query could not be executed");
		$error = mysqli_error();
		print "<p> . $error . </p>";
		exit;
	}
	
	//display notes
	$num_rows = mysqli_num_rows($notes_result);
	for($row_num = 1; $row_num <= $num_rows && $row_num <=5; $row_num++){
		$note_array = mysqli_fetch_array($notes_result);
		echo '<div class = "notes">';
		print ("<p> $note_array[note_date]: $note_array[note_content] <br /></p>");	
		echo '</div>';
	}
	
?>

<div class = "notes">
	<br /> 
	<a href="https://swe.umbc.edu/~mbrooks3/is448/project2/createnewnote.html">
	Create a New Note
	</a>
	<br />
	<a  href="https://swe.umbc.edu/~mbrooks3/is448/project2/seeallnotes.php">
	See All Notes
	</a>
</div>
</body>
</html>

