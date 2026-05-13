<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $newpassword = $_POST['newpassword'];

    // Hash new password
    $hashed_password = password_hash(
        $newpassword,
        PASSWORD_DEFAULT
    );

    // Check user exists
    $check = "SELECT * FROM users
              WHERE email='$email'";

    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) > 0){

        // Update password
        $sql = "UPDATE users
                SET password='$hashed_password'
                WHERE email='$email'";

        if(mysqli_query($conn,$sql)){

            echo "Password Updated Successfully!";

            header("refresh:2;url=login.html");

        }else{

            echo mysqli_error($conn);
        }

    }else{

        echo "Email Not Found!";
    }
}

?>