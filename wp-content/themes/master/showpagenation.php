<?php
  $url = $_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $last=$arr[count($arr)-1];
?>

<div class="pagenation">
	 <p style="display: none;" id="total" ><?php echo $count; ?></p>
	 <button onclick="movepre('<?php echo $last ?>')" id="arrowleft" class="arrowleft">
	 	<img src="./img/arrowleft.png"></button>
	<span id="pagingDiv"></span> 	
	 <button id="arrowright" onclick="movenex('<?php echo $count ?>','<?php echo $last ?>')" class="arrowleft">
	 	<img src="./img/arrowright.png">
	 </button>
</div>