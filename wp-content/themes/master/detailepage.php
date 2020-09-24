
<?php
  $url = $_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $last=$arr[count($arr)-1];
?>
<div class="pagenation">
	 <p style="display: none;" id="detailtotal" ><?php echo $count; ?></p>
	 <button onclick="detailePre('<?php echo $last ?>')"  class="arrowleft">
	 	<img src="./img/arrowleft.png"></button>
	<span id="pagingDetaile"></span> 	
	 <button id="arrowright" onclick="detaileNex('<?php echo $count ?>','<?php echo $last ?>')" class="arrowleft">
	 	<img src="./img/arrowright.png">
	 </button>
</div>