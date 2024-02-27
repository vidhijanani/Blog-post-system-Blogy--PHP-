<?php

require 'config.php';
$height = 500;
$width = 500;
// var_dump($_SESSION);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">
    <style>
        #header {
            margin-bottom: 50px !important;
        }

        #post-container {
            margin-top: 100px !important;
        }
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center fixed-top bg-dark text-white mb-5">
        <div class="container-fluid container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="list-unstyled text-uppercase text-white">Blogy</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="nav-item"><a class="nav-link text-white" href="all_post.php"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="create_post.php"><i class="fas fa-edit me-1"></i> Create Post</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-envelope me-1"></i> Messages</a></li>
                    <li class="nav-item"><a class="nav-link" href="home.php"><i class="fas fa-user me-1"></i> Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                <a href="https://www.facebook.com/your_facebook_username" class="mx-2"><span class="bi-facebook"></span></a>
                <a href="https://www.instagram.com" class="mx-2"><span class="bi-instagram"></span></a>

                <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="search-result.html" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->
            </div>
        </div>

    </header><!-- End Header -->

    <div id="post-container" class="container py-5 mt-5">
        <?php
        // Retrieve posts from the database
        if (isset($_SESSION['vidhi'])) {
            $user_id = $_SESSION['vidhi']; // Assuming $user_id is the correct user identifier

            // echo "User ID: $user_id";

            $sql = "SELECT * FROM posts WHERE user_id = '$user_id' ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);

            // Check if any posts exist
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row in the result set
                while ($row = mysqli_fetch_assoc($result)) {
                    // Extract post data
                    $post_id = $row["id"];
                    $content = $row["content"];
                    $media_url = $row["media_url"];
                    $created_at = $row["created_at"];


                    // Display post data
                    echo "<div class='card'>";
                    echo "<div class='card-body text-center'>";
                    echo "<a href='delete_post.php?id=$post_id' class='btn btn-danger' style='position: absolute; top: 10px; right: 10px;'>Delete</a>";

                    echo "<a href='edit_post.php?id=$post_id' class='btn btn-info' style='position: absolute; top: 10px; right: 90px;'>Edit</a>";
                    echo "<p class='card-text'>$content</p>";
                    echo "<img src='$media_url' alt='Post Image'>";
                    echo "<p class='card-text mt-3'>Created At: $created_at</p>";

                    // Like button
                    echo "<a href='like_post.php?like_post_id=$post_id' class='btn btn-primary'>Like</a>";

                    echo "<span style='margin: 0 5px;'></span>";
                    // Share button with onclick event to toggle share icons visibility and share post link
                    echo "<button onclick='sharePost($post_id)' class='btn btn-primary'>Share</button>";

                    // Social media icons and URL link (initially hidden)
                    echo "<div id='share-icons-$post_id' style='display: none; margin-top: 10px'>";
                    echo "<button onclick='shareOnWhatsApp()' class='btn btn-success'><i class='fab fa-whatsapp'></i></button>";
                    echo "<span style='margin: 0 5px;'></span>";
                    echo "<button onclick='shareOnFacebook()' class='btn btn-success'><i class='fab fa-facebook'></i></button>";
                    echo "<span style='margin: 0 5px;'></span>";
                    echo "<button onclick='shareOnInstagram()' class='btn btn-success'><i class='fab fa-instagram'></i></button>";
                    echo "<span style='margin: 0 5px;'></span>";
                    echo "<button onclick='copyPostLink($post_id)' class='btn btn-success'><i class='fas fa-copy'></i></button>";
                    echo "<br>";
                    echo "<input type='text' id='post-link-$post_id' style='display: none;' value=''>";
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='card-title text-center' style='font-size: 45px; font-weight: bold;'> Add your first post </div>";

                echo "<div class='text-center'>";
                echo "<img src=\"img1.svg\" alt=\"Image\" class='mx-auto d-block' width=\"$width\" height=\"$height\"/>";
                echo "<a href='create_post.php' class='btn btn-primary'>Create Post</a>";
                echo "</div>";
            }
        }
        ?>


    </div>
    <script>
        function sharePost(post_id) {
            // Toggle visibility of share icons container
            var shareIcons = document.getElementById('share-icons-' + post_id);
            if (shareIcons.style.display === 'none') {
                shareIcons.style.display = 'block';
            } else {
                shareIcons.style.display = 'none';
            }
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "share_post.php?share_post_id=" + post_id, true);
            xhr.send();

        }

        function toggleShareIcons(event, post_id) {
            event.preventDefault(); // Prevent default link behavior
            let icons = document.getElementById('share-icons-' + post_id);
            icons.style.display = (icons.style.display === 'none' || icons.style.display === '') ? 'block' : 'none';
        }

        // Share on WhatsApp
        function shareOnWhatsApp() {
            let shareLink = 'whatsapp://send?text=' + encodeURIComponent(window.location.href);
            window.open(shareLink);
        }

        // Share on Facebook
        function shareOnFacebook() {
            let shareLink = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href);
            window.open(shareLink);
        }

        // Share on Instagram
        function shareOnInstagram() {
            let shareLink = 'https://www.instagram.com/share?url=' + encodeURIComponent(window.location.href);
            window.open(shareLink);
        }

        // Copy post link to clipboard
        function copyPostLink(post_id) {
            let postLinkInput = document.getElementById('post-link-' + post_id);
            postLinkInput.style.display = 'block';
            postLinkInput.value = window.location.href + '?post_id=' + post_id;
            postLinkInput.select();
            document.execCommand('copy');
            postLinkInput.style.display = 'none';
            alert('Post link copied to clipboard.');
        }

        // // Define the sharePost function
        // function sharePost(postId) {
        //     // Perform AJAX request to share the post with postId
        //     // You need to implement the AJAX functionality here
        //     // For example:
        //     fetch('share_post.php?share_post_id=' + postId)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             console.log('Post shared successfully');
        //         })
        //         .catch(error => console.error('Error sharing post:', error));

        // }
    </script>
</body>

</html>