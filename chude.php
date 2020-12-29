<!DOCTYPE html>
<html lang="en">
<head>
<title> 
<?
	$get = $_GET ['cid'];
	// ép kiểu để tránh SQL injection, bắt buộc biến ID truyền vào là số
	if(is_numeric($get) AND $get>0){

		$id = $get;
	}else {

		return false;
	}
require ("./includes/config.php");
$sql2 = "SELECT * FROM cate_news where cate_id = '$id'";
	$query2 = mysqli_query ($connection, $sql2);
	$data2 = mysqli_fetch_assoc($query2);
	$chuyenmuc = $data2['cate_title'];
	echo "Trắc nghiệm ".$chuyenmuc;
?>
</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<META name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<!-- <link media="only screen and (max-device-width: 480px)" 
    href="iPhone.css" type="text/css" rel="stylesheet" /> -->
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans|Playfair+Display" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/giaodien/css.css">
<style type="text/css">

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
	color: white;



}



</style>
<script type="text/javascript">
$(document).ready(function()
{

	var scorea = 0;
	var scoreb = 0;
	var scorec = 0;
	var scored = 0;
	var currentvalue = 0;
	
		
	$(".traloia").click(function ()
		{
			var ida = $(this).attr('id'); //get id value xanh
			var name = $(this).attr('name'); //get id value xanh
			// prompt('Bạn có chắc không?', 'Cacel để chọn lại');
			currentvalue = $("#score").val ();
			if (name =="a")
			{
				$(this ).addClass("correctanwser");
				var x = scorea +  1;
				// hàm Number để xác định số cho một biến js
				var inraa = Number(x) + Number(currentvalue);
				$("#score").val(Number(inraa));
				
			
			} else {
						$(this).addClass("incorrectanwser");
						if (name == "b") 
						{
							$('.traloib#' + ida).addClass("correctanwser");
						}
						else if(name == "c")
						{
							$('.traloic#' + ida).addClass("correctanwser");
						}
						else 
						{ 
							$('.traloid#' + ida).addClass("correctanwser");
						}
					}	
			
			$('.dapan#' + ida).show('fast');// selector = chọn class và chọn id là biến, haha.
			
				

	});

	$(".traloib").click(function ()
	{
			var ida = $(this).attr('id'); //get id value xanh
			var name = $(this).attr('name'); //get id value xanh
			currentvalue = $("#score").val ();
			if (name =="b")
			{
				$(this ).addClass("correctanwser");
				var y = scoreb + 1;
				// var currentvalueb = $("#score").val ();
				var inrab = Number(y) + Number(currentvalue);
				$("#score").val (Number(inrab));
								
			} else {
						$(this).addClass("incorrectanwser");
						if (name == "a") 
						{
							$('.traloia#' + ida).addClass("correctanwser");
						}
						else if(name == "c")
						{
							$('.traloic#' + ida).addClass("correctanwser");
						}
						else 
						{ 
							$('.traloid#' + ida).addClass("correctanwser");
						}
					}	
			$('.dapan#' + ida).show('fast');// selector = chọn class và chọn id là biến, haha.
			
			// $("#score").text ("Điểm: " +	 scoreb );
			
	});

	// scoretong = scoretonga + scoretongb;
	$(".traloic").click(function ()
	{
			var ida = $(this).attr('id'); //get id value 
			var name = $(this).attr('name'); //get name value
			// confirm('Bạn có chắc không?. Nếu không chắc chắn thì ấn Cancel để chọn lại.');
			currentvalue = $("#score").val ();
			if (name =="c")
			{
				$(this ).addClass("correctanwser");
				var z = scorec + 1;
				// var currentvaluec = $("#score").val ();
				var inrac = Number(z) + Number(currentvalue);
				$("#score").val (Number(inrac));
				
			
			} else {
						$(this).addClass("incorrectanwser");
						if (name == "a") 
						{
							$('.traloia#' + ida).addClass("correctanwser");
						}
						else if(name == "b")
						{
							$('.traloib#' + ida).addClass("correctanwser");
						}
						else 
						{ 
							$('.traloid#' + ida).addClass("correctanwser");
						}
					}	

			$('.dapan#' + ida).show('fast');// selector = chọn class và chọn id là biến, haha.
			
	});
		
		$(".traloid").click(function ()
		{
			var ida = $(this).attr('id'); //get id value xanh
			var name = $(this).attr('name'); //get id value xanh
			// confirm('Bạn có chắc không?. Nếu không chắc chắn thì ấn Cancel để chọn lại.');
			currentvalue = $("#score").val ();
			if (name =="d")
			{
				$(this ).addClass("correctanwser");
				var w = scored +  1;
				// var currentvalued = $("#score").val ();
				var inrad = Number(w) + Number(currentvalue);
				$("#score").val (Number(inrad));
			} else {
						$(this).addClass("incorrectanwser");
						if (name == "b") 
						{
							$('.traloib#' + ida).addClass("correctanwser");
						}
						else if(name == "c")
						{
							$('.traloic#' + ida).addClass("correctanwser");
						}
						else 
						{ 
							$('.traloia#' + ida).addClass("correctanwser");
						}
					}	
			$('.dapan#' + ida).show('fast');// selector = chọn class và chọn id là biến, haha.
			
		});
});

	
</script>
 
	




</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=266606746705020";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
require ("./includes/config.php");
include ("./giaodien/header.php");
require ("./includes/highlight/geshi.php");

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
 
 
 <div id = "wrapper">
 <div id ="content">
 <div id ="question">
 </div> <!--question-->

<?php
	
	$get = $_GET ['cid'];
	// ép kiểu để tránh SQL injection, bắt buộc biến ID truyền vào là số
	if(is_numeric($get) AND $get>0){

		$id = $get;
	}else {

		return false;
	}

	// phân trang ----------------------------->
// số record/trang
	$B = 10;
    // lấy tổng số record, $A:
    $sql2 = "SELECT * FROM cauhoi where cate_id = '$id' AND cauhoi_kiemduyet = 'Y'";
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



	$sql = "SELECT * FROM cauhoi where cate_id = '$id' AND cauhoi_kiemduyet = 'Y' ORDER BY qid DESC limit $X, $B";
	// // hàm mysqli_query thường có 2 tham số
	$query = mysqli_query ($connection, $sql);

	// lấy tổng số câu hỏi theo chuyên mục
	// $socauhoi = mysqli_num_rows ($query);

	// lấy tiêu đề chuyên mục theo id của chuyên mục
	$sql2 = "SELECT * FROM cate_news where cate_id = '$id'";
	$query2 = mysqli_query ($connection, $sql2);
	$data2 = mysqli_fetch_assoc($query2);
	$chuyenmuc = $data2['cate_title'];

	$slug = strtolower(removesign($chuyenmuc));

	// đổ dữ liệu ra trang chủ
	if($A == 0) {echo "Chưa có câu hỏi cho chủ đề ".$chuyenmuc.".<br/>"; }else {echo "Hiện có <b>".$A."</b> câu hỏi thuộc chủ đề <b> ".$chuyenmuc.".</b><br/>";}

	echo "Bạn có thể duyệt và làm trắc nghiệm được thiết kế theo bộ đề thuộc topic ".$chuyenmuc ." <a href ='/chitietchude/$id' ><b>tại đây.</b></a>";

	// đổ câu hỏi ra trang chủ
	$stt = 0;
	while($data = mysqli_fetch_assoc($query))
		{
		  	$stt ++;
		  	$dapan = htmlspecialchars($data['anwser']);
		  	$dapandung = $data['correct'];
		  	$cauhoi = htmlspecialchars($data ['question']);
		  // echo "<b>Câu hỏi số</b> ".$stt.".". $data ['question']."<br/>";
		  	$dapana = htmlspecialchars($data ['a1']);
		  	$dapanb = htmlspecialchars($data ['a2']);
		  	$dapanc = htmlspecialchars($data ['a3']);
		  	$dapand= htmlspecialchars($data ['a4']);
		  	$id = $data['qid'];
		  	$row [] = $data;
		  	$classid = "lop".$id;
		  	// chủ đề
		  	$cate = $data['cate_id'];
		  	// thêm query hiển thị chủ đề
		  	
		  	// chủ đề
		  	echo "<div class = 'khung'>";

		  	/*-------------------------------highlight-------------------------------------------*/
					
			$code = $data ['code'];
				
			$source = $data ['codenhung'];

			$language = 'php';
			$geshi = new GeSHi($source, $language);
			
			if($code==1){
		  		echo "<div class ='question'>"."<div id ='thutu'>".$stt."</div>".$cauhoi."</div>";
	  	
  				echo "<span class ='codenhung'>".$geshi->parse_code()."</span>";
  				}else{

  				echo "<div class ='question'>"."<div id ='thutu'>".$stt."</div>".$cauhoi."</div>";		
  				}

		  	echo "<br/>";
						
			

			
			/*-------------------------------end of highlight-------------------------------------------*/

		  	// echo "<div class ='question'>"."<div id ='thutu'>".$stt."</div>".stripslashes($cauhoi)."</div>"."<br/>";

		  	echo "<div class = 'khungtraloi'>"."<input class = 'traloia' type = 'button' name ='$dapandung' value ='a' id ='$classid'/>".stripslashes($dapana)."</div>";
		  	echo "<div class = 'khungtraloi'>"."<input class = 'traloib' type = 'button' name ='$dapandung' value ='b' id ='$classid'/>".stripslashes($dapanb)."</div>";
		  	echo "<div class = 'khungtraloi'>"."<input class = 'traloic' type = 'button' name ='$dapandung' value ='c' id ='$classid'/>".stripslashes($dapanc)."</div>";
		  	echo "<div class = 'khungtraloi'>"."<input class = 'traloid' type = 'button' name ='$dapandung' value ='d' id ='$classid'/>".stripslashes($dapand)."</div>";
		  	echo "<div class ='dapan' id = '$classid'>"."Đáp án: ".strtoupper($dapandung)." - ".stripslashes($dapan)."</div>";
		  	echo "</div>";
		}

?>
     
    </div> <!--  content    -->
    
    
   
    <div id ="rightcol"> 
    <h3><input type="text" value="0" id = "score"/><span class = "score2">/10<!-- <?php echo 10; ?> --></span></h3>
	
	   <!-- facebook -->
    <div class="fb-like" data-href="https://www.facebook.com/www.tracnghiem.com.vn/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
    <!-- end of facebook stuff -->
    
    </div> <!--  cột phải rightcol    -->
    
    <div id="bottom"> 

    <!-- phân trang -->
   <div align="center">

   <?php

   $get = $_GET ['cid'];
	// ép kiểu để tránh SQL injection, bắt buộc biến ID truyền vào là số
	if(is_numeric($get)){

		$id = $get;
	}else {

		return false;
	}


   if ($C > 1)
   		{
			// trang hiện hành
   			$D = $X/$B + 1;
	  		// hiển thị nút trang trước khi trang hiện hành không bằng 1
	  		if ($D != 1) {
	  			// trang đầu
	  			// echo "<a href = 'chude.php?cid=$id&page=0' class='phantrang'>Trang đầu</a>";
	  			echo "<a href = '/trac-nghiem-$slug-$id/page0' class='phantrang'>Trang đầu</a>";
	  			$Y = $X - $B;
				echo "<a href = '/trac-nghiem-$slug-$id/page$Y' class='phantrang'>Trang trước</a>";
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
						// echo "<a href = 'chude.php?cid=$id&page=$Y' class='phantrang'>$i</a>";
						echo "<a href = '/trac-nghiem-$slug-$id/page$Y' class='phantrang'>$i</a>";
				}
			}


	  		// hiển thị nút kế tiếp khi trang hiện hành khác $C (số trang cần hiển thị)
	  		if ($D!=$C){
	  			$Y = $X + $B;
   				echo "<a href ='/trac-nghiem-$slug-$id/page$Y' class='phantrang'>Trang kế</a>";
   				// echo "<a href ='chude.php?cid=$id&page=$Y' class='phantrang'>Trang kế</a>";
   				$Y = ($C-1)*$B;
   				echo "<a href ='/trac-nghiem-$slug-$id/page$Y' class='phantrang'>Trang cuối</a>";
   				// echo "<a href ='chude.php?cid=$id&page=$Y' class='phantrang'>Trang cuối</a>";
   			}

   		}	

   ?>

   </div>   <!-- phân trang -->
	
	
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












	



