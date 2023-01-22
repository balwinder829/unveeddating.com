<?php global $site_url;?>
<div class="col l3 m4 s6 xs12" data-matches-uid="<?php echo $row->id?>">
	<div class="to_small_usr">
		<div class="card-image">
			<a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><img src="<?php echo GetMedia('',false); ?><?php echo $row->avater?>" alt="<?php echo $row->username?>"></a>
			<?php if( (int)$row->id !== (int)auth()->id ){ ?>
                <button id="like_btn<?php echo $row->id;?>" data-userid="<?php echo $row->id;?>" class="btn to_small_not like" data-ajax-post="/useractions/unmatche" data-ajax-params="userid=<?php echo $row->id?>&username=<?php echo $row->username?>" data-ajax-callback="callback_unmatches">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M1,4.27L2.28,3L20,20.72L18.73,22L15.18,18.44L13.45,20.03L12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,7.55 2.23,6.67 2.63,5.9L1,4.27M7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,11.07 20.42,13.32 17.79,15.97L5.27,3.45C5.95,3.16 6.7,3 7.5,3Z"/></svg>
                </button>
			<?php } ?>
			<div class="card-content">
				<div class="card-content-info">
					<h3><a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><?php echo ($row->first_name !== '' ) ? $row->first_name . ' ' . $row->last_name : $row->username;?></a> <?php if((int)abs(((strtotime(date('Y-m-d H:i:s')) - $row->lastseen))) < 60 && (int)$row->online == 1) { echo '<div class="useronline"></div>'; }?></h3>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="currentColor"></path></svg> <span class="time ajax-time age" title="<?php echo $row->created_at;?>"><?php echo get_time_ago( $row->created_at );?></span></div>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"></path></svg> <?php echo $row->country_txt?></div>
				</div>
			</div>
		</div>
    </div>
</div>