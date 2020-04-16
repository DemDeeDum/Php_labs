<?php

$server = "127.0.0.1";
$login = "root";
$password = "";
$db_name = "online_store";

$link = mysqli_connect($server, $login, $password, $db_name);

if($link == false)
{
    echo "Соединение не удалось";
}
?>