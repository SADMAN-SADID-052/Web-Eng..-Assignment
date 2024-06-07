<?php
$gradePoints = array(
    'A+' => 4.00,
    'A' => 3.75,
    'A-' => 3.50,
    'B+' => 3.25,
    'B' => 3.00,
    'B-' => 2.75,
    'C+' => 2.50,
    'C' => 2.25,
    'D' => 2.00,
    'F' => 0.00
);

$gradeCutoffs = array(
    'A+' => 90,
    'A' => 80,
    'A-' => 75,
    'B+' => 70,
    'B' => 65,
    'B-' => 60,
    'C+' => 55,
    'C' => 50,
    'D' => 45,
    'F' => 0
);

$courseList = array(
    array('courseCode' => 'CSE-2201', 'creditHours' => 3),
    array('courseCode' => 'CSE-2202', 'creditHours' => 1.5),
    array('courseCode' => 'CSE-2203', 'creditHours' => 3),
    array('courseCode' => 'CSE-2205', 'creditHours' => 3),
    array('courseCode' => 'CSE-2207', 'creditHours' => 3),
    array('courseCode' => 'CSE-2208', 'creditHours' => 1.5),
    array('courseCode' => 'CSE-2210', 'creditHours' => 3),
    array('courseCode' => 'MATH-2211', 'creditHours' => 3)
);

$studentMarks = array(
    array('courseCode' => 'CSE-2201', 'marksObtained' => 90),
    array('courseCode' => 'CSE-2202', 'marksObtained' => 60),
    array('courseCode' => 'CSE-2203', 'marksObtained' => 80),
    array('courseCode' => 'CSE-2205', 'marksObtained' => 65),
    array('courseCode' => 'CSE-2207', 'marksObtained' => 83),
    array('courseCode' => 'CSE-2208', 'marksObtained' => 72),
    array('courseCode' => 'CSE-2210', 'marksObtained' => 80),
    array('courseCode' => 'MATH-2211', 'marksObtained' => 52)
);

function calculateCGPA($studentMarks, $gradePoints, $gradeCutoffs, $courseList)
{
    $totalWeightedGradePoints = 0;
    $totalCreditHours = 0;

    foreach ($studentMarks as $studentMark) 
    {
        $marksObtained = $studentMark['marksObtained'];
        $courseCode = $studentMark['courseCode'];

      
        $calculatedGradePoint = 0.00; 
        foreach ($gradeCutoffs as $grade => $cutoff) 
        {
            if ($marksObtained >= $cutoff) {
                $calculatedGradePoint = $gradePoints[$grade];
                break;
            }
        }

     
        $courseCreditHours = 0;
        foreach ($courseList as $course) 
        {
            if ($course['courseCode'] === $courseCode) 
            {
                $courseCreditHours = $course['creditHours'];
                break;
            }
        }

        
        $weightedGradePoints = $calculatedGradePoint * $courseCreditHours;

        $totalWeightedGradePoints += $weightedGradePoints;
        $totalCreditHours += $courseCreditHours;
    }

   
    $cgpa = $totalWeightedGradePoints / $totalCreditHours;

    return $cgpa;
}

$calculatedCGPA = calculateCGPA($studentMarks, $gradePoints, $gradeCutoffs, $courseList);

echo "CGPA: " . number_format($calculatedCGPA, 2);
?>
