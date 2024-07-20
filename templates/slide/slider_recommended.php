<div class="block top-slide">
    <div class="heading">
        <h2 class="caption" title="Xem Phim"><?= $title; ?></h2>
    </div>
    <ul id="film-hot" class="list-film">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <li class="item">
                <span class="label">
                    <span class="film-format"><?= op_get_total_episode() ?> | <?= op_get_lang() ?></span>
                </span>
                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                    <img alt="<?php the_title(); ?>" class="lazyload" data-src="<?= op_get_poster_url() ?>" src="<?php the_permalink(); ?>" />
                    <p><?php the_title(); ?></p> <i class="icon-play"></i>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
