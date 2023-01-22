<?php
$admin_mode = false;
if( $profile->admin == '1' || CheckPermission($profile->permission, "manage-users") ){
    $admin_mode = true;
}

$target_user = route(2);
if($target_user !== ''){
    $_user = LoadEndPointResource('users');
    if( $_user ){
        if( $target_user !== '' ){
            $user = $_user->get_user_profile(Secure($target_user));
            if( !$user ){
                echo '<script>window.location = window.site_url;</script>';
                exit();
            }else{
                if( $user->admin == '1' ){
                    $admin_mode = true;
                }
            }
        }
    }
}else{
    $user = auth();
}
?>

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
				<li class="general active">
					<a href="<?php echo $site_url;?>/my-info/<?php echo $profile->username;?>" data-ajax="/my-info/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z" fill="currentColor"/></svg></span> <?php echo __( 'My Information' );?></a>
				</li>
				<hr class="border_hr">
				<?php if( $config->invite_links_system == '1' ){ ?>
					<li class="social">
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
			<h2 class="user_sttng_panel_hd"><?php echo __( 'My Information' );?></h2>
            <p class="no_margin_top bold center"><?php echo __("Please choose which information you would like to download"); ?></p>

            <div class="alert alert-success" role="alert" style="display:none;"></div>
			<div class="alert alert-danger" role="alert" style="display:none;"></div>
            <div class="info_select_radio_btn small_rbtn" id="download_steps_comp">
				<p class="to_mat_input_switch switch">
					<label>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4d91ea" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'My Information' );?></span>
						<input type="checkbox" name="my_information" id="my_information" value="1">
						<span class="lever"></span>
					</label>
				</p>
				<p class="to_mat_input_switch switch">
					<label>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff5c8b" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Friends' );?></span>
						<input type="checkbox" name="friends" id="friends" value="1">
						<span class="lever"></span>
					</label>
				</p>
				<p class="to_mat_input_switch switch">
					<label>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Media' );?></span>
						<input type="checkbox" name="mediafiles" id="mediafiles" value="1">
						<span class="lever"></span>
					</label>
				</p>
				<p class="to_mat_input_switch switch">
					<label>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#8BC34A" d="M15,14C12.3,14 7,15.3 7,18V20H23V18C23,15.3 17.7,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,15L4.4,14.5C2.4,12.6 1,11.4 1,9.9C1,8.7 2,7.7 3.2,7.7C3.9,7.7 4.6,8 5,8.5C5.4,8 6.1,7.7 6.8,7.7C8,7.7 9,8.6 9,9.9C9,11.4 7.6,12.6 5.6,14.5L5,15Z"></path></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'People i liked' );?></span>
						<input type="checkbox" name="liked_users" id="liked_users" value="1">
						<span class="lever"></span>
					</label>
				</p>
				<p class="to_mat_input_switch switch">
					<label>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#f79f58" d="M19,15H23V3H19M15,3H6C5.17,3 4.46,3.5 4.16,4.22L1.14,11.27C1.05,11.5 1,11.74 1,12V14A2,2 0 0,0 3,16H9.31L8.36,20.57C8.34,20.67 8.33,20.77 8.33,20.88C8.33,21.3 8.5,21.67 8.77,21.94L9.83,23L16.41,16.41C16.78,16.05 17,15.55 17,15V5C17,3.89 16.1,3 15,3Z"></path></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'People i disliked' );?></span>
						<input type="checkbox" name="disliked_users" id="disliked_users" value="1">
						<span class="lever"></span>
					</label>
				</p>
            </div>
            <div class="ready_to_down_info">
				<svg height="130px" viewBox="-8 0 480 480.00012" width="130px" xmlns="http://www.w3.org/2000/svg"><g fill="#9bc9ff"><path d="m56.011719 176v232l176 64v-232zm0 0"></path><path d="m408.011719 176v232l-176 64v-232zm0 0"></path><path d="m8.011719 216 176 64 48-40-176-64zm0 0"></path><path d="m280.011719 280 176-64-48-40-176 64zm0 0"></path><path d="m280.011719 72-48 40 176 64 48-40zm0 0"></path><path d="m184.011719 72-176 64 48 40 176-64zm0 0"></path></g><path d="m420.507812 176 40.621094-33.847656c2.199219-1.835938 3.25-4.707032 2.753906-7.527344-.492187-2.820312-2.460937-5.160156-5.152343-6.136719l-176-64c-2.675781-.976562-5.664063-.460937-7.855469 1.359375l-34.863281 29.074219v-22.921875h-16v22.921875l-34.882813-29.074219c-2.1875-1.820312-5.179687-2.335937-7.855468-1.359375l-176 64c-2.691407.976563-4.65625 3.316407-5.152344 6.136719s.554687 5.691406 2.753906 7.527344l40.640625 33.847656-40.625 33.847656c-2.199219 1.835938-3.25 4.707032-2.753906 7.527344.496093 2.820312 2.460937 5.160156 5.152343 6.136719l42.722657 15.542969v168.945312c0 3.359375 2.105469 6.363281 5.261719 7.511719l176 64c1.765624.652343 3.707031.652343 5.472656 0l176-64c3.160156-1.148438 5.261718-4.152344 5.265625-7.511719v-168.945312l42.734375-15.542969c2.695312-.976563 4.660156-3.316407 5.15625-6.136719.492187-2.820312-.554688-5.691406-2.753906-7.527344zm-138.898437-94.902344 158.59375 57.671875-33.792969 28.132813-158.582031-57.671875zm-57.597656 99.589844-20.289063-20.28125-11.3125 11.3125 39.601563 39.59375 39.597656-39.59375-11.3125-11.3125-20.285156 20.28125v-57.273438l144.597656 52.585938-152.597656 55.488281-152.601563-55.488281 144.601563-52.585938zm-41.601563-99.589844 33.777344 28.132813-158.578125 57.671875-33.78125-28.132813zm-124.800781 104 158.59375 57.671875-33.792969 28.132813-158.582031-57.671875zm6.402344 59.773438 117.261719 42.640625c.878906.324219 1.804687.488281 2.738281.488281 1.871093 0 3.679687-.652344 5.117187-1.847656l34.882813-29.074219v203.496094l-160-58.175781zm336 157.527344-160 58.175781v-203.496094l34.878906 29.074219c1.4375 1.195312 3.25 1.847656 5.121094 1.847656.933593 0 1.859375-.164062 2.734375-.488281l117.265625-42.640625zm-118.402344-131.496094-33.773437-28.132813 158.574218-57.671875 33.777344 28.132813zm0 0" fill="#1e81ce"></path><path d="m248.011719 432c0 4.417969 3.582031 8 8 8 7.886719 0 75.574219-26.398438 130.976562-48.566406 4.101563-1.644532 6.097657-6.304688 4.453125-10.410156-1.640625-4.105469-6.300781-6.097657-10.40625-4.457032-55.136718 22.066406-117.601562 46.089844-125.488281 47.449219-4.230469.246094-7.535156 3.746094-7.535156 7.984375zm0 0" fill="#1e81ce"></path><path d="m224.011719 0h16v16h-16zm0 0" fill="#1e81ce"></path><path d="m224.011719 24h16v16h-16zm0 0" fill="#1e81ce"></path><path d="m224.011719 48h16v16h-16zm0 0" fill="#1e81ce"></path></svg>
				<p>Your file is ready to download!</p>
				<a href="<?php echo $site_url.'/aj/profile/'; ?>download_user_info" class="btn btn-large waves-effect waves-light bold btn_primary btn_round" id="download_file" target="_blank" onclick="DeleteUserFile()">Download</a>
			 </div>
            <div class="dt_sett_footer hiddddddddd">
                <button class="btn btn-large bold btn_primary btn_round" type="button" onclick="MyInfo()"><span class="btn_text"><?php echo __( 'Generate file' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
            </div>
            <?php if( $admin_mode == true ){?>
                <input type="hidden" name="targetuid" value="<?php echo strrev( str_replace( '==', '', base64_encode($user->id) ) );?>">
            <?php }?>
        </form>
	</div>
</div>
</div>

<!-- End Settings  -->
<script type="text/javascript">
    function DeleteUserFile(self) {
        file = $(self).attr('data_link');
        $('#download_steps_comp').fadeIn(500);
        $('.ready_to_down_info').fadeOut(200);
        $('.hiddddddddd').fadeIn(200);
    }
    function MyInfo() {
        var formData = new FormData(document.querySelector('.dt_settings'));
        $.ajax({
            type: 'POST',
            url: window.ajax + 'profile/my_info',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
              $('.dt_settings').find('.waves-effect').attr('disabled', 'true');
              $('.dt_settings').find('.btn_text').text("<?php echo __('please_wait');?>");
            },
            success: function(data) {
                $('.dt_settings').find('.waves-effect').removeAttr('disabled');
                $('.dt_settings').find('.btn_text').text("<?php echo(__( 'Generate file' )) ?>");
                if (data.status == 200) {
                    $('#download_steps_comp').slideUp(500);
                    $('.ready_to_down_info').fadeIn(200);
                    $('.ready_to_down_info p').html(data.message);
                    $('.hiddddddddd').fadeOut(200);
                    $('.dt_settings').find( '.alert-success' ).html( "<?php echo __( 'Your file is ready to download!' ); ?>" ).fadeIn( "fast" );
                    setTimeout(function() {
                        $('.dt_settings').find( '.alert-success' ).fadeOut( "fast" );
                    }, 2000);
                } 
                
            },
            error: function (data) {
                $('.dt_settings').find('.waves-effect').removeAttr('disabled');
                $('.dt_settings').find('.btn_text').text("<?php echo(__( 'Generate file' )) ?>");
                if (data.responseJSON.status == 400) {
                    $('.dt_settings').find( '.alert-danger' ).html( data.responseJSON.message ).fadeIn( "fast" );
                    setTimeout(function() {
                        $('.dt_settings').find( '.alert-danger' ).fadeOut( "fast" );
                    }, 5000);
                }
            }
        });
    }
</script>