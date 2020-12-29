<div id ="menu" >
<ul >

<li><a href="/">Trang chủ</a></li>
<li><a href="/about">About</a></li>
<li><a href="/chuyende">Chuyên đề</a></li>

<?php

include ("includes/vietnamese.php");


$sql = "select * from cate_news";
$query = mysqli_query ($connection, $sql);
if (mysqli_num_rows($query) == 0)
	{echo "Chưa có dữ liệu";}
else
{

	while ($data = mysqli_fetch_assoc($query)) {
		$id = $data [cate_id];
		$title = $data [cate_title];
		$slug = strtolower(removesign($title));
		// echo "<li><a href = 'chude.php?cid=$id'>$title</a></li>";
		echo "<li><a href = '/trac-nghiem-$slug-$id.html'>$title</a></li>";

	}
}

?>
</ul>
 </div><!--menu    -->     