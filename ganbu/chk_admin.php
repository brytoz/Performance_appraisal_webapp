<?php
if(empty($_SESSION['login_name']))
  {
echo"<script>top.location.href='../index.php'</script>";
   exit;
  }
?>