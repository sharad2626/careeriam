<?php

/**
 * BuddyPress - Activity Post Form
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php global $bp_wall, $bp;  ?>

<?php if ( !is_user_logged_in() ) : ?>

	<div id="message" class="bp-template-notice">
		<p>You need to <a href="<?php echo site_url( 'wp-login.php' ) ?>">log in</a> <?php if ( bp_get_signup_allowed() ) : ?> or <?php printf( __( ' <a class="create-account" href="%s" title="Create an account">create an account</a>', 'buddypress' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?><?php endif; ?> to post to this user's Wall.</p>
	</div>

	<?php elseif (!bp_is_my_profile() && !is_super_admin() && ( bp_is_user() && !$bp_wall->is_myfriend($bp->displayed_user->id) ) ) : ?>
	<?php //elseif (!bp_is_home() && !is_super_admin() && ( bp_is_user() && !$bp_wall->is_myfriend($bp->displayed_user->id) ) ) : ?>

	<div id="message" class="bp-template-notice">
		<p><?php printf( __( "You and %s are not friends. Please request friendship to post to their Wall.", 'bp-wall' ), bp_get_displayed_user_fullname() ) ?></p>
	</div>

    <?php elseif ( !is_super_admin()  && ( bp_is_group_home() && !bp_group_is_member() )  ) : ?>
	<div id="message" class="bp-template-notice">
		<p><?php printf( __( "You are not a member in group %s. Please join the group to post to their Wall.", 'bp-wall' ), bp_get_current_group_name() ) ?></p>
	</div>

<?php else:?>

	<?php if ( is_user_logged_in() ) : ?>


<form action="<?php bp_activity_post_form_action(); ?>" method="post"  enctype="multipart/form-data" id="whats-new-form" name="whats-new-form" role="complementary">

	

	<?php do_action( 'bp_before_activity_post_form' ); ?>

	<?php if ( isset( $_GET['r'] ) ) : ?>
		<div id="message" class="info">
			<p><?php printf( __( 'You are mentioning %s in a new update, this user will be sent a notification of your message.', 'buddypress' ), bp_get_mentioned_user_display_name( $_GET['r'] ) ) ?></p>
		</div>
	<?php endif; ?>
	
	<?php

			global $current_user, $user_id, $user_info;
			get_currentuserinfo();
			$user_id = $current_user->ID; // You can set $user_id to any users, but this gets the current users ID.

			global $result;

			$resume_id = $wpdb->get_results( "SELECT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and post_status = 'publish' and post_author = '".$user_id."' ");

			foreach ($resume_id as $key => $value) {
			$result[] = $value->ID;
			}

			$wpjobus_resume_profile_picture = esc_url(get_post_meta($result[0], 'wpjobus_resume_profile_picture',true));
			$wpjobus_resume_fullname = esc_attr(get_post_meta($result[0], 'wpjobus_resume_fullname',true));

            $resume_industry = get_post_meta($result[0],'resume_industry',true);  
         
	
	
	?>

	<div id="whats-new-avatar" class="social-avtar">
		<a href="<?php echo bp_loggedin_user_domain(); ?>" class="user-icon">
			<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
		</a>
		<div class="add-details">
                      <div class="list">
                        <i class="fa fa-map-marker"></i>
                        <span class="text"><!-- Savannah, GA --><?php echo $wpjobus_resume_fullname; ?></span>
                      </div>
                      <div class="list">
                        <i class="fa fa-user"></i>
                        <span class="text"><!-- Teacher/Chatham county Department of Education --><?php echo $resume_industry; ?></span>
                      </div>
                    </div>
	</div>
	
	<p class="activity-greeting" style="display:none;"><?php if ( bp_is_group() )
		printf( __( "What's new in %s, %s?", 'buddypress' ), bp_get_group_name(), bp_get_user_firstname() );
		elseif( ( bp_is_my_profile() && bp_is_user_activity() ) )		
		//elseif( bp_is_page( BP_ACTIVITY_SLUG ) || bp_is_my_profile() && bp_is_user_activity() )
			printf( __( "What's new, %s?", 'buddypress' ), bp_get_user_firstname() );
		elseif( !bp_is_my_profile() && bp_is_user_activity() )
			printf( __( "Write something to %s?", 'buddypress' ), bp_get_displayed_user_fullname() );
	?></p>

	<div id="whats-new-content" class="share-content-wrap">
		<h3><i class="fa fa-paper-plane"></i> Share whats new</h3>
		<div id="whats-new-textarea">
			<textarea name="whats-new" placeholder="" id="whats-new" cols="50" rows="10"><?php if ( isset( $_GET['r'] ) ) : ?>@<?php echo esc_attr( $_GET['r'] ); ?> <?php endif; ?></textarea>
		</div>

		<div id="whats-new-options" class="post-update">
			<div id="whats-new-submit">
				<input type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit" value="<?php _e( 'Post', 'buddypress' ); ?>" />
			</div>

			<?php if ( bp_is_active( 'groups' ) && !bp_is_my_profile() && !bp_is_group() && !bp_is_user() ) : ?>
			<?php //if ( bp_is_active( 'groups' ) && !bp_is_my_profile() && !bp_is_group() && !bp_is_member() ) : ?>

				<div id="whats-new-post-in-box" style="display:none;">

					<?php _e( 'Post in', 'buddypress' ); ?>:

					<select id="whats-new-post-in" name="whats-new-post-in">
						<option selected="selected" value="0"><?php _e( 'My Profile', 'buddypress' ); ?></option>

						<?php if ( bp_has_groups( 'user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100&populate_extras=0' ) ) :
							while ( bp_groups() ) : bp_the_group(); ?>

								<option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>

							<?php endwhile;
						endif; ?>

					</select>
				</div>

				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />

			<?php elseif ( bp_is_group_home() ) : ?>

				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
				<input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />

			<?php endif; ?>

			<?php do_action( 'bp_activity_post_form_options' ); ?>

		</div><!-- #whats-new-options -->
	</div><!-- #whats-new-content -->

	<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
	<?php do_action( 'bp_after_activity_post_form' ); ?>

	<div class="trending-box other-details">
                    <div class="box">
                      <div class="detail-heading green">
                        <h4 class="detail-title"><i class="fa fa-compress"></i> Trending</h4>
                      </div>
                        <div class="detail-content">
                          <div class="content-inner mCustomScrollbar">
                            <!-- <ul>
                              <li>
                                <h5>Tata Steel</h5>
                                <p>An Indian Steel Company</p>
                              </li>
                              <li>
                                <h5>Sinopec Corp</h5>
                                <p>China's largest producer and supplier</p>
                              </li>
                              <li>
                                <h5>Exon Mobile Corporation</h5>
                                <p>World's largest integrated oil companies</p>
                              </li>
                              <li>
                                <h5>Tata Steel</h5>
                                <p>An Indian Steel Company</p>
                              </li>
                              <li>
                                <h5>Exon Mobile Corporation</h5>
                                <p>World's largest integrated oil companies</p>
                              </li>
                              <li>
                                <h5>Sinopec Corp</h5>
                                <p>China's largest producer and supplier</p>
                              </li>
                              <li>
                                <h5>Tata Steel</h5>
                                <p>An Indian Steel Company</p>
                              </li>
                              <li>
                                <h5>Sinopec Corp</h5>
                                <p>China's largest producer and supplier</p>
                              </li>
                              <li>
                                <h5>Exon Mobile Corporation</h5>
                                <p>World's largest integrated oil companies</p>
                              </li>
                            </ul>
							-->
							<?php
							if(is_active_sidebar('activity-trending-area')) : //check the sidebar if used.
							dynamic_sidebar('activity-trending-area');  // show the sidebar.
							endif;

							?>
                          </div>
                        </div>
                    </div>
                  </div>

</form><!-- #whats-new-form -->
<?php endif ?>
<?php endif ?>