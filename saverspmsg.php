<?php

include "conn.php";
session_start();

$msgid = $_GET['msgid'];
$rspuser = $_POST['rspuser'];
$berspuser = $_POST['berspuser'];
$rspmsgcontent = $_POST['rspmsgcontent'];
$rspdate = time();

if($_SESSION["isok"]=="admin")
{
	$isadmin = 1;
}
else
{
	$isadmin = 0;
}

$getrspnum = mysql_query("select rspnum from lsamsgcnt where id=$msgid");
$rst = mysql_fetch_array($getrspnum);
$floor = $rst["rspnum"] + 1;

$sql = mysql_query("insert into rsplist(msgid,rspuser,berspuser,rspcnt,isadmin,rspdate,floor) value('$msgid','$rspuser','$berspuser','$rspmsgcontent','$isadmin','$rspdate','$floor')");

if($sql)
{	
	$result = mysql_query("update lsamsgcnt set rspnum='$floor' where id=$msgid");
	if($result)
	{
		echo "<script>alert('update rspnum success!');location.href='index.php';</script>";
	}
	else
	{
		echo "update rspnum failed!".mysql_error();
	}
}
else
{
	echo "insert into rsplist failed!".mysql_error();
}

?>	


