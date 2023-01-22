<?php global $site_url; ?>
<div class="mtc_usrd_content" data-id="<?php echo $matche->id;?>" <?php if($matche_first === false){?> style="display: none;"<?php }?>>
    <div class="row no_margin r_margin">
        <div class="col <?php if( $mode == 'hot' ){?>s12<?php }else{ ?>s12 m6<?php }?>">
            <div class="mtc_usrd_slider">
				<?php if( $mode == 'hot' ){?>
					<div class="valign-wrapper mtc_usrd_top">
						<div class="mtc_usrd_summary">
							<div class="usr_name">
								<?php
									$_age = getAge($matche->birthday);
									$_location = $matche->country;
								?>
								<a href="<?php echo $site_url;?>/@<?php echo $matche->username;?>" data-ajax="/@<?php echo $matche->username;?>"><?php echo ($matche->first_name !== '' ) ? $matche->first_name . ' ' . $matche->last_name : $matche->username;?></a>
							</div>
							<?php if( !empty($_age) ) {?><span class="usr_age"><?php echo $_age;?></span><?php }?>
							<?php if( !empty($_location) ) {?><span class="usr_location"><?php echo $_location;?></span><?php }?>
							<span class="usr_location"><?php echo $matche->gender;?></span>
						</div>
                        <?php if( Auth()->verified == "1" ) { ?>
						<div class="mtc_usrd_actions">
							<button href="javascript:void(0);" data-userid="<?php echo $matche->id;?>" id="matches_like_btn" data-ajax-post="/useractions/hot" data-source="hot" data-ajax-params="userid=<?php echo $matche->id;?>&username=<?php echo $matche->username;?>&source=hot" data-ajax-callback="callback_hot" class="btn waves-effect like hot">
								<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M17.55,11.2C17.32,10.9 17.05,10.64 16.79,10.38C16.14,9.78 15.39,9.35 14.76,8.72C13.3,7.26 13,4.85 13.91,3C13,3.23 12.16,3.75 11.46,4.32C8.92,6.4 7.92,10.07 9.12,13.22C9.16,13.32 9.2,13.42 9.2,13.55C9.2,13.77 9.05,13.97 8.85,14.05C8.63,14.15 8.39,14.09 8.21,13.93C8.15,13.88 8.11,13.83 8.06,13.76C6.96,12.33 6.78,10.28 7.53,8.64C5.89,10 5,12.3 5.14,14.47C5.18,14.97 5.24,15.47 5.41,15.97C5.55,16.57 5.81,17.17 6.13,17.7C7.17,19.43 9,20.67 10.97,20.92C13.07,21.19 15.32,20.8 16.93,19.32C18.73,17.66 19.38,15 18.43,12.72L18.3,12.46C18.1,12 17.83,11.59 17.5,11.21L17.55,11.2M14.45,17.5C14.17,17.74 13.72,18 13.37,18.1C12.27,18.5 11.17,17.94 10.5,17.28C11.69,17 12.39,16.12 12.59,15.23C12.76,14.43 12.45,13.77 12.32,13C12.2,12.26 12.22,11.63 12.5,10.94C12.67,11.32 12.87,11.7 13.1,12C13.86,13 15.05,13.44 15.3,14.8C15.34,14.94 15.36,15.08 15.36,15.23C15.39,16.05 15.04,16.95 14.44,17.5H14.45Z"></path></svg>
							</button>
							<button href="javascript:void(0);" data-userid="<?php echo $matche->id;?>" id="matches_dislike_btn" data-ajax-post="/useractions/not" data-source="hot" data-ajax-params="userid=<?php echo $matche->id;?>&username=<?php echo $matche->username;?>&source=hot" data-ajax-callback="callback_not" class="btn waves-effect dislike hot">
								<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
							</button>
						</div>
                        <?php } ?>
					</div>
					<div class="valign-wrapper qd_hot_not_media">
					<?php $x = 0;$uname = ''; foreach ($matche->mediafiles as $key => $mfile){ if( $x > 1 ) { continue; } else { $uname = $matche->username;?>
						<a href="<?php echo $mfile['full'];?>" data-id="<?php echo $mfile['id'];?>" data-fancybox class="inline" rel="group-<?php echo $uname;?>">
                            <img alt="<?php echo $matche->username;?>" src="<?php echo $mfile['avater'];?>">
                        </a>
					<?php }$x++;} ?>
					</div>
                    <script>
                    $('a[rel="group-<?php echo $uname;?>"]').fancybox({
                        'transitionIn'      : 'none',
                        'transitionOut'     : 'none',
                        'titlePosition'     : 'over',
                        'cyclic'            : true,
                        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                            return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
                        }
                    });
                    </script>
				<?php }else{ ?>
                <div class="carousel carousel-slider center match_usr_img_slidr">
                    <?php if(count($matche->mediafiles) > 1){?>
                        <span class="changer back" onclick="Previous_Picture();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg></span>
                        <span class="changer next" onclick="Next_Picture();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg></span>
                    <?php }else{
                        //echo '<div class="carousel-item"><img alt="'.$matche->username.'" src="'. GetMedia('',false) . $matche->avater.'"></div>';
                    }?>

                    <?php foreach ($matche->mediafiles as $key => $mfile){?>
                        <div class="carousel-item">
                            <img alt="<?php echo $matche->username;?>" src="<?php echo $mfile['avater'];?>">
                        </div>
                    <?php } ?>
                </div>
				<?php }?>
            </div>
        </div>
		<?php if( $mode == 'hot' ){?>
		<?php }else{ ?>
        <div class="col s12 m6">
            <div class="mtc_usrd_sidebar">
				<div class="mtc_usrd_summary">
					<h5><a href="<?php echo $site_url;?>/@<?php echo $matche->username;?>" data-ajax="/@<?php echo $matche->username;?>"><?php echo ($matche->first_name !== '' ) ? $matche->first_name . ' ' . $matche->last_name : $matche->username;?></a></h5>
						<?php
							$_age = getAge($matche->birthday);
							$_location = $matche->country;
						?>
						<?php if( !empty($_age) ) {?> <span><?php echo $_age;?></span><?php }?>
						<?php if( !empty($_location) ) {?> • <span><?php echo $_location;?></span> <?php }?>
					<?php if( $mode == 'hot' ){ echo '&nbsp;&nbsp;' . $matche->gender; }?>
				</div>
                <div class="sidebar_usr_info">
                    <?php if($matche->language){?>
                        <div>
                            <p class="info_title"><?php echo __('Preferred Language');?></p>
                            <span><?php echo __($matche->language);?></span>
                        </div>
                    <?php }?>
					<?php if($matche->height){?>
						<div>
                            <p class="info_title"><?php echo __('Height');?></p>
                            <span><?php echo $matche->height;?></span>
                        </div>
					<?php }?>
                    <?php if($matche->relationship){?>
                        <div>
                            <p class="info_title"><?php echo __('Relationship status');?></p>
                            <span><?php echo $matche->relationship;?></span>
                        </div>
                    <?php }?>
                    <?php if($matche->body){?>
                        <div>
                            <p class="info_title"><?php echo __('Body Type');?></p>
                            <span><?php echo $matche->body;?></span>
                        </div>
                    <?php }?>
                    <?php if($matche->smoke){?>
                        <div>
                            <p class="info_title"><?php echo __('Smoke');?></p>
                            <span><?php echo $matche->smoke;?></span>
                        </div>
                    <?php }?>
                    <?php if($matche->ethnicity){?>
                        <div>
                            <p class="info_title"><?php echo __('Ethnicity');?></p>
                            <span><?php echo $matche->ethnicity;?></span>
                        </div>
                    <?php }?>
                </div>
                <?php if( Auth()->verified == "1" ) { ?>
				<div class="center mtc_usrd_actions">
					<button href="javascript:void(0);" data-userid="<?php echo $matche->id;?>" id="matches_like_btn" data-ajax-post="/useractions/like" data-ajax-params="userid=<?php echo $matche->id;?>&username=<?php echo $matche->username;?>&source=find-matches" data-ajax-callback="callback_like" class="btn waves-effect like"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path></svg> <?php echo __('Like');?></button>
					<button href="javascript:void(0);" data-userid="<?php echo $matche->id;?>" id="matches_dislike_btn" data-ajax-post="/useractions/dislike" data-source="find-matches" data-ajax-params="userid=<?php echo $matche->id;?>&username=<?php echo $matche->username;?>&source=find-matches" data-ajax-callback="callback_dislike" class="btn waves-effect dislike"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,15H23V3H19M15,3H6C5.17,3 4.46,3.5 4.16,4.22L1.14,11.27C1.05,11.5 1,11.74 1,12V14A2,2 0 0,0 3,16H9.31L8.36,20.57C8.34,20.67 8.33,20.77 8.33,20.88C8.33,21.3 8.5,21.67 8.77,21.94L9.83,23L16.41,16.41C16.78,16.05 17,15.55 17,15V5C17,3.89 16.1,3 15,3Z"></path></svg> <?php echo __('Dislike');?></button>
				</div>
                <?php } ?>
            </div>
        </div>
		<?php }?>
    </div>
</div>