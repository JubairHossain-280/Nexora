<?php
include '../includes/connection.php';

if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
    $commentsQuery = "  SELECT c.*, u.username, u.profile_image 
                        FROM comments c 
                        JOIN users u ON c.user_id = u.id 
                        WHERE c.post_id = $postId 
                        ORDER BY c.created_at ASC
                    ";

    $result = mysqli_query($conn, $commentsQuery);
    $comments = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = [
            'username' => $row['username'],
            'profile_image' => $row['profile_image'] ?: 'assets/img/profile.jpg',
            'comment_text' => htmlspecialchars($row['comment_text']),
            'created_at' => $row['created_at']
        ];
    }

    echo json_encode($comments);
}
?>