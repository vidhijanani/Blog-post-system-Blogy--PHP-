<?php
require_once "config.php";


if (isset($_GET['like_post_id'])) {
    $post_id = $_GET['like_post_id'];
    $user_id = $_SESSION['vidhi']; // Assuming user ID is stored in session

    // Check if the post exists
    $post_check_sql = "SELECT * FROM posts WHERE id = '$post_id'";
    $post_check_result = mysqli_query($conn, $post_check_sql);
    if(mysqli_num_rows($post_check_result) > 0) {
        // Post exists, proceed with the like insertion
        $sql = "INSERT INTO likes (post_id, user_id) VALUES ('$post_id', '$user_id')";
        if (mysqli_query($conn, $sql)) {
            echo "Post liked successfully.";
             header("Location: all_post.php");
        exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Post does not exist
        echo "Error: Post with ID $post_id does not exist.";
    }
}
?>
