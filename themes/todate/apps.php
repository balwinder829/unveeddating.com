<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M21,2H3A2,2 0 0,0 1,4V20A2,2 0 0,0 3,22H21A2,2 0 0,0 23,20V4A2,2 0 0,0 21,2M11,17.5L9.5,19L5,14.5L9.5,10L11,11.5L8,14.5L11,17.5M14.5,19L13,17.5L16,14.5L13,11.5L14.5,10L19,14.5L14.5,19M21,7H3V4H21V7Z" fill="currentColor"></path></svg></span> <?php echo __( 'Developers' );?></h3>
		<a class="btn btn_primary" href="http://localhost/todate/create-story/kulvir97">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg> <?php echo __( 'Create App' ) ?>
		</a>
	</div>
	
	<div class="row r_margin">
		<?php
			if (!empty($data['apps_data'])) {
				foreach ($data['apps_data'] as $app) { ?>
					<div class="col l6 m12">
						<div class="dt_sections dt_dev_apps">
							<div class="valign-wrapper">
								<a href="<?php echo $site_url.'/app/'.$app['id']; ?>" class="avatar"><img src="<?php echo $app['app_avatar'];?>" alt="<?php echo $app['app_name']; ?>" /></a>
								<a href="<?php echo $site_url.'/app/'.$app['id']; ?>" class="btn btn_primary waves-effect waves-light btn-flat btn-small white-text"><?php echo __( 'Edit' ); ?></a>
							</div>
							<div class="ap_name"><a href="<?php echo $site_url.'/app/'.$app['id']; ?>"><?php echo $app['app_name']; ?></a></div>
							<p>App ID: <?php echo $app['app_id']; ?></p>
						</div>
					</div>
					<?php
				}
			} else {
				echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M7,7V9H9V7H7M11,7V9H13V7H11M15,7V9H17V7H15M7,11V13H9V11H7M11,11V13H13V11H11M15,11V13H17V11H15M7,15V17H9V15H7M11,15V17H13V15H11M15,15V17H17V15H15Z" /></svg> No applications found</div>';
			}
		?>
		<div class="clear"></div>
	</div>
</div>