<?php

include "../conn.php";
session_start();


if(isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin")
{
$rspid = $_GET["id"];
$mid = $_GET["mid"];

$getdelrspfloor = mysql_query("select floor from rsplist where id=$rspid");
$rdrf = mysql_fetch_array($getdelrspfloor);

$thechangefloor = $rdrf['floor'];
echo $thechangefloor;
echo "hi";


$changefloor = mysql_query("select id,floor from rsplist where msgid=$mid and floor>$thechangefloor");


$delrspsql = mysql_query("delete from rsplist where id=$rspid");
$getrspnum = mysql_query("select rspnum from lsamsgcnt where id=$mid");

$rst = mysql_fetch_array($getrspnum);

while($rcf = mysql_fetch_array($changefloor))
{
	$thefloor = $rcf['floor'] - 1;
	$theid = $rcf['id'];
	echo $thefloor;
	echo $theid;
	$updatefloor = mysql_query("update rsplist set floor='$thefloor' where id=$theid");
	if(!$updatefloor)
	{
		echo "<script>alert('update floor failed!');</script>";
		exit();
	}	

}

//echo $rst["rspnum"];
$newrspnum = $rst["rspnum"] - 1;

if($delrspsql==1)
{
    $result = mysql_query("update lsamsgcnt set rspnum='$newrspnum' where id=$mid");
    if($result)
	{
		echo "update rspnum success!";
	}
	else
	{
		echo "update rspnum failed!".mysql_error();
	}

}
else
{
    echo "delete rsp failed!".mysql_error();
}
}
else
{
	header('HTTP/1.1 403 Forbidden');
	header("status: 403 Forbidden"); 
	include "../403.php";
}

?>
