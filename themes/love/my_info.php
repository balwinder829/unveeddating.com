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

<?php require( $theme_path . 'main' . $_DS . 'mini-sidebar.php' );?>

<!-- Settings  -->
<div class="container">
    <div class="dt_settings">
		<div class="row">
			<div class="col s12 m4">
				<div class="dt_settings_bg_wrap">
					<ul class="dt_settings_side_links">
						<li>
							<a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #a33596;"><path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"></path></svg> <?php echo __( 'General' );?>
							</a>
						</li>
						<li>
							<a href="<?php echo $site_url;?>/settings-profile/<?php echo $profile->username;?>" data-ajax="/settings-profile/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #ff5722;"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg> <?php echo __( 'Profile' );?>
							</a>
						</li>
						<li>
							<a href="<?php echo $site_url;?>/settings-privacy/<?php echo $profile->username;?>" data-ajax="/settings-privacy/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #ff9800;"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1Z"></path></svg> <?php echo __( 'Privacy' );?>
							</a>
						</li>
						<li>
							<a href="<?php echo $site_url;?>/settings-password/<?php echo $profile->username;?>" data-ajax="/settings-password/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #4caf50;"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z"></path></svg> <?php echo __( 'Password' );?>
							</a>
						</li>
						<?php if( $config->social_media_links == 'on' ){ ?>
							<li>
								<a href="<?php echo $site_url;?>/settings-social/<?php echo $profile->username;?>" data-ajax="/settings-social/<?php echo $profile->username;?>" target="_self">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #03a9f4;"><path fill="currentColor" d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z"></path></svg> <?php echo __( 'Social Links' );?>
								</a>
							</li>
						<?php }?>
						<li>
							<a href="<?php echo $site_url;?>/settings-blocked/<?php echo $profile->username;?>" data-ajax="/settings-blocked/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #607d8b;"><path fill="currentColor" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13M10 14C5.58 14 2 15.79 2 18V20H11.5A6.5 6.5 0 0 1 11 17.5A6.5 6.5 0 0 1 11.95 14.14C11.32 14.06 10.68 14 10 14M17.5 14.5C19.16 14.5 20.5 15.84 20.5 17.5C20.5 18.06 20.35 18.58 20.08 19L16 14.92C16.42 14.65 16.94 14.5 17.5 14.5M14.92 16L19 20.08C18.58 20.35 18.06 20.5 17.5 20.5C15.84 20.5 14.5 19.16 14.5 17.5C14.5 16.94 14.65 16.42 14.92 16Z"></path></svg> <?php echo __( 'Blocked Users' );?>
							</a>
						</li>
						<li>
							<a href="<?php echo $site_url;?>/settings-sessions/<?php echo $profile->username;?>" data-ajax="/settings-sessions/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #009688;"><path fill="currentColor" d="M5.962 17.674C7 19.331 7 20.567 7 22h2c0-1.521 0-3.244-1.343-5.389L5.962 17.674zM16.504 3.387C13.977 1.91 7.55.926 4.281 4.305c-3.368 3.481-2.249 9.072.001 11.392.118.122.244.229.369.333.072.061.146.116.205.184l1.494-1.33c-.124-.14-.269-.265-.419-.391-.072-.06-.146-.119-.214-.188-1.66-1.711-2.506-6.017.001-8.608 2.525-2.611 8.068-1.579 9.777-.581 2.691 1.569 4.097 4.308 4.109 4.333l1.789-.895C21.328 8.419 19.725 5.265 16.504 3.387z"/><path fill="currentColor" d="M9.34 12.822c-1.03-1.26-1.787-2.317-1.392-3.506.263-.785.813-1.325 1.637-1.604 1.224-.41 2.92-.16 4.04.601l1.123-1.654c-1.648-1.12-3.982-1.457-5.804-.841C7.536 6.294 6.509 7.313 6.052 8.684c-.776 2.328.799 4.254 1.74 5.405.149.183.29.354.409.512C11 18.323 11 20.109 11 22h2c0-2.036 0-4.345-3.201-8.601C9.665 13.221 9.508 13.028 9.34 12.822zM15.131 9.478c1.835 1.764 3.034 4.447 3.889 8.701l1.961-.395c-.939-4.678-2.316-7.685-4.463-9.748L15.131 9.478z"/><path fill="currentColor" d="M11.556 9.169l-1.115 1.66c.027.019 2.711 1.88 3.801 5.724l1.924-.545C14.867 11.426 11.69 9.259 11.556 9.169zM14.688 18.459C14.898 19.627 15 20.785 15 22h2c0-1.335-.112-2.608-.343-3.895L14.688 18.459z"/></svg> <?php echo __( 'Manage Sessions' );?>
							</a>
						</li>
						<li>
							<a class="active" href="<?php echo $site_url;?>/my-info/<?php echo $profile->username;?>" data-ajax="/my-info/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #03a9f4;"><path fill="currentColor" d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"></path></svg> <?php echo __( 'My Information' );?>
							</a>
						</li>
						<?php if( $config->affiliate_system == '1' ){ ?>
							<li>
								<a href="<?php echo $site_url;?>/settings-affiliate/<?php echo $profile->username;?>" data-ajax="/settings-affiliate/<?php echo $profile->username;?>" target="_self">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #ff568f;"><path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z"></path></svg> <?php echo __( 'My affiliates' );?>
								</a>
							</li>
						<?php } ?>
						<?php if( $config->invite_links_system == '1' ){ ?>
							<li>
								<a href="<?php echo $site_url;?>/settings-links/<?php echo $profile->username;?>" data-ajax="/settings-links/<?php echo $profile->username;?>" target="_self">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #4caf50;"><path fill="currentColor" d="M7,7H11V9H7A3,3 0 0,0 4,12A3,3 0 0,0 7,15H11V17H7A5,5 0 0,1 2,12A5,5 0 0,1 7,7M17,7A5,5 0 0,1 22,12H20A3,3 0 0,0 17,9H13V7H17M8,11H16V13H8V11M17,12H19V15H22V17H19V20H17V17H14V15H17V12Z"></path></svg> <?php echo __( 'Invitation Links' );?>
								</a>
							</li>
						<?php } ?>
						<?php if( $config->two_factor == '1' ){ ?>
							<li>
								<a href="<?php echo $site_url;?>/settings-twofactor/<?php echo $profile->username;?>" data-ajax="/settings-twofactor/<?php echo $profile->username;?>" target="_self">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #8bc34a;"><path fill="currentColor" d="M2,7V9H6V11H4A2,2 0 0,0 2,13V17H8V15H4V13H6A2,2 0 0,0 8,11V9C8,7.89 7.1,7 6,7H2M9,7V17H11V13H14V11H11V9H15V7H9M18,7A2,2 0 0,0 16,9V17H18V14H20V17H22V9A2,2 0 0,0 20,7H18M18,9H20V12H18V9Z"></path></svg> <?php echo __( 'Two-factor authentication' );?>
								</a>
							</li>
						<?php } ?>
						<?php if( $config->emailNotification == '1' ){ ?>
							<li>
								<a href="<?php echo $site_url;?>/settings-email/<?php echo $profile->username;?>" data-ajax="/settings-email/<?php echo $profile->username;?>" target="_self">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #3f51b5;"><path fill="currentColor" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21"></path></svg> <?php echo __( 'Manage Notifications' );?>
								</a>
							</li>
						<?php } ?>
						<?php if( $admin_mode == false && $config->deleteAccount == '1' ) {?>
							<li>
								<a href="<?php echo $site_url;?>/settings-delete/<?php echo $profile->username;?>" data-ajax="/settings-delete/<?php echo $profile->username;?>" target="_self">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #f44336;"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg> <?php echo __( 'Delete Account' );?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col s12 m8">
				<form class="dt_settings_bg_wrap">
					<h2 class="dt_sett_wrap_title"><?php echo __( 'My Information' );?></h2>
		            <p class="no_margin_top bold"><?php echo __("Please choose which information you would like to download"); ?></p>

		            <div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
		            <div class="info_select_radio_btn small_rbtn" id="download_steps_comp">
				<label>
					<input type="checkbox" name="my_information" id="my_information" value="1">
					<div class="sr_btn_lab_innr valign-wrapper">
						<div class="sr_btn_img">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4d91ea" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php echo __( 'My Information' );?></span>
						<div class="switch"><label><span class="lever"></span></label></div>
					</div>
				</label>
				<label>
					<input type="checkbox" name="friends" id="friends" value="1">
					<div class="sr_btn_lab_innr valign-wrapper">
						<div class="sr_btn_img">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff5c8b" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php echo __( 'Friends' );?></span>
						<div class="switch"><label><span class="lever"></span></label></div>
					</div>
				</label>
				<label>
					<input type="checkbox" name="mediafiles" id="mediafiles" value="1">
					<div class="sr_btn_lab_innr valign-wrapper">
						<div class="sr_btn_img">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php echo __( 'Media' );?></span>
						<div class="switch"><label><span class="lever"></span></label></div>
					</div>
				</label>
				<label>
					<input type="checkbox" name="liked_users" id="liked_users" value="1">
					<div class="sr_btn_lab_innr valign-wrapper">
						<div class="sr_btn_img">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#8BC34A" d="M15,14C12.3,14 7,15.3 7,18V20H23V18C23,15.3 17.7,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,15L4.4,14.5C2.4,12.6 1,11.4 1,9.9C1,8.7 2,7.7 3.2,7.7C3.9,7.7 4.6,8 5,8.5C5.4,8 6.1,7.7 6.8,7.7C8,7.7 9,8.6 9,9.9C9,11.4 7.6,12.6 5.6,14.5L5,15Z"></path></svg>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php echo __( 'People i liked' );?></span>
						<div class="switch"><label><span class="lever"></span></label></div>
					</div>
				</label>
				<label>
					<input type="checkbox" name="disliked_users" id="disliked_users" value="1">
					<div class="sr_btn_lab_innr valign-wrapper">
						<div class="sr_btn_img">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#f79f58" d="M19,15H23V3H19M15,3H6C5.17,3 4.46,3.5 4.16,4.22L1.14,11.27C1.05,11.5 1,11.74 1,12V14A2,2 0 0,0 3,16H9.31L8.36,20.57C8.34,20.67 8.33,20.77 8.33,20.88C8.33,21.3 8.5,21.67 8.77,21.94L9.83,23L16.41,16.41C16.78,16.05 17,15.55 17,15V5C17,3.89 16.1,3 15,3Z"></path></svg>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php echo __( 'People i disliked' );?></span>
						<div class="switch"><label><span class="lever"></span></label></div>
					</div>
				</label>
            </div>
		            <div class="ready_to_down_info">
		            <svg height="130px" viewBox="-8 0 480 480.00012" width="130px" xmlns="http://www.w3.org/2000/svg"><g fill="#9bc9ff"><path d="m56.011719 176v232l176 64v-232zm0 0"></path><path d="m408.011719 176v232l-176 64v-232zm0 0"></path><path d="m8.011719 216 176 64 48-40-176-64zm0 0"></path><path d="m280.011719 280 176-64-48-40-176 64zm0 0"></path><path d="m280.011719 72-48 40 176 64 48-40zm0 0"></path><path d="m184.011719 72-176 64 48 40 176-64zm0 0"></path></g><path d="m420.507812 176 40.621094-33.847656c2.199219-1.835938 3.25-4.707032 2.753906-7.527344-.492187-2.820312-2.460937-5.160156-5.152343-6.136719l-176-64c-2.675781-.976562-5.664063-.460937-7.855469 1.359375l-34.863281 29.074219v-22.921875h-16v22.921875l-34.882813-29.074219c-2.1875-1.820312-5.179687-2.335937-7.855468-1.359375l-176 64c-2.691407.976563-4.65625 3.316407-5.152344 6.136719s.554687 5.691406 2.753906 7.527344l40.640625 33.847656-40.625 33.847656c-2.199219 1.835938-3.25 4.707032-2.753906 7.527344.496093 2.820312 2.460937 5.160156 5.152343 6.136719l42.722657 15.542969v168.945312c0 3.359375 2.105469 6.363281 5.261719 7.511719l176 64c1.765624.652343 3.707031.652343 5.472656 0l176-64c3.160156-1.148438 5.261718-4.152344 5.265625-7.511719v-168.945312l42.734375-15.542969c2.695312-.976563 4.660156-3.316407 5.15625-6.136719.492187-2.820312-.554688-5.691406-2.753906-7.527344zm-138.898437-94.902344 158.59375 57.671875-33.792969 28.132813-158.582031-57.671875zm-57.597656 99.589844-20.289063-20.28125-11.3125 11.3125 39.601563 39.59375 39.597656-39.59375-11.3125-11.3125-20.285156 20.28125v-57.273438l144.597656 52.585938-152.597656 55.488281-152.601563-55.488281 144.601563-52.585938zm-41.601563-99.589844 33.777344 28.132813-158.578125 57.671875-33.78125-28.132813zm-124.800781 104 158.59375 57.671875-33.792969 28.132813-158.582031-57.671875zm6.402344 59.773438 117.261719 42.640625c.878906.324219 1.804687.488281 2.738281.488281 1.871093 0 3.679687-.652344 5.117187-1.847656l34.882813-29.074219v203.496094l-160-58.175781zm336 157.527344-160 58.175781v-203.496094l34.878906 29.074219c1.4375 1.195312 3.25 1.847656 5.121094 1.847656.933593 0 1.859375-.164062 2.734375-.488281l117.265625-42.640625zm-118.402344-131.496094-33.773437-28.132813 158.574218-57.671875 33.777344 28.132813zm0 0" fill="#1e81ce"></path><path d="m248.011719 432c0 4.417969 3.582031 8 8 8 7.886719 0 75.574219-26.398438 130.976562-48.566406 4.101563-1.644532 6.097657-6.304688 4.453125-10.410156-1.640625-4.105469-6.300781-6.097657-10.40625-4.457032-55.136718 22.066406-117.601562 46.089844-125.488281 47.449219-4.230469.246094-7.535156 3.746094-7.535156 7.984375zm0 0" fill="#1e81ce"></path><path d="m224.011719 0h16v16h-16zm0 0" fill="#1e81ce"></path><path d="m224.011719 24h16v16h-16zm0 0" fill="#1e81ce"></path><path d="m224.011719 48h16v16h-16zm0 0" fill="#1e81ce"></path></svg>
		            <p>Your file is ready to download!</p>
		            <a href="<?php echo $site_url.'/aj/profile/'; ?>download_user_info" class="btn btn-large waves-effect waves-light bold btn_primary btn_round" id="download_file" target="_blank" onclick="DeleteUserFile()">Download</a>
		         </div>
		            <div class="dt_sett_footer valign-wrapper hiddddddddd">
		                <button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" type="button" onclick="MyInfo()"><span class="btn_text"><?php echo __( 'Generate file' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
		            </div>
		            <?php if( $admin_mode == true ){?>
		                <input type="hidden" name="targetuid" value="<?php echo strrev( str_replace( '==', '', base64_encode($user->id) ) );?>">
		            <?php }?>
		        </form>
			</div>
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
        var formData = new FormData(document.querySelector('.setting-general-form'));
        $.ajax({
            type: 'POST',
            url: window.ajax + 'profile/my_info',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
              $('.setting-general-form').find('.waves-effect').attr('disabled', 'true');
              $('.setting-general-form').find('.btn_text').text("<?php echo __('please_wait');?>");
            },
            success: function(data) {
                $('.setting-general-form').find('.waves-effect').removeAttr('disabled');
                $('.setting-general-form').find('.btn_text').text("<?php echo(__( 'Generate file' )) ?>");
                if (data.status == 200) {
                    $('#download_steps_comp').slideUp(500);
                    $('.ready_to_down_info').fadeIn(200);
                    $('.ready_to_down_info p').html(data.message);
                    $('.hiddddddddd').fadeOut(200);
                    $('.setting-general-form').find( '.alert-success' ).html( "<?php echo __( 'Your file is ready to download!' ); ?>" ).fadeIn( "fast" );
	                setTimeout(function() {
	                    $('.setting-general-form').find( '.alert-success' ).fadeOut( "fast" );
	                }, 2000);
                } 
            },
            error: function (data) {
                $('.setting-general-form').find('.waves-effect').removeAttr('disabled');
                $('.setting-general-form').find('.btn_text').text("<?php echo(__( 'Generate file' )) ?>");
                if (data.responseJSON.status == 400) {
                    $('.setting-general-form').find( '.alert-danger' ).html( data.responseJSON.message ).fadeIn( "fast" );
                    setTimeout(function() {
                        $('.setting-general-form').find( '.alert-danger' ).fadeOut( "fast" );
                    }, 5000);
                }
            }
        });
    }
</script>
