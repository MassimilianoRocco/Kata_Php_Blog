<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth/myList.css">
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

        $stm = $conn->prepare('SELECT* FROM posts');
        $stm->execute();

        $results = $stm->get_result();

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo '
                <div class="row">
                    <p>' . $row['title'] . '</p>
                    <div class=\'buttons_group\'>

                        <form action="postDelete.php" method="POST"   style="display:inline;">
                            <input type="hidden" name="post_id" value="' . $row ['id'] . '">
                            <button type="submit">Delete</button>
                        </form>

                        <a href=\'\'>
                            <button>Update</button>
                        </a>

                        <form action="postShow.php" method="POST"   style="display:inline;">
                            <input type="hidden" name="post_id" value="' . $row ['id'] . '">
                            <button type="submit">Show</button>
                        </form>
                    </div>
                </div>
                ';
            }
        }
        ?>
    </main>
</body>

</html>