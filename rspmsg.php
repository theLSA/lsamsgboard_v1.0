<?php

include "conn.php";
session_start();

if(isset($_SESSION["isok"]) && ($_SESSION["isok"] == "admin" || $_SESSION["isok"]=="ok"))
{

$id = $_GET["id"];
$result = mysql_query("select * from lsamsgcnt where id=$id");
$rsprst = mysql_query("select * from rsplist where msgid=$id order by rspdate desc");

$msginfo = mysql_fetch_array($result);

            $ecoStr =  '<p>' . $msginfo["username"] . '<br/>' . $msginfo["content"] . '<br/>' . date("Y-m-d-H:i:s",$msginfo["date"]) . '</p>';
            echo $ecoStr;


$rspinfo = mysql_fetch_array($rsprst);

if($rspinfo==false){
        echo "<div align='center' style='color:#FF0000; font-size:18px'>Sorry,not response! You can get sofa!</div>";
}

else
{
	do {
            $rspstr =  '<p>' . $rspinfo["floor"]."|".$rspinfo["rspuser"].'->'.$rspinfo["berspuser"].' : '.$rspinfo["rspcnt"].'---'.date("Y-m-d-H:i:s",$rspinfo["rspdate"]) . '</p>';
            	echo $rspstr;
	   
	    	echo '<br/>------------------------------------------------';
	}while ($rspinfo = mysql_fetch_array($rsprst));
}
}
else
{
	header('HTTP/1.1 403 Forbidden');
	header("status: 403 Forbidden"); 
	include "403.php";
	exit();
}


?>

------------------------------------------------------------------------------

<form action="saverspmsg.php?msgid=<?php echo $id?>" method="post">
<input name="rspuser" type="text" readonly="true" value="<?php echo $_SESSION['currentuser'];?>"> ----->
<input name="berspuser" type="text" value="<?php echo $msginfo['username'];?>"><br/>
<textarea name="rspmsgcontent" cols="42" rows="15"></textarea><br/>
<input name="submit" type="submit" value="response">
</form>


















