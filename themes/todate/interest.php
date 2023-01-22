<?php global $db,$_LIBS; ?>
<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 14v8H4a8 8 0 0 1 8-8zm6 7.5l-2.939 1.545.561-3.272-2.377-2.318 3.286-.478L18 14l1.47 2.977 3.285.478-2.377 2.318.56 3.272L18 21.5zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z" fill="currentColor"/></svg></span> <?php echo __( 'People who are interested in : ' ) . ' '. route(2);?></h3>
	</div>
	<div class="dt_home_rand_user">
		<div class="row r_margin" id="interest_container">
			<?php
				if(empty($data['interest'])){
					echo '<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8zm0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 10.5l-2.939 1.545.561-3.272-2.377-2.318 3.286-.478L18 14l1.47 2.977 3.285.478-2.377 2.318.56 3.272L18 21.5z" fill="currentColor"/></svg>'.__('No interested people found.') .'</div>';
				}else {
					echo $data['interest'];
				}
			?>
		</div>
		<?php if(!empty($data['interest'])){ ?>
			<a href="javascript:void(0);" id="btn_load_more_interest" data-lang-nomore="<?php echo __('No interested people found.');?>" data-ajax-post="/loadmore/interest" data-ajax-params="page=2&tags=<?php echo route(2);?>" data-ajax-callback="callback_load_more_interest" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
		<?php }?>
	</div>
</div>