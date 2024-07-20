<?php
get_header();
?>
<div id="main-content">
    <?php if(get_option('ophim_is_ads') == 'on') { ?>
        <div id=top_addd></div>
    <?php } ?>

    <div id="content">

        <div class="container">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-12">

                            <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                     alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                            <br>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <article>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p></article>
                            <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                        </div>

                <?php }
                wp_reset_postdata();
            } ?>
            <?php ophim_pagination(); ?>

            <?php ophim_pagination(); ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
