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
<title> All Notes </title>
<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>
<body>
<h1 class = "center"> All Notes </h1>
<?php
	//connect and check for error
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

	if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
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
	for($row_num = 1; $row_num <= $num_rows; $row_num++){
		$note_array = mysqli_fetch_array($notes_result);
		echo '<div class = "notes">';
		print ("<p> $note_array[note_date]: $note_array[note_content] <br /></p>");	
		echo '</div>';
	}
	
?>
	<div class = "center">
		<a href = "https://swe.umbc.edu/~mbrooks3/is448/project2/studenthomepage.php">
		Return Home
		</a>
	</div>
</body>
</html>
