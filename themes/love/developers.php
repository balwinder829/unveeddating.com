<!-- Terms  -->
<?php require( $theme_path . 'main' . $_DS . 'mini-sidebar.php' );?>

<div class="container dt_terms">
	<div class="dt_settings_bg_wrap">
		<div class="dt_terms_sidebar">
			<ul>
				<li class=""><a href="<?php echo $site_url;?>/terms" data-ajax="/terms"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 6H14L17.29 2.7A1 1 0 0 1 18.71 2.7L21.29 5.29A1 1 0 0 1 21.29 6.7L19 9H11V11A1 1 0 0 1 10 12A1 1 0 0 1 9 11V8A2 2 0 0 1 11 6M5 11V15L2.71 17.29A1 1 0 0 0 2.71 18.7L5.29 21.29A1 1 0 0 0 6.71 21.29L11 17H15A1 1 0 0 0 16 16V15H17A1 1 0 0 0 18 14V13H19A1 1 0 0 0 20 12V11H13V12A2 2 0 0 1 11 14H9A2 2 0 0 1 7 12V9Z" /></svg> <?php echo __( 'Terms of use' );?></a></li>
				<li class=""><a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" /></svg> <?php echo __( 'Privacy Policy' );?></a></li>
				<li class=""><a href="<?php echo $site_url;?>/about" data-ajax="/about"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo __( 'About us' );?></a></li>
				<li class="active"><a href="<?php echo $site_url;?>/developers" data-ajax="/developers"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.6,16.6L19.2,12L14.6,7.4L16,6L22,12L16,18L14.6,16.6M9.4,16.6L4.8,12L9.4,7.4L8,6L2,12L8,18L9.4,16.6Z" /></svg> <?php echo __( 'Developers' );?></a></li>
				<li class=""><a href="<?php echo $site_url;?>/contact" data-ajax="/contact"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg> <?php echo __( 'Contact us' );?></a></li>
				<li class=""><a href="<?php echo $site_url;?>/faqs" data-ajax="/faqs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9V3.5L18.5,9M6,2C4.89,2 4,2.89 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6Z"></path></svg> <?php echo __( 'faqs' );?></a></li>
				<li class=""><a href="<?php echo $site_url;?>/refund" data-ajax="/refund"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" width="24" height="24"><path d="M464 16c-17.67 0-32 14.31-32 32v74.09C392.1 66.52 327.4 32 256 32C161.5 32 78.59 92.34 49.58 182.2c-5.438 16.81 3.797 34.88 20.61 40.28c16.89 5.5 34.88-3.812 40.3-20.59C130.9 138.5 189.4 96 256 96c50.5 0 96.26 24.55 124.4 64H336c-17.67 0-32 14.31-32 32s14.33 32 32 32h128c17.67 0 32-14.31 32-32V48C496 30.31 481.7 16 464 16zM441.8 289.6c-16.92-5.438-34.88 3.812-40.3 20.59C381.1 373.5 322.6 416 256 416c-50.5 0-96.25-24.55-124.4-64H176c17.67 0 32-14.31 32-32s-14.33-32-32-32h-128c-17.67 0-32 14.31-32 32v144c0 17.69 14.33 32 32 32s32-14.31 32-32v-74.09C119.9 445.5 184.6 480 255.1 480c94.45 0 177.4-60.34 206.4-150.2C467.9 313 458.6 294.1 441.8 289.6z"/></svg> <?php echo __( 'refund' );?></a></li>
			</ul>
		</div>
		<h2 class="bold"><?php echo __( 'Developers' );?> <a class="btn btn_primary waves-effect waves-light btn-flat btn-small white-text" data-ajax="/create-app" href="<?php echo $site_url;?>/create-app"><?php echo __( 'Create App' ) ?></a> <a class="btn btn_primary waves-effect waves-light btn-flat btn-small white-text" data-ajax="/apps" href="<?php echo $site_url;?>/apps"><?php echo __( 'My Apps' ) ?></a></h2>
		<div class="dt_terms_content_body">
					<p class="no_margin_top">Our API allows you to retrieve informations from our website via GET request and supports the following query parameters: </p>
					<table class="responsive-table highlight">
						<thead>
							<tr>
								<th>Name</th>
								<th>Meaning</th>
								<th>Values</th>
								<th>Description</th>
								<th>Required</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><b>type</b></td>
								<td>Query type.</td>
								<td>get_user_data, posts_data</td>
								<td>This parameter specify the type of the query.</td>
								<td><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></td>
							</tr>
							<tr>
								<td><b>limit</b></td>
								<td>Limit of items.</td>
								<td>LIMIT</td>
								<td>This parameter specify the limit of items. Max:100 | Default:20</td>
								<td><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></td>
							</tr>
						</tbody>
					</table>
					<br>
					<h5>How to start?</h5>
					<hr class="border_hr">
					<ol>
						<li>Create a <a href="<?php echo $site_url;?>/create-app" class="main">development application</a>.<br><br></li>
						<li>Once you have created the app, you'll get APP_ID, and APP_SECRET. <br>Example: <br><br><img src="<?php echo $theme_url;?>assets/img/developers.png" alt=""><br><br></li>
						<li>To start the Oauth process, use the link <?php echo $site_url; ?>/oauth?app_id={YOUR_APP_ID}<br><br></li>
						<li>Once the end user clicks this link, he/she will be redirected to the authorization page.<br><br></li>
						<li>Once the end user authorization the app, he/she will be redirected to your domain name with a GET parameter "code", example: http://yourdomain/?code=XXX<br><br></li>
						<li>In your code, to retrieve the authorized user info, you need to generate an access code, please use the code below:<br><br>
                            PHP:
                            <code>
<?php 
$code = '<?php
	$app_id = \'YOUR_APP_ID\'; // your application app id
	$app_secret = \'YOUR_APP_SECRET\'; your application app secret
	$code = $_GET[\'code\']; // the GET parameter you got in the callback: http://yourdomain/?code=XXX

	$get = file_get_contents("' . $site_url . '/authorize?app_id={$app_id}&app_secret={$app_secret}&code={$code}");


	Respond:
	{
		"id": "1",
		"verified_final": true,
		"fullname": "admin",
		"country_txt": "Algeria",
		"age": 0,
		"profile_completion": 57,
		"profile_completion_missing": [
			"first_name",
			"last_name",
			"facebook",
			"google",
			"twitter",
			"linkedin",
			"instagram",
			"phone_number",
			"interest",
			"pets",
			"live_with",
			"car",
			"religion",
			"smoke",
			"drink",
			"travel"
		]
	}
?>';
echo '
<pre>' . htmlspecialchars($code) . '</pre>
';
?>
                            </code>
                        </li>
                    </ol>
            </div>
	</div>
</div>
<!-- End Terms  -->