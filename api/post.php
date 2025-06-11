<?php 
    include '../includes/connection.php';

    $query = "SELECT * FROM `posts` ORDER BY `created_at` DESC";
    $result = mysqli_query($conn,$query);

    $posts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    echo json_encode($posts);

?>