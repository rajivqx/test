<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AccesspressLite
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php 
		global $accesspresslite_options;
		$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
        $home_template = $accesspresslite_settings['accesspresslite_home_template'];
        $footer_title = $accesspresslite_settings['footer_title'];
		if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="top-footer">
		<div class="ak-container"><?php
        if($home_template == 'template_two' || $home_template == ''){
         if($footer_title){?>
                <h1 class="footer_title_text"><?php echo esc_attr($footer_title); ?></h1>
        <?php }} ?>
			<div class="footer1 footer">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer2 footer">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>	
			</div>

			<div class="clearfix hide"></div>

			<div class="footer3 footer">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer4 footer">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php endif; ?>	
			</div>
		</div>
		</div>
	<?php endif; ?>

		
		<div id="bottom-footer">
		<div class="ak-container">
			<h1 class="site-info">
				<a href="<?php echo esc_url('http://wordpress.org/'); ?>"><?php _e( 'Developed by', 'accesspresslite' ); ?></a>
				<span class="sep"> | </span>
				<a href="<?php echo esc_url('http://infotechsoftwaresolution.com/');?>" title="AccessPress Themes" target="_blank">Infotech Software solution</a>
			</h1><!-- .site-info -->

			<div class="copyright">
				<?php _e('Copyright','accesspresslite') ?> &copy; <?php echo date('Y') ?> 
				<a target="_blank" href="http://demo.accesspressthemes.com/accesspresslite/">
				<?php if(!empty($accesspresslite_settings['footer_copyright'])){
					echo $accesspresslite_settings['footer_copyright']; 
					}else{
						echo bloginfo('name');
					} ?>
				</a>
			</div>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>