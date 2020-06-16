<?php
    $host_name= 'localhost:3306';
    $db_name = 'php_learning';
    $username = 'root';
    $password = '';
    $connect = mysqli_connect($host_name, $username, $password,$db_name);
    $sqlget = "SELECT * FROM product";
    $result = $connect->query($sqlget);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="/CSS/democss.css"/>
</head>
<body>
    <div class="Header">
        <h1> Danh sách sản phẩm </h1>
        <button onclick="document.location = 'addItem.html'">Thêm sản phẩm</button>
    <form action=SearchItem.php method="POST">
        <!--input type="text" id="searchItem" name="searchItem"-->
       
        <button type="submit">Tìm kiếm sản phẩm</button>
    </form>
    </div>
    <div class="TableList">
    <!--form action="AddCart.php" method="GET!"-->
       <table >
           <div class="TableListRow">
                 
                   <div class="TableListCol">STT</div>
                   <div class="TableListCol">Sản phẩm</div>
                   <div class="TableListCol">Chuyên mục</div>
                   <div class="TableListCol">Thao tác</div>
           </div>
                 
            
<?php 
    if($result->num_rows > 0)
    {
            while($data = mysqli_fetch_assoc($result)){
?>
            <div class="TableListRow">
               <div class="TableListCol"><?php echo $data["product_id"];?></div>
               <div class="TableListCol"><?php echo $data["product_name"];?></div>
               <div class="TableListCol"><?php echo $data["created_at"];?></div>
               <div class="TableListCol"><a href="addcart1.php?proID=<?php echo $data["product_id"];?>">add cart</a></div>
            </div>
<?php 
            }
    }
?>
       </table>
      
    <!--/form-->
    </div>
</body>
</html> 
    