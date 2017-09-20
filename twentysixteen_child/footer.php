<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
				<div class="full-row footericons">
					<!-- <div class="col-1">
						<svg><use xlink:href="#icon-visit"></use></svg>
            <p>Moolakadai</p>
					</div> -->
					<div class="col-1">
						<svg><use xlink:href="#icon-phonecall"></use></svg>
            <p>+91-9840456154</p>
					</div>
					<div class="col-1">
						<svg><use xlink:href="#icon-mail"></use></svg>
            <p><a href="mailto:support@veltrade.com">support@gainstarts.com</a></p>
					</div>
					<div class="col-1">
						<svg><use xlink:href="#icon-copyright"></use></svg>
            <p>&copy; 2009 – <?php echo date('Y'); ?> All Rights Reserved.</p>
					</div>
				</div>				
				<!-- <span class="site-title"><a href="<?php # echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php # bloginfo( 'name' ); ?></a></span>  
				<a href="<?php # echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php # printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a> -->
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
<script type="text/javascript">

    jQuery(document).ready(function() {
    		//scroll to fixed
        jQuery('.scrollfix').scrollToFixed({
            minWidth: 992
        });

        var menuToggle = jQuery('#menu-toggle'),
            siteHeaderMenu = jQuery('#site-header-menu');

        if (jQuery(window).width() < 992) {
            siteHeaderMenu.css('display', 'none');
            jQuery('.scrollfix').trigger('detach.scrollToFixed');
        }

        // Menu toggle in mobile
        menuToggle.on('click', function(eve) {
            eve.stopPropagation();
            siteHeaderMenu.toggle();
            menuToggle.toggleClass('open');
            jQuery(document).click(function() {
            		menuToggle.removeClass('open');
                siteHeaderMenu.css('display', 'none');
            });
        });

    });


window.onload = function() {
  document.getElementById('bestway').style.transform = "translateY(0px)";
  document.getElementById('bestway').style.opacity = "1";
  document.getElementById('learn-forex').style.transform = "scale(1)";
};
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/59ad101ac28eca75e461df63/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
