<?php
/**
 * Template name: Activity
 */

if(!is_user_logged_in()){ 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

}

get_template_part('header-activity');

?>

<!-- Content START-->



<!-- Content END-->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>


<?php  get_footer("add-company");  ?>