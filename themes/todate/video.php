<?php global $db,$_LIBS; ?>
<div class="container page-margin">
	<?php if( $config->pro_system == 1 ){ ?>
		<?php require( $theme_path . 'main' . $_DS . 'pro-users.php' );?>
	<?php } ?>
	
	<div class="dt_home_rand_user">
		<div class="dt_sections dt_who_live" id="liked_users_container">
			<?php if ($data['live_video']->live_ended == 0) { ?>
				<h6 class="bold"><span class="was_live_text_<?php echo($data['live_video']->id) ?>"><?php echo ($data['live_video']->is_still_live ? __( 'Is Live' ) : __( 'Was Live' )); ?></span></h6>
				<div class="row r_margin" style="margin-bottom: 0">
					<div class="col m8 s12">
						<div class="embed-responsive embed-responsive-4by3" id="post_live_video_<?php echo($data['live_video']->id) ?>"></div>
					</div>
					<div class="col m4 s12">
						<div class="to_page_title">
							<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M20 2H4C2.89 2 2 2.89 2 4V16C2 17.11 2.9 18 4 18H8V21C8 21.55 8.45 22 9 22H9.5C9.75 22 10 21.9 10.2 21.71L13.9 18H20C21.1 18 22 17.1 22 16V4C22 2.89 21.1 2 20 2M9.08 15H7V12.91L13.17 6.72L15.24 8.8L9.08 15M16.84 7.2L15.83 8.21L13.76 6.18L14.77 5.16C14.97 4.95 15.31 4.94 15.55 5.16L16.84 6.41C17.05 6.62 17.06 6.96 16.84 7.2Z"></path></svg></span> <?php echo __('Write a Comment');?></h3>
						</div>
						<div class="input-field">
							<textarea class="comment-textarea textarea live_video_comment_text" placeholder="<?php echo __('Write a Comment');?>" type="text" onkeyup="LiveComment(this.value,event,<?php echo $data['live_video']->id; ?>);" dir="auto"></textarea>
						</div>
						<div class="to_page_title">
							<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7A2,2 0 0,1 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.89 12.76,23 12.5,23H12M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15Z"></path></svg></span> <?php echo __('Discussion');?></h3>
						</div>
						<div id="live_post_comments_<?php echo($data['live_video']->id) ?>" class="wow_liv_comments_feed"></div>
					</div>
				</div>
			<?php } else { ?>
				<div class="row r_margin" style="margin-bottom: 0">
					<div class="col m8 s12">
						<div class="embed-responsive embed-responsive-4by3">
							<div style="width: 100%; height: 100%; position: relative; background-color: black; overflow: hidden;" class="embed-responsive-item">
								<video id="video--<?php echo $data['live_video']->id;?>" style="width: 100%; height: 100%; position: absolute; object-fit: cover;" controls preload="auto" poster="<?php echo($data['live_video']->image) ?>" data-post-video="<?php echo $data['live_video']->id;?>"><source src="<?php echo $data['live_video']->postFile;?>" type="application/x-mpegURL"></video>
							</div>
						</div>
					</div>
					<div class="col m4 s12">
						<div class="to_page_title">
							<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7A2,2 0 0,1 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.89 12.76,23 12.5,23H12M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15Z"></path></svg></span> <?php echo __('Discussion');?></h3>
						</div>
						<div><?php echo $data['video_comments']; ?></div>
					</div>
				</div>
            <?php } ?>
		</div>
	</div>
</div>

<div id="modal_remove_comment_live" class="modal">
    <div class="modal-content">
        <h6 class="bold" style="margin-top: 0px;"><?php echo __( 'Are you sure you want to remove this comment' );?></h6>
    </div>
    <div class="modal-footer">
        <button class="waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Confirm' );?></button>
    </div>
</div>

<script type="text/javascript">
	function RemoveCommentVideo(id,type = 'show') {
		if (type == 'hide') {
		    $('#modal_remove_comment_live').find('.btn_primary').attr('onclick', "RemoveCommentVideo('"+id+"')");
		    $('#modal_remove_comment_live').modal('open');
		    return false;
		}
		$('#modal_remove_comment_live').modal('close');
		$.post(window.ajax + 'live/remove_video_comment', {comment_id: id}, function(data, textStatus, xhr) {
			$( "[live_comment_id='"+id+"']" ).remove();
		});
	}
	function LiveComment(text,event,post_id,insert = 0) {
	  text = $('.comment-textarea').val();
	  if (text && (event.keyCode == 13 || insert == 1)) {
	    if ($('#live_post_comments_'+post_id+' .live_comments').length >= 4) {
	      $('#live_post_comments_'+post_id+' .live_comments').first().remove();
	    }
	      $('#live_post_comments_'+post_id).append('<div class="live_comments" live_comment_id=""><a class="pull-left" href="<?php echo $site_url;?>/@<?php echo auth()->username?>"><img class="live_avatar pull-left" src="<?php echo(auth()->avater->avater) ?>" alt="avatar"></a><div class="comment-body" style="float: left;"><div class="comment-heading"><span><a href="<?php echo $site_url;?>/@<?php echo auth()->username?>" data-ajax="/@<?php echo auth()->username?>" ><h4 class="live_user_h"> <?php echo (auth()->first_name !== '' ) ? auth()->first_name . ' ' . auth()->last_name : auth()->username;?> </h4></a></span><div class="comment-text">'+text+'</div></div></div><div class="clear"></div></div>');
	      $('.comment-textarea').val('');
	      $.post(window.ajax + 'live/new_comment', {post_id: <?php echo $data['live_video']->id; ?>,text:text}, function(data, textStatus, xhr) {
	      	/*optional stuff to do after success */
	      }).fail(function (data) {

	      });

	  }
	}
	<?php if ($data['live_video']->live_ended == 1) { ?>
	var player = videojs('video--<?php echo $data['live_video']->id;?>', {
          controls: true
        });
<?php } ?>
	<?php if ($config->live_video == 1 && !empty($data['live_video']->stream_name) && $data['live_video']->live_ended == 0) { ?>
  var post_live_<?php echo $data['live_video']->id; ?> = setInterval(function(){ 
      data = {};
      for (var i = 0; i < $('.live_comments').length; i++) {
        if ($($('.live_comments')[i]).attr('live_comment_id')) {
          data[i] = $($('.live_comments')[i]).attr('live_comment_id');
        }
      }
      $.post(window.ajax + 'live/check_comments', {post_id: <?php echo $data['live_video']->id; ?>,ids:data,page:"show"}, function(data, textStatus, xhr) {
        if (data.status == 200) {
          if (data.still_live == 'offline') {
            $('#live_post_comments_<?php echo $data['live_video']->id; ?>').remove();
            $('.was_live_text_<?php echo $data['live_video']->id; ?>').html("<?php echo(__( 'Was Live' )) ?>");
            $('[id=post-<?php echo $data['live_video']->id; ?>]').find('.comment-textarea').attr('disabled');
            return false;
          }
          $('#live_post_comments_<?php echo $data['live_video']->id; ?>').append(data.html);
          $('#live_count_<?php echo $data['live_video']->id; ?>').html(data.count);
          $('#live_word_<?php echo $data['live_video']->id; ?>').html(data.word);
          var comments = $('#live_post_comments_<?php echo $data['live_video']->id; ?> .live_comments');
          if (comments.length > 4) {
            var i;
            for (i = 0; i < comments.length; i++) {
              if ($('#live_post_comments_<?php echo $data['live_video']->id; ?> .live_comments').length > 4) {
                comments[i].remove();
              }
            }
          }
        }
      }).fail(function (data) {
      	if (data.responseJSON.removed == 'yes') {
      		clearInterval(post_live_<?php echo $data['live_video']->id; ?>);
            $('#live_count_<?php echo $data['live_video']->id; ?>').html(0);
            $('#live_post_comments_<?php echo $data['live_video']->id; ?>').html("<h3 class='end_video_text'><?php echo(str_replace('{{user}}', $data['live_video']->user_data->username,  __( 'stream_has_ended' ))) ?></h3>");
            $('.was_live_text_<?php echo $data['live_video']->id; ?>').html("<?php echo(__( 'Was Live' )) ?>");
            $('#post-<?php echo $data['live_video']->id; ?>').find('.comment-textarea').attr('disabled','true');
            $('#post-comments-<?php echo $data['live_video']->id; ?>').remove();
            return false;

      	}
      	else{
            clearInterval(post_live_<?php echo $data['live_video']->id; ?>);
            $('#live_count_<?php echo $data['live_video']->id; ?>').html(0);
            $('#live_post_comments_<?php echo $data['live_video']->id; ?>').html("<h3 class='end_video_text'><?php echo(str_replace('{{user}}', $data['live_video']->user_data->username, __( 'stream_has_ended' ))) ?></h3>");
            $('.was_live_text_<?php echo $data['live_video']->id; ?>').html("<?php echo(__( 'Was Live' )) ?>");
            $('#post-<?php echo $data['live_video']->id; ?>').find('.comment-textarea').attr('disabled','true');
            $('#post-comments-<?php echo $data['live_video']->id; ?>').remove();
            return false;
        }
        });
   }, 3000);

  function RunLiveAgora(channelName,DIV_ID,token) {
	  var agoraAppId = '<?php echo($config->agora_app_id) ?>'; 
	  var token = token;

	  var client = AgoraRTC.createClient({mode: 'live', codec: 'vp8'}); 
	  client.init(agoraAppId, function () {


	      client.setClientRole('audience', function() {
	    }, function(e) {
	    });
	    
	    client.join(token, channelName, <?php echo rand(100,999999); ?>, function(uid) {
	    }, function(err) {
	    });
	    }, function (err) {
	    });

	    client.on('stream-added', function (evt) {
	    var stream = evt.stream;
	    var streamId = stream.getId();
	    
	    client.subscribe(stream, function (err) {
	    });
	  });
	  client.on('stream-subscribed', function (evt) {
	    var remoteStream = evt.stream;
	    remoteStream.play(DIV_ID);
	    $('#player_'+remoteStream.getId()).addClass('embed-responsive-item');
	  });
	}
	RunLiveAgora("<?php echo($data['live_video']->stream_name) ?>","post_live_video_<?php echo($data['live_video']->id) ?>","<?php echo($data['live_video']->agora_token) ?>");

<?php } ?>

	
</script>