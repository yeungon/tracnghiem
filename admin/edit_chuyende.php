<?php
require ("../includes/session.php");
require ("../includes/config.php");
// lấy id từ biến GET truyền vào
$id = $_GET ['cid'];

if(isset($_POST['ok'])) {
	if ($_POST['txttitle'] == NULL) {
		echo "Lỗi: chưa nhập tên chuyên đề mới";
	}else {
		$t = $_POST['txttitle'];
	}
	if ($t) {

		$sql = "update chuyende set chuyende_title='$t' where cdid ='$id'";
		mysqli_query ($connection, $sql);
		header('location:list_chuyende.php');
		exit();
	}


}

if (isset($_POST['notok'])){
header('location:list_chuyende.php');
		exit();

}

$sql = "SELECT * FROM chuyende where cdid = '$id'";
$query = mysqli_query ($connection, $sql);
$data = mysqli_fetch_assoc ($query);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$value = $data['chuyende_title'];
$varid = $data['cdid'];



// header ("location:list_cate.php");
// exit();

?>



<form action="edit_chuyende.php?cid=<?php echo $varid;?>" method="POST">
<!-- Có thể tạo một trường ẩn type = hidden để đưa giá trị của cate_id khớp với Title tương ứng tiếp đến hứng giá trị  của ID này bằng hàm $_POST-->
<!-- Cách 2: Truyền TRỰC TIẾP ID của cate_id cần đường dẫn sửa vào trong chính action của form -->
<!-- <input type="hidden" name="cid" value="<?php echo $data[cate_id];?>"> -->
Tên chuyên đề: <input type="text" name="txttitle" size="25" value ="<?php echo $value;?>" /> <br/>
<input type="submit" name="ok" value = "Sửa"/>
<input type="submit" name="notok" value = "Không sửa"/>
	
</form>