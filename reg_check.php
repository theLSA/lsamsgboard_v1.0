<?php
  $db = mysql_connect("127.0.0.1","root","") or die("Fail to connect db");  
  mysql_select_db("lsamsgbd",$db) or die ("can't connect to lsamsgbd".mysql_error());  
  $username = $_POST['username'];  
  $password = $_POST['password'];  
  $pwd_again = $_POST['pwd_again'];   
  if($username==""||$password=="")  
  {  
      echo"error:username or password empty";  
  }  
  else   
  {  
      if($password!=$pwd_again)  
      {  
          echo"password is different！";  
          echo"<a href='reg.php'>input again</a>";  
      }  
      else  
      {  
      $md5pass = md5($password);
          $sql = "insert into user(username,password) values('$username','$md5pass')";  
          $result = mysql_query($sql);  
          if(!$result)  
          {  
              echo"Fail reg！".mysql_error();  
              echo"<a href='reg.php'>返回</a>";  
          }  
          else   
          {  
              echo"Success reg!";  
          }  
      }  
  }  
?>  
