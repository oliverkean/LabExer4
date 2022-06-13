<?php include "header.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Palgue, Oliver Kean L."> 
    <title>Regular Expression | Palgue</title>
</head>
<body>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">

    Enter text: <input type="text" name="txt">
    <input type="submit">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $checktxt = $_REQUEST['txt'];
            //$pattern = "/[a-z]/m";
            //$pattern = "/0-9/i";
            //$pattern = "/^santos/i";
            //$pattern = "/santos\$/i";
            //$pattern = "/b{2}c{3}/i";
            //$pattern = "/[a-z]{3}b{2}c{3}z/i";
            $pattern = "/reg(ex|exps)/i";
            $pattern = "/[a-zA-Z0-9_]*@/";

            if(preg_match($pattern, $checktxt)){
                echo "text matched";
            }
            else{
                echo "text did not match, please enter a valid email";
            }
        }
    include "footer.php";
?>
