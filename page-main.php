<?php
/*
  Template Name: Front Page
*/

// Advanced Custom Fields
$homepage_bg_image        = get_field('homepage_image');

$about_section_image      = get_field('about_section_image');
$about_section_title      = get_field('about_section_title');
$about_section_text       = get_field('about_section_text');

$gallery_id               = get_field('image_gallery_id');
$gallery_shortcode        = '[ngg_images gallery_ids=' . $gallery_id . ' display_type="photocrati-nextgen_basic_thumbnails"]';
            
$video_embed              = get_field('video_url');

$resume_section_title     = get_field('resume_section_title');
$colum_1_title            = get_field('column_1_title');
$colum_2_title            = get_field('column_2_title');
$colum_3_title            = get_field('column_3_title');
$school_image             = get_field('school_image');
$degree_title             = get_field('degree_title');
$degree_details           = get_field('degree_details');
$resume_button_text       = get_field('resume_button_text');
$resume_file              = get_field('resume_file');

$contact_form_title       = get_field('contact_form_title');
$contact_form_shortcode   = get_field('contact_form_shortcode');
$contact_bg_image         = get_field('contact_background_image');


$social_media_accounts     = get_field('social_media_account_selector');
$facebook_username         = get_field('facebook_account');
$instagram_username        = get_field('instagram_account');
$twitter_username          = get_field('twitter_account');
$youtube_username          = get_field('youtube_account');
$instagram_feed            = get_field('instagram_feed');
$twitter_feed              = get_field('twitter_feed');

get_header();
?>

	<!-- Landing Screen -->
  <?php if ( !empty($homepage_bg_image)) { ?>
    <section id="home" style="background-image: url('<?php echo $homepage_bg_image['url']; ?>')" >
  <?php } else { ?>
    <section id="home">
  <?php } ?>

      <a name="home"></a>
      
      <div class="home-content-container">
        <div class="site-info-container">
          <div class="info">
            <h1><?php bloginfo('name'); ?></h1>
            <h2><?php bloginfo('description'); ?></h2>
          </div>
        </div>
      </div>

      <div class="social-container">
        <?php if($social_media_accounts && in_array('facebook', $social_media_accounts) ) : ?>
          <div class="social-icon">
            <a href="https://facebook.com/<?php echo $facebook_username; ?>" target="blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        <?php endif; ?>
        <?php if($social_media_accounts && in_array('instagram', $social_media_accounts) ) : ?>
          <div class="social-icon">
            <a href="https://instagram.com/<?php echo $instagram_username; ?>/" target="blank">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        <?php endif; ?>
        <?php if($social_media_accounts && in_array('twitter', $social_media_accounts) ) : ?>
          <div class="social-icon">
            <a href="https://twitter.com/<?php echo $twitter_username; ?>" target="blank">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        <?php endif; ?>
        <?php if($social_media_accounts && in_array('youtube', $social_media_accounts) ) : ?>
          <div class="social-icon">
            <a href="https://youtube.com/channel/<?php echo $youtube_username; ?>/" target="blank">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        <?php endif; ?>
          
        
      </div>

      <?php if ( !empty($homepage_bg_image)) { ?>

        <div class="mobile-home-img">
          <img src="<?php echo $homepage_bg_image['url']; ?>" alt="<?php echo $homepage_bg_image['alt']; ?>">
        </div>
        
      <?php } ?>

      
      
      
    </section>

    <!-- About -->
    <section id="about">
      <a name="about"></a>
      <div class="about-text-container">
        <div class="about-text">
          <h2><?php echo $about_section_title; ?></h2>
          <p>
            <?php echo $about_section_text; ?>
          </p>
        </div>
      </div>

      <!-- If image was uploaded -->
      <?php if ( !empty($about_section_image) ) : ?>

        <div class="about-img">
          <img src="<?php echo $about_section_image['url']; ?>" alt="<?php echo $about_section_image['alt']; ?>">
        </div>

      <?php endif; ?>
      
    </section>

    <!-- Gallery -->
    <section id="gallery">
      <a name="gallery"></a>
      <div class="gallery-container">
        <?php echo do_shortcode($gallery_shortcode); ?>
        
      </div>
      <div class="videos-container">

        <?php $video_loop = new WP_Query( array( 'post_type' => 'video_embed', 'orderby' => 'post_id', 'order' => 'ASC' )); ?>

        <?php while( $video_loop->have_posts() ) : $video_loop->the_post(); ?>
        <div class="video-wrapper">
          <div class="video-container">
            <?php the_field(video_url); ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </section>

    <!-- Resume/Experience -->
    <section id="resume">
      <a name="resume"></a>
      <div class="title-container">
        <div class="title">
          <h2><?php echo $resume_section_title; ?></h2>
        </div>
      </div>
      
      <div class="resume-container">
        <div class="resume-category">
          <h3 class="cat-title">
            <?php echo $colum_1_title ?>
          </h3>
          <?php 
          $loop = new WP_Query( array( 
            'post_type' => 'resume_entry', 
            'tax_query' => array(
              array(
                'taxonomy' => 'entry_location',
                'field' => 'slug',
                'terms' => 'left'
            )),
            'orderby' => 'post_id', 
            'order' => 'DESC' ) );
            while( $loop->have_posts() ) : $loop->the_post();
            echo $the_post_name
          ?>

            <div class="resume-credit-wrap">
              <h4 class="credit-row-1">
                <?php the_field(character_name) ?>
              </h4>
              <h5 class="credit-row-2">
              <?php the_field(production_title) ?>
              </h5>
              <p class="credit-row-3">
                <?php the_field(company_name) ?>
              </p>
            </div>

          <?php endwhile; ?>
          
        </div>

        <div class="resume-category">
          <h3 class="cat-title">
            <?php echo $colum_2_title ?>
          </h3>

          <?php 
          $loop = new WP_Query( array( 
            'post_type' => 'resume_entry', 
            'tax_query' => array(
              array(
                'taxonomy' => 'entry_location',
                'field' => 'slug',
                'terms' => 'middle'
            )),
            'orderby' => 'post_id', 
            'order' => 'DESC' ) );
            while( $loop->have_posts() ) : $loop->the_post();
            echo $the_post_name
          ?>

            <div class="resume-credit-wrap">
              <h4 class="credit-row-1">
                <?php the_field(character_name) ?>
              </h4>
              <h5 class="credit-row-2">
              <?php the_field(production_title) ?>
              </h5>
              <p class="credit-row-3">
                <?php the_field(company_name) ?>
              </p>
            </div>

          <?php endwhile; ?>
          
        </div>


        <div class="resume-category">
          <h3 class="cat-title">
            <?php echo $colum_3_title ?>
          </h3>

          <?php 
            $loop = new WP_Query( array( 
            'post_type' => 'resume_entry', 
            'tax_query' => array(
              array(
                'taxonomy' => 'entry_location',
                'field' => 'slug',
                'terms' => 'right'
            )),
            'orderby' => 'post_id', 
            'order' => 'DESC' ) );
            while( $loop->have_posts() ) : $loop->the_post();
            echo $the_post_name
          ?>

            <div class="resume-credit-wrap">
              <h4 class="credit-row-1">
                <?php the_field(character_name) ?>
              </h4>
              <h5 class="credit-row-2">
              <?php the_field(production_title) ?>
              </h5>
              <p class="credit-row-3">
                <?php the_field(company_name) ?>
              </p>
            </div>

          <?php endwhile; ?>
        </div>
        <div class="resume-school">

        <?php if ( !empty($school_image) ) : ?>

          <div class="logo">
            <img src="<?php echo $school_image['url']; ?>" alt="<?php echo $school_image['alt']; ?>">
          </div>

        <?php endif; ?>

         
          <div class="school-info">
            <h4 class="school-name">
              <?php echo $degree_title ?>
            </h4>
            <p class="degree-info">
              <?php echo $degree_details ?>
            </p>
          </div>
        </div>
        <div class="contact">
          <a class="btn-primary" href="<?php echo $resume_file['url']; ?>" target="_blank">
            <?php echo $resume_button_text ?>
          </a>
        </div>
      </div>
    </section>

    <!-- Social Media -->
    <section id="social-media">
      <a name="social"></a>
    <!-- Diagonal Border -->
      <div class="diagonal-border">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" x="0px" y="0px"
    viewBox="0 0 1920 258" style="enable-background:new 0 0 1920 258;" xml:space="preserve">
        
        <g>
          <polygon class="st0" points="0,240 1920,0 0,0 	"/>
        </g>
        </svg>
      </div>
      <div class="title">
        <h2>Follow Laura on Social Media</h2>
      </div>
      <div class="social-media-container">
        <div class="social-ig social-wrapper">
          <div class="social-info">
            
          </div>
          <div class="ig-grid">
            <?php echo do_shortcode($instagram_feed); ?>
          </div>
        </div>
        <div class="social-twitter social-wrapper">
          <div class="social-info">
            
          </div>
          <div class="twitter-posts">
            <?php echo do_shortcode($twitter_feed); ?>
          </div>
        </div>
      </div>
    </section>

    

    <!-- Contact Form -->
    <?php if ( !empty($contact_bg_image)) { ?>
      <section id="contact" style="background-image: url('<?php echo $contact_bg_image['url']; ?>'); background-size: cover;" >
    <?php } else { ?>
      <section id="contact">
    <?php } ?>
      <a name="contact"></a>
      <div class="contact-form-container">
        <div class="title">
          <h2>
            <?php echo $contact_form_title ; ?>
          </h2>
        </div>
        <div class="contact-form-wrap">
          <?php echo do_shortcode($contact_form_shortcode); ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
