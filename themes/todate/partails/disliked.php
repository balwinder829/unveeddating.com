<?php global $site_url;?>
<div class="col l3 m4 s6 xs12" data-disliked-uid="<?php echo $row->id?>">
	<div class="to_small_usr">
		<div class="card-image">
			<a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><img src="<?php echo GetMedia('',false); ?><?php echo $row->avater?>" alt="<?php echo $row->username?>"></a>
			<?php if( (int)$row->id !== (int)auth()->id ){ ?>
                <button id="like_btn" class="btn to_small_not like" data-ajax-post="/useractions/remove_dislike" data-ajax-params="userid=<?php echo $row->id?>" data-ajax-callback="callback_disliked_remove_dislike">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5zm6.414 8l1.768-1.768-1.414-1.414L12 12.586l-1.768-1.768-1.414 1.414L10.586 14l-1.768 1.768 1.414 1.414L12 15.414l1.768 1.768 1.414-1.414L13.414 14zM9 4v2h6V4H9z"/></svg>
                </button>
			<?php } ?>
			<div class="card-content">
				<div class="card-content-info">
					<h3><a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><?php echo ($row->first_name !== '' ) ? $row->first_name . ' ' . $row->last_name : $row->username;?></a> <?php if((int)abs(((strtotime(date('Y-m-d H:i:s')) - $row->lastseen))) < 60 && (int)$row->online == 1) { echo '<div class="useronline"></div>'; }?></h3>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M22 15h-3V3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zm-5.293 1.293l-6.4 6.4a.5.5 0 0 1-.654.047L8.8 22.1a1.5 1.5 0 0 1-.553-1.57L9.4 16H3a2 2 0 0 1-2-2v-2.104a2 2 0 0 1 .15-.762L4.246 3.62A1 1 0 0 1 5.17 3H16a1 1 0 0 1 1 1v11.586a1 1 0 0 1-.293.707z" fill="currentColor"></path></svg> <span class="time ajax-time age" title="<?php echo $row->created_at;?>"><?php echo get_time_ago( strtotime($row->created_at) );?></span></div>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"></path></svg> <?php echo $row->country_txt?></div>
				</div>
			</div>
		</div>
    </div>
</div>