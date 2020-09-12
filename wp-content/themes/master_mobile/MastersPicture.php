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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <link href="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.css" rel="stylesheet">
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
     
    <!-- 分页    -->
    <div class="paging marginTopFO">
        <button class="arrowleft"><img src="./img/arrowleft.png"></button>
        <!--<a href="#" class="active"><button class="pagingred"></button>01</a>-->
        <?php for($i=0;$i<$count;$i++) { ?>
         <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>)' >
         	<button class="pagingred"></button>
         	<?php echo $i+1; ?>
         </a>
         <?php } ?>
        <button class="arrowleft"><img src="./img/arrowright.png"></button>
    </div>
    </main>
</div>

    <?php include('footer.php') ?>
</body>
<script src="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.js"></script>
<script>
      window.onload = function () {
       var id = window.location.search?Number(window.location.search.split('=')[1]):1
       var paging = document.getElementsByClassName('paging')[0];
       var a = paging.getElementsByTagName("a");
       a[id-1].classList.add("active");
      } 
      function go(id) {
        window.location.href=`MastersPicture.php?page=${Number(id)+1}`
      }
		var viewer = new Viewer(document.getElementById('sucaihuo'), {
			url: 'data-original',
            vviewed: function () {
           viewer.view(0);
       }
		});
</script>
</html>