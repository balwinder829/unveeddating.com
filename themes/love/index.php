<style>body > #container {padding: 0;}</style>
<!-- Top Hero  -->
<div class="section header_bg">
	<div class="container home_pz_rel">
		<div class="center">
			<h1 class="header"><?php echo __( 'Meet new and interesting people.' );?></h1>
			<h5 class="header"><?php echo __( 'Join' );?> <?php echo ucfirst( $config->site_name );?>, <?php echo __( 'where you could meet anyone, anywhere!' );?></h5>
			<?php if( $config->show_user_on_homepage == '1'){
				$siteUsers = GetSiteUsers();
				if( !empty($siteUsers) ){
			?>
				<div class="xuser">
					<?php foreach ($siteUsers as $key => $user) { ?>
						<a href="<?php echo $site_url;?>/@<?php echo $user->username;?>" data-ajax="/@<?php echo $user->username;?>">
							<img src="<?php echo $user->avater->avater;?>" alt="<?php echo $user->full_name;?>" class="circle">
						</a>
					<?php } ?>
				</div>
			<?php }} ?>
			<?php if ($config->user_registration == 1) { ?>
			<a href="<?php echo $site_url;?>/register" class="btn-large waves-effect waves-light btn_primary lighten-1 bold btn_round main-hdr-bttn"><?php echo __( 'Get Started' );?></a>
			<?php } ?>
		</div>
	</div>
	<figure class="dt_headder_effect" aria-hidden="true"><svg class="dt_headder_effect_svg" viewBox="0 0 1920 450" fill="none"><g opacity="1" fill="currentColor" stroke="none"><circle cx="1544" cy="287" r="2"></circle><circle cx="1544" cy="303" r="2"></circle><circle cx="1544" cy="319" r="2"></circle><circle cx="1544" cy="335" r="2"></circle><circle cx="1544" cy="351" r="2"></circle><circle cx="1544" cy="367" r="2"></circle><circle cx="1544" cy="383" r="2"></circle><circle cx="1544" cy="399" r="2"></circle><circle cx="1544" cy="415" r="2"></circle><circle cx="1544" cy="431" r="2"></circle><circle cx="1560" cy="287" r="2"></circle><circle cx="1560" cy="303" r="2"></circle><circle cx="1560" cy="319" r="2"></circle><circle cx="1560" cy="335" r="2"></circle><circle cx="1560" cy="351" r="2"></circle><circle cx="1560" cy="367" r="2"></circle><circle cx="1560" cy="383" r="2"></circle><circle cx="1560" cy="399" r="2"></circle><circle cx="1560" cy="415" r="2"></circle><circle cx="1560" cy="431" r="2"></circle><circle cx="1576" cy="287" r="2"></circle><circle cx="1576" cy="303" r="2"></circle><circle cx="1576" cy="319" r="2"></circle><circle cx="1576" cy="335" r="2"></circle><circle cx="1576" cy="351" r="2"></circle><circle cx="1576" cy="367" r="2"></circle><circle cx="1576" cy="383" r="2"></circle><circle cx="1576" cy="399" r="2"></circle><circle cx="1576" cy="415" r="2"></circle><circle cx="1576" cy="431" r="2"></circle><circle cx="1592" cy="287" r="2"></circle><circle cx="1592" cy="303" r="2"></circle><circle cx="1592" cy="319" r="2"></circle><circle cx="1592" cy="335" r="2"></circle><circle cx="1592" cy="351" r="2"></circle><circle cx="1592" cy="367" r="2"></circle><circle cx="1592" cy="383" r="2"></circle><circle cx="1592" cy="399" r="2"></circle><circle cx="1592" cy="415" r="2"></circle><circle cx="1592" cy="431" r="2"></circle><circle cx="1608" cy="287" r="2"></circle><circle cx="1624" cy="287" r="2"></circle><circle cx="1640" cy="287" r="2"></circle><circle cx="1656" cy="287" r="2"></circle><circle cx="1672" cy="287" r="2"></circle><circle cx="1688" cy="287" r="2"></circle><circle cx="1608" cy="303" r="2"></circle><circle cx="1624" cy="303" r="2"></circle><circle cx="1640" cy="303" r="2"></circle><circle cx="1656" cy="303" r="2"></circle><circle cx="1672" cy="303" r="2"></circle><circle cx="1688" cy="303" r="2"></circle><circle cx="1608" cy="319" r="2"></circle><circle cx="1624" cy="319" r="2"></circle><circle cx="1640" cy="319" r="2"></circle><circle cx="1656" cy="319" r="2"></circle><circle cx="1672" cy="319" r="2"></circle><circle cx="1688" cy="319" r="2"></circle><circle cx="1608" cy="335" r="2"></circle><circle cx="1624" cy="335" r="2"></circle><circle cx="1640" cy="335" r="2"></circle><circle cx="1656" cy="335" r="2"></circle><circle cx="1672" cy="335" r="2"></circle><circle cx="1688" cy="335" r="2"></circle><circle cx="1608" cy="351" r="2"></circle><circle cx="1608" cy="367" r="2"></circle><circle cx="1608" cy="383" r="2"></circle><circle cx="1608" cy="399" r="2"></circle><circle cx="1608" cy="415" r="2"></circle><circle cx="1608" cy="431" r="2"></circle><circle cx="1624" cy="351" r="2"></circle><circle cx="1624" cy="367" r="2"></circle><circle cx="1624" cy="383" r="2"></circle><circle cx="1624" cy="399" r="2"></circle><circle cx="1624" cy="415" r="2"></circle><circle cx="1624" cy="431" r="2"></circle><circle cx="1640" cy="351" r="2"></circle><circle cx="1656" cy="351" r="2"></circle><circle cx="1672" cy="351" r="2"></circle><circle cx="1688" cy="351" r="2"></circle><circle cx="1640" cy="367" r="2"></circle><circle cx="1656" cy="367" r="2"></circle><circle cx="1672" cy="367" r="2"></circle><circle cx="1688" cy="367" r="2"></circle><circle cx="1640" cy="383" r="2"></circle><circle cx="1640" cy="399" r="2"></circle><circle cx="1640" cy="415" r="2"></circle><circle cx="1640" cy="431" r="2"></circle><circle cx="1656" cy="383" r="2"></circle><circle cx="1672" cy="383" r="2"></circle><circle cx="1688" cy="383" r="2"></circle><circle cx="1656" cy="399" r="2"></circle><circle cx="1656" cy="415" r="2"></circle><circle cx="1656" cy="431" r="2"></circle><circle cx="1672" cy="399" r="2"></circle><circle cx="1672" cy="415" r="2"></circle><circle cx="1672" cy="431" r="2"></circle><circle cx="1688" cy="399" r="2"></circle><circle cx="1688" cy="415" r="2"></circle><circle cx="1688" cy="431" r="2"></circle><circle cx="232" cy="37" r="2"></circle><circle cx="232" cy="53" r="2"></circle><circle cx="232" cy="69" r="2"></circle><circle cx="232" cy="85" r="2"></circle><circle cx="232" cy="101" r="2"></circle><circle cx="232" cy="117" r="2"></circle><circle cx="232" cy="133" r="2"></circle><circle cx="232" cy="149" r="2"></circle><circle cx="232" cy="165" r="2"></circle><circle cx="232" cy="181" r="2"></circle><circle cx="248" cy="37" r="2"></circle><circle cx="248" cy="53" r="2"></circle><circle cx="248" cy="69" r="2"></circle><circle cx="248" cy="85" r="2"></circle><circle cx="248" cy="101" r="2"></circle><circle cx="248" cy="117" r="2"></circle><circle cx="248" cy="133" r="2"></circle><circle cx="248" cy="149" r="2"></circle><circle cx="248" cy="165" r="2"></circle><circle cx="248" cy="181" r="2"></circle><circle cx="264" cy="37" r="2"></circle><circle cx="264" cy="53" r="2"></circle><circle cx="264" cy="69" r="2"></circle><circle cx="264" cy="85" r="2"></circle><circle cx="264" cy="101" r="2"></circle><circle cx="264" cy="117" r="2"></circle><circle cx="264" cy="133" r="2"></circle><circle cx="264" cy="149" r="2"></circle><circle cx="264" cy="165" r="2"></circle><circle cx="264" cy="181" r="2"></circle><circle cx="280" cy="37" r="2"></circle><circle cx="280" cy="53" r="2"></circle><circle cx="280" cy="69" r="2"></circle><circle cx="280" cy="85" r="2"></circle><circle cx="280" cy="101" r="2"></circle><circle cx="280" cy="117" r="2"></circle><circle cx="280" cy="133" r="2"></circle><circle cx="280" cy="149" r="2"></circle><circle cx="280" cy="165" r="2"></circle><circle cx="280" cy="181" r="2"></circle><circle cx="296" cy="37" r="2"></circle><circle cx="312" cy="37" r="2"></circle><circle cx="328" cy="37" r="2"></circle><circle cx="344" cy="37" r="2"></circle><circle cx="360" cy="37" r="2"></circle><circle cx="376" cy="37" r="2"></circle><circle cx="296" cy="53" r="2"></circle><circle cx="312" cy="53" r="2"></circle><circle cx="328" cy="53" r="2"></circle><circle cx="344" cy="53" r="2"></circle><circle cx="360" cy="53" r="2"></circle><circle cx="376" cy="53" r="2"></circle><circle cx="296" cy="69" r="2"></circle><circle cx="312" cy="69" r="2"></circle><circle cx="328" cy="69" r="2"></circle><circle cx="344" cy="69" r="2"></circle><circle cx="360" cy="69" r="2"></circle><circle cx="376" cy="69" r="2"></circle><circle cx="296" cy="85" r="2"></circle><circle cx="312" cy="85" r="2"></circle><circle cx="328" cy="85" r="2"></circle><circle cx="344" cy="85" r="2"></circle><circle cx="360" cy="85" r="2"></circle><circle cx="376" cy="85" r="2"></circle><circle cx="296" cy="101" r="2"></circle><circle cx="296" cy="117" r="2"></circle><circle cx="296" cy="133" r="2"></circle><circle cx="296" cy="149" r="2"></circle><circle cx="296" cy="165" r="2"></circle><circle cx="296" cy="181" r="2"></circle><circle cx="312" cy="101" r="2"></circle><circle cx="312" cy="117" r="2"></circle><circle cx="312" cy="133" r="2"></circle><circle cx="312" cy="149" r="2"></circle><circle cx="312" cy="165" r="2"></circle><circle cx="312" cy="181" r="2"></circle><circle cx="328" cy="101" r="2"></circle><circle cx="344" cy="101" r="2"></circle><circle cx="360" cy="101" r="2"></circle><circle cx="376" cy="101" r="2"></circle><circle cx="328" cy="117" r="2"></circle><circle cx="344" cy="117" r="2"></circle><circle cx="360" cy="117" r="2"></circle><circle cx="376" cy="117" r="2"></circle><circle cx="328" cy="133" r="2"></circle><circle cx="328" cy="149" r="2"></circle><circle cx="328" cy="165" r="2"></circle><circle cx="328" cy="181" r="2"></circle><circle cx="344" cy="133" r="2"></circle><circle cx="360" cy="133" r="2"></circle><circle cx="376" cy="133" r="2"></circle><circle cx="344" cy="149" r="2"></circle><circle cx="344" cy="165" r="2"></circle><circle cx="344" cy="181" r="2"></circle><circle cx="360" cy="149" r="2"></circle><circle cx="360" cy="165" r="2"></circle><circle cx="360" cy="181" r="2"></circle><circle cx="376" cy="149" r="2"></circle><circle cx="376" cy="165" r="2"></circle><circle cx="376" cy="181" r="2"></circle></g><g stroke="currentColor" stroke-width="2"><rect x="1568" y="83" width="244" height="244"></rect><rect x="124" y="-135" width="244" height="244"></rect></g></svg></figure>
	<img class="index_hero_svg" src="<?php echo $theme_url;?>assets/img/couple.svg"/>
	<img class="hero_cloud-1" src="<?php echo $theme_url;?>assets/img/cloud-1.png"/>
	<img class="hero_cloud-2" src="<?php echo $theme_url;?>assets/img/cloud-1.png"/>
	<img class="hero_cloud-3" src="<?php echo $theme_url;?>assets/img/cloud-1.png"/>
	<img class="hero_cloud-4" src="<?php echo $theme_url;?>assets/img/cloud-2.png"/>
	<img class="hero_cloud-5" src="<?php echo $theme_url;?>assets/img/cloud-3.png"/>
	<img class="hero_cloud-6" src="<?php echo $theme_url;?>assets/img/cloud-3.png"/>
</div>
<!-- End Top Hero  -->

<div class="dt_features_prnt">
	<div class="container">
		<div class="dt_features">
			<div class="row no_margin">
				<div class="col s12 m4">
					<div class="icon-block">
						<div class="icon_wrapper"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m416 512h-320c-53.023438 0-96-42.976562-96-96v-320c0-53.023438 42.976562-96 96-96h320c53.023438 0 96 42.976562 96 96v320c0 53.007812-42.992188 96-96 96zm0 0" fill="#ffe6e2"/><path d="m312.71875 138c-23.085938 0-44.335938 11.167969-57.390625 29.375-13.054687-18.191406-34.304687-29.375-57.390625-29.375-38.929688 0-70.609375 31.617188-70.609375 70.464844 0 69.136718 105.535156 151.566406 115.023437 158.832031 3.390626 3.421875 8.0625 5.359375 12.976563 5.359375 4.910156 0 9.582031-1.9375 12.976563-5.359375 9.488281-7.265625 115.023437-89.695313 115.023437-158.832031 0-38.847656-31.679687-70.464844-70.609375-70.464844zm0 0" fill="#fc573b"/></svg></div>
						<h5 class="bold"><?php echo __( 'Best Match' );?></h5>
						<p><?php echo __( 'Based on your location, we find best and suitable matches for you.' );?></p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block">
						<div class="icon_wrapper"><svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#f5e6fe"/></g><g id="bold"><g fill="#be63f9"><path d="m9.159 14.051c-.137 0-.275-.057-.374-.168-.184-.206-.165-.522.041-.706 1.678-1.493 3.938-2.141 6.216-1.712.271.051.45.313.399.584s-.312.45-.584.399c-1.977-.373-3.917.187-5.366 1.477-.095.084-.213.126-.332.126z"/><path d="m8.486 16.592c-.098 0-.196-.029-.283-.088-.227-.157-.285-.468-.128-.695 1.273-1.848 3.359-2.952 5.583-2.952.533 0 1.042.06 1.516.177.268.066.432.337.366.605-.066.269-.342.432-.605.365-.396-.098-.826-.147-1.277-.147-1.894 0-3.673.942-4.758 2.519-.098.14-.254.216-.414.216z"/><path d="m12.402 24c-.127 0-.254-.048-.351-.144-.089-.087-2.16-2.153-2.16-4.16 0-2.094 1.689-3.797 3.766-3.797s3.766 1.703 3.766 3.797c0 .276-.224.5-.5.5s-.5-.224-.5-.5c0-1.542-1.241-2.797-2.766-2.797s-2.766 1.255-2.766 2.797c0 1.588 1.843 3.43 1.862 3.449.196.194.198.511.004.707-.098.098-.226.148-.355.148z"/><path d="m9.974 23.261c-.145 0-.289-.063-.388-.185-.788-.97-1.204-2.139-1.204-3.381 0-1.473.615-2.894 1.686-3.897 1.074-1.006 2.469-1.502 3.94-1.411.749.049 1.462.26 2.118.626.242.134.327.439.193.68-.135.241-.439.329-.68.193-.526-.293-1.096-.462-1.697-.501-1.193-.083-2.322.328-3.191 1.143-.87.815-1.369 1.97-1.369 3.168 0 1.01.339 1.961.98 2.751.174.214.141.529-.073.703-.092.074-.204.111-.315.111z"/><path d="m14.911 24c-.984 0-3.268-1.827-3.489-3.862-.078-.734.149-1.457.622-1.986.419-.469.989-.729 1.604-.732h.015c.595 0 1.155.231 1.579.652.434.431.673 1.007.673 1.623v.253c0 .564.451 1.023 1.006 1.023.271 0 .522-.105.708-.296.199-.195.304-.45.304-.727v-.084c0-.795-.204-1.576-.591-2.262-.057-.081-.09-.179-.09-.285 0-.276.221-.5.497-.5h.007c.179 0 .344.095.433.25.488.846.745 1.813.745 2.797v.084c0 .548-.212 1.057-.596 1.433-.367.377-.873.59-1.416.59-1.106 0-2.006-.908-2.006-2.023v-.253c0-.348-.134-.672-.378-.914-.237-.235-.548-.345-.883-.362-.422.002-.703.218-.865.399-.281.314-.421.768-.374 1.213.174 1.599 2.083 2.969 2.495 2.969.276 0 .5.224.5.5s-.224.5-.5.5z"/><path d="m16.39 23.239c-1.479 0-3.264-1.694-3.264-3.797 0-.276.224-.5.5-.5s.5.224.5.5c0 1.544 1.37 2.797 2.264 2.797.276 0 .5.224.5.5s-.224.5-.5.5z"/></g><path d="m23.659 9.217-3.5-1.19c-.105-.036-.217-.036-.322 0l-3.5 1.19c-.202.069-.339.259-.339.473v2.679c0 3.27 3.649 4.858 3.804 4.925.062.026.129.04.196.04s.133-.013.196-.04c.155-.066 3.804-1.655 3.804-4.925v-2.679c-.001-.214-.137-.404-.339-.473zm-1.428 2.25-2 2.667c-.087.116-.22.188-.365.199-.012.001-.024.001-.035.001-.132 0-.259-.052-.354-.146l-1.333-1.333c-.195-.195-.195-.512 0-.707s.512-.195.707 0l.926.926 1.654-2.206c.166-.22.479-.265.7-.1.221.164.265.478.1.699z" fill="#d9a4fc"/></g></svg></div>
						<h5 class="bold"><?php echo __( 'Fully Secure' );?></h5>
						<p><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'Your account is Safe on {0}. We never share your data with third party.' ) );?></p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block">
						<div class="icon_wrapper"><svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#e3f8fa"/><path d="m20.5 14h-.5v-2c0-2.206-1.794-4-4-4s-4 1.794-4 4v2h-.5c-.827 0-1.5.673-1.5 1.5v7c0 .827.673 1.5 1.5 1.5h9c.827 0 1.5-.673 1.5-1.5v-7c0-.827-.673-1.5-1.5-1.5zm-7.167-2c0-1.47 1.196-2.667 2.667-2.667s2.667 1.197 2.667 2.667v2h-5.334zm3.334 7.148v1.519c0 .368-.298.667-.667.667s-.667-.299-.667-.667v-1.519c-.397-.231-.667-.656-.667-1.148 0-.735.598-1.333 1.333-1.333s1.333.598 1.333 1.333c.001.491-.269.917-.665 1.148z" fill="#26c6da"/></svg></div>
						<h5 class="bold"><?php echo __( '100% Privacy' );?></h5>
						<p><?php echo __( 'You have full control over your personal information that you share.' );?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	$stories = GetStories();
	if( !empty($stories) ){
?>
	<!-- Testimonials  -->
	<div class="dt_test_white_bg">
		<div class="section dt_test_bg">
			<div class="dt_shape_div shd_top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path fill="currentColor" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path></svg></div>
			<div class="container">
				<div class="row dt_tstm_usr">
					<div class="col s12 dt_test_title">
						<h3 class="center-align"><?php echo __( 'Success Stories' );?></h3>
					</div>
					<div class="carousel carousel-slider">
						<?php foreach ($stories as $key => $story){ ?>
							<div class="carousel-item valign-wrapper" href="#one!">
								<div class="dt_testimonial_slide">
									<img src="<?php echo $story['user1Data']->avater->avater;?>" alt="<?php echo $story['user1Data']->full_name;?>" class="circle" />
									<h5><?php echo $story['quote'];?></h5>
									<p><?php echo substr( strip_tags (br2nl( html_entity_decode( $story['description'] )) ) , 0 , 250);?>...</p>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="dt_shape_div"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path fill="currentColor" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path></svg></div>
		</div>
	</div>
	<!-- End Testimonials  -->
<?php } ?>

<!-- Get Started  -->
<div class="container">
	<div class="dt_get_start">
		<div class="dt_get_start_circle-1"></div>
		<div class="dt_get_start_circle-2"></div>
		<div class="dt_get_start_circle-3"></div>
		<div class="row dt_how_it_works">
			<div class="col s12 m4">
				<h3><?php echo __( 'How' );?> <?php echo ucfirst( $config->site_name );?> <?php echo __( 'Works' );?></h3>
			</div>
			<div class="col s12 m8">
				<div class="icon-block">
					<h5 class="bold"><?php echo __( 'Create Account' );?></h5>
					<p><?php echo __( 'Register for free & create up your good looking Profile.' );?></p>
				</div>
				<div class="dt_how_it_works_arrow"><img src="<?php echo $theme_url;?>assets/img/arrow.png"></div>
				<div class="icon-block">
					<h5 class="bold"><?php echo __( 'Find Matches' );?></h5>
					<p><?php echo __( 'Search & Connect with Matches which are perfect for you.' );?></p>
				</div>
				<div class="dt_how_it_works_arrow"><img src="<?php echo $theme_url;?>assets/img/arrow.png"></div>
				<div class="icon-block">
					<h5 class="bold"><?php echo __( 'Start Dating' );?></h5>
					<p><?php echo __( 'Start doing conversations and date your best match.' );?></p>
				</div>
			</div>
		</div>
		<hr class="border_hr">
		<div class="center-align">
			<h4><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'Connect with your perfect Soulmate here, on {0}.' ) );?></h4>
			<?php if ($config->user_registration == 1) { ?>
			<a href="<?php echo $site_url;?>/register" class="waves-effect waves-light bold btn_glossy"><?php echo __( 'Get Started' );?></a>
		<?php } ?>
		</div>
	</div>
</div>
<!-- End Get Started  -->