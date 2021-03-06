
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
    <title>导师法相_安祥禅网站</title>
    <link href="./css/public.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./css/viewer.min.css" /> -->
    <link href="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
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
            <?php include('showpagenation.php') ?>
        </main>
    </div>
    <!-- footer -->
    <?php get_footer();?>
</body>
<script src="https://cdn.bootcdn.net/ajax/libs/viewerjs/0.1.0/viewer.js"></script>
<script src="js/js.js"></script>
<script src="js/category.js"></script>
<script >
      
	  var viewer = new Viewer(document.getElementById('sucaihuo'), {
			url: 'data-original',
            vviewed: function () {
           viewer.view(0);
       }
		});
</script>
</html>