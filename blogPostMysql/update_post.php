<?php
require 'config.php';


if(isset($_POST['update'])){
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET content  = '$content' WHERE id = $post_id";
    $run = mysqli_query($conn, $sql);

    if($run){
        header("location:all_post.php");

    }
}
?>

