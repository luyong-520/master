<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
    <div id="container">
       <header id="headers">
           <div id="bagtitle">
              <nav id="btflower"><img src="./img/btflower.png"><nav>
              <span style="color:#D18324;">师父</span>
              <span style="color:#41200A;">法相</span> 
              <p>Master’s Picture</p>
           </div>  

<!-- 右边导航栏结束 -->
<div id="Navigation">

  <div id="dropdown">
  <div class="dropbtn">
    <a href="./HomePage.php" class="dropdownone">网站首页</a>
    <a href="./HomePage.php" class="dropdowntwo">Home</a>
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
      <a href="./AboutMaster.php" class="dcbtnone"><button class="dot"></button>耕耘师父</a>
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
      <a href="./Answer.php" class="dcbtnone"><button class="dot"></button>师父解惑</a>
      <a href="./BookNotes.php" class="dcbtnone"><button class="dot"></button>耕耘书笺</a>
    </div>
  </div>
</div>

<div id="dropdown">
  <div class="dropbtn">
    <a href="./Videos.php" class="dropdownone">讲法视频</a>
    <a href="./Videos.php" class="dropdowntwo">Video</a>
  </div>
</div>

<div id="dropdown">
  <div class="dropbtn">
    <a href="./Songs.php" class="dropdownone">禅曲欣赏</a>
    <a href="./Songs.php" class="dropdowntwo">Song</a>
  </div>
</div>

<div id="dropdown">
  <div class="dropbtn">
    <a href="Communication.php" class="dropdownone">联系我们</a>
    <a href="Communication.php" class="dropdowntwo">ContactUs</a>
  </div>
</div>

 </div>
</header>
      
      <!-- main -->
      <main id="masterDetails">
        <img src="./img/teacherphoto1.png">
        <button>法源寺演讲盛况之一</button>
    </main>
    </div>

     <!-- footer -->
     <?php get_footer();?>
</body>
</html>