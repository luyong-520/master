<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
// $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
// $currentPage = ($page-1)*5;
//    查询条数
$countsql = "SELECT COUNT(DISTINCT post_title) unm
FROM wp_posts
WHERE ID IN
(SELECT object_id
FROM wp_term_relationships WHERE term_taxonomy_id =1  )";
//    查询结果
$sql = "SELECT ID,post_title,post_excerpt,post_content
FROM wp_posts
WHERE ID IN
(SELECT object_id
FROM wp_term_relationships WHERE term_taxonomy_id =1  )  ORDER BY ID ASC ";       
$rows = $wpdb->get_results($sql,ARRAY_A);
$res = array();   
   foreach ($rows as $key=>$val) { 
       $res[$val['post_title']][] = $val;

   }  
   $re = [];        
   foreach ($res as $ke=>$va) {  
       $re[$ke]['title'] = $ke; 
       $re[$ke]['desc'] = $va[0]['post_excerpt']; 
       $re[$ke]['list'] = $va;
   } 
   $re = array_values($re);
$count = ceil(count($re)/5) ;
?>
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
       <!-- <header id="headers">
           <div id="bagtitle">
              <nav id="btflower"><img src="./img/btflower.png"><nav>
              <span style="color:#D18324;">师父</span>
              <span style="color:#41200A;">著作</span> 
              <p>Works</p>
           </div>  

         <div id="Navigation">

        <div id="dropdown">
        <div class="dropbtn">
          <a href="http://localhost:8001/" class="dropdownone">网站首页</a>
          <a href="http://localhost:8001/" class="dropdowntwo">Home</a>
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
   </header> -->
   <?php get_header(); ?>
      <!-- 中间的表 -->
      <main class="lectureone">
       <?php foreach ($re as $key => $value) {?>
        <div class="lecturecontent marginTop24">
        <span></span>
        <h1><?php echo $value['title'] ?></h1>
        <p><?php echo $value['desc'] ?></p>
        <a href=<?php echo "WorksCatalogone.php?page=0&&count=".count($value['list'])."&title=".$value['title'] ?> >阅读全文</a>
        </div>
       <?php }  ?>
      </main>

       <!-- 分页    -->
       <div id="paging" style="margin-top:42px;">
        <button class="arrowleft"><img src="./img/arrowleft.png"></button>
        <?php for($i=0;$i<$count;$i++) { ?>
        <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>)' ><button class="pagingred"></button><?php echo $i+1; ?></a>
        <?php } ?>
        <button class="arrowleft"><img src="./img/arrowright.png"></button>
    </div>
    </div>

     <!-- 底部 -->
    <?php get_footer();?>
    <script src="./js/js.js"></script>
    <script>
      window.onload = function () {
       var id = window.location.search?Number(window.location.search.split('=')[1]):1
       var paging = document.getElementById('paging');
       var a = paging.getElementsByTagName("a");
       a[id-1].classList.add("active");
      } 
      function go(id) {
        window.location.href=`Works.php?page=${Number(id)+1}`
      }
     
  </script>
</body>
</html>