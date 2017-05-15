<?php

    include "../conn.php";
session_start();

if(!isset($_SESSION["isok"]) && $_SESSION["isok"] != "admin")
{
	header('HTTP/1.1 403 Forbidden');
	header("status: 403 Forbidden"); 
	include "../403.php";
	exit();
}
    
    if($_GET['page']==""){
        $_GET['page'] = 1;
    }
    if(is_numeric($_GET['page'])){
        $page_size = 5;
        $query = "select count(*) as total from user order by username";
        $result = mysql_query($query);
        $user_count = mysql_result($result,0,0);
        $page_count = ceil($user_count/$page_size);
        $offset = ($_GET['page'] - 1) * $page_size;
        $sql = mysql_query("select * from user order by username limit $offset,$page_size");
        $info = mysql_fetch_array($sql);   //get a group record(5).mysql_num_rows($sql) is 5
    }
?>
 
<form name="myform" method="post" action="search.php" target="_blank" >
          <input name="searchname" type="text" id="searchname" size="25"> 
          &nbsp;
          <input type="submit" name="Submit" value="search">
</form>


<table width="100%" height="200"  border="1" cellpadding="0" cellspacing="0" bgcolor="#9E7DB4" align="center"> 
<tr valign="top" bgcolor="#FFFFFF"> 
    <td height="100">
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="90" align="center" valign="top">
              <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#625D59">
                <tr align="center" bgcolor="#00cc00">
          <td width="70">username</td>
                  <td width="200">password</td>
          <td width="20">edit</td>
                </tr>

<?php           
    if($info==false){
        echo "<div align='center' style='color:#FF0000; font-size:18px'>Sorry,not found!</div>";
    }

    do{
    
?>
        <tr align="left" bgcolor="#FFFFFF">
                  
                  <td align="center" height="30"><?php echo $info[username]; ?></td>
                  <td align="center"><?php echo $info[password]; ?></td>
         <td align="center"><a href="deluser.php?id=<?php echo $info[id]; ?>"><img src="../images/delete.gif" width="20" border="0"></a>
        <a href="edituser.php?id=<?php echo $info[id]; ?>"><img src="../images/edit.gif" width="20" border="0"></a>
        </td>
                </tr>


<?php
    }
    while($info=mysql_fetch_array($sql));
?>

    <table width="50" border="0" cellspacing="0" cellpadding="0"> 
    <tr> 
    <td width="37%">page:<?php echo $_GET['page'];?>/<?php echo $page_count;?>&nbsp;&nbsp;&nbsp;</td>
        <td width="63%" align="right">
        <?php
            if($_GET['page']!=1){
                echo "<a href=manageuser.php?page=1>1</a>&nbsp;";
                echo "<a href=namageuser.php?page=".($_GET[page]-1)."><--</a>&nbsp;";
            }
            
            if($_GET['page']<$page_count){
                echo "<a href=manageuser.php?page=".($_GET['page']+1).">--></a>&nbsp;";
            echo "<a href=manageuser.php?page=".$page_count.">tail</a>&nbsp;";
            }
            
            
        ?>
    </tr>
    </table>
        
        
          </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>***found records&nbsp;<font color="red"><?php echo $user_count;?></font>***</td>
        </tr>
      </table>
    <br></td> 
  </tr> 
</table>

<?php
mysql_free_result($sql);
mysql_close($db);
?>
