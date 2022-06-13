<?php include "header.php"; ?>
<body>
    <?php
    $t = date("H");
    echo "<p>The hour (of the server) is " . $t;
    echo ", and will give the following message: </p>";

    if($t < "10"){
        echo "Have a good morning";
    }elseif($t < "20"){
        echo "Have a good day";
    }else{
        echo "Have a good night";
    }

    echo "<br>";
    
    $colors = array("red", "blue", "yellow");
    foreach ($colors as $value){
        echo $value ."<br>";
    }
    
    include "footer.php";
?>
