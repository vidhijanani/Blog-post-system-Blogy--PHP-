<?php

require_once "config.php";
print_r($_SESSION);


// CHECK IF FORM DATA IS SUBMITTED 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['vidhi'])) {
    $user_id = $_SESSION['vidhi']; // Assuming user ID is stored in session
    // Get form data
    $content = $_POST['content'];
    // Handle file upload (if any)
    $media_url = '';
    if ($_FILES['media_url']['size'] > 0) {
        // Handle file upload logic here and store the file path in $media_url
        // For example:
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["media_url"]["name"]);
        if (move_uploaded_file($_FILES["media_url"]["tmp_name"], $target_file)) {
            $media_url = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit; // Exit if file upload fails
        }
    }

    // Insert post data into the database
    $sql = "INSERT INTO posts (user_id, content, media_url) VALUES ('$user_id', '$content', '$media_url')";
    if (mysqli_query($conn, $sql)) {
        // echo "Post created successfully.";
        header("Location: all_post.php");
        exit();
    } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }
} else {
    echo "User ID not found in session.";
}

