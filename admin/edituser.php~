<?php
include("../conn.php");

$id = $_GET['id'];


$sql = mysql_query("select * from user where id=$id");
$row = mysql_fetch_object($sql);
?>

<form name="updateuserform" method="post" action="check_edituser.php">
<input name="id" type="hidden" value="<?php echo $id;?>">s
username:<input name="user" type="text" value="<?php echo $row->username;?>" readonly="true"><br/>
new password:<input name="change_pass" type="password"><br/>
new password again<input name="change_pass_aga" type="password"><br/>
<input name="submit" type="submit" value="change" onClick="return checkpass(updateuserform)">
<input name="reset" type="reset">
</form>

<script>
function checkpass(form){
    if(form.change_pass.value==""|form.change_pass_aga.value==""){
        alert("please input password or input password again");return false;
    }
    if(form.change_pass.value!=form.change_pass_aga.value){
        alert("two password are different!");return false;
    }
    form.submit();
}
</script>

<?php
mysql_free_result($sql);
mysql_close($db);
?>


