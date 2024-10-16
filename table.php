<?php

// ------- Sql Code -------
include("config.php");

mysqli_multi_query(
    $conn,
    "CREATE TABLE `users` (
        `id` bigint PRIMARY KEY,
        `step` varchar(20),
        `time` text,
        `account` text,
        `coin` text,
        `serves` text,
        `phone` text,
        `ref` text,
        `codeM` text,
        `name` text,
        `bez` text,
        `test` text
        ) default charset = utf8mb4;
        CREATE TABLE `vip` (
        `id` text,
        `code` text
        ) default charset = utf8mb4;
        CREATE TABLE `server` (
        `ip` text,
        `username` text,
        `port` text,
        `password` text
        ) default charset = utf8mb4;
        CREATE TABLE `pay` (
        `id` text,
        `nameS` text,
        `coin`,
        `time`
        ) default charset = utf8mb4;
        CREATE TABLE `Settings` (
        `bot` text,
        `test` text
        ) default charset = utf8mb4;
        CREATE TABLE `coin` (
        `ref` text,
        `reset` text
        ) default charset = utf8mb4;
        CREATE TABLE `code` (
        `code` text
        ) default charset = utf8mb4;
        CREATE TABLE `codeH` (
        `code` text,
        `coin` text
        ) default charset = utf8mb4;
        CREATE TABLE `serves` (
        `name` text,
        `coin` text,
        `time` text,
        `hajm` text,
        `key` text ,
        `server` text
        ) default charset = utf8mb4;
        CREATE TABLE `shoper` (
        `name` text,
        `coin` text,
        `time` text,
        `hajm` text
        ) default charset = utf8mb4;
        CREATE TABLE `servesPay` (
        `id` text,
        `key` text,
        `username` text,
        `password` text
        ) default charset = utf8mb4;");
    if(mysqli_connect_errno()){
    echo "به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysqli_connect_error();
    die();
}else{
echo "دیتابیس متصل و نصب شد .";

            
            
            
            
            
}

?>
