<?php
// DATABASE CONNECTION
include 'includes/auth.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Nexora | Login</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Great+Vibes&family=Hind+Siliguri:wght@300;400;500;600;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kreon:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post" class="form">
            <div class="form-title">Log in</div>
            <input type="email" name="useremail" placeholder="E-mail" required autocomplete="email" autofocus>
            <div class="password-field">
                <input type="password" name="userpassword" placeholder="Password" required autocomplete="current-password">
                <button type="button">
                    <i class="fa-regular fa-eye-slash"></i>
                </button>
            </div>
            <button type="submit" name="loginBtn" class="submit-btn">Log in</button>
            <div class="form-footer">
                <a href="signup.php">Don't have an account?</a>
            </div>
        </form>
    </div>

    <script src="assets/js/form.js"></script>
</body>

</html>

