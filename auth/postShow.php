<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth/postShow.css">
    <title>PHP: My Blog</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="left_section">
            <a href="../index.php" class="home">My Blog</a>
            <a href="./myList.php" class="link">Lista Post</a>
            <a href="./newPost.php" class="link">Crea nuovo post</a>
        </div>
        <div class="login_container">
            <a href="../logout.php">Logout</a>
        </div>
    </header>

    <main>
        <?php
        require '../database.php';

        $post_id = $_POST['post_id'];


        $stm = $conn->prepare('SELECT* FROM posts WHERE id = ? ');
        $stm->bind_param('s', $post_id);
        $stm->execute();

        $results = $stm->get_result();

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo '
                <div class="card">
                    <div class="img_box">
                        <img src='. $row['image'] .'>
                    </div>
                    <div class="info_container">
                        <h3>' . $row['title'] . '</h3>
                        <p>' . $row['content'] . '</p>
                    </div>
                </div>
                ';
            }
        }
        else {
            echo '<p>Post non trovato.</p>';
            exit; 
            // Termina l'esecuzione dello script se non ci sono risultati
        }
        ?>
    </main>
</body>

</html>