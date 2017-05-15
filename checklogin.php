<?php

session_start();

include "conn.php";
include "MessageBookHelper.php";

$username = MessageBookHelper::magic($_POST["username"]);
$password = MessageBookHelper::magic($_POST["password"]);

$md5pwd = md5($password);
$re = mysql_query("select count(*) from user where username='$username' and password='$md5pwd'");
$row = mysql_fetch_row($re);
$isok = $row[0];

if($isok==1)
{
    $_SESSION["isok"]="ok";
    $_SESSION["currentuser"]="$username";
    echo "<script>alert('success login!');location.href='index.php';</script>";
}
else
{
    echo "failed login!";
}
?>
