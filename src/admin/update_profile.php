<?php
    session_start();
    require_once './db/configUserUpdate.php';
    if(isset($_POST["user_update"])){
        $filename = $_FILES['new_profile']['name'];
        $tem_loc = $_FILES['new_profile']['tmp_name'];
        $loc ='.\files_upload';
        $full_filename = '\\' . $filename;
        $fileUploaded = $loc.$full_filename;
        
        if(move_uploaded_file($tem_loc,__DIR__.$fileUploaded)){
        $sql = ' UPDATE `user_details` SET `profile_pic`=:image WHERE id =:id';
            $sql_prepared = $pdo->prepare($sql);

            $sql_prepared->bindParam(':image', $fileUploaded);
            $sql_prepared->bindParam(':id',$_SESSION['id']);
            $res = $sql_prepared->execute();
            if($res){
            echo "<script>alert('profile updated')</script>";
             header("refresh:10;url='user_details_.php'");
            }
            else{
                echo "not able to upload";
            }
        }else{
             header("refresh:0;url='user_details_.php'");
        }
    }
    else{
        echo "failed";
    }
?>