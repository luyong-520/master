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
?><!DOCTYPE html>
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