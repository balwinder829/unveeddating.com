<div class="to_auth_page">
	<div class="login_page singl_auth_pg">
		<div class="header_logo">
			<a id="logo-container" href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo.png" /></a>
		</div>
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Password recovery,' );?></h4>
				<p><?php echo __( 'please enter your registered email to proceed.' );?></p>
				<form method="POST" action="/Useractions/forget_password" class="register">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="to_mat_input">
						<input id="email" name="email" type="email" class="browser-default" placeholder="<?php echo __( 'Email' );?>" required autofocus>
						<label for="email"><?php echo __( 'Email' );?></label>
					</div>
					<div class="forgot_password">
						<a href="<?php echo $site_url;?>/login" data-ajax="/login"><?php echo __( 'Already have an account?' ); ?> <?php echo __( 'Login' );?></a>
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