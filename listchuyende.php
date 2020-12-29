<!DOCTYPE html>
<html lang="en">
<head>
<title>
<?php
	$get = $_GET ['cid'];
	// ép kiểu để tránh SQL injection, bắt buộc biến ID truyền vào là số
	if(is_numeric($get)){

		$id = $get;
	}else {

		return false;
	}

	require ("./includes/config.php");
	$sql2= "SELECT * FROM chuyende WHERE cdid ='$id'";
	$query2 = mysqli_query ($connection, $sql2);
	$data2 = mysqli_fetch_assoc($query2);
	$title = $data2['chuyende_title'];
	echo $title;
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
<!-- facebook stuff -->

<!-- <?php
// require ("./includes/config.php");
// $X = 0;
// $B = 4;

// $sql = "select * from cauhoi LIMIT $X, $B";
// // hàm mysqli_query thường có 2 tham số 
// $query = mysqli_query ($connection, $sql);

// hàm fetch_assoc chỉ lấy được giá trị đầu tiên trong row, nên phải dùng vòng while để đổ hết dữ liệu ra.
// echo $id; 
// 	echo $dapandung;
// echo "<strong>Đáp án là: </strong>".$dapan."<br/>";
?> -->

<?php 

include ("./giaodien/header.php");
require ("./includes/config.php");
require ("./includes/highlight/geshi.php");


?>
 
 
 <div id = "wrapper">
 <div id ="content">
 <div id ="question">
 </div> <!--question-->

<?php

	$get = $_GET ['cid'];
	// ép kiểu để tránh SQL injection, bắt buộc biến ID truyền vào là số
	if(is_numeric($get)){

		$id = $get;
	}else {

		return false;
	}

	$sql = "SELECT * FROM cauhoi where chuyende_id = '$id' AND cauhoi_kiemduyet = 'Y' AND ganchuyende = 'Y' ORDER BY qid ASC";
	// // hàm mysqli_query thường có 2 tham số
	$query = mysqli_query ($connection, $sql);
	$socauhoi = mysqli_num_rows($query);

	$sql2= "SELECT * FROM chuyende WHERE cdid ='$id'";
	$query2 = mysqli_query ($connection, $sql2);
	$data2 = mysqli_fetch_assoc($query2);
	$title = $data2['chuyende_title'];

	$test = strtolower(removesign($title));
	

	echo "Bạn đang làm trắc nghiệm theo bộ đề<b> ".$title.".</b><br/>"." Hiện có<b> ".$socauhoi." </b>câu hỏi trong bộ đề này. </br>";


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

		  	echo "<div class = 'khung'>";

		  	/*highlight*/
			
			
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
    <h3><input type="text" value="0" id = "score"/><span class = "score2">/<?php echo $socauhoi;?></span></h3>
    
      <!-- facebook -->
    <div class="fb-like" data-href="https://www.facebook.com/www.tracnghiem.com.vn/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
    <!-- end of facebook stuff -->

    </div> <!--  cột phải rightcol    -->

    
    
    <div id="bottom"> 

	
    <div id = "copyright">© vuong</div> 

      
    
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












	



