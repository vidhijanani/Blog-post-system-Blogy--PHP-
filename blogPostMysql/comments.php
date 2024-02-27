<?php
require_once "config.php";

// Add Comment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["post_id"];
    $user_id = $_POST["user_id"];
    $content = $_POST["content"];

    $sql = "INSERT INTO comments (post_id, user_id, content) VALUES ('$post_id', '$user_id', '$content')";
    if (mysqli_query($conn, $sql)) {
        echo "Comment added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Update Comment (similar approach)
// Delete Comment (similar approach)
?>
