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

// FETCH POSTS
$query = "SELECT * FROM `posts` ORDER BY `created_at` DESC";
$exeQuery = mysqli_query($conn, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.svg" type="image/x-icon">
    <title>Facebook | Home</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Great+Vibes&family=Hind+Siliguri:wght@300;400;500;600;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kreon:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emoji-mart@5.4.0/dist-modern/style.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="splash-screen">
        <div class="loader">
            <img src="assets/img/logo.svg" alt="loading...">
        </div>
    </div>
    <div class="overlay"></div>
    <nav class="nav-bar">
        <div class="container-fluid nav-container">
            <div class="logo">
                <a href="index.php">
                    <img src="assets/img/logo.svg" alt="logo">
                    <p>facebook</p>
                </a>
            </div>
            <ul class="nav-list">
                <li class="">
                    <a href="index.php" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-delay="5"
                        title="Home" class="nav-item active">
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
                <img src="assets/img/logo.svg" alt="logo">
                <p>facebook</p>
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

    <main class="main-content">
        <div class="create-post-section">
            <a href="seeprofile.php" class="profile">
                <?php
                if ($_SESSION['profile_image']) {
                    echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                } else {
                    echo "<img src='assets/img/profile.jpg' alt='profile'>";
                }
                ?>
            </a>
            <!-- Button trigger modal -->
            <div class="open-post-modal" data-bs-toggle="modal" data-bs-target="#postModal">
                What's on you mind, <?php echo $_SESSION['username'] ?>?
            </div>
            <!-- Modal -->
            <div class="modal my-modal" id="postModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="my-modal-header">
                            <h5 class="my-modal-title">Create post</h5>
                            <button type="button" class="my-modal-close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="post-admin">
                                <a href="seeprofile.php" class="profile">
                                    <?php
                                    if ($_SESSION['profile_image']) {
                                        echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                                    } else {
                                        echo "<img src='assets/img/profile.jpg' alt='profile'>";
                                    }
                                    ?>
                                </a>
                                <p><?php echo $_SESSION['username'] ?></p>
                            </div>
                            <form action="includes/createpost.php" method="post" enctype="multipart/form-data"
                                class="post-form">
                                <textarea class="post-context" name="post-context" id="postContent"
                                    placeholder="What's on your mind, <?php echo $_SESSION['username'] ?>?"></textarea>

                                <div class="my-emoji-picker">
                                    <!-- Toggle for Emoji Picker -->
                                    <button class="" type="button" id="emojiBtn" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Emoji">
                                        <i class="fa-regular fa-face-smile"></i>
                                    </button>
                                    <!-- Container for Emoji Picker -->
                                    <div id="emojiDropdown">
                                        <emoji-picker></emoji-picker>
                                    </div>
                                </div>
                                <div class="post-media-preview">
                                </div>
                                <div class="add-to-post">
                                    <span>Add to your post</span>
                                    <input type="file" name="post-media" id="post-media" accept="image/*,video/*"
                                        hidden>
                                    <label for="post-media">
                                        <div data-bs-toggle="tooltip" data-bs-placement="top" title="Photo/video">
                                            <i class="fa-solid fa-file-image"></i>
                                        </div>
                                    </label>
                                </div>
                                <button type="submit" class="post-btn">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="story-slider">
            <div class="story-section">
                <a href="createstory.php" class="create-story">
                    <div class="profile-img">
                        <?php
                        if ($_SESSION['profile_image']) {
                            echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                        } else {
                            echo "<img src='assets/img/profile.jpg' alt='profile'>";
                        }
                        ?>
                    </div>
                    <i class="fa-solid fa-plus"></i>
                    <p class="owner">Create story</p>
                </a>

            </div>
            <button class="slider-btn left"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="slider-btn right"><i class="fa-solid fa-chevron-right"></i></button>
        </div>

        <div class="post-section">
            <?php
            while ($post = mysqli_fetch_assoc($exeQuery)) {
                // FETCH AUTHOR DATA
                $query2 = "SELECT * FROM `users` WHERE `id` = {$post['user_id']}";
                $exeQuery2 = mysqli_query($conn, $query2);
                if ($exeQuery2) {
                    $row = mysqli_fetch_assoc($exeQuery2);
                }
                ?>

                <div class="post" data-authorname="<?php echo $row['username'] ?>"
                    data-authorimage="<?php echo $row['profile_image'] !== '' ? htmlspecialchars($row['profile_image']) : 'assets/img/profile.jpg' ?>"
                    data-context="<?php echo $post['post_context'] ?>"
                    data-media="<?php echo htmlspecialchars($post['post_media']) ?>"
                    data-mediatype="<?php echo $post['media_type'] ?>">
                    <div class="post-header">
                        <div class="post-author">
                            <?php

                            if ($row['profile_image'] !== '') {
                                ?>

                                <img src="<?php echo htmlspecialchars($row['profile_image']) ?>" alt="author">

                                <?php
                            } else {
                                ?>

                                <img src="assets/img/profile.jpg" alt="author">

                                <?php
                            }

                            ?>
                            <p><?php echo $row['username'] ?></p>
                        </div>
                        <div class="post-btns">
                            <button type="button">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <button type="button">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <div class="post-body">
                        <?php
                        $postContext = nl2br(htmlspecialchars($post['post_context']));
                        $maxLength = 150;

                        if (strlen($postContext) > $maxLength) {
                            $visible = substr($postContext, 0, $maxLength);
                            $hidden = substr($postContext, $maxLength);

                            ?>
                            <p>
                                <span class="visible-part"><?php echo $visible ?></span><span class="hidden-part"
                                    style="display: none;"><?php echo $hidden ?></span><span class="etc">...</span>
                                <span class="see-more-btn" onclick="togglePost(this)"> See more</span>
                            </p>
                            <?php
                        } else {
                            ?>
                            <p><?php echo $postContext ?></p>
                            <?php
                        }
                        ?>
                        <div class="post-media-trigger" data-bs-toggle="modal" data-bs-target="#postPreviewModal"
                            style="cursor: pointer;">
                            <?php

                            if ($post['media_type'] === 'image') {
                                ?>

                                <img src="<?php echo $post['post_media'] ?>" alt="">

                                <?php
                            } elseif ($post['media_type'] === 'video') {
                                ?>

                                <video src="<?php echo $post['post_media'] ?>" controls autoplay muted></video>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="post-footer">
                        <div class="like" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Like">
                            <i class="fa-regular fa-thumbs-up"></i>
                            <span>Like</span>
                        </div>
                        <div class="comment" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Comment">
                            <i class="fa-regular fa-comment fa-flip-horizontal"></i>
                            <span>Comment</span>
                        </div>
                        <div class="share" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Share">
                            <i class="fa-solid fa-share"></i>
                            <span>Share</span>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>

        <div class="post-preview-section">
            <!-- Modal -->
            <div class="modal my-modal" id="postPreviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="my-modal-header">
                            <h5 class="my-modal-title">View post</h5>
                            <button type="button" class="my-modal-close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="post-header">
                                <div class="post-author">
                                    <img alt="author" class="preview-author-img">
                                    <p class="preview-author-name"></p>
                                </div>
                                <div class="post-btns">
                                    <button type="button">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="post-body">
                                <p class="preview-context"></p>
                                <div class="preview-media"></div>
                            </div>
                        </div>
                        <div class="comment-section">
                            <button onclick="window.location.href = 'seeprofile.php'" class="profile" type="button">
                                <?php
                                if ($_SESSION['profile_image']) {
                                    echo "<img src='" . htmlspecialchars($_SESSION['profile_image']) . "' alt='profile'>";
                                } else {
                                    echo "<img src='assets/img/profile.jpg' alt='profile'>";
                                }
                                ?>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                            <form action="" method="post">
                                <textarea name="comment" id="" placeholder="Write a public comment..." required></textarea>
                                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Comment">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                        <div class="comment-list">
                            <div class="comment">
                                <div class="comment-author"></div>
                                <div class="comment-body">comment goes here...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/post.js"></script>

    <!-- Emoji Mart -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
    <script>
        const emojiToggleBtn = document.getElementById("emojiBtn");
        const emojiDropdown = document.getElementById("emojiDropdown");
        const postContent = document.getElementById("postContent");

        // Toggle the dropdown
        emojiToggleBtn.addEventListener("click", () => {
            emojiDropdown.style.display =
                emojiDropdown.style.display === "none" ? "block" : "none";
        });

        // Handle emoji selection
        const picker = emojiDropdown.querySelector("emoji-picker");
        picker.addEventListener("emoji-click", (event) => {
            const emoji = event.detail.unicode;
            insertAtCursor(postContent, emoji);
        });

        // Insert at cursor position in textarea
        function insertAtCursor(textarea, text) {
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const before = textarea.value.substring(0, start);
            const after = textarea.value.substring(end);
            textarea.value = before + text + after;
            textarea.selectionStart = textarea.selectionEnd = start + text.length;
            textarea.focus();
        }
    </script>




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