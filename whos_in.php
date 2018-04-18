<!DOCTYPE html>
<html lang="EN">

<head>
    <title>View available machines | Collaborate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="mockup.css" />
</head>
<body>

<?php
$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "mbrooks3", "mbrooks3", "mbrooks3");

#sanity check
if (mysqli_connect_errno()) {
    exit("Error - could not connect to MySQL");
}

$cardio_machine = htmlspecialchars($_GET['cardio_id']);
$weight_machine = htmlspecialchars($_GET['weights_id']);
$cardio_machine = mysqli_real_escape_string($db, $cardio_machine);
$weight_machine = mysqli_real_escape_string($db, $weight_machine);

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
            <p>$machine_name_array[machine_name]</p>
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
    <p>$machine_name_array[machine_name]</p>
</div>";
}
?>

</body>
