<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

//------- Sql DataBase -------
$serverName = "localhost"; // ادیت نشود
$db_name    = ""; // نام دیتابیس
$db_user    = ""; // یوزر دیتابیس
$db_pass    = "JhI)O87j67&^"; // پسورد دیتابیس

$conn = mysqli_connect($serverName, $db_user, $db_pass, $db_name);

if(!$conn){

    die('failed ' . mysqli_connect_error());
}
//------- Data -------
$token        = "52959"; // توکن ربات
$admin        = "544316811"; // عددی ادمین
$chanel       = "AlaCode"; // کانال جوین اجباری
$bot_id       = "";
$chanSef      = "-1001659798195";
$web          = "";
//------- Function -------  
function bot($method, $user = []){
    global $token;
$url = "https://api.telegram.org/bot$token"."/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
$res = curl_exec($ch);
if (curl_error($ch)) {
    var_dump(curl_error($ch));
} else {
    return json_decode($res);
}
}
    
    
    
    
    
?>