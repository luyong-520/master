<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $sql = "SELECT ID,post_title,post_content,post_excerpt,wt.name NAME
   FROM (wp_posts wp RIGHT JOIN wp_term_relationships wtr ON wp.ID = wtr.object_id)
    JOIN wp_terms wt ON wt.term_id = wtr.term_taxonomy_id
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =4 OR term_taxonomy_id =5 OR term_taxonomy_id =6 )   ORDER BY ID";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $res = array();   
   foreach ($rows as $key=>$val) { 
       $res[$val['NAME']][] = $val;

   }  
   $re = [];        
   foreach ($res as $ke=>$va) {  
       $re[$ke]['title'] = $ke; 
       $re[$ke]['list'] = $va;
   } 
   $re = array_values($re);
//    echo json_encode($re, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>禅曲欣赏_安祥网站</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
       <!-- 中间的表 -->
       <main>
        <h1 class="hone textAlign">《禅曲目录》<h1>
        <?php foreach ($re as $key => $value) {?>
            <div class="catalog">
        <p class="catalogp "><?php echo $key+1 ?> 、<?php echo $value['title'] ?></p>
                
               <ul class="ZenMusic">
               <?php foreach ($value['list'] as $id => $item) {?>
                 <li><a href="<?php echo 'ZenMusic.php?id='.$item['ID'].'&title='.$item['post_title']; ?>"> <span><?php echo $item['post_title']; ?>………………………………………</span><a></li>
                 <?php } ?>
               </ul>
               
            </div>
         <?php } ?>
          
    </main>
     </div>
     <!-- 底部 -->
     <?php include("footer.php");;?>
</body>
</html>