<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $pageSize = 5;
   $currentPage = ($page-1)*$pageSize;
   $sql = "SELECT ID,post_excerpt,guid FROM wp_posts WHERE post_mime_type='image/jpeg' ORDER BY ID ASC LIMIT $currentPage,$pageSize ";       
   $countsql = "SELECT COUNT(1) FROM wp_posts WHERE post_mime_type='image/jpeg' ORDER BY ID ASC ";
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $num = $wpdb->get_var($countsql); 
   $count = ceil($num/$pageSize);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>师父法相_安祥网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include('header.php') ?>
    <div class="container">
    <main>
      <div id="sucaihuo">
      <?php foreach ($rows as $key => $value) { ?>
      	  <div class="teacherphoto fontSizeThree" >
          <img src="<?php echo $value['guid'] ?>">
          <p class="textAlign"><?php echo $value['post_excerpt'] ?></p>
      </div>
      <?php } ?>
      </div>	
      <div id="fullPage">
			<canvas id="canvas"></canvas>
		</div>
    <!-- 分页    -->
    <?php include('showpagenation.php') ?>
    </main>
</div>

    <?php include('footer.php') ?>
</body>
<!--<script src="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.js"></script>-->
<script src="js/show.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/my.js"></script>
<script type="text/javascript" src="js/category.js"></script>
<script>
      //使用方法
			var wxScale=new WxScale({
				fullPage:document.querySelector("#fullPage"),
				canvas:document.querySelector("#canvas")
			});
			var imgBox=document.querySelectorAll("#sucaihuo img");
			for(var i=0; i<imgBox.length; i++){
				imgBox[i].onclick=function(e){
					wxScale.start(this);   //这里的this指向需要放大的这张图片
				}
			}

</script>
</html>