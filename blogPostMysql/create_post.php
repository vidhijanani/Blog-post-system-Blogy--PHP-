<?php

require 'config.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">
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

 <div class="container py-5 mt-5 d-flex justify-content-center">
    <div class="row my-5 d-flex align-items-center">
        <div class="col-lg-12 text-center mb-5">
            <h1 class="display-6 mt-3">Dive into the world of thoughts in form of words</h1>
            <!-- <h2>Create Post</h2> -->
            <form method="POST" action="add_post.php" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['vidhi']; ?>" >
                <div class="form-group">
                    <label for="content"></label>
                    <textarea class="form-control" id="content" name="content" rows="7" cols="50"></textarea>
                </div>
                <div class="form-group d-flex justify-content-center flex-column">
                    <label for="media_url" class="col-auto mb-0">Upload Media</label>
                    <input type="file" class="form-control-file col-auto" id="media_url" name="media_url">
                </div>
                <button type="submit" class="btn btn-dark">Create Post</button>
            </form>
        </div>
    </div>
</div>


       
</body>
</html>