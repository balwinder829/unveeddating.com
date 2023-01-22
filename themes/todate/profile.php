<?php
    $profile = LoadEndPointResource( 'users' )->get_user_profile(strtolower(substr(route(1), 1)));
    if( $profile->verified !== "1" ) {
        ?>
        <script>
            window.location = window.site_url + '/find-matches';
        </script>
        <?php
    }
?>
<?php if($data['name'] == 'profile' && $profile->privacy_show_profile_on_google == '1'){ ?>
    <script>
        var meta = document.createElement('meta');
            meta.name = "robots";
            meta.content = "noindex";
            document.getElementsByTagName('head')[0].appendChild(meta);

        var meta1 = document.createElement('meta');
            meta1.name = "googlebot";
            meta1.content = "noindex";
            document.getElementsByTagName('head')[0].appendChild(meta1);
    </script>
<?php } ?>
<?php $user = ( isset( $_SESSION['JWT'] ) ) ? auth() : null ;?>

<div class="container dt_user_profile_parent">
    <div class="row r_margin">
        <div class="col s12 l5">
			<div class="to_user_media">
				<div class="avatar">
					<a class="inline" href="<?php echo $profile->avater->full;?>" id="avater_profile_img">
						<img src="<?php echo $profile->avater->full;?>" alt="<?php echo $profile->full_name;?>" class="responsive-img" />
					</a>
					<?php if( $user !== null ){ ?>
						<?php if( $user->admin == 1 ){ ?>
							<div class="dt_chng_avtr">
								<span class="btn-upload-image" onclick="document.getElementById('admin_profileavatar_img').click(); return false">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M9 3h6l2 2h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4l2-2zm3 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm0-2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"/></svg> <p><?php echo __( 'Change Photo' );?></p>
								</span>
								<input type="file" id="admin_profileavatar_img" data-username="<?php echo $profile->username;?>" data-userid="<?php echo $profile->id;?>" class="hide" accept="image/x-png, image/gif, image/jpeg" name="avatar">
							</div>
							<div class="dt_avatar_progress hide">
								<div class="admin_avatar_imgprogress progress">
									<div class="admin_avatar_imgdeterminate determinate" style="width: 0%"></div >
								</div>
							</div>
							<div class="admin_avatar_imgprogress progress hide">
								<div class="admin_avatar_imgdeterminate determinate" style="width: 0%"></div >
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<?php if(!empty($user) ) {?>
				<div class="dt_user_pro_info">
					<?php if( $config->connectivitySystem == "1" && !( Wo_IsFollowing($profile->id, $user->id) || Wo_IsFollowing($user->id, $profile->id) ) && !( Wo_IsFollowRequested($profile->id, (int) $user->id) || Wo_IsFollowRequested( (int) $user->id , $profile->id ) ) && (int)Wo_CountFollowing($user->id) < (int)$config->connectivitySystemLimit ){ ?>
						<a class="btn btn-flat" href="javascript:void(0);" id="btn_add_friend" data-ajax-post="/profile/add_friend" data-ajax-params="to=<?php echo $profile->id;?>" data-ajax-callback="callback_add_friend" title="<?php echo __( 'Add Friend' );?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009688" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 6v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z"></path></svg>
						</a>
					<?php } ?>
					<?php if( $config->connectivitySystem == "1" && ( Wo_IsFollowing($profile->id, $user->id) || Wo_IsFollowing($user->id, $profile->id) ) ){ ?>
						<a class="btn btn-flat" href="javascript:void(0);" id="btn_delete_friend" data-ajax-post="/profile/add_friend" data-ajax-params="to=<?php echo $profile->id;?>" data-ajax-callback="callback_add_friend" title="<?php echo __( 'UnFriend' );?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#607D8B" d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm7 3.586l2.121-2.122 1.415 1.415L20.414 18l2.122 2.121-1.415 1.415L19 19.414l-2.121 2.122-1.415-1.415L17.586 18l-2.122-2.121 1.415-1.415L19 16.586z"></path></svg>
						</a>
					<?php } ?>
					<?php if( $config->connectivitySystem == "1" && ( Wo_IsFollowRequested($profile->id, (int) $user->id) || Wo_IsFollowRequested( (int) $user->id , $profile->id ) ) ){ ?>
						<?php
							$flip = '';
							$_title_icon = __( 'Friend request sent' );
							if( Wo_IsFollowRequested($profile->id, (int) $user->id) === true && Wo_IsFollowRequested( (int) $user->id , $profile->id ) === false ){
								$_title_icon = __( 'Friend request received' );
								$flip = ' style="display: block; transform: scale(-1,1);" ';
							}
						?>
						<a class="btn btn-flat" href="javascript:void(0);" title="<?php echo $_title_icon;?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009688" d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm6.586 4l-1.829-1.828 1.415-1.415L22.414 18l-4.242 4.243-1.415-1.415L18.586 19H15v-2h3.586z"></path></svg>
						</a>
					<?php } ?>
					<?php //if(isGenderFree($user->gender) === true ){?>
					<!------------------
						<a class="btn btn-flat" href="javascript:void(0);" data-ajax-post="/profile/open_gift_model" data-ajax-params="" data-ajax-callback="callback_open_gift_model" title="<?php echo __( 'Send a gift' );?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#42a446" d="M20,7h-1.209C18.922,6.589,19,6.096,19,5.5C19,3.57,17.43,2,15.5,2c-1.622,0-2.705,1.482-3.404,3.085 C11.407,3.57,10.269,2,8.5,2C6.57,2,5,3.57,5,5.5C5,6.096,5.079,6.589,5.209,7H4C2.897,7,2,7.897,2,9v2c0,1.103,0.897,2,2,2v7 c0,1.103,0.897,2,2,2h5h2h5c1.103,0,2-0.897,2-2v-7c1.103,0,2-0.897,2-2V9C22,7.897,21.103,7,20,7z M15.5,4 C16.327,4,17,4.673,17,5.5C17,7,16.374,7,16,7h-2.478C14.033,5.424,14.775,4,15.5,4z M7,5.5C7,4.673,7.673,4,8.5,4 c0.888,0,1.714,1.525,2.198,3H8C7.626,7,7,7,7,5.5z M4,9h7v2H4V9z M6,20v-7h5v7H6z M18,20h-5v-7h5V20z M13,11V9.085 C13.005,9.057,13.011,9.028,13.017,9H20l0.001,2H13z"/></svg>
						</a>
						--------------------->
					<?php //}?>
					<?php if( isset( $_COOKIE[ 'JWT' ] ) && !empty( $_COOKIE[ 'JWT' ] ) ){ ?>
						<a href="javascript:void(0);" id="like_btn" data-replace-text="<?php echo __('Liked');?>" data-replace-dom=".like_text" data-ajax-post="/useractions/<?php if( isUserLiked( $profile->id ) ) { echo 'remove_like'; } else { echo 'like'; }?>" data-ajax-params="email_on_profile_like=<?php echo $profile->email_on_profile_like;?>&username=<?php echo $profile->username;?>" data-ajax-callback="callback_<?php if( isUserLiked( $profile->id ) ) { echo 'remove_like" class="btn btn-flat lk_active'; } else { echo 'like" class="btn btn-flat'; }?>" title="<?php if( isUserLiked( $profile->id ) ) { echo __( 'Liked' ); } else { echo __( 'Like' ); }?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M21.179 12.794l.013.014L12 22l-9.192-9.192.013-.014A6.5 6.5 0 0 1 12 3.64a6.5 6.5 0 0 1 9.179 9.154zM4.575 5.383a4.5 4.5 0 0 0 0 6.364L12 19.172l7.425-7.425a4.5 4.5 0 0 0-6.364-6.364L8.818 9.626 7.404 8.21l3.162-3.162a4.5 4.5 0 0 0-5.99.334z" fill="#ff5722"></path></svg>
						</a>
						<a href="javascript:void(0);" id="dislike_btn" data-replace-text="<?php echo __('Disliked');?>" data-replace-dom=".dislike_text" data-ajax-post="/useractions/<?php if( isUserDisliked( $profile->id ) ) { echo 'remove_dislike'; } else { echo 'dislike'; }?>" data-ajax-params="username=<?php echo $profile->username;?>" data-ajax-callback="callback_<?php if( isUserDisliked( $profile->id ) ) { echo 'remove_dislike" class="btn btn-flat dk_active'; } else { echo 'dislike" class="btn btn-flat'; }?>" title="<?php if( isUserDisliked( $profile->id ) ) { echo __( 'Disliked' ); } else { echo __( 'Dislike' ); }?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
						</a>
					<?php } ?>
					<?php if( $profile->src !== 'Fake' ){?>
						<a class="btn btn-flat" href="javascript:void(0);" id="btn_open_private_conversation" data-ajax-post="/chat/open_private_conversation" data-ajax-params="from=<?php echo $profile->id;?>&web_device_id=<?php echo $profile->web_device_id;?>" data-ajax-callback="open_private_conversation" title="<?php echo __( 'Message' );?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z" fill="#2196f3"></path></svg>
						</a>
					<?php }?>
				</div>
				<?php } ?>
				<?php echo GetAd('profile_side_bar');?>
			</div>
        </div>
		
        <div class="col s12 l7">
			<div class="dt_user_profile dt_user_info">
				<div class="info">
					<div class="combo dt_othr_ur_info">
                        <h2><?php echo $profile->full_name.$profile->pro_icon;?><?php echo ( $profile->age  > 0 ) ? ", ". $profile->age : "";?>
							<?php if( verifiedUser($profile) ){ ?>
								<span title="<?php echo __( 'This profile is Verified' );?>">
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
						<?php if(!empty($user) ) {?>
						<div class="dt_usr_opts_mnu">
                            <button type="button" class="dropdown-trigger btn btn-flat" data-target="usr_opts_dropdown"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" fill="currentColor"/></svg></button>
							<ul id="usr_opts_dropdown" class="dropdown-content" tabindex="0">
								<?php if( isset( $_COOKIE[ 'JWT' ] ) && !empty( $_COOKIE[ 'JWT' ] ) && $profile->admin !== '1' ){ ?>
									<li>
										<a href="javascript:void(0);" data-ajax-post="/useractions/<?php if( isUserBlocked( $profile->id ) ) { echo 'unblock'; } else { echo 'block'; }?>" data-ajax-params="userid=<?php echo $profile->id;?>&web_device_id=<?php echo $profile->web_device_id;?>" data-ajax-callback="<?php if( isUserBlocked( $profile->id ) ) { echo 'callback_unblock'; } else { echo 'callback_block'; }?>" class="block_text">
											<?php if( isUserBlocked( $profile->id ) ) { echo __( 'Unblock' ); } else { echo __( 'Block User' ); }?>
										</a>
									</li>
									<?php if( !isUserReported( $profile->id ) ) { ?>
										<li><a class="report_text modal-trigger" href="#modal_report"><?php echo __( 'Report User' );?></a></li>
									<?php }else{ ?>
										<li><a href="javascript:void(0);" data-ajax-post="/useractions/unreport" data-ajax-params="userid=<?php echo $profile->id;?>&web_device_id=<?php echo $profile->web_device_id;?>" data-ajax-callback="callback_unreport" class="report_text"><?php echo __( 'Remove report' );?></a></li>
									<?php } ?>
								<?php } ?>
								<?php if( isset( $_COOKIE[ 'JWT' ] ) && !empty( $_COOKIE[ 'JWT' ] ) && auth()->admin == '1' ){ ?>
									<hr class="border_hr" tabindex="0">
									<li><a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>"><?php echo __( 'Edit' );?></a></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
					</div>
					<?php if( $profile->country !== '' ){?>
					<div class="to_user_stats">
						<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"></path></svg> <?php echo $profile->country_txt;?></span>
					</div>
					<?php } ?>
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
					<?php
						$i = 0;
						$media_count = count( (array)$profile->mediafiles );
						$gallery = array();
						$gallery['visable'][0] = null;
						$gallery['visable'][1] = null;
						$gallery['visable'][2] = null;
						$gallery['visable'][3] = null;
						$gallery['visable'][4] = null;
						$gallery['visable'][5] = null;

						for( $i == 0 ; $i < $media_count ; $i++ ){
							$gallery['visable'][$i] = $profile->mediafiles[$i];
						}

						$matched = false;
						global $db;

						$matched_count = array('cnt' => 0);
						if(!empty($user) ) {
							$matched_count = $db->rawQuery('SELECT count(id) as cnt FROM `notifications` WHERE `type` = "got_new_match" AND ( (`notifier_id` = ' . auth()->id . ' AND `recipient_id` = ' . $profile->id . ') OR (`notifier_id` = ' . $profile->id . ' AND `recipient_id` = ' . auth()->id . ') )');
						}
						if(!empty($matched_count) && !empty($matched_count[0]) && !empty($matched_count[0]['cnt']) && $matched_count[0]['cnt'] == 2){
							$matched = true;
						}

						foreach ($gallery['visable'] as $key => $value) {
							if(!empty($value) &&  $value['is_video'] == "1" && $value['is_confirmed'] == "0" ){

							} else {
								if (!empty($value)) {
									$private = 'false';
									if ($value['is_private'] == 1) {
										$private = 'true';
									}
									$is_avater = 'false';
									if ($value['avater'] == $profile->avater->avater) {
										$is_avater = 'true';
									}
									$full = $value['full'];
									$avater = $value['avater'];
									$video_file = $value['video_file'];
									if ($value['is_private'] == 1 && $matched === false) {
										$full = $value['private_file_full'];
										$avater = $value['private_file_avater'];
									}
									if($config->review_media_files == '1' && $value['is_approved'] == 1){
										echo '<div class="dt_cp_l_photos">';
										if( $value['is_video'] == "1" ){
											if ($value['is_private'] == 1 && $matched === false) {
												echo '<a class="inline" href="' . $value['full'] . '" data-fancybox="gallery" data-id="' . $value['id'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
											}else{
												echo '<a class="inline" href="#myVideo_'.$value['id'].'" data-fancybox="gallery" data-id="' . $value['id'] . '" data-video="' . $value['is_video'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
												echo '<video width="800" height="550" controls id="myVideo_'.$value['id'].'" style="display:none;">';
												echo '    <source src="'.$video_file.'" type="video/mp4">';
												echo '    Your browser doesn\'t support HTML5 video tag.';
												echo '</video>';
											}

											echo '<div class="valign-wrapper dt_prof_ply_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,16.5V7.5L16,12M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></div>';
										}else{
											echo '<a class="inline" href="' . $value['full'] . '" data-fancybox="gallery" data-id="' . $value['id'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
										}
										echo '<img src="' . $avater . '" alt="' . $profile->username . '">';
										echo '</a>';
										echo '</div>';
									} else {
										if($config->review_media_files == '0' && $value['is_approved'] == 1) {
											echo '<div class="dt_cp_l_photos">';
											if( $value['is_video'] == "1" ){

											if ($value['is_private'] == 1 && $matched === false) {
												echo '<a class="inline" href="' . $avater . '" data-fancybox="gallery" data-id="' . $value['id'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
											}else{
												echo '<a class="inline" href="#myVideo_'.$value['id'].'" data-fancybox="gallery" data-id="' . $value['id'] . '" data-video="' . $value['is_video'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
												echo '<video width="800" height="550" controls id="myVideo_'.$value['id'].'" style="display:none;">';
												echo '    <source src="'.$video_file.'" type="video/mp4">';
												echo '    Your browser doesn\'t support HTML5 video tag.';
												echo '</video>';
											}

											echo '<div class="valign-wrapper dt_prof_ply_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,16.5V7.5L16,12M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></div>';
											}else{
												if ($value['is_private'] == 0){
													$avater = $value['full'];
                                                }
												echo '<a class="inline" href="' . $avater . '" data-fancybox="gallery" data-id="' . $value['id'] . '" data-private="' . $private . '" data-avater="' . $is_avater . '">';
											}
											echo '<img src="' . $avater . '" alt="' . $profile->username . '">';
											echo '</a>';
											echo '</div>';
										}
									}
								}
							}
						}
					?>
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

<?php if( isset($_GET['accepted']) ) {?>
<script>
    $( document ).ready(function() {
        $('#btn_open_private_conversation').trigger('click');
    });
    $( window ).on( "load", function() {
        $('#btn_open_private_conversation').trigger('click');
    });
</script>
<?php }?>

<?php if( route(2) == 'chat_request' ) {
global $db;
$is_request_exist = (int)$db->where('url','/' . route(1) . '/' . route(2))->where('recipient_id',auth()->id)->getOne('notifications','id')['id'];
if($is_request_exist > 0){
?>
<script>
    $( document ).ready(function() {
        chat_request_mode();
    });
    $( window ).on( "load", function() {
        chat_request_mode();
    });
</script>
<?php }}?>

<div id="modal_report" class="modal">
    <div class="modal-content">
        <h4><?php echo __( 'Report user.' );?></h4>
		<div class="to_mat_input">
			<textarea id="report_content" name="report_content" rows="4" autofocus=""></textarea>
			<label for="report_content"><?php echo __( 'Type here why you want to report this user.' );?></label>
		</div>
    </div>
    <div class="modal-footer">
		<button type="button" class="btn-flat waves-effect modal-close"><?php echo __( 'Cancel' );?></button>
        <button id="send_report_btn" data-userid="<?php echo $profile->id;?>" data-webdeviceid="<?php echo $profile->web_device_id;?>" class="waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Report' );?></button>
    </div>
</div>

<!-- Gifts Modal -->
<div id="modal_gifts" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4><?php echo __( 'Send gift costs: ' ) . ' ' . $config->cost_per_gift . ' ' . __( 'credits' );?></h4>
        <?php if($user->balance >= $config->cost_per_gift || isGenderFree($user->gender) === true){?>
        <div id="gifts_container" <?php if($user->balance >= $config->cost_per_gift || isGenderFree($user->gender) === true ){}else{echo 'class="hide"';}?>></div>
        <?php }else{ ?>
        <div id="buy_credits_gift" <?php if($user->balance >= $config->cost_per_gift  || isGenderFree($user->gender) === true ){echo 'class="hide"';}else{}?>>
            <div class="credit_bln" style="margin-top: 130px;">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-12.95L16.95 12 12 16.95 7.05 12 12 7.05zm0 2.829L9.879 12 12 14.121 14.121 12 12 9.879z" fill="currentColor"></path></svg>
                    <h2><?php echo __( 'Your' );?> <?php echo __( 'Credits balance' );?></h2>
                    <p><span>0</span> <?php echo __( 'Credits' );?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php if($user->balance >= $config->cost_per_gift  || isGenderFree($user->gender) === true ){?>
    <div class="modal-footer" id="send_gift_footer">
		<button type="button" class="btn-flat waves-effect modal-close"><?php echo __( 'Cancel' );?></button>
        <button data-to="<?php echo $profile->id;?>" class="waves-effect waves-light btn-flat btn_primary white-text" disabled id="btn-send-gift" data-selected=""><?php echo __( 'Send' );?></button>
    </div>
    <?php } else { ?>
	<div class="modal-footer" id="send_gift_footer">
		<button type="button" class="btn-flat waves-effect modal-close"><?php echo __( 'Cancel' );?></button>
        <a href="<?php echo $site_url;?>/credit" data-ajax="/credit" class="modal-close waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Buy Credits' );?></a>
    </div>
	<?php } ?>
</div>
<!-- End Gifts Modal -->

<!-- gift Modal -->
<?php
if( route(2) == 'opengift' && is_numeric(route(3)) ) {
    global $db;
    $gifts = $db->objectBuilder()
        ->where('ug.id', (int)route(3) )
        ->join('gifts g', 'ug.gift_id=g.id', 'LEFT')
        ->get('user_gifts ug', 1, array('ug.id', 'ug.`from`', 'ug.gift_id', 'g.media_file'));
    if ($gifts) {
        $gift_sender = null;
        foreach ($gifts as $key => $value) {
            $gift_sender = userData($value->from, array('first_name', 'last_name', 'username', 'avater'));
            ?>
            <div class="received_gift_modal hide" data-gift-id="<?php echo $value->id; ?>">
                <div class="modal-content">
                    <h4 class="valign-wrapper no_margin">
                        <?php echo '' . $gift_sender->username . ' ' . __('Send gift to you') . ''; ?>
                    </h4>
					<img src="<?php echo GetMedia($value->media_file); ?>" alt="<?php echo $gift_sender->first_name . ' ' . $gift_sender->last_name; ?>" class="to_see_snt_gft"/>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="modal-close waves-effect btn-flat"><?php echo __('Close'); ?></a>
                </div>
            </div>
            <?php
        }
    }
}
?>

<?php if( route(2) == 'story' && is_numeric(route(3)) ) {
    $story      = $db->where('id', Secure((int)route(3)) )->getOne('success_stories',array('*'));
    if( $story ){
        $userData = userData($story['user_id']);
?>
    <div id="story_approval" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4 class="center"><?php echo __('You have story with') . ' ' . $userData->fullname . ' ' . __('on') . ' ' . $story['story_date'];?></h4>
            <p class="center"><?php echo br2nl( html_entity_decode( $story['quote'] ));?></p>
            <div class="storydesc"><?php echo br2nl( html_entity_decode( $story['description'] ));?></div>
        </div>
		<div class="modal-footer">
			<button type="button" class="btn-flat waves-effect modal-close left"><?php echo __( 'Cancel' );?></button>
			<a href="javascript:void(0);" id="disapprove_story" data-storyid="<?php echo route(3);?>" data-story-userid="<?php echo $user->id;?>" data-story-to-userid="<?php echo $profile->id;?>" class="modal-close waves-effect waves-light btn-flat grey darken-1 white-text"><?php echo __( 'Disapprove story' );?></a>&nbsp;&nbsp;
			<a href="javascript:void(0);" id="approve_story" data-storyid="<?php echo route(3);?>" data-story-userid="<?php echo $user->id;?>" data-story-to-userid="<?php echo $profile->id;?>" class="modal-close waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Approve story' );?></a>
		</div>
    </div>
<?php }}?>

    <!-- End gift Modal -->

<!-- Buy Chat Credits Modal -->
<div id="buy_chat_credits" class="modal">
	<div class="modal-content">
		<h4><?php echo __('Chat');?></h4>
		<?php
            $lastchat = GetLastChat($user->id);
            if( $lastchat > 0 ){
                $plusday = ( $lastchat + ( 60 * 60 * 24 ) ) - time();
            }
		?>
		<p><?php echo __("You have reached your daily limit") . ', '. __("you can chat to new people after") . ' ' . '<span id="chat_time" data-chat-time="'.$plusday.'" style="color:#a33596;font-weight: bold;"></span>' .', '. __("can't wait? this service costs you") . ' <span style="color:#a33596;font-weight: bold;">' . (int)$config->not_pro_chat_credit . '</span> ' . __( 'Credits') . '.';?></p>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn-flat waves-effect modal-close"><?php echo __( 'Cancel' );?></button>
		<?php if((int)$user->balance >= (int)$config->not_pro_chat_credit ){?>
			<button data-userid="<?php echo $user->id;?>" data-chat-userid="<?php echo $profile->id;?>" id="btn_buymore_chat_credit" class="waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Buy Now.' );?></button>
		<?php }else{ ?>
			<a href="<?php echo $site_url;?>/credit" data-ajax="/credit" class="modal-close waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Buy Credits' );?></a>
		<?php } ?>
	</div>
</div>
<!-- End Buy Chat Credits Modal -->

<?php

//    ignore_user_abort();
//    flush();
//    session_write_close();
//    if (is_callable('fastcgi_finish_request')) {
//        fastcgi_finish_request();
//    }
    if( $user !== null ) {
        global $db, $config;
        $lastTime = $db->objectBuilder()
                        ->where('user_id', $user->id)
                        ->where('view_userid', $profile->id)
                        ->orderBy('created_at', 'DESC')
                        ->getOne('views', array('TIMESTAMPDIFF(MINUTE,views.created_at,NOW())%60 as lastTime'));
        $can_insert = false;
        if (isset($lastTime->lastTime) && $lastTime->lastTime > $config->profile_record_views_minute) {
            $can_insert = true;
        }
        if ($lastTime === null) {
            $can_insert = true;
        }
        if ($can_insert === true) {
            if ($user->id !== $profile->id) {
                if( $user->id !== '' && $profile->id !== '' ){
                             $db->where('user_id' , $user->id)->where('view_userid' , $profile->id)->delete('views');
                             $db->where('notifier_id' , $user->id)->where('recipient_id' , $profile->id)->where('type' , 'visit')->delete('notifications');
                    $saved = $db->insert('views', array('user_id' => $user->id, 'view_userid' => $profile->id, 'created_at' => date('Y-m-d H:i:s')));
                    if( $saved ) {
                        $Notification = LoadEndPointResource('Notifications');
                        if($Notification) {
                            $Notification->createNotification($profile->web_device_id, $user->id, $profile->id, 'visit', '', '/@' . $user->username);
                        }
                    }
                }
            }
        }
    }
	
	if(( Wo_IsFollowRequested( $profile->id, (int) $user->id  ) ) ){
    ?>
        <div id="story_approval" class="modal">
            <div class="modal-content">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 512.001 512.001" style="margin: 10px auto 40px;display: block;" xml:space="preserve"> <path style="fill:#75DC5E;" d="M208.276,488.894H10.235c-1.527,0-2.714-1.331-2.538-2.848l7.379-63.829 c3.376-29.213,28.113-51.25,57.525-51.25h73.309c29.413,0,54.149,22.037,57.525,51.25l7.379,63.829 C210.989,487.563,209.803,488.894,208.276,488.894z"/> <g> <path style="fill:#2AAD52;" d="M203.434,422.216c-3.376-29.213-28.113-51.25-57.525-51.25h-20.521 c29.412,0,54.149,22.037,57.525,51.25l7.709,66.678h17.654c1.527,0,2.714-1.331,2.538-2.848L203.434,422.216z"/> <path style="fill:#2AAD52;" d="M180.184,488.894v-50.727c0-4.206-3.41-7.615-7.615-7.615s-7.615,3.41-7.615,7.615v50.727H180.184z" /> <path style="fill:#2AAD52;" d="M53.559,488.894v-50.727c0-4.206-3.41-7.615-7.615-7.615s-7.615,3.41-7.615,7.615v50.727H53.559z"/> </g> <path style="fill:#B05A3D;" d="M82.613,326.537v46.491c0,14.714,11.928,26.642,26.642,26.642l0,0 c14.714,0,26.642-11.928,26.642-26.642v-46.491H82.613z"/> <path style="fill:#D7875F;" d="M196.473,245.835h-16.224v-39.118c0-28.326-22.963-51.289-51.289-51.289H89.55 c-28.326,0-51.289,22.963-51.289,51.289v39.118H22.038c-9.158,0-16.582,7.425-16.582,16.582v7.843 c0,9.158,7.425,16.582,16.582,16.582h16.326c1.935,37.483,32.934,67.278,70.892,67.278c18.979,0,36.215-7.446,48.952-19.581 c12.738-12.136,20.965-28.961,21.939-47.697h16.326c9.158,0,16.582-7.425,16.582-16.582v-7.843 C213.055,253.26,205.63,245.835,196.473,245.835z"/> <g> <path style="fill:#475D6D;" d="M109.255,314.459c-9.703,0-18.836-3.78-25.716-10.642c-3.48-3.481-6.164-7.532-7.988-12.05 c-1.574-3.9,0.312-8.337,4.212-9.912s8.337,0.312,9.912,4.212c1.053,2.61,2.611,4.956,4.628,6.975 c3.999,3.987,9.31,6.188,14.952,6.188c8.651,0,16.339-5.171,19.585-13.175c1.581-3.898,6.023-5.777,9.919-4.195 c3.897,1.581,5.776,6.022,4.195,9.919C137.366,305.557,124.137,314.459,109.255,314.459z"/> <path style="fill:#475D6D;" d="M73.716,258.049c-4.206,0-7.615-3.41-7.615-7.615v-3.429c0-4.206,3.41-7.615,7.615-7.615 c4.206,0,7.615,3.41,7.615,7.615v3.429C81.331,254.639,77.922,258.049,73.716,258.049z"/> <path style="fill:#475D6D;" d="M144.794,258.049c-4.206,0-7.615-3.41-7.615-7.615v-3.429c0-4.206,3.41-7.615,7.615-7.615 s7.615,3.41,7.615,7.615v3.429C152.41,254.639,149,258.049,144.794,258.049z"/> <path style="fill:#475D6D;" d="M38.26,211.909h20.411c5.775,0,11.01-3.395,13.364-8.668l5.296-11.863 c1.44-3.226,5.524-4.246,8.313-2.077l25.106,19.527c2.569,1.998,5.731,3.083,8.985,3.083h60.513v-44.084 c0-22.033-17.862-39.895-39.895-39.895h-48.5c-7.252,0-13.13,5.878-13.13,13.13v7.024H57.571c-10.665,0-19.31,8.645-19.31,19.31 v44.514H38.26z"/> </g> <path style="fill:#F9DC6A;" d="M145.756,83.455v113.84h253.213V73.488c0-25.048-20.305-45.352-45.352-45.352h-18.413l-1.394-2.871 C326.307,9.811,310.636,0,293.457,0H229.21C183.119,0,145.756,37.364,145.756,83.455z"/> <path style="fill:#E5AC51;" d="M353.617,28.134h-18.413l-1.394-2.871C326.307,9.811,310.636,0,293.457,0h-24.169 c17.179,0,32.849,9.811,40.353,25.265l1.394,2.871h18.413c25.048,0,45.352,20.305,45.352,45.352v123.807h24.169V73.488 C398.969,48.44,378.664,28.134,353.617,28.134z"/> <path style="fill:#2BB4F3;" d="M409.379,506.394H135.345c-2.114,0-3.755-1.842-3.512-3.942l10.211-88.322 c4.672-40.422,38.901-70.915,79.599-70.915h101.439c40.699,0,74.927,30.493,79.599,70.915l10.211,88.322 C413.135,504.552,411.493,506.394,409.379,506.394z"/> <path style="fill:#1687C4;" d="M192.371,506.389v-70.188c0-4.206-3.41-7.615-7.615-7.615s-7.615,3.41-7.615,7.615v70.188 c0,0.002,0,0.003,0,0.005h15.231C192.371,506.393,192.371,506.391,192.371,506.389z"/> <path style="fill:#F2A077;" d="M235.497,281.738v74.308c0,20.36,16.505,36.865,36.865,36.865l0,0 c20.36,0,36.865-16.505,36.865-36.865v-74.308H235.497z"/> <path style="fill:#FFCCAA;" d="M415.991,193.012v10.854c0,12.67-10.271,22.941-22.941,22.941h-22.595 c-1.342,25.928-12.726,49.214-30.353,66.009c-17.627,16.783-41.477,27.086-67.74,27.086c-52.525,0-95.42-41.218-98.093-93.094 h-22.594c-12.67,0-22.941-10.271-22.941-22.941v-10.854c0-12.67,10.271-22.941,22.941-22.941h22.453v-41.012h82.467 c39.233,0,71.833-28.364,78.402-65.711c0.571-3.242,4.436-4.58,6.877-2.372c17.64,15.957,28.719,39.031,28.719,64.696v44.399h22.453 C405.719,170.071,415.991,180.343,415.991,193.012z"/> <path style="fill:#F2A077;" d="M393.05,170.072h-22.453v-44.399c0-25.665-11.079-48.74-28.719-64.696 c-2.441-2.208-6.308-0.87-6.877,2.372c-0.97,5.516-2.521,10.828-4.565,15.889c8.472,13.445,13.378,29.365,13.378,46.435v44.399 l-0.141,56.735c-1.342,25.928-12.726,49.214-30.353,66.009c-14.578,13.879-33.412,23.319-54.347,26.173 c4.379,0.597,8.848,0.912,13.392,0.912c26.263,0,50.113-10.301,67.74-27.086c17.627-16.795,29.012-40.081,30.353-66.009h22.595 c12.67,0,22.941-10.271,22.941-22.941v-10.854C415.991,180.343,405.719,170.072,393.05,170.072z"/> <g> <path style="fill:#475D6D;" d="M272.362,262.103c-12.647,0-24.551-4.928-33.519-13.874c-4.533-4.533-8.033-9.813-10.408-15.698 c-1.574-3.9,0.312-8.337,4.212-9.912c3.9-1.574,8.337,0.313,9.912,4.212c1.605,3.977,3.976,7.551,7.047,10.622 c6.087,6.072,14.171,9.42,22.756,9.42c13.167,0,24.867-7.871,29.808-20.054c1.581-3.898,6.024-5.776,9.919-4.195 c3.897,1.581,5.776,6.022,4.195,9.919C309.001,250.5,291.761,262.103,272.362,262.103z"/> <path style="fill:#475D6D;" d="M223.186,184.046c-4.206,0-7.615-3.41-7.615-7.615v-4.745c0-4.206,3.41-7.615,7.615-7.615 s7.615,3.41,7.615,7.615v4.745C230.801,180.636,227.391,184.046,223.186,184.046z"/> <path style="fill:#475D6D;" d="M321.538,184.046c-4.206,0-7.615-3.41-7.615-7.615v-4.745c0-4.206,3.41-7.615,7.615-7.615 s7.615,3.41,7.615,7.615v4.745C329.154,180.636,325.745,184.046,321.538,184.046z"/> </g> <circle style="fill:#D2F5FF;" cx="415.993" cy="421.448" r="90.553"/> <path style="fill:#75DC5E;" d="M470.86,406.116h-36.219c-1.831,0-3.315-1.484-3.315-3.315v-36.218c0-1.831-1.485-3.315-3.315-3.315 h-24.038c-1.831,0-3.315,1.484-3.315,3.315v36.218c0,1.831-1.484,3.315-3.315,3.315h-36.219c-1.831,0-3.315,1.484-3.315,3.315 v24.038c0,1.831,1.484,3.315,3.315,3.315h36.219c1.831,0,3.315,1.485,3.315,3.315v36.218c0,1.831,1.485,3.315,3.315,3.315h24.038 c1.831,0,3.315-1.484,3.315-3.315v-36.217c0-1.831,1.484-3.315,3.315-3.315h36.219c1.831,0,3.315-1.485,3.315-3.315v-24.038 C474.175,407.6,472.691,406.116,470.86,406.116z"/></svg>
                <h6 class="bold center"><?php echo $profile->full_name . ' ' . __('request your friendship.');?></h6>
                <p class="center"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-flat modal-close left"><?php echo __( 'Cancel' );?></button>
                <a href="javascript:void(0);" id="disapprove_friend_request" data-friend-request-userid="<?php echo $user->id;?>" data-friend-request-to-userid="<?php echo $profile->id;?>" class="modal-close btn-flat grey darken-1 white-text"><?php echo __( 'Decline request' );?></a>&nbsp;&nbsp;
                <a href="javascript:void(0);" id="approve_friend_request" data-friend-request-userid="<?php echo $user->id;?>" data-friend-request-to-userid="<?php echo $profile->id;?>" class="modal-close btn-flat btn_primary white-text"><?php echo __( 'Accept request' );?></a>
            </div>
        </div>
    <?php
    }