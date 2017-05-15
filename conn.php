<?php

    $db = mysql_connect("127.0.0.1","root","") or die("Fail to connect db！".mysql_error());  
    mysql_select_db("lsamsgbd",$db) or die ("Can't connect to lsamsgbd".mysql_error()); 

?>

