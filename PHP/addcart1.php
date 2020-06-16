<?php 
        $host_name= 'localhost:3306';
        $db_name = 'php_learning';
        $username = 'root';
        $password = '';
        $connect = mysqli_connect($host_name, $username, $password,$db_name);
        $product_id = isset($_GET['proID']) ? $_GET['proID']: '';
        $product_name = isset($_GET['product_name']) ? $_GET['product_name']: '';
        $create_at = isset($_GET['create_at']) ? $_GET['create_at']: '';
        $query_product = "SELECT * FROM product where product_id = $product_id";
        $Searchresult = $connect->query($query_product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="/CSS/democss.css"/>
</head>
<body>
    <div class="TableList">
        <h1> Giở hàng </h1>
        <button onclick="document.location = 'addItem.html'">Thêm sản phẩm</button>
        <button onclick="document.location = 'Cart.php'">Trang chur</button>
    <form action="php2.php" method="POST">
       <table>
           <div class="TableListRow">
                <div class="TableListCol">STT</div>
                <div class="TableListCol">Sản phẩm</div>
                <div class="TableListCol">Chuyên mục</div>
                <div class="TableListCol">Thao tác</div>
            </div>
<?php 
    if($Searchresult->num_rows > 0)
    {
            while($data1 = mysqli_fetch_assoc($Searchresult)){
              $_SESSION["product_id"] = $data1["product_id"];
              $_SESSION["product_name"] = $data1["product_name"];
              $_SESSION["created_at"] = $data1["created_at"];
?>
            <div class="TableListRow">
            <div class="TableListCol"><?php echo $_SESSION["product_id"];?></div>
            <div class="TableListCol"><?php echo $_SESSION["product_name"];?></div>
            <div class="TableListCol"><?php echo $_SESSION["created_at"];?></div>
            <div class="TableListCol"><a href="deletecart.php?proID=<?php echo $data["product_id"];?>">delect</a></div>
            </div>
<?php 
            }
           
    }
?>
       </table>
        
    </form>
</div>
</body>
</html> 