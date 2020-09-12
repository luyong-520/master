<?php 
  $url = $_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $last=$arr[count($arr)-1];
   if($last=='AboutMaster.php'){
    $word = '师父简介';
    $laststr = 'About Master';
   }
   if($last=='MastersPicture.php'){
    $word = '师父法相';
    $laststr = 'Master’s Picture';
   }
   if($last=='Works.php'||$last=='WorksCatalogone.php'){
    $word = '师父著作';
    $laststr = 'Works';
   }
   if($last=='Lecture.php'||$last=='Answer.php'){
    $word = '师父讲词';
    $laststr = 'Lecture';
   }
   if($last=='Disabuse.php'||$last=='DisabusedeDatile.php'){
    $word = '师父解惑';
    $laststr = 'Dispel Doubt';
   }
   if($last=='BookNotes.php'||$last=='BookNotesone.php'){
    $word = '耕耘书笺';
    $laststr = 'Writing Notes';
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
   <header id="headers">
           <div id="bagtitle">
              <nav id="btflower"><img src="./img/btflower.png"><nav>
              <span style="color:#D18324;"><?php echo mb_substr($word,0,2) ?></span>
              <span style="color:#41200A;"><?php echo mb_substr($word,2,2) ?></span> 
              <p><?php echo $laststr; ?></p>
           </div>  

         <div id="Navigation">

        <div id="dropdown">
        <div class="dropbtn">
          <a href="http://gengyun.yc384.com/" class="dropdownone">网站首页</a>
          <a href="http://gengyun.yc384.com/" class="dropdowntwo">Home</a>
        </div>
        </div>
        
        <div id="dropdown" style="width:32px">
        <div class="dropbtn">
          <a href="./AboutMaster.php" class="dropdownone">耕耘师父</a>
          <a href="./AboutMaster.php" class="dropdowntwo">Master</a>
        </div>

        <button class="sjx"></button>
        <div class="dropdown-content" style="width:50px;">
          <div class="dcbtn">
            <a href="./AboutMaster.php" class="dcbtnone"><button class="dot"></button>师父简介</a>
            <a href="./MastersPicture.php" class="dcbtnone"><button class="dot"></button>师父法相</a>
          </div>
        </div>
        </div>
        
        <div id="dropdown">
         <div class="dropbtn">
          <a href="./Works.php" class="dropdownone">师父著作</a>
          <a href="./Works.php" class="dropdowntwo">Works</a>
        </div>
        </div>

        <div id="dropdown" style="width:32px">
        <div class="dropbtn">
          <a href="./Lecture.php" class="dropdownone">法音讲词</a>
          <a href="./Lecture.php" class="dropdowntwo">Lecture</a>
        </div>
        
        <button class="sjx"></button>
        <div class="dropdown-content" style="width:72px;">
          <div class="dcbtn">
            <a href="./Lecture.php" class="dcbtnone"><button class="dot"></button>师父讲词</a>
            <a href="./Disabuse.php" class="dcbtnone"><button class="dot"></button>师父解惑</a>
            <a href="./BookNotes.php" class="dcbtnone"><button class="dot"></button>耕耘书笺</a>
          </div>
        </div>
      </div>

      <div id="dropdown">
        <div class="dropbtn">
          <a href="./Videos.php" class="dropdownone">讲法视频</a>
          <a href="./Videos.php" class="dropdowntwo">Videos</a>
        </div>
      </div>

      <div id="dropdown">
        <div class="dropbtn">
          <a href="./Songs.php" class="dropdownone">禅曲欣赏</a>
          <a href="./Songs.php" class="dropdowntwo">Songs</a>
        </div>
      </div>

      <div id="dropdown">
        <div class="dropbtn">
          <a href="Communication.php" class="dropdownone">联系我们</a>
          <a href="Communication.php" class="dropdowntwo">Contact Us</a>
        </div>
      </div>

       </div>
   </header>