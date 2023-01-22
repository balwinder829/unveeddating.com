<link rel="icon" href="<?php echo $theme_url;?>assets/img/icon.png" type="image/x-icon"><link href="<?php echo $theme_url;?>assets/css/materialize.min.css" type="text/css" id="materialize" rel="stylesheet" media="screen,projection"/><link href="<?php echo $theme_url;?>assets/css/plugins.css" type="text/css" id="plugins" rel="stylesheet" media="screen,projection"/><link href="<?php echo $theme_url;?>assets/css/style.css" type="text/css" id="style" rel="stylesheet" media="screen,projection"/><link href="<?php echo $theme_url;?>assets/css/ie.css" type="text/css" id="ie" rel="stylesheet" media="screen,projection"/>
<?php if( $config->displaymode == 'night' ){?>
    <link href="<?php echo $theme_url;?>assets/css/night.css" type="text/css" id="night-mode-css" rel="stylesheet" media="screen,projection"/>
<?php } ?>
<?php if( $config->is_rtl === true ){?>
    <link href="<?php echo $theme_url;?>assets/css/rtl.css" type="text/css" id="rtl" rel="stylesheet" media="screen,projection"/>
<?php } ?>