</main>
<section class="instagram">
<!-- <?php
	$images =& get_children( array (
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image'
	));
 
	if ( empty($images) ) {
		// no attachments here
	} else {
		foreach ( $images as $attachment_id => $attachment ) {
			echo wp_get_attachment_image( $attachment_id, 'thumbnail' );
		}
	}
?> -->

<div class="image">
  
</div>

</section>

<footer class="footer">
  <div class="inner">
    <ul class="footer_social">
      <li class="icon-twitter"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
      <li class="icon-facebook"><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li class="icon-instagram"><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      <li class="icon-youtube"><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
    </ul>
    <p>Copyright ©2024 All rights reserved | This template is made with  by Colorlib</p>
    <div>
      <p class="privacy"><a href="">Terms & Conditions</a>/<a href="">Privacy Policy</a></p>
    </div>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js" integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
</body>
</html>
