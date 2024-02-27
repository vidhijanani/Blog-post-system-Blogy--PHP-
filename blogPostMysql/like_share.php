<?php
require_once "config.php";



// Share functionality
if (isset($_GET['share_post_id'])) {
    $post_id = $_GET['share_post_id'];
    $user_id = $_SESSION['vidhi']; // Assuming user ID is stored in session

    // Get post content and media URL to share
    $sql = "SELECT content, media_url FROM posts WHERE id='$post_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $content = $row['content'];
    $media_url = $row['media_url'];

    // URL encode post content for sharing
    $encoded_content = urlencode($content);
    $encoded_media_url = urlencode($media_url);

    // Add share record to the database
    $sql = "INSERT INTO shares (post_id, user_id) VALUES ('$post_id', '$user_id')";
    if (mysqli_query($conn, $sql)) {
        // echo "Post shared successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
