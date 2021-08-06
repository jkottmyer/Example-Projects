<?php
    ob_start();
    session_start();
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

    </div>
</body>
</html>


