
<?php
    session_start();
    if(isset($_SESSION['id'])){
        if(isset($_POST['logout_submit'])){
            session_unset();
            session_destroy();
            header("refresh:0;url=logina.php");
        }
    }
    else{
        header("refresh:0;url=logina.php");
    }
?>