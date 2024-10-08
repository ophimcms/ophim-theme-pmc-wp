<?php

/*
* Tạo sidebar cho theme
*/

$arena = array('name' => __('Ophim Màn hình chính', 'ophim'), 'id' => 'widget-area',
    'description' => 'Hiển thị ở phim ở trang chủ',
    'class' => 'widget-area',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',);
register_sidebar($arena);
$footer = array('name' => __('Ophim Footer', 'ophim'), 'id' => 'widget-footer',
    'description' => 'Hiển thị ở phim ở cuối trang',
    'class' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',);
register_sidebar($footer);

$slider_poster = array('name' => __('Ophim Slider poster', 'ophim'), 'id' => 'widget-slider-poster',
    'description' => 'Hiển thị ở slide trang chủ',
    'class' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',);
register_sidebar($slider_poster);