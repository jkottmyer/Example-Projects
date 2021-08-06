<?php
    ob_start();
    session_start();
    $_SESSION["degree"] = $_POST["degree"];
    $_SESSION["programs"] = $_POST["programs"];
    $_SESSION["semester"] = $_POST["semester"];

    //setup connection parameters to database / Connect to database READ ONLY - JK 
    $hostname = "jcccalendar.db.10405859.9d3.hostedresource.net";
    $username = "calendarro";
    $password = "ROcal932!";
    $dbname = "jcccalendar";

    //connect to database
    $conn = mysqli_connect($hostname, $username, $password, $dbname) or DIE("Did not connect to database");
    return $conn;

    //Fetch 
    $results = mysqli_query($conn, 
    "SELECT  `course` . *,
    `section`.`MondayStart`, `section`.`MondayEnd`,
    `section`.`TuesdayStart`, `section`.`TuesdayEnd`,
    `section`.`WednesdayStart`, `section`.`WednesdayEnd`,
    `section`.`ThursdayStart`, `section`.`ThursdayEnd`,
    `section`.`FridayStart`, `section`.`FridayEnd`
    FROM programRequirements, course, section, programs, semester
    WHERE ((`course`.`ClassID` = `programRequirements`.`ClassID`)
    AND (`section`.`SectionNumber` = `course`.`SectionNumber`)
    AND (`programs`.`ProgramName` = '".$_SESSION["programs"]."')
    AND (`semester`.`SemesterName` = '".$_SESSION["semester"]."'))");

    $_SESSION["results"] = $results; //Puts results into session variable to send to next page
    //Send to next page
    header("Location: calendar_processed.php");
    exit();
    ob_end_flush();
?>