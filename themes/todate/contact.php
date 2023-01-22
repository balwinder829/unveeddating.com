<div class="to_page_main_head contact">
	<div class="container">
		<h2><?php echo __( 'Contact Us' );?></h2>
	</div>
</div>
<div class="container dt_contact">
    <div class="row r_margin mb-0">
        <div class="col m12 l2"></div>
		<form method="POST" action="/shared/contact" class="col m12 l8">
			<div class="dt_settings">
				<div class="alert alert-danger" role="alert" style="display:none;"></div>
				<div class="alert alert-success" role="alert" style="display:none;"></div>
				<div class="row mb-0">
					<div class="col m6 s12">
						<div class="to_mat_input">
							<input id="first_name" name="first_name" class="browser-default" type="text" placeholder="<?php echo __( 'First Name' );?>" required>
							<label for="first_name"><?php echo __( 'First Name' );?></label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="to_mat_input">
							<input id="last_name" name="last_name" class="browser-default" type="text" placeholder="<?php echo __( 'Last Name' );?>">
							<label for="last_name"><?php echo __( 'Last Name' );?></label>
						</div>
					</div>
				</div>
				<div class="to_mat_input">
					<input id="email" name="email" class="browser-default" type="email" placeholder="<?php echo __( 'Email' );?>" required>
					<label for="email"><?php echo __( 'Email' );?></label>
				</div>
				<div class="to_mat_input">
					<textarea id="how_we_can_help" name="message" rows="6" placeholder="<?php echo __( 'How can we help?' );?>"></textarea>
					<label for="how_we_can_help"><?php echo __( 'How can we help?' );?></label>
				</div>
				<div class="dt_sett_footer">
                    <button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" type="submit" name="action"><span><?php echo __( 'Send' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
				</div>
			</div>
		</form>
		<div class="col m12 l2"></div>
	</div>
</div>