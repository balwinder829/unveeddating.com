<?php global $db,$_LIBS; ?>
<!-- Pro Users  -->
<div class="container page-margin">
	<?php
		if (IsThereAnnouncement() === true) {
		$announcement = GetHomeAnnouncements();
	?>
		<div class="home-announcement">
			<div class="alert alert-success" style="background-color: white;">
				<span class="close announcements-option" data-toggle="tooltip" onclick="Wo_ViewAnnouncement(<?php echo $announcement['id']; ?>);" title="<?php echo __('Hide');?>" style="float: right;cursor: pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></span>
				<?php echo $announcement['text']; ?>
			</div>
		</div>
		<!-- .home-announcement -->
	<?php } ?>
	
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
			
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 23a7.5 7.5 0 0 1-5.138-12.963C8.204 8.774 11.5 6.5 11 1.5c6 4 9 8 3 14 1 0 2.5 0 5-2.47.27.773.5 1.604.5 2.47A7.5 7.5 0 0 1 12 23z" fill="currentColor"></path></svg></span> <?php echo __( 'HOT OR NOT' );?></h3>
	</div>
	<?php
		$warning_style='';
		$match_style='';
	?>
	<!-- Match Users  -->
	<div id="section_match_users" class="<?php echo $match_style;?>">
		<?php
			if (empty($data['matches'])) {
				echo '<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"></path></svg>' . __('No more users to show.') . '</div>';
			} else {
		?>
			<div class="valign-wrapper dt_home_match_user to_hot_not">
				<div class="mtc_usr_avtr" id="avaters_item_container">
					<?php echo $data['matches_img']; ?>
				</div>
				<div class="mtc_usr_details" id="match_item_container">
					<?php echo $data['matches']; ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<a href="javascript:void(0);" style="display: none;" id="btn_load_more_match_users" data-lang-loadmore="<?php echo __('Load more...');?>" data-lang-nomore="<?php echo __('No more users to show.');?>" data-ajax-post="/loadmore/match_users" data-ajax-params="page=2" data-ajax-callback="callback_load_more_match_users" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
	<!-- End Match Users  -->
</div>
<a href="javascript:void(0);" id="btnHotRedirect" data-ajax="/hot" style="visibility: hidden;display: none;"></a>

<script>
    function Wo_ViewAnnouncement(id) {
        var announcement_container = $('.home-announcement');
        $.get(window.ajax + 'useractions/UpdateAnnouncementViews', {id:id}, function (data) {
            if (data.status == 200) {
                announcement_container.slideUp(200, function () {
                    $(this).remove();
                });
            }
        });
    }
</script>