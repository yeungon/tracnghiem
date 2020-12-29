<?php
require ('../includes/session.php');
require ('../includes/config.php');
?>
<head>
<title>Quản lý chuyên đề</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	
#nav2 {
height: 27px;
line-height: 27px;
background-color: #e5d0ff!important;
font-family: Helvetica, Arial;
/*border: 1px solid grey;*/

}
#nav2: hover {

background-color: red;
}




</style>

</head>

<script type="text/javascript">
	function xacnhan () {
		if (!window.confirm ("Do you really want to DELETE this category?")) {
		return false;
		}
	}
</script>
<link href="css.css" rel="stylesheet" type="text/css">
<body>
<div id="heading"> Quản lý chuyên đề
</div>

<div id ="nav2">
<table align="center" width="860">
  <tr>
    <td><a href="index.php">Trang chính</a></td>
    <td><a href="add_cate.php">Thêm chuyên mục</a></td>
    <td><a href="list_cate.php">Quản lý chuyên mục</a></td>
    <td><a href="add_news.php">Thêm câu hỏi</a></td>
    <td><a href="list_news.php">Quản lý câu hỏi</a></td>
    <td><a href="add_chuyende.php">Thêm câu hỏi</a></td>
    <td><a href="list_chuyende.php">Quản lý chuyên đề</a></td>
    <td><a href="add_user.php">Thêm người dùng</a></td>
    <td><a href="list_user.php">Quản lý người dùng</a></td>
    <td><a href="logout.php">Đăng xuất</a></td>
  </tr>
</table>
</div><!-- nav -->

</div>
 <div id = "wrapper">
 <div id ="content">

<table align="center" width="500">
<tr>
	<td class="title">STT</td>
	<td lass="title">Tên chuyên mục</td>
	<td lass="title">Sửa</td>
	<td lass="title">Xóa</td>
<?php
$sql = "SELECT * FROM chuyende ORDER BY cdid DESC";
$query = mysqli_query ($connection, $sql);
if (mysqli_num_rows ($query) == 0) {
	echo "Không có chuyên đề nào";
}else {
	$stt = 0;
	while ($data = mysqli_fetch_assoc($query)) {
	$stt++;
	echo "<tr>";
	echo "<td>$stt</td>";
	echo "<td>".$data['chuyende_title']."</td>";
	// một cái nối chuỗi, một cái không
	echo "<td><a href ='edit_chuyende.php?cid=$data[cdid]'>Sửa</a></td>";
	echo "<td><a href ='del_chuyende.php?cid=$data[cdid]' onclick ='return xacnhan();'>Xóa</a></td>";
	echo "</tr>";

	}


}



?>


</tr>

</table>

</div>
</div>
</body>