<?php get_header(); ?>

<?php
// Custom Query to Retrieve Slider Items
$slider_query = new WP_Query(array(
    'post_type' => 'slider',
    'posts_per_page' => -1, // Retrieve all sliders
    'orderby' => 'date',
    'order' => 'ASC',
));

if ($slider_query->have_posts()) : ?>
    <div class="top-slider">
      <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
          <div class="slide-content js-slider">
            <?php the_content(); ?>
          </div>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>


<section class="blog">
  <div class="inner">
    <h2 class="section-title">Latest Posts</h2>
    <ul class="blog-list">
      <?php include 'post-item.php' ?>
    </ul>
  </div>
</section>

<div class="banner">
  <div class="inner">
    <div class="banner-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-banner.jpg" alt="top-banner" />
    </div>
  </div>
</div>

<?php get_footer(); ?>
