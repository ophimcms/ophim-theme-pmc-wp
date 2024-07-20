<div id="main-content">
    <?php if(get_option('ophim_is_ads') == 'on') { ?>
        <div id=top_addd></div>
    <?php } ?>

    <div id="content">

        <div class="container" id="detail-page">
            <?php if (op_get_notify()) { ?>
            <div class="block-note">
                Thông báo: <span class="text-danger"><?= op_get_notify() ?></span>
            </div>
            <?php } ?>
            <?php if (op_get_showtime_movies()) { ?>
            <div class="block-note">
                Lịch chiếu: <span class="text-info"><?= op_get_showtime_movies() ?></span>
            </div>
            <?php } ?>
            <div class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" itemprop="url"
                                                                                                  href="/" title="Xem phim"><span itemprop="name"><i class="fa fa-home"></i> Xem
                        phim <i class="fa fa-angle-right"></i></span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <?php foreach (get_the_terms(get_the_ID(), "ophim_categories") as $term) { ?>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo home_url('') . '/';
                    echo get_option('ophim_slug_categories') ? get_option('ophim_slug_categories') : 'categories' ?>/<?php echo "{$term->slug}" ?>/" title="<?php echo "{$term->name}" ?>">
                        <span itemprop="name">
                            <?php echo "{$term->name}" ?> <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                    <?php } ?>
                <li><?php the_title(); ?></li>
            </div>
            <div class="clear"></div>
            <div class="film-info" itemscope itemtype="https://schema.org/Movie">
                <div class="image"
                     style="background: url(<?= op_get_poster_url() ?>) no-repeat center;background-size: cover;">
                    <img class="avatar" itemprop="image" alt="<?php the_title(); ?>" src="<?= op_get_poster_url() ?>" />
                    <?php if (watchUrl()) { ?>
                    <a href="<?= watchUrl() ?>" class="icon-play"></a>
                    <?php } ?>
                    <div class="text">
                        <h1 itemprop="name"><?php the_title(); ?></h1>
                        <h2><?= op_get_original_title() ?> (<?= op_get_year() ?>)</h2>
                        <ul class="list-button">
                            <?php if (op_get_trailer_url()) { ?>
                            <li> <a class="btn btn-download btn-info" onclick="trailer();"
                                    title="Trailer <?php the_title(); ?>-<?= op_get_original_title() ?>">
                                    <i class="fa fa-youtube-play"></i> Trailer
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (watchUrl()) { ?>
                            <li> <a class="btn-see btn btn-danger"
                                    title="Xem phim <?php the_title(); ?> <?= op_get_original_title() ?>"
                                    href="<?= watchUrl() ?>">
                                    <i class="fa fa-play-circle-o"></i> Xem phim </a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="text">
                    <div class="social">
                        <div class="fb-send" data-href="<?php the_permalink(); ?>"></div>
                        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count"
                             data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                        <div class="box-rating">
                            <input id="hint_current" type="hidden" value="">
                            <input id="score_current" type="hidden"
                                   value="<?= op_get_rating(); ?>">
                            <div id="star" data-score="<?= op_get_rating(); ?>"
                                 style="cursor: pointer; float: left; width: 200px;">
                            </div>
                            <span id="hint"></span>
                            <div id="div_average" style="float:left; line-height:20px; margin:0 5px; ">(<span class="average"
                                                                                                              id="average"><?= op_get_rating(); ?></span> đ/<span
                                        id="rate_count"> /
                                <?= op_get_rating_count() ?></span> lượt)
                            </div>
                            <img class="hidden" itemprop="thumbnailUrl"
                                 src="<?= op_get_poster_url() ?>"
                                 alt="<?php the_title(); ?> <?= op_get_original_title() ?>"> <img class="hidden"
                                                                                                        itemprop="image" src="<?= op_get_poster_url() ?>"
                                                                                                        alt="<?php the_title(); ?> <?= op_get_original_title() ?>">
                            <span class="hidden" itemprop="aggregateRating" itemscope
                                  itemtype="https://schema.org/AggregateRating"> <span itemprop="ratingValue">5</span>
                            <meta itemprop="ratingcount" content="<?= op_get_rating_count() ?>">
                            <meta itemprop="bestRating" content="10" />
                            <meta itemprop="worstRating" content="1" />
                        </span>
                        </div>
                    </div>
                    <ul class="entry-meta block-film">
                        <li> <label>Đang phát: </label>
                            <span>
                            <font color="red"><?= op_get_episode() ?></font>
                        </span>
                        </li>
                        <li> <label>Tổng số tập: </label>
                            <span>
                            <font color="yellow"><?= op_get_total_episode() ?></font>
                        </span>
                        </li>
                        <li> <label>Năm Phát Hành: </label> <?= op_get_year() ?>
                        </li>
                        <li> <label>Quốc gia: </label>
                            <?= op_get_regions(', ') ?>
                        </li>
                        <li> <label>Thể loại: </label>
                            <?= op_get_genres(', ') ?>
                        </li>
                        <li> <label>Đạo diễn: </label>
                            <span itemprop="director" itemscope itemtype="http://schema.org/Person">
                            <?= op_get_directors(10,', ') ?>
                        </span>
                        </li>
                        <li>
                        <li> <label>Chất lượng: </label><span
                                    class="imdb"><?= op_get_quality() ?> - <?= op_get_lang() ?></span></li>
                        <li><label>Thời lượng: </label> <?= op_get_runtime() ?></li>
                        <li> <label>Diễn viên: </label>
                            <?= op_get_actors(10, ', ') ?>
                        </li>
                    </ul>
                    <div class="clear"></div>
                    <div class="film-content block-film" id="film-content-wrapper">
                        <h3 class="heading">Nội dung phim <?php the_title(); ?></h3>
                        <div id="film-content">
                            <div class="content-film" style="">
                                <p><?php the_content();?></p>
                            </div>
                        </div>
                    </div>
                    <?php if (op_get_trailer_url()) { ?>
                    <div class="block-film" style="display: none;" id="trailer">
                        <p class="heading">Trailer phim <?php the_title(); ?> - <?= op_get_original_title() ?></p>
                        <script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer.js"></script>
                        <script>
                            jwplayer.key = "v/ZlqxWwz7+Q/6HLTJptCVOXdTqOThKXmx1TTA==";
                        </script>
                        <div id="mediaplayer"></div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                var playerInstance = jwplayer("mediaplayer");

                                function load_biplayer() {
                                    playerInstance.setup({
                                        file: "<?= op_get_trailer_url() ?>",
                                        image: "<?= op_get_thumb_url() ?>",
                                        skin: {
                                            name: "seven",
                                            background: "transparent",
                                        },
                                        width: "100%",
                                        height: "100%",
                                        aspectratio: "16:9",
                                        autostart: false,
                                    });
                                }
                                load_biplayer();
                            });
                        </script>
                    </div>
                    <?php } ?>

                    <div class="block-film" id="tags">
                        <p class="heading">Tags</p>
                        <div class="tags-list">
                                <?php foreach (get_the_terms(get_the_ID(), "ophim_tags") as $term) { ?>
                            <li class="tag"> <h3><a href="<?php echo home_url('') . '/';
                                    echo get_option('ophim_slug_tags') ? get_option('ophim_slug_tags') : 'tags' ?>/<?php echo "{$term->slug}" ?>/"
                                       target="_blank"><?php echo "{$term->name}" ?></a> </h3>
                            </li>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
                </div>
                <div class="block film-related">
                    <div class="heading">
                        <p class="caption">Có thể bạn cũng muốn xem</p>
                    </div>
                    <ul class="list-film horizontal top-slide" id="list-film-realted">
                        <?php
                        $postType = 'ophim';
                        $taxonomyName = 'ophim_genres';
                        $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                        if ($taxonomy) {
                            $category_ids = array();
                            foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                            $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                            $my_query = new wp_query($args);
                            if ($my_query->have_posts()):
                                while ($my_query->have_posts()):$my_query->the_post(); ?>

                                    <li class="item ">
                                        <span class="label"></span> <span class="label-quality"><?= op_get_year() ?></span>
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                            <img alt="<?php the_title(); ?>" class="lazyload"
                                                 data-src="<?= op_get_poster_url() ?>" />
                                            <p><?php the_title(); ?></p> <i class="icon-play"></i>
                                        </a>
                                    </li>

                                <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        }
                        ?>


                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
</script>

<script>
    var rated = false;
    var URL_POST_RATING = '<?php echo admin_url('admin-ajax.php')?>';
    var GET_POST_ID = '<?php echo get_the_ID(); ?>';
    var TEMURL = '<?= get_template_directory_uri() ?>';
</script>

<script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.js"></script>
<script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/public.phim.js"></script>

<script type="text/javascript">
    function trailer() {
        $('#trailer').css("display", "block");
        $('#trailer').fadeIn('slow');
        $('html, body').animate({
            scrollTop: $("#trailer").offset().top
        }, 500);
    }
</script>
<script src="<?= get_template_directory_uri() ?>/assets/js/owl.carousel.min.js"></script>
<script>
    $(function() {
        $("#list-film-realted").owlCarousel({
            items: 5,
            itemsTablet: [700, 3],
            itemsMobile: [479, 2],
            scrollPerPage: true,
            navigation: true,
            slideSpeed: 800,
            paginationSpeed: 400,
            stopOnHover: true,
            pagination: false,
            autoPlay: 8000,
            lazyLoad: true,
            navigationText: ['<i class="fa fa fa-caret-left"></i>',
                '<i class="fa fa fa-caret-right"></i>'
            ],
        });
    })
</script>