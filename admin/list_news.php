<?php
require ('../includes/session.php');
require ('../includes/config.php');
require ("../includes/highlight/geshi.php");
?>

<!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
<head>

<title>Quản lý câu hỏi</title>
<style type="text/css">
charset"utf-8";
/* CSS by Vuong and supported by @dung, @chiptran Copyright July 2017 */
/*thÃ¡nh css: https://css-tricks.com/examples/ShapesOfCSS/*/
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
*{
 margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  
}

html{
background: transparent;  
/* border: 1px solid grey;   */

}

body{
/* width: 1000px; */
/* border: 10px solid red; */
margin: auto;/*ná»™i dung hiá»‡n ra giá»¯a khi Ä‘áº·t margin = auto*/
background: #d3d3d3;
font-family: 'Open Sans', 'sans-serif';
background-color: #eee;
}


#nav{
height: 27px;
line-height: 27px;
background-color: #e5d0ff!important;
font-family: Helvetica, Arial;
/*border: 1px solid grey;*/
  
}


#subnav{
height: 27px;
line-height: 27px;
padding-left: 10px;
background-color: #e5d0ff;
width: 890px;
border-bottom-left-radius: 5px;
font-family: Helvetica, Arial;
margin: 1px auto;
color: black;
  
}



#content {
padding: 5px;
width: 960px;
margin: auto;
border-radius: 2px;
background-color: white;
margin-top: 2px;
border: 0.5px solid grey;
  
}

td {
font-family: Helvetica, Arial;
font-size:13px;
text-align: left;
border: 1px solid green;
}

.title {
background-color: green;
/*font-weight: bold;*/
color: white;
}

a{
color: green;
text-decoration: none;
font-weight: bold;

}

a:hover {
color:deeppink;

}

a {
text-decoration: none;
}


.phantrang {
	padding: 5px;
	border: 1px solid #660066;
	margin: 7px;
	/*font-weight: bold;*/
	text-decoration: none;
	color: #660066;
}	
.phantrang a{
	padding: 5px;
	border: 1px solid green;
	/*font-weight: bold;*/
	text-decoration: none;
	color: #660066;
}	

.phantrang a:hover{
	font-weight: bold;
	color: #660066;
	text-decoration: none;
}	

.active {
	padding: 5px;
	border: 1px solid #660066;
	margin: 5px;
	font-weight: bold;
	text-decoration: none;
	background-color: #be29ec;
	color: white;}

#phantrang {
margin: 10px;
padding-top: 5px;





}








</style>



</head>

<script type="text/javascript">
function xacnhan(){
	if (!confirm("Do you really want to DELETE this question?")) {
	return false;
	}
}

</script>




<body>
<!-- <div id ="heading">
</div> -->

<div id ="nav">
<table align="center" width="950">
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
</div>
<p>
	<?php 

	if(isset($_SESSION['success'])){
		echo "<center style='color:green'>".$_SESSION['success']."</center>";
		unset($_SESSION['success']); // hiển thị rồi xóa :-)
	} 

	
	?>
	
		</p>
<div id ="content">
<table align="center" width="950">
<tr>
	<td class="title">STT</td>
	<td class="title">Câu hỏi</td>
	<td class="title">Chủ đề</td>
	<td class="title">Đáp án A</td>
	<td class="title">Đáp án B</td>
	<td class="title">Đáp án C</td>
	<td class="title">Đáp án D</td>
	<td class="title">Đáp án đúng</td>
	<td class="title">Nội dung đáp án</td>
	<td class="title">Tình trạng</td>
	<td class="title">Xóa</td>
	<td class="title">Sửa</td>
	
<?php
	$B = 10;
    // lấy tổng số record, $A:
    $sql2 = "SELECT * FROM cauhoi";
	$query2 = mysqli_query ($connection, $sql2);
	$A = mysqli_num_rows ($query2);

	// số trang cần có để hiển thị được số câu hỏi
    $C = ceil ($A/$B);
    // lấy vị trí hiện tại VÀ tránh SQL injection
    if(isset($_GET['page'])) {
	 	   	$page = $_GET ['page']; 
	    	if (is_numeric($page)){
	    		$X = $page;
	    	}else {return false;}
    }else{
    
    $X = 0;
	}


$sql = "SELECT * FROM cauhoi ORDER BY qid DESC limit $X, $B";
$query = mysqli_query ($connection, $sql);

if (mysqli_num_rows ($query) == 0) {
	echo "Không có câu hỏi nào";
}else {
	$stt = 0;
	while ($data = mysqli_fetch_assoc($query)) {
	// lấy số thứ tự
	$stt++; 
	// lấy id của chuyên mục hiện thời ==> dùng để lấy tên chuyên mục ở truy vấn sau
	$chuyenmuc = $data['cate_id'];
	echo "<tr>";
	echo "<td>$stt</td>";
	// echo "<td>".stripslashes(htmlspecialchars($data['question']))."</td>";
	

	/*highlight*/
	$source = $data['codenhung'];
	$code = $data ['code'];
	$language = 'php';
 	$geshi = new GeSHi($source, $language);
	
 	/*hiển thị code hay không*/
	if($code ==0){
		echo "<td>".$data['question']."</td>";

	}else{
	echo "<td>".$data['question']."<br>";
	echo $geshi->parse_code()."</td>";	
	}
	
	// lấy tên của chuyên mục
	$sql2 = "SELECT * FROM cate_news where cate_id = '$chuyenmuc'";
	$query2 = mysqli_query ($connection, $sql2);
	$data2 = mysqli_fetch_assoc($query2);
	// hiển thị tên tiêu đề chuyên mục
	echo "<td>".$data2['cate_title']."</td>";
	echo "<td>".stripslashes(htmlspecialchars($data['a1']))."</td>";
	echo "<td>".stripslashes(htmlspecialchars($data['a2']))."</td>";
	echo "<td>".stripslashes(htmlspecialchars($data['a3']))."</td>";
	echo "<td>".stripslashes(htmlspecialchars($data['a4']))."</td>";
	echo "<td>".$data['correct']."</td>";
	echo "<td>".stripslashes(htmlspecialchars($data['anwser']))."</td>";
	$kiemduyet = $data['cauhoi_kiemduyet'];
		if ($kiemduyet == "N") {echo "<td>"."Chưa đăng"."</td>";}else {echo "<td>"."Đã đăng"."</td>";}
		// echo "<td>".$data['cauhoi_kiemduyet']."</td>";
	// một cái nối chuỗi, một cái không
	echo "<td><a href ='edit_news.php?cid=$data[qid]'>Sửa</a></td>";
	echo "<td><a href ='del_news.php?cid=$data[qid]' onclick = 'return xacnhan();'>Xóa</a></td>";
	echo "</tr>";

	}


}



?>
</tr>
</table>


<!-- phân trang -->
   <div id = 'phantrang' align="center">

   <?php
   if ($C > 1)
   		{
			// trang hiện hành
   			$D = $X/$B + 1;
	  		// hiển thị nút trang trước khi trang hiện hành không bằng 1
	  		if ($D != 1) {
	  			// trang đầu
	  			echo "<a href = 'list_news.php?page=0' class='phantrang'>Trang đầu</a>";
	  			$Y = $X - $B;
				echo "<a href = 'list_news.php?page=$Y' class='phantrang'>Trang trước</a>";
			}
			// hiển thị các trang giữa
			// 2 biến $begin và $end dùng để hiển thị SELECTIVELY (lựa chọn) trước và sau trang hiện hành. 
			$begin = $D - 2;
			if ($begin <1) {
				$begin = 1;
			}

			$end = $D + 2;
			if ($end > $C)
				{$end = $C;
			}

			for ($i = $begin; $i <=$end; $i++){
				if ($D==$i) {
					// không truyền liên kết và in đậm trang hiện hành
					echo "<span class = 'active'>$i</span>";
				}else {

						$Y = ($i-1)*$B;
						echo "<a href = 'list_news.php?page=$Y' class='phantrang'>$i</a>";
				}
			}


	  		// hiển thị nút kế tiếp khi trang hiện hành khác $C (số trang cần hiển thị)
	  		if ($D!=$C){
	  			$Y = $X + $B;
   				echo "<a href ='list_news.php?page=$Y' class='phantrang'>Trang kế</a>";
   				$Y = ($C-1)*$B;
   				echo "<a href ='list_news.php?page=$Y' class='phantrang'>Trang cuối</a>";
   			}

   		}	

   ?>

   </div>   <!-- phân trang -->

   </div><!--content  -->

</body>