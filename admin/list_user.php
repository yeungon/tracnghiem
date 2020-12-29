<?php
require ('../includes/session.php');
require ('../includes/config.php');
?>

<!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
<head>Quản lý người dùng</head>
<style type="text/css">
charset"utf-8";
/* CSS by Vuong and supported by @dung, @chiptran Copyright July 2017 */
/*thÃ¡nh css: https://css-tricks.com/examples/ShapesOfCSS/*/
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
*{
 margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  
}

html{
background: transparent;  
/* border: 1px solid grey;   */

}

body{
/* width: 1000px; */
/* border: 10px solid red; */
margin: auto;/*ná»™i dung hiá»‡n ra giá»¯a khi Ä‘áº·t margin = auto*/
background: #d3d3d3;
font-family: 'Open Sans', 'sans-serif';
background-color: #eee;
}

#heading {
width: auto;
height: 50px;
line-height: 150px;
font-family: Helvetica, Arial;
/*border: 1px solid grey;*/
/* text-align: center; */
font-weight: bold;
color: #000;
font-size: 30px;
padding-left: 25%;
background-color: #fff;  

    
}

#nav{
height: 27px;
line-height: 27px;
background-color: #e5d0ff!important;
font-family: Helvetica, Arial;
/*border: 1px solid grey;*/
  
}


#subnav{
height: 27px;
line-height: 27px;
padding-left: 10px;
background-color: #e5d0ff;
width: 890px;
border-bottom-left-radius: 5px;
font-family: Helvetica, Arial;
margin: 1px auto;
color: black;
  
}

#wrapper{
width: 890px;
/*border: 1px solid grey;*/
margin: 1px auto;
background-color: white;
/* padding: 5px; */
 /*border-radius: 2px; */
  
}


#content {
padding: 10px;
width: 880px;
margin: auto;
border-radius: 2px;
background-color: white;
margin-top: 2px;
border: 0.5px solid grey;
  
}

td {
font-family: Helvetica, Arial;
font-size:13px;
text-align: center;
border: 1px solid green;
}

.title {
background-color: green;
/*font-weight: bold;*/
color: white;
}

a{
color: green;
text-decoration: none;
font-weight: bold;

}

a:hover {
color:deeppink;

}


.traloia, .traloib, .traloic, .traloid {
  
border: 1px solid grey;
font-family: Helvetica, tahoma;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
width: 34px;
height: 34px;
line-height: 34px;
text-align: center;
background-color: transparent;
font-size: 17px;
font-weight: bold;
margin-right: 5px;
margin-bottom: 7px;
margin-left: 5px;
font-weight: bold;

}

#thutu
{
border: 1px solid grey;
font-family: Helvetica, tahoma;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
width: 34px;
height: 34px;
line-height: 34px;
text-align: center;
font-size: 17px;
/*font-weight: bold;*/
margin-right: 5px;
/*margin-bottom: 5px;*/
margin-left: 2px;
background-color: #bbb;
color: white;
/*float: right;*/

display: inline-block;
/*position: absolute;*/
}

</style>

<script type="text/javascript">
function xacnhan(){
	if (!confirm("Do you really want to DELETE this question?")) {
	return false;
	}
}

</script>

<body>
<div id ="heading">
</div>

<div id ="nav">
<table align="center" width="860">
  <tr>
    <td><a href="add_cate.php">Thêm chuyên mục</a></td>
    <td><a href="list_cate.php">Quản lý chuyên mục</a></td>
    <td><a href="add_news.php">Thêm câu hỏi</a></td>
    <td><a href="list_news.php">Quản lý câu hỏi</a></td>
    <td><a href="add_user.php">Thêm người dùng</a></td>
    <td><a href="add_cate.php">Quản lý người dùng</a></td>
    <td><a href="logout.php">Đăng xuất</a></td>
  </tr>
</table>
</div>
<div id ="content">
<table align="center" width="860">
<tr>
	<td class="title">STT</td>
	<td class="title">Tên truy cập</td>
	<td class="title">Cấp bậc</td>
	<td class="title">Sửa</td>
	<td class="title">Xóa</td>
</tr>	
	
<?php
$sql = "SELECT * FROM user ORDER BY userid DESC";
$query = mysqli_query ($connection, $sql);
if (mysqli_num_rows ($query) == 0) {
	echo "Không có người dùng nào";
}else {
	$stt = 0;
	while ($data = mysqli_fetch_assoc($query)) {
	$stt++;
	echo "<tr>";
	echo "<td>$stt</td>";
	echo "<td>".$data['username']."</td>";
	if ($data['level'] ==1) {
	echo "<td><font color = 'red'>Quản trị viên</font></td>";
	}else {
		echo "<td>Thành viên</td>";

	}
	// một cái nối chuỗi, một cái không
	echo "<td><a href ='edit_user.php?cid=$data[userid]'>Sửa</a></td>";
	echo "<td><a href ='del_user.php?cid=$data[userid]' onclick = 'return xacnhan();'>Xóa</a></td>";
	echo "</tr>";

	}


}



?>
</tr>
</table>

</div><!--content  -->
</body>