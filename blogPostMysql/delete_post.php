<?php
require 'config.php';

// Check if the post ID is set in the URL
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Delete the post from the database
    $delete_sql = "DELETE FROM posts WHERE id = '$post_id'";
    $delete_result = mysqli_query($conn, $delete_sql);

    if ($delete_result) {
        // Deletion successful
        header("Location: all_post.php"); // Redirect back to the all_post.php page after deletion
        exit();
    } else {
        // Deletion failed
        echo "Error deleting post: " . mysqli_error($conn);
    }
} else {
    // Post ID not set in the URL
    echo "Post ID not provided for deletion.";
}
?>
de