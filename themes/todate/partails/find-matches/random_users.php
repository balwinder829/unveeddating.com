<?php global $site_url;?>
<div class="col l3 m4 s6 xs12 random_user_item" data-uid="<?php echo $random_user->id;?>">
	<div class="to_small_usr">
		<div class="card-image">
			<a href="<?php echo $site_url;?>/@<?php echo $random_user->username;?>" data-ajax="/@<?php echo $random_user->username;?>"><img src="<?php echo GetMedia('',false) . $random_user->avater;?>" alt="<?php echo $random_user->username;?>"></a>
			<?php if( (int)$random_user->id !== (int)auth()->id  && Auth()->verified == "1"){ ?>
                <button class="btn to_small_not dislike _dislike_text<?php echo $random_user->id;?>" data-userid="<?php echo $random_user->id;?>" id="dislike_btn" data-ajax-post="/useractions/dislike" data-ajax-params="userid=<?php echo $random_user->id;?>" data-ajax-callback="callback_dislike">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/></svg>
                </button>
			<?php } ?>
			<div class="card-content">
				<div class="card-content-info">
					<h3><a href="<?php echo $site_url;?>/@<?php echo $random_user->username;?>" data-ajax="/@<?php echo $random_user->username;?>"><?php echo ($random_user->first_name !== '' ) ? $random_user->first_name . ' ' . $random_user->last_name : $random_user->username;?></a> <?php if((int)abs(((strtotime(date('Y-m-d H:i:s')) - $random_user->lastseen))) < 60 && (int)$random_user->online == 1) { echo '<div class="useronline"></div>'; }?></h3>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z" fill="currentColor"></path></svg> <?php echo udetails($random_user);?></div>
					<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4 22a8 8 0 1 1 16 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z" fill="currentColor"></path></svg> <?php echo '' . __($random_user->gender);?></div>
				</div>
				<?php if( (int)$random_user->id !== (int)auth()->id  && Auth()->verified == "1"){ ?>
					<button class="btn to_small_yes like" id="like_btn" data-userid="<?php echo $random_user->id;?>" data-ajax-post="/useractions/like" data-ajax-params="userid=<?php echo $random_user->id;?>&username=<?php echo $random_user->username;?>" data-ajax-callback="callback_like">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2.821 12.794a6.5 6.5 0 0 1 7.413-10.24h-.002L5.99 6.798l1.414 1.414 4.242-4.242a6.5 6.5 0 0 1 9.193 9.192L12 22l-9.192-9.192.013-.014z"/></svg>
					</button>
				<?php } ?>
			</div>
		</div>
    </div>
</div>