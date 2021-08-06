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
    //Fetch Query limiting by prereqs
    $results = mysqli_query($conn, 
    "SELECT DISTINCT `course` . *,
    `section`.`SectionID`,
    `section`.`MondayStart`, `section`.`MondayEnd`,
    `section`.`TuesdayStart`, `section`.`TuesdayEnd`,
    `section`.`WednesdayStart`, `section`.`WednesdayEnd`,
    `section`.`ThursdayStart`, `section`.`ThursdayEnd`,
    `section`.`FridayStart`, `section`.`FridayEnd`,
    `class`.`ClassDescription`, `class`.`ClassName`
    FROM programRequirements, course, section, programs, semester, classPrereqs, class
    WHERE ((`course`.`ClassID` = `programRequirements`.`ClassID`)
    AND (`section`.`SectionNumber` = `course`.`SectionNumber`)
    AND (`programRequirements`.`ProgramCode` = `programs`.`ProgramCode`)
    AND (`programs`.`ProgramName` = '".$_SESSION["programs"]."')
    AND (`semester`.`SemesterName` = '".$_SESSION["semester"]."')
    AND (`classPrereqs`.`ClassID` = `course`.`ClassID`)
    AND (`classPrereqs`.`ClassPreReq` IS NULL)
    AND (`course`.`ClassID` = `class`.`ClassID`))");
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="icon" href=""> <!-- Create favicon? - JK -->
   <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" /> <!-- For calendar structure - BS -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- Need for js - JK --> 
   <!-- NOTE: Order of script here matters for both calendar and dropdowns to work. - BS -->
   <script src="fullcalendar/lib/moment.min.js"></script> <!-- For calendar structure - BS -->
   <script src="fullcalendar/fullcalendar.min.js"></script> <!-- For calendar structure - BS -->  
   <title>Calendar Beta 1.0</title> 
</head>

<body>
    <div id="all">

<link rel="stylesheet" href="css/styles.css">

<header style="color: white"> <!--This font color only works as in-line, please don't move to css - CR -->
JCC Calendar
</header>

<nav>
    <form action="calendar_processed.php" method="POST">
        <strong>
        <label for="degree">Degree Type: </label>
        <select id="degree" name="degree" required> <!-- Choose Degree - JK --> 
            <option value="" selected disabled hidden>choose degree type</option>
            <option value="transfer">Transfer</option>
            <option value="career">Career</option>
        </select>
        <label for="programs">Program of Study: </label> <!-- Select program will update based on java script -JK -->   
        <select id="programs" name="programs" required>
            <option value="" selected disabled hidden>choose program</option>
        </select>
        <label for="semester">Semester: </label> <!-- Select Semester - JK --> 
        <select id="semester" name="semester" required>
            <option value="" selected disabled hidden>choose semester</option>
            <option value="Spring 2021">Spring 2021</option>
            <option value="Summer 2021">Summer 2021</option>
            <option value="Fall 2021">Fall 2021</option>
            <option value="Winter 2021">Winter 2021</option>
        </select>
    </strong>
        <input type="reset" onclick="resetForm()" value="reset"> <!-- Reset input calling function below in script - JK --> 
        <input type="submit" value="submit">
    </form>
</nav>

<script>
    //Generate dropdown based on degree choice - JK
    $(document).ready(function() { 
    $("#degree").change(function() {
        switch($(this).val()) {
            case 'transfer':
                $("#programs").html("<option value='' selected disabled hidden>Choose Program</option><option value='Accounting'>Accounting A.S</option><option value='Allied Health & Biological Sciences'>Allied Health & Biological Sciences A.S.</option><option value='Business Administration'>Business Administration A.S.</option><option value='usiness Administraction (SUNY Potsdam)'>Business Administraction (SUNY Potsdamn) A.S./B.S.</option><option value='Childhood Education (SUNY Potsdam)'>Childhood Education (SUNY Potsdam) A.A./B.A.</option><option value='Childhood Education (Teacher Education Transfer)'>Childhood Education (Teacher Education Transfer) A.A.</option><option value='Computer Information Systems'>Computer Information Systems A.S.</option><option value='Computer Science'>Computer Science A.S.</option><option value='Creative Writing'>Creative Writing A.A.</option><option value='Criminal Justice'>Criminal Justice A.S.</option><option value='Early Childhood'>Early Childhood A.S.</option><option value='Engineering Science'>Engineering Science A.S.</option><option value='Health Care Management'>Health Care Management A.S.</option><option value='Homeland Security'>Homeland Security A.S.</option><option value='Human Services'>Human Services A.S.</option><option value='Humanities & Social Sciences'>Humanities & Social Sciences A.A.</option><option value='Individual Studies'>Individual Studies A.A.S./A.S./A.A.</option><option value='Literature Concentration'>Literature Concentration A.A.</option><option value='Mathematics'>Mathematics A.S.</option><option value='Physical Education'>Physical Education A.S.</option><option value='Physical Science Concentration'>Physical Science Concentration A.S.</option><option value='Psychology Concentration'>Psychology Concentration A.A.</option><option value='Sports Management'>Sports Management A.S.</option>");
                break;
            case 'career':
                $("#programs").html("<option value='' selected disabled hidden>Choose Program</option><option value='Accounting'>Accounting A.A.S.</option><option value='Accounting Certificate'>Accounting Certificate</option><option value='Agri-Business'>Agri-Business A.A.S.</option><option value='Applied Business Studies'>Applied Business Studies A.O.S.</option><option value='Business Administration'>Business Administration A.A.S.</option><option value='Chemical Dependency'>Chemical Dependency A.A.S.</option><option value='Computer Information Technology'>Computer Information Technology A.A.S.</option><option value='Criminal Justice Certificate'>Criminal Justice Certificate</option><option value='Chemical Dependency Certifice'>Chemical Dependency Certifice</option><option value='Culinary Arts Concentration'>Culinary Arts Concentration A.A.S</option><option value='Early Childhood'>Early Childhood A.A.S</option><option value='Early Childhood Certificate'>Early Childhood Certificate</option><option value='Fire Protection Technology'>Fire Protection Technology A.A.S</option><option value='Hospitality & Tourism Certifice'>Hospitality & Tourism Certifice</option><option value='Hotel/Restaurant Management Concentration'>Hotel/Restaurant Management Concentration A.A.S.</option><option value='Nursing'>Nursing A.A.S.</option><option value='Office Studies Certificate'>Office Studies Certificate</option><option value='Office Technologies - Administrative Assistant'>Office Technologies - Administrative Assistant A.A.S.</option><option value='Office Technologies - Medical'>Office Technologies - Medical A.A.S.</option><option value='Paralegal'>Paralegal A.A.S.</option><option value='Winery Management and Marketing Concentration'>Winery Management and Marketing Concentration A.A.S.</option><option value='Winery Management and Marketing Certificate'>Winery Management and Marketing Certificate</option><option value='Teaching Assistant Certificate'>Teaching Assistant Certificate</option><option value='Zoo Tehcnology'>Zoo Tehcnology A.A.S.</option>");
                break;
            default:
                $("#programs").html("<option value='' selected disabled hidden>Choose Program</option>");
            }
        });
    });
    //Function to reset form by changing html in programs back to the state that it once was - JK
    function resetForm() {
        document.getElementById("programs").innerHTML =
                    "<option value='' selected disabled hidden>Choose Degree Type</option>";
    }
</script>


<section>
<div class="response"></div>
    <div id='calendar'></div>
    <!-- Calendar Script - BS -->
    <script>
      $(document).ready(function () 
          {			
          var calendar = $('#calendar').fullCalendar({
            eventClick: function(calEvent, jsEvent, view) {
                document.getElementById("classdetails").innerHTML = "<p style = 'font-size: 14px; padding: 5px;'>" + calEvent.title + "</p>" + "<p style = 'font-size: 14px; padding: 5px;'>" + calEvent.description + "</p>";
            },
          allDay : false,
          hiddenDays: [0,6],
          events: [
            <?php
            while($row = mysqli_fetch_assoc($results)) 
            {echo 
                "{
                  title: '".$row["ClassID"]." ".$row["SectionID"]."',
                  dow: [ '1' ],
                  start: '".$row["MondayStart"]."',
                  end: '".$row["MondayEnd"]."',
                  description: '".$row["ClassDescription"]."'
                },
                {
                  title: '".$row["ClassID"]." ".$row["SectionID"]."',
                  dow: [ '2' ],
                  start: '".$row["TuesdayStart"]."',
                  end: '".$row["TuesdayEnd"]."',
                  description: '".$row["ClassDescription"]."'
                },
                {
                  title: '".$row["ClassID"]." ".$row["SectionID"]."',
                  dow: [ '3' ],
                  start: '".$row["WednesdayStart"]."',
                  end: '".$row["WednesdayEnd"]."',
                  description: '".$row["ClassDescription"]."'
                },
                {
                  title: '".$row["ClassID"]." ".$row["SectionID"]."',
                  dow: [ '4' ],
                  start: '".$row["ThursdayStart"]."',
                  end: '".$row["ThursdayEnd"]."',
                  description: '".$row["ClassDescription"]."'
                },
                {
                  title: '".$row["ClassID"]." ".$row["SectionID"]."',
                  dow: [ '5' ],
                  start: '".$row["FridayStart"]."',
                  end: '".$row["FridayEnd"]."',
                  description: '".$row["ClassDescription"]."'
                },
              ";}
          ?>
          ],
          });
        });
    </script>
</section>

<div class='hflex'>
    <aside>
        <h1>Classes</h1>
        <table>
        <tr>
            <th><br>CRN</th>
            <th><br>Class</th>
            <th><br>Section</th>
            <th>Monday<br>Start</th>
            <th><br>End</th>
            <th>Tuesday<br>Start</th>
            <th><br>End</th>
            <th>Wednesday<br>Start</th>
            <th><br>End</th>
            <th>Thursday<br>Start</th>
            <th><br>End</th>
            <th>Friday<br>Start</th>
            <th><br>End</th>
        </tr>
        <?php

		//Fetch Query limiting by prereqs
        $results = mysqli_query($conn, 
        "SELECT DISTINCT `course` . *,
        `section`.`SectionID`,
        `section`.`MondayStart`, `section`.`MondayEnd`,
        `section`.`TuesdayStart`, `section`.`TuesdayEnd`,
        `section`.`WednesdayStart`, `section`.`WednesdayEnd`,
        `section`.`ThursdayStart`, `section`.`ThursdayEnd`,
        `section`.`FridayStart`, `section`.`FridayEnd`
        FROM programRequirements, course, section, programs, semester, classPrereqs
        WHERE ((`course`.`ClassID` = `programRequirements`.`ClassID`)
        AND (`section`.`SectionNumber` = `course`.`SectionNumber`)
        AND (`programRequirements`.`ProgramCode` = `programs`.`ProgramCode`)
        AND (`programs`.`ProgramName` = '".$_SESSION["programs"]."')
        AND (`semester`.`SemesterName` = '".$_SESSION["semester"]."')
        AND (`classPrereqs`.`ClassID` = `course`.`ClassID`)
        AND (`classPrereqs`.`ClassPreReq` IS NULL))");

        while($row = mysqli_fetch_assoc($results)) {echo "<tr><td>".$row["SectionNumber"]."</td><td>".$row["ClassID"]."</td><td>".$row["SectionID"]."</td><td>".$row["MondayStart"]."</td><td>".$row["MondayEnd"]."</td><td>".$row["TuesdayStart"]."</td><td>".$row["TuesdayEnd"]."</td><td>".$row["WednesdayStart"]."</td><td>".$row["WednesdayEnd"]."</td><td>".$row["ThursdayStart"]."</td><td>".$row["ThursdayEnd"]."</td><td>".$row["FridayStart"]."</td><td>".$row["FridayEnd"]."</td></tr>";}
        ?>
      </table>
    </aside>
    <div class='vflex'>
    <article>
        <h1>Class Details</h1>
        <p id="classdetails"></p>
    </article>
</div>
    </div>
</body>

</html>

