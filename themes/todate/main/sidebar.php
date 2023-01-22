<div class="to_sidebar">

	<div class="to_side_menus">

		<div class="home_usr_sct">

            <div class="user_popularity_icn" data-value="<?php echo GetUserPopularity($profile->id,true);?>" title="<?php echo GetUserPopularity($profile->id);?> <?php echo __( 'Popularity' );?>">

                <svg width="90px" height="90px" viewBox="0 0 80 80">

                    <path class="load-bg cir1" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"></path>

                    <path id="load-line1" class="load-circle" style="stroke-dashoffset: 192.6168975830078px; stroke-dasharray: 192.6168975830078px;stroke:<?php echo GetUserPopularity($profile->id,false,true);?>" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" ></path>

				</svg>

                <a class="avatar" href="<?php echo $site_url;?>/@<?php echo $profile->username;?>" data-ajax="/@<?php echo $profile->username;?>"><img src="<?php echo $profile->avater->avater;?>" class="circle" alt="<?php echo $profile->full_name;?>" /></a>

            </div>

			<h3><a href="<?php echo $site_url;?>/@<?php echo $profile->username;?>" data-ajax="/@<?php echo $profile->username;?>"><?php echo $profile->full_name.$profile->pro_icon;?></a></h3>

			<!--a href="<?php echo $site_url;?>/popularity" data-ajax="/popularity" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg> <?php echo __( 'Increase' );?> <?php echo __( 'Popularity' );?></a-->

		</div>

		

		<?php if (!empty($config->native_android_url) || !empty($config->native_ios_url)) { ?>

			<ul class="home_usr_link">

				<div class="dt_side_apps">

					<?php if (!empty($config->native_android_url) || !empty($config->native_ios_url)) { ?>

						<?php if (!empty($config->native_android_url)) { ?>

							<a href="<?php echo($config->native_android_url) ?>" target="_blank">

								<img width="130" src="<?php echo $theme_url;?>assets/img/google.png"/>

							</a>

						<?php } ?>

						<?php if (!empty($config->native_ios_url)) { ?>

							<a href="<?php echo($config->native_ios_url) ?>" target="_blank">

								<img width="130" src="<?php echo $theme_url;?>assets/img/apple.png"/>

							</a>

						<?php } ?>

					<?php } ?>

				</div>

			</ul>

		<?php } ?>

		

		<ul class="home_usr_link">

			<?php if ($config->agora_live_video == 1) { ?>

				<li class="to_mshow_side_links <?php if($data['name'] == 'live'){ echo 'active';}?>">

					<a href="<?php echo $site_url;?>/live" data-ajax="/live"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z"></path></svg> <?php echo __( 'Live' );?></a>

				</li>

				<li class="to_mshow_side_links divider" tabindex="-1"></li>

			<?php } ?>

			<li class="to_mshow_side_links <?php if($data['name'] == 'credit'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/credit" data-ajax="/credit">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-12.95L16.95 12 12 16.95 7.05 12 12 7.05zm0 2.829L9.879 12 12 14.121 14.121 12 12 9.879z" fill="currentColor"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-14.243L7.757 12 12 16.243 16.243 12 12 7.757z" class="active_path" fill="currentColor"/></svg> <?php echo (int)$profile->balance;?> <?php echo __( 'Credits' );?>

				</a>

			</li>

			<?php if( $config->pro_system == 1 ) { ?>

				<?php if( $profile->is_pro <> 1 ) { ?>

					<?php if( isGenderFree($profile->gender) === false ){ ?>

						<li class="to_mshow_side_links <?php if($data['name'] == 'pro'){ echo 'active';}?>">

							<a href="<?php echo $site_url;?>/pro" data-ajax="/pro">

								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 19h20v2H2v-2zM2 5l5 3.5L12 2l5 6.5L22 5v12H2V5zm2 3.841V15h16V8.841l-3.42 2.394L12 5.28l-4.58 5.955L4 8.84z" fill="currentColor"/><path d="M2 19h20v2H2v-2zM2 5l5 3 5-6 5 6 5-3v12H2V5z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Premium' );?>

							</a>

						</li>

					<?php }?>

				<?php } ?>

			<?php } ?>

			<li class="to_mshow_side_links divider" tabindex="-1"></li>

			<li class="to_mhide_side_links fnd <?php if($data['name'] == 'find-matches'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/find-matches">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9zm-2-1V9.157l-6-5.454-6 5.454V19h12zm-6-2l-3.359-3.359a2.25 2.25 0 1 1 3.182-3.182l.177.177.177-.177a2.25 2.25 0 1 1 3.182 3.182L12 17z" fill="currentColor"/><path d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9zm-8-3l3.359-3.359a2.25 2.25 0 1 0-3.182-3.182l-.177.177-.177-.177a2.25 2.25 0 1 0-3.182 3.182L12 17z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Find Matches' );?>

				</a>

			</li>

			<li class="to_mhide_side_links mch <?php if($data['name'] == 'matches'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/matches" data-ajax="/matches">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M9.55 11.5a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5zm.45 8.248V16.4c0-.488.144-.937.404-1.338a6.473 6.473 0 0 0-5.033 1.417A8.012 8.012 0 0 0 10 19.749zM4.453 14.66A8.462 8.462 0 0 1 9.5 13c1.043 0 2.043.188 2.967.532.878-.343 1.925-.532 3.033-.532 1.66 0 3.185.424 4.206 1.156a8 8 0 1 0-15.253.504zm14.426 1.426C18.486 15.553 17.171 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm3.5-9.5a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="currentColor"/><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Matches' );?>

				</a>

			</li>

			<li class="to_mhide_side_links vis <?php if($data['name'] == 'visits'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/visits" data-ajax="/visits">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="currentColor"/><path d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Visits' );?>

				</a>

			</li>

			<?php if( $config->connectivitySystem == '1' ){?>

				<li class="fnd <?php if($data['name'] == 'friends'){ echo 'active';}?>">

					<a href="<?php echo $site_url;?>/friends" data-ajax="/friends">

						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z" fill="currentColor"/><path d="M2 22a8 8 0 1 1 16 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm7.363 2.233A7.505 7.505 0 0 1 22.983 22H20c0-2.61-1-4.986-2.637-6.767zm-2.023-2.276A7.98 7.98 0 0 0 18 7a7.964 7.964 0 0 0-1.015-3.903A5 5 0 0 1 21 8a4.999 4.999 0 0 1-5.66 4.957z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Friends' );?>

					</a>

				</li>

				<li class="vis <?php if($data['name'] == 'friend-requests'){ echo 'active';}?>">

					<a href="<?php echo $site_url;?>/friend-requests" data-ajax="/friend-requests">

						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 6v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z" fill="currentColor"/><path d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm6 4v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Friend requests' );?>

					</a>

				</li>

			<?php } ?>
<!------------------------
			<li class="mch <?php if($data['name'] == 'gifts'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/gifts" data-ajax="/gifts">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14.5 2a3.5 3.5 0 0 1 3.163 5.001L21 7a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-1v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1l3.337.001a3.5 3.5 0 0 1 5.664-3.95A3.48 3.48 0 0 1 14.5 2zM18 13H6v7h12v-7zm2-4H4v2h16V9zM9.5 4a1.5 1.5 0 0 0-.144 2.993L9.5 7H11V5.5a1.5 1.5 0 0 0-1.356-1.493L9.5 4zm5 0l-.144.007a1.5 1.5 0 0 0-1.35 1.349L13 5.5V7h1.5l.144-.007a1.5 1.5 0 0 0 0-2.986L14.5 4z" fill="currentColor"/><path d="M20 13v7a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16zM14.5 2a3.5 3.5 0 0 1 3.163 5.001L21 7a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1l3.337.001a3.5 3.5 0 0 1 5.664-3.95A3.48 3.48 0 0 1 14.5 2zm-5 2a1.5 1.5 0 0 0-.144 2.993L9.5 7H11V5.5a1.5 1.5 0 0 0-1.356-1.493L9.5 4zm5 0l-.144.007a1.5 1.5 0 0 0-1.35 1.349L13 5.5V7h1.5l.144-.007a1.5 1.5 0 0 0 0-2.986L14.5 4z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Gifts' );?>

				</a>

			</li>
----------------->
			<li class="lik <?php if($data['name'] == 'likes'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/likes" data-ajax="/likes">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M21.179 12.794l.013.014L12 22l-9.192-9.192.013-.014A6.5 6.5 0 0 1 12 3.64a6.5 6.5 0 0 1 9.179 9.154zM4.575 5.383a4.5 4.5 0 0 0 0 6.364L12 19.172l7.425-7.425a4.5 4.5 0 0 0-6.364-6.364L8.818 9.626 7.404 8.21l3.162-3.162a4.5 4.5 0 0 0-5.99.334z" fill="currentColor"/><path d="M2.821 12.794a6.5 6.5 0 0 1 7.413-10.24h-.002L5.99 6.798l1.414 1.414 4.242-4.242a6.5 6.5 0 0 1 9.193 9.192L12 22l-9.192-9.192.013-.014z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Likes' );?>

				</a>

			</li>

			<li class="pli <?php if($data['name'] == 'liked'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/liked" data-ajax="/liked">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm5.793 8.914l3.535-3.535 1.415 1.414-4.95 4.95-3.536-3.536 1.415-1.414 2.12 2.121z" fill="currentColor"/><path d="M13 14.062V22H4a8 8 0 0 1 9-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm5.793 6.914l3.535-3.535 1.415 1.414-4.95 4.95-3.536-3.536 1.415-1.414 2.12 2.121z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'People i liked' );?>

				</a>

			</li>

			<li class="dis <?php if($data['name'] == 'disliked'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/disliked" data-ajax="/disliked">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M9.4 16H3a2 2 0 0 1-2-2v-2.104a2 2 0 0 1 .15-.762L4.246 3.62A1 1 0 0 1 5.17 3H22a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-3.482a1 1 0 0 0-.817.423l-5.453 7.726a.5.5 0 0 1-.632.159L9.802 22.4a2.5 2.5 0 0 1-1.305-2.853L9.4 16zm7.6-2.588V5H5.84L3 11.896V14h6.4a2 2 0 0 1 1.938 2.493l-.903 3.548a.5.5 0 0 0 .261.571l.661.33 4.71-6.672c.25-.354.57-.644.933-.858zM19 13h2V5h-2v8z" fill="currentColor"/><path d="M22 15h-3V3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zm-5.293 1.293l-6.4 6.4a.5.5 0 0 1-.654.047L8.8 22.1a1.5 1.5 0 0 1-.553-1.57L9.4 16H3a2 2 0 0 1-2-2v-2.104a2 2 0 0 1 .15-.762L4.246 3.62A1 1 0 0 1 5.17 3H16a1 1 0 0 1 1 1v11.586a1 1 0 0 1-.293.707z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'People i disliked' );?>

				</a>

			</li>

			<li class="hot <?php if($data['name'] == 'hot'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/hot" data-ajax="/hot">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 23a7.5 7.5 0 0 0 7.5-7.5c0-.866-.23-1.697-.5-2.47-1.667 1.647-2.933 2.47-3.8 2.47 3.995-7 1.8-10-4.2-14 .5 5-2.796 7.274-4.138 8.537A7.5 7.5 0 0 0 12 23zm.71-17.765c3.241 2.75 3.257 4.887.753 9.274-.761 1.333.202 2.991 1.737 2.991.688 0 1.384-.2 2.119-.595a5.5 5.5 0 1 1-9.087-5.412c.126-.118.765-.685.793-.71.424-.38.773-.717 1.118-1.086 1.23-1.318 2.114-2.78 2.566-4.462z" fill="currentColor"/><path d="M12 23a7.5 7.5 0 0 1-5.138-12.963C8.204 8.774 11.5 6.5 11 1.5c6 4 9 8 3 14 1 0 2.5 0 5-2.47.27.773.5 1.604.5 2.47A7.5 7.5 0 0 1 12 23z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'HOT OR NOT' );?>

				</a>

			</li>

			<li class="blg <?php if($data['name'] == 'blog'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/blog" data-ajax="/blog"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12h4v4a3 3 0 0 1-3 3zm-1-5v2a1 1 0 0 0 2 0v-2h-2zm-2 3V4H4v15a1 1 0 0 0 1 1h11zM6 7h8v2H6V7zm0 4h8v2H6v-2zm0 4h5v2H6v-2z" fill="currentColor"/><path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12h4v4a3 3 0 0 1-3 3zm-1-5v2a1 1 0 0 0 2 0v-2h-2zM6 7v2h8V7H6zm0 4v2h8v-2H6zm0 4v2h5v-2H6z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Blog' );?></a>

			</li>

			<?php if ($config->agora_live_video == 1) { ?>

				<li class="lik <?php if($data['name'] == 'live-users'){ echo 'active';}?>">

					<a href="<?php echo $site_url;?>/live-users" data-ajax="/live-users"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16 4a1 1 0 0 1 1 1v4.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14zm-1 2H3v12h12V6zM7.4 8.829a.4.4 0 0 1 .215.062l4.355 2.772a.4.4 0 0 1 0 .674L7.615 15.11A.4.4 0 0 1 7 14.77V9.23c0-.221.18-.4.4-.4zM21 8.84l-4 2.8v.718l4 2.8V8.84z" fill="currentColor"/><path d="M16 4a1 1 0 0 1 1 1v4.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14zM7.4 8.829a.4.4 0 0 0-.392.32L7 9.228v5.542a.4.4 0 0 0 .542.374l.073-.036 4.355-2.772a.4.4 0 0 0 .063-.624l-.063-.05L7.615 8.89A.4.4 0 0 0 7.4 8.83z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Live Videos' );?></a>

				</li>

			<?php } ?>

		</ul>

		<ul class="home_usr_link">

			<li class="to_mshow_side_links divider" tabindex="-1"></li>

			<li class="set <?php if($data['name'] == 'settings'){ echo 'active';}?><?php if($data['name'] == 'settings-profile'){ echo 'active';}?><?php if($data['name'] == 'settings-privacy'){ echo 'active';}?><?php if($data['name'] == 'settings-password'){ echo 'active';}?><?php if($data['name'] == 'settings-social'){ echo 'active';}?><?php if($data['name'] == 'settings-blocked'){ echo 'active';}?><?php if($data['name'] == 'settings-email'){ echo 'active';}?><?php if($data['name'] == 'settings-delete'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill="currentColor"/><path d="M9.954 2.21a9.99 9.99 0 0 1 4.091-.002A3.993 3.993 0 0 0 16 5.07a3.993 3.993 0 0 0 3.457.261A9.99 9.99 0 0 1 21.5 8.876 3.993 3.993 0 0 0 20 12c0 1.264.586 2.391 1.502 3.124a10.043 10.043 0 0 1-2.046 3.543 3.993 3.993 0 0 0-3.456.261 3.993 3.993 0 0 0-1.954 2.86 9.99 9.99 0 0 1-4.091.004A3.993 3.993 0 0 0 8 18.927a3.993 3.993 0 0 0-3.457-.26A9.99 9.99 0 0 1 2.5 15.121 3.993 3.993 0 0 0 4 11.999a3.993 3.993 0 0 0-1.502-3.124 10.043 10.043 0 0 1 2.046-3.543A3.993 3.993 0 0 0 8 5.071a3.993 3.993 0 0 0 1.954-2.86zM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Settings' );?></a>

			</li>

			<li class="to_mshow_side_links">

				<a href="javascript:void(0);" id="night_mode_toggle_sidebar" data-night-text="<?php echo __('Night mode');?>" data-light-text="<?php echo __('Day mode');?>" data-mode='<?php echo Secure($config->nextmode) ?>'>

					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" /></svg> <span><?php echo $config->nextmode_text;?></span>

				</a>

			</li>

			<li class="to_mshow_side_links <?php if($data['name'] == 'transactions'){ echo 'active';}?>">

				<a href="<?php echo $site_url;?>/transactions" data-ajax="/transactions">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-5-7h9v2h-4v3l-5-5zm5-4V6l5 5H8V9h4z" fill="currentColor"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-13H8v2h9l-5-5v3zm-5 4l5 5v-3h4v-2H7z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Transactions' );?>

				</a>

			</li>

			<?php if( $profile->admin == 1 ){ ?>

				<li class="to_mshow_side_links divider" tabindex="-1"></li>

				<li class="to_mshow_side_links">

					<a href="<?php echo $site_url;?>/admin-cp">

						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M5 8h14V5H5v3zm9 11v-9H5v9h9zm2 0h3v-9h-3v9zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" fill="currentColor"/><path d="M16 21V10h5v10a1 1 0 0 1-1 1h-4zm-2 0H4a1 1 0 0 1-1-1V10h11v11zm7-13H3V4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Admin Panel' );?>

					</a>

                </li>

			<?php } ?>

			<li class="to_mshow_side_links divider" tabindex="-1"></li>

			<li class="to_mshow_side_links">

				<a href="javascript:void(0);" onclick="logout()">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4 18h2v2h12V4H6v2H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3zm2-7h7v2H6v3l-5-4 5-4v3z" fill="currentColor"/><path d="M5 2h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm4 9V8l-5 4 5 4v-3h6v-2H9z" class="active_path" fill="currentColor"/></svg> <?php echo __( 'Log Out' );?>

				</a>

			</li>

		</ul>

	</div>

</div>

<?php echo GetAd('home_side_bar');?>