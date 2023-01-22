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
				<h4><?php echo __( 'reset_password' );?></h4>
				<p><?php echo __( 'please enter your new password to proceed.' );?></p>
				<form method="POST" action="Useractions/resetpassword" class="register">
					<input type="hidden" name="email" value="<?php echo $email;?>">
					<input type="hidden" name="email_code" value="<?php if( isset( $_COOKIE['email_code'] ) ) { echo Secure($_COOKIE['email_code']); }?>">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="to_mat_input">
						<input id="password" name="password" type="password" class="browser-default" placeholder="<?php echo __( 'Password' );?>" autofocus>
						<label for="password"><?php echo __( 'Password' );?></label>
					</div>
					<div class="to_mat_input">
						<input id="c_password" name="c_password" type="password" class="browser-default" placeholder="<?php echo __( 'Confirm Password' );?>">
						<label for="c_password"><?php echo __( 'Confirm Password' );?></label>
					</div>
					<div class="forgot_password">
						<a href="<?php echo $site_url;?>/register" data-ajax="/register"><?php echo __( 'Don\'t have an account?' ); ?> <?php echo __( 'Register' );?></a>
					</div>
					<div class="dt_login_footer">
						<button class="btn btn-large bold btn_primary" type="submit" name="action"><?php echo __( 'Reset' );?></button>
					</div>		
					<div class="clear"></div>
				</form>
			</div>    
		</div>
	</div>
</div>

<script>
	var password = document.getElementById("password"), confirm_password = document.getElementById("c_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>     