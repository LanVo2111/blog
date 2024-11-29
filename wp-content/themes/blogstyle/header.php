<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
  
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.0/swiper-bundle.min.css" integrity="sha512-uG1VdF3D2A04VySZa+8/m9bNJ+Zeg/HTsF8qwe/NLWdzf+5LcpSiV3oeb8o6lRddIlCWXxMXGKl/gynLSb0New==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
</head>
<body>
  <header class="header">
    <div class="inner">
      <div class="header-wrap">
      <?php if ( is_home() || is_front_page() ) : ?>
        <h1 class="header_logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            Lanase
          </a>
        </h1>
      <?php else : ?>
        <p class="header_logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            Lanase
          </a>
        </p>
      <?php endif; ?>

      <ul class="site-menu">
        <li class="active"><a href="">Home</a></li>
      </ul>
      <ul class="site-social">
        <li class="icon-twitter"><a href=""><i class="fa-brands fa-twitter"></i></a></li>
        <li class="icon-facebook"><a href=""><i class="fa-brands fa-facebook"></i></a></li>
        <li class="icon-instagram"><a href=""><i class="fa-brands fa-instagram"></i></a></li>
      </ul>
      <div class="search-box">
			  <input type="text" class="search-input" />
			  <button class="search-btn">
				  <i class="fas fa-search"></i>
			  </button>
		  </div>
      </div>
      
    </div>
  </header>
<main class="main">

</main>


</body>

</html>
