<?php include "header.php"; ?>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="number" name="txtnum1" placeholder="Enter num 1">
        <input type="number" name="txtnum2" placeholder="Enter num 2">
        <input type="submit">
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $n1 = $_REQUEST['txtnum1'];
            $n2 = $_REQUEST['txtnum2'];

            if(empty($n1) || empty($n2)){
                echo "Enter a number";
            }
            else{
                $sum = $n1 + $n2;
                echo $sum;
            }
        }
    echo "<br>";
    echo "<br>";
    include "footer.php";
?>

