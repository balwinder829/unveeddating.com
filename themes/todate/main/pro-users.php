<div class="to_pro_users">
	<div class="valign-wrapper to_page_title">
		<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 19h20v2H2v-2zM2 5l5 3.5L12 2l5 6.5L22 5v12H2V5zm2 3.841V15h16V8.841l-3.42 2.394L12 5.28l-4.58 5.955L4 8.84z" fill="currentColor"></path></svg></span><?php echo __( 'Premium Users' );?></h3>
	</div>
	<div class="pro_usrs_container">
		<?php if( $profile->is_pro == 0 && isGenderFree($profile->gender) === false ){?>
			<div class="pro_usr add_me">
				<a href="<?php echo $site_url;?>/pro" data-ajax="/pro">
					<svg class="squircle" viewBox="0 0 200 200">
						<defs><pattern id="squircle" patternUnits="userSpaceOnUse" width="200" height="200"><image xlink:href="<?php echo $profile->avater->avater;?>" x="0" y="0" width="200" height="200" /></pattern></defs>
						<path d="M100,200c43.8,0,68.2,0,84.1-15.9C200,168.2,200,143.8,200,100s0-68.2-15.9-84.1C168.2,0,143.8,0,100,0S31.8,0,15.9,15.9C0,31.8,0,56.2,0,100s0,68.2,15.9,84.1C31.8,200,56.2,200,100,200z" fill="url(#squircle)" />
					</svg>
					<span class="add_icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11H7v2h4v4h2v-4h4v-2h-4V7h-2v4z" fill="currentColor"/></svg></span>
				</a>
				<p><a href="<?php echo $site_url;?>/pro" data-ajax="/pro"><?php echo __( 'Add Me' );?></a></p>
			</div>
		<?php } ?>
		<?php $pro_users = ProUsers(); if( count((array)$pro_users) > 0){ ?>
			<?php
				if( $pro_users ){
					foreach ($pro_users as $key => $pro_user ){
			?>
				<div class="pro_usr">
					<a href="<?php echo $site_url;?>/@<?php echo $pro_user->username;?>" data-ajax="/@<?php echo $pro_user->username;?>">
						<svg class="squircle" viewBox="0 0 200 200">
							<defs><pattern id="squircle<?php echo $pro_user->username;?>" patternUnits="userSpaceOnUse" width="200" height="200"><image xlink:href="<?php echo GetMedia( $pro_user->avater );?>" x="0" y="0" width="200" height="200" /></pattern></defs>
							<path d="M100,200c43.8,0,68.2,0,84.1-15.9C200,168.2,200,143.8,200,100s0-68.2-15.9-84.1C168.2,0,143.8,0,100,0S31.8,0,15.9,15.9C0,31.8,0,56.2,0,100s0,68.2,15.9,84.1C31.8,200,56.2,200,100,200z" fill="url(#squircle<?php echo $pro_user->username;?>)" />
						</svg>
					</a>
					<p><a href="<?php echo $site_url;?>/@<?php echo $pro_user->username;?>" data-ajax="/@<?php echo $pro_user->username;?>"><?php echo $pro_user->username;?></a></p>
				</div>
			<?php } } ?>
		<?php } else { ?>
		<?php } ?>
	</div>
</div>