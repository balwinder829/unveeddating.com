<div class="container page-margin dt_sections">
    <?php if( $profile->verified == 0 ){?>
		<div class="empty_state">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16,9V7L10,11L4,7V9L10,13L16,9M16,5A2,2 0 0,1 18,7V16A2,2 0 0,1 16,18H4C2.89,18 2,17.1 2,16V7A2,2 0 0,1 4,5H16M20,12V7H22V12H20M20,16V14H22V16H20Z" fill="currentColor"/></svg>
			<?php echo __( 'Please verify your email address' );?>
			<br>
			<a class="btn btn_primary blue-grey darken-1 btn-round logout" onclick="logout()"><?php echo __( 'Log Out' );?></a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $site_url;?>/verifymail" data-ajax="/verifymail" class="btn btn_primary btn-round"><?php echo __( 'Verify Now' );?></a>
        </div>
    <?php } ?>
    <?php if( !empty( $profile->phone_number ) && $profile->phone_verified == 0 ){?>
		<div class="empty_state">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4C3,3.44 3.45,3 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.24 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.58L6.62,10.79M17,12V10H19V12H17M17,8V2H19V8H17Z" fill="currentColor"/></svg>
			<?php echo __( 'Please verify your phone number' );?>
			<br>
			<a class="btn btn_primary blue-grey darken-1 btn-round logout" onclick="logout()"><?php echo __( 'Log Out' );?></a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $site_url;?>/verifyphone" data-ajax="/verifyphone" class="btn btn_primary btn-round"><?php echo __( 'Verify Now' );?></a>
        </div>
    <?php } ?>
</div>