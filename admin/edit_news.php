<?php
require ("../includes/session.php");
require ("../includes/config.php");
// lấy id từ biến GET truyền vào
$id = $_GET ['cid'];

if(isset($_POST['ok'])) {
	if ($_POST['txtcauhoi'] == NULL) 
	{
		echo "Lỗi: chưa nhập câu hỏi";
	}else 	{
			$cauhoi = addslashes($_POST['txtcauhoi']);
			}
	if ($_POST['txtdapana'] == NULL) 
	{
		echo "Lỗi: chưa nhập đáp án A";
	}else 	{
			$dapana = addslashes($_POST['txtdapana']);
			}
	if ($_POST['txtdapanb'] == NULL) 
	{
		echo "Lỗi: chưa nhập đáp án B";
	}else 	{
			$dapanb = addslashes($_POST['txtdapanb']);
			}
	if ($_POST['txtdapanc'] == NULL) 
	{
		echo "Lỗi: chưa nhập đáp án C";
	}else 	{
			$dapanc = addslashes($_POST['txtdapanc']);
			}
	if ($_POST['txtdapand'] == NULL) 
	{
		echo "Lỗi: chưa nhập đáp án D";
	}else 	{
			$dapand = addslashes($_POST['txtdapand']);
			}

	if ($_POST['txtdapandung'] == NULL) 
	{
		echo "Lỗi: chưa nhập đáp án đúng";
	}else 	{
			$dapandung = addslashes($_POST['txtdapandung']);
			}
	if ($_POST['txtdapan'] == NULL) 
		{
			echo "Lỗi: chưa nhập đáp án";
		}else 	{
				$dapan = addslashes($_POST['txtdapan']);
				}

	
	
	// getting the value from kiểm duyệt
	$kd = $_POST['txtkiemduyet'];
		$kiemduyet = '';
		if ($kd == "Chưa đăng" OR $kd =="Không đăng") {
			$kiemduyet= 'N';
		}else {
			$kiemduyet= 'Y';
	}

	$cate = $_POST['txtchude'];
	$ganchuyende = $_POST['ganchuyende'];
	$chuyende = $_POST['txtchuyende'];

	if ($cauhoi && $dapana && $dapanb && $dapanc && $dapand && $dapandung && $dapan && $kiemduyet && $cate && $ganchuyende && $chuyende) {

	// UPDATE table_name
	// SET column1 = value1, column2 = value2, ...
	// WHERE condition;

		$sql = "UPDATE cauhoi SET question='$cauhoi', a1 = '$dapana', a2 = '$dapanb', a3 = '$dapanc', a4 = '$dapand', correct = '$dapandung', anwser = '$dapan', cauhoi_kiemduyet = '$kiemduyet', cate_id = '$cate', ganchuyende ='$ganchuyende', chuyende_id = '$chuyende' where qid ='$id'";
		mysqli_query ($connection, $sql);
		header('location:list_news.php');
		exit();
	}
}

if(isset($_POST['notok'])){
header('location:list_news.php');
		exit();
	
}



$sql = "SELECT * FROM cauhoi where qid = '$id'";
$query = mysqli_query ($connection, $sql);
$data = mysqli_fetch_assoc ($query);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$varid = $data['qid'];
$varcauhoi = stripslashes($data['question']);
$vardapana = stripslashes($data['a1']);
$vardapanb = stripslashes($data['a2']);
$vardapanc = stripslashes($data['a3']);
$vardapand = stripslashes($data['a4']);
$vardapandung = $data['correct'];
$vardapan = stripslashes($data['anwser']);
$varkiemduyet = $data['cauhoi_kiemduyet'];



// header ("location:list_cate.php");
// exit();

?>

<head>
<title>Sửa câu hỏi</title>
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

td {

text-align: center;	
}


</style>


</head>


<body>
<div id="heading"> Sửa câu hỏi
</div>
<div id ="nav2">
<table align="center" width="860">
  <tr>
	<td><a href="index.php">Trang chính</a></td>
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


<form action="edit_news.php?cid=<?php echo $varid;?>" method="POST">
<!-- Có thể tạo một trường ẩn type = hidden để đưa giá trị của cate_id khớp với Title tương ứng tiếp đến hứng giá trị  của ID này bằng hàm $_POST-->
<!-- Cách 2: Truyền TRỰC TIẾP ID của cate_id cần đường dẫn sửa vào trong chính action của form -->
<!-- <input type="hidden" name="cid" value="<?php echo $data[cate_id];?>"> -->

<table>
<tr>
	<td>Câu hỏi: </td>
	<td>

	
<!-- <input type="text" name="txtcauhoi" size="100" value ='' />  -->
	<textarea name ="txtcauhoi" row = "3" cols = "60" ><?php echo $varcauhoi; ;?>
	</textarea><br/>
	</td>
</tr>

<tr>
	<td>Chủ đề - topic: </td>

	<td>
	<select name="txtchude">
	<?php

	$sql = "SELECT * FROM cate_news";
	$query = mysqli_query ($connection, $sql);
	while ($data =mysqli_fetch_assoc($query)) {
		$cate_id = $data[cate_id];
		$cate_title = $data [cate_title];
	echo "<option value = '$cate_id'>$cate_title</option>";
	}
	?>
	</select>	

	</td>

</tr>

<tr colspan ="3">
<td>Chuyên đề hiện tại: </td>
<td><select name ="txtchuyende">
		<?php

		$sql = "SELECT * from chuyende ORDER BY cdid DESC limit 0, 7";
		$query = mysqli_query ($connection, $sql);

		while($data = mysqli_fetch_assoc($query)){

			$value = $data['cdid'];
			$title = $data['chuyende_title'];

		echo "<option value = '$value'>$title</option>";	
		}

		?>
	</select>
</td>
</tr>

<tr>
	<td>Có gán câu hỏi cho chuyên đề</td>
	<td>
	<!--phải thêm cột xử lý value của input này trong database -->
	<input type="radio" name="ganchuyende" value="Y"/>Gán
	<input type="radio" name="ganchuyende" value="N" checked="checked"/> Không gán
	</td>
</tr>

<tr>
<td>Đáp án a: </td>
<td><input type="text" name="txtdapana" size="25" value ="<?php echo $vardapana;?>" /> <br/></td>
</tr>

<tr>
<td>
Đáp án b: </td>
<td><input type="text" name="txtdapanb" size="25" value ="<?php echo $vardapanb;?>" /> <br/></td>
</tr>
<tr>
<td>
Đáp án c: </td>

<td><input type="text" name="txtdapanc" size="25" value ="<?php echo $vardapanc;?>" /> <br/></td>
</tr>
<tr>
<td>Đáp án d: </td>
<td><input type="text" name="txtdapand" size="25" value ="<?php echo $vardapand;?>" /> <br/></td>
</tr>
<tr>
<td>
Đáp án đúng: </td>

<td><input type="text" name="txtdapandung" size="3" value ="<?php echo $vardapandung;?>" /> <br/></td>
</tr>
<tr>
<td>
Đáp án: </td>
<td><input type="text" name="txtdapan" size="100" value = '<?php echo $vardapan;?>' /> <br/></td>
</tr>

<tr>

<td>Kiểm duyệt: </td><!-- <input type="text" name="txtkiemduyet" size="5" value =" -->

<td><select name = "txtkiemduyet">
<option value ="<?php echo $varkiemduyet;?>">

<?php 
if($varkiemduyet == "N"){ 
	echo "Chưa đăng";
	} 
?>

<?php 
if($varkiemduyet == "Y"){ 
	echo "Đã đăng";
	} 
?>
</option>
<option>
<?php 
if($varkiemduyet == "N"){ 
	echo "Duyệt đăng";
	} 
?>

<?php 
if($varkiemduyet == "Y"){ 
	echo "Không đăng";
	} 
?>



</option>
</select>
<br/>
</td>
</tr>

<tr>
<td>Quyết định</td>
<td>
<input type="submit" name="ok" value = "Sửa" size="5"/>
<input type="submit" name="notok" value = "Không sửa" size="5"/>
</td>
</tr>
	


</table>
</form>

</div>
</div>
</body>