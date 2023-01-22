<div class="to_auth_page">
	<div class="login_page singl_auth_pg">
		<div class="header_logo">
			<a id="logo-container" href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo.png" /></a>
		</div>
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Two-factor authentication' );?></h4>
				<p><?php echo __( 'To log in, you need to verify your identity.' );?></p>
				<p>
					<?php
						if ($config->two_factor_type == 'both') {
							echo __('We have sent you the confirmation code to your phone and to your email address.');
						} else if ($config->two_factor_type == 'email') {
							echo __('We have sent you the confirmation code to your email address.');
						} else if ($config->two_factor_type == 'phone') {
							echo __('We have sent you the confirmation code to your phone number.');
						}
					?>
				</p>
				<form method="POST" action="/Useractions/login" class="login unusual_login">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="to_mat_input">
						<input id="confirm_code" name="confirm_code" type="text" class="browser-default" placeholder="<?php echo __( 'Confirmation code' );?>" required autofocus>
						<label for="confirm_code"><?php echo __( 'Confirmation code' );?></label>
					</div>
					<div class="dt_login_footer">
						<button class="btn btn-large bold btn_primary" type="button" id="btn_confirm" name="action"><?php echo __( 'Proceed' );?></button>
					</div>		
					<div class="clear"></div>
				</form>
			</div>    
		</div>
	</div>
</div>

<!-- End Login  -->
<script>
$(function () {
    $('#btn_confirm').click(function(e){
        e.preventDefault();
		var button = $(this);
        var button_text = button.find('span').text();
		
        let confirm_code = $('#confirm_code').val();
        if(confirm_code === ''){
            alert('<?php echo __("Please enter confirmation code.");?>');
            return false;
        }
		button.addClass( 'disabled' );
        let formData = new FormData();
        formData.append("confirm_code", confirm_code);

        $.ajax({
            type: 'POST',
            url: window.ajax + 'profile/confirm_two_factor_confirmation_code',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
				button.removeClass( 'disabled' );
                button.find('span').text( button_text );
                if (data.status == 200) {
                    var date = new Date();
                    date.setTime(date.getTime()+(10 * 365 * 24 * 60 * 60 * 1000 ) );
                    $.each(data.cookies, function(index, value) {
                        document.cookie = index + "=" + value + "; expires=" + date.toGMTString() + "; path=/";
                    });
                    setTimeout(function() {
                        window.location = data.url;
                    }, 2000);
                } else {
                    alert("<?php echo __('Error while login, please try again later.');?>");
                }
            },
            error: function (data) {
                button.removeClass( 'disabled' );
                button.find('span').text( button_text );
                if (data.responseJSON.status == 400) {
                    $('.unusual_login').find( '.alert-danger' ).html( data.responseJSON.message ).fadeIn( "fast" );
                    setTimeout(function() {
                        $('.unusual_login').find( '.alert-danger' ).fadeOut( "fast" );
                    }, 5000);
                }
            }
        });

    });
});
</script>