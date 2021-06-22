<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luatonline
 */

?>

<footer>
    <div class="content-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="itme-ft">
                        <div class="logo"><a href="/"><img src="<?php echo get_field('logo_footer','option')['url']; ?>" class="img-fluid " alt=""></a></div>
                        
                        <div class="info-ft"> 
                            <ul>
                                <?php while ( has_sub_field('thong_tin_footer','option' ) ) : ?>
                                    <li><?php echo get_sub_field('txt-footer','option') ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-item-footer">
                        <?php while ( has_sub_field('box_footer','option' ) ) : ?>
                            <div class="item-ft"> 
                                <div class="title-ft"><?php echo get_sub_field('title_col2','option') ?></div>
                                <div class="link-ft">
                                    <ul>
                                        <?php while ( has_sub_field('cate_footer','option' ) ) : ?>
                                            <li><a href="<?php echo get_sub_field('link_cate_col2','option') ?>"><?php echo get_sub_field('sub_cate_col2','option') ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-item-footer">
                        <?php while ( has_sub_field('box_footer_copy','option' ) ) : ?>
                            <div class="item-ft"> 
                                <div class="title-ft"><?php echo get_sub_field('title_col_3','option') ?></div>
                                <div class="link-ft">
                                    <ul>
                                        <?php while ( has_sub_field('cate_footer_3','option' ) ) : ?>
                                            <li><a href="<?php echo get_sub_field('link_cate_col3','option') ?>"><?php echo get_sub_field('sub_cate_col3','option') ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="callnow" class="hotline">
        <div class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring" id="call-now-1">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div> 
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel:<?php echo get_field('holine_ft','option'); ?>" class="pps-btn-img"> <img src="<?php echo __BASE_URL__; ?>/images/quick.png" alt="Gọi điện thoại" width="50" data-lazy-src="" data-pin-no-hover="true" class="lazyloaded" data-was-processed="true">
                    </a>
                </div>
            </div>
            <div class="hotline-bar">
                <a href="tel:<?php echo get_field('holine_ft','option'); ?>"> <span class="text-hotline" id="call-now-1"><?php echo get_field('holine_ft','option'); ?></span> </a>
            </div>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>

</body>
</html>