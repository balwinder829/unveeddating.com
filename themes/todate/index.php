<?php


if(!isset($_SESSION['jwt'])){	
	?>
	<script>
		//window.location = window.site_url + '/login';
	</script>
	<?php 
}
?>

<nav role="navigation" class="to_index_nav">

	<div class="nav-wrapper container to_index_cont">

		<div class="left header_logo">

			<a href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo-light.png" /></a>

		</div>

		<ul class="right">

			<li class="hide_mobi_login"><a href="<?php echo $site_url;?>/login" data-ajax="/login" class="btn-flat white-text qdt_hdr_auth_btns"><?php echo __( 'Login' );?></a></li>

			<li class="hide_mobi_login"><a href="<?php echo $site_url;?>/register" data-ajax="/register" class="btn-flat btn btn_primary white-text qdt_hdr_auth_btns"><?php echo __( 'Register' );?></a></li>

			<div class="header_user show_mobi_login to_no_usr_hdr_menu">

				<a class="dropdown-trigger" href="#" data-target="log_in_dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-4.987-3.744A7.966 7.966 0 0 0 12 20c1.97 0 3.773-.712 5.167-1.892A6.979 6.979 0 0 0 12.16 16a6.981 6.981 0 0 0-5.147 2.256zM5.616 16.82A8.975 8.975 0 0 1 12.16 14a8.972 8.972 0 0 1 6.362 2.634 8 8 0 1 0-12.906.187zM12 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" /></svg></a>

				<ul id="log_in_dropdown" class="dropdown-content">

					<li><a href="<?php echo $site_url;?>/login" data-ajax="/login"><?php echo __( 'Login' );?></a></li>

					<li><a href="<?php echo $site_url;?>/register" data-ajax="/register"><?php echo __( 'Register' );?></a></li>

				</ul>

			</div>

		</ul>

	</div>

</nav>

	

<div class="to_main_hero">

	<div class="container to_index_cont">

		<div class="valign-wrapper to_main_hero_innr">

			<div class="to_main_hero_text">

				<h1><?php echo __( 'Meet new and interesting people.' );?></h1>

				<p><?php echo __( 'Join' );?> <?php echo ucfirst( $config->site_name );?>, <?php echo __( 'where you could meet anyone, anywhere!' );?></p>

				<a href="<?php echo $site_url;?>/register" class="btn btn_primary bold btn_round"><?php echo __( 'Get Started' );?></a>

			</div>

		</div>

	</div>

</div>



<div class="bg_white">

<div class="container to_index_cont">

	<div class="valign-wrapper to_main_hero_filter_prnt">

		<div class="to_main_hero_filters">

			<div class="to_main_hero_filters_innrlist">

				<p><?php echo __( 'I am a' );?></p>

				<div>

					<div class="row">

						<div class="input-field col s12">

							<select class="browser-default">

								<?php

									$all_gender = array();

									$gender = Dataset::load('gender');

									$iz = 0;

									if (isset($gender) && !empty($gender)) {

										foreach ($gender as $key => $val) {

											$_checked = '';

											if($iz === 1){

												$_checked = 'selected';

											}

											echo '<option value="' . $key . '" '.$_checked.'>' . $val . '</option>';

											$iz++;

										}

									}

								?>

							</select>

						</div>

					</div>

				</div>

			</div>

			<div class="to_main_hero_filters_innrlist">

				<p><?php echo __( 'I\'m looking for a' );?></p>

				<div>

					<div class="row">

						<div class="input-field col s12">

							<select class="browser-default">

								<?php

									$all_gender = array();

									$gender = Dataset::load('gender');

									$ix = 0;

									if (isset($gender) && !empty($gender)) {

										foreach ($gender as $key => $val) {

											$_checked = '';

											if($ix === 0){

												$_checked = 'selected';

											}

											echo '<option value="' . $key . '" '.$_checked.'>' . $val . '</option>';

											$ix++;

										}

									}

								?>

							</select>

						</div>

					</div>

				</div>

			</div>

			<div class="to_main_hero_filters_innrlist">

				<p><?php echo __( 'Ages' );?></p>

				<div>

					<div class="row">

						<div class="input-field col s6">

							<select class="_age_from browser-default">

								<?php for($i = 18 ; $i < 51 ; $i++ ){?>

									<option value="<?php echo $i;?>" <?php if( $i == 20){ echo 'selected';}?> ><?php echo $i;?></option>

								<?php }?>

							</select>

						</div>

						<div class="input-field col s6">

							<select class="_age_to browser-default">

								<?php for($i = 51 ; $i < 99 ; $i++ ){?>

									<option value="<?php echo $i;?>" <?php if( $i == 55){ echo 'selected';}?>><?php echo $i;?></option>

								<?php }?>

							</select>

						</div>

					</div>

				</div>

			</div>

			<a href="<?php echo $site_url;?>/login" class="btn btn_primary btn-large bold"><span><?php echo __( 'Let\'s Begin' );?></span></a>

		</div>

	</div>

</div>

</div>



<div class="section bg_white to_index_ftrs_prnt">

	<div class="container to_index_cont">

		<div class="valign-wrapper row">

			<div class="col l6">

				<img src="<?php echo $theme_url;?>assets/img/how/match.svg" alt="<?php echo __( 'Best Match' );?>" class="to_index_ftrs_img">

			</div>

			<div class="col l6">

				<div class="to_index_ftrs">

					<p><?php echo __( 'Best Match' );?></p>

					<h2><?php echo __( 'Based on your location, we find best and suitable matches for you.' );?></h2>

				</div>

			</div>

		</div>

	</div>

	<div class="container to_index_cont to_index_ftr_row">

		<div class="valign-wrapper row">

			<div class="col l6">

				<img src="<?php echo $theme_url;?>assets/img/how/secure.svg" alt="<?php echo __( 'Fully Secure' );?>" class="to_index_ftrs_img">

			</div>

			<div class="col l6">

				<div class="to_index_ftrs">

					<p><?php echo __( 'Fully Secure' );?></p>

					<h2><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'Your account is Safe on {0}. We never share your data with third party.' ) );?></h2>

				</div>

			</div>

		</div>

	</div>

	<div class="container to_index_cont">

		<div class="valign-wrapper row">

			<div class="col l6">

				<img src="<?php echo $theme_url;?>assets/img/how/privacy.svg" alt="<?php echo __( '100% Privacy' );?>" class="to_index_ftrs_img">

			</div>

			<div class="col l6">

				<div class="to_index_ftrs">

					<p><?php echo __( '100% Privacy' );?></p>

					<h2><?php echo __( 'You have full control over your personal information that you share.' );?></h2>

				</div>

			</div>

		</div>

	</div>

</div>



<?php

	$stories = GetStories();

	if( !empty($stories) ){

?>

	<div class="to_index_story">

		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="top-l"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z" fill="currentColor"/></svg>

		<div class="container to_index_cont">

			<div class="dt_test_title">

				<h3 class="center-align"><?php echo __( 'Success Stories' );?></h3>

			</div>

			<div class="dt_tstm_usr">

				<div class="carousel carousel-slider">

					<?php foreach ($stories as $key => $story){ ?>

						<div class="carousel-item valign-wrapper" href="#one!">

							<div class="dt_testimonial_slide">

								<div class="slide_head">

									<img src="<?php echo $story['user1Data']->avater->avater;?>" alt="<?php echo $story['user1Data']->full_name;?>" class="circle" />

								</div>

								<h5><?php echo $story['quote'];?></h5>

								<p><?php echo substr( strip_tags (br2nl( html_entity_decode( $story['description'] )) ) , 0 , 250);?>...</p>

							</div>

						</div>

					<?php } ?>

  				</div>

				<div class="to_index_story_shdw"></div>

			</div>

		</div>

		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="bottom-r"><path d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.457 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621-.537.278-1.24.375-1.929.311-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.099.49 2.748 1.179zm-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.457 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621-.537.278-1.24.375-1.929.311C4.591 12.322 3.17 10.841 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.099.49 2.748 1.179z" fill="currentColor"/></svg>

	</div>

<?php } ?>



<div class="bg_white to_index_how">

	<div class="container to_index_cont">

		<div class="dt_how_work" id="how_it_work">

			<h3 class="center-align"><?php echo __( 'How' );?> <?php echo ucfirst( $config->site_name );?> <?php echo __( 'Works' );?> </h3>

			<div class="row">

				<div class="col s12 m12 l4">

					<div class="icon-block center">

						<span class="green-text text-lighten-1">

							<svg class="dt_how_work_svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"><g transform="translate(300,300)"><path d="M151.5,-172.7C196.3,-143,232.6,-95.2,216.3,-57.4C200,-19.6,131.2,8.2,94,37.1C56.8,66,51.3,95.9,30,120C8.7,144.1,-28.5,162.3,-66.7,158.9C-105,155.6,-144.3,130.8,-163.4,95.4C-182.5,60.1,-181.3,14.1,-176.6,-34.3C-171.8,-82.7,-163.3,-133.7,-133.3,-166C-103.3,-198.4,-51.6,-212.2,0.9,-213.2C53.4,-214.2,106.7,-202.5,151.5,-172.7Z" fill="currentColor" /></g></svg>

							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5S4.5 6.557 4.5 8.552zM19 8L17 8 17 11 14 11 14 13 17 13 17 16 19 16 19 13 22 13 22 11 19 11zM4 19h8 1 1v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h1H4z"/></svg>

						</span>

						<h5 class="bold"><?php echo __( 'Create Account' );?><div class="bg_number">1</div></h5>

						<p><?php echo __( 'Register for free & create up your good looking Profile.' );?></p>

					</div>

				</div>

				<div class="col s12 m12 l4">

					<div class="icon-block center">

						<span class="purple-text text-darken-2">

							<svg class="dt_how_work_svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"><g transform="translate(300,300)"><path d="M151.5,-172.7C196.3,-143,232.6,-95.2,216.3,-57.4C200,-19.6,131.2,8.2,94,37.1C56.8,66,51.3,95.9,30,120C8.7,144.1,-28.5,162.3,-66.7,158.9C-105,155.6,-144.3,130.8,-163.4,95.4C-182.5,60.1,-181.3,14.1,-176.6,-34.3C-171.8,-82.7,-163.3,-133.7,-133.3,-166C-103.3,-198.4,-51.6,-212.2,0.9,-213.2C53.4,-214.2,106.7,-202.5,151.5,-172.7Z" fill="currentColor" /></g></svg>

							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.47,4.35L20.13,3.79V12.82L22.56,6.96C22.97,5.94 22.5,4.77 21.47,4.35M1.97,8.05L6.93,20C7.24,20.77 7.97,21.24 8.74,21.26C9,21.26 9.27,21.21 9.53,21.1L16.9,18.05C17.65,17.74 18.11,17 18.13,16.26C18.14,16 18.09,15.71 18,15.45L13,3.5C12.71,2.73 11.97,2.26 11.19,2.25C10.93,2.25 10.67,2.31 10.42,2.4L3.06,5.45C2.04,5.87 1.55,7.04 1.97,8.05M18.12,4.25A2,2 0 0,0 16.12,2.25H14.67L18.12,10.59"/></svg>

						</span>

						<h5 class="bold"><?php echo __( 'Find Matches' );?><div class="bg_number">2</div></h5>

						<p><?php echo __( 'Search & Connect with Matches which are perfect for you.' );?></p>

					</div>

				</div>

				<div class="col s12 m12 l4">

					<div class="icon-block center">

						<span class="pink-text text-lighten-1">

							<svg class="dt_how_work_svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"><g transform="translate(300,300)"><path d="M151.5,-172.7C196.3,-143,232.6,-95.2,216.3,-57.4C200,-19.6,131.2,8.2,94,37.1C56.8,66,51.3,95.9,30,120C8.7,144.1,-28.5,162.3,-66.7,158.9C-105,155.6,-144.3,130.8,-163.4,95.4C-182.5,60.1,-181.3,14.1,-176.6,-34.3C-171.8,-82.7,-163.3,-133.7,-133.3,-166C-103.3,-198.4,-51.6,-212.2,0.9,-213.2C53.4,-214.2,106.7,-202.5,151.5,-172.7Z" fill="currentColor" /></g></svg>

							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="currentColor"/></svg>

						</span>

						<h5 class="bold"><?php echo __( 'Start Dating' );?><div class="bg_number">3</div></h5>

						<p><?php echo __( 'Start doing conversations and date your best match.' );?></p>

					</div>

				</div>

			</div>

		</div>

	</div>

	

	<?php if( $config->show_user_on_homepage == '1'){

		$siteUsers = GetSiteUsers();

		if( !empty($siteUsers) ){

	?>

		<div class="container to_index_cont">

			<div class="center-align to_latest_users">

				<h4><?php echo __( 'Latest Users' );?></h4>

				<div class="center">

					<?php foreach ($siteUsers as $key => $user){ ?>

						<a class="circle xuser" href="<?php echo $site_url;?>/@<?php echo $user->username;?>" data-ajax="/@<?php echo $user->username;?>">

							<img src="<?php echo $user->avater->avater;?>" alt="<?php echo $user->full_name;?>" class="circle">

						</a>

					<?php } ?>

				</div>

			</div>

		</div>

	<?php }} ?>

	

	<svg width="742px" height="135px" viewBox="0 0 742 135" version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,18.1943359 C0,18.1943359 33.731258,1.47290595 88.7734375,0.0931329845 C219.81339,-3.19171847 250.381265,81.3678781 463.388672,103.315789 C574.953531,114.811237 741.039062,66.8974609 741.039062,66.8974609 L741.039062,134 L0,133.714227 L0,18.1943359 Z" id="Rectangle-2" fill="#ffe9ef" opacity="0.53177472" style="mix-blend-mode: multiply;"></path><path d="M0,98.1572266 C0,98.1572266 104.257812,78.1484375 186.296875,78.1484375 C268.335938,78.1484375 310.78125,115.222656 369,104.40625 C534.365804,73.6830944 552.410156,15.5898438 625.519531,7.62890625 C698.628906,-0.33203125 741.039062,42.75 741.039062,42.75 L741.039062,134 L0,134.166016 L0,98.1572266 Z" id="Rectangle-4" fill="#ffe9ef" opacity="0.37004431" style="mix-blend-mode: multiply;"></path> <path d="M0,45 C0,45 62.1359299,107.911868 208.148437,109.703125 C354.160945,111.494382 436.994353,57.1871807 491.703125,51.9257812 C644.628906,37.21875 741.039062,109.703125 741.039062,109.703125 L741.039062,134 L0,134 L0,45 Z" id="Rectangle-5" fill="#ffe9ef" opacity="0.231809701" style="mix-blend-mode: multiply;"></path> <path d="M0.288085938,112.378906 C0.288085938,112.378906 81.0614612,76.8789372 194.78125,75.40625 C308.501039,73.9335628 337.203138,98.34218 458.777344,106.441406 C580.35155,114.540633 741,116.601562 741,116.601562 L741.039062,134 L0,132.889648 L0.288085938,112.378906 Z" id="Rectangle-6" fill="#ffe9ef" opacity="0.209188433" style="mix-blend-mode: multiply;"></path></svg>

</div>



<div class="to_index_start">

	<div class="container to_index_cont">

		<div class="section">

			<div class="center-align dt_get_start">

				<h4><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'Connect with your perfect Soulmate here, on {0}.' ) );?></h4>

				<a href="<?php echo $site_url;?>/register" class="btn btn_primary btn-large bold"><?php echo __( 'Get Started' );?></a>

			</div>

		</div>

	</div>

	<footer id="footer" class="page_footer to_index_foot">

		<div class="footer-copyright">

			<div class="container to_index_cont valign-wrapper">

				<span><?php echo __( 'Copyright' );?> © <?php echo date( "Y" ) . " " . ucfirst( $config->site_name );?>. <?php echo __( 'All rights reserved' );?>.</span>

				<span class="dt_fotr_spn">

					<ul class="dt_footer_links">

						<li><a href="<?php echo $site_url;?>/about" data-ajax="/about"><?php echo __( 'About Us' );?></a></li>

						&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/terms" data-ajax="/terms"><?php echo __( 'Terms' );?></a></li>

						&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy"><?php echo __( 'Privacy Policy' );?></a></li>

						&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/contact" data-ajax="/contact"><?php echo __( 'Contact' );?></a></li>

					</ul>

					<?php require( $theme_path . 'main' . $_DS . 'custom-page.php' );?>

					<?php require( $theme_path . 'main' . $_DS . 'language.php' );?>

				</span>

			</div>

		</div>

	</footer>

</div>