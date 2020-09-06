
<!-- begin sidebar -->
<div id="sidebar">

<ul>
<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		

<div class="widget">
<h2 class="header"><?php _e('Categories'); ?></h2>
	<ul>
	<?php wp_list_categories('title_li='); ?>
	</ul>
</div>


<div class="widget">
<h2 class="header"><?php _e('Search'); ?></h2>
   <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
	<input type="text" name="s" id="s" size="20" />
	<input type="submit" value="<?php _e('Search'); ?>" />
	</form>
</div>
 

<div class="widget">
<h2 class="header"><?php _e('Archives'); ?></h2>
	<ul>
	<?php wp_get_archives('type=monthly'); ?>
	</ul>
 </div>
 
<div class="widget">
<h2 class="header"><?php _e('Blogroll'); ?></h2>
	<ul>
	<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
	</ul>
</div>

<div class="widget">
<h2 class="header"><?php _e('Meta'); ?></h2>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
		<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>"><abbr title="WordPress">WP</abbr></a></li>
		<?php wp_meta(); ?>
	</ul>
</div>

<?php endif; ?>

</div>
<!-- end sidebar -->
