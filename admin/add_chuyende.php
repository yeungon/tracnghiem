<?php
require ("../includes/session.php");
require ("../includes/config.php");
if(isset($_POST['ok'])){
		if ($_POST['txtchuyende'] == NULL){
			echo "Vui lòng nhập tiêu đề chuyên đề";
		}else {
			$c = $_POST['txtchuyende'];
		}
		$chude = $_POST['chude'];

		if($c) {
				// require ("../includes/config.php");

				$sql = "INSERT INTO chuyende(chuyende_title, cate_id)
						VALUES ('$c', '$chude')";
				mysqli_query ($connection, $sql);
				header ("location:list_chuyende.php");
				exit();

		}


}


?>

<head>
<title>Thêm chuyên đề</title>
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
<div id="heading"> Thêm chuyên đề
</div>
<div id="nav2">
	

</div>



<form action="add_chuyende.php" method="POST">

<table width="600" align="center" >
<tr>
		<td> Chuyên đề: </td>
		<td>
		<input type="text" name="txtchuyende" size="35">
		</td>
</tr>
<tr>
		<td>Chủ đề: </td>
		<td> <select name = "chude">
			<?php
			$sql = "select * from cate_news";
			$query = mysqli_query ($connection, $sql);
			while ($data = mysqli_fetch_assoc($query)) {

				$value = $data[cate_id];
				echo "<option value ='$value' >$data[cate_title]</option>";	}

			

			?>
		</select>
		</td>
</tr>

<tr>
		<td></td>
		<td>
		<input type="submit" name="ok" value="Submit">
		</td>
</tr>
</table>
</form>

</body>