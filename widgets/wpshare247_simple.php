<?php
if( !class_exists('wpshare247_simple') ):
    class wpshare247_simple extends WP_Widget {
        function __construct() {
            parent::__construct(
                'wpshare247_simple', esc_html_x('* [Trái] Thông tin truy cập', 'widget name', 'wpshare247'),
                array(
                    'classname' => 'wpshare247_simple',
                    'description' => esc_html__('Hiển thị thông tin của khách đang truy cập', 'wpshare247'),
                    'customize_selective_refresh' => true
                )
            );
        }
        
        //Hiển thị nội dung Widget lên website
        function widget($args, $instance) {
            $defaults = array('title' => '');
            
            //Gọi giá trị các field đã khai báo trong hàm form()
            $title = $instance['title'];
            //$field_khac = $instance['field_khac']; // gọi thêm các field khác tại dòng này
            
            echo $args['before_widget'];
            ?>
                <?php echo $args['before_title'] . $title . $args['after_title'] ?>
                <div class="wg-content">
                    <ul>
                        <li><span><?php esc_html_e('IP hiện tại', 'wpshare247'); ?></span>: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
                    </ul>
                    
                </div>
            <?php
            echo $args['after_widget'];
        }
        
        //Hàm cập nhật option cho Widget
        function update($new_instance, $old_instance) {
            $instance = array();
            
            // Cập nhật title được khai báo trong hàm form
            if (!empty($new_instance['title'])) {
                $instance['title'] = ($new_instance['title']);
            }
            
            // Cập nhật thêm các các field được khai báo trong hàm form (nếu có)
            return $instance;
        }
        
        //Form cập nhật các option cho Widget
        function form($instance) {
            $arr_page = get_pages();
            $defaults = array('title' => '');
            $instance = wp_parse_args($instance, $defaults); ?>
            
            <!-- Widget field 1 -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Tiêu đề', 'wpshare247'); ?></label>
                <input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
            </p>
            
            <!-- Bạn có thể thêm các Widget field khác bên dưới, field có thể là text, select, textarea..... -->
            
            
        <?php
        }
    }
endif;