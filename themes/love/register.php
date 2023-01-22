<style>body > #container {padding: 0 !important;}#nav-not-logged-in,.page_footer:not(.dt_auth_footr_page){display: none !important;visibility: hidden !important;}</style>
<div class="dt_authpage">
	<div class="login_side">
		<div class="dt_login_con">
			<div class="row dt_login login">
				<form method="POST" action="/Useractions/register" class="register">
					<a id="logo-container" href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $config->sitelogo;?>" /></a>
					<p><span class="bold"><?php echo __( 'Get started,' );?></span> <?php echo __( 'please signup to continue your account.' );?></p>
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="row no_margin r_margin">
						<div class="input-field col m6 s12">
							<input name="first_name" id="first_name" type="text" class="validate" value="" autofocus>
							<label for="first_name"><?php echo __( 'First Name' );?></label>
						</div>
						<div class="input-field col m6 s12">
							<input name="last_name" id="last_name" type="text" class="validate" value="">
							<label for="last_name"><?php echo __( 'Last Name' );?></label>
						</div>
					</div>
					<div class="row no_margin r_margin">
						<div class="input-field col m6 s12">
							<input name="username" id="username" type="text" class="validate" value="" required>
							<label for="username"><?php echo __( 'Username' );?></label>
						</div>
						<div class="input-field col m6 s12">
							<input name="email" id="email" type="email" class="validate" value="" required>
							<label for="email"><?php echo __( 'Email' );?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<input name="password" id="password" type="password" class="validate" value="" required>
							<label for="password"><?php echo __( 'Password' );?></label>
						</div>
						<div class="input-field col m6 s12">
							<input name="c_password" id="c_password" type="password" class="validate" value="" required>
							<label for="c_password"><?php echo __( 'Confirm Password' );?></label>
						</div>
					</div>
					<?php if(!empty($_GET['invite'])){?>
						<div class="form-group"><input type="hidden" name="invite" value="<?php echo Secure($_GET['invite']);?>"></div>
					<?php } ?>
					<label class="terms_check">
						<input class="filled-in" type="checkbox" onchange="activateButton(this)" />
						<span><?php echo str_replace(array('{terms}','{privacy}'),array('<a href="<?php echo $site_url;?>/terms" data-ajax="/terms">'.__('terms_of_use').'</a>','<a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy">'.__('privacy_policy').'</a>'),__( 'terms_register_text' )) ;?></span>
					</label>
					<div class="dt_login_footer valign-wrapper">
						<button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" id="sign_submit" type="submit" disabled><span><?php echo __( 'Register' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
					</div>
					<hr class="border_hr">
					<p class="center"><?php echo __( 'Already have an account?' );?> <a href="<?php echo $site_url;?>/login" data-ajax="/login" class="main"><?php echo __( 'Login' );?></a></p>
				</form>
			</div>
			<footer class="page_footer dt_auth_footr_page">
				<div class="footer-copyright">
					<div class="valign-wrapper">
						<div>
							<ul class="dt_footer_links">
								<li><a href="<?php echo $site_url;?>/blog" data-ajax="/blog"><?php echo __( 'Blog' );?></a></li>
								&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/about" data-ajax="/about"><?php echo __( 'About Us' );?></a></li>
								&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/terms" data-ajax="/terms"><?php echo __( 'Terms' );?></a></li>
								&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/contact" data-ajax="/contact"><?php echo __( 'Contact' );?></a></li>
								&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/faqs" data-ajax="/faqs"><?php echo __( 'faqs' );?></a></li>
								&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/refund" data-ajax="/refund"><?php echo __( 'refund' );?></a></li>
							</ul>
						</div>
						<div>
							<?php require( $theme_path . 'main' . $_DS . 'custom-page.php' );?>
							<span class="dt_foot_langs">
								<a class="dropdown-trigger" href="#" data-target="lang_dropdown_auth"><?php echo __( 'Language' );?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M7,15L12,10L17,15H7Z" /></svg></a>
								<ul id="lang_dropdown_auth" class="dropdown-content">
									<?php
										$language = Dataset::load('language');
										if (isset($language) && !empty($language)) {
											foreach ($language as $key => $val) {
									?>
										<li <?php if( GetActiveLang() == $key ){ echo 'style="background-color: #f1f2f3;"';}?>><a href="?language=<?php echo $key;?>"><?php echo $val;?></a></li>
									<?php } } ?>
								</ul>
							</span>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<svg class="svg_divider" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="none" width="100%" height="100%" version="1.1"><path d="M0,0 L100,0 L100,100 L0,100 C66.6666667,83.3333333 100,66.6666667 100,50 C100,33.3333333 66.6666667,16.6666667 0,0 Z" fill="currentColor"></path></svg>
	</div>
	<div class="slider_side">
		<div class="dt_auth_login_bg_box">
			<h2><?php echo __( 'Meet new and interesting people.' );?></h2>
			<h5><?php echo __( 'Join' );?> <?php echo ucfirst( $config->site_name );?>, <?php echo __( 'where you could meet anyone, anywhere!' );?></h5>
		</div>
		<div class="carousel carousel-slider login-auth center">
			<div class="carousel-item" href="#one!">
				<img src="<?php echo $theme_url;?>assets/img/register.jpg"/>
			</div>
			<div class="carousel-item" href="#two!">
				<img src="<?php echo $theme_url;?>assets/img/login-md.jpg"/>
			</div>
			<div class="carousel-item" href="#three!">
				<img src="<?php echo $theme_url;?>assets/img/login.jpg"/>
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

function activateButton(element) {
	if(element.checked) {
		document.getElementById("sign_submit").disabled = false;
	}
	else  {
		document.getElementById("sign_submit").disabled = true;
	}
};
</script>