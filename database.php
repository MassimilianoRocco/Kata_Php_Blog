    <!-- CONN DATABASE  -->
    <?php
        define('DB_SERVERNAME','localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','');
        define('DB_NAME','php_blog');

        $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($conn && $conn->connect_error){
            echo 'Connection failed: ' . $conn->connect_error;
        }
    ?>