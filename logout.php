<?php
			session_start();?>
<!--Author: Valerie Schultz	-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> RAC MockUp Registration Page </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
			<!--Linking this page to the CSS style sheet: mockUp.css-->
		<link rel="stylesheet" type="text/css" href="mockUp.css" />
		<body>
			<p>
				<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="100"/>				
			</p>
			<?php
			if(isset($_SESSION['login_user']))
				unset($_SESSION['login_user']);
			session_destroy();
			header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
			?>
			
		</body>
</html>