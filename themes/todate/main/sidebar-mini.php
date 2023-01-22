<div class="to_sidebar_mini">
	<ul class="valign-wrapper">
		<li class="<?php if($data['name'] == 'find-matches'){ echo 'active';}?>">
			<a href="<?php echo $site_url;?>/find-matches">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9zm-8-3l3.359-3.359a2.25 2.25 0 1 0-3.182-3.182l-.177.177-.177-.177a2.25 2.25 0 1 0-3.182 3.182L12 17z" class="active_path" fill="currentColor"/></svg>
			</a>
		</li>
		<li class="<?php if($data['name'] == 'matches'){ echo 'active';}?>">
			<a href="<?php echo $site_url;?>/matches" data-ajax="/matches">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" class="active_path" fill="currentColor"/></svg>
			</a>
		</li>
		<li class="<?php if($data['name'] == 'visits'){ echo 'active';}?>">
			<a href="<?php echo $site_url;?>/visits" data-ajax="/visits">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" class="active_path" fill="currentColor"/></svg>
			</a>
		</li>
		<li>
			<a onclick="javascript:$('body').toggleClass('side_open');"><img src="<?php echo $profile->avater->avater;?>" class="circle" alt="<?php echo $profile->full_name;?>" /></a>
		</li>
	</ul>
</div>