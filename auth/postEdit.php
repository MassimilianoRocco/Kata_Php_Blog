<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth/newPost.css">
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

    <?php
    require '../database.php';

    $post_id = $_POST['post_id'];

    $stm = $conn->prepare('SELECT * FROM posts WHERE id = ?');
    $stm->bind_param('s', $post_id);
    $stm->execute();
    $results = $stm->get_result();

    $stm2 = $conn->prepare('SELECT * FROM categories');
    $stm2->execute();
    $results2 = $stm2->get_result();

    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();
    }
    ?>

    <main>
        <form action="./postUpdate.php" method="POST" class="form_container">
            <div class="box">
                <label for="title">Titolo:</label><br>
                <input type="text" id="title" name="title"
                    value="<?php echo htmlspecialchars($row['title']) ?>"
                    required>
            </div>

            <div class="box">
                <label for='content'>Contenuto:</label><br>
                <input type="text" id="content" name="content"
                    value="<?php echo htmlspecialchars($row['content']) ?>"
                    required>
            </div>

            <div class="box">
                <label for='img'>Url_Immagine:</label><br>
                <input type="text" id="img" name="img"
                    value="<?php echo htmlspecialchars($row['image']) ?>"
                    required>
            </div>

            <div class="box">
                <label for='categories'>Categoria:</label><br>
                <select name="categories" id="categories">
                    <?php
                    if ($results2->num_rows > 0) {
                        while ($row2 = $results2->fetch_assoc()) {
                            echo "<option value='" . $row2['id'] . "' " . ($row2['id'] == $row['category_id'] ? 'selected' : '') . ">" . htmlspecialchars($row2['name']) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <input type="hidden" id="post_id" name="post_id"
                value="<?php echo $post_id ?>"
                required>

            <button type="submit">Modifica</button>
        </form>
    </main>
</body>

</html>