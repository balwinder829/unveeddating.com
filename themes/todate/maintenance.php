<style>
.to_maintenance {display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-box;display: flex;-webkit-flex-direction: column;flex-direction: column;min-height: 100vh;position: relative;width: 100%;font-family: 'Libre Franklin', sans-serif;margin-top: -55px;}
.to_maintenance:before, .to_maintenance:after {-webkit-box-flex: 1;box-flex: 1;-webkit-flex-grow: 1;flex-grow: 1;content: '';display: block;height: 24px;}
.to_maintenance > div {margin: auto;width: 100%;max-width: 600px;padding: 15px;}
.to_maintenance > div img {width: 300px;}
.to_maintenance > div h1 {margin: 60px 0 20px;font-size: 36px;}
.to_maintenance > div p {margin: 10px 0 0;font-size: 16px;color: rgba(0, 0, 0, 0.65);}
</style>

<div class="to_maintenance">
	<div>
		<img src="<?php echo $theme_url;?>assets/img/maintenance.svg" alt="<?php echo __('We’ll be back soon!');?>">
		<h1><?php echo __('We’ll be back soon!');?></h1>
		<p><?php echo __('Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need help you can always');?> <a href="mailto:<?php echo $config->siteEmail; ?>"><?php echo __('contact us');?></a>, <?php echo __('otherwise we&rsquo;ll be back online shortly!');?></p>
		<p>&mdash; <?php echo $config->site_name;?></p>
	</div>
</div>