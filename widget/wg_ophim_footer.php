<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?><div id="footer">
    <div class="container">
        <a id="footer-logo" class="column" href="">
            <img src="https://ophim.cc/logo-ophim-5.png" alt="" />
        </a>
        <div class="column contact">
            <p>Phim Mới</p>
            <ul>
                <li><a href="" title="Phim chiếu rạp">Phim chiếu rạp</a></li>
                <li><a href="" title="Phim lẻ hay">Phim lẻ</a></li>
                <li><a href="" title="Phim bộ hay">Phim bộ</a></li>
            </ul>
        </div>
        <div class="column ">
            <p>Phim Hay</p>
            <ul>
                <li><a href="" title="Phim Mỹ">Phim Mỹ</a></li>
                <li><a href="" title="Phim Hàn Quốc">Phim Hàn Quốc</a></li>
            </ul>
        </div>
        <div class="column">
            <p>Phim Hot</p>
            <ul>
                <ul>
                    <li><a title="phimmoi" href="">Phimmoi</a></li>
                </ul>
            </ul>
        </div>
        <div class="column">
            <p>Trợ giúp</p>
            <ul>
                <li><a href="javascript:void(0)">Hỏi đáp</a></li>
                <li><a rel="nofollow" href="">Liên hệ</a></li>
                <li><a href="javascript:void(0)">Tin tức</a></li>
            </ul>
        </div>
        <div class="column">
            <p>Thông tin</p>
            <ul>
                <li><a href="">Điều khoản sử dụng</a></li>
                <li><a href="">Chính sách riêng tư</a></li>
                <li><a href="">Khiếu nại bản quyền</a></li>
                <li>&copy; 2022</li>
            </ul>
        </div>
    </div>
</div><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
