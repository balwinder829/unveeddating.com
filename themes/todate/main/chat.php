<?php
    $OnlineUsers = 0;
?>
<input type="hidden" id="time" name="time" value="0">
<input type="hidden" id="last_decline_message" name="last_decline_message" value="">
<input type="hidden" id="timestamp" name="timestamp" value="0">
<input type="hidden" id="rts_vsdhjh98" name="rts_vsdhjh98" value="0">
<input type="hidden" id="vxd" name="vx" value="">
<input type="hidden" id="dfgetevxd" name="vbnrx" value="">
<!-- Messages  -->
<div id="message_box" class="hide dt_msg_box open_list">
    <div class="modal-content">
        <div class="msg_list"> <!-- Message List  -->
            <div class="msg_header valign-wrapper">
                <h2><?php echo __( 'Messenger' );?></h2>
                <div class="msg_toolbar">
					<button type="button" class="dropdown-trigger chat_stts_dropd btn btn-flat close" class="btn btn-flat close" data-target="cht_opts_dropdown"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26"><path d="M5.334 4.545a9.99 9.99 0 0 1 3.542-2.048A3.993 3.993 0 0 0 12 3.999a3.993 3.993 0 0 0 3.124-1.502 9.99 9.99 0 0 1 3.542 2.048 3.993 3.993 0 0 0 .262 3.454 3.993 3.993 0 0 0 2.863 1.955 10.043 10.043 0 0 1 0 4.09c-1.16.178-2.23.86-2.863 1.955a3.993 3.993 0 0 0-.262 3.455 9.99 9.99 0 0 1-3.542 2.047A3.993 3.993 0 0 0 12 20a3.993 3.993 0 0 0-3.124 1.502 9.99 9.99 0 0 1-3.542-2.047 3.993 3.993 0 0 0-.262-3.455 3.993 3.993 0 0 0-2.863-1.954 10.043 10.043 0 0 1 0-4.091 3.993 3.993 0 0 0 2.863-1.955 3.993 3.993 0 0 0 .262-3.454zM13.5 14.597a3 3 0 1 0-3-5.196 3 3 0 0 0 3 5.196z" fill="currentColor"/></svg></button>
					<ul id="cht_opts_dropdown" class="dropdown-content">
						<div class="chat_change_online" id="chat_go_online">
							<li>
								<label>
									<input type="radio" class="browser-default" name="chatPrivacy" checked>
									<p><svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24"><path fill="#CDCDCD" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo __( 'Offline' );?></p>
								</label>
							</li>
							<li>
								<label>
									<input type="radio" class="browser-default" name="chatPrivacy" <?php if( $profile->online == 1 ){ echo 'checked'; }?>>
									<p><svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24"><path fill="#60d465" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo __( 'Online' );?></p>
								</label>
							</li>
						</div>
						<hr>
						<li><a onclick="remove_conversationlist_active();" data-ajax-post="/chat/mark_all_messages_as_read" data-ajax-params=""><?php echo __( 'Mark all as read' );?></a></li>
					</ul>
                    <button type="button" class="btn btn-flat close modal-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
                    </button>
                </div>
            </div>
            <div class="msg_container">
                <div class="m_search">
                    <div class="search_input">
                        <input type="search" class="browser-default" id="chat_search" name="search" placeholder="<?php echo __( 'Search for Chats' );?>" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z" /></svg>
                    </div>
					<div class="dt_srch_msg_progress hide" id="search-loader">
						<div class="progress">
							<div class="indeterminate"></div>
						</div>
					</div>
                    <!--<div class="chat_filter switch">
                        <label>
                            <?php echo __( 'All' );?>
                            <input type="checkbox" id="chat_search_online">
                            <span class="lever"></span>
                            <?php echo __( 'Online' );?>
                        </label>
                    </div>-->
                </div>
				
                <div class="m_body">
                    <div class="m_body_content">
						<?php if($config->message_request_system == 'on'){ ?>
							<button type="button" class="btn btn-flat msg_requests" data-ajax-post="/chat/get_messages_requests" data-ajax-params="" data-accepted="requests" data-ajax-callback="callback_msg_request" data-text-msg-request='<span class="active"><?php echo __( 'All conversations' );?></span><span><b id="requests_count"></b> <?php echo __( 'Message requests' );?></span>' data-text-all-conversation='<span><?php echo __( 'All conversations' );?></span><span class="active"><b id="requests_count"></b> <?php echo __( 'Message requests' );?></span>'>
								<span class="active"><?php echo __( 'All conversations' );?></span>
								<span><b id="requests_count"></b> <?php echo __( 'Message requests' );?></span>
							</button>
						<?php }?>
                        <ul class="m_conversation" id="m_conversation_search"></ul>
                        <ul class="m_conversation" id="m_conversation"></ul>
                    </div>
                </div>
            </div>
        </div> <!-- End Message List  -->

        <div class="msg_chat"> <!-- Message Chat  -->
            <div class="chat_conversations">
                <div class="chat_header valign-wrapper">
                    <div class="chat_navigation">
                        <button type="button" class="btn btn-flat back" id="navigateBack">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg>
                        </button>
                    </div>
                    <div class="chat_participant">
                        <div class="c_avatar">
                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" alt="User">
                        </div>
                        <div class="c_name">
                            <a href="" target="_blank" id="chatfromuser"><span class="name"></span></a>
                            <span class="time ajax-time last_seen" title=""></span>
                        </div>
                    </div>
                    <div class="chat_toolbar">
						<div>
						<button type="button" class="dropdown-trigger btn chat_useropts_dropd btn-flat close" data-target="cht_more_opts_dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" /></svg></button>
						<ul id="cht_more_opts_dropdown" class="dropdown-content">
                            <?php
                                $video_link = false;
                                $audio_link = false;

                                //$config->pro_system            ( 0,1 ) -> check if Pro system enabled
                                //$config->avcall_pro            ( 0,1 ) -> check if Video & Audio Call for pro users only
                                //$config->video_chat            ( 0,1 ) -> check if Video Call enabled
                                //$config->audio_chat            ( 0,1 ) -> check if Audio Call enabled
                                //$profile->is_pro
                                if ((int)$config->twilio_chat_call == 1 || (int)$config->agora_chat_call == 1) {
                                    if ((int)$config->pro_system == 1) {
                                        // pro system enabled
                                        if ((int)$config->avcall_pro == 1) {
                                            // Video & Audio Call for pro users only enabled
                                            if( $profile->is_pro == 1 ) {
                                                // if user is pro
                                                if ((int)$config->video_chat == 1) {
                                                    //Video Call enabled
                                                    $video_link = true;
                                                }
                                                if ((int)$config->audio_chat == 1) {
                                                    //Audio Call enabled
                                                    $audio_link = true;
                                                }
                                            }
                                        }else{
                                            // Video & Audio Call for pro users only disabled
                                            if ((int)$config->video_chat == 1) {
                                                //Video Call enabled
                                                $video_link = true;
                                            }
                                            if ((int)$config->audio_chat == 1) {
                                                //Audio Call enabled
                                                $audio_link = true;
                                            }
                                        }
                                    }else{
                                        // pro system disabled
                                        if ((int)$config->video_chat == 1) {
                                            //Video Call enabled
                                            $video_link = true;
                                        }
                                        if ((int)$config->audio_chat == 1) {
                                            //Audio Call enabled
                                            $audio_link = true;
                                        }
                                    }
                                }
                            ?>
							<?php if ($audio_link == true) { ?>
                                <li><a href="javascript:void(0);" onclick="Wo_GenerateVoiceCall(<?php echo auth()->id;?>)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z"></path></svg> <?php echo __('Audio call');?></a></li>
                            <?php } ?>
                            <?php if ($video_link == true) { ?>
                                <li><a href="javascript:void(0);" onclick="Wo_GenerateVideoCall(<?php echo auth()->id;?>)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 9.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4.2zm0 3.159l4 2.8V8.84l-4 2.8v.718zM3 6v12h12V6H3zm2 2h2v2H5V8z"></path></svg> <?php echo __('Video call');?></a></li>
                            <?php } ?>
							<li><a href="javascript:void(0);" id="deletechatconversations"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"></path></svg> <?php echo __('Delete chat');?></a></li>
						</ul>
						</div>
                        <button type="button" class="btn btn-flat close modal-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
                        </button>
                    </div>
                </div>

                <a href="javascript:void(0);" id="btn_load_prev_chat_message" data-lang-nomore="<?php echo __('No more messages to show.');?>" class="btn dt_chat_lod_more hide"><?php echo __('Load more...');?></a>

                <div class="chat_container">
                    <div class="chat_body">
                        <div class="chat_body_content"></div>
                    </div>
                    <div class="chat_foot">
                        <div class="chat_f_text">
                            <div class="hide dt_acc_dec_msg" id="chat_request_btns">
                                <button type="button" data-route1="<?php echo '@'.$profile->username;?>" data-route2="chat_request" id="btn_chat_accept_message" class="btn btn-flat acc_msg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> <?php echo __('Accept');?>
                                </button>
                                <button type="button" data-route1="<?php echo '@'.$profile->username;?>" data-route2="chat_request" id="btn_chat_decline_message" class="btn btn-flat dec_msg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg> <?php echo __('Decline');?>
                                </button>
                            </div>
							<div class="chat_message_upload_media_imgprogress hide">
								<div class="progress">
									<div class="chat_message_upload_media_imgdeterminate determinate" style="width: 0%;"></div>
								</div>
							</div>
							<div class="chat_message_any_media_progress hide">
								<div class="progress">
									<div class="indeterminate"></div>
								</div>
							</div>
                            <form method="POST" action="/chat/send_message" class="valign-wrapper" id="chat_message_form">
                                <input type="hidden" name="to" value="" id="to_message"/>
                                <div class="chat_f_textarea">
                                    <div class="chat_f_write">
                                        <textarea placeholder="<?php echo __('Type a message');?>" id="dt_emoji" name="text" class="hide"></textarea>
                                    </div>
                                    <div class="chat_f_attach">
										<span id="chat_message_gify">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" height="24" viewBox="-53 0 511 512"><path d="m315.386719 379v32h48c11.046875 0 20 8.953125 20 20s-8.953125 20-20 20h-48v41c0 11.046875-8.953125 20-20 20-11.042969 0-20-8.953125-20-20v-113c0-27.570312 22.429687-50 50-50h38c11.046875 0 20 8.953125 20 20s-8.953125 20-20 20h-38c-5.511719 0-10 4.484375-10 10zm73.429687-283.859375-77.570312-77.566406c-11.332032-11.332031-26.398438-17.574219-42.425782-17.574219h-188.320312c-44.113281 0-80 35.886719-80 80v190c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-190c0-22.054688 17.945312-40 40-40h188.320312c5.339844 0 10.363282 2.082031 14.140626 5.859375l77.570312 77.566406c3.777344 3.777344 5.855469 8.800781 5.855469 14.140625v132.433594c0 11.046875 8.957031 20 20 20 11.046875 0 20-8.953125 20-20v-132.433594c0-16.023437-6.238281-31.089844-17.570313-42.425781zm-253.429687 316.859375h-35c-11.042969 0-20 8.953125-20 20s8.957031 20 20 20h13.984375c-4.535156 11.992188-16.21875 20-29.984375 20-17.644531 0-32-14.355469-32-32v-38c0-17.644531 14.355469-32 32-32 11.265625 0 21.5 5.757812 27.367187 15.398438 5.742188 9.4375 18.046875 12.429687 27.484375 6.683593 9.433594-5.742187 12.425781-18.046875 6.683594-27.480469-13.1875-21.667968-36.191406-34.601562-61.535156-34.601562-39.699219 0-72 32.300781-72 72v38c0 39.699219 32.300781 72 72 72 16.722656 0 32.96875-5.683594 45.75-16 12.824219-10.355469 21.65625-24.953125 24.867187-41.097656.253906-1.285156.382813-2.59375.382813-3.902344v-19c0-11.046875-8.953125-20-20-20zm80-83c-11.042969 0-20 8.953125-20 20v143c0 11.046875 8.957031 20 20 20 11.046875 0 20-8.953125 20-20v-143c0-11.046875-8.953125-20-20-20zm0 0"/></svg>
										</span>
										<span id="chat_message_upload_stiker">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.796,9.982C20.849,5.357,16.729,2,12,2C6.486,2,2,6.486,2,12c0,4.729,3.357,8.849,7.982,9.796	c0.067,0.014,0.135,0.021,0.201,0.021c0.263,0,0.518-0.104,0.707-0.293l10.633-10.633C21.761,10.653,21.863,10.313,21.796,9.982z M11,18c0-0.545,0.055-1.088,0.162-1.612c0.105-0.515,0.263-1.02,0.466-1.5c0.201-0.476,0.45-0.934,0.737-1.359	c0.29-0.428,0.619-0.826,0.978-1.186c0.359-0.358,0.758-0.688,1.184-0.977c0.428-0.288,0.886-0.537,1.36-0.738	c0.481-0.203,0.986-0.36,1.501-0.466c0.704-0.145,1.442-0.183,2.17-0.134l-8.529,8.529C11.016,18.372,11,18.187,11,18z M4,12	c0-4.411,3.589-8,8-8c2.909,0,5.528,1.589,6.929,4.005c-0.655,0.004-1.31,0.068-1.943,0.198c-0.643,0.132-1.274,0.328-1.879,0.583	c-0.594,0.252-1.164,0.563-1.699,0.923c-0.533,0.361-1.03,0.771-1.479,1.22s-0.858,0.945-1.221,1.48	c-0.359,0.533-0.67,1.104-0.922,1.698c-0.255,0.604-0.451,1.235-0.583,1.878C9.068,16.643,9,17.32,9,18	c0,0.491,0.048,0.979,0.119,1.461C6.089,18.288,4,15.336,4,12z" /></svg>
										</span>
										<span id="chat_message_upload_media" style="cursor: pointer;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M5 11.1l2-2 5.5 5.5 3.5-3.5 3 3V5H5v6.1zm0 2.829V19h3.1l2.986-2.985L7 11.929l-2 2zM10.929 19H19v-2.071l-3-3L10.929 19zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm11.5 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" fill="currentColor"/></svg>
										</span>
                                    </div>
                                </div>
                                <input type="file" id="chat_message_upload_media_file" class="hide" accept="image/x-png, image/gif, image/jpeg" name="avatar">
                                <div class="chat_f_send">
                                    <button type="button" id="btn_chat_f_send" class="btn-floating btn-large waves-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2,21L23,12L2,3V10L17,12L2,14V21Z" /></svg></button>
                                </div>
                            </form>
							<!-- Stickers -->
							<div id="stiker_box" class="hide">
								<div class="modal-content">
									<h5><?php echo __('Stickers');?></h5>
									<div class="stiker_imgprogress hide">
										<div class="progress"><div class="stiker_imgdeterminate determinate" style="width: 0%"></div></div>
									</div>
									<div id="stikerlist"></div>
								</div>
							</div>
							<!-- Gifybox -->
							<div id="gify_box" class="hide">
								<div class="modal-content">
									<h5><?php echo __('Send Gif');?>
										<div>
											<input type="text" id="gify_search" name="gify_search" placeholder="<?php echo __('Search GIFs');?>">
											<button type="button" id="reload_gifs" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="19" height="19"><path d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" fill="currentColor"/></svg></button>
										</div>
									</h5>
									<div class="stiker_imgprogress hide">
										<div class="progress"><div class="stiker_imgdeterminate determinate" style="width: 0%"></div></div>
									</div>
									<div id="gifylist"></div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Message Chat  -->
    </div>
</div>
<!-- End Messages  -->