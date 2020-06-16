<?php
    $host_name= 'localhost:3306';
    $db_name = 'php_learning';
    $username = 'root';
    $password = '';
    $connect = mysqli_connect($host_name, $username, $password,$db_name);
    $searchItem = isset($_POST['searchItem']) ? $_POST['searchItem']: '';
   // $Category_cb = isset($_POST['Category_ID']) ? $_POST['Category_ID']: '';
    $querySearch = "SELECT * FROM product where product_name like '%$searchItem%'";
    $Searchresult = $connect->query($querySearch); 

   // mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<body>
    
        <h1> Giở hàng </h1>
        <button onclick="document.location = 'addItem.html'">Thêm sản phẩm</button>
        <button onclick="document.location = 'Cart.php'">Trang chur</button>
    <form action="php2.php" method="POST">
       <table>
           <tr>
               <th>STT</th>
               <th>Sản phẩm</th>
               <th>Chuyên mục</th>
               <th>Thao tác</th>
            </tr>
<?php 
    if($Searchresult->num_rows > 0)
    {
            while($data1 = mysqli_fetch_assoc($Searchresult)){
              $_SESSION["product_id"] = $data1["product_id"];
              $_SESSION["product_name"] = $data1["product_name"];
              $_SESSION["created_at"] = $data1["created_at"];
?>
            <tr>
                <td><?php echo $_SESSION["product_id"];?></td>
                <td><?php echo $_SESSION["product_name"];?></td>
                <td><?php echo $_SESSION["created_at"];?></td>
                <td><button type ="submit">Delete</button></td>
            </tr>
<?php 
            }
           
    }
?>
       </table>
        
    </form>

</body>
</html> 
    