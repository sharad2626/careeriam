<?php
/**
 * Template name: Homepage
 */

$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header();
get_template_part( 'header-home' );
 ?>
 <div class="banner">
    <div class="banner_text">
        <h2>YOUR VIrTUAL CAREER NETWORK<br>
        <!-- <img src="<?php echo get_stylesheet_directory_uri().'/css/images/clock.png'; ?>" alt="clock">  COMING SOON... --></h2>
         <?php if( ! is_user_logged_in()) { ?>
          <div class="log-reg-button">
              <a href="<?php $login = home_url()."/login"; echo $login; ?>" class="logbtn">Login</a>
              <a href="<?php $register = home_url()."/register"; echo $register; ?>" class="logbtn">Register</a>
          </div>
        <?php } ?>
    </div>
 </div>
 <div class="join-us-sec sections">
      <div class="top-border">
        <span class="left-border"></span>
        <span class="right-border"></span>
      </div>
      <div class="container">
        <div class="section-title">
          <h3>EXPLORE</h3>
        </div>
        <div class="section-content">
          <div class="join-us-boxes">
            <div class="box green">
              <div class="join-img">
                <img src="<?php echo get_theme_mod('join_content_image1'); ?>">
              </div>
              <div class="join-content">
                <span><?php echo get_theme_mod('join_content_text1'); ?></span>
              </div>
            </div>
            <div class="box blue">
              <div class="join-img">
                <img src="<?php echo get_theme_mod('join_content_image2'); ?>">
              </div>
              <div class="join-content">
                <span><?php echo get_theme_mod('join_content_text2'); ?></span>
              </div>
            </div>
            <div class="box lavendar">
              <div class="join-img">
                <img src="<?php echo get_theme_mod('join_content_image3'); ?>">
              </div>
              <div class="join-content">
                <span><?php echo get_theme_mod('join_content_text3'); ?></span>
              </div>
            </div>
          </div>
          <a href="<?php echo get_theme_mod('join_now_link'); ?>" class="join-now-btn">Join Now</a>
        </div>
      </div>
    </div>
    <div class="career-pitch-sec sections">
      <div class="half-col careerbg" >
        <div class="virtual-text">
          <h4><?php echo get_theme_mod('text_title'); ?></h4>
          <?php echo get_theme_mod('video_content'); ?>
        </div>
      </div>
      <div class="half-col">
        <div class="video_wrapper">
          <div class="video_wrapper_inner">
            <div class="video-tag">
              <img src="<?php echo get_stylesheet_directory_uri().'/css/images/video-tag.png'; ?>" alt="video Tag" />
            </div>
            <div class="video-text">
              <img src="<?php echo get_stylesheet_directory_uri();?>/images/video_03.jpg" alt="video Tag" />
            </div>
          </div>
        </div>
        <!-- <div class="video-tag">
          <img src="<?php echo get_stylesheet_directory_uri().'/css/images/video-tag.png'; ?>" alt="video Tag" />
        </div>
        <div class="video-text">
          <?php echo get_theme_mod('video_html_iframe'); ?>
        </div> -->
      </div>
    </div>
    <div class="about-section sections">
      <div class="container">
        <div class="section-title">
          <h3>About</h3>
        </div>
        <div class="section-content">
          <div class="about-boxes">
            <div class="box">
              <div class="img-box">
                <img src="<?php echo get_theme_mod('about_image1'); ?>" alt="About" />
                <div class="overlay">
                  <span><?php echo get_theme_mod('about_title1'); ?></span>
                </div>
              </div>
              <div class="box-content">
                <?php echo get_theme_mod('about_content1'); ?>
              </div>
            </div>
            <div class="box">
              <div class="img-box">
                <img src="<?php echo get_theme_mod('about_image2'); ?>" alt="About" />
                <div class="overlay">
                  <span><?php echo get_theme_mod('about_title2'); ?></span>
                </div>
              </div>
              <div class="box-content">
                <?php echo get_theme_mod('about_content2'); ?>
              </div>
            </div>
            <div class="box">
              <div class="img-box">
                <img src="<?php echo get_theme_mod('about_image3'); ?>" alt="About" />
                <div class="overlay">
                  <span><?php echo get_theme_mod('about_title3'); ?></span>
                </div>
              </div>
              <div class="box-content">
                <?php echo get_theme_mod('about_content3'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php get_footer( 'home' ); ?>