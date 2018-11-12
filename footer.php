<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laura_Renee_Mehl
 */


$social_media_accounts     = get_field('social_media_account_selector',26);
$facebook_username         = get_field('facebook_account',26);
$instagram_username        = get_field('instagram_account',26);
$twitter_username          = get_field('twitter_account',26);
$youtube_username          = get_field('youtube_account',26);

?>

	<footer id="footer">
      <!-- To Top button -->
      <div id="toTop">
        <i class="fas fa-arrow-up"></i>
      </div>


      

      <div class="footer-info-wrap">
        <div class="name"><?php bloginfo('name'); ?></div>

        <div class="foot-social-container">
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
              <a href="https://youtube.com/<?php echo $youtube_username; ?>/" target="blank">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          <?php endif; ?>
        </div>

        


        <div class="copyright">
          &copy; <span id="year"></span><?php bloginfo('name'); ?> All rights reserved.
        </div>
      </div>

    </footer>

<?php wp_footer(); ?>

</body>
</html>
