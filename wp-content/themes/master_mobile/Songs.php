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
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>禅曲欣赏_安祥禅网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include("header.php"); ?>
    <img class="weitu" src="./img/weitu.png">
    <div class="container">
    <main class="workstwo">
      <p>《禅曲目录》</p>
      <div class="songs">
      	 <?php foreach ($re as $key => $value) {?>
        <ul class="song">
          <b class="displayBlock hiddens"><?php echo $key+1 ?> 、<?php echo $value['title'] ?></b>
            <?php foreach ($value['list'] as $id => $item) {?>
            <li class="music hiddens displayBlock"><a href="<?php echo 'ZenMusic.php?id='.$item['ID'].'&title='.$item['post_title']; ?>"><span><?php echo $item['post_title']; ?>………………………………………………………………………………</span><a></li>
           <?php } ?>
        </ul>
        <?php } ?>
      </div>
    </main>
   

</div>

    <?php include("footer.php"); ?>
</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="js/header.js"></script> 
</html>
  
   