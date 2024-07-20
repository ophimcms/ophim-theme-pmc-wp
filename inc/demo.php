<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<div id="footer">
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
</div>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);