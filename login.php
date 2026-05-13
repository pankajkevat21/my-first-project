<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";

   $result = mysqli_query($conn, $sql);

if(!$result){
    die(mysqli_error($conn));
}

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        // Verify password
        if(password_verify($password, $user['password'])){

            $_SESSION['username'] = $user['username'];

            header("Location: index.html");
            exit();

        } else {

            echo "Wrong Password!";
        }

    } else {

        echo "User Not Found!";
    }
}

?>