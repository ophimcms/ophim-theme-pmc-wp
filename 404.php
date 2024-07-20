<?php
get_header();
?>
<div id="main-content">
    <?php if(get_option('ophim_is_ads') == 'on') { ?>
        <div id=top_addd></div>
    <?php } ?>

    <div id="content">

        <div class="container" style="text-align: center">
            <h1>404</h1>
            <h1>Trang không tồn tại</h1>
        </div>
    </div>
</div>
<?php
get_footer();
?>

