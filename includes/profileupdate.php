<?php
session_start();
$userId = $_SESSION['id'];
// DATABASE CONNECTION
include 'connection.php';

// SET USER PROFILE PICTURE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profilePic'])) {
    $profile_file = $_FILES['profilePic'];
    $base_profile_file_name = uniqid() . $profile_file['name'];
    $new_profile_file_name = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $base_profile_file_name);
    $profile_tmp_name = $profile_file['tmp_name'];
    $profile_upload_dir = '../uploads/profiles/' . $new_profile_file_name;

    if (move_uploaded_file($profile_tmp_name, $profile_upload_dir)) {
        $query = "UPDATE `users` SET `profile_image`= ('uploads/profiles/$new_profile_file_name') WHERE `id` = $userId";
        $exeQuery = mysqli_query($conn, $query);
        if ($exeQuery) {
            $selectUpdatedProfile = "SELECT `profile_image` FROM `users` WHERE `id` = $userId";
            $exeSelectUpdatedProfile = mysqli_query($conn, $selectUpdatedProfile);
            $updatedProfile = mysqli_fetch_assoc($exeSelectUpdatedProfile);

            // UPDATE THE SESSION PROFILE_IMAGE DATA
            $_SESSION['profile_image'] = $updatedProfile['profile_image'];

        }

    }
    // header('location: ../seeprofile.php');
    // exit();
}


// ADD OR UPDATE COVER PHOTO
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['coverPhoto'])) {
    $cover_file = $_FILES['coverPhoto'];
    $base_cover_file_name = uniqid() . $cover_file['name'];
    $new_cover_file_name = preg_replace('/[^A-Za-z0-9_\-\.]/',"_",$base_cover_file_name);
    $cover_tmp_name = $cover_file['tmp_name'];
    $cover_upload_dir = '../uploads/covers/' . $new_cover_file_name;

    if (move_uploaded_file($cover_tmp_name, $cover_upload_dir)) {
        $query2 = "UPDATE `users` SET `cover_photo`= ('uploads/covers/$new_cover_file_name') WHERE `id` = $userId";
        $exeQuery2 = mysqli_query($conn, $query2);
        if ($exeQuery2) {
            $selectUpdatedCover = "SELECT `cover_photo` FROM `users` WHERE `id` = $userId";
            $exeSelectUpdatedCover = mysqli_query($conn, $selectUpdatedCover);
            $updatedCover = mysqli_fetch_assoc($exeSelectUpdatedCover);

            // UPDATE THE SESSION PROFILE_IMAGE DATA
            $_SESSION['cover_photo'] = $updatedCover['cover_photo'];

        }

    }
}

header('location: ../seeprofile.php');
exit();

?>