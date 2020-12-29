<?php
require ('../includes/session.php');
require ('../includes/config.php');
?>
<head>
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
<div id="heading"> Quản lý chuyên mục
</div>

<div id ="nav2">
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
// phân trang
$B = 3; // số record muốn hiển thị trên trang
$sql = "SELECT * FROM cate_news";
$query = mysqli_query ($connection, $sql);
// tổng số record
$A = mysqli_num_rows ($query);
// tổng số trang
$C = ceil ($A/$B);
// vị trí hiện haành

if(isset($_GET['start'])) {

	$X = $_GET['start'];
}else {
		$X = 0;
}




$sql = "SELECT * FROM cate_news limit $X, $B";
$query = mysqli_query ($connection, $sql);
if (mysqli_num_rows ($query) == 0) {
	echo "Không có chuyên mục nào";
}else {
	$stt = 0;
	while ($data = mysqli_fetch_assoc($query)) {
	$stt++;
	echo "<tr>";
	echo "<td>$stt</td>";
	echo "<td>".$data['cate_title']."</td>";
	// một cái nối chuỗi, một cái không
	echo "<td><a href ='edit_cate.php?cid=$data[cate_id]'>Sửa</a></td>";
	echo "<td><a href ='del_cate.php?cid=$data[cate_id]' onclick ='return xacnhan();'>Xóa</a></td>";
	echo "</tr>";

	}


}



?>


</tr>

</table>

</div>
</div>

<div align="center">
<?php if ($C >1) {

	$D = $X/$B + 1;
	if ($D!=1) {
		$Y = $X - $B;
		echo "<a href = 'list_cate.php?start=$Y&page=$C'>Prev</a>";}

	for ($i =1; $i <= $C; $i++) {

		if ($D == $i) {
			echo "<b>$i</b>";
		}else {
				$Y = ($i-1)*$B;
				echo "<a href = 'list_cate.php?start=$Y&page=$C'>$i<a>";
		}
	}
	

	if ($D != $C) {
		$Y = $X + $B;
		echo "<a href ='list_cate.php?start=$Y&page=$C'>Next</a>";
	}
} 

?>

</body>