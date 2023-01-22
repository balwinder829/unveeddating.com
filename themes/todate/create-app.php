<div class="container page-margin">
	<div class="row r_margin mb-0">
		<div class="col l1"></div>
		<form method="POST" id="add_new_app" class="col l10">
			<div class="dt_settings">
				<h2 class="user_sttng_panel_hd"><?php echo __( 'Create new App' );?></h2>
				<div class="alert alert-success" role="alert" style="display:none;"></div>
				<div class="alert alert-danger" role="alert" style="display:none;"></div>
				<div class="row mb-0">
					<div class="col m6 s12">
						<div class="to_mat_input">
							<input id="app_name" class="browser-default" type="text" placeholder="<?php echo __( 'Name' );?>" autofocus="">
							<label for="app_name"><?php echo __( 'Name' );?></label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="to_mat_input">
							<input id="app_website_url" name="app_website_url" class="browser-default" type="text" placeholder="<?php echo __( 'Domain' );?>">
							<label for="app_website_url"><?php echo __( 'Domain' );?></label>
						</div>
					</div>
				</div>
				<div class="to_mat_input">
					<input id="app_callback_url" name="app_callback_url" class="browser-default" type="url" placeholder="<?php echo __( 'Redirect URI' );?>">
					<label for="app_callback_url"><?php echo __( 'Redirect URI' );?></label>
				</div>
				<div class="to_mat_input">
					<textarea name="app_description" id="app_description" rows="5" placeholder="<?php echo __( 'Description' );?>"></textarea>
					<label for="app_description"><?php echo __( 'Description' );?></label>
				</div>
                <label><?php echo __( 'Thumbnail' );?> </label>
				<input type="file" id="app_avatar" class="hide" accept="image/x-png, image/gif, image/jpeg" name="app_avatar">
				<span class="dt_selct_avatar dt_create_apps_img" onclick="document.getElementById('app_avatar').click(); return false">
					<span class="svg-empty"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5,3A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H14.09C14.03,20.67 14,20.34 14,20C14,19.32 14.12,18.64 14.35,18H5L8.5,13.5L11,16.5L14.5,12L16.73,14.97C17.7,14.34 18.84,14 20,14C20.34,14 20.67,14.03 21,14.09V5C21,3.89 20.1,3 19,3H5M19,16V19H16V21H19V24H21V21H24V19H21V16H19Z"></svg></span>
				</span>
                <div class="dt_sett_footer">
                    <button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" type="button" name="action" id="submit_app"><span><?php echo __( 'Publish' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
                </div>
			</div>
		</form>
		<div class="col l1"></div>
	</div>
</div>

<script>
    $(document).ready(function(){
		$("#app_avatar").change(function(event) {
			$(".dt_selct_avatar").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
		});
	
        $( document ).on( 'click', '#submit_app', function(e) {
            e.preventDefault();
            image = document.getElementById("app_avatar").files[0];
            var formData = new FormData();
                formData.append('app_name',$('#app_name').val());
                formData.append('app_website_url',$('#app_website_url').val());
                formData.append('app_callback_url',$('#app_callback_url').val());
                formData.append('app_description',$('#app_description').val());
                formData.append("app_avatar", image);
            url = window.ajax + 'apps/add_new_app' + window.maintenance_mode;
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false
            }).done(function (data) {
                if(data.status == 200){
                    window.location.href = data.location;
                }
            }).fail(function (data) {
                $('form#add_new_app').find('.alert-danger').html(data.responseJSON.message).fadeIn("fast");
                setTimeout(function() {
                    $('form#add_new_app').find( '.alert-danger' ).fadeOut( "fast" );
                }, 2000);
            });

        });
    });
</script>