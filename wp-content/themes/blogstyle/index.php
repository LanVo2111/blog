<?php get_header(); ?>
<section class="trending">
  <div class="js-slider">
    
  </div>
</section>
<section class="blog">
  <div class="inner">
    <ul class="blog-list">
      <li class="blog-item">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <div class="img-wrap">
            <img alt="" class="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/image1.webp">
          </div>
          <div class="content">
            <div class="post-meta">
              <span class="category">Business / Travel</span>
              <span class="date">July 2, 2020</span>
            </div>
            <h3 class="title">Your most unhappy customers are your greatest source of learning.</h3>
            <p class="des">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </a>
      </li>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
