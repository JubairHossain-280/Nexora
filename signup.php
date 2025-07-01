<?php
// DATABASE CONNECTION
include 'includes/auth.php';

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (isset($_SESSION['id'])) {
    header('location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Nexora | Signup</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Great+Vibes&family=Hind+Siliguri:wght@300;400;500;600;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kreon:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <!-- Flat Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post" class="form">
            <div class="form-title">Create a new account</div>
            <input type="text" name="username" placeholder="Name" required autocomplete="name" autofocus>
            <input type="text" name="dob" id="dob" placeholder="Date of birth" required autocomplete="bday">
            <input type="email" name="email" placeholder="E-mail" required autocomplete="email">
            <div class="password-field">
                <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                <button type="button">
                    <i class="fa-regular fa-eye-slash"></i>
                </button>
            </div>
            <div class="password-field">
                <input type="password" name="confirmPassword" placeholder="Confirm password" required
                    autocomplete="new-password">
                <button type="button">
                    <i class="fa-regular fa-eye-slash"></i>
                </button>
            </div>
            <button type="submit" name="signupBtn" class="submit-btn">Sign Up</button>
            <div class="form-footer">
                <a href="login.php">Already have an account?</a>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#dob", {
            dateFormat: "Y-m-d",
            defaultDate: null,
            allowInput: true,
        });
    </script>
    <script src="assets/js/form.js"></script>
    <script>
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                // If this page was loaded from cache, force reload
                window.location.reload();
            }
        });
    </script>


</body>

</html>

