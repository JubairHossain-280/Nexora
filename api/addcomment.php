<?php
session_start();
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check all required inputs
    if (isset($_POST['post_id']) && isset($_POST['comment']) && isset($_SESSION['id'])) {
        $comment = trim($_POST['comment']);
        $postId = intval($_POST['post_id']);
        $userId = $_SESSION['id'];

        // Validate input
        if (!empty($comment) && $postId > 0 && $userId > 0) {
            // Prepare SQL insert
            $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, comment_text) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $postId, $userId, $comment);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Comment added successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add comment.']);
            }

            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing fields.']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
