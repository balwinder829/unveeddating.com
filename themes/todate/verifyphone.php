<style>#nav-not-logged-in,.page-footer, footer{display: none !important;visibility: hidden !important;}</style>

<div class="to_auth_page">
	<div class="login_page singl_auth_pg">
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Phone activiation,' );?></h4>
				<p><?php echo __( 'Phone Verification Needed' );?></p>
				<form method="POST" action="/Useractions/verifyphone" class="login">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="to_mat_input">
						<input id="mobile" name="phone" type="tel" class="browser-default" placeholder="<?php echo __( 'Phone' );?>" value="<?php echo (substr($profile->phone_number,1) !== '+') ? '+' . $profile->phone_number : $profile->phone_number;?>" autofocus>
						<label for="mobile"><?php echo __( 'Phone' );?></label>
					</div>
					<input type="hidden" name="mode" value="phone">
					<div class="dt_login_footer">
						<button class="btn btn-large bold btn_primary" type="submit" name="action"><?php echo __( 'Send OTP' );?></button>
					</div>		
					<div class="clear"></div>
				</form>
			</div>    
		</div>
	</div>
</div>