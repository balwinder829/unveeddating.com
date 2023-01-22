<?php if( $data['page_type'] == 0 ){?>
    <div class="container dt_terms">
		<div class="dt_terms_content_body">
			<?php echo htmlspecialchars_decode($data['content']); ?>
		</div>
    </div>
<?php } else { ?>
	<div class="container dt_terms">
		<h2 class="bold"><?php echo $data['name'];?></h2>
		<div class="dt_terms_content_body">
			<?php echo htmlspecialchars_decode($data['content']); ?>
		</div>
	</div>
<?php } ?>