<?php 
  require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
  require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
  $date = date("Y-m-d");
  $allsql = 'SELECT COUNT(ip) FROM wp_statistics_visitor';
  $todaysql = "SELECT COUNT(ip) FROM wp_statistics_visitor WHERE last_counter = '$date'";
  $allnum = $wpdb->get_var($allsql);  
  $todaynum = $wpdb->get_var($todaysql); 
?><!-- 底部 -->
<footer>
      <div id="footer" style="margin-top:41px;">
         <p style="margin-top:40px">耕云师父 沪ICP备2000000-1号</p>
         <p>Copyright @ gengyunshifu Co,Ltd All right reserved.</p>
         <p>
            <span class='footer_count'>总访问量：<span style="color:red"><?php echo $allnum ?></span></span>
            <span class='footer_count'>今日访问量：<span style="color:red"><?php echo $todaynum ?></span></span>
         </p>
      </div>
</footer>