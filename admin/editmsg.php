<?php
include '../conn.php';

$id = $_GET["id"];
$result = mysql_query("select * from lsamsgcnt where id=$id");

while ($row = mysql_fetch_array($result)) {
    $username = $row["username"];
    $content = $row["content"];
    $date = date("Y-m-d-H:i:s",$row["date"]);
}

?>

<form action="saveedit.php?id=<?php echo $id ?>" method="post">
<input name="username" size="20" type="text" value="<?php echo $username; ?>"/>
<input name="date" size="30" type="text" value="<?php echo $date; ?>"/><br/>
<textarea id="cnt" name="content" cols="42" rows="15"></textarea><br/>
<input type="submit" value="edit">
</form>

<script>  
	document.getElementById("cnt").value="<?php echo $content ?>";  
</script>  
