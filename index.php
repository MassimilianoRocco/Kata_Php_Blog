<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>PHP: My Blog</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <h2>My Blog</h2>
        <div class="login_container">
            <a href="./login.php">LOGIN</a>
        </div>
    </header>

    <main>
        <h2> </h2>
        <?php
        require 'database.php';

        $stm = $conn->prepare('SELECT* FROM posts');
        $stm->execute();

        $results = $stm->get_result();

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo '
                <div class="card">
                    <h3>' . $row['title'] . '</h3>
                    <p>' . $row['content'] . '</p>
                    <a href=\'\'>
                        <button>Read More</button>
                    </a>

                </div>
                ';
            }
        }
        ?>

    </main>
</body>

</html>