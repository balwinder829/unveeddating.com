<?php require( $theme_path . 'main' . $_DS . 'mini-sidebar.php' );?>
<script src="<?php echo $theme_url . 'assets/js/tinymce/js/tinymce/tinymce.min.js'; ?>"></script>
<div class="container dt_user_profile_parent find_matches_cont">
    <!-- display gps not enable message - see header js -->
    <div class="alert alert-warning hide" role="alert" id="gps_not_enabled">
        <p><?php echo __( 'Please Enable Location Services on your browser.' );?></p>
    </div>
    <script>
        var gps_not_enabled = document.querySelector('#gps_not_enabled');
        if( window.gps_is_not_enabled == true ){
            gps_not_enabled.classList.remove('hide');
        }
    </script>

    <div class="row r_margin">
		<div class="col l3">
			<?php require( $theme_path . 'main' . $_DS . 'sidebar.php' );?>
		</div>
        <div class="col m9">
			<div class="center dt_sections qd_rstroy_quote">
				<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m205.841 13.026c-16.922-17.273-44.783-17.269-62.274-.573l-3.117 2.976c-2.017 1.926-5.191 1.926-7.208 0l-3.117-2.976c-17.491-16.697-45.352-16.7-62.274.573-17.194 17.55-16.678 45.714 1.039 62.626 1.262 1.205 50.311 48.026 64.355 61.433 2.017 1.926 5.185 1.926 7.202 0 14.045-13.407 63.093-60.228 64.355-61.433 17.717-16.913 18.233-45.076 1.039-62.626z" fill="#ff656f"/><path d="m115.247 63.086c-17.17-16.39-18.185-43.344-2.584-60.968-15.381-4.877-32.836-1.318-44.814 10.908-17.194 17.55-16.678 45.713 1.04 62.626 1.262 1.205 50.311 48.026 64.355 61.433 2.017 1.925 5.185 1.925 7.202 0 5.26-5.021 15.43-14.729 26.16-24.972-19.834-18.933-50.367-48.079-51.359-49.027z" fill="#ff4756"/><path d="m419.719 269.561-226.577-68.891c-39.792-21.97-90.854-16.445-124.001 17.388-40.27 41.105-39.062 107.066 2.435 146.678 2.956 2.822 117.833 112.481 150.727 143.882 4.724 4.51 12.144 4.51 16.868 0 32.894-31.4 147.771-141.06 150.727-143.882 26.602-25.393 36.646-61.614 29.821-95.175z" fill="#ff656f"/><path d="m117.934 352.17c-41.497-39.612-42.705-105.572-2.435-146.678 7.113-7.26 15.055-13.207 23.529-17.868-25.524.777-50.706 10.855-69.887 30.434-40.27 41.105-39.062 107.066 2.435 146.678 2.956 2.822 117.833 112.481 150.727 143.882 4.724 4.51 12.144 4.51 16.868 0 5.269-5.03 12.648-12.074 21.327-20.358-40.449-38.612-139.818-133.468-142.564-136.09z" fill="#ff4756"/><path d="m450.698 134.045c-29.088-29.691-76.979-29.685-107.045-.984l-5.358 5.115c-3.467 3.31-8.924 3.31-12.391 0l-5.358-5.115c-30.066-28.7-77.957-28.707-107.045.984-29.555 30.168-28.669 78.578 1.787 107.65 2.169 2.071 86.481 82.553 110.622 105.598 3.467 3.31 8.913 3.31 12.38 0 24.142-23.045 108.453-103.527 110.622-105.598 30.454-29.072 31.341-77.482 1.786-107.65z" fill="#ff656f"/><path d="m261.644 229.129c-30.455-29.072-31.342-77.482-1.787-107.65 3.611-3.685 7.512-6.911 11.632-9.683-20.967-1.182-42.236 6.168-57.99 22.249-29.555 30.168-28.669 78.578 1.787 107.65 2.17 2.071 86.481 82.553 110.622 105.598 3.467 3.31 8.912 3.31 12.38 0 5.387-5.142 13.774-13.148 23.571-22.5-31.909-30.46-98.293-93.829-100.215-95.664z" fill="#ff4756"/></svg>
				<div class="dt_get_start_circle-1"></div>
				<div class="dt_get_start_circle-2"></div>
				<div class="dt_get_start_circle-3"></div>
				<h2><?php echo $data['story']['quote'];?></h2>
				<time><?php echo $data['story']['story_date'] ;?></time>
				<div class="">
					<div class="qd_rstroy_thumbs">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
							<defs><pattern id="user_1" patternUnits="userSpaceOnUse" width="100" height="100"><image xlink:href="<?php echo $data['story']['user1Data']->avater->avater;?>" x="0" y="0" width="100%"></image></pattern></defs>
							<path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" fill="url(#user_1)"></path>
						</svg>
						<h5 class="truncate"><?php echo $data['story']['user1Data']->full_name.$data['story']['user1Data']->pro_icon;?></h5>
					</div>
					<div class="qd_rstroy_with">
						<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="180.5" x2="180.5" y1="512" y2="211"><stop offset="0" stop-color="#fd3a84"/><stop offset="1" stop-color="#ffa68d"/></linearGradient><linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="332.077" x2="332.077" y1="301" y2="0"><stop offset="0" stop-color="#ffc2cc"/><stop offset="1" stop-color="#fff2f4"/></linearGradient><g><g><g><path d="m353.092 274.188c-2.991-7.813-88.942-63.42-96.016-62.984-27.942 1.714-52.448 14.389-70.868 36.656-1.806 2.183-3.468 4.354-4.992 6.478-1.833-2.624-3.868-5.307-6.117-7.985-19.425-23.128-45.614-35.353-75.734-35.353-27.451 0-52.828 11.116-71.456 31.3-17.998 19.501-27.909 45.406-27.909 72.942 0 26.744 9.435 50.06 29.691 73.379 17.648 20.316 41.819 39.208 72.421 63.124 20.737 16.208 44.241 34.577 69.641 56.59 2.819 2.443 6.321 3.665 9.824 3.665s7.005-1.222 9.824-3.665c24.189-20.965 46.687-38.71 66.535-54.368 30.908-24.381 55.321-43.639 73.138-64.312 20.417-23.689 29.926-47.334 29.926-74.413 0-13.154-2.809-27.734-7.908-41.054z" fill="url(#SVGID_1_)"/></g></g><g><g><path d="m490.492 38.527c-12.7-17.576-36.316-38.527-76.704-38.527-30.054 0-56.403 12.181-76.202 35.225-2.34 2.724-4.458 5.454-6.365 8.12-1.834-2.626-3.87-5.312-6.122-7.992-19.425-23.128-45.614-35.353-75.734-35.353-27.427 0-52.486 11.188-70.563 31.502-17.185 19.313-26.648 45.146-26.648 72.74 0 57.286 40.79 89.495 102.532 138.249 19.956 15.757 42.573 33.617 67.066 54.844 2.819 2.443 6.321 3.665 9.824 3.665s7.005-1.222 9.824-3.665c24.608-21.327 47.519-39.313 67.73-55.182 30.785-24.169 55.102-43.259 72.906-63.818 20.443-23.604 29.964-47.147 29.964-74.093 0-22.51-8.04-47.077-21.508-65.715z" fill="url(#SVGID_2_)"/></g></g></g></svg>
					</div>
					<div class="qd_rstroy_thumbs">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
							<defs><pattern id="user_2" patternUnits="userSpaceOnUse" width="100" height="100"><image xlink:href="<?php echo $data['story']['user2Data']->avater->avater;?>" x="0" y="0" width="100%"></image></pattern></defs>
							<path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" fill="url(#user_2)"></path>
						</svg>
						<h5 class="truncate"><?php echo $data['story']['user2Data']->full_name.$data['story']['user1Data']->pro_icon;?></h5>
					</div>
				</div>
			</div>
            <div class="dt_sections qd_rstroy_content">
				<?php echo br2nl( html_entity_decode( $data['story']['description'] ));?>
			</div>
        </div>
		<div class="col m2"></div>
    </div>
</div>