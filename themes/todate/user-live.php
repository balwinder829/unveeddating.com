<?php global $db,$_LIBS; ?>
<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16 4a1 1 0 0 1 1 1v4.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14zM7.4 8.829a.4.4 0 0 0-.392.32L7 9.228v5.542a.4.4 0 0 0 .542.374l.073-.036 4.355-2.772a.4.4 0 0 0 .063-.624l-.063-.05L7.615 8.89A.4.4 0 0 0 7.4 8.83z" fill="currentColor"></path></svg></span> <?php echo __( 'Live Videos' );?></h3>
	</div>
	
	<div class="dt_home_rand_user">
		<div class="row r_margin" id="liked_users_container">
			<?php
				if(empty($data['live_users_html'])){
					echo '<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 4a1 1 0 0 1 1 1v4.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14zM7.4 8.829a.4.4 0 0 0-.392.32L7 9.228v5.542a.4.4 0 0 0 .542.374l.073-.036 4.355-2.772a.4.4 0 0 0 .063-.624l-.063-.05L7.615 8.89A.4.4 0 0 0 7.4 8.83z"></path></svg>'.__('No more videos to show.') .'</div>';
				}else {
					echo $data['live_users_html'];
				}
			?>
		</div>
		<?php if(!empty($data['live_users_html'])){ ?>
			<a href="javascript:void(0);" id="btn_load_more_liked_users" data-lang-nomore="<?php echo __('No more videos to show.');?>" data-ajax-post="/loadmore/LoadUserLive" data-ajax-params="page=2&user_id=<?php echo($data['user']->id); ?>" data-ajax-callback="callback_load_more_liked_users" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
		<?php }?>
	</div>
</div>

<div id="modal_remove_live" class="modal">
    <div class="modal-content">
        <h6 class="bold" style="margin-top: 0px;"><?php echo __( 'Are you sure you want to remove the video' );?></h6>
    </div>
    <div class="modal-footer">
        <button class="waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Confirm' );?></button>
    </div>
</div>

<script type="text/javascript">
	function RemoveLiveVideo(id,type = 'show') {
		if (type == 'hide') {
		    $('#modal_remove_live').find('.btn_primary').attr('onclick', "RemoveLiveVideo('"+id+"')");
		    $('#modal_remove_live').modal('open');
		    return false;
		}
		$.post(window.ajax + 'live/remove_video', {post_id: id}, function(data, textStatus, xhr) {
			location.reload()
		});
	}
</script>