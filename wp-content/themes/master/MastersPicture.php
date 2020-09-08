
<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $pageSize = 9;
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
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./css/viewer.min.css" /> -->
    <link href="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.css" rel="stylesheet">
</head>

<body>
    <div id="container">
    <?php include("header.php"); ?>
        <!--main -->
        <main>
            <div class="flex-container" id='sucaihuo'>
               <?php foreach ($rows as $key => $value) { ?>
                <div class="flex-item" >
                    <img src="<?php echo $value['guid'] ?>">
                    <p> <?php echo $value['post_excerpt'] ?></p>
                </div>
               <?php } ?>
            </div>
            
            <!-- paging    -->
            <div id="paging" style="margin:42px auto;">
                <button class="arrowleft"><img src="./img/arrowleft.png"></button>
                <!-- <a href="#" class="active"><button class="pagingred"></button>01</a> -->
                <?php for($i=0;$i<$count;$i++) { ?>
                <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>)' ><button class="pagingred"></button><?php echo $i+1; ?></a>
                <?php } ?>
                <button class="arrowleft"><img src="./img/arrowright.png"></button>
            </div>
        </main>
    </div>
    <!-- footer -->
    <?php get_footer();?>
</body>
<!-- <script src="js/viewer.js"></script> -->
<script src="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.js"></script>
	<script>
      window.onload = function () {
       var id = window.location.search?Number(window.location.search.split('=')[1]):1
       var paging = document.getElementById('paging');
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
        console.log(viewer)
        // var viewer2 = new Viewer(document.getElementById('sucaihuo2'));
</script>
</html>