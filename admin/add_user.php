<?php
require ("../includes/session.php");
require ("../includes/config.php");

if(isset($_POST['ok'])){
		if ($_POST['txtusername'] == NULL){
			echo "Vui lòng nhập tên tài khoản";
		}else {
			$username = $_POST['txtusername'];
		}

		if ($_POST['txtpassword1'] == NULL){
			echo "Vui lòng nhập mật khẩu";
		}else {
			$p1 = $_POST['txtpassword1'];
		}

		if ($_POST['txtpassword2'] == NULL){
			echo "Vui lòng nhập xác nhận mật khẩu";
		}else {
			$p2 = $_POST['txtpassword2'];
		}

		if ($p1!=$p2){echo "Maajt khau khong khop";}else {$password = md5($p1);}

		$level = $_POST['level'];
		
		if($username && $password && $level) {
				$sql="SELECT * FROM user";
				$query = mysqli_query ($connection, $sql);
				
				if (mysqli_num_rows($query) ==1){
					echo "Tai khoan nay da co";
					}else {
						$sql2 = "INSERT INTO user(username, password, level )
						VALUES ('$username', '$password', '$level')";
						mysqli_query ($connection, $sql2);
						// echo "Theem thanh cong";
						header ("location:list_user.php");
						exit();

				}	
		}



}

?>


<head>
<link href="css.css" rel="stylesheet" type="text/css">

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


<body>
<div id="heading"> Thêm người dùng
</div>

<div id ="nav2">
<table align="center" width="860">
  <tr>
    <td><a href="add_cate.php">Thêm chuyên mục</a></td>
    <td><a href="list_cate.php">Quản lý chuyên mục</a></td>
    <td><a href="add_news.php">Thêm câu hỏi</a></td>
    <td><a href="list_news.php">Quản lý câu hỏi</a></td>
    <td><a href="add_user.php">Thêm người dùng</a></td>
    <td><a href="list_user.php">Quản lý người dùng</a></td>
    <td><a href="logout.php">Đăng xuất</a></td>
  </tr>
</table>
</div><!-- nav -->

</div>
 <div id = "wrapper">
 <div id ="content">

<form action="add_user.php" method="POST">

<table class = "bang" align="center" width="500">
<tr>
	<td> Tài khoản đăng nhập: </td>
	<td><input type="text" name="txtusername" size="25"><br/></td>
</tr>
<tr>
	<td>Mật khẩu: </td>
	<td><input type="text" name="txtpassword1" size="25"><br/></td>
</tr>
<tr>
	<td>Xác nhận mật khẩu: </td>
	<td>
	<input type="text" name="txtpassword2" size="25"><br/>
	</td>
</tr>
<tr>
	<td>Level: </td>
	<td>
	<select name = "level">
	<option value ="1">Quản trị</option>	
	<option value="4">Thành viên</option>
	</select>
	</td>
	<br/>

	<!-- <td><input type="text" name="level" size="25"><br/></td> -->
</tr>

<tr>
	<td></td>
	<td><input type="submit" name="ok" value="Submit"></td>
</tr>
</table>
	
</form>

</div>
</div>
</body>