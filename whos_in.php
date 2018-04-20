<!DOCTYPE html>
<html lang="EN">

<!--Author: Andrew Peterson	-->
<?php
#checks the session. Will redirect to the login page if there is no session user id.
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
}
?>
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
        <a class="menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project/studenthomepage.html">
            My Page
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in.php">
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
        <a class="menu_link" href="https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html">
            Log-Out
        </a>
    </div>


    <div class="whos_in_intro">
        <h1>Who's in the gym? </h1>
        <h2>View the available machines below.</h2>
        <p>
            Use this page to view open machines and make sure you get a machine next to your friend.
        </p>
        <p>
        <?php echo "<i>The current time is: </i>" . date("h:i:sa"); ?>
        </p>
    </div>

    <div class="whos_in_cardio">
        <hr />
        <h2>Cardio Balcony</h2>
        <!-- The amount of tread mills and ellipticals given to us.-->
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=1&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=2&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=3&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=4&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=5&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=6&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=7&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=8&weights_id=0">
            <div class="cardio_recs"></div>
        </a>
    </div>
    <div class="whos_in_weight_room">
        <br />
        <hr />

        <h2>Weight Room</h2>
        <!-- The amount of squat racks and bench presses given to us.-->
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=0&weights_id=9">
            <div class="weight_room_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=0&weights_id=10">
            <div class="weight_room_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=0&weights_id=11">
            <div class="weight_room_recs"></div>
        </a>
        <a href="https://swe.umbc.edu/~andrewp2/is448/projectD5/whos_in_results.php?cardio_id=0&weights_id=12">
            <div class="weight_room_recs"></div>
        </a>
    </div>

</body>

</html>