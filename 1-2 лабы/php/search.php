<?php

include "database.php";
header('Content-Type:application/json');

if(isset($_POST['vendor']) and isset($_POST['top-price']) and isset($_POST['category']) and isset($_POST['low-price']))
{
    $query = "SELECT * FROM `items` WHERE";
    if($_POST['vendor'] == 'none' and preg_match("/^[1-9][0-9]{1,3}$/", $_POST['top-price']) < 1 and $_POST['category'] == "none" 
        and preg_match("/^[1-9][0-9]{1,3}$/", $_POST['low-price']) < 1) {
        $query = "SELECT * FROM `items`";
    }
    else 
    {
        if($_POST['vendor'] != 'none')
        {
            $vendor = $_POST['vendor'];
            $query= "$query `FID_Vendor` = $vendor AND";
        }

        if(preg_match("/^[1-9][0-9]{1,3}$/", $_POST['low-price']) == 1)
        {
            $low_price = $_POST['low-price'];
            $query = "$query `price` > $low_price AND";
        }

        if($_POST['category'] != "none")
        {
            $category = $_POST['category'];
            $query = "$query `FID_Category` = $category AND";
        }

        if(preg_match("/^[1-9][0-9]{1,3}$/", $_POST['top-price']) == 1 )
        {
            $top_price = $_POST['top-price'];
            $query = "$query `price` < $top_price AND";
        }

        $query = substr($query, 0,strlen($query) - (strlen($query) - strrpos($query , " AND")) );
    }


    class good {
        var $name;
        var $price;
        var $brand;
        var $type;
        var $quality;
        var $quantity;
    }

    $result = mysqli_query($link, $query);
    $response = "";
    $arr = array();

    while($item = mysqli_fetch_assoc($result))
    {
        $name = $item['name'];
        $quality = $item['quality'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        $brandId = $item['FID_Vendor'];
        $brandQuery = "SELECT * FROM `vendors` WHERE `ID_Vendor` = ?";
        $brandEntity = "";
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt, $brandQuery)) {
            mysqli_stmt_bind_param($stmt, 's', $brandId);
            mysqli_stmt_execute($stmt);
            $brandRes = mysqli_stmt_get_result($stmt);
            $brandEntity = mysqli_fetch_assoc($brandRes);
        } 
        $brand = $brandEntity['name'];

        $typeId = $item['FID_Category'];
        $typeQuery = mysqli_query($link, "SELECT * FROM `categories` WHERE `ID_Category` = $typeId");
        $typeEntity = mysqli_fetch_assoc($typeQuery);
        $type = $typeEntity['name'];

        $good = new good;
        $good->name = $name;
        $good->price = $price;
        $good->brand = $brand;
        $good->type = $type;
        $good->quality = $quality;
        $good->quantity = $quantity;
        $arr[] = $good;
    }
    echo json_encode($arr);
}
else {
    echo "NO PARAMETERS ERROR";
}
?>