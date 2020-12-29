<?php
require ("../includes/session.php");
if(isset($_POST['ok'])){
		if ($_POST['txtcate'] == NULL){
			echo "Vui lòng nhập tiêu đề chuyên mục";
		}else {
			$c = $_POST['txtcate'];
		}
		if($c) {
				require ("../includes/config.php");
				$sql = "INSERT INTO cate_news(cate_title)
						VALUES ('$c')";
				mysqli_query ($connection, $sql);
				header ("location:list_cate.php");
				exit();

		}


}


?>



<form action="add_cate.php" method="POST">
Categorie Name: <input type="text" name="txtcate" size="25">
<input type="submit" name="ok" value="Submit">
	
</form>