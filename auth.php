<?php

session_start();

$user = false;

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/db_conn.php";

    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } 
    // else {
    //     $user = false;
    // }
    $username = $_SESSION["user_id"];

    $query = "SELECT admin FROM user WHERE id = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $user_admin_status = $row['admin'];

        if ($user_admin_status == 1) {
            $_SESSION['admin'] = 1;
        } else {
            $_SESSION['admin'] = 0;
        }
    } 
}