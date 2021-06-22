<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luatonline
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_field('favico','option')['url'] ?>">
	<?php wp_head(); ?>
    <script type="text/javascript">
        var base_url = '<?php echo __BASE_URL__ ?>';
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0GQGT91452"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-0GQGT91452');
    </script>
</head> 
 
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
  <?php echo get_field('code_mess','option'); ?>
</script>

<header> 
    <div class="header-menu">
        <div class="container">
            <div class="h-menu">
                <div class="logo"><a title="" href="/"><img alt="" src="<?php echo get_field('logo','option')['url'] ?>" class="img-fluid avarta-logo" alt=""></a></div> 
                <div class="icon-home"><a href="/"><i class="fa fa-home"></i></a></div>
                <div class="right-menu">
                    <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>  
    <div class="menu-mobile" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-5">
                    <div class="logo"> 
                        <a title="" href="/"><img alt="" src="<?php echo get_field('logo','option')['url'] ?>" class="img-fluid avarta-logo" alt=""></a> 
                    </div>
                </div>
                <div class="col-md-6 col-7">
                    <div class="menu-mb-right">
                        <div class="icon-home"><a href="/"><i class="fa fa-home"></i></a></div>
                        <div class="btn-menu text-right"><a title="" href="#menu"><i class="fa fa-bars"></i><span>Danh mục</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu">
            <?php
                wp_nav_menu( 
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
            ?>
        </nav>
    </div>  
</header>
