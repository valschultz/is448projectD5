<!--Author: Mary Brooks -->
<!DOCTYPE html>
<html lang="en">
<head>
<title> Note Saved </title>
<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>
<body>
<?php
	//connect and check for error
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

	if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
	//create new note
	//get data and check if set and not empty
	//check date content for proper format
	if (isset($_POST ["note_date"])  && !empty($_POST ["note_date"]) &&
		isset($_POST ["note_content"])  && !empty($_POST ["note_content"])){
	
		$note_date = htmlspecialchars($_POST ["note_date"]);
		$note_content = htmlspecialchars($_POST ["note_content"]);
		$student_id = htmlspecialchars("yx68259");
		
		//write to database
		//static student_id is being used until the implementation of other languages
		$insert_query = "INSERT INTO Student_Notes (student_id, note_date, note_content) 
			VALUES ('$student_id','$note_date','$note_content')";
		
		$insert_result = mysqli_query($db,$insert_query);
		if(! $insert_result){
			print("Error - query could not be executed");
			$error = mysqli_error();
			print "<p> . $error . </p>";
			exit;
		}
		else{
?>
			<div class = "center">
			<h1> Your note has been saved! </h1>
			<a href = "https://swe.umbc.edu/~mbrooks3/is448/project/studenthomepage.php">
			Return Home
			</a>
			</div>
<?php
		}
		}	
?>
</body>
</html>
