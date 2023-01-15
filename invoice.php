<?php
include("config.php");
echo "Hai";
//if(isset($_POST['submit'])){
    $product = $_POST['product'];
    $query = "select * from products where productname='$product'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    if($row){
        echo "ID : " . $row['product_id']."<br>";
        echo "Product : " . $row['productname']."<br>";
        echo "Available : " . $row['availability']."<br>";
        echo "Price : " . $row['price']."<br>";
    }
    else{
        echo "<br>Sorry..! Item not available...<br>";
    }
    
//}



?>