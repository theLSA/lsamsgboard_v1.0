<?php

session_start();

include "../conn.php";
include "../MessageBookHelper.php";

$aname = MessageBookHelper::magic($_POST["aname"]);
$apass = MessageBookHelper::magic($_POST["apass"]);

$md5apwd = md5($apass);
$re = mysql_query("select count(*) from auser where aname='$aname' and apass='$md5apwd'");
$row = mysql_fetch_row($re);
$isok = $row[0];

if($isok==1)
{
    $_SESSION["isok"]="admin";
    $_SESSION["currentuser"]="$aname";
    echo "<script>alert('success login!');location.href='../index.php';</script>";
}
else
{
    echo "failed login!";
}
?>
