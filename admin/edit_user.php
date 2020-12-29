<?php
require ("../includes/session.php");
require ("../includes/config.php");
// lấy id từ biến GET truyền vào
$id = $_GET ['cid'];
$sql = "SELECT * FROM user where userid = '$id'";
$query = mysqli_query ($connection, $sql);
$data = mysqli_fetch_assoc ($query);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$value = $data['username'];
$varid = $data['userid'];



if(isset($_POST['ok'])) {

	
	if ($_POST['password1'] == NULL) {
		echo "Lỗi: chưa nhập mật khẩu";
	}elseif($_POST['password1'] != $_POST['password2']){
		echo "Mật khẩu không khớp";
	} else {$password = md5($_POST['password1']);}

	$level = $_POST['level'];
	$username = $_POST['txtuser'];

	if ($password && $level)
	{
		// if ($_POST['txtuser'] != $value) 
		// 	{echo "Lỗi: Tên đăng nhập bị chỉnh sửa"; 

		// } else 
		// 	{
				$sql = "update user set password ='$password', level = '$level' where userid ='$id'";
				mysqli_query ($connection, $sql);
				header('location:list_user.php');
				exit();
			// }
	}


}

if (isset($_POST['notok'])){
header('location:list_user.php');
		exit();

}





// header ("location:list_cate.php");
// exit();

?>



<form action="edit_user.php?cid=<?php echo $varid;?>" method="POST">
<!-- Có thể tạo một trường ẩn type = hidden để đưa giá trị của cate_id khớp với Title tương ứng tiếp đến hứng giá trị  của ID này bằng hàm $_POST-->
<!-- Cách 2: Truyền TRỰC TIẾP ID của cate_id cần đường dẫn sửa vào trong chính action của form -->
<!-- <input type="hidden" name="cid" value="<?php echo $data[cate_id];?>"> -->
Level: <select name = "level">
	<option value="1">Quản trị</option>
	<option value="4">Thành viên</option>

</select> <br/>
<!-- Tên truy cập: <input type="text" name="txtuser" size="25" value ="<?php echo $value;?>" /> <br/> -->

Tên tài khoản: <b><?php echo $value;?></b> <br/>
Mật khẩu: <input type="password" name="password1" size="25"  /> <br/>
Xác nhận mật khẩu: <input type="password" name="password2" size="25" /> <br/>

<input type="submit" name="ok" value = "Sửa"/>
<input type="submit" name="notok" value = "Không sửa"/>
	
</form>