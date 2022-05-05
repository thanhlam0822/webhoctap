<!-- Hàm đăng ký menu -->

<?php
@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '300' );
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Menu chính' ));
  add_theme_support('post-thumbnails');
}
add_action( 'init', 'register_my_menu' );
add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
// Hàm tạo dropdown menu
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}


if (function_exists('glsr_create_review')) {
    $review = glsr_create_review([
        'rating' => 5,
        'title' => 'Fantastic plugin!',
        'content' => 'This is my review.',
        'name' => 'Jane Doe',
        'email' => 'jane@doe.com',
        'date' => '2020-06-13',
    ]);
}

// Hàm đếm số lượt xem
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
//Thêm đoạn code sau vào functions.php
function wpshare247_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'wpshare247_theme_support' );
function wpshare247_widgets_init(){
    // Thêm SB footer
    register_sidebar( array(
        'name'          => __( 'Footer', 'text_domain'), // Tên sidebar hiển thị trong admin
        'id'            => 'sidebar-footer', // ID của sidebar không được trùng, dùng để hiển thị SB
        'description'   => __( 'Thêm các widget *[Footer] vào đây', 'text_domain'), // Mô tả cho SB nảy
        'before_widget' => '<section id="%1$s" class="widget %2$s">', // Bạn có thể thêm Class cho SB vào đây
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">', // Thẻ mở để tạo tiêu đề chung cho tất cả các Widget nẳm trong Sidebar này
        'after_title'   => '</h2>', // Đóng thẻ tiêu đề
    ) );
    
    // Thêm SB phải
    register_sidebar( array(
        'name'          => __( 'Sidebar phải', 'text_domain' ),
        'id'            => 'sidebar-right',
        'description'   => __( 'Thêm các widget *[Phải] vào đây', 'text_domain' ),
        'before_widget' => '<section id="%1$s" class="widget sb-right %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Sidebar trái', 'text_domain' ),
        'id'            => 'sidebar-left',
        'description'   => __( 'Thêm các widget *[Trái] vào đây', 'text_domain' ),
        'before_widget' => '<section id="%1$s" class="widget sb-right %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    // Thêm các SB tiếp theo
}
add_action( 'widgets_init', 'wpshare247_widgets_init' );
function wpshare247_register_widgets(){
    //Khai báo widget mới
    $file = realpath(dirname(__FILE__)).'/widgets/wpshare247_simple.php';
    require_once($file);
    register_widget('wpshare247_simple');
    
    //Hãy tiếp tục khai báo thêm các WG khác như bên dưới
    /*$file = realpath(dirname(__FILE__)).'/widgets/wpshare247_simple_2.php';
    require_once($file);
    register_widget('wpshare247_simple_2');*/
    
}
add_action('widgets_init', 'wpshare247_register_widgets');
