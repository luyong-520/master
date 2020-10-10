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
</html>
  
    <!-- <main class="workstwo">
        <p>《禅曲目录》</p>
        <div class="songs">
          <ul class="song">
            <b class="displayBlock hiddens">一、耕云导师作词或作曲</b>
            <li class="music hiddens displayBlock"><a href="ZenMusic.html">安祥歌 ……………………………………………<span>【禅曲】</span><a></li>
            <li class="music hiddens displayBlock"><a href="#">自性歌 …………………………………………………………</a></li>
            <li class="music hiddens displayBlock"><a href="#">山居好 ……………………………………………………………………………<span>【禅曲】</span></a></li>
            <li class="music hiddens displayBlock"><a href="#">自性的礼赞 …………………………………<span>【禅曲】</span></a></li>
            <li class="music hiddens displayBlock"><a href="#">安祥天使 ………………………...............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">本来面目 ……………………………………………………………………</a></li>
            <li class="music hiddens displayBlock"><a href="#">本心妄心 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">安祥天使之歌 ……………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">归 ………………………………………………<span>【禅曲】</span></a></li>
            <li class="music hiddens displayBlock"><a href="#">修心诀 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">杜　漏 …………………………………………<span>【禅曲】</span></a></li>
            <li class="music hiddens displayBlock"><a href="#">叮　咛 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">安祥之歌 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">自觉自知 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">不二歌 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">幸福的泉源 ………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">禅者的画像 ………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">法　语〈桶底脱落〉 …………………………<span>【禅曲】</span></a></li>
            <li class="music hiddens displayBlock"><a href="#">契　约 …………………………………............................…</a></li>

            <b class="displayBlock hiddens">二、经典摘句或古德诗偈</b>
            <li class="music hiddens displayBlock"><a href="#">般若波罗蜜多心经 ………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">牧牛图颂 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">证道歌 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">常见自己过 ………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">心境如如 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">信心铭 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">牧牛图颂 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">逆耳忠言 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">入道四行 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">三宝歌 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">身佛无殊 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">守本真心 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">问答偈 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">无心法 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">五更转 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">心地法门 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">快乐无忧 …………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">心　颂 ……………………………………............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">庐山组曲………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">性海灵光………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">修福修道………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">选佛场…………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">阳明箴言…………………………………..............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">因果歌…………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">应无所住………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">淤泥生红莲……………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">证道行…………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">直心是道…………………………………............................</a></li>

            <b class="displayBlock hiddens">三、安祥禅友作词</b>
            <li class="music hiddens displayBlock"><a href="#">漏尽歌…………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">路…………………………………………...............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">心　路…………………………………….............................</a></li>
            <li class="music hiddens displayBlock"><a href="#">修行颂…………………………………….............................</a></li>
    
          </ul>
        
        </div> 
      </main> -->
   