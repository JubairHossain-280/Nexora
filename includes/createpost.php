<?php
session_start();
$get_user_id = $_SESSION['id'];

include 'connection.php';

$input_post_context = trim($_POST['post-context']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($input_post_context !== '' || (isset($_FILES['post-media']) && is_uploaded_file($_FILES['post-media']['tmp_name'])))) {
    $post_context = mysqli_real_escape_string($conn,$input_post_context);
    $post_media = $_FILES['post-media'];
    $post_file_base_name = uniqid() . $post_media['name'];
    $post_file_new_name = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $post_file_base_name);
    $post_file_tmp_name = $post_media['tmp_name'];
    $post_file_type = $post_media['type'];
    $post_file_size = $post_media['size'];
    $max_size = 50 * 1024 * 1024;
    $allowed_types = ['image/png', 'image/jpg', 'image/jpeg', 'image/svg', 'video/mp4', 'video/webm', 'video/ogg'];
    $post_file_upload_dir = '../uploads/posts/' . $post_file_new_name;

    if ($post_media && $post_context === '') {
        if (!in_array($post_file_type, $allowed_types)) {
            echo "<script>alert('Unsupported File Type!!')
            window.location = '../index.php';
        </script>";
            exit();
        } else {
            if ($post_file_size > $max_size) {
                echo "<script>alert('File size exceeds the limit./n Maximun File Size is 50MB.')
            window.location = '../index.php';
        </script>";
                exit();
            } else {
                $mime = mime_content_type($post_file_tmp_name);
                // Define Media Type
                if (strpos($mime, 'image') !== false) {
                    $post_file_media_type = 'image';
                } elseif (strpos($mime, 'video') !== false) {
                    $post_file_media_type = 'video';
                }

                if (move_uploaded_file($post_file_tmp_name, $post_file_upload_dir)) {
                    $query1 = "INSERT INTO `posts`(`user_id`, `post_media`, `media_type`) VALUES ('$get_user_id','uploads/posts/$post_file_new_name','$post_file_media_type')";
                    $exeQuery1 = mysqli_query($conn, $query1);

                    if ($exeQuery1) {
                        echo "<script>alert('Post has been created sucessfully!!')
                            window.location = '../index.php'
                        </script>";
                        exit();
                    }
                }
            }
        }
    } else if ($post_context && !is_uploaded_file($post_media['tmp_name'])) {
        $query2 = "INSERT INTO `posts`(`user_id`, `post_context`) VALUES ('$get_user_id','$post_context')";
        $exeQuery2 = mysqli_query($conn, $query2);

        if ($exeQuery2) {
            echo "<script>alert('Post has been created sucessfully!!')
                        window.location = '../index.php'
                    </script>";
            exit();
        }
    } else {
        if (!in_array($post_file_type, $allowed_types)) {
            echo "<script>alert('Unsupported File Type!!')
            window.location = '../index.php';
        </script>";
            exit();
        } else {
            if ($post_file_size > $max_size) {
                echo "<script>alert('File size exceeds the limit./n Maximun File Size is 50MB.')
            window.location = '../index.php';
        </script>";
                exit();
            } else {
                $mime2 = mime_content_type($post_file_tmp_name);
                // Define Media Type
                if (strpos($mime2, 'image') !== false) {
                    $post_file_media_type2 = 'image';
                } elseif (strpos($mime2, 'video') !== false) {
                    $post_file_media_type2 = 'video';
                }

                if (move_uploaded_file($post_file_tmp_name, $post_file_upload_dir)) {
                    $query3 = "INSERT INTO `posts`(`user_id`, `post_context`, `post_media`, `media_type`) VALUES ('$get_user_id','$post_context','uploads/posts/$post_file_new_name','$post_file_media_type2')";
                    $exeQuery3 = mysqli_query($conn, $query3);
                    if ($exeQuery3) {
                        echo "<script>alert('Post has been created sucessfully!!')
                                window.location = '../index.php'
                            </script>";
                        exit();
                    }
                }
            }
        }
    }
} else {
    echo "<script>
        alert('Post cannot be empty!!')
        window.location = '../index.php'
    </script>";
    exit();
}

?>