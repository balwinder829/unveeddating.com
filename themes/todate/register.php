<div class="to_auth_page register">

	<div class="login_page">

		<div class="header_logo">

			<a id="logo-container" href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo.png" /></a>

		</div>

		<div class="login-pagez">

			<div class="login-form">

				<h4><?php echo __( 'Get started,' );?></h4>

				<p><?php echo __( 'please signup to continue your account.' );?></p>

				<form method="POST" action="/Useractions/register" class="register">

					<div class="alert alert-success" role="alert" style="display:none;"></div>

					<div class="alert alert-danger" role="alert" style="display:none;"></div>

					<div class="row r_margin mb-0">

						<div class="col s6 xs12">

							<div class="to_mat_input">

								<input name="first_name" id="first_name" type="text" class="browser-default" placeholder="<?php echo __( 'First Name' );?>" required autofocus>

								<label for="first_name"><?php echo __( 'First Name' );?></label>

							</div>

						</div>

						<div class="col s6 xs12">

							<div class="to_mat_input">

								<input name="last_name" id="last_name" type="text" class="browser-default" placeholder="<?php echo __( 'Last Name' );?>">

								<label for="last_name"><?php echo __( 'Last Name' );?></label>

							</div>

						</div>

					</div>

					<div class="to_mat_input">

						<input name="username" id="username" type="text" class="browser-default" placeholder="<?php echo __( 'Username' );?>" required>

						<label for="username"><?php echo __( 'Username' );?></label>

					</div>

					<div class="to_mat_input">

						<input name="email" id="email" type="email" class="browser-default" placeholder="<?php echo __( 'Email' );?>" required>

						<label for="email"><?php echo __( 'Email' );?></label>

					</div>

					<div class="row r_margin mb-0">

						<div class="col s6 xs12">

							<div class="to_mat_input">

								<input name="password" id="password" type="password" class="browser-default" placeholder="<?php echo __( 'Password' );?>" autocomplete="new-password" required>

								<label for="password"><?php echo __( 'Password' );?></label>

							</div>

						</div>

						<div class="col s6 xs12">

							<div class="to_mat_input">

								<input name="c_password" id="c_password" type="password" class="browser-default" placeholder="<?php echo __( 'Confirm Password' );?>" required>

								<label for="c_password"><?php echo __( 'Confirm Password' );?></label>

							</div>

						</div>

					</div>

					<label class="terms_check">

						<input class="filled-in" type="checkbox" onchange="activateButton(this)" />

						<span><?php echo str_replace(array('{terms}','{privacy}'),array('<a href="<?php echo $site_url;?>/terms" data-ajax="/terms">'.__('terms_of_use').'</a>','<a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy">'.__('privacy_policy').'</a>'),__( 'terms_register_text' )) ;?></span>

					</label>

					<div class="dt_login_footer">

						<button class="btn btn-large bold btn_primary" id="sign_submit" type="submit" disabled><?php echo __( 'Register' );?></button>

					</div>		

					<div class="clear"></div>

				</form>

				<p class="to_altr_auth_opt"><?php echo __( 'Already have an account?' ); ?> <a href="<?php echo $site_url;?>/login" data-ajax="/login"><?php echo __( 'Login' );?></a></p>

			</div>    

		</div>

		<svg width="742px" height="135px" viewBox="0 0 742 135" version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,18.1943359 C0,18.1943359 33.731258,1.47290595 88.7734375,0.0931329845 C219.81339,-3.19171847 250.381265,81.3678781 463.388672,103.315789 C574.953531,114.811237 741.039062,66.8974609 741.039062,66.8974609 L741.039062,134 L0,133.714227 L0,18.1943359 Z" id="Rectangle-2" fill="#dcf3dd" opacity="0.53177472" style="mix-blend-mode: multiply;"></path><path d="M0,98.1572266 C0,98.1572266 104.257812,78.1484375 186.296875,78.1484375 C268.335938,78.1484375 310.78125,115.222656 369,104.40625 C534.365804,73.6830944 552.410156,15.5898438 625.519531,7.62890625 C698.628906,-0.33203125 741.039062,42.75 741.039062,42.75 L741.039062,134 L0,134.166016 L0,98.1572266 Z" id="Rectangle-4" fill="#dcf3dd" opacity="0.37004431" style="mix-blend-mode: multiply;"></path> <path d="M0,45 C0,45 62.1359299,107.911868 208.148437,109.703125 C354.160945,111.494382 436.994353,57.1871807 491.703125,51.9257812 C644.628906,37.21875 741.039062,109.703125 741.039062,109.703125 L741.039062,134 L0,134 L0,45 Z" id="Rectangle-5" fill="#dcf3dd" opacity="0.231809701" style="mix-blend-mode: multiply;"></path> <path d="M0.288085938,112.378906 C0.288085938,112.378906 81.0614612,76.8789372 194.78125,75.40625 C308.501039,73.9335628 337.203138,98.34218 458.777344,106.441406 C580.35155,114.540633 741,116.601562 741,116.601562 L741.039062,134 L0,132.889648 L0.288085938,112.378906 Z" id="Rectangle-6" fill="#dcf3dd" opacity="0.209188433" style="mix-blend-mode: multiply;"></path></svg>

	</div>

	<div class="login_aside">

		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2.821 12.794a6.5 6.5 0 0 1 7.413-10.24h-.002L5.99 6.798l1.414 1.414 4.242-4.242a6.5 6.5 0 0 1 9.193 9.192L12 22l-9.192-9.192.013-.014z" fill="currentColor"></path></svg>

		<div class="to_auth_circle-2"></div>

		<div class="to_auth_circle-3"></div>

		<div class="login_aside_innr">

			<h2><?php echo __( 'Already have an account?' ); ?></h2>

			<p><?php echo __( 'Double your chances for a friendship' );?></p>

			<a class="btn" href="<?php echo $site_url;?>/login" data-ajax="/login"><span><?php echo __( 'Login' );?></span></a>

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



function activateButton(element) {

	if(element.checked) {

		document.getElementById("sign_submit").disabled = false;

	}

	else  {

		document.getElementById("sign_submit").disabled = true;

	}

};

</script>