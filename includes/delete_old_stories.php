<?php 
    include 'connection.php';

    $deleteQuery = "DELETE FROM `stories` WHERE `created_at` < NOW() - INTERVAL 1 DAY";
    mysqli_query($conn,$deleteQuery);
?>