<?php
$current_user_id = get_current_user_id();
$user_by_post=get_userdata($current_user_id); $user_by_post->user_login;
?>
<div class="sidebar-resume-associates">
<div class="widget">
<?php 

if ( !function_exists('dynamic_sidebar')

    || !dynamic_sidebar('pages') ) : ?>

	

<?php endif; ?>
</div></div>