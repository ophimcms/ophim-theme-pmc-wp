<style>
    #result{
        text-align: left;
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 400px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
    }
    .column {
        float: left;
        padding: 5px;
    }

    .left {
        text-align: center;
        width: 20%;
    }

    .right {
        width: 80%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }
    .rowsearch:hover {
        background-color: #2f2c2c;
    }
    #result p{
       color: #FFF;
    }
</style>
<div id="header">
    <div class="container">
        <div id="logo" style="margin:0;">
            <a href="<?= get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
                <?php op_the_logo('height:30%;width:30%') ?>
            </a>
        </div>
        <ul id="main-menu">
            <?php
            $menu_items = wp_get_menu_array('primary-menu');
            foreach ($menu_items as $key => $item) : ?>
                <?php if (empty($item['children'])) { ?>
                    <li><a title="<?= $item['title'] ?>" href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                <?php } else { ?>

                    <li><a title="<?= $item['title'] ?>" href="<?= $item['url'] ?>" rel="nofollow"><?= $item['title'] ?>
                            <i class="fa fa-angle-down"></i></a>
                        <?php if (!empty($item['children'])): ?>
                            <ul class="sub-menu span-6">
                                <?php foreach ($item['children'] as $k => $child): ?>
                                    <li><a class="sub-menu-link" href="<?= $child['url'] ?>"><?= $child['title'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php } ?>
            <?php endforeach; ?>

        </ul>
        <form method="GET" id="form-search" class="form-search" action="/" autocomplete="off">
            <input placeholder="Tìm tên phim..." onkeyup="fetch()" value="<?php echo "$s"; ?>" id="search" type="text" name="s"/>
            <i id="searchsubmit" class="fa fa-search" value="" type="submit"></i>
            <div class="" id="result"></div>
        </form>


    </div>
</div>
<div id="mobile-header">
    <div class="btn-humber"></div>
    <a class="logo" href="<?= get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
        <?php op_the_logo('height:30%;width:30%') ?>
    </a>
    <i class="fa fa-search btn-search" onclick="$('.mobile-search-bar').removeClass('hide');$('#keyword').focus();"></i>
    <div class="mobile-search-bar hide">
        <form id="mobile-form_search" action="">
            <input id="keyword" value="<?php echo "$s"; ?>" type="text" name="s" onkeyup="fetch()" placeholder="Tìm kiếm...">
        </form>
        <i class="fa fa-times close-button" onclick="$('.mobile-search-bar').addClass('hide')"></i>
    </div>
</div>
<div id="bswrapper_inhead"></div>
<div id="menu-mobile" class="">
    <ul>
        <?php
        $menu_items = wp_get_menu_array('primary-menu');
        foreach ($menu_items as $key => $item) : ?>
            <?php if (empty($item['children'])) { ?>
                <li><a title="<?= $item['title'] ?>" href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
            <?php } else { ?>
                <li class="parent-menu"><a title="<?= $item['title'] ?>" href="<?= $item['url'] ?>"
                                           rel="nofollow"><?= $item['title'] ?> <i class="fa fa-angle-down"></i></a>
                    <ul class="sub-menu span-6" style="display: none;">
                        <?php foreach ($item['children'] as $k => $child): ?>
                            <li><a class="sub-menu-link" href="<?= $child['url'] ?>"><?= $child['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php } ?>
        <?php endforeach; ?>


    </ul>
</div>
<div id="chilladv" class="container">
    <div id="headerpcads"></div>
    <div id="headermbads"></div>
</div>
<div class="container">
    <div id="topnc"></div>
</div>
