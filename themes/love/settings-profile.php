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
<?php //$user = auth();?>

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
							<a class="active" href="<?php echo $site_url;?>/settings-profile/<?php echo $profile->username;?>" data-ajax="/settings-profile/<?php echo $profile->username;?>" target="_self">
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
							<a href="<?php echo $site_url;?>/my-info/<?php echo $profile->username;?>" data-ajax="/my-info/<?php echo $profile->username;?>" target="_self">
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
				<form method="POST" action="/profile/save_profile_setting" class="profile">
					<div class="dt_settings_bg_wrap sett_prof_cont">
						<h2 class="dt_sett_wrap_title"><?php echo __( 'Profile' );?></h2>
						
						<div class="alert alert-success" role="alert" style="display:none;"></div>
						<div class="alert alert-danger" role="alert" style="display:none;"></div>

						<div class="row">
							<div class="input-field col s12">
								<textarea id="about" name="about" class="materialize-textarea" autofocus><?php echo $user->about;?></textarea>
								<label for="about"><?php echo __( 'About Me' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 no_margin">
								<div id="interest" class="chips interest_chips chips-placeholder no_margin"></div>
								<input type="hidden" id="interest_entry_profile" name="interest" value="<?php echo $user->interest;?>">
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="ulocation" name="location" type="text" class="validate" value="<?php echo $user->location;?>">
								<label for="ulocation"><?php echo __( 'Location' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="relationship" name="relationship">
									<?php echo DatasetGetSelect( $user->relationship, "relationship",  __("Choose your Relationship status") );?>
								</select>
								<label for="relationship"><?php echo __( 'Relationship status' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="language" name="language">
									<?php echo DatasetGetSelect( $user->language, "language", __("Choose your Preferred Language") );?>
								</select>
								<label for="language"><?php echo __( 'Preferred Language' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="work" name="work_status">
									<?php echo DatasetGetSelect( $user->work_status, "work_status", __("Choose your Work status") );?>
								</select>
								<label for="work"><?php echo __( 'Work status' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="education" name="education">
									<?php echo DatasetGetSelect( $user->education, "education", __("Education Level") );?>
								</select>
								<label for="education"><?php echo __( 'Education Level' );?></label>
							</div>
						</div>
					</div>
					<br>

					<?php
					$fields = GetProfileFields('profile');
					$custom_data = UserFieldsData($profile->id);
					$template = $theme_path . 'partails' . $_DS . 'profile-fields.php';
					$html = '';
					if (count($fields) > 0) {
						foreach ($fields as $key => $field) {
							ob_start();
							require($template);
							$html .= ob_get_contents();
							ob_end_clean();
						}
						echo '<div class="dt_settings_bg_wrap sett_prof_cont"><div class="row">' . $html . '</div></div><br>';
						echo '<input name="custom_fields" type="hidden" value="1">';
					}
					?>


					<div class="dt_settings_bg_wrap sett_prof_cont">
						<!--Looks-->
						<h5><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M9,11.75A1.25,1.25 0 0,0 7.75,13A1.25,1.25 0 0,0 9,14.25A1.25,1.25 0 0,0 10.25,13A1.25,1.25 0 0,0 9,11.75M15,11.75A1.25,1.25 0 0,0 13.75,13A1.25,1.25 0 0,0 15,14.25A1.25,1.25 0 0,0 16.25,13A1.25,1.25 0 0,0 15,11.75M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20C7.59,20 4,16.41 4,12C4,11.71 4,11.42 4.05,11.14C6.41,10.09 8.28,8.16 9.26,5.77C11.07,8.33 14.05,10 17.42,10C18.2,10 18.95,9.91 19.67,9.74C19.88,10.45 20,11.21 20,12C20,16.41 16.41,20 12,20Z"></path></svg> <?php echo __('Looks');?></h5>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="ethnicity" name="ethnicity">
									<?php echo DatasetGetSelect( $user->ethnicity, "ethnicity", __("Ethnicity") );?>
								</select>
								<label for="ethnicity"><?php echo __( 'Ethnicity' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="body" name="body">
									<?php echo DatasetGetSelect( $user->body, "body", __("Body Type") );?>
								</select>
								<label for="body"><?php echo __( 'Body Type' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="height" name="height">
									<?php echo DatasetGetSelect( $user->height, "height", __("Height") );?>
								</select>
								<label for="height"><?php echo __( 'Height' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="hair_color" name="hair_color">
									<?php echo DatasetGetSelect( $user->hair_color, "hair_color", __("Choose your Hair Color") );?>
								</select>
								<label for="hair_color"><?php echo __( 'Hair Color' );?></label>
							</div>
						</div>
					</div>
					<br>
					<div class="dt_settings_bg_wrap sett_prof_cont">
						<!--Personality-->
						<h5><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M1.5,4V5.5C1.5,9.65 3.71,13.28 7,15.3V20H22V18C22,15.34 16.67,14 14,14C14,14 13.83,14 13.75,14C9,14 5,10 5,5.5V4M14,4A4,4 0 0,0 10,8A4,4 0 0,0 14,12A4,4 0 0,0 18,8A4,4 0 0,0 14,4Z"></path></svg> <?php echo __('Personality');?></h5>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="character" name="character">
									<?php echo DatasetGetSelect( $user->character, "character", __("Character") );?>
								</select>
								<label for="character"><?php echo __( 'Character' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="children" name="children">
									<?php echo DatasetGetSelect( $user->children, "children", __("Children") );?>
								</select>
								<label for="children"><?php echo __( 'Children' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="friends" name="friends">
									<?php echo DatasetGetSelect( $user->friends, "friends", __("Friends") );?>
								</select>
								<label for="friends"><?php echo __( 'Friends' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="pets" name="pets">
									<?php echo DatasetGetSelect( $user->pets, "pets", __("Pets") );?>
								</select>
								<label for="pets"><?php echo __( 'Pets' );?></label>
							</div>
						</div>
					</div>
					<br>
					<div class="dt_settings_bg_wrap sett_prof_cont">
						<!--Lifestyle-->
						<h5><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M15,18.54C17.13,18.21 19.5,18 22,18V22H5C5,21.35 8.2,19.86 13,18.9V12.4C12.16,12.65 11.45,13.21 11,13.95C10.39,12.93 9.27,12.25 8,12.25C6.73,12.25 5.61,12.93 5,13.95C5.03,10.37 8.5,7.43 13,7.04V7A1,1 0 0,1 14,6A1,1 0 0,1 15,7V7.04C19.5,7.43 22.96,10.37 23,13.95C22.39,12.93 21.27,12.25 20,12.25C18.73,12.25 17.61,12.93 17,13.95C16.55,13.21 15.84,12.65 15,12.39V18.54M7,2A5,5 0 0,1 2,7V2H7Z"></path></svg> <?php echo __('Lifestyle');?></h5>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="live_with" name="live_with">
									<?php echo DatasetGetSelect( $user->live_with, "live_with", __("Live with") );?>
								</select>
								<label for="live_with"><?php echo __( 'I live with' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="car" name="car">
									<?php echo DatasetGetSelect( $user->car, "car", __("Car") );?>
								</select>
								<label for="car"><?php echo __( 'Car' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="religion" name="religion">
									<?php echo DatasetGetSelect( $user->religion, "religion", __("Religion") );?>
								</select>
								<label for="religion"><?php echo __( 'Religion' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="smoke" name="smoke">
									<?php echo DatasetGetSelect( $user->smoke, "smoke", __("Smoke") );?>
								</select>
								<label for="smoke"><?php echo __( 'Smoke' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<select id="drink" name="drink">
									<?php echo DatasetGetSelect( $user->drink, "drink", __("Drink") );?>
								</select>
								<label for="drink"><?php echo __( 'Drink' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<select id="travel" name="travel">
									<?php echo DatasetGetSelect( $user->travel, "travel", __("Travel") );?>
								</select>
								<label for="travel"><?php echo __( 'Travel' );?></label>
							</div>
						</div>
					</div>
					<br>
					<div class="dt_settings_bg_wrap sett_prof_cont">
						<!--Favourites-->
						<h5><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path></svg> <?php echo __('Favourites');?></h5>
						<div class="row">
							<div class="input-field col s6 xs12">
								<input id="music" type="text" class="validate" name="music" value="<?php echo $user->music;?>">
								<label for="music"><?php echo __( 'Music Genre' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<input id="dish" type="text" class="validate" name="dish" value="<?php echo $user->dish;?>">
								<label for="dish"><?php echo __( 'Dish' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<input id="song" type="text" class="validate" name="song" value="<?php echo $user->song;?>">
								<label for="song"><?php echo __( 'Song' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<input id="hobby" type="text" class="validate" name="hobby" value="<?php echo $user->hobby;?>">
								<label for="hobby"><?php echo __( 'Hobby' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<input id="sport" type="text" class="validate" name="sport" value="<?php echo $user->sport;?>">
								<label for="sport"><?php echo __( 'Sport' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<input id="tv" type="text" class="validate" name="tv" value="<?php echo $user->tv;?>">
								<label for="tv"><?php echo __( 'TV Show' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<input id="book" type="text" class="validate" name="book" value="<?php echo $user->book;?>">
								<label for="book"><?php echo __( 'Book' );?></label>
							</div>
							<div class="input-field col s6 xs12">
								<input id="movie" type="text" class="validate" name="movie" value="<?php echo $user->movie;?>">
								<label for="movie"><?php echo __( 'Movie' );?></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 xs12">
								<input id="colour" type="text" class="validate" name="colour" value="<?php echo $user->colour;?>">
								<label for="colour"><?php echo __( 'Color' );?></label>
							</div>
						</div>
						<div class="dt_sett_footer valign-wrapper">
							<button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" type="submit" name="action"><span><?php echo __( 'Save' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
						</div>
						<?php if( $admin_mode == true ){?>
							<input type="hidden" name="targetuid" value="<?php echo strrev( str_replace( '==', '', base64_encode($user->id) ) );?>">
						<?php }?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- End Settings  -->
