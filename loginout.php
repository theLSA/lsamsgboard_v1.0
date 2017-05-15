<?php

session_start();
unset($_SESSION["ok"]);
session_destroy();
header("location:index.php");


?>
