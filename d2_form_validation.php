<?php include "header.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Palgue, Oliver Kean L."> 
    <title>Form Validation | Palgue</title>

    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    
    <h1>Form Validation</h1>
    <p><span class="error">Required field</span></p>


    <?php  
        $name = $email = $gender = $comment = $website = "";
        $name_error = $email_error = $gender_error = $website_error = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            //name
            if(empty($_POST['name'])){
                $name_error = "Name is required";
            }
            else{
                $name = clean_data($_POST['name']);

                // checks if name has letters and white spaces
                $name_pattern = "/^[a-zA-Z-' ]*$/i";
                if(!preg_match($name_pattern, $name)){
                    $name_error = "Name should only be letters and white spaces";
                }
            }

            //email
            if(empty($_POST['email'])){
                $email_error = "Email is required";
            }else{
                $email = clean_data($_POST['email']);

                // checks if email is valid
                $email_pattern = "/[a-zA-Z0-9_]@/";
                if(!preg_match($email_pattern,$email)){
                    $email_error = "Email is invalid";
                }
            }

            //website
            if(empty($_POST['website'])){
                $website_error = "Website is required";
            }else{
                $website = clean_data($_POST['website']);

                // checks if website is valid
                $website_pattern = "/((https|http):\/\/|www.)[a-zA-Z0-9-.\/\_ ].[a-zA-Z]/i";
                if(!preg_match($website_pattern,$website)){
                    $website_error = "The Website is invalid";
                }
            }

            //gender
            if(empty($_POST['gender'])){
                $gender_error = "Gender is required";
            }
            else{
                $gender = clean_data($_POST['gender']);
            }
        }

        function clean_data($user_input){
            $user_input = trim($user_input);
            $user_input = stripslashes($user_input);
            $user_input = htmlspecialchars($user_input);
            return $user_input;
        }
    ?>

    <form method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $name_error; ?></span><br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $email_error; ?></span><br><br>

        Website: <input type="text" name="website" value="<?php echo $website;?>">
        <span class="error">* <?php echo $website_error; ?></span><br><br>

        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br><br>

        Gender:
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
        value="female">Female
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        value="male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="other") echo "checked";?>
        value="other">Other
        <span class="error">* <?php echo $gender_error; ?></span><br><br>
        
        <input type="submit" name="submit">
    </form>

<?php include "footer.php"; ?>