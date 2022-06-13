<?php include "header.php";?>
    <style>
        span{
            color:red;
        }
    </style>

<body>
    <?php
    $first_name = $last_name = $middle_name = $contact = $email = $address = $pass = $cpass = "";
    $fname_error = $lname_error = $contact_error = $email_error = $address_error = $pass_error = $cpass_error = "";
    $name_pattern = "/[a-zA-Z- ]/i";
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
        // first name    
        if(empty($_POST['input_fname'])){
            $fname_error = "Required field please enter your First Name";
        }else{
            $first_name = clean_data($_POST['input_fname']);
            if(!preg_match($name_pattern, $first_name)){
                $fname_error = "Name should only contain letters, and white spaces only";
            }
        }


        // last name
        if(empty($_POST['input_lname'])){
            $lname_error = "Required field please enter your Last Name";
        }else{
            $first_name = clean_data($_POST['input_lname']);
            if(!preg_match($name_pattern, $last_name)){
                $lname_error = "Name should only contain letters, and white spaces only";
            }
        }

        //contacts
        if(empty($_POST['input_contacts'])){
            $contact_error = "Required field please enter your Contact Number";
        }else{
            $contact = clean_data($_POST['input_contacts']);


            //checks length
            $numberlength = strlen($contact);
            if($numberlength <10){
                $contact_error = "Number is invalid";
            }elseif($numberlength >12 ){
                $contact_error = "Number is invalid";
            }

            //checks pattern 
            $number_pattern = "/((09|639)[0-9])/";
            if(!preg_match($number_pattern, $contact)){
                $contact_error = "Number is invalid";
            }
        }

        //email
        if(empty($_POST['input_email'])){
            $email_error = "Required field please enter your Email";
        }else{
            $email = clean_data($_POST['input_email']);
            $email_pattern = "/[a-zA-Z0-9_]@/";
            if(!preg_match($email_pattern, $email)){
                $email_error = "Email is invalid";
            }
        }

        //address
        if(empty($_POST['input_address'])){
            $address_error = "Required field please enter your Address";
        }else{
            $address = clean_data($_POST['input_address']);
        }

        //password
        if(empty($_POST['input_password'])){
            $pass_error = "Required field, enter your password";
        }else{
            $pass = clean_data($_POST['input_password']);
            $pass_pattern = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#%&*<>?])/";
            
            //checks password length
            $passlength = strlen($pass);
            if($passlength <= 8){
            $pass_error = "Password must have more than 8 characters";
            }
            elseif(!preg_match($pass_pattern , $pass)){
                $pass_error = "Password must contain at least 1 Uppercase Letter, 1 lower case letter, 1 number, and 1 special character.";
            }
        }

        //confirm password
        if($pass != $_POST['input_cpass']){
            $cpass_error = "Please confirm password";
        }else{
            $cpass = clean_data($_POST['input_cpass']);
        }
}
        

        
        function clean_data($user_input){
                $user_input = trim($user_input);
                $user_input = stripslashes($user_input);
                $user_input = htmlspecialchars($user_input);
                return $user_input;
        }




    ?>
    

    
    <h1>Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    
    First Name: <input type="text" name="input_fname" value="<?php echo $first_name; ?>">
    <span> * <?php echo $fname_error; ?></span><br><br>

    Last Name: <input type="text" name="input_lname" value="<?php echo $last_name;?>" >
    <span> * <?php echo $lname_error ?></span><br><br>

    Middle Name: <input type="text" name="input_mname" value="<?php echo $middle_name;?>" >
    <br><br>

    Contact Number: <input type="text" name="input_contacts" value="<?php echo $contact;?>" >
    <span> * <?php echo $contact_error; ?></span><br><br>

    E-mail: <input type="text" name="input_email" value="<?php echo $email;?>">
        <span>* <?php echo $email_error; ?></span><br><br>

    Address: <input type="text" name="input_address" value="<?php echo $address;?>">
    <span>* <?php echo $address_error; ?></span><br><br>

    Password: <input type="password" name="input_password" value="<?php echo $pass;?>">
    <span>* <?php echo $pass_error; ?></span><br><br>

    Confirm Password: <input type="password" name="input_cpass" value="<?php echo $cpass;?>">
    <span>* <?php echo $cpass_error; ?></span><br><br>


    <input type="submit">

</form>

    
<?php include "footer.php"?>