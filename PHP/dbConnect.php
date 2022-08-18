<?php

$conn = mysqli_connect("localhost", "root", "", "final_project_it");
if($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

?>