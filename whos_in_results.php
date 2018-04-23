<!DOCTYPE html>
<html lang="EN">
<!-- Author: Andrew Peterson	-->
<!-- This will most likely not be in the final project. The design is not ideal. I will be
        using javascript/AJAX for this part. Which will be on the whos_in page. -->
<head>
    <title>View available machines | Collaborate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="mockup.css" />
</head>
<body>

    <p>
        <a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
            <img src="UMBCretrievers.jpg" alt="UMBC retriever" height="150" />
        </a>
    </p>


    <div class="menu">
    <a class="menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project2/studenthomepage.php">
            My Page
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in.php">
            See Who's In
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php">
            Today's Schedule
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php">
            Equipment Registration
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~schultz4/is448/projectModified/logout.php">
            Log-Out
        </a>
    </div>

<?php
#checks the session. Will redirect to the login page if there is no session user id.
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
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
#$time = 8; # this is for testing. Can add comment and un comment below to use current hour.
$time = date('G'); # Un commenting this will make time be the current time 1-24.

#this checks to see if the user manually changed a get value. Will need to change these values if we add more machines.
if ($cardio_machine > 8 || $weight_machine > 12) {
    echo ("Please do not change the get data. Click on the 'See Who's in' page to your left and click on one of the machine boxes.");
    die;
}

# If true, than that means the machine you clicked on was a cardio machine. It will show relevant info for that machine.
# If false, it will show relevant information for the weight room machine chosen.
if ($cardio_machine > 0) {
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
            <p><i>The current time is: </i>" . date('h:i:sa');
    if (date('G') >= 22 || date('G') <= 6) {
        echo "<p><b>The Gym is not open yet. Check back in at 7am.</b></p>";
    }
    echo "<p>Machine name: $machine_name_array[machine_name]</p>
        </div>";
# Now we will look to see if the machine is being used.  For demo - the time will be 10:00am
    $used_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$time';";
    $result = mysqli_query($db, $used_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $used_machine_array = mysqli_fetch_array($result);

    if (empty($used_machine_array) == false) {
        echo "<div class='machine'>
            <p>Machine is being used by:  $used_machine_array[student_id]</p>
        </div>";
        # Add next available time info here
        $next_time = $time + 1;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);

            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array) == false) {
                #keep looping
                $next_time = $next_time + 1;
                $counter = $counter + 1;
            } else {
                # exit loop
                $counter = 22;

            }
        }
        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            echo "<div class='machine'>
            <p>The next available time is: $next_time PM</p>
        </div>";
        } else {
            echo "<div class='machine'>
            <p>The next available time is: $next_time AM.</p>
        </div>";
        }

    } else {
        # add search to find the next hour that it is busy till.
        $next_time = $time + 1;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);
            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array)) {
                #keep looping
                $next_time = $next_time + 1;
                $counter = $counter + 1;
            } else {
                # exit loop
                $counter = 22;

            }
        }
        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            echo "<div class='machine'>
            <p>There is nobody using this machine right now.<br /> <a href='https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php'>Click here to register for this machine right now!</a></p>
            <p>The machine is available until: $next_time PM</p>
        </div>";
        } else {
            echo "<div class='machine'>
            <p>There is nobody using this machine right now.<br /> <a href='https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php'>Click here to register for this machine right now!</a></p>
            <p>The machine is available until: $next_time AM.</p>
        </div>";
        }
    }

} else {
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
            <p><i>The current time is: </i>" . date('h:i:sa');
    if (date('G') >= 22 || date('G') <= 6) {
        echo "<p><b>The Gym is not open yet. Check back in at 7am.</b></p>";
    }
    echo "<p>Machine name: $machine_name_array[machine_name]</p>
        </div>";
# Now we will look to see if the machine is being used.  For demo - the time will be 10:00am
    $used_query = "SELECT * FROM Schedule WHERE machine_id = '$weight_machine' AND time_block = '$time';";
    $result = mysqli_query($db, $used_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $used_machine_array = mysqli_fetch_array($result);

    if (empty($used_machine_array) == false) {
        echo "<div class='machine'>
            <p>Machine is being used by:  $used_machine_array[student_id]</p>
        </div>";
        # Add next available time info here
        $next_time = $time + 1;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);
            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array) == false) {
                #keep looping
                $next_time = $next_time + 1;
                $counter = $counter + 1;
            } else {
                # exit loop
                $counter = 22;

            }
        }

        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            echo "<div class='machine'>
            <p>The next available time is: $next_time PM.</p>
        </div>";
        } else {
            echo "<div class='machine'>
            <p>The next available time is: $next_time AM.</p>
        </div>";
        }

    } else {
        # add search to find the next hour that it is busy till.
        $next_time = $time + 1;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);
            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array)) {
                #keep looping
                $next_time = $next_time + 1;
                $counter = $counter + 1;
            } else {
                # exit loop
                $counter = 22;

            }
        }
        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            echo "<div class='machine'>
           <p>There is nobody using this machine right now.<br /> <a href='https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php'>Click here to register for this machine right now!</a></p>
           <p>The machine is available until: $next_time PM</p>
       </div>";
        } else {
            echo "<div class='machine'>
           <p>There is nobody using this machine right now.<br /> <a href='https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php'>Click here to register for this machine right now!</a></p>
           <p>The machine is available until: $next_time AM.</p>
       </div>";
        }
    }
}

?>



</body>
