<?php
session_start();
// làm mã validate đăng nhập
// tạo 2 số ngẫu nhiên ==> Tính tổng 2 số ngẫu nhiên bằng một biến ==> Tạo 2 trường input, một trường là tổng của 2 số người dùng nhập vào, một trường là hidden/có value sẵn từ tổng của 2 số ngẫu nhiên kia.

// Có thể dùng mã bảo vệ bằng số ngẫu nhiên, dùng md5 mã hóa 32 kí tự, dùng hàm substr ($chuỗi_cắt, vị trí đầu tiên, số lượng đơn vị sẽ cắt), dùng hàm tạo hình ảnh.

$number = rand (1, 30);
$number2 = rand (1, 10);

$tongkytu = $number + $number2;


if(isset($_POST['ok'])){

	if($_POST['txtnumber']!= $_POST['checkednumber']){

		echo "The code put is incorrect";

	}else {
			
	if($_POST['txtuser'] == NULL){
		echo "I think we should have an username!".'<br/>';
		}else{
			
			// thêm addslashes
			$u = $_POST['txtuser'];
			// $u = mysqli_real_escape_string ($b);
		}
	if($_POST['txtpass'] == NULL){
		echo "Why you don't put the password dude?";
		}else{
			$p = md5($_POST ['txtpass']);
		}
	if ($u && $p){
		require ('../includes/config.php');
		// tránh SQL injection, hàm mysqli_real_escape_string phải có 2 thông số: kết nối và $u
		$u = addslashes(mysqli_real_escape_string ($connection, $u));
		$sql = "SELECT * FROM user WHERE username = '$u' AND password = '$p'";
		// hàm mysqli_query cần 2 biến ()
		$query = mysqli_query ($connection,$sql);

		if (mysqli_num_rows($query) == 0)
			{
			echo "The username or password is likely incorrect!";

			error_log("Login fail with username as: ".$u."and password as: ".$_POST ['txtpass']);


			}else {
			// sinh SESSION
			$data=mysqli_fetch_assoc($query);
			$_SESSION['ses_username']=$data['username'];
			$_SESSION['ses_level']=$data['level'];
			$_SESSION['ses_userid']=$data['userid'];
			if($data['level']='1'){
				$_SESSION['CKFinder_UserRole'] = "admin";
			}
			header("location:index.php");
			exit();	
			}
	
		}
	}
}


?>
<head>
<title>Quản lý trắc nghiệm</title>
	

</head>

<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	
body{

font-family: 'Open Sans', 'sans-serif';
width: 780px;
margin: auto;
margin-top: 100px;
border: 1px solid #000;
height: 250px;
padding: 20px;
border-radius: 2px;
	}

#login{

margin: auto;
margin-top: 10px;
width: 450px;
border: 1px solid green;
background-color: #e5d0ff;
padding-left: 5px;

}

/*.button {
	border-radius: 5px;
  padding: 15px 25px;
  font-size: 22px;
  text-decoration: none;
  margin: 20px;
  color: #fff;
  position: relative;
  display: inline-block;
 background-color: #55acee;
  box-shadow: 0px 5px 0px 0px #3C93D5;


}

.button:hover {
  background-color: #6FC6FF;
}*/

</style>

<body>
<div id = 'login'>

<h4> Quản lý trắc nghiệm </h4>
<form action="login.php" method="post">

<table>
	<tr>
		<td>Username: </td>
		<td><input type="text" name="txtuser" size="25" /><br /></td>
		</tr>
	<tr>
		<td>Password: </td>
		<td><input type="password" name="txtpass" size="25" /><br /></td>
	</tr>

	<tr>
		<td><?php echo $number;?> + <?php echo $number2;?> = </td>
		<td><input type="number" name="txtnumber" size="2"><br/></td>
		<td>
		<input type="hidden" name="checkednumber" value = "<?php echo $tongkytu; ?>">
		</td>
	</tr>

	<tr>
		<td></td>
		<td>
		<div class = "button">
		<input type="submit" name="ok" value="Login" /><div>
		</td>
	</tr>

</table>
</form>
</div>

</body>

