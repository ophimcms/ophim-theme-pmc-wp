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
            while ( have_posts() ) : the_post();
                ?>

                <div class="group-film">
                    <h2><?php the_title(); ?>
                    </h2>
                    <div class="row group-film-small">
                        <?php  the_content(); ?>
                    </div>

                </div>


            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
