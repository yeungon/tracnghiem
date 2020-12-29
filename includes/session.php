<?php session_start();
if($_SESSION['ses_level'] != 1){
  header ("location:login.php");
  exit();
}
?>