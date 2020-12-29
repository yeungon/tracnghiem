<?php
require ("../includes/session.php");
require ("../includes/config.php");
// lấy id từ biến GET truyền vào

$id = $_GET ['cid'];
$sql = "DELETE FROM cate_news where cate_id = '$id'";
mysqli_query ($connection, $sql);
header ("location:list_cate.php");
exit();
?>