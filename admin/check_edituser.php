<?php 
include("../conn.php");

session_start();

if(isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin")
{
$id = $_POST['id'];
$md5_change_pass = md5($_POST['change_pass']);

$sql = mysql_query("update user set password='$md5_change_pass' where id=$id");

if($sql){
    echo "<script>alert('change password success!');history.back();window.location.href='manageuser.php';</script>";
}
else{
    echo "<script>alert('change password failed!');history.back();window.location.href='manageuser.php';</script>";
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
