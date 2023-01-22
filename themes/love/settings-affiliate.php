<?php
if( $config->affiliate_system == '0' ){
    echo '<script>window.location = window.site_url;</script>';
    exit();
}

$admin_mode = false;
// if( $user->admin == '1' || CheckPermission($user->permission, "manage-users") ){
//     $admin_mode = true;
// }

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
                if( $user->admin == '1'  || CheckPermission($user->permission, "manage-users")){
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
							<a href="<?php echo $site_url;?>/my-info/<?php echo $profile->username;?>" data-ajax="/my-info/<?php echo $profile->username;?>" target="_self">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #03a9f4;"><path fill="currentColor" d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"></path></svg> <?php echo __( 'My Information' );?>
							</a>
						</li>
						<?php if( $config->affiliate_system == '1' ){ ?>
							<li>
								<a class="active" href="<?php echo $site_url;?>/settings-affiliate/<?php echo $profile->username;?>" data-ajax="/settings-affiliate/<?php echo $profile->username;?>" target="_self">
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
					<h2 class="dt_sett_wrap_title"><?php echo __( 'My affiliates' );?></h2>
					<div class="dt_usr_affl">
						<h2 class="valign-wrapper">
							<span><?php echo __('My balance');?>: <?php echo $config->currency_symbol;?><?php echo number_format($user->aff_balance, 2);?></span>
							<a class="btn btn-small waves-effect waves-light btn_primary btn_round" href="<?php echo $site_url;?>/settings-payments/<?php echo $user->username;?>" data-ajax="/settings-payments/<?php echo $user->username;?>"><?php echo __('Request withdrawal');?></a>
						</h2>
						<div class="row mb">
							<div class="col s12 l4">
								<img src="<?php echo $theme_url;?>assets/img/affs.svg" alt="<?php echo __( 'My affiliates' );?>">
							</div>
							<div class="col s12 l8">
								<?php if($config->affiliate_type == '0'){?>
									<div class="alert alert-info"><?php echo __('Earn up to');?> <?php echo $config->currency_symbol;?><?php echo $config->amount_ref;?> <?php echo __('for each user your refer to us !');?></div>
								<?php } else if($config->affiliate_type == '1'){?>
									<div class="alert alert-info"><?php echo __('Earn up to');?> <?php echo $config->amount_percent_ref;?>% <?php echo __('for each user your refer to us and bought a pro package / Credit');?></div>
								<?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="col l4 bold"><?php echo __('Your affiliate link is');?></div>
							<div class="col l8">
								<div class="input-field">
									<input type="text" readonly onclick="this.select();" value="<?php echo $site_url;?>/register?ref=<?php echo $user->username;?>">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col l4 bold"><?php echo __('Share to');?></div>
							<div class="col l8">
								<div class="social-btn-parent">
									<a href="https://twitter.com/intent/tweet?text=<?php echo $site_url;?>/register?ref=<?php echo $user->username;?>" target="_blank">
										<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_02.twitter" data-name="02.twitter"><circle id="background" cx="76" cy="76" fill="#00a6de" r="76"></circle><path id="icon" d="m113.85 53a32.09 32.09 0 0 1 -6.51 7.15 2.78 2.78 0 0 0 -1 2.17v.25a45.58 45.58 0 0 1 -2.94 15.86 46.45 46.45 0 0 1 -8.65 14.5 42.73 42.73 0 0 1 -18.75 12.39 46.9 46.9 0 0 1 -14.74 2.29 45 45 0 0 1 -22.6-6.09 1.3 1.3 0 0 1 -.62-1.44 1.25 1.25 0 0 1 1.22-.94h1.9a30.24 30.24 0 0 0 16.94-5.14 16.42 16.42 0 0 1 -13-11.16.86.86 0 0 1 1-1.11 15.08 15.08 0 0 0 2.76.26h.35a16.43 16.43 0 0 1 -9.57-15.11.86.86 0 0 1 1.27-.75 14.44 14.44 0 0 0 3.74 1.45 16.42 16.42 0 0 1 -2.65-19.92.86.86 0 0 1 1.41-.12 42.93 42.93 0 0 0 29.51 15.78h.08a.62.62 0 0 0 .6-.67 17.36 17.36 0 0 1 .38-6 15.91 15.91 0 0 1 10.7-11.44 17.59 17.59 0 0 1 5.19-.8 16.36 16.36 0 0 1 10.84 4.09 2.12 2.12 0 0 0 1.41.54 2.15 2.15 0 0 0 .5-.07 30 30 0 0 0 8-3.31.85.85 0 0 1 1.25 1 16.23 16.23 0 0 1 -4.31 6.87 30.2 30.2 0 0 0 5.24-1.77.86.86 0 0 1 1.05 1.24z" fill="#fff"></path></g></g></svg>
									</a>
									<a rel="publisher" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url;?>/register?ref=<?php echo $user->username;?>" target="_blank">
										<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_01.facebook" data-name="01.facebook"><circle id="background" cx="76" cy="76" fill="#334c8c" r="76"></circle><path id="icon" d="m95.26 68.81-1.26 10.58a2 2 0 0 1 -2 1.78h-11v31.4a1.42 1.42 0 0 1 -1.4 1.43h-11.21a1.42 1.42 0 0 1 -1.4-1.44l.06-31.39h-8.33a2 2 0 0 1 -2-2v-10.58a2 2 0 0 1 2-2h8.28v-10.26c0-11.87 7.06-18.33 17.4-18.33h8.47a2 2 0 0 1 2 2v8.91a2 2 0 0 1 -2 2h-5.19c-5.62.09-6.68 2.78-6.68 6.8v8.85h12.31a2 2 0 0 1 1.95 2.25z" fill="#fff"></path></g></g></svg>
									</a>
									<a href="https://api.whatsapp.com/send?text=<?php echo $site_url;?>/register?ref=<?php echo $user->username;?>" data-action="share/whatsapp/share" target="_blank">
										<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><g id="_08.whatsapp" data-name="08.whatsapp"><circle id="background" cx="76" cy="76" fill="#2aa81a" r="76"></circle><g id="icon" fill="#fff"><path d="m102.81 49.19a37.7 37.7 0 0 0 -60.4 43.62l-4 19.42a1.42 1.42 0 0 0 .23 1.13 1.45 1.45 0 0 0 1.54.6l19-4.51a37.7 37.7 0 0 0 43.6-60.26zm-5.94 47.37a29.56 29.56 0 0 1 -34 5.57l-2.66-1.32-11.67 2.76v-.15l2.46-11.77-1.3-2.56a29.5 29.5 0 0 1 5.43-34.27 29.53 29.53 0 0 1 41.74 0l.13.18a29.52 29.52 0 0 1 -.15 41.58z"></path><path d="m95.84 88c-1.43 2.25-3.7 5-6.53 5.69-5 1.2-12.61 0-22.14-8.81l-.12-.11c-8.29-7.74-10.49-14.19-10-19.3.29-2.91 2.71-5.53 4.75-7.25a2.72 2.72 0 0 1 4.25 1l3.07 6.94a2.7 2.7 0 0 1 -.33 2.76l-1.56 2a2.65 2.65 0 0 0 -.21 2.95 29 29 0 0 0 5.27 5.86 31.17 31.17 0 0 0 7.3 5.23 2.65 2.65 0 0 0 2.89-.61l1.79-1.82a2.71 2.71 0 0 1 2.73-.76l7.3 2.09a2.74 2.74 0 0 1 1.54 4.14z"></path></g></g></g></svg>
									</a>
									<a href="https://pinterest.com/pin/create/button/?url=<?php echo $site_url;?>/register?ref=<?php echo $user->username;?>" target="_blank">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.198 112.198" xml:space="preserve"> <g> <circle style="fill:#CB2027;" cx="56.099" cy="56.1" r="56.098"></circle> <g> <path style="fill:#F1F2F2;" d="M60.627,75.122c-4.241-0.328-6.023-2.431-9.349-4.45c-1.828,9.591-4.062,18.785-10.679,23.588 c-2.045-14.496,2.998-25.384,5.34-36.941c-3.992-6.72,0.48-20.246,8.9-16.913c10.363,4.098-8.972,24.987,4.008,27.596 c13.551,2.724,19.083-23.513,10.679-32.047c-12.142-12.321-35.343-0.28-32.49,17.358c0.695,4.312,5.151,5.621,1.78,11.571 c-7.771-1.721-10.089-7.85-9.791-16.021c0.481-13.375,12.018-22.74,23.59-24.036c14.635-1.638,28.371,5.374,30.267,19.14 C85.015,59.504,76.275,76.33,60.627,75.122L60.627,75.122z"></path> </g> </g></svg>
									</a>
									<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $site_url;?>/register?ref=<?php echo $user->username;?>" target="_blank">
										<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_10.linkedin" data-name="10.linkedin"><circle id="background" cx="76" cy="76" fill="#0b69c7" r="76"></circle><g id="icon" fill="#fff"><path d="m59 48.37a10.38 10.38 0 1 1 -10.37-10.37 10.38 10.38 0 0 1 10.37 10.37z"></path><rect height="50.93" rx="2.57" width="16.06" x="40.6" y="63.07"></rect><path d="m113.75 89.47v22.17a2.36 2.36 0 0 1 -2.36 2.36h-11.72a2.36 2.36 0 0 1 -2.36-2.36v-21.48c0-3.21.93-14-8.38-14-7.22 0-8.69 7.42-9 10.75v24.78a2.36 2.36 0 0 1 -2.34 2.31h-11.34a2.35 2.35 0 0 1 -2.36-2.36v-46.2a2.36 2.36 0 0 1 2.36-2.37h11.34a2.37 2.37 0 0 1 2.41 2.37v4c2.68-4 6.66-7.12 15.13-7.12 18.73-.01 18.62 17.52 18.62 27.15z"></path></g></g></g></svg>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="dt_usr_referres">
						<?php
							$refs = Wo_GetReferrers();
							if (count($refs) > 0) {
								foreach ($refs as $key => $wo['ref']) {
						?>
							<div class="ref" id="<?php echo $wo['ref']['id'];?>">
								<div class="ref-image">
									<img src="<?php echo GetMedia($wo['ref']['avater']);?>" alt="Image">
								</div>
								<div class="name">
									<a href="<?php echo $site_url . '/@' . $wo['ref']['username'];?>" data-ajax="/@<?php echo $wo['ref']['username'];?>"><?php echo $wo['ref']['first_name'] . ' ' . $wo['ref']['last_name'];?><br></a>
									<div class="joined"><?php echo __('joined'); ?>: <?php echo Time_Elapsed_String($wo['ref']['registered']);?></div>
								</div>
								<div class="clear"></div>
							</div>
							<br>
						<?php } } ?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- End Settings  -->