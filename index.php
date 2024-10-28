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
            <?php 
                session_start();
                if (isset($_SESSION['username'])) {
                    echo " <a href='./login.php'>Mio Profilo</a>";
                    } 
                else {
                    echo " <a href='./login.php'>Accedi</a>";
                    }
            ?>
        </div>
    </header>

    <main>
        <?php
        require 'database.php';

        $stm = $conn->prepare('SELECT* FROM posts');
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
        ?>

    </main>
</body>

</html>