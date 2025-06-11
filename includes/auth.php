<?php
session_start();

// DATABASE CONNECTION
include 'connection.php';

// SIGNUP LOGIC START
if (isset($_POST['signupBtn'])) {
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // CHECK ACCOUNT EXISTENCE
    $checkAccount = "SELECT * FROM `users` WHERE `email` = '$email'";
    $exeCheckAccount = mysqli_query($conn, $checkAccount);
    $countCheckAccount = mysqli_num_rows($exeCheckAccount);
    if ($countCheckAccount > 0) {
        echo "<script>alert('এই ইমেইল দিয়ে অ্যাকাউন্ট আছে!')</script>";
    } else {
        // CHECK PASSWORD MATCH
        if ($password != $confirmPassword) {
            echo "<script>alert('পাসওয়ার্ড মেলেনি!')</script>";
        } else {
            // HASH PASSWORD
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // INSERT USER DATA
            $insertUserData = "INSERT INTO `users`(`username`, `dob`, `email`, `password`) VALUES ('$username','$dob','$email','$hashedPassword')";
            $exeInsertUserData = mysqli_query($conn, $insertUserData);
            if ($exeInsertUserData) {
                $newUserId = mysqli_insert_id($conn);
                
                // GET THE NEW USER INFO
                $newUserInfo = "SELECT `id`, `username`, `dob`, `profile_image`, `cover_photo` FROM `users` WHERE `id` = $newUserId";
                $exeNewUserInfo = mysqli_query($conn,$newUserInfo);
                $newUserData = mysqli_fetch_assoc($exeNewUserInfo);

                // STORE USER INFO VIA SESSIONS
                $_SESSION['id'] = $newUserData['id'];
                $_SESSION['username'] = $newUserData['username'];
                $_SESSION['dob'] = $newUserData['dob'];
                $_SESSION['profile_image'] = $newUserData['profile_image'];
                $_SESSION['cover_photo'] = $newUserData['cover_photo'];
                $_SESSION['success_msg'] = 'অ্যাকাউন্ট তৈরি সফল হয়েছে ! 🎉🎉';
                header('location: index.php');
                exit();
            } else {
                echo "<script>alert('অ্যাকাউন্ট তৈরি হয়নি!')</script>";
            }
        }
    }
}
// SIGNUP LOGIC END

// LOGIN LOGIC START
if (isset($_POST['loginBtn'])) {
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    // CHECK ACCOUNT EXISTENCE
    $findAccount = "SELECT * FROM `users` WHERE `email` = '$useremail'";
    $exeFindAccount = mysqli_query($conn, $findAccount);
    $countFindAccount = mysqli_num_rows($exeFindAccount);
    echo $countFindAccount;
    if ($countFindAccount > 0) {
        $userData = mysqli_fetch_array($exeFindAccount);
        // VERIFY PASSWORD
        $verifyPassword = password_verify($userpassword, $userData['password']);
        if ($verifyPassword) {
            $_SESSION['id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            $_SESSION['dob'] = $userData['dob'];
            $_SESSION['profile_image'] = $userData['profile_image'];
            $_SESSION['cover_photo'] = $userData['cover_photo'];
            $_SESSION['success_msg'] = "লগ ইন সফল হয়েছে ! 🎉🎉";
            header('location: index.php');
        } else {
            echo "<script>alert('পাসওয়ার্ড ভুল !')</script>";
        }

    } else {
        echo "<script>
        alert('অ্যাকাউন্ট খুজে পাওয়া যাইনি ! অনুগ্রহ করে সাইন আপ করুন ।')
        location.replace('signup.php');
        </script>";
        exit();
    }


}
// LOGIN LOGIC END

// LOGOUT LOGIC START
// echo "logout successfull";
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location: ../login.php');
    exit();
}
// LOGOUT LOGIC END

?>