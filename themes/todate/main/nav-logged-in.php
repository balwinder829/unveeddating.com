<?php
    if( !isset( $_SESSION['JWT'] ) ){
        exit();
    }
?>
<?php //require( $theme_path . 'main' . $_DS . 'onesignal.php' );?>
<!-- Header  -->
<nav role="navigation" id="nav-logged-in">
	<div class="valign-wrapper nav-wrapper container-fluid">
		<div class="valign-wrapper">
			<span class="dt_slide_menu" onclick="javascript:$('body').toggleClass('side_open');">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"/></svg>
			</span>
			<a id="logo-container" href="<?php echo $site_url;?>/<?php if( $profile->verified == 1 ){?>find-matches<?php }?>" class="header_logo">
				<img src="<?php echo $config->sitelogo;?>" alt="" data-default="" data-light="">
			</a>
			<?php if( $profile->verified == 1 ){?>
				<ul class="header_home_link">
					<li class="header_msg">
						<a href="javascript:void(0);" id="messenger_opener">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z" fill="currentColor"/></svg> 
							<?php
                               $unread_messages = 0;// Message::getUnreadMessages();
								if( $unread_messages > 0 ){
									echo '<span class="badge chat_badge" href="javascript:void(0);" id="messenger_opener">' . $unread_messages . '</span>';
								}else{
									echo '<span class="badge chat_badge hide" href="javascript:void(0);" id="messenger_opener">0</span>';
								}
							?>
							<?php echo __( 'messenger' );?>
						</a>
					</li>
					<li class="header_notifications">
						<a href="javascript:void(0);" id="notificationbtn" data-ajax-post="/useractions/shownotifications" data-ajax-params="" data-ajax-callback="callback_show_notifications" data-target="notif_dropdown" class="to_noti_menu">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zm-2 0v-7a6 6 0 1 0-12 0v7h12zm-9 4h6v2H9v-2z" fill="currentColor"/><path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zM9 21h6v2H9v-2z" class="active_path" fill="currentColor"></path></svg> <span class="badge notification_badge hide">0</span> <?php echo __( 'notifications_single' );?>
						</a>
						<ul id="notif_dropdown" class="dropdown-content">
							<div class="dt_notifis_prnt">
                               <div class="empty_state">
									<svg class="to_spin" viewBox="0 0 52 52"><circle class="to_spin_path" cx="26px" cy="26px" r="20px" fill="none" stroke-width="3px"></circle></svg>
								</div>
							</div>
						</ul>
					</li>
				</ul>
			<?php } ?>
		</div>
		<div>
			<?php if( $profile->verified == 1 ){?>
				<ul class="">
					<?php if( $config->pro_system == 1 ) { ?>
						<?php if( $profile->is_pro <> 1 ) { ?>
							<?php if( isGenderFree($profile->gender) === false ){ ?>
								<li class="hide-on-med-and-down">
									<a href="<?php echo $site_url;?>/pro" data-ajax="/pro" class="to_prem_btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 19h20v2H2v-2zM2 5l5 3.5L12 2l5 6.5L22 5v12H2V5zm2 3.841V15h16V8.841l-3.42 2.394L12 5.28l-4.58 5.955L4 8.84z" fill="currentColor"/></svg> <?php echo __( 'Premium' );?></a>
								</li>
							<?php }?>
						<?php } ?>
					<?php } ?>
					<!--li>
						<div class="boost-div">
							<?php
								$boost_duration = 0;
								if( $profile->boosted_time > 0 ) {
									$boost_duration = ( time() - $profile->boosted_time ) / 60;
								}else{
									$boost_duration = $config->boost_expire_time;
								}
								$boost_duration = $config->boost_expire_time - $boost_duration;
							?>
							<?php if( $profile->is_boosted == '1' && $boost_duration <= $config->boost_expire_time ){?>
								<div class="boosted_message_expire" data-message-expire="<button id='boost_btn' class='btn boost-me to_hdr_finance_btn'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path fill='currentColor' d='M174.89,512c-8.592,0.001-17.251-2.699-24.858-8.185 c-17.079-12.317-22.508-34.11-13.203-52.999c0.066-0.134,0.134-0.268,0.203-0.4l68.441-131.421h-67.61 c-32.229,0-58.13-24.373-60.246-56.693c-1.226-18.724,6.295-36.58,20.646-49.068L314.642,10.359c0.354-0.332,0.72-0.651,1.098-0.956 C323.232,3.339,332.666,0,342.303,0c15.391,0,29.116,7.99,36.716,21.373c7.561,13.313,7.433,29.097-0.328,42.272l-63.878,112.352 h71.182c19.206,0,36.08,10.765,44.039,28.092c7.991,17.399,5.146,37.3-7.428,51.938c-7.197,8.379-19.824,9.337-28.203,2.141 c-8.379-7.196-9.337-19.824-2.141-28.203c3.197-3.722,2.263-7.35,1.422-9.181c-0.821-1.788-2.912-4.788-7.69-4.788H280.437 c-7.122,0-13.706-3.787-17.287-9.943c-3.582-6.155-3.619-13.751-0.099-19.942l80.955-142.389c0.068-0.121,0.138-0.241,0.209-0.36 c0.198-0.333,0.663-1.112,0.023-2.238c-0.64-1.126-1.547-1.126-1.935-1.126c-0.391,0-0.775,0.104-1.112,0.298L125.327,242.69 c-0.218,0.205-0.441,0.404-0.667,0.599c-6.418,5.499-7.418,11.954-7.127,16.4c0.628,9.594,7.814,19.307,20.332,19.307h100.574 c6.99,0,13.473,3.649,17.099,9.626c3.626,5.976,3.868,13.412,0.64,19.612l-83.554,160.439c-0.416,0.861-0.669,1.637,0.805,2.701 c1.385,0.999,2.048,0.631,2.692,0.03l154.641-166.997c7.505-8.104,20.159-8.59,28.264-1.086c8.104,7.505,8.591,20.159,1.086,28.264 L205.114,498.966c-0.204,0.219-0.412,0.435-0.625,0.645C196.179,507.814,185.587,512,174.89,512z'/></svg> <?php echo __('Boost me!');?></button>">
									<button title='<?php echo __('Your boost will expire in');?> <?php echo __('minutes');?>' class='btn boost-running'><p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24"><path fill="currentColor" d="M174.89,512c-8.592,0.001-17.251-2.699-24.858-8.185 c-17.079-12.317-22.508-34.11-13.203-52.999c0.066-0.134,0.134-0.268,0.203-0.4l68.441-131.421h-67.61 c-32.229,0-58.13-24.373-60.246-56.693c-1.226-18.724,6.295-36.58,20.646-49.068L314.642,10.359c0.354-0.332,0.72-0.651,1.098-0.956 C323.232,3.339,332.666,0,342.303,0c15.391,0,29.116,7.99,36.716,21.373c7.561,13.313,7.433,29.097-0.328,42.272l-63.878,112.352 h71.182c19.206,0,36.08,10.765,44.039,28.092c7.991,17.399,5.146,37.3-7.428,51.938c-7.197,8.379-19.824,9.337-28.203,2.141 c-8.379-7.196-9.337-19.824-2.141-28.203c3.197-3.722,2.263-7.35,1.422-9.181c-0.821-1.788-2.912-4.788-7.69-4.788H280.437 c-7.122,0-13.706-3.787-17.287-9.943c-3.582-6.155-3.619-13.751-0.099-19.942l80.955-142.389c0.068-0.121,0.138-0.241,0.209-0.36 c0.198-0.333,0.663-1.112,0.023-2.238c-0.64-1.126-1.547-1.126-1.935-1.126c-0.391,0-0.775,0.104-1.112,0.298L125.327,242.69 c-0.218,0.205-0.441,0.404-0.667,0.599c-6.418,5.499-7.418,11.954-7.127,16.4c0.628,9.594,7.814,19.307,20.332,19.307h100.574 c6.99,0,13.473,3.649,17.099,9.626c3.626,5.976,3.868,13.412,0.64,19.612l-83.554,160.439c-0.416,0.861-0.669,1.637,0.805,2.701 c1.385,0.999,2.048,0.631,2.692,0.03l154.641-166.997c7.505-8.104,20.159-8.59,28.264-1.086c8.104,7.505,8.591,20.159,1.086,28.264 L205.114,498.966c-0.204,0.219-0.412,0.435-0.625,0.645C196.179,507.814,185.587,512,174.89,512z"/></svg></p></button>
									<span class="global_boosted_time" data-show="no" data-boosted-time="<?php echo $boost_duration;?>"></span>
								</div>
							<?php }else if( $profile->is_boosted == '0' || ( $profile->is_boosted == '1' && $boost_duration > $config->boost_expire_time ) ){ ?>
								<button id='boost_btn' class='btn boost-me to_hdr_finance_btn'>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24"><path fill="currentColor" d="M174.89,512c-8.592,0.001-17.251-2.699-24.858-8.185 c-17.079-12.317-22.508-34.11-13.203-52.999c0.066-0.134,0.134-0.268,0.203-0.4l68.441-131.421h-67.61 c-32.229,0-58.13-24.373-60.246-56.693c-1.226-18.724,6.295-36.58,20.646-49.068L314.642,10.359c0.354-0.332,0.72-0.651,1.098-0.956 C323.232,3.339,332.666,0,342.303,0c15.391,0,29.116,7.99,36.716,21.373c7.561,13.313,7.433,29.097-0.328,42.272l-63.878,112.352 h71.182c19.206,0,36.08,10.765,44.039,28.092c7.991,17.399,5.146,37.3-7.428,51.938c-7.197,8.379-19.824,9.337-28.203,2.141 c-8.379-7.196-9.337-19.824-2.141-28.203c3.197-3.722,2.263-7.35,1.422-9.181c-0.821-1.788-2.912-4.788-7.69-4.788H280.437 c-7.122,0-13.706-3.787-17.287-9.943c-3.582-6.155-3.619-13.751-0.099-19.942l80.955-142.389c0.068-0.121,0.138-0.241,0.209-0.36 c0.198-0.333,0.663-1.112,0.023-2.238c-0.64-1.126-1.547-1.126-1.935-1.126c-0.391,0-0.775,0.104-1.112,0.298L125.327,242.69 c-0.218,0.205-0.441,0.404-0.667,0.599c-6.418,5.499-7.418,11.954-7.127,16.4c0.628,9.594,7.814,19.307,20.332,19.307h100.574 c6.99,0,13.473,3.649,17.099,9.626c3.626,5.976,3.868,13.412,0.64,19.612l-83.554,160.439c-0.416,0.861-0.669,1.637,0.805,2.701 c1.385,0.999,2.048,0.631,2.692,0.03l154.641-166.997c7.505-8.104,20.159-8.59,28.264-1.086c8.104,7.505,8.591,20.159,1.086,28.264 L205.114,498.966c-0.204,0.219-0.412,0.435-0.625,0.645C196.179,507.814,185.587,512,174.89,512z"/></svg> <?php echo __('Boost me!');?>
								</button>
							<?php }?>
						</div>
					</li-->
					<?php if( isGenderFree($profile->gender) === true ){ ?>
					<?php } else { ?>
						<li class="header_credits">
                            <a href="<?php echo $site_url;?>/credit" data-ajax="/credit" class="to_hdr_finance_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-12.95L16.95 12 12 16.95 7.05 12 12 7.05zm0 2.829L9.879 12 12 14.121 14.121 12 12 9.879z" fill="currentColor"/></svg> <span id="credit_amount"><?php echo (int)$profile->balance; ?></span> <?php echo __('Credits');?>
                            </a>
                        </li>
					<?php } ?>
					<li class="header_user">
						<a href="javascript:void(0);" data-target="user_dropdown" class="dropdown-trigger">
							<img src="<?php echo $profile->avater->avater;?>" alt="<?php echo $profile->full_name;?>" />
						</a>
						<ul id="user_dropdown" class="dropdown-content">
							<?php if ($config->agora_live_video == 1) { ?>
								<li>
									<a href="<?php echo $site_url;?>/live" data-ajax="/live" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z"></path></svg> <?php echo __( 'Live' );?></a>
								</li>
								<li class="divider" tabindex="-1"></li>
							<?php } ?>
							<li class="header_credits_mobi">
								<a href="<?php echo $site_url;?>/credit" data-ajax="/credit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-14.243L7.757 12 12 16.243 16.243 12 12 7.757z" fill="currentColor"/></svg> <?php echo (int)$profile->balance;?> <?php echo __( 'Credits' );?></a>
							</li>
							<?php if( $config->pro_system == 1 ) { ?>
								<?php if( $profile->is_pro <> 1 ) { ?>
									<?php if( isGenderFree($profile->gender) === false ){ ?>
										<li class="header_credits_mobi">
											<a href="<?php echo $site_url;?>/pro" data-ajax="/pro"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 19h20v2H2v-2zM2 5l5 3 5-6 5 6 5-3v12H2V5z" fill="currentColor"/></svg> <?php echo __( 'Premium' );?></a>
										</li>
									<?php }?>
								<?php } ?>
							<?php } ?>
							<li class="divider header_credits_mobi" tabindex="-1"></li>
							<li>
								<a href="<?php echo $site_url;?>/@<?php echo $profile->username;?>" data-ajax="/@<?php echo $profile->username;?>" id="profile_link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zM6.023 15.416C7.491 17.606 9.695 19 12.16 19c2.464 0 4.669-1.393 6.136-3.584A8.968 8.968 0 0 0 12.16 13a8.968 8.968 0 0 0-6.137 2.416zM12 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="currentColor"/></svg> <?php echo __( 'Profile' );?></a>
							</li>
							<li>
								<a href="<?php echo $site_url;?>/matches" data-ajax="/matches"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="currentColor"/></svg> <?php echo __( 'Matches' );?></a>
							</li>
							<li>
								<a href="<?php echo $site_url;?>/visits" data-ajax="/visits"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" fill="currentColor"/></svg> <?php echo __( 'Visits' );?></a>
							</li>
							<li class="divider" tabindex="-1"></li>
							<li>
								<a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M9.954 2.21a9.99 9.99 0 0 1 4.091-.002A3.993 3.993 0 0 0 16 5.07a3.993 3.993 0 0 0 3.457.261A9.99 9.99 0 0 1 21.5 8.876 3.993 3.993 0 0 0 20 12c0 1.264.586 2.391 1.502 3.124a10.043 10.043 0 0 1-2.046 3.543 3.993 3.993 0 0 0-3.456.261 3.993 3.993 0 0 0-1.954 2.86 9.99 9.99 0 0 1-4.091.004A3.993 3.993 0 0 0 8 18.927a3.993 3.993 0 0 0-3.457-.26A9.99 9.99 0 0 1 2.5 15.121 3.993 3.993 0 0 0 4 11.999a3.993 3.993 0 0 0-1.502-3.124 10.043 10.043 0 0 1 2.046-3.543A3.993 3.993 0 0 0 8 5.071a3.993 3.993 0 0 0 1.954-2.86zM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="currentColor"/></svg> <?php echo __( 'Settings' );?></a>
							</li>
							<li>
								<a href="<?php echo $site_url;?>/transactions" data-ajax="/transactions"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm12 4v2h-4v2h4v2l3.5-3L15 7zM9 17v-2h4v-2H9v-2l-3.5 3L9 17z" fill="currentColor"/></svg> <?php echo __( 'Transactions' );?></a>
							</li>
							<?php if( $profile->admin == 1 || $profile->permission !== '' ){ ?>
								<li class="divider" tabindex="-1"></li>
                                <li>
                                    <a href="<?php echo $site_url;?>/admin-cp"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16 21V10h5v10a1 1 0 0 1-1 1h-4zm-2 0H4a1 1 0 0 1-1-1V10h11v11zm7-13H3V4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4z" fill="currentColor"/></svg> <?php echo __( 'Admin Panel' );?></a>
                                </li>
							<?php } ?>
							<li class="divider" tabindex="-1"></li>
							<li>
								<a href="javascript:void(0);" onclick="logout()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M6.265 3.807l1.147 1.639a8 8 0 1 0 9.176 0l1.147-1.639A9.988 9.988 0 0 1 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12a9.988 9.988 0 0 1 4.265-8.193zM11 12V2h2v10h-2z" fill="currentColor"/></svg> <?php echo __( 'Log Out' );?></a>
							</li>
							<li class="divider" tabindex="-1"></li>
							<li>
								<a href="javascript:void(0);" id="night_mode_toggle" data-night-text="<?php echo __('Night mode');?>" data-light-text="<?php echo __('Day mode');?>" data-mode='<?php echo Secure($config->nextmode) ?>'>
									<span><?php echo $config->nextmode_text;?></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" /></svg>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			<?php }else{ ?>
				<ul class="">
					<li class="header_user">
						<a href="javascript:void(0);" data-target="user_dropdown" class="dropdown-trigger">
							<img src="<?php echo $profile->avater->avater;?>" alt="<?php echo $profile->full_name;?>" />
						</a>
						<ul id="user_dropdown" class="dropdown-content">
							<li>
								<a href="javascript:void(0);" onclick="logout()" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M6.265 3.807l1.147 1.639a8 8 0 1 0 9.176 0l1.147-1.639A9.988 9.988 0 0 1 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12a9.988 9.988 0 0 1 4.265-8.193zM11 12V2h2v10h-2z" fill="currentColor"/></svg> <?php echo __( 'Log Out' );?></a>
							</li>
							<li class="divider" tabindex="-1"></li>
							<li>
								<a href="javascript:void(0);" id="night_mode_toggle" data-night-text="<?php echo __('Night mode');?>" data-light-text="<?php echo __('Day mode');?>" data-mode='<?php echo Secure($config->nextmode) ?>'>
									<span><?php echo $config->nextmode_text;?></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" /></svg>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			<?php }?>
		</div>
	</div>
</nav>
<div class="to_hdr_noti_cont"></div>
<!-- End Header  -->

<?php require( $theme_path . 'main' . $_DS . 'chat.php' );?>