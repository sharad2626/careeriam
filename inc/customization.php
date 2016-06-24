<?php
if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
 
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}
endif;

function careeriam_customize_register( $wp_customize ) {
    /*
     * Home Page Join Setting Section.
     */
    $wp_customize->add_section( 'careeriam_home_join' , array(
                                'title'      => __( 'Home Page Join Setting', 'careeriam' ),
                                'priority'   => 10,
                               ) );
    /*
     * Join section Controls.
     */
    
     $wp_customize->add_setting( 'join_now_link', array('default' => ''));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'join_now_link', 
                                            array(  'label'      => __( 'Join Link', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_join',
                                                    'settings'   => 'join_now_link',
                                                    'priority' => 1,
                                                 ) ) 
                                            );
    
    $wp_customize->add_setting( 'join_content_image1', array('capability'  => 'edit_theme_options') );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'join_content_image1',
                                     array(
                                            'label'      => __( 'Upload Image 1', 'careeriam' ),
                                            'section'    => 'careeriam_home_join',
                                            'settings'   => 'join_content_image1',
                                            'priority' => 2,
                                           )
                                    )
                                );
    $wp_customize->add_setting( 'join_content_text1', array('default' => ''));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'join_content_text1', 
                                            array(  'label'      => __( 'Text 1', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_join',
                                                    'settings'   => 'join_content_text1',
                                                    'priority' => 3,
                                                 ) ) 
                                            );
    
    $wp_customize->add_setting( 'join_content_image2', array('capability'  => 'edit_theme_options') );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'join_content_image2',
                                     array(
                                            'label'      => __( 'Upload Image 2', 'careeriam' ),
                                            'section'    => 'careeriam_home_join',
                                            'settings'   => 'join_content_image2',
                                            'priority' => 4,
                                           )
                                    )
                                );
    $wp_customize->add_setting( 'join_content_text2', array('default' => ''));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'join_content_text2', 
                                            array(  'label'      => __( 'Text 2', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_join',
                                                    'settings'   => 'join_content_text2',
                                                    'priority' => 5,
                                                 ) ) 
                                            );
    
    
    $wp_customize->add_setting( 'join_content_image3', array('capability'  => 'edit_theme_options') );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'join_content_image3',
                                     array(
                                            'label'      => __( 'Upload Image 3', 'careeriam' ),
                                            'section'    => 'careeriam_home_join',
                                            'settings'   => 'join_content_image3',
                                            'priority' => 6,
                                           )
                                    )
                                );
    $wp_customize->add_setting( 'join_content_text3', array('default' => ''));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'join_content_text3', 
                                            array(  'label'      => __( 'Text 3', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_join',
                                                    'settings'   => 'join_content_text3',
                                                    'priority' => 7,
                                                 ) ) 
                                            );
    /*
     * Home Page Video Setting Section.
     */
    $wp_customize->add_section( 'careeriam_home_video_text' , array(
                                'title'      => __( 'Home Video Text Setting', 'careeriam' ),
                                'priority'   => 11,
                               ) );
    
    $wp_customize->add_setting( 'text_title', array('default' => ''));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'text_title', 
                                            array(  'label'      => __( 'Title', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_video_text',
                                                    'settings'   => 'text_title',
                                                    'priority' => 1,
                                                 ) ) 
                                            );
    $wp_customize->add_setting( 'video_content', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize,'video_content', 
                                    array( 'label'=> __( 'Content', 'careeriam' ),
                                           'section' => 'careeriam_home_video_text',
                                           'settings' => 'video_content',
                                           'priority' => 2,
                                        )
                              ));
    $wp_customize->add_setting( 'video_html_iframe', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize,'video_html_iframe', 
                                    array( 'label'=> __( 'Video Iframe Html', 'careeriam' ),
                                           'section' => 'careeriam_home_video_text',
                                           'settings' => 'video_html_iframe',
                                           'priority' => 3,
                                        )
                              ));
    
    
    /*
     * Home Page Join Setting Section.
     */
    $wp_customize->add_section( 'careeriam_home_about' , array(
                                'title'      => __( 'Home Page About Setting', 'careeriam' ),
                                'priority'   => 12,
                               ) );
    /*
     * ABout section Controls.
     */
    $wp_customize->add_setting( 'about_image1', array('capability'  => 'edit_theme_options') );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image1',
                                     array(
                                            'label'      => __( 'Upload Image 1', 'careeriam' ),
                                            'section'    => 'careeriam_home_about',
                                            'settings'   => 'about_image1',
                                            'priority' => 1,
                                           )
                                    )
                                );
    
    $wp_customize->add_setting( 'about_title1', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'about_title1', 
                                            array(  'label'      => __( 'Title 1', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_about',
                                                    'settings'   => 'about_title1',
                                                    'priority' => 2,
                                                 ) ) 
                                            );
    
    $wp_customize->add_setting( 'about_content1', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize,'about_content1', 
                                    array( 'label'=> __( 'Content 1', 'themename' ),
                                           'section' => 'careeriam_home_about',
                                           'settings' => 'about_content1',
                                           'priority' => 3,
                                        )
                              ));
    
    
    $wp_customize->add_setting( 'about_image2', array('capability'  => 'edit_theme_options') );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image2',
                                     array(
                                            'label'      => __( 'Upload Image 2', 'careeriam' ),
                                            'section'    => 'careeriam_home_about',
                                            'settings'   => 'about_image2',
                                            'priority' => 4,
                                           )
                                    )
                                );
    
    $wp_customize->add_setting( 'about_title2', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'about_title2', 
                                            array(  'label'      => __( 'Title 2', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_about',
                                                    'settings'   => 'about_title2',
                                                    'priority' => 5,
                                                 ) ) 
                                            );
    
    $wp_customize->add_setting( 'about_content2', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize,'about_content2', 
                                    array( 'label'=> __( 'Content 2', 'careeriam' ),
                                           'section' => 'careeriam_home_about',
                                           'settings' => 'about_content2',
                                           'priority' => 6,
                                        )
                              ));
    
   
    
    
    $wp_customize->add_setting( 'about_image3', array('capability'  => 'edit_theme_options') );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image3',
                                     array(
                                            'label'      => __( 'Upload Image 3', 'careeriam' ),
                                            'section'    => 'careeriam_home_about',
                                            'settings'   => 'about_image3',
                                            'priority' => 7,
                                           )
                                    )
                                );
    
    $wp_customize->add_setting( 'about_title3', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,  'about_title3', 
                                            array(  'label'      => __( 'Title 3', 'careeriam' ),
                                                    'type'           => 'text',
                                                    'section'    => 'careeriam_home_about',
                                                    'settings'   => 'about_title3',
                                                    'priority' => 8,
                                                 ) ) 
                                            );
    
    $wp_customize->add_setting( 'about_content3', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize,'about_content3', 
                                    array( 'label'=> __( 'Content 3', 'careeriam' ),
                                           'section' => 'careeriam_home_about',
                                           'settings' => 'about_content3',
                                           'priority' => 9,
                                        )
                              ));
}
add_action( 'customize_register', 'careeriam_customize_register' );
