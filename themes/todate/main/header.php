<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title'];?></title>
    <?php require( $theme_path . 'main' . $_DS . 'meta.php' );?>
    <?php require( $theme_path . 'main' . $_DS . 'style.php' );?>
    <?php require( $theme_path . 'main' . $_DS . 'custom-header-js.php' );?>
    <?php
    if($config->push == 1) {
        require($theme_path . 'main' . $_DS . 'onesignal.php');
    }
    ?>
    <?php require( $theme_path . 'main' . $_DS . 'ajax.php' );?>
    <?php if($config->credit_earn_system == 1){?>
    <?php $config->isDailyCredit = RecordDailyCredit();?>
    <?php }?>
</head>
<body class="<?php echo $data['name'];?>-page">
    <?php echo openssl_decrypt($config->google_tag_code, "AES-128-ECB", 'mysecretkey1234');?>
    <div id="loader" class="dt_ajax_progress"></div>
	
	<div class="modal" id="authorize_modal" role="dialog" data-keyboard="false">
		<div class="modal-content">
			<h4><?php echo __('Check out');?></h4>
			<form class="form form-horizontal" method="post" id="authorize_form" action="#">
				<div class="modal-body authorize_modal">
					<div id="authorize_alert"></div>
					<div class="clear"></div>
					<div class="row">
						<div class="col s12">
							<div class="to_mat_input">
								<input id="authorize_number" class="browser-default" type="text" placeholder="<?php echo __( 'card number' );?>">
								<label for="authorize_number"><?php echo __( 'card number' );?></label>
							</div>
						</div>
						<div class="col s4">
							<div class="to_mat_input">
								<select id="authorize_month" name="card_month" class="browser-default pp_select_has_label">
									<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
								</select>
								<label for="authorize_month"><?php echo __( 'month' );?></label>
							</div>
						</div>
						<div class="col s4 no-padding-both">
							<div class="to_mat_input">
								<select id="authorize_year" name="card_year" class="browser-default pp_select_has_label">
									<?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
                                        <option value="<?php echo($i) ?>"><?php echo($i) ?></option>
                                    <?php } ?>
								</select>
								<label for="authorize_year"><?php echo __( 'year' );?></label>
							</div>
						</div>
						<div class="col s4">
							<div class="to_mat_input">
								<input id="authorize_cvc" name="card_cvc" class="browser-default" type="text" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
								<label for="authorize_cvc">CVC</label>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
					<button class="modal-close waves-effect btn-flat"><?php echo __( 'Cancel' );?></button>
					<button type="button" class="btn btn_primary" onclick="AuthorizeRequest()" id="authorize_btn"><?php echo __('pay');?></button>
				</div>
			</form>
		</div>
    </div>
    <div class="modal" id="paystack_wallet_modal" role="dialog" data-keyboard="false">
		<div class="modal-content">
			<h4><?php echo __( 'PayStack');?></h4>
			<form class="form form-horizontal" method="post" id="paystack_wallet_form" action="#">
				<div class="modal-body twocheckout_modal">
					<div id="paystack_wallet_alert"></div>
					<div class="clear"></div>
					<div class="to_mat_input">
						<input id="paystack_wallet_email" class="browser-default" type="email" placeholder="<?php echo __( 'email' );?>">
						<label for="paystack_wallet_email"><?php echo __( 'email' );?></label>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
                    <button class="modal-close waves-effect btn-flat"><?php echo __( 'Cancel' );?></button>
					<button type="button" class="btn btn_primary" id="paystack_btn" onclick="InitializeWalletPaystack()"><?php echo __( 'Confirm' );?></button>
				</div>
			</form>
		</div>
    </div>
