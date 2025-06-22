<?php 
    include "connection.php";

    $query = "INSERT INTO `comments`(`post_id`, `user_id`, `comment_text`) VALUES ('[value-1]','[value-2]','[value-3]')";
    $exeQuery = mysqli_query($conn, $query);
    
?>