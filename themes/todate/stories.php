<?php
global $db;
$views_count = 0;
$views = $db->objectBuilder()
    ->where('v.view_userid', $profile->id)
    ->groupBy('v.user_id')
    ->orderBy('v.created_at', 'DESC')
    ->get('views v', null, array('COUNT(DISTINCT v.user_id) AS views'));
if( $views !== null ){
    $views_count = COUNT($views);
}
$likes_count = $db->where('like_userid',$profile->id)->getOne('likes','count(id) as likes')['likes'];

?>

<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
    <!-- display gps not enable message - see header js -->
    <div class="alert alert-warning hide" role="alert" id="gps_not_enabled">
        <p><?php echo __( 'Please Enable Location Services on your browser.' );?></p>
    </div>
    <script>
        var gps_not_enabled = document.querySelector('#gps_not_enabled');
        if( window.gps_is_not_enabled == true ){
            gps_not_enabled.classList.remove('hide');
        }
    </script>
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22H6a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2v-2H6a1 1 0 0 0 0 2h13zm-7-10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm-3 4h6a3 3 0 0 0-6 0z" fill="currentColor"/></svg></span> <?php echo __( 'success stories' );?></h3>
		<a class="btn btn_primary" href="<?php echo $site_url;?>/create-story/<?php echo $profile->username;?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg> <?php echo __( 'Add New story' );?>
		</a>
	</div>
	<?php if(!empty($data['stories'])){ ?>
		<div class="row r_margin" id="success_stories_container">
			<?php echo $data['stories']; ?>
		</div>
		<?php if(!empty($data['stories'])){ ?>
			<a href="javascript:void(0);" id="btn_load_more_success_stories" data-lang-nomore="<?php echo __('No more stories to show.');?>" data-ajax-post="/loadmore/stories" data-ajax-params="page=2" data-ajax-callback="callback_load_more_success_stories" class="load_more"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo __('Load more...');?></a>
		<?php } ?>
	<?php }else{ ?>
		<div class="row" id="liked_users_container">
			<div id="_load_more" class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22H6a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2v-2H6a1 1 0 0 0 0 2h13zm-7-10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm-3 4h6a3 3 0 0 0-6 0z" fill="currentColor"/></svg> <?php echo __('No more stories to show.');?></div>
		</div>
	<?php }?>
</div>