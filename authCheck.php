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
                if (password_verify($password, $row['password'])) {

                    $_SESSION['username'] = $row['username'];

                    header('Location: ./auth/myList.php');
                    exit();
                } 
                else {
                    echo '<br> Credenziali Errate <br>';
                    echo "<a href='./index.php'>HOME</a>";
                }
            }
        } 
        else {
            echo '<br> Credenziali Errate <br>';
            echo "<a href='./index.php'>HOME</a>";
        }
        ?>