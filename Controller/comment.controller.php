<?php
    include('../Model/comment.class.php');
    $comments = new Comment();
    if(isset($_POST['bt_save_comment'])){
        
        $comments->setDate_(date("Y-m-d"));
        $comments->setPseudo($_POST['txt_comment_pseudo']);
        $comments->setRating($_POST['selectedRating']);
        $comments->setComment($_POST['txt_comment_comment']);

        $comments->addComment();
        unset($_POST['bt_save_comment']);

    }else if(isset($_POST['bt_comment_delete'])){
        
        $comments->deleteComment($_POST['txt_comment_id']);
        unset($_POST['bt_comment_delete']);

    }

    $Comment = $comments->get(1,'date_','DESC','0','50');
?>