<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<!-- SCRIPT -->
<?php
    session_start();
    if(isset($_SESSION['username'])){ 
        header('Location: ./auth/myList.php');
        exit();
    };
?>

<body>
    <!-- HEADER -->
    <header>
        <div class="login_container">
            <a href="./index.php">My Blog</a>
        </div>
    </header>

    <!-- FORM LOGIN -->
    <main>
        <form action="./authCheck.php" method="POST" class="form_container">
            <div class="username_Box">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="password_Box">
                <label for='password'>Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" id="login_Button">Login</button>
        </form>
    </main>
</body>

</html>