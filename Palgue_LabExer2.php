<?php include "header.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator | Palgue</title>
</head>
<body>
    <h1>BMI Calculator</h1>

    <!-- input -->
    <!-- <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <-no error --> 
    
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <input type="number" name="input_height" placeholder="Enter your Height in cm">
        
        <br><br>
        <input type="number" name="input_weight" placeholder="Enter Weight in kg">
        
        <br><br>
        <input type="submit" value="Compute BMI">
    </form>

    <br>
    <!-- end of input -->


    <?php
        //if($_SERVER["REQUEST_METHOD"] == "POST") <-- no error

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $height = $_REQUEST['input_height'];
            $weight = $_REQUEST['input_weight'];
            $bmi;

            if(empty($height) || empty($weight)){
                echo "Enter the following";
            }

            // computing and checking
            else{
                $bmi = ($weight / $height / $height) * 10000;
                echo "Your BMI is: " . round($bmi,1);
                echo "<br>";
                // end of computation

                // checks categories
                if($bmi < 18.5){
                    echo "Category: Underweight";
                }
                elseif($bmi >18.5 && $bmi <=24.9){
                    echo "Category: Normal";
                }
                elseif($bmi >25 && $bmi <=29.9){
                    echo "Category: Overweight";
                }
                elseif($bmi >= 30){
                    echo "Category: Obesity";
                }
                // end of checking
            }
        }   
    // formula reference https://www.cdc.gov/nccdphp/dnpao/growthcharts/training/bmiage/page5_1.html#:~:text=With%20the%20metric%20system%2C%20the,by%2010%2C000%2C%20can%20be%20used.
    ?>
<?php include "footer.php"; ?>