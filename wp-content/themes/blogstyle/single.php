<?php get_header(); ?>

<div class="detail-page">
  <div class="inner">
    <div class="content">
      <div class="post-content">
        <div class="category">Travel</div>
        <h2 class="title">Vintage camper van for a summer adventure</h2>
        <?php if (has_post_thumbnail()) : ?>
            <!-- <div class="mg-auto"><?php the_post_thumbnail('large'); ?></div> -->
            <div><?php the_content(); ?></div>
        <?php endif; ?>
        
      </div>

      <!-- GET CATEGORY LIST -->
      <div class="post-other">
        <div class="post-category">
          <h3>Categories</h3>
          <ul class="list">
          <?php
            $categories = get_categories();
            if ($categories) {
              foreach ($categories as $category) {
                echo '<li class="item"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
              }
            }
          ?>
          </ul>
        </div>

        <!-- GET TAG LIST -->
        <?php
          $tags = get_the_tags();
          if ($tags) {
            echo '<div class="post-category"><h3>Tags</h3><ul class="list tag-list">';
            foreach ($tags as $tag) {
              echo '<li class="item tag-item"><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
            }
            echo  '</ul></div>';
          }

          wp_reset_postdata();
        ?>

      </div>
    </div>

    <!-- GET RELATED POST -->
    <?php
      $categories = wp_get_post_categories(get_the_ID());
      $args = array(
          'category__in' => $categories,
          'post__not_in' => array(get_the_ID()),
          'posts_per_page' => 3, // Limit the number of related posts
      );

      $related_posts = new WP_Query($args);

      if ($related_posts->have_posts()) :
          echo '<div class="related"><h2 class="section-title">Related Posts</h2><ul class="related-post">';
          while ($related_posts->have_posts()) : $related_posts->the_post();
              ?>
              <li class="blog-item">
                <a href="<?= get_permalink();?>">
                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                      <div class="feature-image">
                        <img src=<?php echo $image[0];?> alt="<?php echo the_title(); ?>"/>
                      </div>
                    <?php endif; ?>
                    <div class="blog-item-content">
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
            <?php
          endwhile;
          echo '</ul></div>';
          wp_reset_postdata();
      endif;
    ?>

  </div>
</div>

<?php get_footer(); ?>
