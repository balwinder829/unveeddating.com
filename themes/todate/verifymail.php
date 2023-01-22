<style>#nav-not-logged-in,.page-footer, footer{display: none !important;visibility: hidden !important;}</style>

<div class="to_auth_page">
	<div class="login_page singl_auth_pg">
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Email activiation,' );?></h4>
				<p><?php echo __( 'Email verification needed' );?></p>
				<form method="POST" action="/Useractions/verifymail" class="login">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="to_mat_input">
						<input id="email" name="email" type="email" class="browser-default" placeholder="<?php echo __( 'Email' );?>" value="<?php echo strtolower(auth()->email);?>" autofocus>
						<label for="email"><?php echo __( 'Email' );?></label>
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