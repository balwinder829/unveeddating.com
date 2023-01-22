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
<!-- Profile  -->

<div class="container dt_user_profile_parent">
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

    <div class="row r_margin">
        <div class="col s12 l5">
			<div class="to_user_media">
				<div class="avatar">
					<?php
                        $is_avatar_approved = is_avatar_approved($profile->id, str_replace(array(GetMedia('', false)),array(''),$profile->avater->full));
                        if($is_avatar_approved) { ?>
						<a class="inline" href="<?php echo $profile->avater->full;?>" id="avater_profile_img">
							<img src="<?php echo $profile->avater->full;?>" alt="<?php echo $profile->full_name;?>" class="responsive-img" />
						</a>
					<?php } else {?>
						<a class="dt_usr_undr_rvw">
							<span><?php echo __('Under Review');?></span>
						</a>
					<?php } ?>
					<div class="dt_chng_avtr">
						<span class="valign-wrapper btn-upload-image" onclick="document.getElementById('profileavatar_img').click(); return false">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M9 3h6l2 2h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4l2-2zm3 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm0-2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"/></svg> <p><?php echo __( 'Change Photo' );?></p>
						</span>
						<input type="file" id="profileavatar_img" class="hide" accept="image/x-png, image/gif, image/jpeg" name="avatar">
					</div>
					<div class="dt_avatar_progress hide">
						<div class="avatar_imgprogress progress">
							<div class="avatar_imgdeterminate determinate" style="width: 0%"></div >
						</div>
					</div>
				</div>
				<div class="dt_user_pro_info">
					<?php if( $profile->is_pro == 0 && $config->pro_system == 1 && isGenderFree($profile->gender) === false ){?>
						<a class="btn btn-flat" href="<?php echo $site_url;?>/pro" data-ajax="/pro" title="<?php echo __( 'Premium' );?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 19h20v2H2v-2zM2 5l5 3.5L12 2l5 6.5L22 5v12H2V5zm2 3.841V15h16V8.841l-3.42 2.394L12 5.28l-4.58 5.955L4 8.84z" fill="#e4982a"></path></svg>
						</a>
					<?php } ?>
					<a class="btn btn-flat" href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>" title="<?php echo __( 'Settings' );?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill="#795548"></path></svg>
					</a>
				</div>
				<?php echo GetAd('profile_side_bar');?>
			</div>
        </div>
		
        <div class="col s12 l7">
            <?php if( $config->image_verification == 0 ){ ?>
				<?php if( verifiedUser($profile) == false ){ ?>
                    <?php if($config->emailValidation == "1"){?>
                    <div class="dt_user_profile dt_how_to_verfy_alrt">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196F3" d="M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1Z" /></svg> <?php echo __( 'To get your profile verified you have to verify these.');?>
                        </span>
						<ul class="browser-default dt_prof_vrfy">
                            <?php if($config->emailValidation == "1"){?>
                                <?php if( $config->sms_or_email === 'mail' ){?>
                                    <?php if( $profile->active === "0" ){?>
                                        <li><?php echo __( 'Please verify your email address' );?> <a href="<?php echo $site_url;?>/verifymail" data-ajax="/verifymail"><?php echo __( 'Verify Now' );?></a>.</li>
                                    <?php } ?>
                                <?php } ?>
                                <?php if( $config->sms_or_email == 'sms' ){?>
                                    <?php if( !empty( $profile->phone_number ) && $profile->phone_verified == "0" ){?>
                                        <li><?php echo __( 'Please verify your phone number' );?> <a href="<?php echo $site_url;?>/verifyphone" data-ajax="/verifyphone"><?php echo __( 'Verify Now' );?></a>.</li>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if(count($profile->mediafiles) < 5){ ?>
							<li><?php echo __( 'Upload at least 5 image.');?></li>
                            <?php }?>
						</ul>
                    </div>
                    <?php }?>
                <?php } ?>
            <?php } ?>

			<div class="dt_user_profile dt_user_info">
				<div class="info">
					<div class="combo">
						<h2><?php echo $profile->full_name.$profile->pro_icon;?><?php echo ( $profile->age  > 0 ) ? ", ". $profile->age : "";?>
							<?php if( verifiedUser($profile) ){ ?>
								<span title="<?php
                                if( $config->image_verification == 1 && $profile->approved_at > 0 ){
                                    echo __( 'This profile is Verified by photos' );
                                }else{
                                    echo __( 'This profile is Verified by phone' );
                                }
                                ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196F3" d="M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1Z" /></svg>
								</span>
							<?php }else{ ?>
                                <?php if($config->emailValidation == "0"){?>
                                    <span title="<?php echo __( 'This profile is Verified' );?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196F3" d="M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1Z" /></svg>
                                    </span>
                                <?php }else{ ?>
                                    <span title="<?php echo __( 'This profile is Not verified' );?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#e18805" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M17,15.59L15.59,17L12,13.41L8.41,17L7,15.59L10.59,12L7,8.41L8.41,7L12,10.59L15.59,7L17,8.41L13.41,12L17,15.59Z" /></svg>
                                    </span>
                                <?php } ?>
							<?php } ?>
						</h2>
					</div>
					<div class="to_user_stats">
						<?php if( $profile->country !== '' ){?>
							<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"></path></svg> <?php echo $profile->country_txt;?></span>
							<span class="middot">·</span>
						<?php } ?>
						<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M21.179 12.794l.013.014L12 22l-9.192-9.192.013-.014A6.5 6.5 0 0 1 12 3.64a6.5 6.5 0 0 1 9.179 9.154zM4.575 5.383a4.5 4.5 0 0 0 0 6.364L12 19.172l7.425-7.425a4.5 4.5 0 0 0-6.364-6.364L8.818 9.626 7.404 8.21l3.162-3.162a4.5 4.5 0 0 0-5.99.334z" fill="currentColor"></path></svg> <?php echo $likes_count;?> <?php echo __( 'Likes' );?></span>
						<span class="middot">·</span>
						<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="currentColor"></path></svg> <?php echo $views_count;?> <?php echo __( 'Views' );?></span>
					</div>
					<?php if( $config->social_media_links == 'on' ){?>
						<?php if( !empty( $profile->facebook ) || !empty( $profile->twitter ) || !empty( $profile->google ) || !empty( $profile->instagram ) || !empty( $profile->linkedin ) || !empty( $profile->website ) ) {?>
							<ul class="dt_user_social">
								<?php if( !empty( $profile->facebook ) ) {?>
									<li class="fb">
										<a href="https://www.facebook.com/<?php echo $profile->facebook;?>" target="_blank" title="<?php echo __( 'Facebook' );?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.397,20.997v-8.196h2.765l0.411-3.209h-3.176V7.548c0-0.926,0.258-1.56,1.587-1.56h1.684V3.127	C15.849,3.039,15.025,2.997,14.201,3c-2.444,0-4.122,1.492-4.122,4.231v2.355H7.332v3.209h2.753v8.202H13.397z"/></svg>
										</a>
									</li>
								<?php } ?>
								<?php if( !empty( $profile->twitter ) ) {?>
									<li class="twit">
										<a href="https://twitter.com/<?php echo $profile->twitter;?>" target="_blank" title="<?php echo __( 'Twitter' );?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"/></svg>
										</a>
									</li>
								<?php } ?>
								<?php if( !empty( $profile->google ) ) {?>
									<li class="vk">
										<a href="https://vk.com/<?php echo $profile->google;?>" target="_blank" title="<?php echo __( 'VK' );?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20.8,7.74C20.93,7.32 20.8,7 20.18,7H18.16C17.64,7 17.41,7.27 17.28,7.57C17.28,7.57 16.25,10.08 14.79,11.72C14.31,12.19 14.1,12.34 13.84,12.34C13.71,12.34 13.5,12.19 13.5,11.76V7.74C13.5,7.23 13.38,7 12.95,7H9.76C9.44,7 9.25,7.24 9.25,7.47C9.25,7.95 10,8.07 10.05,9.44V12.42C10.05,13.08 9.93,13.2 9.68,13.2C9,13.2 7.32,10.67 6.33,7.79C6.13,7.23 5.94,7 5.42,7H3.39C2.82,7 2.7,7.27 2.7,7.57C2.7,8.11 3.39,10.77 5.9,14.29C7.57,16.7 9.93,18 12.08,18C13.37,18 13.53,17.71 13.53,17.21V15.39C13.53,14.82 13.65,14.7 14.06,14.7C14.36,14.7 14.87,14.85 16.07,16C17.45,17.38 17.67,18 18.45,18H20.47C21.05,18 21.34,17.71 21.18,17.14C21,16.57 20.34,15.74 19.47,14.76C19,14.21 18.29,13.61 18.07,13.3C17.77,12.92 17.86,12.75 18.07,12.4C18.07,12.4 20.54,8.93 20.8,7.74Z" /></svg>
										</a>
									</li>
								<?php } ?>
								<?php if( !empty( $profile->instagram ) ) {?>
									<li class="insta">
										<a href="https://www.instagram.com/<?php echo $profile->instagram;?>" target="_blank" title="<?php echo __( 'instagram' );?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z"/></svg>
										</a>
									</li>
								<?php } ?>
								<?php if( !empty( $profile->linkedin ) ) {?>
									<li class="lin">
										<a href="https://www.linkedin.com/in/<?php echo $profile->linkedin;?>" target="_blank" title="<?php echo __( 'LinkedIn' );?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z"/></svg>
										</a>
									</li>
								<?php } ?>
								<?php if( !empty( $profile->website ) ) {?>
									<li>
										<a href="<?php echo $profile->website;?>" target="_blank" title="<?php echo __( 'Website' );?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4.069 13h2.974c.136 2.379.665 4.478 1.556 6.23A8.01 8.01 0 0 1 4.069 13zm2.961-2H4.069a8.012 8.012 0 0 1 4.618-6.273C7.704 6.618 7.136 8.762 7.03 11zm5.522 8.972c-.183.012-.365.028-.552.028-.186 0-.367-.016-.55-.027-1.401-1.698-2.228-4.077-2.409-6.973h6.113c-.208 2.773-1.117 5.196-2.602 6.972zM9.03 11c.139-2.596.994-5.028 2.451-6.974.172-.01.344-.026.519-.026.179 0 .354.016.53.027 1.035 1.364 2.427 3.78 2.627 6.973H9.03zm6.431 8.201c.955-1.794 1.538-3.901 1.691-6.201h2.778a8.005 8.005 0 0 1-4.469 6.201zM17.167 11a14.67 14.67 0 0 0-1.792-6.243A8.014 8.014 0 0 1 19.931 11h-2.764z"/></svg>
										</a>
									</li>
								<?php } ?>
								<?php
								$social_fields = GetProfileFields('social');
								$social_custom_data = UserFieldsData($profile->id);
								if (count($social_fields) > 0) {
									foreach ($social_fields as $key => $field) {
										if($field['profile_page'] == 1) {
											if( isset($social_custom_data[$field['fid']]) && $social_custom_data[$field['fid']] !== null ) {
												echo '<li>';
												echo '<a href="' . $social_custom_data[$field['fid']] . '" target="_blank" title="' . $field['name'] . '">';
												echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4.069 13h2.974c.136 2.379.665 4.478 1.556 6.23A8.01 8.01 0 0 1 4.069 13zm2.961-2H4.069a8.012 8.012 0 0 1 4.618-6.273C7.704 6.618 7.136 8.762 7.03 11zm5.522 8.972c-.183.012-.365.028-.552.028-.186 0-.367-.016-.55-.027-1.401-1.698-2.228-4.077-2.409-6.973h6.113c-.208 2.773-1.117 5.196-2.602 6.972zM9.03 11c.139-2.596.994-5.028 2.451-6.974.172-.01.344-.026.519-.026.179 0 .354.016.53.027 1.035 1.364 2.427 3.78 2.627 6.973H9.03zm6.431 8.201c.955-1.794 1.538-3.901 1.691-6.201h2.778a8.005 8.005 0 0 1-4.469 6.201zM17.167 11a14.67 14.67 0 0 0-1.792-6.243A8.014 8.014 0 0 1 19.931 11h-2.764z"/></svg>';
												echo '</a>';
												echo '</li>';
											}
										}
									}
								}
								?>
							</ul>
						<?php } ?>
					<?php } ?>
					<div class="dt_user_prof_complt">
						<h5 class="valign-wrapper"><?php echo __( 'Profile Completion' );?><span><?php echo $profile->profile_completion;?>%</span></h5>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $profile->profile_completion;?>%"></div>
						</div>
					</div>
				</div>
				<?php if( !empty( $profile->interest ) ) {?>
					<div class="to_usr_info_block">
						<h5><?php echo __( 'Interests' );?></h5>
						<?php
                            $chips = explode( "," , $profile->interest );
                            if( !empty( $chips ) ) {
                                foreach ($chips as $key => $value) {
                                    $interest = trim(  $value  );
                                    if( $interest !== "" ){
                                        echo '<div class="chip to_intrst_chp"><a href="'.$site_url.'/interest/'.strtolower($interest).'" data-ajax="/interest/'.strtolower($interest).'">'.$interest.'</a></div>';
                                    }
                                }
                            }
						?>
					</div>
				<?php } ?>
				<?php if( !empty( $profile->location ) ) {?>
					<div class="to_usr_info_block">
						<h5><?php echo __( 'Location' );?></h5>
						<p class="to_intrst_des"><?php echo $profile->location;?></p>
						<div class="to_location_map">
							<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo urlencode($profile->location);?>&zoom=13&size=600x205&maptype=roadmap&key=<?php echo($config->google_map_api_key) ?>" alt="<?php echo __( 'Location' );?>" />
						</div>
					</div>
				<?php } ?>
				<?php if( !empty( $profile->about ) ) {?>
					<div class="to_usr_info_block">
						<h5><?php echo __( 'About' );?></h5>
						<p class="to_intrst_des"><?php echo nl2br($profile->about);?></p>
					</div>
				<?php } ?>
				<div class="dt_cp_photos_list">
					<?php if( $config->instagram_importer == '1' ){ ?>
						<div class="dt_cp_bar_add_photos">
							<div class="inline">
								<span>
									<a href="<?php echo $site_url;?>/settings-instagram/<?php echo $profile->username;?>" data-ajax="/settings-instagram/<?php echo $profile->username;?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3"></circle><line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line></svg>
										<b><?php echo __( 'import_from_instagram' );?></b>
									</a>
								</span>
							</div>
						</div>
					<?php } ?>
					<div class="dt_cp_bar_add_photos" onclick="document.getElementById('avatar_profileimg').click(); return false"> <!-- Add Photo -->
						<div class="inline">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="13" r="3"></circle><path d="M5 7h2a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h2m9 7v7a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path><line x1="15" y1="6" x2="21" y2="6"></line><line x1="18" y1="3" x2="18" y2="9"></line></svg>
								<b><?php echo __( 'Add Photos' );?></b>
							</span>
						</div>
					</div>
					<div class="dt_cp_bar_add_photos" onclick="$('#upload_video').modal('open');$('#btn_video_upload').removeClass('hide');$('#video_form').hide();"> <!-- Add Photo -->
						<div class="inline">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z"></path><rect x="3" y="6" width="12" height="12" rx="2"></rect><line x1="7" y1="12" x2="11" y2="12"></line><line x1="9" y1="10" x2="9" y2="14"></line></svg>
								<b><?php echo __( 'Add Video' );?></b>
							</span>
						</div>
					</div>
					<?php
						$i = 0;
						$media_count = count( (array)$profile->mediafiles );
						$gallery = array();
						$gallery['visable'][0] = null;
						$gallery['visable'][1] = null;
						$gallery['visable'][2] = null;
						$gallery['visable'][3] = null;

						for( $i == 0 ; $i < $media_count ; $i++ ){
							$gallery['visable'][$i] = $profile->mediafiles[$i];
						}

						foreach ($gallery['visable'] as $key => $value) {
							if( !empty( $value ) ){
								if( $value['is_video'] == "1" && $value['is_confirmed'] == "0" ){

                                }else {
									$private = 'false';
									$img_path = $value['avater'];
									$video_file = $value['video_file'];
									if( $value['is_private'] == 1 ){
										$private = 'true';
										$img_path = $value['private_file_avater'];
									}
									$is_avater = 'false';
									if ($value['avater'] == $profile->avater->avater){
										$is_avater = 'true';
									}
									echo '<div class="dt_cp_l_photos">';
									if( $value['is_video'] == "1" ){
                                        echo '<a class="inline user_video" href="#myVideo_'.$value['id'].'" data-fancybox="gallery" data-id="' . $value['id'] . '" data-video="' . $value['is_video'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
                                        echo '<video width="800" height="550" controls id="myVideo_'.$value['id'].'" style="display:none;">';
                                        echo '    <source src="'.$video_file.'" type="video/mp4">';
                                        echo '    Your browser doesn\'t support HTML5 video tag.';
                                        echo '</video>';
                                        echo '<div class="valign-wrapper dt_prof_ply_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,16.5V7.5L16,12M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></div>';
                                    }else{
                                        echo '<a class="inline" href="' . $value['full'] . '" data-fancybox="gallery" data-id="' . $value['id'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
                                    }
									if($value['is_approved'] === 0 && $config->review_media_files == '1' ){
                                        echo '<div class="dt_usr_undr_rvw_mini"><span>'.__('Under Review').'</span></div>';
                                    }else{
                                        echo '<img src="' . $img_path . '" alt="' . $profile->username . '">';
                                    }
									echo '</a>';
                                    echo '</div>';
								}
							}else{
								echo '<div class="dt_cp_l_photos">';
								echo '<div class="inline"></div>';
								echo '</div>';
							}
						}
					?>
					
					<input type="file" id="avatar_profileimg" class="hide" accept="image/x-png, image/gif, image/jpeg" name="profile_images" multiple="multiple">
				</div>
				<div class="to_usr_info_block to_usr_info_things">
					<h5><?php echo __( 'Profile Info ' );?></h5>
					<div class="dt_profile_info">
						<?php if( !empty( $profile->language ) || !empty( $profile->relationship ) || !empty( $profile->work_status ) || !empty( $profile->education ) ) {?>
							<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" fill="currentColor"></path></svg> <?php echo __( 'Basic' );?></h5>
						<?php } ?>
						<?php if( !empty( $profile->gender ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Gender' );?></p></div>
								<div class="col s6 m7"><p><?php echo __($profile->gender);?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->language ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Preferred Language' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->language;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->relationship ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Relationship status' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->relationship_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->work_status ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Work status' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->work_status_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->education ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Education Level' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->education_txt;?></p></div>
							</div>
						<?php } ?>
						<?php
							$general_fields = GetProfileFields('general');
							$general_custom_data = UserFieldsData($profile->id);
							if (count($general_fields) > 0) {
								foreach ($general_fields as $key => $field) {
									if($field['profile_page'] == 1) {
										if( isset($general_custom_data[$field['fid']]) && $general_custom_data[$field['fid']] !== null ) {
											echo '<div class="row">';
											echo '<div class="col s6 m5"><p class="info_title">' . $field['name'] . '</p></div>';
											if ($field['select_type'] == 'yes') {
												$options = @explode(',', $field['type']);
												array_unshift($options,"");
												unset($options[0]);
												if (isset($options[$general_custom_data[$field['fid']]])) {
													echo '<div class="col s6 m7"><p>' . $options[$general_custom_data[$field['fid']]] . '</p></div>';
												} else {
													echo '<div class="col s6 m7"><p>' . $general_custom_data[$field['fid']] . '</p></div>';
												}
											} else {
												echo '<div class="col s6 m7"><p>' . $general_custom_data[$field['fid']] . '</p></div>';
											}
											echo '</div>';
										}
									}
								}
							}
						?>
					</div>
					<div class="dt_profile_info">
						<?php if( !empty( $profile->ethnicity ) || !empty( $profile->body ) || !empty( $profile->height ) || !empty( $profile->hair_color ) ) {?>
							<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="currentColor"></path></svg> <?php echo __( 'Looks' );?></h5>
						<?php } ?>
						<?php if( !empty( $profile->ethnicity ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Ethnicity' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->ethnicity_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->body ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Body Type' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->body_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->height ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Height' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->height;?>cm</p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->hair_color ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Hair color' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->hair_color_txt;?></p></div>
							</div>
						<?php } ?>
					</div>
					<div class="dt_profile_info">
						<?php if( !empty( $profile->character ) || !empty( $profile->children ) || !empty( $profile->friends ) || !empty( $profile->pets ) ) {?>
							<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12h4v4a3 3 0 0 1-3 3zm-1-5v2a1 1 0 0 0 2 0v-2h-2zm-2 3V4H4v15a1 1 0 0 0 1 1h11zM6 7h8v2H6V7zm0 4h8v2H6v-2zm0 4h5v2H6v-2z" fill="currentColor"></path></svg> <?php echo __( 'Personality' );?></h5>
						<?php } ?>
						<?php if( !empty( $profile->character ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Character' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->character_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->children ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Children' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->children_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->friends ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Friends' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->friends_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->pets ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Pets' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->pets_txt;?></p></div>
							</div>
						<?php } ?>
					</div>
					<div class="dt_profile_info">
						<?php if( !empty( $profile->live_with ) || !empty( $profile->car ) || !empty( $profile->religion ) || !empty( $profile->smoke ) || !empty( $profile->drink ) || !empty( $profile->travel ) ) {?>
							<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13 2.05c5.053.501 9 4.765 9 9.95v1h-9v6a2 2 0 1 0 4 0v-1h2v1a4 4 0 1 1-8 0v-6H2v-1c0-5.185 3.947-9.449 9-9.95V2a1 1 0 0 1 2 0v.05zM19.938 11a8.001 8.001 0 0 0-15.876 0h15.876z" fill="currentColor"></path></svg> <?php echo __( 'Lifestyle' );?></h5>
						<?php } ?>
						<?php if( !empty( $profile->live_with ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'I live with' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->live_with_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->car ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Car' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->car_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->religion ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Religion' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->religion_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->smoke ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Smoke' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->smoke_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->drink ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Drink' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->drink_txt;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->travel ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Travel' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->travel_txt;?></p></div>
							</div>
						<?php } ?>
					</div>
					<div class="dt_profile_info">
						<?php if( !empty( $profile->music ) || !empty( $profile->dish ) || !empty( $profile->song ) || !empty( $profile->hobby ) || !empty( $profile->city ) || !empty( $profile->sport ) || !empty( $profile->book ) || !empty( $profile->movie ) || !empty( $profile->colour ) || !empty( $profile->tv ) ) {?>
							<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22l-9.192-9.192c-2.18-2.568-2.066-6.42.353-8.84A6.5 6.5 0 0 1 12 3.64a6.5 6.5 0 0 1 9.179 9.154L12 22zm7.662-10.509a4.5 4.5 0 0 0-6.355-6.337L12 6.282l-1.307-1.128a4.5 4.5 0 0 0-6.355 6.337l.114.132L12 19.172l7.548-7.549.114-.132z" fill="currentColor"></path></svg> <?php echo __( 'Favourites' );?></h5>
						<?php } ?>
						<?php if( !empty( $profile->music ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Music Genre' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->music;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->dish ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Dish' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->dish;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->song ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Song' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->song;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->hobby ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Hobby' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->hobby;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->city ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'City' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->city;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->sport ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Sport' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->sport;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->book ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Book' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->book;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->movie ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Movie' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->movie;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->colour ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'Color' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->colour;?></p></div>
							</div>
						<?php } ?>
						<?php if( !empty( $profile->tv ) ) {?>
							<div class="row">
								<div class="col s6 m5"><p class="info_title"><?php echo __( 'TV Show' );?></p></div>
								<div class="col s6 m7"><p><?php echo $profile->tv;?></p></div>
							</div>
						<?php } ?>
					</div>
					<div class="dt_profile_info">
						<?php
							$is_show_title = false;
							$_profile_custom_data = '';
							$profile_fields = GetProfileFields('profile');
							$profile_custom_data = UserFieldsData($profile->id);
							if (count($profile_fields) > 0) {
								foreach ($profile_fields as $key => $field) {
									if($field['profile_page'] == 1) {
										if( isset($profile_custom_data[$field['fid']]) && $profile_custom_data[$field['fid']] !== null ) {
											$is_show_title = true;
											if( !empty($profile_custom_data[$field['fid']]) ) {
												$_profile_custom_data .= '<div class="row">';
												$_profile_custom_data .= '<div class="col s6 m5"><p class="info_title">' . __( $field['name'] ) . '</p></div>';
												if ($field['select_type'] == 'yes') {
													$profile_options = @explode(',', $field['type']);
													array_unshift($profile_options, "");
													unset($profile_options[0]);
													if (isset($profile_options[$profile_custom_data[$field['fid']]])) {
														$_profile_custom_data .= '<div class="col s6 m7"><p>' . $profile_options[$profile_custom_data[$field['fid']]] . '</p></div>';
													} else {
														$_profile_custom_data .= '<div class="col s6 m7"><p>' . $profile_custom_data[$field['fid']] . '</p></div>';
													}
												} else {
													$_profile_custom_data .= '<div class="col s6 m7"><p>' . $profile_custom_data[$field['fid']] . '</p></div>';
												}
												$_profile_custom_data .= '</div>';
											}
										}
									}
								}
							}
							if($is_show_title == true){
								echo '<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm14 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-7 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" fill="currentColor"></path></svg> '. __( 'Other' ) .'</h5>';
							}
							echo $_profile_custom_data;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Profile  -->

<div id="upload_images" class="modal">
    <div class="modal-content">
        <div class="dt_user_prof_complt dt_user_prof_upimg">
            <h5 class="valign-wrapper"><?php echo __( 'Upload Completion' );?><span id="c_perc">0%</span></h5>
            <div class="progress" id="c_prog">
                <div class="determinate" id="c_det" style="width: 0%"></div>
            </div>
        </div>
    </div>
</div>

<div id="upload_video" class="modal" style="width: 60%;">
    <div class="modal-content">
        <h4><?php echo __( 'Add Video' );?></h4>
		<?php if ($config->lock_pro_video == '1' && $profile->lock_pro_video == '0' && $profile->is_pro == '1'){ ?>
			<a href="javascript:void(0);" id="btn_video_upload" onclick="document.getElementById('avatar_profilevideo').click(); return false" class="btn_upld_prf_vid waves-effect">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9,16V10H5L12,3L19,10H15V16H9M5,20V18H19V20H5Z"></path></svg> <?php echo __( 'Upload' );?>
			</a>
			<input type="file" id="avatar_profilevideo" class="hide" accept="video/*" name="profile_videos">
		<?php } elseif ($config->lock_pro_video == '1' && $profile->lock_pro_video == '1' && $profile->is_pro == '1') { ?>
			<p><?php echo __('To unlock video upload feature in your account, you have to pay');?>  <?php echo $config->currency_symbol . (int)$config->lock_pro_video_fee;?>.</p>
			<div class="modal-body credit_pln">
				<div class="pay_using">
					<p class="bold"><?php echo __( 'Pay Using' );?></p>
					<div class="pay_u_btns">
						<button onclick="PayUsingWallet('private_video','show');" class="btn valign-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 9H4v7h16v-7zm0-4V5H4v3h16z" fill="currentColor"></path></svg> <?php echo __( 'pay' );?>
                        </button>
					</div>
				</div>
            </div>
		<?php } else { ?>
            <a href="javascript:void(0);" id="btn_video_upload" onclick="document.getElementById('avatar_profilevideo').click(); return false" class="btn_upld_prf_vid waves-effect">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9,16V10H5L12,3L19,10H15V16H9M5,20V18H19V20H5Z"></path></svg> <?php echo __( 'Upload' );?>
            </a>
            <input type="file" id="avatar_profilevideo" class="hide" accept="video/*" name="profile_videos">
        <?php } ?>
        <div class="dt_user_prof_complt hide" style="margin: 50px 5px;">
            <h5 class="valign-wrapper"><?php echo __( 'Upload Completion' );?><span id="c_percx">0%</span></h5>
            <div class="progress" id="c_progx">
                <div class="determinate" id="c_detx" style="width: 0%"></div>
            </div>
        </div>
		<div class="dt_prof_upldd_vid_ldng center hide">
			<p><?php echo __('Please wait..');?></p>
			<svg width="120" height="30" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="currentColor"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> </svg>
		</div>
        <div id="video_form" class="hide">
			<div class="to_mat_input">
				<select id="privacy" name="privacy" class="browser-default pp_select_has_label">
					<option value="0" selected><?php echo __( 'Public');?></option>
					<option value="1"><?php echo __( 'Private');?></option>
				</select>
				<label for="privacy"><?php echo __( 'Privacy');?></label>
			</div>
			<input type="file" id="video_thumbnail" class="hide" accept="image/x-png, image/gif, image/jpeg" name="video_thumbnail">
            <div class="item active" onclick="document.getElementById('video_thumbnail').click(); return false">
                <label for="privacy"><?php echo __( 'Thumbnail');?></label>
                <img id="video_thumbnail_image" src="<?php echo $config->uri;?>/upload/photos/video-placeholder.jpg" class="dt_prof_upldd_vid_thmb">
            </div>
            <input type="hidden" name="media_id" id="media_id">
        </div>
    </div>
    <div class="modal-footer">
        <div class="video_upload_form_progress hide" id="img_upload_progress">
            <div class="progress">
                <div id="img_upload_progress_bar" class="determinate progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
            </div>
        </div>
        <button class="modal-close waves-effect btn-flat"><?php echo __( 'Close' );?></button>
        <button class="waves-effect waves-light btn-flat btn_primary white-text" disabled id="btn-upload-video-file" data-selected=""><?php echo __( 'Upload' );?></button>
    </div>
</div>

<div class="bank_transfer_modal modal modal-fixed-footer">
	<div class="modal-dialog">
    <div class="modal-content dt_bank_trans_modal">
		<h4><?php echo __( 'Bank Transfer' );?></h4>
        <div class="modal-body">
            <div class="bank_info"><?php echo htmlspecialchars_decode($config->bank_description);?></div>
			<div class="dt_user_profile hide_alert_info_bank_trans">
                <span class="valign-wrapper">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo __( 'Note' );?>:
                </span>
				<ul class="browser-default dt_prof_vrfy">
					<li><?php echo __( 'Please transfer the amount of' );?> <b><span id="bank_transfer_price"></span></b> <?php echo __( 'to this bank account to buy' );?> <b>"<span id="bank_transfer_description"></span>"</b></li>
					<li><?php echo $config->bank_transfer_note;?></li>
				</ul>
            </div>
			<p class="dt_bank_trans_upl_rec"><a href="javascript:void(0);" onclick="$('.bank_transfer_modal').addClass('up_rec_active'); return false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path></svg> <?php echo __( 'Upload Receipt' );?></a></p>
            <div class="upload_bank_receipts">
                <div onclick="document.getElementById('receipt_img').click(); return false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path></svg>
                    <p><?php echo __( 'Upload Receipt' );?></p>
					<img id="receipt_img_preview" src="">
                </div>
            </div>
            <input type="file" id="receipt_img" class="hide" accept="image/x-png, image/gif, image/jpeg" name="receipt_img">
        </div>
        <!--<span style="display: block;text-align: center;" id="receipt_img_path"></span>-->
    </div>
    <div class="modal-footer">
		<div class="bank_transfr_progress hide" id="img_upload_progress">
			<div class="progress">
				<div id="img_upload_progress_bar" class="determinate progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
			</div>
		</div>
		<button class="modal-close waves-effect btn-flat"><?php echo __( 'Close' );?></button>
        <button class="waves-effect waves-green btn btn-flat bold" disabled id="btn-upload-receipt" data-selected=""><?php echo __( 'Confirm' );?></button>
    </div>
	</div>
</div>

<script>
<?php if ($config->securionpay_payment === "yes") { ?>
        $(function () {
            SecurionpayCheckout.key = '<?php echo($config->securionpay_public_key); ?>';
            SecurionpayCheckout.success = function (result) {
                $.post(window.ajax + 'securionpay/handle', result, function(data, textStatus, xhr) {
                    if (data.status == 200) {
                        window.location.href = data.url;
                    }
                }).fail(function(data) {
                    M.toast({html: data.responseJSON.message});
                });
            };
            SecurionpayCheckout.error = function (errorMessage) {
                M.toast({html: errorMessage});
            };
        });
        function lock_pro_video_pay_via_securionpay(){
            price = <?php echo (int)$config->lock_pro_video_fee;?>;
            $.post(window.ajax + 'securionpay/token', {type:'lock_pro_video',price:price}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    SecurionpayCheckout.open({
                        checkoutRequest: data.token,
                        name: 'lock pro video',
                        description: '<?php echo __( "Unlock Upload video feature");?>'
                    });
                }
            }).fail(function(data) {
                M.toast({html: data.responseJSON.message});
            });
        }
    <?php } ?>


    <?php if ($config->authorize_payment === "yes") { ?>
    function lock_pro_video_pay_via_authorize() {
        $('#authorize_btn').attr('onclick', 'AuthorizeVideoRequest()');
        $('#authorize_modal').modal('open');
    }
    function AuthorizeVideoRequest() {
        $('#authorize_btn').html("<?php echo __('please_wait');?>");
        $('#authorize_btn').attr('disabled','true');
        authorize_number = $('#authorize_number').val();
        authorize_month = $('#authorize_month').val();
        authorize_year = $('#authorize_year').val();
        authorize_cvc = $('#authorize_cvc').val();
        price = <?php echo (int)$config->lock_pro_video_fee;?>;
        $.post(window.ajax + 'authorize/pay', {type:'lock_pro_video',card_number:authorize_number,card_month:authorize_month,card_year:authorize_year,card_cvc:authorize_cvc,price:price}, function(data) {
            if (data.status == 200) {
                window.location.href = data.url;
            } else {
                $('#authorize_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
                setTimeout(function () {
                    $('#authorize_alert').html("");
                },3000);
            }
            $('#authorize_btn').html("<?php echo __( 'pay' );?>");
            $('#authorize_btn').removeAttr('disabled');
        }).fail(function(data) {
            $('#authorize_alert').html("<div class='alert alert-danger'>"+data.responseJSON.message+"</div>");
            setTimeout(function () {
                $('#authorize_alert').html("");
            },3000);
            $('#authorize_btn').html("<?php echo __( 'pay' );?>");
            $('#authorize_btn').removeAttr('disabled');
        });
    }
    <?php } ?>
    function lock_pro_video_pay_via_paystack() {
        $('#paystack_btn').attr('onclick', 'InitializeVideoPaystack()');
        $('#paystack_wallet_modal').modal('open');
    }
    function InitializeVideoPaystack() {
        $('#paystack_btn').html("<?php echo __('please_wait');?>");
        $('#paystack_btn').attr('disabled','true');
        email = $('#paystack_wallet_email').val();
        price = <?php echo (int)$config->lock_pro_video_fee;?>;
        $.post(window.ajax + 'paystack/initialize', {type:'lock_pro_video',email:email,price:price}, function(data) {
            if (data.status == 200) {
                window.location.href = data.url;
            } else {
                $('#paystack_wallet_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
                setTimeout(function () {
                    $('#paystack_wallet_alert').html("");
                },3000);
            }
            $('#paystack_btn').html("<?php echo __( 'Confirm' );?>");
            $('#paystack_btn').removeAttr('disabled');
        });
    }

	function lock_pro_video_pay_via_2co(){
        $('#2checkout_type').val('lock_pro_video');
        $('#2checkout_description').val('<?php echo __( "Unlock Upload video feature");?>');
        $('#2checkout_price').val(<?php echo (int)$config->lock_pro_video_fee;?>);

        $('#2checkout_modal').modal('open');
    }
    function lock_pro_video_pay_via_iyzipay(){
        $('.btn-iyzipay-payment').attr('disabled','true');

        $.post(window.ajax + 'iyzipay/createsession', {
            payType: 'lock_pro_video',
            description: '<?php echo __( "Unlock Upload video feature");?>',
            price: <?php echo (int)$config->lock_pro_video_fee;?>
        }, function(data) {
            if (data.status == 200) {
                $('#iyzipay_content').html('');
                $('#iyzipay_content').html(data.html);
            } else {
                $('.btn-iyzipay').attr('disabled', false).html("Iyzipay App not set yet.");
            }
            $('.btn-iyzipay').removeAttr('disabled');
            $('.btn-iyzipay').find('span').text("<?php echo __( 'iyzipay');?>");
        });

        $('.btn-iyzipay-payment').removeAttr('disabled');

    }

    function lock_pro_video_pay_via_cashfree(){
        $('.cashfree-payment').attr('disabled','true');

        $('#cashfree_type').val('lock_pro_video');
        $('#cashfree_description').val('<?php echo __( 'Unlock Upload video feature' );?>');
        $('#cashfree_price').val(<?php echo (int)$config->lock_pro_video_fee;?>);

        $("#cashfree_alert").html('');
        $('.go_pro--modal').fadeOut(250);
        $('#cashfree_modal_box').modal('open');

        $('.btn-cashfree-payment').removeAttr('disabled');
    }

    function unlock_photo_private_pay_via_bank(amount){
        $('#bank_transfer_price').text('<?php echo $config->currency_symbol;?> <?php echo (int)$config->lock_private_photo_fee;?>');
        $('#bank_transfer_description').text('<?php echo __( 'Unlock Private Photo Payment' );?>');
        $('#receipt_img_path').html('');
        $('#receipt_img_preview_unlock_photo_private').attr('src', '');
        $('.bank_transfer_modal').removeClass('up_rec_img_ready, up_rec_active');
        $('.bank_transfer_modal').modal('open');
    }
	
    $(document).ready(function(){
		document.getElementById('receipt_img').addEventListener('change', function(e) {
            let imgPath = $(this)[0].files[0].name;
            if (typeof(FileReader) != "undefined") {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#receipt_img_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
            $('#receipt_img_path').html(imgPath);
            $('.bank_transfer_modal').addClass('up_rec_img_ready');
            $('#btn-upload-receipt').removeAttr('disabled');
            $('#btn-upload-receipt').removeClass('btn-flat').addClass('btn-success');
        });

        document.getElementById('btn-upload-receipt').addEventListener('click', function(e) {
            e.preventDefault();
            let bar = $('#img_upload_progress');
            let percent = $('#img_upload_progress_bar');

            let formData = new FormData();
            formData.append("description", '<?php echo __( 'Unlock Private Photo Payment' );?>');
            formData.append("price", <?php echo (int)$config->lock_private_photo_fee;?>);
            formData.append("mode", 'unlock_photo_private');
            formData.append("receipt_img", $("#receipt_img")[0].files[0], $("#receipt_img")[0].files[0].value);
            bar.removeClass('hide');
            $.ajax({
                xhr: function() {
                    let xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            let percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            //status.html( percentComplete + "%");
                            percent.width(percentComplete + '%');
                            percent.html(percentComplete + '%');
                            if (percentComplete === 100) {
                                bar.addClass('hide');
                                percent.width('0%');
                                percent.html('0%');
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: window.ajax + 'profile/upload_receipt',
                type: "POST",
                async: true,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                timeout: 60000,
                dataType: false,
                data: formData,
                success: function(result) {
                    if( result.status == 200 ){
                        $('.bank_transfer_modal').modal('close');
                        $('.payment_modalx').modal('close');
                        M.toast({html: '<?php echo __('Your receipt uploaded successfully.');?>'});
                        return false;
                    }
                }
            });
        });
		
        $( document ).on( 'click', '#btn-upload-video-file', function(e){
            var formData = new FormData();
                formData.append("privacy", $('#privacy').val() );
                formData.append("media_id", $('#media_id').val() );
                if(typeof $('#video_thumbnail')[0].files[0] !== "undefined") {
                    formData.append("video_thumbnail", $('#video_thumbnail')[0].files[0], $('#video_thumbnail')[0].files[0].value);
                }
                console.log(formData);

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            xstatus.html( percentComplete + "%");
                            xbar.css({'width': percentComplete + '%'});
                            if (percentComplete === 100) {
                                xbar.hide();
                                xbar.width('0%');
                                xstatus.html( "0%");
                                $('.dt_user_prof_complt').addClass('hide');
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: window.ajax + 'profile/confirm_upload_video',
                type: "POST",
                async: true,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                timeout: 60000,
                dataType: false,
                success: function(result) {
                    if( result.status == 200 ){
                        // $('#video_form').removeClass('hide');
                        // $('#media_id').val(result.media_id);
                        // $('#btn-upload-video-file').attr('disabled', false);
                        // e.preventDefault();
                        $('#upload_video').modal('close');
                        setTimeout(function() {
                            $("#ajaxRedirect").attr("data-ajax", '/' + window.loggedin_user );
                            $("#ajaxRedirect").click();
                        }, 500);

                    }
                },
                error(data){
                    $('#upload_video').modal('close');
                }
            });

        });

        $( document ).on( 'change', '#video_thumbnail', function(e){
            if (typeof(FileReader) != "undefined") {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#video_thumbnail_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        $( document ).on( 'change', '#avatar_profilevideo', function(e){

            <?php
                if($profile->is_pro == '0'){
                    $user_image_count = (int)$db->where('user_id', $profile->id)->getValue('mediafiles','count(id)');
                    $config_max_image = (int)$config->max_photo_per_user;
                    if( $user_image_count >= $config_max_image ) {?>
                        M.toast({html: '<?php echo __('You reach to limit of media uploads.');?>'});
                        $('#upload_video').modal('close');
                        return false;
            <?php }} ?>

            $('#btn_video_upload').addClass('hide');
            $('.dt_user_prof_complt').removeClass('hide');
            var xbar = $('#c_detx');
            var xstatus = $('#c_percx');
            var formData = new FormData();
                formData.append("video", $(this)[0].files[0],$(this)[0].files[0].value );
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            xstatus.html( percentComplete + "%");
                            xbar.css({'width': percentComplete + '%'});
                            if (percentComplete === 100) {
                                xbar.hide();
                                xbar.width('0%');
                                xstatus.html( "0%");
                                $('.dt_user_prof_complt').addClass('hide');
                                $('.dt_prof_upldd_vid_ldng').removeClass('hide');
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: window.ajax + 'profile/upload_video',
                type: "POST",
                async: true,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                timeout: 0,
                dataType: false,
                success: function(result) {
                    if( result.status == 200 ){
                        $('.dt_prof_upldd_vid_ldng').addClass('hide');
                        $('#video_form').removeClass('hide');
                        $('#video_form').show();
                        $('#media_id').val(result.media_id);
                        if(typeof result.thumb !== "undefined") {
                            $('#video_thumbnail_image').attr('src', result.thumb);
                        }
                        $('#btn-upload-video-file').attr('disabled', false);
                        e.preventDefault();
                    }
                },
                error(result){
                    M.toast({html: result.responseJSON.message});
                    $('#upload_video').modal('close');
                }
            });
        });

    });
</script>