<?php if( isGenderFree($profile->gender) === true ){?><script>window.location = window.site_url;</script><?php } ?>
<?php //$profile = auth();?>
<?php require( $theme_path . 'main' . $_DS . 'mini-sidebar.php' );?>
<!-- Credits  -->
<div class="container page-margin find_matches_cont">
	<div class="row r_margin">
		<div class="col l3">
			<?php require( $theme_path . 'main' . $_DS . 'sidebar.php' );?>
		</div>
		
		<div class="col l9">
			<?php if (file_exists($theme_path . 'third-party-payment.php')) { ?>
				<?php require( $theme_path . 'third-party-payment.php' );?>
			<?php } ?>
			<div class="dt_credits dt_sections">
				<h4 class="bold">
					<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M14 2a8 8 0 0 1 3.292 15.293A8 8 0 1 1 6.706 6.707 8.003 8.003 0 0 1 14 2zm-3 7H9v1a2.5 2.5 0 0 0-.164 4.995L9 15h2l.09.008a.5.5 0 0 1 0 .984L11 16H7v2h2v1h2v-1a2.5 2.5 0 0 0 .164-4.995L11 13H9l-.09-.008a.5.5 0 0 1 0-.984L9 12h4v-2h-2V9zm3-5a5.985 5.985 0 0 0-4.484 2.013 8 8 0 0 1 8.47 8.471A6 6 0 0 0 14 4z"></path></svg> <?php echo __( 'Credits' );?>
				</h4>
				<div class="qd_cred_bl">
					<div class="dt_get_start_circle-1"></div>
					<div class="dt_get_start_circle-2"></div>
					<div class="dt_get_start_circle-3"></div>
					<h2><span><?php echo (int)$profile->balance;?></span> <?php echo __( 'Credits' );?></h2>
					<p><?php echo __( 'Your' );?> <?php echo ucfirst( $config->site_name );?> <?php echo __( 'Credits balance' );?></p>
				</div>
				<?php if(IS_LOGGED == true){ ?>
                    <?php if($config->credit_earn_system == 1){?>
						<hr class="border_hr">
						<h4 class="bold">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M9,10V12H7V10H9M13,10V12H11V10H13M17,10V12H15V10H17M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H6V1H8V3H16V1H18V3H19M19,19V8H5V19H19M9,14V16H7V14H9M13,14V16H11V14H13M17,14V16H15V14H17Z"></path></svg> Daily Tribute
						</h4>
						<?php
							global $db;
							if($profile->reward_daily_credit == 1){
								$dates = $db->where('user_id', $profile->id)->get('daily_credits',null,array('from_unixtime( max(created_at) ) as DaysFromNow'));
						?>
							<p class="no_margin"><?php echo __( 'Congratulation!. you login to our site for' );?> <?php echo (int)$config->credit_earn_max_days;?> <?php echo __( 'days' );?>, <?php echo __( 'and you earn' );?> <?php echo (int)$config->credit_earn_max_days * (int)$config->credit_earn_day_amount;?> <?php echo __( 'credits' );?> , <span class="time ajax-time age" title="<?php echo $dates[0]['DaysFromNow'];?>"></span></p>
						<?php } else {
								$dates = $db->where('user_id', $profile->id)->get('daily_credits',null,array('count(*) as CountDays','TIMESTAMPDIFF(DAY, from_unixtime( max(created_at) ), from_unixtime( min(created_at) )) as TotalDays','TIMESTAMPDIFF(DAY, now() , from_unixtime( min(created_at) )) as DaysFromNow'));
						?>
							<p class="no_margin"><?php echo __( 'User who logs in consecutively for' );?> <?php echo (int)$config->credit_earn_max_days;?> <?php echo __( 'days' );?>, <?php echo __( 'and you earn' );?> <?php echo (int)$config->credit_earn_max_days * (int)$config->credit_earn_day_amount;?> <?php echo __( 'credits' );?></p>
							<p class="no_margin"><?php echo __( 'You currently logged in for' );?> <?php echo $dates[0]["CountDays"];?> <?php echo __( 'days' );?></p>
						<?php } ?>
                    <?php } ?>
                <?php } ?>
			</div>
			
			<div class="dt_credits dt_sections">
				<h4 class="bold">
					<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M12,16L19.36,10.27L21,9L12,2L3,9L4.63,10.27M12,18.54L4.62,12.81L3,14.07L12,21.07L21,14.07L19.37,12.8L12,18.54Z"></path></svg> <?php echo __( 'Use your Credits to' );?>
				</h4>
				<ul class="credit_ftr">
					<li>
						<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#ffe6e2"/><path d="m23.672 8.001c-3.123-.056-6.685 1.576-8.94 4.109-2.155.041-4.253.924-5.798 2.469-.09.089-.122.221-.083.341.04.12.144.208.27.226l2.569.368-.317.355c-.118.132-.112.333.013.458l4.285 4.285c.065.065.15.098.236.098.079 0 .159-.028.222-.085l.355-.317.368 2.569c.018.125.117.217.236.257.031.01.063.015.095.015.094 0 .191-.041.258-.107 1.524-1.523 2.406-3.621 2.447-5.776 2.536-2.259 4.181-5.82 4.109-8.94-.003-.177-.147-.32-.325-.325zm-3.072 5.755c-.325.325-.752.487-1.178.487-.427 0-.854-.162-1.179-.487-.649-.65-.649-1.707 0-2.357.65-.65 1.707-.65 2.357 0s.65 1.707 0 2.357z" fill="#fc573b"/><path d="m9.816 19.269c-.714.713-1.693 3.937-1.802 4.302-.035.118-.003.245.084.331.063.064.148.098.235.098.032 0 .064-.005.096-.014.365-.109 3.588-1.089 4.302-1.803.804-.804.804-2.111 0-2.914-.804-.804-2.111-.803-2.915 0z" fill="#fd907e"/></svg> <?php echo __( 'Boost your profile' );?>
					</li>
					<li>
						<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#f5e6fe"/></g><g id="bold"><path d="m22.833 11.367h-13.666c-.64 0-1.167.527-1.167 1.167v2.333c0 .64.527 1.167 1.167 1.167h.167.5.5 5.166 1 5.167.5.5.167c.64 0 1.167-.527 1.167-1.167v-2.333c-.001-.64-.528-1.167-1.168-1.167z" fill="#be63f9"/><path d="m9.833 17.034h-.5v5.166c0 1.013.82 1.833 1.833 1.833h4.334v-.5-.5-6h-5.167-.5z" fill="#d9a4fc"/><path d="m21.667 17.034h-5.167v6 .5.5h4.333c1.013 0 1.833-.82 1.833-1.833v-5.167h-.5z" fill="#d9a4fc"/><path d="m19.149 8.635c-.668-.667-1.831-.668-2.498 0-.243.243-.465.748-.651 1.286-.186-.537-.408-1.043-.651-1.286-.667-.668-1.83-.668-2.498 0-.334.333-.518.777-.518 1.249s.184.916.518 1.249c.555.554 2.468 1.012 3.041 1.139.036.008.072.012.108.012s.072-.004.108-.012c.573-.127 2.486-.585 3.041-1.139.334-.334.518-.777.518-1.249s-.184-.916-.518-1.249zm-5.591 1.791c-.145-.145-.225-.338-.225-.542s.079-.397.225-.542c.145-.145.337-.225.542-.225.204 0 .397.08.542.224.176.176.45.943.673 1.757-.814-.223-1.581-.496-1.757-.672zm4.884 0c-.176.176-.943.449-1.757.672.223-.813.496-1.58.673-1.757.145-.145.337-.224.542-.224s.397.08.542.225.225.337.225.542-.08.397-.225.542z" fill="#be63f9"/></g></svg> <?php echo __( 'Send a gift' );?>
					</li>
					<li>
						<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#fff9dd"/><path d="m23.766 17.709-2.58-6.859c0-.001-.001-.003-.001-.004l-.001-.001c-.34-.904-1.218-1.512-2.184-1.512s-1.844.607-2.185 1.513c-.098.263-.148.539-.148.821v3h-1.333v-3c0-1.286-1.047-2.333-2.333-2.333-.966 0-1.844.607-2.185 1.513 0 .001-.001.003-.001.004l-2.579 6.858v.001c-.157.412-.236.846-.236 1.29 0 2.022 1.645 3.667 3.667 3.667s3.667-1.645 3.667-3.667v-.333h1.333v.333c0 2.022 1.645 3.667 3.667 3.667s3.666-1.645 3.666-3.667c0-.444-.079-.878-.234-1.291zm-12.099 3.624c-1.286 0-2.333-1.047-2.333-2.333 0-.283.05-.559.148-.821.34-.904 1.218-1.512 2.185-1.512 1.286 0 2.333 1.047 2.333 2.333s-1.047 2.333-2.333 2.333zm8.666 0c-1.286 0-2.333-1.047-2.333-2.333s1.047-2.333 2.333-2.333c.967 0 1.844.608 2.185 1.512.098.262.148.538.148.821.001 1.286-1.046 2.333-2.333 2.333z" fill="#ffd200"/></svg> <?php echo __( 'Get seen 100x in Discover' );?>
					</li>
					<li>
						<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#e3f8fa"/></g><path d="m20.406 17.342h-8.811c-.324 0-.602-.233-.657-.553l-.928-5.342c-.043-.247.055-.497.254-.647.2-.151.466-.177.691-.069l2.451 1.181 2.012-3.577c.236-.42.926-.42 1.161 0l2.012 3.577 2.451-1.181c.225-.108.491-.082.691.069.199.151.298.401.255.647l-.928 5.342c-.053.319-.33.553-.654.553z" fill="#26c6da"/><path d="m20.473 21.248c-.22-.113-.487-.1-.687.047-.233.16-.307.14-.36.093l-.553-.681c-.367-.447-.947-.694-1.54-.694-.313 0-.633.067-.927.214-.147.067-.333.067-.48 0-.293-.147-.613-.214-.927-.214-.593 0-1.173.247-1.54.694l-.553.681c-.053.047-.127.067-.36-.093-.2-.14-.467-.16-.687-.047-.22.114-.36.341-.36.594 0 1.202 1.127 2.177 2.513 2.177.813 0 1.573-.26 2.153-.735.573.474 1.34.735 2.153.735 1.387 0 2.513-.975 2.513-2.177.002-.254-.138-.481-.358-.594z" fill="#8ce1eb"/></svg> <?php echo __( 'Put yourself First in Search' );?>
					</li>
					<li>
						<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m26.042 32.042h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.313-2.687 6-6 6z" fill="#ffe6e2"/><path d="m19.587 8.667c-1.443 0-2.771.698-3.587 1.836-.816-1.137-2.144-1.836-3.587-1.836-2.433 0-4.413 1.976-4.413 4.404 0 4.321 6.596 9.473 7.189 9.927.212.214.504.335.811.335s.599-.121.811-.335c.593-.454 7.189-5.606 7.189-9.927 0-2.428-1.98-4.404-4.413-4.404z" fill="#fc573b"/></svg> <?php echo __( 'Double your chances for a friendship' );?>
					</li>
					<li>
						<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#fff9dd"/></g><g id="bold"><path d="m16 8h-.007c-.01 0-.019.005-.029.006-.052.002-.102.012-.15.03-.007.003-.014.004-.02.007-.057.024-.111.055-.157.099l-7.487 7.334c-.112.11-.163.264-.145.415-.001.036-.005.07-.005.109 0 4.411 3.589 8 8 8s8-3.589 8-8-3.589-8-8-8zm-6.097 7.16 5.382-5.272c-.65 2.62-2.747 4.674-5.382 5.272zm6.394 4.484c-.111.195-.34.294-.557.239l-2.02-.505 1.08 1.081c.195.195.195.512 0 .707-.098.098-.226.146-.354.146s-.256-.049-.354-.146l-2.357-2.357c-.159-.159-.192-.404-.082-.6.111-.196.338-.297.557-.239l2.02.505-1.08-1.081c-.195-.195-.195-.512 0-.707s.512-.195.707 0l2.357 2.357c.16.159.194.405.083.6zm2.276-2.25-1.414 1.414c-.098.098-.226.146-.354.146s-.256-.049-.354-.146l-2.357-2.357c-.094-.094-.146-.221-.146-.354s.053-.26.146-.354l1.414-1.414c.195-.195.512-.195.707 0s.195.512 0 .707l-1.061 1.061.472.471 1.061-1.061c.195-.195.512-.195.707 0s.195.512 0 .707l-1.061 1.061.471.471 1.061-1.061c.195-.195.512-.195.707 0 .196.197.196.514.001.709zm2.387-2.391c-.142.171-.377.227-.581.14l-.501-.215.215.501c.087.204.03.44-.14.581-.092.077-.206.116-.32.116-.096 0-.193-.028-.277-.084l-2.828-1.885c-.23-.153-.292-.464-.139-.693.153-.23.464-.292.693-.139l1.429.952-.045-.104c-.08-.188-.038-.406.106-.551.145-.145.363-.188.55-.106l.104.045-.953-1.43c-.153-.23-.091-.54.139-.693.229-.153.54-.092.693.139l1.885 2.829c.125.184.112.427-.03.597z" fill="#ffd200"/></g></svg> <?php echo __( 'Get additional Stickers' );?>
					</li>
				</ul>
			</div>
			
			<div class="dt_credits dt_sections">
				<h4 class="bold">
					<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path></svg> <?php echo __( 'Buy Credits' );?>
				</h4>
				<div class="credit_pln">
					<div class="dt_plans">
						<p>
							<input type="radio" name="plans" id="plan_1" value="<?php echo __( 'Bag of Credits' ) . " " . (int)$config->bag_of_credits_amount;?>" data-price="<?php echo (int)$config->bag_of_credits_price;?>">
							<label for="plan_1" class="plan_1">
								<span class="title"><?php echo __( 'Bag of Credits' );?></span>
								<b><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z"></path></svg> <?php echo (int)$config->bag_of_credits_amount;?></b>
								<img src="<?php echo $theme_url;?>assets/img/credits/bag.svg" alt="<?php echo __( 'Bag of Credits' );?>"/>
								<span class="amount"><?php echo $config->currency_symbol . (int)$config->bag_of_credits_price;?></span>
							</label>
						</p>
						<p>
							<input type="radio" name="plans" id="plan_2" value="<?php echo __( 'Box of Credits' ) . " " .(int)$config->box_of_credits_amount;?>" data-price="<?php echo (int)$config->box_of_credits_price;?>">
							<label for="plan_2" class="plan_2">
								<span class="title"><?php echo __( 'Box of Credits' );?></span>
								<b><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z"></path></svg> <?php echo (int)$config->box_of_credits_amount;?></b>
								<img src="<?php echo $theme_url;?>assets/img/credits/box.svg" alt="<?php echo __( 'Box of Credits' );?>"/>
								<span class="amount"><?php echo $config->currency_symbol . (int)$config->box_of_credits_price;?></span>
							</label>
						</p>
						<p>
							<input type="radio" name="plans" id="plan_3" value="<?php echo __( 'Chest of Credits' ) . " " .(int)$config->chest_of_credits_amount;?>" data-price="<?php echo (int)$config->chest_of_credits_price;?>">
							<label for="plan_3" class="plan_3">
								<span class="title"><?php echo __( 'Chest of Credits' );?></span>
								<b><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z"></path></svg> <?php echo (int)$config->chest_of_credits_amount;?></b>
								<img src="<?php echo $theme_url;?>assets/img/credits/chest.svg" alt="<?php echo __( 'Chest of Credits' );?>"/>
								<span class="amount"><?php echo $config->currency_symbol . (int)$config->chest_of_credits_price;?></span>
							</label>
						</p>
					</div>
					<div class="pay_using hidden">
						<p class="bold"><?php echo __( 'Pay Using' );?></p>
						<?php
								$method_type = 'credits';
								require( $theme_path . 'partails' . $_DS . 'modals'. $_DS .'payment_methods.php' );?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Credits  -->

<a href="javascript:void(0);" id="btnProSuccess" style="visibility: hidden;display: none;"></a>


<script>
<?php if ($config->fluttewave_payment == 1) { ?>
	function open_fluttewave() {
		$('#fluttewave_modal').modal('open');
	}
	function SignatureFluttewave() {
		$('#fluttewave_btn').attr('disabled', true).text("<?php echo __('please_wait')?>");
		plans = document.getElementsByName('plans');
		var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }
		email = $('#fluttewave_email').val();
	    $.post(window.ajax + 'fluttewave/pay?pay_type=credits', {amount:price,email:email}, function(data) {
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
<?php if ($config->aamarpay_payment == '1') { ?>
	function pay_using_aamarpay() {
		$('#aamarpay_modal').modal('open');
	}
	function AamarpayRequest() {
		$('#aamarpay_button').html("<?php echo __('please_wait');?>");
		$('#aamarpay_button').attr('disabled','true');
		plans = document.getElementsByName('plans');
		var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }
		$.post(window.ajax + 'aamarpay/get',{price:price,name:$('#aamarpay_name').val(),email:$('#aamarpay_email').val(),phone:$('#aamarpay_number').val()}, function (data) {
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
<?php if ($config->ngenius_payment == '1') { ?>
	function pay_using_ngenius() {
		plans = document.getElementsByName('plans');
		var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }
		$.post(window.ajax + 'ngenius/get',{price:price}, function (data) {
	        if (data.status == 200) {
	        	location.href = data.url;
	        }
	    }).fail(function(data) {
    		M.toast({html: data.responseJSON.message});
		});
	}
<?php } ?>
<?php if ($config->coinpayments == '1') { ?>
	function pay_using_coinpayments() {
		plans = document.getElementsByName('plans');
		var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }
		$.post(window.ajax + 'coinpayments/get',{price:price}, function (data) {
	        if (data.status == 200) {
	        	location.href = data.url;
	        }
	    }).fail(function(data) {
    		M.toast({html: data.responseJSON.message});
		});
	}
<?php } ?>
<?php if ($config->fortumo_payment == '1' && !empty($config->fortumo_service_id)) { ?>
	function pay_using_fortumo() {
		$.post(window.ajax + 'fortumo/get', function (data) {
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
	    plans = document.getElementsByName('plans');
	    var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }


	    price = price * 100;
	    
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
	                url: window.ajax + 'razorpay/create',
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
<?php if ($config->yoomoney_payment == '1' && !empty($config->yoomoney_wallet_id)) { ?>
	function pay_using_yoomoney() {
	    plans = document.getElementsByName('plans');
	    var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }
	    $.post(window.ajax + 'yoomoney/create',{price:price,description:description}, function (data) {
	        if (data.status == 200) {
	        	$('body').append(data.html);
				document.getElementById("yoomoney_form").submit();
				$("#yoomoney_form").remove();
	        }
	    }).fail(function(data) {
    		M.toast({html: data.responseJSON.message});
		});
	}
<?php } ?>
<?php if ($config->coinbase_payment == '1' && !empty($config->coinbase_key)) { ?>
	function pay_using_coinbase() {
	    plans = document.getElementsByName('plans');
	    var price = 0;
	    var description = '';
	    for (index = 0; index < plans.length; index++) {
	        if (plans[index].checked) {
	            description = plans[index].value;
	            price = plans[index].getAttribute('data-price');
	            break;
	        }
	    }
	    $.post(window.ajax + 'coinbase/create',{price:price,description:description}, function (data) {
	        if (data.status == 200) {
	            window.location.href = data.url;
	        }
	    }).fail(function(data) {
    		M.toast({html: data.responseJSON.message});
		});
	}
<?php } ?>
<?php if ($config->securionpay_payment == 'yes') { ?>
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
    	$.post(window.ajax + 'securionpay/token', {type:'credit',price:price}, function(data, textStatus, xhr) {
    		if (data.status == 200) {
    			SecurionpayCheckout.open({
					checkoutRequest: data.token,
					name: 'Credits',
					description: getDescription()
				});
    		}
    	}).fail(function(data) {
    		M.toast({html: data.responseJSON.message});
		});
    }
<?php } ?>

<?php if ($config->authorize_payment == 'yes') { ?>
    function PayAuthorize(){
        $('#authorize_btn').attr('onclick', 'AuthorizeWalletRequest()');
        $('#authorize_modal').modal('open');
    }
    function AuthorizeWalletRequest() {
		$('#authorize_btn').html("<?php echo __('please_wait');?>");
	    $('#authorize_btn').attr('disabled','true');
		authorize_number = $('#authorize_number').val();
		authorize_month = $('#authorize_month').val();
		authorize_year = $('#authorize_year').val();
		authorize_cvc = $('#authorize_cvc').val();
		price = getPrice();
		$.post(window.ajax + 'authorize/pay', {type:'credit',card_number:authorize_number,card_month:authorize_month,card_year:authorize_year,card_cvc:authorize_cvc,price:price}, function(data) {
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
    function PayPaystack(){
        $('#paystack_btn').attr('onclick', 'InitializeWalletPaystack()');
        $('#paystack_wallet_modal').modal('open');
    }
    function InitializeWalletPaystack() {
		$('#paystack_btn').html("<?php echo __('please_wait');?>");
	    $('#paystack_btn').attr('disabled','true');
		email = $('#paystack_wallet_email').val();
		price = getPrice();
		$.post(window.ajax + 'paystack/initialize', {type:'credit',email:email,price:price}, function(data) {
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

<?php if ($config->checkout_payment == 'yes') { ?>
    function PayVia2Co(){
        $('#2checkout_type').val('credits');
        $('#2checkout_description').val(getDescription());
        $('#2checkout_price').val(getPrice());

        $('#2checkout_modal').modal('open');
    }
<?php } ?>

<?php if ($config->iyzipay_payment == "yes" && !empty($config->iyzipay_key) && !empty($config->iyzipay_secret_key)) { ?>
	function PayViaIyzipay(){
		$('.btn-iyzipay-payment').attr('disabled','true');

		$.post(window.ajax + 'iyzipay/createsession', {
            payType: 'credits',
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

    $('#cashfree_type').val('credits');
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
    window.location = window.ajax + 'sms/generate_credit_link?price=' + getPrice() + '00';
}
<?php } ?>
function getDescription() {
    var plans = document.getElementsByName('plans');
    for (index=0; index < plans.length; index++) {
        if (plans[index].checked) {
            return plans[index].value;
            break;
        }
    }
}

function getPrice() {
    var plans = document.getElementsByName('plans');
    for (index=0; index < plans.length; index++) {
        if (plans[index].checked) {
            return plans[index].getAttribute('data-price');
            break;
        }
    }
}
<?php if ($config->paypal_payment == '1') { ?>
document.getElementById('paypal').addEventListener('click', function(e) {
    $.post(window.ajax + 'paypal/generate_link', {description:getDescription(), amount:getPrice(), mode: "credits"}, function (data) {
        if (data.status == 200) {
            window.location.href = data.location;
        } else {
            $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> <?php echo __( 'Payment declined' );?> ');
        }
    });
        
    e.preventDefault();
});
<?php } ?>
<?php if($config->bank_payment == '1'){?>
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
        formData.append("mode", 'credits');
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
        payType: 'credits',
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
</script>