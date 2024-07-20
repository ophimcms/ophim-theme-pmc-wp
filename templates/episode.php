<div id="main-content">
    <?php if(get_option('ophim_is_ads') == 'on') { ?>
        <div id=top_addd></div>
    <?php } ?>

    <div id="content">

        <div class="container" id="page-player">
            <div class="breadcrumb" style="float: none;" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  itemprop="url" href="/" title="Xem phim"><span itemprop="name"><i class="fa fa-home"></i>
                            Xem
                            phim <i class="fa fa-angle-right"></i></span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <?php foreach (get_the_terms(get_the_ID(), "ophim_categories") as $term) { ?>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo home_url('') . '/';
                        echo get_option('ophim_slug_categories') ? get_option('ophim_slug_categories') : 'categories' ?>/<?php echo "{$term->slug}" ?>/" title="<?php echo "{$term->name}" ?>">
                        <span itemprop="name">
                            <?= $term->name ?> <i class="fa fa-angle-right"></i>
                        </span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                <?php } ?>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a
                            href="<?php the_permalink(); ?>" itemprop="item"><span
                                itemprop="name"><?php the_title(); ?> <i class="fa fa-angle-right"></i></span></a>
                    <meta itemprop="position" content="3" />
                </li>
                <li>Tập <?php the_title(); ?></li>
            </div>
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
            <div class="box-player" id="box-player">
                <div id="player">
                    <div id="player-area">
                    </div>
                </div>
                <div class="film-note" style="margin-bottom:20px;border: 1px solid #B8B612;padding: 5px;">Phim Xem
                    tốt nhất trên trình duyệt Safari,FireFox hoặc Chrome. Đừng tiếc 1 comment bên dưới để đánh giá
                    phim hoặc báo lỗi. Đổi server nếu lỗi,lag</div>
                <div class="options">
                    <ul class="tool">
                        <li class="power-lamp">
                            <span class="text-lamp">Tắt đèn</span>
                            <em class="radial-center">
                                <i class="fa fa-power-off"></i>
                            </em>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="pm-server">
                <center>
                    <ul class="server-list">
                        <li class="backup-server"> <span class="server-title">Đổi Sever</span>
                            <ul class="list-episode">
                                <li class="episode">
                                    <a data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>"
                                       data-type="m3u8" onclick="chooseStreamingServer(this)"
                                       class="streaming-server btn-link-backup btn-episode black episode-link">VIP
                                        #1</a>
                                    <a data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>"
                                       data-type="embed" onclick="chooseStreamingServer(this)"
                                       class="streaming-server btn-link-backup btn-episode black episode-link">VIP
                                        #1</a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="list-server" id="list-server">
                <?php foreach (episodeList() as $key => $server) { ?>
                <div class="server-group clearfix">
                    <span><i class="fa fa-database"></i> Danh sách tập <?= $server['server_name'] ?></span>
                    <ul class="episodes">
                        <?php foreach ($server['server_data'] as $list) {
                            $current = '';
                            if (slugify($list['name']) == episodeName()&& episodeSV() == $key) {
                                $current = 'active';
                            }
                            echo '<li>
                                            <a class="' . $current . '" href="' . hrefEpisode($list["name"],$key) . '"
                                              >
                                                ' . $list['name'] . '
                                            </a>
                                        </li>';
                        } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div style="clear:both;"></div>
            <div class="box-rating">
                <input id="hint_current" type="hidden" value="">
                <input id="score_current" type="hidden" value="<?= op_get_rating(); ?>">
                <p>Đánh giá phim <span class="text">(<?= op_get_rating(); ?>đ / <?= op_get_rating_count() ?> lượt)</span></p>
                <div id="star" data-score="<?= op_get_rating(); ?>"
                     style="cursor: pointer; float: left; width: 200px;">
                </div>
                <span id="hint"></span>
                <img class="hidden" itemprop="thumbnailUrl" src="<?php the_permalink(); ?>"
                     alt="<?php the_title(); ?> <?= op_get_original_title() ?>"> <img class="hidden" itemprop="image"
                                                                                            src="<?php the_permalink(); ?>"
                                                                                            alt="<?php the_title(); ?> <?= op_get_original_title() ?>">
                <span class="hidden" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating"> <span
                            itemprop="ratingValue">5</span>
                <meta itemprop="ratingcount" content="<?= op_get_rating_count() ?>">
                <meta itemprop="bestRating" content="10" />
                <meta itemprop="worstRating" content="1" />
            </span>
            </div>
            <div class="social">
                <div class="fb-like" style="margin:auto;width: 100%;" data-href="<?php the_permalink(); ?>"
                     data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"
                     data-colorscheme="light"></div>
                <div class="fb-save" data-uri="<?php the_permalink(); ?>"></div>
            </div>
            <div class="clear"></div>
            <div class="film-info">
                <h1 itemprop="name"><a title="Xem phim <?php the_title(); ?>" href=""><?php the_title(); ?></a> -
                    Tập <?= episodeName() ?></h1>
                <h2 style="margin: 0px;font-size: 15px;"> <a title="<?= op_get_original_title() ?>" href="<?php the_permalink(); ?>"> <?= op_get_original_title() ?> </a></h2>
                <img class="hidden" itemprop="thumbnailUrl"
                     src="<?php the_permalink(); ?>"
                     alt="<?php the_title(); ?>-<?= op_get_original_title() ?>"> <img class="hidden" itemprop="image"
                                                                                            src="<?php the_permalink(); ?>"
                                                                                            alt="<?php the_title(); ?>-<?= op_get_original_title() ?>">
                <p
                        style="padding: 4px 4px;margin: 5px 0 20px 0;line-height: 26px;font-size: 12px;color: #BBB;background: #322b2b;">
                <div class="content-film" style="">
                    <p><?=the_content();?></p>
                </div>
                    [<a href="<?php the_permalink(); ?>"
                        title="<?php the_title(); ?> - <?= op_get_original_title() ?>">Xem thêm</a>]</p>


                <div class="comment" itemprop="comment">
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
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>

<script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer-8.9.3.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/hls.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer.hlsjs.min.js"></script>

<script>
    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: $('#player-area').offset().top
        }, 'slow');
    });
</script>

<script>
    var episode_id = '<?= episodeName() ?>';
    const wrapper = document.getElementById('player-area');
    const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

    function chooseStreamingServer(el) {
        const type = el.dataset.type;
        const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
        const id = el.dataset.id;

        const newUrl =
            location.protocol +
            "//" +
            location.host +
            location.pathname.replace(`-${episode_id}`, `-${id}`);

        history.pushState({
            path: newUrl
        }, "", newUrl);
        episode_id = id;


        Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
            server.classList.remove('active');
        })
        el.classList.add('active');

        link.replace('http://', 'https://');
        renderPlayer(type, link, id);
    }

    function renderPlayer(type, link, id) {
        if (type == 'embed') {
            if (vastAds) {
                wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                const fake_player = jwplayer("fake_jwplayer");
                const objSetupFake = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                    volume: 100,
                    mute: false,
                    autostart: true,
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };
                fake_player.setup(objSetupFake);
                fake_player.on('complete', function(event) {
                    $("#fake_jwplayer").remove();
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    fake_player.remove();
                });

                fake_player.on('adSkipped', function(event) {
                    $("#fake_jwplayer").remove();
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    fake_player.remove();
                });

                fake_player.on('adComplete', function(event) {
                    $("#fake_jwplayer").remove();
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    fake_player.remove();
                });
            } else {
                if (wrapper) {
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                }
            }
            return;
        }

        if (type == 'm3u8' || type == 'mp4') {
            wrapper.innerHTML = `<div id="jwplayer"></div>`;
            const player = jwplayer("jwplayer");
            const objSetup = {
                key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                aspectratio: "16:9",
                width: "100%",
                image: "<?= op_get_poster_url() ?>",
                file: link,
                playbackRateControls: true,
                playbackRates: [0.25, 0.75, 1, 1.25],
                sharing: {
                    sites: [
                        "reddit",
                        "facebook",
                        "twitter",
                        "googleplus",
                        "email",
                        "linkedin",
                    ],
                },
                volume: 100,
                mute: false,
                autostart: true,
                logo: {
                    file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                    link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                    position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                },
                advertising: {
                    tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                    client: "vast",
                    vpaidmode: "insecure",
                    skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                    skipmessage: "Bỏ qua sau xx giây",
                    skiptext: "Bỏ qua"
                }
            };

            if (type == 'm3u8') {
                const segments_in_queue = 50;

                var engine_config = {
                    debug: !1,
                    segments: {
                        forwardSegmentCount: 50,
                    },
                    loader: {
                        cachedSegmentExpiration: 864e5,
                        cachedSegmentsCount: 1e3,
                        requiredSegmentsPriority: segments_in_queue,
                        httpDownloadMaxPriority: 9,
                        httpDownloadProbability: 0.06,
                        httpDownloadProbabilityInterval: 1e3,
                        httpDownloadProbabilitySkipIfNoPeers: !0,
                        p2pDownloadMaxPriority: 50,
                        httpFailedSegmentTimeout: 500,
                        simultaneousP2PDownloads: 20,
                        simultaneousHttpDownloads: 2,
                        // httpDownloadInitialTimeout: 12e4,
                        // httpDownloadInitialTimeoutPerSegment: 17e3,
                        httpDownloadInitialTimeout: 0,
                        httpDownloadInitialTimeoutPerSegment: 17e3,
                        httpUseRanges: !0,
                        maxBufferLength: 300,
                        // useP2P: false,
                    },
                };
                if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                    var engine = new p2pml.hlsjs.Engine(engine_config);
                    player.setup(objSetup);
                    jwplayer_hls_provider.attach();
                    p2pml.hlsjs.initJwPlayer(player, {
                        liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                        maxBufferLength: 300,
                        loader: engine.createLoaderClass(),
                    });
                } else {
                    player.setup(objSetup);
                }
            } else {
                player.setup(objSetup);
            }


            const resumeData = 'OPCMS-PlayerPosition-' + id;
            player.on('ready', function() {
                if (typeof(Storage) !== 'undefined') {
                    if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                        console.log("No cookie for position found");
                        var currentPosition = 0;
                    } else {
                        if (localStorage[resumeData] == "null") {
                            localStorage[resumeData] = 0;
                        } else {
                            var currentPosition = localStorage[resumeData];
                        }
                        console.log("Position cookie found: " + localStorage[resumeData]);
                    }
                    player.once('play', function() {
                        console.log('Checking position cookie!');
                        console.log(Math.abs(player.getDuration() - currentPosition));
                        if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                            5) {
                            player.seek(currentPosition);
                        }
                    });
                    window.onunload = function() {
                        localStorage[resumeData] = player.getPosition();
                    }
                } else {
                    console.log('Your browser is too old!');
                }
            });

            player.on('complete', function() {
                <?php if(nextEpisodeUrl()){ ?>
                window.location.href = "<?= nextEpisodeUrl() ?>";
                <?php }?>
                if (typeof(Storage) !== 'undefined') {
                    localStorage.removeItem(resumeData);
                } else {
                    console.log('Your browser is too old!');
                }
            })

            function formatSeconds(seconds) {
                var date = new Date(1970, 0, 1);
                date.setSeconds(seconds);
                return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
            }
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const episode = '<?= episodeName() ?>';
        let playing = document.querySelector(`[data-id="${episode}"]`);
        if (playing) {
            playing.click();
            return;
        }

        const servers = document.getElementsByClassName('streaming-server');
        if (servers[0]) {
            servers[0].click();
        }
    });
</script>

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

<script src="<?= get_template_directory_uri() ?>/assets/js/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $(".power-lamp").click(function() {
            var $overlay = '<div id="background_lamp"></div>';
            if ($(this).hasClass('off')) {
                $(this).removeClass('off');
                $(".text-lamp").text('Tắt đèn');
                $("#background_lamp").remove();
            } else {
                $(this).addClass('off');
                $(".text-lamp").text('Bật đèn');
                $('body').append($overlay);
            }
        });
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