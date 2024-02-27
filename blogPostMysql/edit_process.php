<?php
 require 'config.php';
    
    if(isset($_POST['id'])){

        //get all fields
        $id                 = $_POST['id'];
       $content              = $_POST['content'];
      
        //update image
        if(isset($_FILES['media_url']['name'])){
            $folder     = 'uploads/';
            $fileName   = $_FILES['media_url']['name'];
            $file       = $_FILES['media_url']['tmp_name'];
            $move       = move_uploaded_file($file, $folder.$fileName);
            if($move){
                //delete old file
                $sql = "SELECT media_url FROM posts WHERE user_id = '$id'";
                $run = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($run);
                unlink('uploads/'.$row['media_url']);

                // update name to new file
                $sql = "UPDATE posts SET media_url = '$fileName' WHERE user_id = '$id'";
                $run = mysqli_query($conn, $sql);
            }
        }

        $sql = "UPDATE posts SET content = '$content' 
                WHERE user_id = '$id'";
               $run = mysqli_query($conn, $sql);
            if($run){
              
                header("location:all_post.php");
            }else{
                echo "Record Not Updated.";
            }
    }
    
    

?>