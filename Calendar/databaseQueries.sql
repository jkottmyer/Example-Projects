/*Get's Class Information to Display to Calendar*/
SELECT  `course` . *,
        `section`.`MondayStart`, `section`.`MondayEnd`,
        `section`.`TuesdayStart`, `section`.`TuesdayEnd`,
        `section`.`WednesdayStart`, `section`.`WednesdayEnd`,
        `section`.`ThursdayStart`, `section`.`ThursdayEnd`,
        `section`.`FridayStart`, `section`.`FridayEnd`
FROM programRequirements, course, section
WHERE ((`course`.`ClassID` = `programRequirements`.`ClassID`)
AND (`section`.`SectionNumber` = `course`.`SectionNumber`))
LIMIT 0 , 100

SELECT  `course` . *,
        `section`.`MondayStart`, `section`.`MondayEnd`,
        `section`.`TuesdayStart`, `section`.`TuesdayEnd`,
        `section`.`WednesdayStart`, `section`.`WednesdayEnd`,
        `section`.`ThursdayStart`, `section`.`ThursdayEnd`,
        `section`.`FridayStart`, `section`.`FridayEnd`
FROM programRequirements, course, section, programs, semester
WHERE ((`course`.`ClassID` = `programRequirements`.`ClassID`)
AND (`section`.`SectionNumber` = `course`.`SectionNumber`)
AND (`programs`.`ProgramName` = "Computer Information Systems")
AND (`semester`.`SemesterName` = "Spring 2021"))

/*Added way to limit based on our input values*/
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
    AND (`course`.`ClassID` = `class`.`ClassID`))"

/*Limit by prereqs*/