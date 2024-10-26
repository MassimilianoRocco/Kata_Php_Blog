<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/myArea.css">
    <title>PHP: My Blog</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <h2>My Blog</h2>
        <!-- <div class="login_container">
            <a href="./logout.php">Logout</a>
        </div> -->
    </header>

    <main>
        <?php
        session_start();
        require 'database.php';

            $username = $_POST['username'];
            $password = $_POST['password'];

            $stm = $conn->prepare('SELECT username, password FROM users WHERE username=?');
            $stm->bind_param("s", $username);
            $stm->execute();

            $result = $stm->get_result();

            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    if(password_verify($password, $row['password'])){
                        // echo '<br> Benvenuto ' . $row['username'] . ' <br>';
                        header('Location: ./auth/myList.php');
                        exit();
                    }
                    else{
                        echo '<br> Credenziali Errate <br>';
                        echo "<a href='./index.php'>HOME</a>";
                    }
                    // $_SESSION['username'] = $row['username'];
                    // header('Location: index.php');
                    
                }
            } else {
                echo '<br> Credenziali Errate <br>';
                echo "<a href='./index.php'>HOME</a>";
            }
        ?>

    </main>
</body>

</html>