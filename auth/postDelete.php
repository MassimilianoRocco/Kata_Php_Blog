<?php
    require '../database.php';
    
    $post_id = $_POST['post_id'];

    $stm = $conn->prepare('DELETE FROM posts WHERE id = ?');
    $stm->bind_param('i', $post_id);
    $stm->execute();

    if ($stm->execute()) {
        header('Location: ./myList.php');
        exit();
    } 
    else {
        exit('Errore durante l\'eliminazione del post');
    }

?>