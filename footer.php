<?php
/**
 * Footer
 */
?>
</div>
<footer class="footer footer-background">
	<div class="row ">
		<div class="large-6 medium-6 small-6 columns">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu','fallback_cb' => 'foundation_page_menu')); ?>
		</div>
		<div class="large-4 medium-4 small-6 columns">
			<div class="container-contact">
				<p>
					<span><i class="fa fa-mobile"></i></span>
					<span><a href='tel:+380663564463'>+38 (066) 356 44 63</a></span>
				</p>
				<p>
					<span><i class="fa fa-envelope-o"></i></span>
					<span><a href="mailto:contact@unicweb.com.ua" target='blank'>contact@unicweb.com.ua</a></span>
				</p>
				<p>
					<span><i class="fa fa-skype"></i></span>
					<span><a href="skype:unicweb.team">UnicWeb.Team</a></span>
				</p>
			</div>
		</div>
		<!-- END of .columns -->
	</div><!-- END of .row -->
	
</footer><!-- END of  Footer -->
<div class="copyright">
	<div class="row">
		<div class="large-12 medium-12 small-12 columns">
			<p>© UnicWeb 2015</p>	
		</div>		
	</div>
</div>
<?php wp_footer(); ?>

<!-- Кнопка "Наверх" -->
<div id="scrolltotop">
	<img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt="">
</div>

<style>
	#scrolltotop{
		position: fixed;    
		/** позиция кнопки scroll to top **/
		bottom: 0; 
		right: 0; 
		/** картинка кнопки наверх**/
		width: 50px;
		height: 50px;
		cursor: pointer;
		/** скрываем кнопку в начале **/
		display:none;
	}
</style>


<!-- Доп. скрипты и аналитика -->

<script>
//==================================================================================
// Google analytics
//==================================================================================
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-67469547-1', 'auto');
ga('send', 'pageview');


//===================================================================================
// Кнопка "Наверх"
//===================================================================================
jQuery(document).ready(function(){   
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 0) {
			jQuery('#scrolltotop').fadeIn();
		} else {
			jQuery('#scrolltotop').fadeOut();
		}
	});
	jQuery('#scrolltotop').click(function () {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
	});
});

</script>

</body>
</html>