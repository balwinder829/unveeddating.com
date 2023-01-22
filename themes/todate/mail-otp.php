<?php
    $email = '';
    if( route(2) !== '' ){
        $email = strrev( base64_decode( route(2) ) );
    }
    if( $email == '' ){
        echo "<script>window.location = window.site_url + '/forgot';</script>";
    }
?>
<div class="to_auth_page">
	<div class="login_page singl_auth_pg">
		<div class="header_logo">
			<a id="logo-container" href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo.png" /></a>
		</div>
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Password recovery,' );?></h4>
				<p><?php echo __( 'Please enter the verification code sent to your Email' );?></p>
				<form method="POST" action="/Useractions/mailotp" class="register">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="enter_otp_email" style="display: block;margin: -10px auto 40px;border: 0px;">
						<div id="otp_outer" style="margin: 0px;">
							<div id="otp_inner">
								<input id="otp_check_forget_email" name="email_code" type="text" maxlength="4" value="" pattern="\d*" title="Field must be a number." onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required  /><br><br>
								<input type="hidden" name="email" value="<?php echo $email;?>">
								<a href="<?php echo $site_url;?>/forgot" data-ajax="/forgot"><?php echo __( 'Resend' );?></a>
							</div>
						</div>
					</div>
					<div class="dt_login_footer">
						<button class="btn btn-large bold btn_primary" type="submit" name="action"><?php echo __( 'Login' );?></button>
					</div>		
					<div class="clear"></div>
				</form>
			</div>    
		</div>
	</div>
</div>