<?php
include("../conn.php");

session_start();

if(isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin")
{
$id = $_GET['id'];

$sql = mysql_query("delete from user where id=$id");
if($sql){
    echo "<script>alert('delete user success！');history.back();window.location.href='manageuser.php';</script>";
}else{
    echo "<script>alert('delete user failed！');history.back();window.location.href='manageuser.php';</script>";
}

mysql_free_result($sql);
mysql_close($db);
}
else
{
	header('HTTP/1.1 403 Forbidden');
	header("status: 403 Forbidden"); 
	include "../403.php";
}
?>
