

<?php
if ( is_active_sidebar('widget-footer') ) {
    dynamic_sidebar( 'widget-footer' );
} else {
    _e('This is widget footer. Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
</body>
<script>
    var $menu = $("#menu-mobile");
    var $over_lay = $('#overlay_menu');
    var hw = $(window).height();

    function set_height_menu() {}

    function open_menu() {
        $('body').addClass('menu-active');
        $menu.addClass('expanded');
        set_height_menu();
        $(".btn-humber").addClass('active');
    }

    function close_menu() {
        $('body').removeClass('menu-active');
        $menu.removeClass('expanded');
        var w_scroll_top = $(window).scrollTop();
        if (w_scroll_top >= 50) {
            pos_top_menu = 0;
        } else {
            pos_top_menu = w_scroll_top;
        }
        set_height_menu();
        $(".btn-humber").removeClass('active');
    }
    $(document).ready(function() {
        $(".btn-humber").click(function() {
            if ($menu.hasClass('expanded')) {
                close_menu();
            } else {
                open_menu();
            }
        });
        $(window).scroll(function() {
            set_height_menu();
        });
        $(".parent-menu").click(function(e) {
            e.preventDefault();
            $this = $(this);
            $arrow = $this.find('.fa');
            if ($arrow.length && event.target.className != 'sub-menu-link') {
                if ($arrow.hasClass('fa-angle-down')) {
                    $arrow.removeClass('fa-angle-down').addClass('fa-angle-up');
                } else {
                    $arrow.addClass('fa-angle-down').removeClass('fa-angle-up');
                }
                $this.find('.sub-menu').toggle();
                return false;
            } else {
                var href = event.target.href;
                window.location.href = href;
            }
        });
    });
</script>

<?php wp_footer(); ?>
</html>