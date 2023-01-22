<?php
if( $config->invite_links_system == '0' ){
    echo '<script>window.location = window.site_url;</script>';
    exit();
}
$admin_mode = false;
if( $profile->admin == '1' || CheckPermission($profile->permission, "manage-users")){
    $target_user = route(2);
    $_user = LoadEndPointResource('users');
    if( $_user ){
        if( $target_user !== '' ){
            $profile = $_user->get_user_profile(Secure($target_user));
            if( !$profile ){
                echo '<script>window.location = window.site_url;</script>';
                exit();
            }else{
                $user = $profile;
                if( $profile->admin == '1' ){
                    $admin_mode = true;
                }
            }
        }
    }
}else{
    $user = auth();
}
?>
<?php //$user = auth();?>
<!-- Settings  -->
<div class="container page-margin">
<div class="row to_sett_row">
	<div class="col m12 l4">
		<div class="sett_navbar">
            <ul class="browser-default">
                <li class="general">
					<a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 1l9.5 5.5v11L12 23l-9.5-5.5v-11L12 1zm0 14a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="currentColor"/></svg></span> <?php echo __( 'General' );?></a>
				</li>
                <li class="profile">
					<a href="<?php echo $site_url;?>/settings-profile/<?php echo $profile->username;?>" data-ajax="/settings-profile/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" fill="currentColor"/></svg></span> <?php echo __( 'Profile' );?></a>
				</li>
				<?php if( $config->social_media_links == 'on' ){ ?>
					<li class="social">
						<a href="<?php echo $site_url;?>/settings-social/<?php echo $profile->username;?>" data-ajax="/settings-social/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13.06 8.11l1.415 1.415a7 7 0 0 1 0 9.9l-.354.353a7 7 0 0 1-9.9-9.9l1.415 1.415a5 5 0 1 0 7.071 7.071l.354-.354a5 5 0 0 0 0-7.07l-1.415-1.415 1.415-1.414zm6.718 6.011l-1.414-1.414a5 5 0 1 0-7.071-7.071l-.354.354a5 5 0 0 0 0 7.07l1.415 1.415-1.415 1.414-1.414-1.414a7 7 0 0 1 0-9.9l.354-.353a7 7 0 0 1 9.9 9.9z" fill="currentColor"/></svg></span> <?php echo __( 'Social Links' );?></a>
					</li>
				<?php } ?>
				<hr class="border_hr">
                <li class="privacy">
					<a href="<?php echo $site_url;?>/settings-privacy/<?php echo $profile->username;?>" data-ajax="/settings-privacy/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.783 2.826L12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976zM13 10V5l-5 7h3v5l5-7h-3z" fill="currentColor"/></svg></span> <?php echo __( 'Privacy' );?></a>
				</li>
				<li class="emails">
					<a href="<?php echo $site_url;?>/settings-sessions/<?php echo $profile->username;?>" data-ajax="/settings-sessions/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M17 13v1c0 2.77-.664 5.445-1.915 7.846l-.227.42-1.747-.974c1.16-2.08 1.81-4.41 1.882-6.836L15 14v-1h2zm-6-3h2v4l-.005.379a12.941 12.941 0 0 1-2.691 7.549l-.231.29-1.55-1.264a10.944 10.944 0 0 0 2.471-6.588L11 14v-4zm1-4a5 5 0 0 1 5 5h-2a3 3 0 0 0-6 0v3c0 2.235-.82 4.344-2.271 5.977l-.212.23-1.448-1.38a6.969 6.969 0 0 0 1.925-4.524L7 14v-3a5 5 0 0 1 5-5zm0-4a9 9 0 0 1 9 9v3c0 1.698-.202 3.37-.597 4.99l-.139.539-1.93-.526c.392-1.437.613-2.922.658-4.435L19 14v-3A7 7 0 0 0 7.808 5.394L6.383 3.968A8.962 8.962 0 0 1 12 2zM4.968 5.383l1.426 1.425a6.966 6.966 0 0 0-1.39 3.951L5 11 5.004 13c0 1.12-.264 2.203-.762 3.177l-.156.29-1.737-.992c.38-.665.602-1.407.646-2.183L3.004 13v-2a8.94 8.94 0 0 1 1.964-5.617z" fill="currentColor"/></svg></span> <?php echo __( 'Manage Sessions' );?></a>
				</li>
                <?php if( $config->two_factor == '1' ){ ?>
					<li class="profile">
						<a href="<?php echo $site_url;?>/settings-twofactor/<?php echo $profile->username;?>" data-ajax="/settings-twofactor/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2,7V9H6V11H4A2,2 0 0,0 2,13V17H8V15H4V13H6A2,2 0 0,0 8,11V9C8,7.89 7.1,7 6,7H2M9,7V17H11V13H14V11H11V9H15V7H9M18,7A2,2 0 0,0 16,9V17H18V14H20V17H22V9A2,2 0 0,0 20,7H18M18,9H20V12H18V9Z" fill="currentColor"/></svg></span> <?php echo __( 'Two-factor authentication' );?></a>
					</li>
				<?php } ?>
				<li class="general">
					<a href="<?php echo $site_url;?>/my-info/<?php echo $profile->username;?>" data-ajax="/my-info/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z" fill="currentColor"/></svg></span> <?php echo __( 'My Information' );?></a>
				</li>
				<hr class="border_hr">
				<?php if( $config->invite_links_system == '1' ){ ?>
					<li class="social active">
						<a href="<?php echo $site_url;?>/settings-links/<?php echo $profile->username;?>" data-ajax="/settings-links/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm6 4v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z" fill="currentColor"/></svg></span> <?php echo __( 'Invitation Links' );?></a>
					</li>
				<?php } ?>
				<?php if( $config->affiliate_system == '1' ){ ?>
					<li class="general">
						<a href="<?php echo $site_url;?>/settings-affiliate/<?php echo $profile->username;?>" data-ajax="/settings-affiliate/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z" fill="currentColor"/></svg></span> <?php echo __( 'My affiliates' );?></a>
					</li>
				<?php } ?>
				<?php if( $config->emailNotification == '1' ){ ?>
					<li class="emails">
						<a href="<?php echo $site_url;?>/settings-email/<?php echo $profile->username;?>" data-ajax="/settings-email/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm9.06 8.683L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439z" fill="currentColor"/></svg></span> <?php echo __( 'Manage Notifications' );?></a>
					</li>
				<?php } ?>
				<li class="password">
					<a href="<?php echo $site_url;?>/settings-password/<?php echo $profile->username;?>" data-ajax="/settings-password/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zm-2 0V7a4 4 0 1 0-8 0v1h8zm-5 6v2h2v-2h-2zm-4 0v2h2v-2H7zm8 0v2h2v-2h-2z" fill="currentColor"/></svg></span> <?php echo __( 'Password' );?></a>
				</li>
				<hr class="border_hr">
                <li class="block">
					<a href="<?php echo $site_url;?>/settings-blocked/<?php echo $profile->username;?>" data-ajax="/settings-blocked/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM8.523 7.109l8.368 8.368a6.04 6.04 0 0 1-1.414 1.414L7.109 8.523A6.04 6.04 0 0 1 8.523 7.11z" fill="currentColor"/></svg></span> <?php echo __( 'Blocked Users' );?></a>
				</li>
                <?php if( $admin_mode == false && $config->deleteAccount == '1' ) {?>
					<li class="delete">
						<a href="<?php echo $site_url;?>/settings-delete/<?php echo $profile->username;?>" data-ajax="/settings-delete/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5zm2-2v2h6V4H9z" fill="currentColor"/></svg></span> <?php echo __( 'Delete Account' );?></a>
					</li>
				<?php } ?>
            </ul>
        </div>
	</div>
	<div class="col m12 l8">
        <form class="dt_settings">
			<h2 class="user_sttng_panel_hd"><?php echo __( 'Invitation Links' );?></h2>
            <div class="alert alert-success" role="alert" style="display:none;"></div>
			<div class="alert alert-danger" role="alert" style="display:none;"></div>

			<?php
				global $db;

				$available_links = GetAvailableLinks($profile->id);
				if ($config->user_links_limit > 0) {
					$generated_links = $config->user_links_limit - $available_links;
				}
				else{
					$generated_links = GetGeneratedLinks($profile->id);
				}
				$used_links = GetUsedLinks($profile->id);
			?>
			<div class="earn_points">
				<div class="ep_illus">
					<div class="valign-wrapper ep_how_many comment_post">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" /></svg>
						<b><span id="available_links"><?php echo $available_links; ?></span> <?php echo __('Available links'); ?></b>
					</div>
					<div class="valign-wrapper ep_how_many create_post">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.6 13.4A1 1 0 0 1 9.2 14.8A4.8 4.8 0 0 1 9.2 7.8L12.7 4.2A5.1 5.1 0 0 1 19.8 4.2A5.1 5.1 0 0 1 19.8 11.3L18.3 12.8A6.4 6.4 0 0 0 17.9 10.4L18.4 9.9A3.2 3.2 0 0 0 18.4 5.6A3.2 3.2 0 0 0 14.1 5.6L10.6 9.2A2.9 2.9 0 0 0 10.6 13.4M23 18V20H20V23H18V20H15V18H18V15H20V18M16.2 13.7A4.8 4.8 0 0 0 14.8 9.2A1 1 0 0 0 13.4 10.6A2.9 2.9 0 0 1 13.4 14.8L9.9 18.4A3.2 3.2 0 0 1 5.6 18.4A3.2 3.2 0 0 1 5.6 14.1L6.1 13.7A7.3 7.3 0 0 1 5.7 11.2L4.2 12.7A5.1 5.1 0 0 0 4.2 19.8A5.1 5.1 0 0 0 11.3 19.8L13.1 18A6 6 0 0 1 16.2 13.7Z" /></svg>
						<b><span id="generated_links"><?php echo $generated_links; ?></span> <?php echo __('Generated links'); ?></b>
					</div>
					<div class="valign-wrapper ep_how_many reaction_bg">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.6 13.4A1 1 0 0 1 9.2 14.8A4.8 4.8 0 0 1 9.2 7.8L12.7 4.2A5.1 5.1 0 0 1 19.8 4.2A5.1 5.1 0 0 1 19.8 11.3L18.3 12.8A6.4 6.4 0 0 0 17.9 10.4L18.4 9.9A3.2 3.2 0 0 0 18.4 5.6A3.2 3.2 0 0 0 14.1 5.6L10.6 9.2A2.9 2.9 0 0 0 10.6 13.4M23 18V20H15V18M16.2 13.7A4.8 4.8 0 0 0 14.8 9.2A1 1 0 0 0 13.4 10.6A2.9 2.9 0 0 1 13.4 14.8L9.9 18.4A3.2 3.2 0 0 1 5.6 18.4A3.2 3.2 0 0 1 5.6 14.1L6.1 13.7A7.3 7.3 0 0 1 5.7 11.2L4.2 12.7A5.1 5.1 0 0 0 4.2 19.8A5.1 5.1 0 0 0 11.3 19.8L13.1 18A6 6 0 0 1 16.2 13.7Z" /></svg>
						<b><span id="used_links"><?php echo $used_links; ?></span> <?php echo __('Used links'); ?></b>
					</div>
				</div>
			</div>
			<div class="dt_sett_footer">
				<button class="btn btn-large bold btn_primary btn_round" type="button" onclick="GenerateLink()"><span><?php echo __( 'Generate link' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
            </div>
			<form method="post" class="form-horizontal setting-profile-form" enctype="multipart/form-data">
				<div class="setting-profile-alert setting-update-alert"></div>
				<?php 
					$trans = GetMyInvitaionCodes($profile->id);
				?>
				<?php if (count($trans) > 0): ?>
					<table class="table-responsive">
						<thead>
							<tr>
								<th><?php echo __('url'); ?></th>
								<th><?php echo __('invited user'); ?></th>
								<th><?php echo __('date'); ?></th>
							</tr>
						</thead>
						<tbody id="user-ads">
							<?php foreach ($trans as $key => $transaction): ?>
								<tr data-ad-id="<?php echo $transaction['id']; ?>">
									<td><button type="button" class="btn btn-small btn-flat btn_primary white-text copy-invitation-url" data-link="<?php echo $site_url . '/register?invite='. $transaction['code']; ?>"><?php echo __('copy'); ?></button></td>
									<td>
										<?php if (!empty($transaction['user_name'])) { ?>
											<a href="<?php echo($transaction['user_url']) ?>"><?php echo $transaction['user_name']; ?></a>
										<?php } ?>
									</td>
									<td><?php echo date('Y-m-d', $transaction['time']); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table><br>
				<?php endif; ?>
				<input type="hidden" name="user_id" id="user-id" value="<?php echo $profile->id;?>">
			</form>
        </form>
	</div>
</div>
</div>

<!-- End Settings  -->
<script>
	function GenerateLink() {
		$('.add_wow_loader').text("<?php echo __('please_wait'); ?>");
		$('.add_wow_loader').attr('disable', 'true');
		$.ajax({
            type: 'POST',
            url: window.ajax + 'profile/add_invitation_links',
            data:{user_id:'<?php echo($profile->id); ?>'},
            success: function(data) {
            	$('.add_wow_loader').removeAttr('disable');
				$('.add_wow_loader').text("<?php echo __('Generate link'); ?>");
                if (data.status == 200) {
                    $('.setting-profile-alert').html('<div class="alert alert-success">' + data.message + '</div>');
					setTimeout(function () {
						$('.setting-profile-alert').html('');
						location.reload();
					},2000);
                }
            },
            error: function(data){
            	$('.add_wow_loader').removeAttr('disable');
				$('.add_wow_loader').text("<?php echo __('Generate link'); ?>");
                $('.setting-profile-alert').html('<div class="alert alert-danger">' + data.responseJSON.message + '</div>');
				setTimeout(function () {
					$('.setting-profile-alert').html('');
				},2000);
            }
        });
	}
	$(document).on('click', '.copy-invitation-url', function(event) {
	 event.preventDefault();
	   var $temp = $("<input>");
	   $("body").append($temp);
	   $temp.val($(this).attr('data-link')).select();
	   document.execCommand("copy");
	   $temp.remove();
	   self = this;
	   $(this).text("<?php echo __('copied'); ?>");
	   setTimeout(function () {
	   	$(self).text("<?php echo __('copy'); ?>");
	   },500);
	});
</script>