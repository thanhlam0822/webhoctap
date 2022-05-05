<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>../css/style1.css">
    
</head>
<body>
  <div id="header">
        <div class="container-fluid main-nav">
            <div class="row ">
            <nav class="navbar navbar-expand-sm bg-dark  navbar-dark ">
    <div class="container-fluid ">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <a class="navbar-brand" href="<?php bloginfo('url') ?>"><i class="bi bi-house-door"></i></a>
    <?php
        wp_nav_menu( array(
          'theme_location'  => 'header-menu',
          'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'bs-example-navbar-collapse-1',
          'menu_class'      => 'navbar-nav mr-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),
      ) );
        ?>
  </div>
           </nav>            
           </div>
        </div>
    </div>
    <div id="content">
        <div class="main">
            <div class="container">
            <div class="row">
                
            <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        
        <div class="col-lg-8 main-content d-flex">
        <div class="post-thumbnail">
        <a href="<?php the_permalink(); // lấy link của bài viết ?>">
        <?php echo get_the_post_thumbnail( get_the_id(), 'thumbnail', array( 'class' =>'thumnail') ); ?>
        </a>
        
        </div>
        <div class="post-content">
       
        <h4 class="post-title" >
        <a class="post-link"  href="<?php the_permalink(); // lấy link của bài viết ?>">
                    <?php the_title(); // lấy tiêu đề ?>
        </a>
        </h4>
        
            <div class="post-info  ">
            <div class="  d-flex date-author">
            <div class="meta post-date">Ngày đăng: <?php echo get_the_date('d - m -Y'); // lấy ngày post bài ?></div>
            <div class="post-author"> Tác giả/Dịch giả: <?php the_author(); ?></div>
            </div>
            <div class="post-category d-flex "> Danh mục: <?php the_category(); ?></div>
            
            <div class="post-view"> Lượt xem: <?= gt_get_post_view(); ?></div>
            
            </div>
            <div class="border-post"></div>
        </div>
        <br>
        
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if(paginate_links()!='') {?>
	 <div class="quatrang">
		<?php
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'prev_text'    => __('« Mới hơn'),
			'next_text'    => __('Tiếp theo »'),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
			) );
	    ?>
	 </div>
      <?php } ?>
            </div>
            </div>
        </div>
    </div>


</body>
</html>