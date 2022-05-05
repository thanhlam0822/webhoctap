<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>../css/style.css">
    
</head>
<body>
  <div id="header">
        <div class="container-fluid main-nav">
            <div class="row ">
            <nav class="navbar navbar-expand-sm  navbar-dark ">
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
 <div class="content-info ">
   <h1 class="des-heading"> KHÓA HỌC</h1>
   <h3 class="content-des-main">Thư viện khóa học lập trình từ cơ bản đến nâng cao</h3>
   <p class="content-choice">Python ? C++? C# hay Java?
    Bạn lựa chọn ngôn ngữ nào để bắt đầu chặng đường trở thành lập trình viên của mình?</p>
 </div>
 
</body>
</html>