<?php
session_start();

require ("../includes/session.php");
require ("../includes/config.php");
require ("../includes/highlight/geshi.php");

if(isset($_POST['ok'])){
		if ($_POST['txtquestion'] == NULL){
			echo "Vui lòng nhập câu hỏi";
		}else {
			$question = addslashes($_POST['txtquestion']);
		}

		if ($_POST['txta1'] == NULL){
			echo "Vui lòng nhập câu trả lời 1";
		}else {
			$a1 = addslashes($_POST['txta1']);
		}

		if ($_POST['txta2'] == NULL){
			echo "Vui lòng nhập câu trả lời 2";
		}else {
			$a2 = addslashes($_POST['txta2']);
		}

		if ($_POST['txta3'] == NULL){
			echo "Vui lòng nhập câu trả lời 3";
		}else {
			$a3 = addslashes($_POST['txta3']);
		}

		if ($_POST['txta4'] == NULL){
			echo "Vui lòng nhập câu trả lời 4";
		}else {
			$a4 = addslashes($_POST['txta4']);
		}

		if ($_POST['txtcorrect'] == NULL){
			echo "Vui lòng nhập đáp án đúng";
		}else {
			$correct = strtolower($_POST['txtcorrect']);
		}

		if ($_POST['txtdapan'] == NULL){
			echo "Vui lòng nhập đáp ánc";
		}else {
			$dapan = addslashes($_POST['txtdapan']);
		}

		$cate = $_POST['cate'];
		$kiemduyet = $_POST['check'];

		$highlight = $_POST['highlight'];

		$codenhung = addslashes($_POST['codenhung']);
				
		$chuyendeid = $_POST['txtchuyende'];

		$ganchuyende = $_POST['ganchuyende'];

		
		if($question && $highlight && $cate && $a1 && $a2 && $a3 && $a4 && $correct && $dapan && $kiemduyet && $chuyendeid && $ganchuyende) {
				
				require ("../includes/config.php");

				// this function is not neccessary except test the function.
				function baomat ($input) {
				$input = addslashes($input);
				return $input;
				}
				// 

				$question = baomat($question);

				
				
				$sql = "INSERT INTO cauhoi(question, codenhung, code, cate_id, a1, a2, a3, a4, correct, anwser, cauhoi_kiemduyet, ganchuyende, chuyende_id)
						VALUES ('$question', '$codenhung', '$highlight', '$cate', '$a1', '$a2', '$a3', '$a4', '$correct', '$dapan', '$kiemduyet', '$ganchuyende','$chuyendeid' )";
				mysqli_query ($connection, $sql);

				$_SESSION['success'] = "Thêm câu hỏi mới thành công";
				header ("location:list_news.php");
				exit();

		}


}


?>
<head>
<title>Thêm câu hỏi</title>
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

.table {

margin-top: 10px;
width: 950px;
text-align: left;

}

</style>
</head>


<body>
<div id="heading"> Thêm câu hỏi
</div>

<div id ="nav2">
<table align="center" width="880">
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

<form action="add_news.php" method="POST">
<table class = "table" >
<tr> 
	<td>Chủ đề: </td>
	<td><select name ="cate">
		<?php
		$sql = "select * from cate_news";
		$query = mysqli_query ($connection, $sql);
		while ($data = mysqli_fetch_assoc($query)) {
				echo "<option value = '$data[cate_id]'>$data[cate_title]</option>";	}

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

<tr> <td>Có gán câu hỏi cho chuyên đề</td>
	<td>
	<!--phải thêm cột xử lý value của input này trong database -->
	<input type="radio" name="ganchuyende" value="Y"/>Gán
	<input type="radio" name="ganchuyende" value="N" checked="checked"/> Không gán
</td>
</tr>
<tr>
	<td> Câu hỏi: </td>
	<td>

	<textarea name = 'txtquestion' rows="7" cols="66"></textarea><br/>

	<!-- <input type="text" name="txtquestion" size="85"><br/> -->
	</td>
</tr>

<tr>
	<td> Mã code nhúng (nếu có): </td>
	<td>

	<textarea name = 'codenhung' rows="9" cols="66"></textarea><br/>

	</td>
</tr>

<!-- <tr>
	<td>Có highlight code hay không
	</td>
	<td>
	<input type="radio" name="highlight" value="1"/>Có
	<input type="radio" name="highlight" value="0" checked="checked"/>Không
	</td>
</tr> -->

<tr>
	<td>Có highlight code hay không?
	</td>
	<td>
	<select name = "highlight">
		<option value="1">Có</option>
		<option value = "2" selected="checked">Không</option>
	</select>
	</td>
</tr>

<tr>
	<td>Đáp án 1: </td>
	<td><input type="text" name="txta1" size="85"><br/></td>
</tr>
<tr>
	<td>Đáp án 2: </td>
	<td>
	<input type="text" name="txta2" size="85"><br/>
	</td>
</tr>
<tr>
	<td>Đáp án 3: </td>
	<td><input type="text" name="txta3" size="85"><br/></td>
</tr>
<tr>
	<td>Đáp án 4: </td>
	<td><input type="text" name="txta4" size="85"><br/></td>
</tr>
<tr>
	<td>Đáp án đúng: </td>
	<td><input type="text" name="txtcorrect" size="5"><br/></td>
</tr>
<tr>
	<td>Câu trả lời:</td> 
	<td><input type="text" name="txtdapan" size="85"><br/></td>
	
</tr>
<tr>
	<td>Kiểm duyệt: 
	</td>
	<td>
	<input type="radio" name="check" value="Y"/>Đăng ngay
	<input type="radio" name="check" value="N" checked="checked"/>Chưa đăng		
	</td>
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