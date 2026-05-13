<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check email already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){

        echo "Email already exists!";

    } else {

        // Password hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $sql = "INSERT INTO users(username, email, password)
                VALUES('$username', '$email', '$hashed_password')";

       if(mysqli_query($conn, $sql)){

    echo "Signup Successful!";
    header("refresh:2;url=login.html");

} else {

    echo mysqli_error($conn);
}
    }
}

?>