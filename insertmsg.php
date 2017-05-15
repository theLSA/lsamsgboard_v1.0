<?php

session_start();

include "MessageBookHelper.php";
include "conn.php";

if ($_SESSION["isok"]=="ok" || $_SESSION["isok"]=="admin") 
{

$username = MessageBookHelper::magic($_POST['username']);
$msgcontent = MessageBookHelper::magic($_POST['msgcontent']);

$msgdate = time();

$insertstr = "insert into lsamsgcnt(username, content, date) value('$username', '$msgcontent', '$msgdate')";


$issuccess = mysql_query($insertstr);

if ($issuccess) {
    echo "<script>alert('insert success!');location.href='index.php';</script>";
} else {
    echo "<script>alert('insert failed!');location.href='index.php';</script>";
}
}

else
{

echo "<script>alert('please login then submit your message');location.href='index.php';</script>";

}

?>

