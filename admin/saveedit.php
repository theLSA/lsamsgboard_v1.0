<?php
include '../conn.php';

session_start();

if(isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin")
{

$id = $_GET["id"];
$econtent = $_POST["content"];
$result = mysql_query("update lsamsgcnt set content='$econtent' where id=$id");

if($result)
{
    echo "<script>alert('success edit!');location.href='../index.php';</script>";
}
else
{
    echo "failed edit!".mysql_error();
}
}
else
{
	header('HTTP/1.1 403 Forbidden');
	header("status: 403 Forbidden"); 
	include "../403.php";
}
?>
