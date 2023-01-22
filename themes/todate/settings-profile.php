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
<!-- Settings  -->
<div class="container page-margin">
<div class="row to_sett_row">
	<div class="col m12 l4">
		<div class="sett_navbar">
            <ul class="browser-default">
                <li class="general">
					<a href="<?php echo $site_url;?>/settings/<?php echo $user->username;?>" data-ajax="/settings/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 1l9.5 5.5v11L12 23l-9.5-5.5v-11L12 1zm0 14a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="currentColor"/></svg></span> <?php echo __( 'General' );?></a>
				</li>
                <li class="profile active">
					<a href="<?php echo $site_url;?>/settings-profile/<?php echo $user->username;?>" data-ajax="/settings-profile/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" fill="currentColor"/></svg></span> <?php echo __( 'Profile' );?></a>
				</li>
				<?php if( $config->social_media_links == 'on' ){ ?>
					<li class="social">
						<a href="<?php echo $site_url;?>/settings-social/<?php echo $user->username;?>" data-ajax="/settings-social/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13.06 8.11l1.415 1.415a7 7 0 0 1 0 9.9l-.354.353a7 7 0 0 1-9.9-9.9l1.415 1.415a5 5 0 1 0 7.071 7.071l.354-.354a5 5 0 0 0 0-7.07l-1.415-1.415 1.415-1.414zm6.718 6.011l-1.414-1.414a5 5 0 1 0-7.071-7.071l-.354.354a5 5 0 0 0 0 7.07l1.415 1.415-1.415 1.414-1.414-1.414a7 7 0 0 1 0-9.9l.354-.353a7 7 0 0 1 9.9 9.9z" fill="currentColor"/></svg></span> <?php echo __( 'Social Links' );?></a>
					</li>
				<?php } ?>
				<hr class="border_hr">
                <li class="privacy">
					<a href="<?php echo $site_url;?>/settings-privacy/<?php echo $user->username;?>" data-ajax="/settings-privacy/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.783 2.826L12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976zM13 10V5l-5 7h3v5l5-7h-3z" fill="currentColor"/></svg></span> <?php echo __( 'Privacy' );?></a>
				</li>
				<li class="emails">
					<a href="<?php echo $site_url;?>/settings-sessions/<?php echo $user->username;?>" data-ajax="/settings-sessions/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M17 13v1c0 2.77-.664 5.445-1.915 7.846l-.227.42-1.747-.974c1.16-2.08 1.81-4.41 1.882-6.836L15 14v-1h2zm-6-3h2v4l-.005.379a12.941 12.941 0 0 1-2.691 7.549l-.231.29-1.55-1.264a10.944 10.944 0 0 0 2.471-6.588L11 14v-4zm1-4a5 5 0 0 1 5 5h-2a3 3 0 0 0-6 0v3c0 2.235-.82 4.344-2.271 5.977l-.212.23-1.448-1.38a6.969 6.969 0 0 0 1.925-4.524L7 14v-3a5 5 0 0 1 5-5zm0-4a9 9 0 0 1 9 9v3c0 1.698-.202 3.37-.597 4.99l-.139.539-1.93-.526c.392-1.437.613-2.922.658-4.435L19 14v-3A7 7 0 0 0 7.808 5.394L6.383 3.968A8.962 8.962 0 0 1 12 2zM4.968 5.383l1.426 1.425a6.966 6.966 0 0 0-1.39 3.951L5 11 5.004 13c0 1.12-.264 2.203-.762 3.177l-.156.29-1.737-.992c.38-.665.602-1.407.646-2.183L3.004 13v-2a8.94 8.94 0 0 1 1.964-5.617z" fill="currentColor"/></svg></span> <?php echo __( 'Manage Sessions' );?></a>
				</li>
                <?php if( $config->two_factor == '1' ){ ?>
					<li class="profile">
						<a href="<?php echo $site_url;?>/settings-twofactor/<?php echo $user->username;?>" data-ajax="/settings-twofactor/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2,7V9H6V11H4A2,2 0 0,0 2,13V17H8V15H4V13H6A2,2 0 0,0 8,11V9C8,7.89 7.1,7 6,7H2M9,7V17H11V13H14V11H11V9H15V7H9M18,7A2,2 0 0,0 16,9V17H18V14H20V17H22V9A2,2 0 0,0 20,7H18M18,9H20V12H18V9Z" fill="currentColor"/></svg></span> <?php echo __( 'Two-factor authentication' );?></a>
					</li>
				<?php } ?>
				<li class="general">
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
						<a href="<?php echo $site_url;?>/settings-affiliate/<?php echo $user->username;?>" data-ajax="/settings-affiliate/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z" fill="currentColor"/></svg></span> <?php echo __( 'My affiliates' );?></a>
					</li>
				<?php } ?>
				<?php if( $config->emailNotification == '1' ){ ?>
					<li class="emails">
						<a href="<?php echo $site_url;?>/settings-email/<?php echo $user->username;?>" data-ajax="/settings-email/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm9.06 8.683L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439z" fill="currentColor"/></svg></span> <?php echo __( 'Manage Notifications' );?></a>
					</li>
				<?php } ?>
				<li class="password">
					<a href="<?php echo $site_url;?>/settings-password/<?php echo $user->username;?>" data-ajax="/settings-password/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zm-2 0V7a4 4 0 1 0-8 0v1h8zm-5 6v2h2v-2h-2zm-4 0v2h2v-2H7zm8 0v2h2v-2h-2z" fill="currentColor"/></svg></span> <?php echo __( 'Password' );?></a>
				</li>
				<hr class="border_hr">
                <li class="block">
					<a href="<?php echo $site_url;?>/settings-blocked/<?php echo $user->username;?>" data-ajax="/settings-blocked/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM8.523 7.109l8.368 8.368a6.04 6.04 0 0 1-1.414 1.414L7.109 8.523A6.04 6.04 0 0 1 8.523 7.11z" fill="currentColor"/></svg></span> <?php echo __( 'Blocked Users' );?></a>
				</li>
                <?php if( $admin_mode == false && $config->deleteAccount == '1' ) {?>
					<li class="delete">
						<a href="<?php echo $site_url;?>/settings-delete/<?php echo $user->username;?>" data-ajax="/settings-delete/<?php echo $user->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5zm2-2v2h6V4H9z" fill="currentColor"/></svg></span> <?php echo __( 'Delete Account' );?></a>
					</li>
				<?php } ?>
            </ul>
        </div>
	</div>
	<div class="col m12 l8">
        <form method="POST" action="/profile/save_profile_setting">
		<div class="dt_settings">
			<h2 class="user_sttng_panel_hd"><?php echo __( 'Profile' );?> <?php echo __( 'Settings' );?></h2>
            <div class="alert alert-success" role="alert" style="display:none;"></div>
			<div class="alert alert-danger" role="alert" style="display:none;"></div>
			
			<div class="to_mat_input">
				<textarea id="about" name="about" rows="4" placeholder="<?php echo __( 'About Me' );?>" autofocus><?php echo $user->about;?></textarea>
				<label for="about"><?php echo __( 'About Me' );?></label>
			</div>
			<div class="to_mat_input">
				<div id="interest" class="chips interest_chips chips-placeholder"></div>
				<input type="hidden" id="interest_entry_profile" name="interest" value="<?php echo $user->interest;?>">
			</div>
			<div class="to_mat_input">
				<input id="ulocation" name="location" type="text" class="browser-default" placeholder="<?php echo __( 'Location' );?>" value="<?php echo $user->location;?>">
				<label for="ulocation"><?php echo __( 'Location' );?></label>
			</div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="relationship" name="relationship" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->relationship, "relationship",  __("Choose your Relationship status") );?>
						</select>
						<label for="relationship"><?php echo __( 'Relationship status' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="language" name="language" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->language, "language", __("Choose your Preferred Language") );?>
						</select>
						<label for="language"><?php echo __( 'Preferred Language' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="work" name="work_status" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->work_status, "work_status", __("Choose your Work status") );?>
						</select>
						<label for="work"><?php echo __( 'Work status' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="education" name="education" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->education, "education", __("Education Level") );?>
						</select>
						<label for="education"><?php echo __( 'Education Level' );?></label>
					</div>
                </div>
            </div>
		</div>

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
            echo '<div class="dt_settings"><div class="row">' . $html . '</div></div>';
            echo '<input name="custom_fields" type="hidden" value="1">';
        }
        ?>


		<div class="dt_settings">
            <!--Looks-->
            <h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="currentColor"></path></svg> <?php echo __('Looks');?></h5>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="ethnicity" name="ethnicity" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->ethnicity, "ethnicity", __("Ethnicity") );?>
						</select>
						<label for="ethnicity"><?php echo __( 'Ethnicity' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="body" name="body" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->body, "body", __("Body Type") );?>
						</select>
						<label for="body"><?php echo __( 'Body Type' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="height" name="height" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->height, "height", __("Height") );?>
						</select>
						<label for="height"><?php echo __( 'Height' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="hair_color" name="hair_color" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->hair_color, "hair_color", __("Choose your Hair Color") );?>
						</select>
						<label for="hair_color"><?php echo __( 'Hair Color' );?></label>
					</div>
                </div>
            </div>
		</div>
		
		<div class="dt_settings">
            <!--Personality-->
            <h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12h4v4a3 3 0 0 1-3 3zm-1-5v2a1 1 0 0 0 2 0v-2h-2zm-2 3V4H4v15a1 1 0 0 0 1 1h11zM6 7h8v2H6V7zm0 4h8v2H6v-2zm0 4h5v2H6v-2z" fill="currentColor"></path></svg> <?php echo __('Personality');?></h5>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="character" name="character" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->character, "character", __("Character") );?>
						</select>
						<label for="character"><?php echo __( 'Character' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="children" name="children" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->children, "children", __("Children") );?>
						</select>
						<label for="children"><?php echo __( 'Children' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="friends" name="friends" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->friends, "friends", __("Friends") );?>
						</select>
						<label for="friends"><?php echo __( 'Friends' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="pets" name="pets" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->pets, "pets", __("Pets") );?>
						</select>
						<label for="pets"><?php echo __( 'Pets' );?></label>
					</div>
                </div>
            </div>
		</div>
		
		<div class="dt_settings">
            <!--Lifestyle-->
            <h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13 2.05c5.053.501 9 4.765 9 9.95v1h-9v6a2 2 0 1 0 4 0v-1h2v1a4 4 0 1 1-8 0v-6H2v-1c0-5.185 3.947-9.449 9-9.95V2a1 1 0 0 1 2 0v.05zM19.938 11a8.001 8.001 0 0 0-15.876 0h15.876z" fill="currentColor"></path></svg> <?php echo __('Lifestyle');?></h5>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="live_with" name="live_with" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->live_with, "live_with", __("Live with") );?>
						</select>
						<label for="live_with"><?php echo __( 'I live with' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="car" name="car" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->car, "car", __("Car") );?>
						</select>
						<label for="car"><?php echo __( 'Car' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="religion" name="religion" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->religion, "religion", __("Religion") );?>
						</select>
						<label for="religion"><?php echo __( 'Religion' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="smoke" name="smoke" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->smoke, "smoke", __("Smoke") );?>
						</select>
						<label for="smoke"><?php echo __( 'Smoke' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="drink" name="drink" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->drink, "drink", __("Drink") );?>
						</select>
						<label for="drink"><?php echo __( 'Drink' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="travel" name="travel" class="browser-default pp_select_has_label">
							<?php echo DatasetGetSelect( $user->travel, "travel", __("Travel") );?>
						</select>
						<label for="travel"><?php echo __( 'Travel' );?></label>
					</div>
                </div>
            </div>
		            <div class="dt_sett_footer">
                <button class="btn btn-large bold btn_primary btn_round" type="submit" name="action"><span><?php echo __( 'Save' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
            </div>
		
		</div>
		
		<div class="dt_settings" style="display:none;">
            <!--Favourites-->
            <h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22l-9.192-9.192c-2.18-2.568-2.066-6.42.353-8.84A6.5 6.5 0 0 1 12 3.64a6.5 6.5 0 0 1 9.179 9.154L12 22zm7.662-10.509a4.5 4.5 0 0 0-6.355-6.337L12 6.282l-1.307-1.128a4.5 4.5 0 0 0-6.355 6.337l.114.132L12 19.172l7.548-7.549.114-.132z" fill="currentColor"/></svg> <?php echo __('Favourites');?></h5>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="music" type="text" class="browser-default" name="music" placeholder="<?php echo __( 'Music Genre' );?>" value="<?php echo $user->music;?>">
						<label for="music"><?php echo __( 'Music Genre' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="dish" type="text" class="browser-default" name="dish" placeholder="<?php echo __( 'Dish' );?>" value="<?php echo $user->dish;?>">
						<label for="dish"><?php echo __( 'Dish' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="song" type="text" class="browser-default" name="song" placeholder="<?php echo __( 'Song' );?>" value="<?php echo $user->song;?>">
						<label for="song"><?php echo __( 'Song' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="hobby" type="text" class="browser-default" name="hobby" placeholder="<?php echo __( 'Hobby' );?>" value="<?php echo $user->hobby;?>">
						<label for="hobby"><?php echo __( 'Hobby' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="tv" type="text" class="browser-default" name="tv" placeholder="<?php echo __( 'TV Show' );?>" value="<?php echo $user->tv;?>">
						<label for="tv"><?php echo __( 'TV Show' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="sport" type="text" class="browser-default" name="sport" placeholder="<?php echo __( 'Sport' );?>" value="<?php echo $user->sport;?>">
						<label for="sport"><?php echo __( 'Sport' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="book" type="text" class="browser-default" name="book" placeholder="<?php echo __( 'Book' );?>" value="<?php echo $user->book;?>">
						<label for="book"><?php echo __( 'Book' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="movie" type="text" class="browser-default" name="movie" placeholder="<?php echo __( 'Movie' );?>" value="<?php echo $user->movie;?>">
						<label for="movie"><?php echo __( 'Movie' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input id="colour" type="text" class="browser-default" name="colour" placeholder="<?php echo __( 'Color' );?>" value="<?php echo $user->colour;?>">
						<label for="colour"><?php echo __( 'Color' );?></label>
					</div>
                </div>
            </div>

            <?php if( $admin_mode == true ){?>
                <input type="hidden" name="targetuid" value="<?php echo strrev( str_replace( '==', '', base64_encode($user->id) ) );?>">
            <?php }?>
		</div>

        </form>
	</div>
</div>
</div>
<!-- End Settings  -->