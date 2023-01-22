<?php
    if( !isset( $_SESSION['JWT'] ) ){
        exit();
    }
?>
    <?php //require( $theme_path . 'main' . $_DS . 'onesignal.php' );?>
    <!-- Header  -->
		<nav role="navigation" id="nav-logged-in">
            <div class="nav-wrapper container container-fluid">
				
				<span class="left dt_slide_menu" id="open_slide" onclick="<?php if(!empty($_COOKIE['open_slide']) && $_COOKIE['open_slide'] == 'yes'){ ?>SlideEraseCookie('open_slide')<?php }else{ ?>SlideSetCookie('open_slide','yes',1);<?php } ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 276.167 276.167"> <g fill="currentColor"><path d="M33.144,2.471C15.336,2.471,0.85,16.958,0.85,34.765s14.48,32.293,32.294,32.293s32.294-14.486,32.294-32.293 S50.951,2.471,33.144,2.471z"></path> <path d="M137.663,2.471c-17.807,0-32.294,14.487-32.294,32.294s14.487,32.293,32.294,32.293c17.808,0,32.297-14.486,32.297-32.293 S155.477,2.471,137.663,2.471z"></path> <path d="M243.873,67.059c17.804,0,32.294-14.486,32.294-32.293S261.689,2.471,243.873,2.471s-32.294,14.487-32.294,32.294 S226.068,67.059,243.873,67.059z"></path> <path d="M32.3,170.539c17.807,0,32.297-14.483,32.297-32.293c0-17.811-14.49-32.297-32.297-32.297S0,120.436,0,138.246 C0,156.056,14.493,170.539,32.3,170.539z"></path> <path d="M136.819,170.539c17.804,0,32.294-14.483,32.294-32.293c0-17.811-14.478-32.297-32.294-32.297 c-17.813,0-32.294,14.486-32.294,32.297C104.525,156.056,119.012,170.539,136.819,170.539z"></path> <path d="M243.038,170.539c17.811,0,32.294-14.483,32.294-32.293c0-17.811-14.483-32.297-32.294-32.297 s-32.306,14.486-32.306,32.297C210.732,156.056,225.222,170.539,243.038,170.539z"></path> <path d="M33.039,209.108c-17.807,0-32.3,14.483-32.3,32.294c0,17.804,14.493,32.293,32.3,32.293s32.293-14.482,32.293-32.293 S50.846,209.108,33.039,209.108z"></path> <path d="M137.564,209.108c-17.808,0-32.3,14.483-32.3,32.294c0,17.804,14.487,32.293,32.3,32.293 c17.804,0,32.293-14.482,32.293-32.293S155.368,209.108,137.564,209.108z"></path> <path d="M243.771,209.108c-17.804,0-32.294,14.483-32.294,32.294c0,17.804,14.49,32.293,32.294,32.293 c17.811,0,32.294-14.482,32.294-32.293S261.575,209.108,243.771,209.108z"></path> </g></svg>
				</span>
				
                <div class="left header_logo">
                    <a id="logo-container" href="<?php echo $site_url;?>/<?php if( $profile->verified == 1 ){?>find-matches<?php }?>" class="brand-logo">
                        <img src="<?php echo $config->sitelogo;?>" alt="" data-default="" data-light="">
                    </a>
                </div>
                <?php if( $profile->verified == 1 ){?>
                    <ul class="left header_home_link hide_go_pro_hdr_link">
						<?php if( $config->pro_system == 1 ) { ?>
                            <?php if( $profile->is_pro <> 1 ) { ?>
                                <?php if( isGenderFree($profile->gender) === false ){ ?>
                                    <li><a href="<?php echo $site_url;?>/pro" data-ajax="/pro" class="prem"><span><?php echo __( 'Premium' );?></span></a></li>
                                <?php }?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul class="right">
                        <li class="header_msg">
                            <a href="javascript:void(0);" id="messenger_opener" class="btn-flat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,20H7A2,2 0 0,1 5,18V8.94L2.23,5.64C2.09,5.47 2,5.24 2,5A1,1 0 0,1 3,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20M8.5,7A0.5,0.5 0 0,0 8,7.5V8.5A0.5,0.5 0 0,0 8.5,9H18.5A0.5,0.5 0 0,0 19,8.5V7.5A0.5,0.5 0 0,0 18.5,7H8.5M8.5,11A0.5,0.5 0 0,0 8,11.5V12.5A0.5,0.5 0 0,0 8.5,13H18.5A0.5,0.5 0 0,0 19,12.5V11.5A0.5,0.5 0 0,0 18.5,11H8.5M8.5,15A0.5,0.5 0 0,0 8,15.5V16.5A0.5,0.5 0 0,0 8.5,17H13.5A0.5,0.5 0 0,0 14,16.5V15.5A0.5,0.5 0 0,0 13.5,15H8.5Z" /></svg>
                                <?php
                                    $unread_messages = 0;// Message::getUnreadMessages();
                                    if( $unread_messages > 0 ){
                                        echo '<span class="badge red chat_badge" href="javascript:void(0);" id="messenger_opener">' . $unread_messages . '</span></a>';
                                    }else{
                                        echo '<span class="badge red chat_badge hide" href="javascript:void(0);" id="messenger_opener">0</span></a>';
                                    }
                                ?>
                            </a>
                        </li>
                        <li class="header_notifications">
                            <a href="javascript:void(0);" id="notificationbtn" data-ajax-post="/useractions/shownotifications" data-ajax-params="" data-ajax-callback="callback_show_notifications" data-target="notif_dropdown" class="dropdown-trigger btn-flat">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21" /></svg>
								<span class="badge red notification_badge hide">0</span>
							</a>
                            <ul id="notif_dropdown" class="dropdown-content">
                                <div class="dt_notifis_prnt">
                                    <h5 class="empty_state">
                                        <svg width="140" height="64" viewBox="0 0 140 64" xmlns="http://www.w3.org/2000/svg" fill="#e05cd1" style="width: 90px;"> <path d="M30.262 57.02L7.195 40.723c-5.84-3.976-7.56-12.06-3.842-18.063 3.715-6 11.467-7.65 17.306-3.68l4.52 3.76 2.6-5.274c3.717-6.002 11.47-7.65 17.305-3.68 5.84 3.97 7.56 12.054 3.842 18.062L34.49 56.118c-.897 1.512-2.793 1.915-4.228.9z" fill-opacity=".5"> <animate attributeName="fill-opacity" begin="0s" dur="1.4s" values="0.5;1;0.5" calcMode="linear" repeatCount="indefinite"></animate> </path> <path d="M105.512 56.12l-14.44-24.272c-3.716-6.008-1.996-14.093 3.843-18.062 5.835-3.97 13.588-2.322 17.306 3.68l2.6 5.274 4.52-3.76c5.84-3.97 13.592-2.32 17.307 3.68 3.718 6.003 1.998 14.088-3.842 18.064L109.74 57.02c-1.434 1.014-3.33.61-4.228-.9z" fill-opacity=".5"> <animate attributeName="fill-opacity" begin="0.7s" dur="1.4s" values="0.5;1;0.5" calcMode="linear" repeatCount="indefinite"></animate> </path> <path d="M67.408 57.834l-23.01-24.98c-5.864-6.15-5.864-16.108 0-22.248 5.86-6.14 15.37-6.14 21.234 0L70 16.168l4.368-5.562c5.863-6.14 15.375-6.14 21.235 0 5.863 6.14 5.863 16.098 0 22.247l-23.007 24.98c-1.43 1.556-3.757 1.556-5.188 0z"></path> </svg>
                                    </h5>
                                </div>
                            </ul>
                        </li>
                        <li class="header_user">
                            <a href="javascript:void(0);" data-target="user_dropdown" class="dropdown-trigger btn-flat">
                                <img src="<?php echo $profile->avater->avater;?>" alt="<?php echo $profile->full_name;?>" />
                            </a>
                            <ul id="user_dropdown" class="dropdown-content">
								<div class="home_usr_sct">
									<div>
										<div class="user_popularity_icn" data-value="<?php echo GetUserPopularity($profile->id,true);?>">
											<svg width="90px" height="90px" viewBox="0 0 80 80">
												<path class="load-bg cir1" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"></path>
												<path id="load-line1" class="load-circle" style="stroke-dashoffset: 192.6168975830078px; stroke-dasharray: 192.6168975830078px;stroke:<?php echo GetUserPopularity($profile->id,false,true);?>" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" ></path></svg>
											<a class="avatar" href="<?php echo $site_url;?>/@<?php echo $profile->username;?>" data-ajax="/@<?php echo $profile->username;?>"><img src="<?php echo $profile->avater->avater;?>" class="circle" alt="<?php echo $profile->full_name;?>" /></a>
										</div>
										<span>
											<h3><a href="<?php echo $site_url;?>/@<?php echo $profile->username;?>" data-ajax="/@<?php echo $profile->username;?>"><?php echo $profile->full_name.$profile->pro_icon;?></a></h3>
											<p><a href="<?php echo $site_url;?>/popularity" data-ajax="/popularity"><?php echo __( 'Popularity' );?>: <b><?php echo GetUserPopularity($profile->id);?></b></a></p>
										</span>
									</div>
									<div>
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
												<div class="boosted_message_expire" data-message-expire="<button title='<?php echo __('Boost me!');?>' id='boost_btn' class='btn boost-me'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 493.944 493.944'><path fill='currentColor' d='M367.468,175.996c-3.368-5.469-9.317-8.807-15.734-8.807h-84.958l45.919-143.098  c1.797-5.614,0.816-11.76-2.662-16.521c-3.464-4.748-9.014-7.57-14.9-7.57h-84.446c-8.02,0-15.125,5.18-17.563,12.814  l-68.487,213.465c-1.797,5.613-0.817,11.756,2.663,16.52c3.464,4.748,9.013,7.57,14.899,7.57h14.868h68.183l-22.006,235.037  c-0.352,3.736,2.004,7.185,5.614,8.227c3.593,1.045,7.427-0.608,9.126-3.961L368.19,194.01  C371.093,188.281,370.82,181.467,367.468,175.996z' /></svg></button>">
													<span class="global_boosted_time" data-show="no" data-boosted-time="<?php echo $boost_duration;?>"></span>
													<button title='<?php echo __('Your boost will expire in');?> <?php echo __('minutes');?>' class='btn boost-running'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 493.944 493.944"><path fill="currentColor" d="M367.468,175.996c-3.368-5.469-9.317-8.807-15.734-8.807h-84.958l45.919-143.098  c1.797-5.614,0.816-11.76-2.662-16.521c-3.464-4.748-9.014-7.57-14.9-7.57h-84.446c-8.02,0-15.125,5.18-17.563,12.814  l-68.487,213.465c-1.797,5.613-0.817,11.756,2.663,16.52c3.464,4.748,9.013,7.57,14.899,7.57h14.868h68.183l-22.006,235.037  c-0.352,3.736,2.004,7.185,5.614,8.227c3.593,1.045,7.427-0.608,9.126-3.961L368.19,194.01  C371.093,188.281,370.82,181.467,367.468,175.996z" /></svg></button>
												</div>
											<?php }else if( $profile->is_boosted == '0' || ( $profile->is_boosted == '1' && $boost_duration > $config->boost_expire_time ) ){ ?>
												<button title='<?php echo __('Boost me!');?>' id='boost_btn' class='btn boost-me'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 493.944 493.944"><path fill="currentColor" d="M367.468,175.996c-3.368-5.469-9.317-8.807-15.734-8.807h-84.958l45.919-143.098  c1.797-5.614,0.816-11.76-2.662-16.521c-3.464-4.748-9.014-7.57-14.9-7.57h-84.446c-8.02,0-15.125,5.18-17.563,12.814  l-68.487,213.465c-1.797,5.613-0.817,11.756,2.663,16.52c3.464,4.748,9.013,7.57,14.899,7.57h14.868h68.183l-22.006,235.037  c-0.352,3.736,2.004,7.185,5.614,8.227c3.593,1.045,7.427-0.608,9.126-3.961L368.19,194.01  C371.093,188.281,370.82,181.467,367.468,175.996z" /></svg></button>
											<?php } ?>
										</div>
										<a href="<?php echo $site_url;?>/popularity" data-ajax="/popularity" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg> <?php echo __( 'Increase' );?> <?php echo __( 'Popularity' );?></a>
									</div>
								</div>

								<?php if( $profile->is_pro <> 1 ) { ?>
                                <li class="header_credits_mobi">
                                    <a href="<?php echo $site_url;?>/pro" data-ajax="/pro" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196f3" d="M16,9H19L14,16M10,9H14L12,17M5,9H8L10,16M15,4H17L19,7H16M11,4H13L14,7H10M7,4H9L8,7H5M6,2L2,8L12,22L22,8L18,2H6Z" /></svg> <?php echo __( 'Premium' );?></a>
                                </li>
								<?php } ?>
                                <li class="divider header_credits_mobi" tabindex="-1"></li>
								<?php if ($config->agora_live_video == 1) { ?>
									<li>
										<a href="<?php echo $site_url;?>/live" data-ajax="/live" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff1e1e" d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z"></path></svg> <?php echo __( 'Live' );?></a>
									</li>
								<?php } ?>
                                <li class="header_credits_mobi">
                                    <a href="<?php echo $site_url;?>/likes" data-ajax="/likes" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f25e4e" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" /></svg> <?php echo __( 'Likes' );?></a>
                                </li>
                                <li class="header_credits_mobi">
                                    <a href="<?php echo $site_url;?>/liked" data-ajax="/liked" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8BC34A" d="M15,14C12.3,14 7,15.3 7,18V20H23V18C23,15.3 17.7,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,15L4.4,14.5C2.4,12.6 1,11.4 1,9.9C1,8.7 2,7.7 3.2,7.7C3.9,7.7 4.6,8 5,8.5C5.4,8 6.1,7.7 6.8,7.7C8,7.7 9,8.6 9,9.9C9,11.4 7.6,12.6 5.6,14.5L5,15Z" /></svg> <?php echo __( 'People i liked' );?></a>
                                </li>
                                <li class="header_credits_mobi">
                                    <a href="<?php echo $site_url;?>/disliked" data-ajax="/disliked" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f79f58" d="M19,15H23V3H19M15,3H6C5.17,3 4.46,3.5 4.16,4.22L1.14,11.27C1.05,11.5 1,11.74 1,12V14A2,2 0 0,0 3,16H9.31L8.36,20.57C8.34,20.67 8.33,20.77 8.33,20.88C8.33,21.3 8.5,21.67 8.77,21.94L9.83,23L16.41,16.41C16.78,16.05 17,15.55 17,15V5C17,3.89 16.1,3 15,3Z" /></svg> <?php echo __( 'People i disliked' );?></a>
                                </li>
                                <?php if( $config->connectivitySystem == '1' ){?>
                                <li class="header_credits_mobi">
                                    <a href="<?php echo $site_url;?>/friend-requests" data-ajax="/friend-requests"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8BC34A" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" /></svg> <?php echo __( 'Friend requests' );?></a>
                                </li>
                                <?php } ?>
								<li class="divider" tabindex="-1"></li>
								<li>
                                    <a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" /></svg> <?php echo __( 'Settings' );?></a>
                                </li>
                                <li>
                                    <a href="<?php echo $site_url;?>/transactions" data-ajax="/transactions" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#795548" d="M15,14V11H18V9L22,12.5L18,16V14H15M14,7.7V9H2V7.7L8,4L14,7.7M7,10H9V15H7V10M3,10H5V15H3V10M13,10V12.5L11,14.3V10H13M9.1,16L8.5,16.5L10.2,18H2V16H9.1M17,15V18H14V20L10,16.5L14,13V15H17Z" /></svg> <?php echo __( 'Transactions' );?></a>
                                </li>
                                <?php if( $profile->admin == 1 || $profile->permission !== '' ){ ?>
								<li class="divider" tabindex="-1"></li>
                                <li>
                                    <a href="<?php echo $site_url;?>/admin-cp" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" /></svg> <?php echo __( 'Admin Panel' );?></a>
                                </li>
                                <?php } ?>
                                <li class="divider" tabindex="-1"></li>
                                <li>
									<a href="javascript:void(0);" onclick="logout()" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#F44336" d="M16.56,5.44L15.11,6.89C16.84,7.94 18,9.83 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12C6,9.83 7.16,7.94 8.88,6.88L7.44,5.44C5.36,6.88 4,9.28 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,9.28 18.64,6.88 16.56,5.44M13,3H11V13H13" /></svg> <?php echo __( 'Log Out' );?></a>
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
                    <ul class="right">
                        <li class="header_user">
                            <a href="javascript:void(0);" data-target="user_dropdown" class="dropdown-trigger btn-flat">
                                <img src="<?php echo $profile->avater->avater;?>" alt="<?php echo $profile->full_name;?>" />
                            </a>
                            <ul id="user_dropdown" class="dropdown-content">
                                <li>
                                    <a href="javascript:void(0);" onclick="logout()" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#F44336" d="M16.56,5.44L15.11,6.89C16.84,7.94 18,9.83 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12C6,9.83 7.16,7.94 8.88,6.88L7.44,5.44C5.36,6.88 4,9.28 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,9.28 18.64,6.88 16.56,5.44M13,3H11V13H13" /></svg> <?php echo __( 'Log Out' );?></a>
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
        </nav>
		
		<?php require( $theme_path . 'main' . $_DS . 'sub-header.php' );?>
        <!-- End Header  -->

        <?php require( $theme_path . 'main' . $_DS . 'chat.php' );?>
