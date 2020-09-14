<?php 
  $url = $_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $last=$arr[count($arr)-1];
   if($last=='Master.php'){
    $word = '师父简介';
	$laststr = 'Master';   
   }
   if($last=='MastersPicture.php'){
    $word = '师父法相';
    $laststr = 'Master’s Picture';
   }
   if($last=='Work.php'||$last=='WorksCatalogone.php'){
    $word = '师父著作';
    $laststr = 'Works';
   }
   if($last=='Lecture.php'||$last=='Answer.php'){
    $word = '师父讲词';
    $laststr = 'Lecture';
   }
   if($last=='Disabuse.php'||$last=='DisabusedeDatile.php'){
    $word = '师父解惑';
    $laststr = 'Dispel doubt';
   }
   if($last=='BookNotes.php'||$last=='BookNotesone.php'){
    $word = '耕耘书笺';
    $laststr = 'Writing notes';
   }
   if($last=='Videos.php'){
    $word = '讲法视频';
    $laststr = 'Videos';
   }
   if($last=='Songs.php'||$last=='ZenMusic.php'){
    $word = '禅曲欣赏';
    $laststr = 'Songs';
   }
   if($last=='Communication.php'){
    $word = '联系我们';
    $laststr = 'Contact Us';
   }
?>
   <div class="navbar">
   	  <div class="close">
   	    
   	  </div>
      <ul >
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="http://gengyun.yc384.com">
      			<p>网站首页</p>
      			<p>Home</p>
      		</a>
      	</li>
      	<li >
      		<div class="actbg"></div>
      		<a class="nav_b" href="javascript:void(0)">
      			<p >耕耘师父</p>
      			<p>Master</p>
      		</a>
      		<div  class="nav_content">
      			<a href="Master.php">师父简介</a>
      			<a href="MastersPicture.php">师父法相</a>
      		</div>
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="Work.php">
      			<p>师父著作</p>
      			<p>Works</p>
      		</a>
      		
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="javascript:void(0)">
      			<p>法音讲词</p>
      			<p>Lecture</p>
      		</a>
      		<div class="lecture_content">
      			<a href="Lecture.php">师父讲词</a>
      			<a href="Disabuse.php">师父解惑</a>
      			<a href="BookNotes.php">耕耘书笺</a>
      		</div>
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="Videos.php">
      			<p>讲法视频</p>
      			<p>Videos</p>
      		</a>
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="Songs.php">
      			<p>禅曲欣赏</p>
      			<p>Songs</p>
      		</a>
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="Communication.php">
      			<p>在线交流</p>
      			<p>Communication</p>
      		</a>
      	</li>
      </ul> 		
   </div>
     <header class="headers">
       <div class="headone"><?php echo mb_substr($word,0,2) ?></div>
       <div class="headtwo"><?php echo mb_substr($word,2,2) ?></div>
       <p><?php echo $laststr; ?></p> 
       <img   class="menu clearfix" src="./img/menu.png">
    </header>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
    
<script type="text/javascript">  
    jQuery.fn.slideLeftHide = function( speed, callback ) {  
        this.animate({  
            width : "hide",  
            paddingLeft : "hide",  
            paddingRight : "hide",  
            marginLeft : "hide",  
            marginRight : "hide"  
        }, speed, callback );  
    };  
    jQuery.fn.slideLeftShow = function( speed, callback ) {  
        this.animate({  
            width : "show",  
            paddingLeft : "show",  
            paddingRight : "show",  
            marginLeft : "show",  
            marginRight : "show"  
        }, speed, callback );  
    };  
</script> 
  <script>
  	//禁止屏幕滑动
   function	stop(){
		var mo=function(e){e.preventDefault();};
		document.body.style.overflow='hidden';
		document.addEventListener('touchmove',mo,false);//禁止页面滑动
		}
		//开启滑动
    function move(){
		var mo=function(e){e.preventDefault();};
		document.body.style.overflow='visible';//出现滚动条
		document.removeEventListener('touchmove',mo,false);
		}
    //点击导航的按钮
    $(".menu").click(function(){
       $(".navbar").slideLeftShow (500); 
       $(".navbar ul").show (500);  
       stop()         
    })
    //点击导航关闭按钮
    $('.close').click(function  () {
    	$(".navbar").slideLeftHide (500);  
    	$(".navbar ul").hide ();  
    	move()
    })
    let hrefurl = location.href.substr(location.href.lastIndexOf('/')+1);
    var urlstr = hrefurl.indexOf('?')>-1? hrefurl.substr(0,hrefurl.indexOf('?')):hrefurl ;
    // 判断那个页面，然后那个页码navbar高亮
    let id = 0
    if(urlstr == 'Master.php' ||urlstr == 'MastersPicture.php' ){
    	id = 1
    }
    if(urlstr == 'Work.php' ||urlstr == 'WorksCatalogone.php' ){
    	id = 2
    }
    if(urlstr == 'Lecture.php' ||urlstr == 'Answer.php'||urlstr == 'Disabuse.php'|| urlstr == 'DisabuseDetile.php'){
    	id = 3
    }
    if(urlstr == 'Videos.php' ){
    	id = 4
    }
    if(urlstr == 'Songs.php' ||urlstr =='ZenMusic.php' ){
    	id = 5
    }
    if(urlstr == 'Communication.php'  ){
    	id = 6
    }
    let bindex = -1
     if(urlstr == 'Master.php'  ){
    	bindex = 0
    	}
    	if(urlstr == 'MastersPicture.php' ){
    	bindex = 1
    	}
    let aindex = -1
    if(urlstr == 'Lecture.php' ||urlstr == 'Answer.php'){
    	aindex = 0
    }
    if(urlstr == 'Disabuse.php'|| urlstr == 'DisabusedeDatile.php'){
    	aindex = 1
    }
     if(urlstr == 'BookNotes.php'|| urlstr == 'BookNotesone.php'){
    	aindex = 2
    }
    $('.navbar .nav_b').eq(id).css({'color':'#D18324'}).siblings().css({'color':'#ffffff'});
    $('.navbar .actbg').eq(id).show()
    //耕耘师父导航点击事件
    $('.navbar .nav_b').eq(1).click(function (){
    	$('.navbar .nav_b').each(function(index){
    		$('.navbar .nav_b').eq(index).css({'color':'#ffffff'})
    	})
    	$('.navbar .actbg').each(function(index){
    		$('.navbar .actbg').eq(index).hide()
    	})
    	$('.navbar .nav_b').eq(1).css({'color':'#D18324'})
    	$('.navbar .actbg').eq(1).show()
    	$('.nav_content').css({'display':'block'})
    	$('.lecture_content').css({'display':'none'})
    	if(bindex == -1){
    		$('.nav_content a').each(function(index){
    			$('.nav_content a').eq(index).css({'color':'#ffffff'})
    		})
    	}else{
    		$('.nav_content a').eq(bindex).css({'color':'#D18324'})
    	}
    	
    })
    //发音讲词导航点击事件
    $('.navbar .nav_b').eq(3).click(function (){
    	$('.navbar .nav_b').each(function(index){
    		$('.navbar .nav_b').eq(index).css({'color':'#ffffff'})
    	})
    	$('.navbar .actbg').each(function(index){
    		$('.navbar .actbg').eq(index).hide()
    	})
    	$('.navbar .nav_b').eq(3).css({'color':'#D18324'})
    	$('.navbar .actbg').eq(3).show()
    	$('.nav_content').css({'display':'none'})
    	$('.lecture_content').css({'display':'block'})
    	if(aindex == -1){
    		$('.nav_content a').each(function(index){
    			$('.nav_content a').eq(index).css({'color':'#ffffff'})
    		})
    	}else{
    	$('.lecture_content a').eq(aindex).css({'color':'#D18324'})
    	}
    })
  </script>