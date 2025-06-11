<?php
session_start();
$user_id = $_SESSION['id'];

// DATABASE CONNECTION
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['story'])) {
    $story_file = $_FILES['story'];
    $base_story_file_name = uniqid() . basename($story_file['name']);
    $new_story_file_name = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $base_story_file_name);
    $story_file_tmp_name = $story_file['tmp_name'];
    $story_file_size = $story_file['size'];
    $story_file_type = mime_content_type($story_file_tmp_name);
    $story_upload_dir = '../uploads/stories/' . $new_story_file_name;

    // RECOMMENDED SIZE & TYPE FOR STORY
    $allowed_types = ['video/mp4', 'video/webm', 'video/ogg'];
    $max_file_size = 50 * 1024 * 1024;

    if (!in_array($story_file_type, $allowed_types)) {
        echo "<script>alert('Unsupported File Type.')
        window.location.href = '../createstory.php';
        </script>";
        exit();
    } else {
        if ($story_file_size > $max_file_size) {
            echo "<script>alert('File size exceeds the limit./n Maximun File Size is 50MB.')
            window.location.href = '../createstory.php';
            </script>";
            exit();
        } else {
            if (move_uploaded_file($story_file_tmp_name, $story_upload_dir)) {
                $query = "INSERT INTO `stories`(`user_id`, `story_path`) VALUES ('$user_id','uploads/stories/$new_story_file_name')";
                if (mysqli_query($conn, $query)) {
                    header('location: ../createstory.php');
                }
            }
        }
    }


}

?>