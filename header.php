<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500&amp;display=swap' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/bootstrap/css/bootstrap.min.css" as="style" rel="preload" />
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/can-toggle.css?v=1.0" as="style" rel="preload">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/font-awesome.min.css" rel="preload" as="font" />
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/mainpmchill.css" as="style" rel="preload" />
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/responsive.css" as="style" rel="preload" />
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/page_index.css" as="style" rel="preload" />

    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/jquery-1.11.1.min.js"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/lazyz.min.js"></script>

    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <link href='https://fonts.gstatic.com/' crossorigin rel='preconnect' />
</head>


<body>
<?php include_once THEME_URL.'/templates/header.php' ?>