<?php 
        $host_name= 'localhost:3306';
        $db_name = 'php_learning';
        $username = 'root';
        $password = '';
        $connect = mysqli_connect($host_name, $username, $password,$db_name);
        $product_id = isset($_GET['proID']) ? $_GET['proID']: '';
        session_destroy();
        header("Location: Cart.php");
?>