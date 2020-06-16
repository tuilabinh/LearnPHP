<?php
    $host_name= 'localhost:3306';
    $db_name = 'php_learning';
    $username = 'root';
    $password = '';
    $connect = mysqli_connect($host_name, $username, $password,$db_name);
    if (!$connect) 
    {
      die ('Không thể kết nối: ' .mysqli_error($connect));
      exit();
    }
    // Xử lý form Main.html
        $product_name = isset($_POST['product_name']) ? $_POST['product_name']: '';
        $Category_cb = isset($_POST['Category_ID']) ? $_POST['Category_ID']: '';
        $query_product = "INSERT INTO product(category_id,product_name, created_at) VALUES ($Category_cb,'$product_name',now())";

        if($connect->query($query_product) === TRUE)
        {
            //sau khi insert quay về trang Cart.php
            header("Location: Cart.php");
        } else{ 
            echo  "Error: " . $query_product . "<br>" . $connect->error;
        }



    
    mysqli_close($connect);
?>
