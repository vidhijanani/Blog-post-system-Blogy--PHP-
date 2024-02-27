<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo "Username: $username<br>";
echo "Password: $password<br>";

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            echo "Login successful.";
            // Redirect to dashboard or any other page
            $_SESSION['vidhi'] = $row['id'];
             header("refresh:1;url=home.php");
        } else {
            echo "Invalid password.";
            die;
        }
    } else {
        echo "User not found.";
        die;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">
</head>

<body>


    <header id="header" class="header d-flex align-items-center fixed-top bg-dark text-white">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">

                <h1 class="list-unstyled text-uppercase text-white">Blogy</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-edit me-1"></i> Edit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-envelope me-1"></i> Messages</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user me-1"></i> Profile</a></li>
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

    </header>End Header

    <div class="container mt-5 py-5">
        <h2 class="mt-4">Login</h2>
        <form method="post" action="" class="mt-4">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
