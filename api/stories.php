<?php
session_start();

$get_user_id = $_SESSION['id'];
// DATABASE CONNECTIOIN
include '../includes/connection.php';

$query = "SELECT * FROM `stories` WHERE `user_id` = '$get_user_id' AND `created_at` >= NOW() - INTERVAL 1 DAY ORDER BY `created_at` DESC";

$result = mysqli_query($conn, $query);

$stories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $stories[] = $row;

}

// echo "<h1>STORIES API ENDPOINT</h1>";
echo json_encode($stories);
?>