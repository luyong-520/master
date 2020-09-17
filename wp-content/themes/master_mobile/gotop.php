<?php

?>
<div onclick="gotop()" class="gotop">
	<img src="./img/arrowright.png">
</div>
  <script type="text/javascript">
    function gotop(){
    	scrollTo(0,0,true);
    }
  	window.addEventListener('scroll',function(){
  		var scrollTop = document.documentElement.scrollTop||document.body.scrollTop;
  		if(scrollTop>120){
           document.getElementsByClassName('gotop')[0].style = 'display:block;'
  		}else{	
           document.getElementsByClassName('gotop')[0].style = 'display:none;'
  		}
  	});
  </script>