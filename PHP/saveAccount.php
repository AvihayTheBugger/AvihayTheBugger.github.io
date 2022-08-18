<?php
    include 'dbConnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $encripted_password = sha1($password);

    $sql = " INSERT INTO `user` (`user_name`, `password`, `first_name`, `last_name`)
    VALUES ('$username', '$encripted_password', '$first_name', '$last_name')";
    

    if(mysqli_query($conn, $sql)) {
        echo "Success";
    }
    else {
        echo "Failed";
    }

    mysqli_close($conn);

?>