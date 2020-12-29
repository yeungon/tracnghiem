<?php
require ('../includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Quản trị trắc nghiệm</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<META name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<!-- <link media="only screen and (max-device-width: 480px)" 
    href="iPhone.css" type="text/css" rel="stylesheet" /> -->
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
     
 <div id ="heading"> Dashboard
 </div> <!--   heading   -->


 <div id ="nav"> <span class = "megamenu">nội dung 1</span> <span class = "megamenu">nội dung 2 </span> </div><!--nav    -->
 <div id = "wrapper">
 <div id ="content">


<table align="center">
  <tr>
    <td colspan="8" class="title"><?php
    echo "Welcome back, đồng chí ".'<b>'.strtoupper($_SESSION['ses_username']).'</b>'.' - '; echo "Mức độ truy cập của đồng chí là level ".$_SESSION['ses_level'].'. ';
    $thoigian = date("j, M, Y");  
    echo "Hôm nay là $thoigian";
    ?> </td>
  </tr>
  <tr>
    <td><a href="/index.php">Trang chủ</a></td>
       <td><a href="add_cate.php">Thêm chuyên mục</a></td>
    <td><a href="list_cate.php">Quản lý chuyên mục</a></td>
    <td><a href="add_chuyende.php">Thêm chuyên đề</a></td>
    <td><a href="list_chuyende.php">Quản lý chuyên đề</a></td>
    <td><a href="add_news.php">Thêm câu hỏi</a></td>
    <td><a href="list_news.php">Quản lý câu hỏi</a></td>
    <td><a href="add_user.php">Thêm người dùng</a></td>
    <td><a href="list_user.php">Quản lý người dùng</a></td>
    <td><a href="logout.php">Đăng xuất</a></td>
  </tr>
</table>


     
</div> <!--  content    -->
</div> <!-- wrapper   -->
 
</body>
</html>












	



