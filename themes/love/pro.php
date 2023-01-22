<?php require( $theme_path . 'main' . $_DS . 'mini-sidebar.php' );?>

<?php if( $profile->is_pro == 1 ){?><script>window.location = window.site_url;</script><?php } ?>
<?php if( $config->pro_system == 0 ){?><script>window.location = window.site_url;</script><?php } ?>
<?php if( isGenderFree($profile->gender) === true ){?><script>window.location = window.site_url;</script><?php } ?>
<!-- Premium  -->
<div class="container page-margin find_matches_cont">
	<div class="row r_margin">
		<div class="col l3">
			<?php require( $theme_path . 'main' . $_DS . 'sidebar.php' );?>
		</div>
		
		<div class="col l9">
			<?php if (file_exists($theme_path . 'third-party-payment.php')) { ?>
				<?php require( $theme_path . 'third-party-payment.php' );?>
			<?php } ?>
			<div class="dt_premium dt_sections dt_pro_pg">
				<div class="dt_p_head">
					<div class="dt_get_start_circle-1"></div>
					<div class="dt_get_start_circle-2"></div>
					<div class="dt_get_start_circle-3"></div>
					<svg enable-background="new 0 0 128 128" height="512" viewBox="0 0 128 128" width="512" xmlns="http://www.w3.org/2000/svg"><g fill="#fd852b"><path d="m89.8 25.1c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c.1 1.4-1 2.4-2.4 2.4z"/><path d="m89.8 34.1c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c.1 1.4-1 2.4-2.4 2.4z"/><path d="m85.3 29.6c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c0 1.4-1 2.4-2.4 2.4z"/><path d="m94.3 29.6c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c.1 1.4-1 2.4-2.4 2.4z"/><path d="m22 103.1c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c0 1.4-1.1 2.4-2.4 2.4z"/><path d="m22 112.1c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c0 1.4-1.1 2.4-2.4 2.4z"/><path d="m17.5 107.6c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c0 1.4-1.1 2.4-2.4 2.4z"/><path d="m26.5 107.6c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4c0 1.4-1.1 2.4-2.4 2.4z"/></g><path d="m37.8 15.5h6.5v6.5h-6.5z" fill="#fd748c" transform="matrix(.707 -.707 .707 .707 -1.241 34.522)"/><path d="m101 106h6.5v6.5h-6.5z" fill="#fd748c" transform="matrix(.707 -.707 .707 .707 -46.717 105.699)"/><ellipse cx="64" cy="67.1" fill="#fc6928" rx="39.3" ry="16.4"/><path d="m110.7 44.2-8.7 39.3-1.6 7.4c0 3.8-16.3 6.9-36.4 6.9s-36.4-3.1-36.4-6.9l-1.6-7.4-8.7-39.3 30.2 18.5 16.5-26.1 16.5 26.1z" fill="#f9d12f"/><path d="m60.6 66.5h6.7v6.7h-6.7z" fill="#2ec3fc" transform="matrix(.707 -.707 .707 .707 -30.662 65.72)"/><path d="m102 83.5-1.6 7.4c0 3.8-16.3 6.9-36.4 6.9s-36.4-3.1-36.4-6.9l-1.6-7.4c7 2.6 21.4 4.4 38 4.4s31-1.8 38-4.4z" fill="#fd852b"/><circle cx="110.7" cy="44.6" fill="#fd852b" r="7.8"/><circle cx="64" cy="36.7" fill="#fc6928" r="7.8"/><circle cx="17.3" cy="44.6" fill="#fc6928" r="7.8"/><path d="m64 65.1v4.8h4.8z" fill="#1ba4fc"/><path d="m59.2 69.9h4.8v4.7z" fill="#1ba4fc"/></svg>
					<h2 class="light gold-text"><?php echo __( 'Amazing' );?> <?php echo ucfirst( $config->site_name );?> <?php echo __( 'features you can’t live without' );?>.</h2>
					<p class="bold"><?php echo __( 'Activating Premium will help you meet more people, faster.' );?></p>
				</div>
				<div class="dt_pro_features">
					<h2><?php echo __( 'Why Choose Premium Membership' );?></h2>
					<div class="row">
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#fff9dd"></path></g><g id="bold"><path d="m16 8h-.007c-.01 0-.019.005-.029.006-.052.002-.102.012-.15.03-.007.003-.014.004-.02.007-.057.024-.111.055-.157.099l-7.487 7.334c-.112.11-.163.264-.145.415-.001.036-.005.07-.005.109 0 4.411 3.589 8 8 8s8-3.589 8-8-3.589-8-8-8zm-6.097 7.16 5.382-5.272c-.65 2.62-2.747 4.674-5.382 5.272zm6.394 4.484c-.111.195-.34.294-.557.239l-2.02-.505 1.08 1.081c.195.195.195.512 0 .707-.098.098-.226.146-.354.146s-.256-.049-.354-.146l-2.357-2.357c-.159-.159-.192-.404-.082-.6.111-.196.338-.297.557-.239l2.02.505-1.08-1.081c-.195-.195-.195-.512 0-.707s.512-.195.707 0l2.357 2.357c.16.159.194.405.083.6zm2.276-2.25-1.414 1.414c-.098.098-.226.146-.354.146s-.256-.049-.354-.146l-2.357-2.357c-.094-.094-.146-.221-.146-.354s.053-.26.146-.354l1.414-1.414c.195-.195.512-.195.707 0s.195.512 0 .707l-1.061 1.061.472.471 1.061-1.061c.195-.195.512-.195.707 0s.195.512 0 .707l-1.061 1.061.471.471 1.061-1.061c.195-.195.512-.195.707 0 .196.197.196.514.001.709zm2.387-2.391c-.142.171-.377.227-.581.14l-.501-.215.215.501c.087.204.03.44-.14.581-.092.077-.206.116-.32.116-.096 0-.193-.028-.277-.084l-2.828-1.885c-.23-.153-.292-.464-.139-.693.153-.23.464-.292.693-.139l1.429.952-.045-.104c-.08-.188-.038-.406.106-.551.145-.145.363-.188.55-.106l.104.045-.953-1.43c-.153-.23-.091-.54.139-.693.229-.153.54-.092.693.139l1.885 2.829c.125.184.112.427-.03.597z" fill="#ffd200"></path></g></svg>
								<p><?php echo __( 'See more stickers on chat' );?></p>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#ffe6e2"/></g><g id="bold"><path d="m17.469 24.009c-.083 0-.166-.021-.242-.062l-3.184-1.76-3.184 1.76c-.168.093-.374.081-.53-.029-.157-.11-.236-.3-.205-.489l.614-3.762-2.595-2.66c-.131-.134-.176-.33-.117-.508.06-.178.214-.307.399-.335l3.567-.545 1.6-3.408c.082-.175.259-.287.452-.287.194 0 .37.112.452.287l1.6 3.408 3.567.545c.185.028.339.158.399.335.059.178.014.374-.117.508l-2.595 2.66.614 3.762c.031.189-.049.379-.205.489-.088.06-.188.091-.29.091z" fill="#fc573b"/><g><path d="m23.71 12.62c-.188-.088-.41-.049-.558.095-.541.527-1.795.667-2.631.684.449-1.286 2.191-3.376 3.336-4.54.141-.144.183-.358.105-.544s-.26-.307-.461-.307c-4.907 0-7.2 1.378-8.236 2.432.09-.574.41-.898.428-.917.149-.141.197-.359.12-.55-.076-.189-.26-.313-.464-.313-.001 0-.003 0-.004 0-.113.001-2.802.043-4.587 1.815-1.611 1.598-1.294 3.829-1.153 4.494l1.71-.261 1.373-2.925c.246-.524.779-.862 1.358-.862s1.112.339 1.358.863l1.373 2.925 3.039.465c.558.085 1.017.471 1.196 1.006.179.537.045 1.12-.349 1.524l-2.243 2.299.072.444c1.128-.291 1.9-.692 1.953-.72 3.174-1.411 3.542-6.407 3.557-6.62.011-.207-.104-.401-.292-.487z" fill="#fd907e"/></g></g></svg>
								<p><?php echo __( 'Show in Premium bar' );?></p>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#f5e6fe"/><path d="m22.667 15.255c-.368 0-.667-.299-.667-.667 0-1.87-.728-3.628-2.05-4.95-.26-.26-.26-.682 0-.943s.682-.26.943 0c1.574 1.574 2.441 3.667 2.441 5.893-.001.368-.299.667-.667.667z" fill="#d9a4fc"/><path d="m9.333 15.255c-.368 0-.667-.299-.667-.667 0-2.226.867-4.319 2.441-5.893.26-.26.682-.26.943 0s.26.682 0 .943c-1.322 1.322-2.05 3.08-2.05 4.95 0 .368-.299.667-.667.667z" fill="#d9a4fc"/><path d="m22.253 19.275c-1.008-.852-1.586-2.098-1.586-3.417v-1.858c0-2.346-1.743-4.288-4-4.613v-.72c0-.369-.299-.667-.667-.667s-.667.298-.667.667v.72c-2.258.325-4 2.267-4 4.613v1.859c0 1.319-.578 2.564-1.592 3.422-.259.222-.408.545-.408.886 0 .643.523 1.167 1.167 1.167h11c.643 0 1.167-.523 1.167-1.167 0-.341-.149-.664-.414-.892z" fill="#be63f9"/><path d="m16 24c1.207 0 2.217-.86 2.449-2h-4.899c.233 1.14 1.243 2 2.45 2z" fill="#d9a4fc"/></svg>
								<p><?php echo __( 'See likes notifications' );?></p>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#f5e6fe"/></g><g id="solid"><g><path d="m23.229 16.391c-.113-.248-.113-.534 0-.782l.596-1.312c.222-.489.232-1.053.026-1.549-.205-.496-.611-.888-1.114-1.077l-1.35-.507c-.256-.096-.457-.297-.553-.553l-.507-1.349c-.188-.503-.581-.909-1.077-1.114s-1.061-.196-1.549.026l-1.313.596c-.249.113-.534.112-.782 0l-1.312-.596c-.489-.222-1.053-.231-1.549-.026s-.888.611-1.077 1.114l-.507 1.35c-.096.256-.297.457-.553.553l-1.349.507c-.503.188-.909.581-1.114 1.077s-.196 1.061.026 1.549l.596 1.313c.113.248.113.534 0 .782l-.596 1.312c-.222.489-.232 1.053-.026 1.549.205.496.611.888 1.114 1.077l1.35.507c.256.096.457.297.553.553l.507 1.349c.188.503.581.909 1.077 1.114.238.098.491.147.744.147.275 0 .55-.058.805-.174l1.313-.596c.249-.113.533-.113.782 0l1.312.596c.489.222 1.053.232 1.549.026.496-.205.888-.611 1.077-1.114l.507-1.35c.096-.256.297-.457.553-.553l1.349-.507c.503-.188.909-.581 1.114-1.077s.196-1.061-.026-1.549zm-7.482-.891h.507c.779 0 1.413.634 1.413 1.413 0 .701-.505 1.277-1.167 1.395v.525c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-.5h-.667c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h1.42c.228 0 .413-.186.413-.413 0-.234-.186-.42-.413-.42h-.507c-.779 0-1.413-.634-1.413-1.413 0-.701.505-1.277 1.167-1.395v-.525c0-.276.224-.5.5-.5s.5.224.5.5v.5h.667c.276 0 .5.224.5.5s-.224.5-.5.5h-1.42c-.228 0-.413.186-.413.413-.001.234.185.42.413.42z" fill="#be63f9"/></g></g></svg>
								<p><?php echo __( 'Get discount when buy boost me' );?></p>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#e3f8fa"></path></g><path d="m20.406 17.342h-8.811c-.324 0-.602-.233-.657-.553l-.928-5.342c-.043-.247.055-.497.254-.647.2-.151.466-.177.691-.069l2.451 1.181 2.012-3.577c.236-.42.926-.42 1.161 0l2.012 3.577 2.451-1.181c.225-.108.491-.082.691.069.199.151.298.401.255.647l-.928 5.342c-.053.319-.33.553-.654.553z" fill="#26c6da"></path><path d="m20.473 21.248c-.22-.113-.487-.1-.687.047-.233.16-.307.14-.36.093l-.553-.681c-.367-.447-.947-.694-1.54-.694-.313 0-.633.067-.927.214-.147.067-.333.067-.48 0-.293-.147-.613-.214-.927-.214-.593 0-1.173.247-1.54.694l-.553.681c-.053.047-.127.067-.36-.093-.2-.14-.467-.16-.687-.047-.22.114-.36.341-.36.594 0 1.202 1.127 2.177 2.513 2.177.813 0 1.573-.26 2.153-.735.573.474 1.34.735 2.153.735 1.387 0 2.513-.975 2.513-2.177.002-.254-.138-.481-.358-.594z" fill="#8ce1eb"></path></svg>
								<p><?php echo __( 'Display first in find matches' );?></p>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#fff9dd"></path><path d="m23.766 17.709-2.58-6.859c0-.001-.001-.003-.001-.004l-.001-.001c-.34-.904-1.218-1.512-2.184-1.512s-1.844.607-2.185 1.513c-.098.263-.148.539-.148.821v3h-1.333v-3c0-1.286-1.047-2.333-2.333-2.333-.966 0-1.844.607-2.185 1.513 0 .001-.001.003-.001.004l-2.579 6.858v.001c-.157.412-.236.846-.236 1.29 0 2.022 1.645 3.667 3.667 3.667s3.667-1.645 3.667-3.667v-.333h1.333v.333c0 2.022 1.645 3.667 3.667 3.667s3.666-1.645 3.666-3.667c0-.444-.079-.878-.234-1.291zm-12.099 3.624c-1.286 0-2.333-1.047-2.333-2.333 0-.283.05-.559.148-.821.34-.904 1.218-1.512 2.185-1.512 1.286 0 2.333 1.047 2.333 2.333s-1.047 2.333-2.333 2.333zm8.666 0c-1.286 0-2.333-1.047-2.333-2.333s1.047-2.333 2.333-2.333c.967 0 1.844.608 2.185 1.512.098.262.148.538.148.821.001 1.286-1.046 2.333-2.333 2.333z" fill="#ffd200"></path></svg>
								<p><?php echo __( 'Display on top in random users' );?></p>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="valign-wrapper featrr">
								<svg enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#ffe6e2"/><path d="m20.667 15.333c-1.838 0-3.333 1.514-3.333 3.375 0 2.568 2.885 5.066 3.008 5.172.186.16.464.16.65 0 .123-.105 3.008-2.603 3.008-5.172 0-1.861-1.495-3.375-3.333-3.375zm0 4.667c-.735 0-1.333-.598-1.333-1.333s.598-1.333 1.333-1.333 1.333.598 1.333 1.333-.598 1.333-1.333 1.333z" fill="#fd907e"/><path d="m14.667 8c-3.674 0-6.667 2.993-6.667 6.667s2.993 6.667 6.667 6.667c.653 0 1.287-.093 1.88-.273-1.021-2.292-.52-4.354.86-5.713-.024 0-.343-.137-.367-.147-2.611-.994-5.053 2.15-2.86 4.767-1.727-.16-3.22-1.14-4.073-2.553.923-.218 1.595-1.04 1.607-2.013.015-.615.43-1.037.947-1.153 2.302-.493 2.52-3.356 1.633-4.893.614-.034 1.132-.017 1.867.2-.185 1.862.822 4.119 3.047 3.907l.633-.073c.053.22.087.44.107.673.419-.072.951-.086 1.36-.007-.315-3.389-3.175-6.056-6.641-6.056z" fill="#fc573b"/></svg>
								<p><?php echo __( 'Find potential matches by country' );?></p>
							</div>
						</div>
						<?php if($config->video_chat == 1 && $config->audio_chat == 1){ ?>
							<div class="col s12 m12 l6">
								<div class="valign-wrapper featrr">
									<svg enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#e3f8fa"/><path d="m16 8c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm4.667 11.611c0 .295-.119.568-.337.769-.2.185-.464.286-.737.286-.028 0-.056-.001-.085-.003-4.345-.337-7.858-3.848-8.172-8.169-.021-.297.081-.592.282-.81.2-.216.473-.337.768-.339l1.742-.013c.491 0 .913.329 1.032.799l.364 1.444c.104.414-.05.847-.393 1.103l-.543.404c.551.942 1.349 1.743 2.296 2.307l.423-.56c.257-.34.69-.492 1.103-.39l1.455.361c.473.118.804.539.804 1.025v1.786z" fill="#26c6da"/></svg>
									<p><?php echo __( 'Video and Audio calls to all users' );?></p>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<hr class="border_hr">
				<div class="row dt_prem_row">
					<div class="dt_choose_pro">
						<h2><?php echo __( 'Choose a Plan' );?></h2>
						<p>
							<label>
								<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Weekly' );?>" data-price="<?php echo (float)$config->weekly_pro_plan;?>"/>
								<span class="pln_name">
									<span class="duration"><?php echo __( 'Weekly' );?></span>
									<span class="price"><?php echo $config->currency_symbol . (float)$config->weekly_pro_plan;?></span>
								</span>
							</label>
						</p>
						<p>
							<label>
								<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Monthly' );?>" data-price="<?php echo (float)$config->monthly_pro_plan;?>" checked />
								<span class="pln_name">
									<span class="pln_popular"><span><?php echo __( 'Most popular' );?></span><span class="pln_popular_tail"></span></span>
									<span class="duration"><?php echo __( 'Monthly' );?></span>
									<span class="price"><?php echo $config->currency_symbol . (float)$config->monthly_pro_plan;?></span>
								</span>
							</label>
						</p>
						<p>
							<label>
								<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Yearly' );?>" data-price="<?php echo (float)$config->yearly_pro_plan;?>"/>
								<span class="pln_name">
									<span class="duration"><?php echo __( 'Yearly' );?></span>
									<span class="price"><?php echo $config->currency_symbol . (float)$config->yearly_pro_plan;?></span>
								</span>
							</label>
						</p>
						<p>
							<label>
								<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Lifetime' );?>" data-price="<?php echo (float)$config->lifetime_pro_plan;?>"/>
								<span class="pln_name">
									<span class="duration"><?php echo __( 'Lifetime' );?></span>
									<span class="price"><?php echo $config->currency_symbol . (float)$config->lifetime_pro_plan;?></span>
								</span>
							</label>
						</p>
						<div class="pay_using center">
							<p class="bold"><?php echo __( 'Pay Using' );?></p>
							<?php
								$method_type = 'pro';
								require( $theme_path . 'partails' . $_DS . 'modals'. $_DS .'payment_methods.php' );?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Premium  -->
<a href="javascript:void(0);" id="btnProSuccess" style="visibility: hidden;display: none;"></a>



<script>
	<?php if ($config->fluttewave_payment == 1) { ?>
		function open_fluttewave() {
			$('#fluttewave_modal').modal('open');
		}
		function SignatureFluttewave() {
			$('#fluttewave_btn').attr('disabled', true).text("<?php echo __('please_wait')?>");
			email = $('#fluttewave_email').val();
		    $.post(window.ajax + 'fluttewave/pay', {amount:getPrice(),email:email}, function(data) {
		    	$('#fluttewave_btn').html("<?php echo(__('pay')) ?>");
			    $('#fluttewave_btn').removeAttr('disabled');
		        if (data.status == 200) {
		            window.location.href = data.url;
		        } else {
		         	$('#fluttewave_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
					setTimeout(function () {
						$('#fluttewave_alert').html("");
					},3000);
		        }
		    });
		}
	<?php } ?>
	<?php if ($config->ngenius_payment == '1') { ?>
		function pay_using_ngenius() {
			$.post(window.ajax + 'ngenius/get_pro',{price:getPrice()}, function (data) {
		        if (data.status == 200) {
		        	location.href = data.url;
		        }
		    }).fail(function(data) {
	    		M.toast({html: data.responseJSON.message});
			});
		}
	<?php } ?>
	<?php if ($config->razorpay_payment == '1' && !empty($config->razorpay_key_id)) { ?>
		function pay_using_razorpay() {
			$("#razorpay_alert").html('');
			$('#razorpay_modal').modal('open');
		}
		function SignatureRazorpay() {
			$('#razorpay_btn').html("<?php echo __('please_wait');?>");
			$('#razorpay_btn').attr('disabled','true');
		    var merchant_order_id = "<?php echo(round(111111,9999999)) ?>";
		    var card_holder_name_id = $('#razorpay_name').val();
		    var email = $('#razorpay_email').val();
		    var phone = $('#razorpay_phone').val();
		    var currency_code_id = "INR";

		    if (!email || !phone || !card_holder_name_id) {
		    	$('#razorpay_alert').html("<div class='alert alert-danger'><?php echo(__('please check your details')) ?></div>");
				setTimeout(function () {
					$('#razorpay_alert').html("");
				},3000);
				$('#razorpay_btn').html("<?php echo __('pay');?>");
				$('#razorpay_btn').removeAttr('disabled');
				return false;
		    }


		    price = getPrice() * 100;
		    
		    var razorpay_options = {
		        key: "<?php echo $config->razorpay_key_id; ?>",
		        amount: price,
		        name: "<?php echo $config->site_name; ?>",
		        description: getDescription(),
		        image: "<?php echo $config->sitelogo;?>",
		        netbanking: true,
		        currency: currency_code_id,
		        prefill: {
		            name: card_holder_name_id,
		            email: email,
		            contact: phone
		        },
		        notes: {
		            soolegal_order_id: merchant_order_id,
		        },
		        handler: function (transaction) {
		            jQuery.ajax({
		                url: window.ajax + 'razorpay/create_pro',
		                type: 'post',
		                data: {payment_id: transaction.razorpay_payment_id, order_id: merchant_order_id, card_holder_name_id: card_holder_name_id,  merchant_amount: price, currency: currency_code_id}, 
		                dataType: 'json',
		                success: function (data) {
		                	if (data.status == 200) {
		                		<?php if (!empty($_COOKIE['redirect_page'])) { 
		                			$redirect_page = preg_replace('/on[^<>=]+=[^<>]*/m', '', $_COOKIE['redirect_page']);
							        $redirect_page = preg_replace('/\((.*?)\)/m', '', $redirect_page);
		                			?>
		                			window.location = "<?php echo($redirect_page); ?>";
		                		<?php }else{ ?>
			                		window.location = data.url;
		                	    <?php } ?>
		                	}
		                	else{
		                		if (data.url != '') {
		                			window.location = data.url;
		                		}
		                		else{
		                			$('#razorpay_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
									setTimeout(function () {
										$('#razorpay_alert').html("");
									},3000);
									$('#razorpay_btn').html("<?php echo __('pay');?>");
									$('#razorpay_btn').removeAttr('disabled');

		                		}
		                	}
		                }
		            });
		        },
		        "modal": {
		            "ondismiss": function () {
		                // code here
		            }
		        }
		    };
		    // obj        
		    var objrzpv1 = new Razorpay(razorpay_options);
		    objrzpv1.open();
		    e.preventDefault();
		}
	<?php } ?>
	<?php if ($config->coinbase_payment == '1' && !empty($config->coinbase_key)) { ?>
		function pay_using_coinbase() {
		    $.post(window.ajax + 'coinbase/create_pro',{price:getPrice(),description:getDescription()}, function (data) {
		        if (data.status == 200) {
		            window.location.href = data.url;
		        }
		    }).fail(function(data) {
	    		M.toast({html: data.responseJSON.message});
			});
		}
	<?php } ?>
	<?php if ($config->aamarpay_payment == '1') { ?>
		function pay_using_aamarpay() {
			$('#aamarpay_modal').modal('open');
		}
		function AamarpayRequest() {
			$('#aamarpay_button').html("<?php echo __('please_wait');?>");
			$('#aamarpay_button').attr('disabled','true');
			$.post(window.ajax + 'aamarpay/get_pro',{price:getPrice(),name:$('#aamarpay_name').val(),email:$('#aamarpay_email').val(),phone:$('#aamarpay_number').val()}, function (data) {
				$('#aamarpay_button').removeAttr('disabled');
		        $('#aamarpay_button').text("<?php echo __('Pay');?>");
		        if (data.status == 200) {
		        	location.href = data.url;
		        }
		    }).fail(function(data) {
		    	$('#aamarpay_button').removeAttr('disabled');
		        $('#aamarpay_button').text("<?php echo __('Pay');?>");
	    		M.toast({html: data.responseJSON.message});
			});
			
		}
	<?php } ?>
	<?php if ($config->coinpayments == '1') { ?>
		function pay_using_coinpayments() {
			$.post(window.ajax + 'coinpayments/get?pay_type=pro',{price:getPrice()}, function (data) {
		        if (data.status == 200) {
		        	location.href = data.url;
		        }
		    }).fail(function(data) {
	    		M.toast({html: data.responseJSON.message});
			});
		}
	<?php } ?>
	<?php if ($config->fortumo_payment == '1') { ?>
		function pay_using_fortumo() {
			$.post(window.ajax + 'fortumo/get?pay_type=pro', function (data) {
		        if (data.status == 200) {
		        	location.href = data.url;
		        }
		    }).fail(function(data) {
	    		M.toast({html: data.responseJSON.message});
			});
		}
	<?php } ?>
	<?php if ($config->yoomoney_payment == '1') { ?>
		function pay_using_yoomoney() {
			$.post(window.ajax + 'yoomoney/go_pro', {
	            payType: 'membership',
	            description: getDescription(),
	            price: getPrice()
	        }, function (data) {
	            if (data.status == 200) {
		        	$('body').append(data.html);
					document.getElementById("yoomoney_form").submit();
					$("#yoomoney_form").remove();
		        }
	        });
		}
	<?php } ?>
	<?php if ($config->bank_payment == '1') { ?>
	document.getElementById('bank_transfer').addEventListener('click', function(e) {
        $('#bank_transfer_price').text('<?php echo $config->currency_symbol;?>' + getPrice());
        $('#bank_transfer_description').text(getDescription());
        $('#receipt_img_path').html('');
        $('#receipt_img_preview').attr('src', '');
		$('.bank_transfer_modal').removeClass('up_rec_img_ready, up_rec_active');
        $('.bank_transfer_modal').modal('open');
    });

    document.getElementById('receipt_img').addEventListener('change', function(e) {
        let imgPath = $(this)[0].files[0].name;
        if (typeof(FileReader) != "undefined") {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#receipt_img_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $('#receipt_img_path').html(imgPath);
		$('.bank_transfer_modal').addClass('up_rec_img_ready');
        $('#btn-upload-receipt').removeAttr('disabled');
        $('#btn-upload-receipt').removeClass('btn-flat').addClass('btn-success');
    });

    document.getElementById('btn-upload-receipt').addEventListener('click', function(e) {
        e.preventDefault();
        let bar = $('#img_upload_progress');
        let percent = $('#img_upload_progress_bar');

        let formData = new FormData();
        formData.append("description", getDescription());
        formData.append("price", getPrice());
        formData.append("mode", 'membership');
        formData.append("receipt_img", $("#receipt_img")[0].files[0], $("#receipt_img")[0].files[0].value);
        bar.removeClass('hide');
        $.ajax({
            xhr: function() {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        let percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        //status.html( percentComplete + "%");
                        percent.width(percentComplete + '%');
                        percent.html(percentComplete + '%');
                        if (percentComplete === 100) {
                            bar.addClass('hide');
                            percent.width('0%');
                            percent.html('0%');
                        }
                    }
                }, false);
                return xhr;
            },
            url: window.ajax + 'profile/upload_receipt',
            type: "POST",
            async: true,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 60000,
            dataType: false,
            data: formData,
            success: function(result) {
                if( result.status == 200 ){
                    $('.bank_transfer_modal').modal('close');
                    M.toast({html: '<?php echo __('Your receipt uploaded successfully.');?>'});
                    return false;
                }
            }
        });
    });


    <?php } ?>
	<?php if ($config->stripe_payment == '1') { ?>
	document.getElementById('stripe_credit').addEventListener('click', function(e) {

        $.post(window.ajax + 'stripe/createsession', {
            payType: 'membership',
            description: getDescription(),
            price: getPrice()
        }, function (data) {
            if (data.status == 200) {
                stripe.redirectToCheckout({ sessionId: data.session_id });
            } else {
               // $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> <?php echo __('Payment declined');?> ');
            }
        });

    });
    <?php } ?>
	<?php if ($config->paypal_payment == '1') { ?>
	document.getElementById('paypal').addEventListener('click', function(e) {
        $.post(window.ajax + 'paypal/generate_link', {description:getDescription(), amount:getPrice(), mode: "premium-membarship"}, function (data) {
            if (data.status == 200) {
                window.location.href = data.location;
            } else {
                $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> Payment declined ');
            }
        });

        e.preventDefault();
    });
    <?php } ?>
    <?php if ($config->securionpay_payment === "yes") { ?>
        $(function () {
            SecurionpayCheckout.key = '<?php echo($config->securionpay_public_key); ?>';
            SecurionpayCheckout.success = function (result) {
                $.post(window.ajax + 'securionpay/handle', result, function(data, textStatus, xhr) {
                    if (data.status == 200) {
                        window.location.href = data.url;
                    }
                }).fail(function(data) {
                    M.toast({html: data.responseJSON.message});
                });
            };
            SecurionpayCheckout.error = function (errorMessage) {
                M.toast({html: errorMessage});
            };
        });
        function PaySecurionpay(){
            price = getPrice();
            $.post(window.ajax + 'securionpay/token', {type:'go_pro',price:price}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    SecurionpayCheckout.open({
                        checkoutRequest: data.token,
                        name: 'membership',
                        description: getDescription()
                    });
                }
            }).fail(function(data) {
                M.toast({html: data.responseJSON.message});
            });
        }
    <?php } ?>
	<?php if ($config->authorize_payment === "yes") { ?>
    function PayAuthorize() {
        $('#authorize_btn').attr('onclick', 'AuthorizeProRequest()');
        $('#authorize_modal').modal('open');
    }
    function AuthorizeProRequest() {
        $('#authorize_btn').html("<?php echo __('please_wait');?>");
        $('#authorize_btn').attr('disabled','true');
        authorize_number = $('#authorize_number').val();
        authorize_month = $('#authorize_month').val();
        authorize_year = $('#authorize_year').val();
        authorize_cvc = $('#authorize_cvc').val();
        price = getPrice();
        $.post(window.ajax + 'authorize/pay', {type:'go_pro',card_number:authorize_number,card_month:authorize_month,card_year:authorize_year,card_cvc:authorize_cvc,price:price}, function(data) {
            if (data.status == 200) {
                window.location.href = data.url;
            } else {
                $('#authorize_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
                setTimeout(function () {
                    $('#authorize_alert').html("");
                },3000);
            }
            $('#authorize_btn').html("<?php echo __( 'pay' );?>");
            $('#authorize_btn').removeAttr('disabled');
        }).fail(function(data) {
            $('#authorize_alert').html("<div class='alert alert-danger'>"+data.responseJSON.message+"</div>");
            setTimeout(function () {
                $('#authorize_alert').html("");
            },3000);
            $('#authorize_btn').html("<?php echo __( 'pay' );?>");
            $('#authorize_btn').removeAttr('disabled');
        });
    }
    <?php } ?>
    <?php if ($config->paystack_payment == 'yes') { ?>
	function PayPaystack() {
		$('#paystack_btn').attr('onclick', 'InitializeProPaystack()');
        $('#paystack_wallet_modal').modal('open');
	}
	function InitializeProPaystack() {
        $('#paystack_btn').html("<?php echo __('please_wait');?>");
        $('#paystack_btn').attr('disabled','true');
        email = $('#paystack_wallet_email').val();
        price = getPrice();
        $.post(window.ajax + 'paystack/initialize', {type:'go_pro',email:email,price:price}, function(data) {
            if (data.status == 200) {
                window.location.href = data.url;
            } else {
                $('#paystack_wallet_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
                setTimeout(function () {
                    $('#paystack_wallet_alert').html("");
                },3000);
            }
            $('#paystack_btn').html("<?php echo __( 'Confirm' );?>");
            $('#paystack_btn').removeAttr('disabled');
        });
    }
    <?php } ?>

<?php if ($config->iyzipay_payment == "yes" && !empty($config->iyzipay_key) && !empty($config->iyzipay_secret_key)) { ?>
	function PayViaIyzipay(){
		$('.btn-iyzipay-payment').attr('disabled','true');

		$.post(window.ajax + 'iyzipay/createsession', {
            payType: 'membership',
            description: getDescription(),
            price: getPrice()
        }, function(data) {
			if (data.status == 200) {
				$('#iyzipay_content').html('');
				$('#iyzipay_content').html(data.html);
			} else {
				$('.btn-iyzipay').attr('disabled', false).html("Iyzipay App not set yet.");
			}
			$('.btn-iyzipay').removeAttr('disabled');
			$('.btn-iyzipay').find('span').text("<?php echo __( 'iyzipay');?>");
		});

		$('.btn-iyzipay-payment').removeAttr('disabled');
	}
	<?php } ?>

<?php if( $config->cashfree_payment === 'yes' && !empty($config->cashfree_client_key) && !empty($config->cashfree_secret_key)){?>
    function PayViaCashfree(){

        $('.cashfree-payment').attr('disabled','true');

        $('#cashfree_type').val('membership');
        $('#cashfree_description').val(getDescription());
        $('#cashfree_price').val(getPrice());

        $("#cashfree_alert").html('');
        $('.go_pro--modal').fadeOut(250);
        $('#cashfree_modal_box').modal('open');

        $('.btn-cashfree-payment').removeAttr('disabled');
    }
    <?php } ?>
    <?php if($config->paysera_payment == '1'){?>

    function PayViaSms() {
        window.location = window.ajax + 'sms/generate_pro_link?price=' + getPrice() + '00';
    }
    <?php } ?>

    function getDescription() {
        var plans = document.getElementsByName('pro_plan');
        for (index=0; index < plans.length; index++) {
            if (plans[index].checked) {
                return plans[index].value;
                break;
            }
        }
    }

    function getPrice() {
        var plans = document.getElementsByName('pro_plan');
        for (index=0; index < plans.length; index++) {
            if (plans[index].checked) {
                return plans[index].getAttribute('data-price');
                break;
            }
        }
    }

    

    <?php if ($config->checkout_payment == 'yes') { ?>
        function PayVia2Co(){
            $('#2checkout_type').val('membership');
            $('#2checkout_description').val(getDescription());
            $('#2checkout_price').val(getPrice());

            $('#2checkout_modal').modal('open');
        }
    <?php } ?>

</script>