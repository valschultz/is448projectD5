<!DOCTYPE html>
<html lang="EN">
<!--Author: Andrew Peterson	-->
<head>
    <title>View available machines | Collaborate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="mockup.css" />
</head>
<body>

    <p>
        <a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
            <img src="images/UMBCretrievers.jpg" alt="UMBC retriever" height="150" />
        </a>
    </p>


    <div class="menu">
        <a class="menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project2/studenthomepage.php">
            My Page
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in.html">
            See Who's In
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule.html">
            Today's Schedule
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~ix32419/is448/Project/equipmentregistrationpart1.html">
            Equipment Registration
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~schultz4/is448/project/Registration.html">
            Log-Out
        </a>
    </div>

<?php
session_start();
if ($_SESSION['login_user']) {
    echo ("It works");
}

$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "mbrooks3", "mbrooks3", "mbrooks3");

#sanity check
if (mysqli_connect_errno()) {
    exit("Error - could not connect to MySQL");
}

$cardio_machine = htmlspecialchars($_GET['cardio_id']);
$weight_machine = htmlspecialchars($_GET['weights_id']);
$cardio_machine = mysqli_real_escape_string($db, $cardio_machine);
$weight_machine = mysqli_real_escape_string($db, $weight_machine);

#this checks to see if the user manually changed a get value. Will need to change these values if we add more machines.
if ($cardio_machine > 8 || $weight_machine > 4) {
    echo ("Please do not change the get data. Click on the 'See Who's in' page to your left and click on one of the machine boxes.");
    die;
}

# If true, than that means the machine you clicked on was a cardio machine. It will show relevant info for that machine.
# If false, it will show relevant information for the weight room machine chosen.
if ($cardio_machine > 0) {
    echo "<p>You are viewing the cardio machine #$cardio_machine.</p>\n";
    $constructed_query = "SELECT * FROM Machines WHERE machine_id = '$cardio_machine';";
    $result = mysqli_query($db, $constructed_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $machine_name_array = mysqli_fetch_array($result);
    echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
        </div>";

} else {
    echo "<p>You are viewing the weight room machine #$weight_machine.</p>\n";
    $constructed_query = "SELECT * FROM Machines WHERE machine_id = '$weight_machine';";
    $result = mysqli_query($db, $constructed_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $machine_name_array = mysqli_fetch_array($result);
    echo "<div class='machine'>
    <p>Machine name: $machine_name_array[machine_name]</p>
</div>";
}
?>



</body>
