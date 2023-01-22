<?php global $db,$_LIBS,$config; ?>
<?php if( $config->connectivitySystem == '0' ){?><script>window.location = window.site_url;</script><?php } ?>

<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 22a8 8 0 1 1 16 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm7.363 2.233A7.505 7.505 0 0 1 22.983 22H20c0-2.61-1-4.986-2.637-6.767zm-2.023-2.276A7.98 7.98 0 0 0 18 7a7.964 7.964 0 0 0-1.015-3.903A5 5 0 0 1 21 8a4.999 4.999 0 0 1-5.66 4.957z" fill="currentColor"></path></svg></span> <?php echo __( 'Friends' );?></h3>
	</div>
	<div class="dt_home_rand_user">
		<div class="row r_margin" id="likes_users_container">
			<?php
				if(empty($data['friends'])){
					echo '<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" fill="currentColor"></path></svg>'.__('No more users to show.') .'</div>';
				}else {
					echo $data['friends'];
				}
			?>
		</div>
		<?php if(!empty($data['friends'])){ ?>
			<a href="javascript:void(0);" id="btn_load_more_likes_users" data-lang-nomore="<?php echo __('No more users to show.');?>" data-ajax-post="/loadmore/friends" data-ajax-params="page=2" data-ajax-callback="callback_load_more_likes_users" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
		<?php }?>
	</div>
</div>