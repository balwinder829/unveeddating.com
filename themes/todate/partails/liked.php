<?php global $site_url;?>
<div class="col l3 m4 s6 xs12" data-liked-uid="<?php echo $row->id?>">
	<div class="to_small_usr">
		<div class="card-image">
			<a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><img src="<?php echo GetMedia('',false); ?><?php echo $row->avater?>" alt="<?php echo $row->username?>"></a>
			<?php if( (int)$row->id !== (int)auth()->id ){ ?>
                <button id="like_btn" class="btn to_small_not like" data-ajax-post="/useractions/remove_like" data-ajax-params="userid=<?php echo $row->id?>" data-ajax-callback="callback_liked_remove_like">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M1,4.27L2.28,3L20,20.72L18.73,22L15.18,18.44L13.45,20.03L12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,7.55 2.23,6.67 2.63,5.9L1,4.27M7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,11.07 20.42,13.32 17.79,15.97L5.27,3.45C5.95,3.16 6.7,3 7.5,3Z"/></svg>
                </button>
			<?php } ?>
			<div class="card-content">
				<div class="card-content-info">
					<h3><a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><?php echo ($row->first_name !== '' ) ? $row->first_name . ' ' . $row->last_name : $row->username;?></a> <?php if((int)abs(((strtotime(date('Y-m-d H:i:s')) - $row->lastseen))) < 60 && (int)$row->online == 1) { echo '<div class="useronline"></div>'; }?></h3>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13 14.062V22H4a8 8 0 0 1 9-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm5.793 6.914l3.535-3.535 1.415 1.414-4.95 4.95-3.536-3.536 1.415-1.414 2.12 2.121z" fill="currentColor"></path></svg> <span class="time ajax-time age" title="<?php echo $row->created_at;?>"><?php echo get_time_ago( strtotime($row->created_at) );?></span></div>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"></path></svg> <?php echo (isset(Dataset::load('countries')[$row->country]) ) ? Dataset::load('countries')[$row->country]['name'] : $row->country; ?></div>
				</div>
			</div>
		</div>
    </div>
</div>