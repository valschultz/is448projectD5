<!--Author: Raymond Tsang -->
<?php
#include('Registration.php');
#
#if(isset($SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Daily Schedule </title>
	<link rel="stylesheet" type="text/css" href="mockUp.css" />
</head>

<body>
	<p>
		<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="100"/>			
	</p>

	<?php
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3", "mbrooks3");
	
	if(mysqli_connect_errno()){
		exit("Error, could not connect to MySQL");
	}

	if(isset($_POST['machine']) && !empty($_POST['machine']) && 
	   isset($_POST['machine_times']) && !empty($_POST['machine_times']))
	{
		$machine = $_POST['machine'];
		$machine_times = $_POST['machine_times'];
	

	$checkSchedule_query = "SELECT machine_name FROM Daily_Schedule WHERE machine_name = '$machine'";

	$result = mysqli_query($db, $checkSchedule_query);

	if(!$result){
		print("Error, query could not be executed");
		$error = mysquli_error($db);
		print "<p> . $error . </p>";
		exit;
	}

	$num_rows = mysqli_num_rows($result);
	if($num_rows != 0){	
		print ("Sorry, this machine is not available at this time. Please check again later.");
	}
	else{
		print ("This machine is available now!");
	}
	}

	?>
</body>
</html>