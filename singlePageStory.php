<?php
// session_start();
// DATABASE CONNECTION
include 'includes/auth.php';

// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

if (!isset($_SESSION['id'])) {
    echo "<script>
            alert('Please login first !');
            window.location = 'login.php';
        </script>";
    exit();
} else {
    if (isset($_SESSION['success_msg'])) {
        echo "<script>alert('" . $_SESSION['success_msg'] . "')</script>";
        unset($_SESSION['success_msg']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Nexora | Stories</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Great+Vibes&family=Hind+Siliguri:wght@300;400;500;600;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kreon:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/singleStory.css">
</head>

<body>
    <div class="overlay"></div>
    <nav class="nav-bar">
        <div class="container-fluid nav-container">
            <div class="logo">
                <a href="index.php">
                    <img src="assets/img/logo.png" alt="logo" class="logo-img1">
                    <img src="assets/img/brand.png" alt="logo" class="logo-img2">
                    <!-- <p>facebook</p> -->
                </a>
            </div>
            <ul class="nav-list">
                <li class="">
                    <a href="index.php" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-delay="5"
                        title="Home" class="nav-item">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li class="">
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-delay="5" title="Friends"
                        class="nav-item">
                        <i class="fa-solid fa-user-group"></i>
                    </a>
                </li>
                <li class="">
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-delay="5" title="Video"
                        class="nav-item">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li class="">
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-delay="5"
                        title="Marketplace" class="nav-item">
                        <i class="fa-solid fa-store"></i>
                    </a>
                </li>
                <li class="">
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-delay="5" title="Gaming"
                        class="nav-item">
                        <i class="fa-solid fa-gamepad"></i>
                    </a>
                </li>
            </ul>
            <div class="mobile-navs">
                <div class="dropdown">
                    <button class="profile dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Account">
                            <?php
                            if ($_SESSION['profile_image']) {
                                echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                            } else {
                                echo "<img src='assets/img/profile.jpg' alt='profile'>";
                            }
                            ?>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </button>
                    <ul class="profile-menu dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li class="see-profile">
                            <div class="info">
                                <?php
                                if ($_SESSION['profile_image']) {
                                    echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                                } else {
                                    echo "<img src='assets/img/profile.jpg' alt='profile'>";
                                }
                                ?>
                                <p>
                                    <?php echo $_SESSION['username'] ?>
                                </p>
                            </div>
                            <a href="seeprofile.php"><i class="fa-solid fa-user"></i> See profile</a>
                        </li>
                        <li>
                            <p class="profile-menu-item"><i class="fa-solid fa-key"></i> Dashboard</p>
                        </li>
                        <li>
                            <p class="profile-menu-item"><i class="fa-solid fa-moon"></i> Theme</p>
                        </li>
                        <li>
                            <a href="includes/auth.php?logout=true" id="logoutBtn" class="profile-menu-item">
                                <i class="fa-solid fa-right-from-bracket"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </div>
                <button onclick="toggleMenu()" class="menu-toggle-btn">
                    <i class="menu-icon fa-solid fa-bars "></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="offcanvas">
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/brand.png" alt="logo" class="logo-img2">
                <!-- <p>facebook</p> -->
            </a>
        </div>
        <ul class="nav-list">
            <li class="">
                <a href="index.php" class="nav-item">Home</a>
            </li>
            <li class="">
                <a href="#" class="nav-item">Friends</a>
            </li>
            <li class="">
                <a href="#" class="nav-item">Video</a>
            </li>
            <li class="dropdown">
                <div class="nav-item toggle-dropdown">
                    Marketplace
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <ul class="dropdown-list">
                    <li><a href="#" class="dropdown-item">Facebook Marketing</a></li>
                    <li><a href="#" class="dropdown-item">Facebook Marketing</a></li>
                    <li><a href="#" class="dropdown-item">Facebook Marketing</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#" class="nav-item">Gaming</a>
            </li>
        </ul>
    </div>
    <div class="single-story-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <?php
                if ($_SESSION['profile_image']) {
                    echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                } else {
                    echo "<img src='assets/img/profile.jpg' alt='profile'>";
                }
                ?>
                <p><?php echo $_SESSION['username'] ?></p>
            </div>
        </aside>
        <main class="content">
            <div class="single-story">
                <button type="button" class="previous">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="story-container">
                    <video class="story" src="" autoplay muted></video>
                    <div class="tap-icon"></div>
                </div>

                <button type="button" class="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </main>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/story.js"></script>
    <!-- <script>
        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                If this page was loaded from cache, force reload
                window.location.reload();
            }
        })
    </script> -->
</body>

</html>