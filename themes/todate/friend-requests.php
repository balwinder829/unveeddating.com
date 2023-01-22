<?php global $db,$_LIBS,$config; ?>
<?php if( $config->connectivitySystem == '0' ){?><script>window.location = window.site_url;</script><?php } ?>

<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm6 4v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z" fill="currentColor"></path></svg></span> <?php echo __( 'Friend requests' );?></h3>
	</div>
	<div class="dt_home_rand_user">
		<div class="row r_margin" id="likes_users_container">
			<?php
				if(empty($data['friend_requests'])){
					echo '<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" fill="currentColor"></path></svg>'.__('No more users to show.') .'</div>';
				}else {
					echo $data['friend_requests'];
				}
			?>
		</div>
		<?php if(!empty($data['friend_requests'])){ ?>
			<a href="javascript:void(0);" id="btn_load_more_likes_users" data-lang-nomore="<?php echo __('No more users to show.');?>" data-ajax-post="/loadmore/friend_requests" data-ajax-params="page=2" data-ajax-callback="callback_load_more_likes_users" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
		<?php }?>
	</div>
</div>