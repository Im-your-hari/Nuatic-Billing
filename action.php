<?php

include('config.php');

if(isset($_POST['query'])){
    $inpText = $_POST['query'];
    $query = "select productname from products where productname like '%$inpText%'";
    $result = $conn->query($query);
    if($result->num_rows()>0) {
        while($row = $result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action border-1 text-center'>".$row["productname"]."</a>";
        }

    }
    else{
        echo "<p class='list-group-item list-group-item-action border-1 text-center'>No product found</p>";
    }

}

?>