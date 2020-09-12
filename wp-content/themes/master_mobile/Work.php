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
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	<?php include('header.php') ?>
    <img class="weitu" src="./img/weitu.png">
    <div class="container">
    <main>
    	 <?php foreach ($re as $key => $value) {?>
        <div class="lecturecontent">
          <span class="displayBlock"></span>
          <b class="displayBlock"><?php echo $value['title'] ?></b>
          <p class="displayBlock"><?php echo $value['desc'] ?></p>
          <a class="displayBlock" href=<?php echo "WorksCatalogone.php?page=0&&count=".count($value['list'])."&title=".$value['title'] ?> >阅读全文</a>
        </div>
         <?php }  ?>
        <div class="paging marginTopFO">
            <button class="arrowleft"><img src="./img/arrowleft.png"></button>
            <?php for($i=0;$i<$count;$i++) { ?>
            <a href="#" class="active" onclick='go(<?php echo $i ?>)'><button class="pagingred"></button><?php echo $i+1; ?></a>
           <?php } ?>
            <button class="arrowleft"><img src="./img/arrowright.png"></button>
        </div>
    </main>
</div>

   <?php include('footer.php') ?>
</body>
<script>
      window.onload = function () {
       var id = window.location.search?Number(window.location.search.split('=')[1]):1
       var paging = document.getElementsByClassName('paging')[0];
       var a = paging.getElementsByTagName("a");
       a[id-1].classList.add("active");
      } 
      function go(id) {
        window.location.href=`Work.php?page=${Number(id)+1}`
      }
     
  </script>
</html>