<?php
/**
 * Template Name: Event List
 *
 * This template will display a list of your events 
 *
 * @ package		Event Espresso
 * @ author		Seth Shoultes
 * @ copyright	(c) 2008-2014 Event Espresso  All Rights Reserved.
 * @ license		http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link			http://www.eventespresso.com
 * @ version		EE4+
 */
get_header();
genesis_do_breadcrumbs();
?>
	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php espresso_get_template_part( 'loop', 'espresso_events' ); ?>			
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_footer();
