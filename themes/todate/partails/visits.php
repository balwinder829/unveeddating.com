<?php global $site_url;?>
<div class="col l3 m4 s6 xs12" data-likes-uid="<?php echo $row->id?>">
	<div class="to_small_usr">
		<div class="card-image">
			<a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><img src="<?php echo GetMedia('',false); ?><?php echo $row->avater?>" alt="<?php echo $row->username?>"></a>
			<div class="card-content">
				<div class="card-content-info">
					<h3><a href="<?php echo $site_url;?>/@<?php echo $row->username?>" data-ajax="/@<?php echo $row->username?>"><?php echo ($row->first_name !== '' ) ? $row->first_name . ' ' . $row->last_name : $row->username;?></a> <?php if((int)abs(((strtotime(date('Y-m-d H:i:s')) - $row->lastseen))) < 60 && (int)$row->online == 1) { echo '<div class="useronline"></div>'; }?></h3>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" fill="currentColor"></path></svg> <span class="time ajax-time age" title="<?php echo $row->created_at;?>"><?php echo get_time_ago( strtotime($row->created_at) );?></span></div>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="currentColor"></path></svg> <?php echo $row->country_txt?></div>
				</div>
			</div>
		</div>
    </div>
</div>