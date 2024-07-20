<?php
get_header();
?>
<div id="main-content">
    <?php if(get_option('ophim_is_ads') == 'on') { ?>
        <div id=top_addd></div>
    <?php } ?>

    <div id="content">

        <div class="container">
            <?php if ( is_active_sidebar('widget-slider-poster') ) {
                dynamic_sidebar( 'widget-slider-poster' );
            } else {
                _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
            }
            ?>

            <?php if ( is_active_sidebar('widget-area') ) {
                dynamic_sidebar( 'widget-area' );
            } else {
                _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
