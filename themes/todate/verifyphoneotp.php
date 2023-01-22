<style>#nav-not-logged-in,.page-footer, footer{display: none !important;visibility: hidden !important;}</style>

<div class="to_auth_page">
	<div class="login_page singl_auth_pg">
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Phone activiation,' );?></h4>
				<p><?php echo __( 'Please enter the verification code sent to your phone' );?></p>
				<form method="POST" action="/Useractions/verifyphone_otp" class="register">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="enter_otp_email" style="display: block;margin: -30px auto 30px;border: 0px;">
						<div id="otp_outer">
							<div id="otp_inner">
								<input id="otp_check_forget_phone" name="sms_code" type="text" maxlength="4" value="" pattern="\d*" title="Field must be a number." onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required  /><br><br>
								<input type="hidden" name="phone" value="<?php if( isset( $_COOKIE['verify_phone'] ) ) { echo Secure($_COOKIE['verify_phone']); }?>">
								<a href="javascript:void(0);" data-ajax="/verifyphone"><?php echo __( 'Resend' );?></a>
							</div>
						</div>
					</div>
					<div class="dt_login_footer">
						<button class="btn btn-large bold btn_primary" type="submit" name="action"><?php echo __( 'Proceed' );?></button>
					</div>		
					<div class="clear"></div>
				</form>
			</div>    
		</div>
	</div>
</div>