<div class="block">
    <div class="heading">
        <a href="<?= $slug; ?>">
            <h2 class="caption"><?= $title; ?></h2>
        </a>
            <a class="see-more" href="<?= $slug; ?>">Xem tất cả<i class="fa fa fa-caret-right"></i></a>

    </div>
    <ul class="list-film horizontal">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <?php if ($key== 1 ) : ?>
                <li class="item large">
                    <span class="label"><?= op_get_total_episode() ?> | <?= op_get_lang() ?>| <?= op_get_quality() ?></span>
                    <a title="<?php the_title(); ?> - <?= op_get_original_title() ?>" href="<?php the_permalink(); ?>">
                        <img width="485px" height="273px" class="img-1 lazyload"
                            alt="<?php the_title(); ?> - <?= op_get_original_title() ?>"
                            data-src="<?= op_get_poster_url() ?>" />
                        <p><?php the_title(); ?></p> <i class="icon-play"></i>
                    </a>
                </li>
           <?php else : ?>
                <li class="item small">
                    <span class="label"><?= op_get_total_episode() ?> | <?= op_get_lang() ?>| <?= op_get_quality() ?></span>
                    <a title="<?php the_title(); ?> - <?= op_get_original_title() ?>" href="<?php the_permalink(); ?>">
                        <img width="238px" height="134px" class="img-2 lazyload"
                            alt="<?php the_title(); ?> - <?= op_get_original_title() ?>"
                            data-src="<?= op_get_poster_url() ?>"
                            src="<?= op_get_poster_url() ?>" />
                        <p><?php the_title(); ?></p>
                        <i class="icon-play"></i>
                    </a>
                </li>
           <?php endif ?>
        <?php endwhile; ?>
    </ul>
</div>
