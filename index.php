<?php

session_start();
echo '<h2 align="center">lsamsgboard_v1.0</h2>';

include "conn.php";

if($_GET['page']==""){
        $_GET['page'] = 1;
}
if(is_numeric($_GET['page'])){
        $page_size = 5;
        $query = "select count(*) as total from lsamsgcnt order by username";
        $result = mysql_query($query);
        $msg_count = mysql_result($result,0,0);
        $page_count = ceil($msg_count/$page_size);
        $offset = ($_GET['page'] - 1) * $page_size;
        $sql = mysql_query("select * from lsamsgcnt order by date desc limit $offset,$page_size");
	$info = mysql_fetch_array($sql);
}
      
//$req = mysql_query("select * from lsamsgcnt");


if($info==false){
        echo "<div align='center' style='color:#FF0000; font-size:18px'>Sorry,not message!</div>";
}
echo '##############################################';
do {

	    $rspsql = mysql_query("select * from rsplist where msgid=$info[id] order by rspdate desc");
	    $therspinfo = mysql_fetch_array($rspsql);

            $ecoStr =  '<p>' . $info["username"] . '<br/>' . $info["content"] . '<br/>' . date("Y-m-d-H:i:s",$info["date"]) . '</p>';

            if (isset($_SESSION["isok"]) && $_SESSION["isok"] == "ok") {
		
                echo $ecoStr . "<a href='rspmsg.php?id=" . $info["id"] . "'>rsp</a>";
		

		if($_SESSION["currentuser"]==$info["username"])
		{
			echo "  <a href='delselfmsg.php?id=" . $info["id"] . "'>del</a>";
		}
		
	    }
	    else if (isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin") {
                echo $ecoStr . "<a href='./admin/delmsg.php?id=" . $info["id"] . "'>del</a> <a href='./admin/editmsg.php?id=" . $info["id"] . "'>edit</a> <a href='rspmsg.php?id=" . $info["id"] . "'>rsp</a>";
	    }
	    
	    else {
		echo $ecoStr;
	    }
	    echo '<br/>';
	    if($info["rspnum"]!=0) {
		//echo '0 rsp';

			do {
		if (isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin") {
            $rspstr =  '<p>' . $therspinfo["floor"]."|".$therspinfo["rspuser"].'->'.$therspinfo["berspuser"].' : '.$therspinfo["rspcnt"].'--------------------'.date("Y-m-d-H:i:s",$therspinfo["rspdate"]) . "&nbsp;<a href='./admin/delrsp.php?id=$therspinfo[id]&mid=$info[id]'>d</a></p>";
		}
		else
		{
			 $rspstr =  '<p>' . $therspinfo["floor"]."|".$therspinfo["rspuser"].'->'.$therspinfo["berspuser"].' : '.$therspinfo["rspcnt"].'--------------------'.date("Y-m-d-H:i:s",$therspinfo["rspdate"]) . '</p>';
		}
		if($therspinfo["isadmin"]==1)
		{
			
            		echo "<div style='color:#009900; font-size:14px'>".$rspstr."</div>";
			
	   	}
		else
		{
			echo "<div style='font-size:14px'>".$rspstr."</div>";
		}
	    	echo '------------------------------------------------';
		}while ($therspinfo = mysql_fetch_array($rspsql));
	}
	    echo '<br/>##############################################';
}while ($info = mysql_fetch_array($sql));

echo '<br/>';

?>


<?php
	    echo $_GET['page'] . "/" . $page_count . "<br/>";
            if($_GET['page']!=1){
                echo "<a href=index.php?page=1>1</a>&nbsp;";
                echo "<a href=index.php?page=".($_GET[page]-1)."><--</a>&nbsp;";
            }
            
            if($_GET['page']<$page_count){
                echo "<a href=index.php?page=".($_GET['page']+1).">--></a>&nbsp;";
                echo "<a href=index.php?page=".$page_count.">tail</a>&nbsp;";
            }
            
            
?>

<?php
echo '<br/><br/>************************************************************************************<br/>';
?>

<?php 

if (isset($_SESSION["isok"]) && $_SESSION["isok"] == "ok") {
                echo 'welcome back!'.$_SESSION["currentuser"].'<a href="loginout.php">loginout</a>';
}

else if (isset($_SESSION["isok"]) && $_SESSION["isok"] == "admin")
{

		echo 'welcome back [superuser]'.$_SESSION["currentuser"].'<a href="loginout.php">loginout</a>';
		echo "<br/><a href='./admin/manageuser.php'>manage_user</a>";

}

else {

?>

<form action="checklogin.php" method="post">
username:<input name="username" size="20" type="text"/>password:<input name="password" size="20" type="password">
<input value="login" type="submit"><a href="reg.php">reg</a>
</form>

<?php 
}
?>



<form action="insertmsg.php" method="post">
<input name="username" type="hidden" value="<?php echo $_SESSION['currentuser']?>"> 
<textarea name="msgcontent" cols="42" rows="15"></textarea><br/>
<input value="submit" type="submit">
</form>





