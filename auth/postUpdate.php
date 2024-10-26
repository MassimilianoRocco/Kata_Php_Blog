<?php
    require '../database.php';

    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $img = $_POST['img'];
    $user_id = 1;
    $category = $_POST['categories'];

    $stm = $conn->prepare('UPDATE posts SET title = ?, content = ?, image = ?, user_id = ?, category_id = ? WHERE id = ?');
    
    $stm->bind_param("sssiis", $title, $content, $img, $user_id, $category, $post_id);
    $stm->execute();

    header('Location: ./myList.php');
    exit();
?>