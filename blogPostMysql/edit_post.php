<?php
require 'config.php';

$row = []; 
$content = '';
$id = '';


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $record = "SELECT * FROM posts WHERE id = '$id'";
    $run = mysqli_query($conn, $record);
    
    if($run) {
        // Check if the query returned any results
        if(mysqli_num_rows($run) > 0) {
            // Fetch the row
            $row = mysqli_fetch_assoc($run);
            // Store content in a variable
            $content = $row['content'];
        } else {
            // Handle case when no record is found
            echo "No record found with ID: $id";
        }
    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($conn);
    }
}
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
    <div class="container py-5 mt-5 d-flex justify-content-center">
        <div class="row my-5 d-flex align-items-center">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="display-6 mt-3">Dive into the world of thoughts in form of words</h1>
                <!-- <h2>Create Post</h2> -->
                <form method="POST" action="update_post.php" enctype="multipart/form-data">
                    <input type="visible" name="post_id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="content"></label>
                        <textarea class="form-control" id="content" name="content" rows="7" cols="50"><?php echo $content;?></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-center flex-column">
                        <label for="media_url" class="col-auto mb-0">Upload Media</label>
                        <input type="file" class="form-control-file col-auto" id="media_url" name="media_url" value="<?php echo $row['media_url']; ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-dark">Edit Post</button>
                </form>
            </div>
        </div>
    </div>


    <!-- JavaScript for toggling share icons and sharing on social media -->
    <script>
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
    </script>
</body>

</html>