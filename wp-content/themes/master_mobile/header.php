<?php 
  $url = $_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $last=$arr[count($arr)-1];
   if($last=='Master.php'){
    $word = '导师简介';
	$laststr = 'Master';   
   }
   if($last=='MastersPicture.php'){
    $word = '导师法相';
    $laststr = 'Master’s Picture';
   }
   if($last=='Work.php'||$last=='WorksCatalogone.php'){
    $word = '导师著作';
    $laststr = 'Works';
   }
   if($last=='Lecture.php'||$last=='Answer.php'){
    $word = '导师讲词';
    $laststr = 'Lecture';
   }
   if($last=='Disabuse.php'||$last=='DisabusedeDatile.php'){
    $word = '导师解惑';
    $laststr = 'Dispel doubt';
   }
   if($last=='BookNotes.php'||$last=='BookNotesone.php'){
    $word = '耕云书笺';
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
      		<a class="nav_b" href="http://anxiangchan.org.cn">
      			<p>网站首页</p>
      			<p>Home</p>
      		</a>
      	</li>
      	<li >
      		<div class="actbg"></div>
      		<a class="nav_b" href="Master.php">
      			<p >耕云导师</p>
      			<p>Master</p>
      		</a>
      		<div  class="nav_content">
      			<a href="Master.php">导师简介</a>
      			<a href="MastersPicture.php">导师法相</a>
      		</div>
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="Work.php">
      			<p>导师著作</p>
      			<p>Works</p>
      		</a>
      		
      	</li>
      	<li>
      		<div class="actbg"></div>
      		<a class="nav_b" href="Lecture.php">
      			<p>法音讲词</p>
      			<p>Lecture</p>
      		</a>
      		<div class="lecture_content">
      			<a href="Lecture.php">导师讲词</a>
      			<a href="Disabuse.php">导师解惑</a>
      			<a href="BookNotes.php">耕云书笺</a>
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
      			<p>联系我们</p>
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

 