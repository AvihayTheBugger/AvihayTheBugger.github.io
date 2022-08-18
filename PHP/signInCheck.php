<?php
    include 'dbConnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $Encripted_Password = sha1($password);



    $sql = $sql = " SELECT * from `user` where user_name = '".$username."' AND password = '".$Encripted_Password."' ";

    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0) {
        $sql = " UPDATE `user` SET `last_login` = now() WHERE user_name = '".$username."' ";
        mysqli_query($conn, $sql);
        echo "Success";
    }

    else {
        echo "Not Found";
    }

    mysqli_close($conn);

?>