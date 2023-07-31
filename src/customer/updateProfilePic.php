<?php
    session_start();
    require_once './db/configUserUpdate.php';
    if(isset($_POST["updatePic"])){
        $filename = $_FILES['new_profile_pic']['name'];
        $tem_loc = $_FILES['new_profile_pic']['tmp_name'];
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
             header("refresh:0;url='profile.php'");
            }
            else{
                header("refresh:0;url='profile.php'");
            }        
        }
        else{
            header("refresh:0;url='profile.php'");
        }
    }
    else{
         header("refresh:0;url='logina.php'");
    }
    
?>