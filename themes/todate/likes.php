<?php global $db,$_LIBS; ?>
<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2.821 12.794a6.5 6.5 0 0 1 7.413-10.24h-.002L5.99 6.798l1.414 1.414 4.242-4.242a6.5 6.5 0 0 1 9.193 9.192L12 22l-9.192-9.192.013-.014z" fill="currentColor"></path></svg></span> <?php echo __( 'Likes' );?></h3>
	</div>
	<div class="dt_home_rand_user">
		<?php if( ( (int)auth()->is_pro == 1 || $config->pro_system == 0 ) || isGenderFree((int)auth()->gender) === true){?>
			<div class="row r_margin" id="likes_users_container">
				<?php
					if(empty($data['likes'])){
						echo '<h5 id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,6A2,2 0 0,0 7,8A2,2 0 0,0 9,10A2,2 0 0,0 11,8A2,2 0 0,0 9,6M9,13C11.67,13 17,14.34 17,17V20H1V17C1,14.34 6.33,13 9,13M9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H15.1V17C15.1,16.36 11.97,14.9 9,14.9M15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12C14.53,12 14.08,11.92 13.67,11.77C14.5,10.74 15,9.43 15,8C15,6.57 14.5,5.26 13.67,4.23C14.08,4.08 14.53,4 15,4M23,17V20H19V16.5C19,15.25 18.24,14.1 16.97,13.18C19.68,13.62 23,14.9 23,17Z"></path></svg>'.__('No more users to show.') .'</h5>';
					}else {
						echo $data['likes'];
					}
				?>
			</div>
			<?php if(!empty($data['likes'])){ ?>
				<a href="javascript:void(0);" id="btn_load_more_likes_users" data-lang-nomore="<?php echo __('No more users to show.');?>" data-ajax-post="/loadmore/likes_users" data-ajax-params="page=2" data-ajax-callback="callback_load_more_likes_users" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
			<?php }?>
		<?php }else{ ?>
			<div id="_load_more" class="empty_state">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,6A2,2 0 0,0 7,8A2,2 0 0,0 9,10A2,2 0 0,0 11,8A2,2 0 0,0 9,6M9,13C11.67,13 17,14.34 17,17V20H1V17C1,14.34 6.33,13 9,13M9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H15.1V17C15.1,16.36 11.97,14.9 9,14.9M15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12C14.53,12 14.08,11.92 13.67,11.77C14.5,10.74 15,9.43 15,8C15,6.57 14.5,5.26 13.67,4.23C14.08,4.08 14.53,4 15,4M23,17V20H19V16.5C19,15.25 18.24,14.1 16.97,13.18C19.68,13.62 23,14.9 23,17Z"></path></svg> <?php echo __('Get premium to view who liked you!');?>
				<div class="center"><a href="<?php echo $site_url;?>/pro" data-ajax="/pro" class="btn btn_primary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 19h20v2H2v-2zM2 5l5 3.5L12 2l5 6.5L22 5v12H2V5zm2 3.841V15h16V8.841l-3.42 2.394L12 5.28l-4.58 5.955L4 8.84z" fill="currentColor"></path></svg> <?php echo __( 'Premium' );?></a></div>
			</div>
		<?php }?>
	</div>
</div>