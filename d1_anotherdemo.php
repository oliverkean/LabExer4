<?php include "header.php"; ?>
<body>
    <?php
        $x = 2022;
        $msg = "Hello";
        
        echo "<b>$msg</b> $x";
        echo "<b>$msg</b>" . $x;
    
        include "footer.php";
    ?>
</body>