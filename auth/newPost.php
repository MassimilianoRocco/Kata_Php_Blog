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

    <main>
        <form action="./newPostStore.php" method="POST" class="form_container">
            <div class="box">
                <label for="title">Titolo:</label><br>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="box">
                <label for='content'>Contenuto:</label><br>
                <input type="text" id="content" name="content" required>
            </div>

            <div class="box">
                <label for='img'>Url_Immagine:</label><br>
                <input type="text" id="img" name="img" required>
            </div>

            <div class="box">
                <label for='categories'>Categoria:</label><br>
                <select name="categories" id="categories">

                    <?php
                    require '../database.php';

                    $stm = $conn->prepare('SELECT* FROM categories');
                    $stm->execute();
                    $results = $stm->get_result();
                    while ($row = $results->fetch_assoc()) {
                        echo "<option value='".$row['id']."'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit">Crea</button>
        </form>
    </main>
</body>

</html>