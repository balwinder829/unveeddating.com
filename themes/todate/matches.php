<?php global $db,$_LIBS; ?>
<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="currentColor"></path></svg></span> <?php echo __( 'Matches' );?></h3>
	</div>
	<div class="dt_home_rand_user">
		<div class="row r_margin" id="matches_container" data-nomore="<?php echo __('No more users to show.');?>">
			<?php
				if(empty($data['matches'])){
					echo '<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"></path></svg>'.__('No more users to show.') .'</div>';
				}else {
					echo $data['matches'];
				}
			?>
		</div>
		<?php if(!empty($data['matches'])){ ?>
			<a href="javascript:void(0);" id="btn_load_more_matches" data-lang-nomore="<?php echo __('No more users to show.');?>" data-ajax-post="/loadmore/matches" data-ajax-params="page=2&tags=<?php echo route(2);?>" data-ajax-callback="callback_load_more_matches" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
		<?php }?>
	</div>
</div>