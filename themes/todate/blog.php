<div class="container page-margin">
	<?php if(IS_LOGGED){ ?>
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	<?php } ?>
	<div class="valign-wrapper to_page_title to_blog_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12h4v4a3 3 0 0 1-3 3zm-1-5v2a1 1 0 0 0 2 0v-2h-2zM6 7v2h8V7H6zm0 4v2h8v-2H6zm0 4v2h5v-2H6z" fill="currentColor"/></svg></span> <?php echo __( 'Blog' );?></h3>
		<div class="valign-wrapper qd_blog_sub_hdr">
			<div class="qd_blog_srch">
				<input type="text" placeholder="<?php echo __( 'Search' );?>" class="browser-default" id="search-blog-input">
				<span id="load-search-icon" class="hide">
					<svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path fill="#333" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z" transform="rotate(65.2098 25 25)"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"></animateTransform> </path></svg>
				</span>
			</div>
			<div class="qd_blog_cats_list">
				<a class="dropdown-trigger" href="#" data-target="blog_cat_dropdown" title="<?php echo __( 'Categories' );?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5,9.5L7.5,14H2.5L5,9.5M3,4H7V8H3V4M5,20A2,2 0 0,0 7,18A2,2 0 0,0 5,16A2,2 0 0,0 3,18A2,2 0 0,0 5,20M9,5V7H21V5H9M9,19H21V17H9V19M9,13H21V11H9V13Z" /></svg></a>
				<ul id="blog_cat_dropdown" class="dropdown-content">
					<li><a href="<?php echo $site_url;?>/blog" data-ajax="/blog"><?php echo __('ALL');?></a></li>
					<?php
						$blog_categories = Dataset::blog_categories();
						foreach ($blog_categories as $key => $category) {
					?>
						<li><a href="<?php echo $site_url;?>/blog/<?php echo $key . '_' . url_slug(html_entity_decode($category));?>" data-ajax="/blog/<?php echo $key . '_' . url_slug(html_entity_decode($category));?>"><?php echo $category;?></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<?php if(!empty($data['articles'])){ ?>
		<div class="row r_margin mb-0" id="articles_container">
			<?php echo $data['articles'];?>
		</div>
		<a href="javascript:void(0);" id="btn_load_more_articles" data-lang-nomore="<?php echo __('No more articles to show.');?>" data-ajax-post="/loadmore/articles" data-ajax-params="page=2" data-ajax-callback="callback_load_more_articles" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
	<?php }else{ ?>
		<?php require( $theme_path . 'partails' . $_DS . 'empty-article.php' );?>
	<?php }?>
</div>