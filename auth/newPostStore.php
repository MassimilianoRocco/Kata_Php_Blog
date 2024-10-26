<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth/newPost.css">
    <title>PHP: My Blog</title>
</head>

<body>
    <main>
        <?php
            require '../database.php';

            $title = $_POST['title'];
            $content = $_POST['content'];
            $img = $_POST['img'];
            $category_id = $_POST['categories'];

            $stm = $conn->prepare('INSERT INTO posts (title, content, image, user_id, category_id) VALUES (?,?,?,?,?)');

            $stm->execute([$title, $content, $img, 1, $category_id]);

            header('Location: ./myList.php');
            exit();
        ?>
    </main>
</body>

</html>