<!-- Footer  -->
    <footer id="footer" class="page_footer">
		<?php if ($data['name'] !== 'login' && $data['name'] !== 'contact' && $data['name'] !== 'register' && $data['name'] !== 'forgot' && $data['name'] !== 'reset' && $data['name'] !== 'verifymail' && IS_LOGGED) { ?>
			<div class="container " style="transform: none;"><?php echo GetAd('footer');?></div>
		<?php } ?>
        <div class="footer-copyright">
            <div class="container valign-wrapper">
                <span><?php echo __( 'Copyright' );?> © <?php echo date( "Y" ) . " " . ucfirst( $config->site_name );?>. <?php echo __( 'All rights reserved' );?>.</span>
				<span class="dt_fotr_spn">
				<!--ul class="dt_footer_links">
                    <li><a href="<?php echo $site_url;?>/stories" data-ajax="/stories"><?php echo __( 'Success stories' );?></a></li>
					&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/about" data-ajax="/about"><?php echo __( 'About Us' );?></a></li>
					&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/terms" data-ajax="/terms"><?php echo __( 'Terms' );?></a></li>
                    &nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy"><?php echo __( 'Privacy Policy' );?></a></li>
					&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/contact" data-ajax="/contact"><?php echo __( 'Contact' );?></a></li>
					&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/faqs" data-ajax="/faqs"><?php echo __( 'faqs' );?></a></li>
					&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/refund" data-ajax="/refund"><?php echo __( 'refund' );?></a></li>
					<?php if ($config->developers_page == '1') { ?>
                    &nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/developers" data-ajax="/developers"><?php echo __( 'Developers' );?></a></li>
                    <?php } ?>
					<?php if(!empty($config->facebook_url)){ ?>
                    &nbsp;-&nbsp;<li>
                        <a href="<?php echo $config->facebook_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"></path></svg></a>
                    </li>
                    <?php }?>
                    <?php if(!empty($config->twitter_url)){ ?>
                    <li>
                        <a href="<?php echo $config->twitter_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path></svg></a>
                    </li>
                    <?php }?>
                    <?php if(!empty($config->google_url)){ ?>
                    <li>
                        <a href="<?php echo $config->google_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z"></path></svg></a>
                    </li>
                    <?php }?>
				</ul-->
                <?php //require( $theme_path . 'main' . $_DS . 'custom-page.php' );?>
                <?php //require( $theme_path . 'main' . $_DS . 'language.php' );?>
				</span>
            </div>
        </div>
    </footer>
<!-- End Footer  -->