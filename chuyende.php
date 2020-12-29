<!DOCTYPE html>
<html lang="en">
<head>
<title> Trắc nghiệm online, trắc nghiệm trực tuyến</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<META name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<!-- <link media="only screen and (max-device-width: 480px)" 
    href="iPhone.css" type="text/css" rel="stylesheet" /> -->
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans|Playfair+Display" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/giaodien/css.css">
<style type="text/css">


a{
text-decoration: none;

}

</style>
</head>

<body>
<?php
require ("./includes/config.php");
// $X = 0;
// $B = 4;

// $sql = "select * from cauhoi LIMIT $X, $B";
// // hàm mysqli_query thường có 2 tham số 
// $query = mysqli_query ($connection, $sql);

// hàm fetch_assoc chỉ lấy được giá trị đầu tiên trong row, nên phải dùng vòng while để đổ hết dữ liệu ra.
// echo $id; 
// 	echo $dapandung;
// echo "<strong>Đáp án là: </strong>".$dapan."<br/>";
?>

<?php 
include ("./giaodien/header.php");

?>
 
 
 <div id = "wrapper" style="margin-top: 40px;">
 <div id ="content">
 <div id ="question">
 </div> <!--question-->


 <table align="center" width="320">
<tr>
	<td class="title"><b>STT</b></td>
	<td lass="title"><b>Tên chuyên đề - bộ câu hỏi</b></td>
	<td lass="title"><b>Topic</b></td>
		

<?php
	// $get = $_GET ['cid'];
	// // // ép kiểu để tránh SQL injection, bắt buộc biến ID truyền vào là số
	// // if(is_numeric($get)){

	// // 	$id = $get;
	// // }else {

	// // 	return false;
	// // }

	// $sql = "SELECT * FROM chuyende where cate_id = '$id' AND cauhoi_kiemduyet = 'Y' ORDER BY qid DESC limit 0, 10";
	$sql = "SELECT * FROM chuyende ORDER BY cdid DESC limit 0, 15";
	// // hàm mysqli_query thường có 2 tham số
	$query = mysqli_query ($connection, $sql);
	$tongso = mysqli_num_rows($query);

	echo "Bạn đang duyệt nội dung trắc nghiệm theo chuyên đề."." Hiện có ".$tongso." chuyên đề </br>";
	
	$stt = 0;
	while($data = mysqli_fetch_assoc($query))
		{
		  	$stt ++;
		  	
		  	$chuyende = $data ['chuyende_title'];

		  	$chude = $data [cate_id];
		  	$cdid = $data[cdid];

		  	$sql2 = "SELECT * FROM cate_news where cate_id = '$chude'";
		  	$query2 = mysqli_query ($connection, $sql2);
		  	$data2 = mysqli_fetch_assoc($query2);
		  	$tenchude = $data2[cate_title];

		  	$slug = strtolower(removesign($chuyende));


		  	echo "<tr>";
		  	echo "<td>".$stt."</td>";
		  	// echo "<td><a href ='listchuyende.php?cid=$data[cdid]'>$chuyende</a><br/></td>";
		  	// echo "<td><a href='chitietchude.php?cid=$chude'>$tenchude</td>";
		  	echo "<td><a href ='$slug/$cdid.html'>$chuyende</a><br/></td>";
		  	// echo "<td><a href ='$slug-$cdid.html'>$chuyende</a><br/></td>";
		  	echo "<td><a href='chitietchude/$chude'>$tenchude</td>";
		  	// echo "<td><a href='chude/$chude'>$tenchude</td>";
		  	echo "</tr>";

		  	
		}

 
?>

</tr>

</table>
     
    </div> <!--  content    -->
    
    
   
  <!--   <div id ="rightcol"> 
    <h3><input type="text" value="0" id = "score"/><span class = "score2">/10</span></h3>
    </div> <!--  cột phải rightcol    -->
     
    <div id="bottom"> 

	
    <div id = "copyright">© vuong</div> 
    </div>   <!--score  -->
    </div><!--bottom-->
    </div> <!-- wrapper   -->
  <!--  -->
  
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1017682-17', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>












	



