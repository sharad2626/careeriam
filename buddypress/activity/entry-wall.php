<?php

/**
 * BuddyPress - Activity Wall Stream (Single Item)
 *
 * This template is used by activity-wall-loop.php and AJAX functions to show
 * each activity.
 *
 * @package BuddyPress Wall
 * @subpackage bp-legacy
 */

?>

<?php global $bp_wall; ?>

<?php do_action( 'bp_before_activity_entry' ); ?>

<li class="<?php bp_activity_css_class(); ?>" id="activity-<?php bp_activity_id(); ?>">
	<div class="activity-avatar">
		<a href="<?php bp_activity_user_link(); ?>">

			<?php bp_activity_avatar(); ?>

				<?php bp_get_activity_avatar_name(); ?>

		</a>
	</div>

	<div class="custom-content">
	<div class="activity-content">

		<div class="activity-header">

			<?php bp_activity_action(); ?>
			

		</div>

		<?php if ( bp_activity_has_content() ) : ?>

			<div class="activity-inner">

				<?php bp_activity_content_body(); ?>

			</div>

		<?php endif; ?>

		<?php do_action( 'bp_activity_entry_content' ); ?>

		<div class="activity-meta">
			<div class="left">
              <span><?php //bp_activity_action(); ?></span>
            </div>
             <div class="right">
			<?php if ( bp_get_activity_type() == 'activity_comment' ) : ?>

				<a href="<?php bp_activity_thread_permalink(); ?>" class="button view bp-secondary-action" title="<?php _e( 'View Conversation', 'buddypress' ); ?>"><?php _e( 'View Conversation', 'buddypress' ); ?></a>

			<?php endif; ?>

			<?php if ( is_user_logged_in() ) : ?>

				<?php if ( bp_activity_can_comment() ) : ?>

					<a href="<?php bp_activity_comment_link(); ?>" class="button fa fa-comment comment acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( ' <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a>

				<?php endif; ?>

				<?php if ( bp_activity_can_favorite() ) : ?>

					<?php if ( !bp_get_activity_is_favorite() ) : ?>
						<a href="<?php bp_activity_favorite_link(); ?>" class="button fa fa-heart like fav bp-secondary-action" title="<?php esc_attr_e( 'Like this post', 'bp-wall' ); ?>"><?php _e( '', 'bp-wall' ); ?><?php printf( __( ' <span>%s</span>', 'buddypress' ), bp_wall_add_likes_comments() ); ?>
						</a>

					<?php else : ?>

						<a href="<?php bp_activity_unfavorite_link(); ?>" class="button fa fa-heart like unfav bp-secondary-action" title="<?php esc_attr_e( 'Unlike this post', 'bp-wall' ); ?>"><?php _e( '', 'bp-wall' ); ?><?php bp_wall_add_likes_comments();?></a>

					<?php endif; ?>

				<?php endif; ?>

				<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

				<?php do_action( 'bp_activity_entry_meta' ); ?>

			<?php endif; ?>
		</div>
		</div>

	</div>

	<?php do_action( 'bp_before_activity_entry_comments' ); ?>

	<?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_activity_get_comment_count() || $bp_wall->has_likes( bp_get_activity_id() ) ) : ?>

		<div class="activity-comments">

			<?php if ( !( is_user_logged_in() && bp_activity_can_comment() ) || !bp_activity_get_comment_count() ) : 
				
				 bp_wall_add_likes_comments(); 
				
			 else: 
				
				 bp_activity_comments();

			 endif; ?>

			<?php if ( is_user_logged_in() ) : ?>


				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?> style="z-index:9999; background: #f8f8f8;">
					<div class="ac-reply-avatar"><?php bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<textarea placeholder="<?php _e( 'Write a comment', 'bp-wall' ); ?>" id="ac-input-<?php bp_activity_id(); ?>" class="ac-input" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
						</div>
						
						<input type="submit" name="ac_form_submit" id="submit" calss="formsubmit"value="<?php _e( 'Post', 'buddypress' ); ?>" /><a href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
						
						<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
					</div>

					<?php //echo 'ggggggggggggggg';
					//do_action( 'bp_activity_entry_comments' ); ?>

					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

				</form>

			<?php endif; ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'bp_after_activity_entry_comments' ); ?>
    </div>

</li>

<?php do_action( 'bp_after_activity_entry' ); ?>
<?php
    if(isset($_POST['ac_form_submit']))
    {
    header("Location: http://careeriam.phpdevelopment.co.in/activity/");exit;
    }
?>
<style>
.load-more{
	display: none;
}
.ac-reply-content input[type="submit"]{
	
    height: 30px!important;
    padding: 0px!important;
}
#buddypress div.activity-comments form div.ac-reply-content {
    color: #888!important;
    float: right!important;
    margin-top: -35px!important;
    
}
.activity ul >li{
	padding: 10px!important;
  
}
.right  span {
    color: #7c7c7c!important;
    font-size: 12px!important;
}

/*.activity-header .time-since{
	display: none;

}*/


/*.left span p a .view activity-time-since{
	display: block;

}*/
.right a .fa {
    background: #f3f3f3 none repeat scroll 0 0;
    border: #f3f3f3!important;
    float: left;
    height: 35px;
    line-height: 35px;
    width: 35px;
}
.right .fa {
    display: inline-block;
    font-family: FontAwesome;
    font-feature-settings: normal;
    font-kerning: auto;
    font-language-override: normal;
    font-size: inherit;
    font-size-adjust: none;
    font-stretch: normal;
    font-style: normal;
    font-synthesis: weight style;
    font-variant: normal;
    font-weight: normal;
    text-rendering: auto;
}
#submit{
	float: left;
	margin: 0 !important;
    padding: 0 !important;
}
.ac-reply-cancel{
	float: right;
}


</style>
<script>
/*jQuery(document).ready(function(){

	
	jQuery("input#submit").click( function(){
		if(jQuery("#ac-input-<?php bp_activity_id(); ?>").val()!=''){
		if( jQuery( "li#activity-<?php bp_activity_id(); ?>" ).find( "div.activity-comments"))
		{
			alert( "Size: " + jQuery( "liactivity-4392 div.activity-comments li" ).size() );
		}
	}



	});
  
});*/
jQuery( document ).ajaxComplete(function(event, xhr, settings) {

/*
var text =xhr.responseText;
var length = text.length;
//jQuery
   if(length > 47){
   //	window.location.href = "<?php echo home_url();?>/activity/";
   }
    if(length == 0){
   //	window.location.href = "<?php echo home_url();?>/activity/";
   }
 */
 
 jQuery(".bpfb_actions_container").css({"z-index":99999,"background-color":"#fff"});

 jQuery(document).on('click','#bpfb_submit',function(){
		window.location.href = "<?php echo home_url();?>/activity/";
 });
 
 jQuery(document).on('click','#bpfb_cancel',function(){
		window.location.href = "<?php echo home_url();?>/activity/";
 });
 
	
});
</script>
