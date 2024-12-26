<?php 
$args = array(
  'post_type'=> 'post',
  'orderby'    => 'ID',
  'post_status' => 'publish',
  'order'    => 'DESC',
  'posts_per_page' => -1 // this will retrive all the post that is published 
  );
  $result = new WP_Query( $args );
  if ( $result-> have_posts() ) : ?>
  <?php while ( $result->have_posts() ) : $result->the_post(); ?>
    <li class="blog-item">
      <a href="<?= get_permalink();?>">
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <div class="feature-image">
              <img src=<?php echo $image[0];?> alt="<?php echo the_title(); ?>"/>
            </div>
          <?php endif; ?>
          <div class="content">
            <div class="category">
              <?php
                foreach((get_the_category()) as $category) { 
                  echo $category->cat_name . ' '; 
              }?>
            </div>
            <h3 class="blog-item-title"><?php the_title(); ?></h3>
          </div>
        </a>
      </li>
  <?php endwhile; ?>
  <?php endif; wp_reset_postdata(); ?>
