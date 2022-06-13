<?php include "header.php"; ?>
<body>
    <?php
        // global variables
        $ageNow = 19;
        $ageGrad = 22;

        // function
        function remainingYears(){
            global $ageNow, $ageGrad;
            $collegeYears = $ageGrad - $ageNow;
            echo $collegeYears . " years left before graduation<br>";
        }

        remainingYears();
        remainingYears();
        remainingYears();
        remainingYears();
        remainingYears();
    
    include "footer.php";
?>