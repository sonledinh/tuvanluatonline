<?php
$cutstr = trim($_SERVER['REQUEST_URI'],'/');
$exstr =  explode('/',$cutstr);
$pp = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
	'slug' => $exstr[1],
) );

$parent = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'parent' => $pp[0]->term_id,
) );
$query = $_SERVER['QUERY_STRING'];
if ($query) {
    $key = substr($query, 4);
	$args=array(
    	'category__in' => get_queried_object_id(),
        'post_type' => 'post',
        'orderby'   => 'publish_date',
        'order'     => 'DESC',
        'paged'     => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 100,
        's' => $key,
    ); 
}else{
	$args=array(
    	'category__in' => get_queried_object_id(),
        'post_type' => 'post',
        'orderby'   => 'publish_date',
        'order'     => 'DESC',
        'paged'     => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 15,
    ); 
}
get_header(); 
?>
<main>
	<section class="breadcrumbs" style="background: url('<?php echo get_field('banner_breadcrumbs','option')['url'] ?>') no-repeat center;">
		<div class="container">
			<div class="content-bread">
				<h2><?php single_cat_title(); ?></h2>
			</div>
		</div>
	</section>
	<section class="box-category p-0">
		<div class="container-fluid">
			<div class="row">
               
				<div class="col-md-3">
                    <?php
                    if($parent){
                        ?>
					<div class="bar-category">
						<div class="date-notice">
							<ul>
								<?php 
								foreach ($parent as $key => $value) {
								?>
									<li><a class="<?php  if ($value->slug == $exstr[1]) {echo "active"; } ?>" href="<?php echo get_category_link($value->term_id) ;  ?>"><i class="fa fa-caret-right"></i><?php echo $value->name; ?></a></li>
								<?php 
								}
								?>

							</ul>
						</div>
					</div>
                    <?php
                        }
                    ?>
				</div>
				<div class="col-md-9">
					<div class="box-right-cate">
						<div class="row">
							<div class="col-md-9">
									<div class="list-news"> 
										<?php 
					                        $my_query = new wp_query($args);
					                        $max_num_pages = $my_query->max_num_pages;
					                    ?>
					                    <?php $i = 0; ?>
					                    <?php if ( $my_query->have_posts() ): ?>
					                        <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
					                            <?php $i++ ?>

					                            <div class="item-news">
													<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
													<div class="info">
														 <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
														 <div class="desc">
														 	<?php echo get_field('sort_detail') ?>
														 </div>
													</div>
												</div>
				 
					                        <?php endwhile ?>
					                    <?php endif;wp_reset_query(); ?>
									</div>
									<div class="pagination w-100">
										<?php 
											$total_pages = $my_query->max_num_pages;
											if ($total_pages > 1){
												$current_page = max(1, get_query_var('paged'));
												echo paginate_links(array(
													'base' => get_pagenum_link(1) . '%_%',
													'current' => $current_page,
													'total' => $total_pages,
													'prev_text' => '&laquo;',
													'next_text' => 'Next',
													'type' => 'list'
												));
											}
										?>
									</div>
							</div>
							<div class="col-md-3">
								<div class="side-bar">
                                    <div class="box-search">
                                        <form action="<?php echo get_category_link(get_queried_object_id()) ;  ?>" method="get">  
                                            <input type="text" name="key" placeholder="Tìm kiếm ...">
                                            <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
									<div class="box-bar">
										<div class="title-bar text-center"><a href="/tin-tuc-noi-bat/">Tin tức nổi bật</a></div>
										<div class="new-bar">
											<?php 
						                        $args=array(
						                        	'category_name' => 'Tin tức nổi bật', 
						                            'post_type' => 'post',
						                            'orderby'   => 'publish_date',
						                            'order'     => 'DESC',
						                            'posts_per_page' => 4,
						                        );
						                        $my_query = new wp_query($args);
						                    ?>
						                    <?php $i = 0; ?>

						                    <?php if ( $my_query->have_posts() ): ?>
						                        <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
													<div class="item-bar">
														<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
														<div class="info">
															<h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h4>
														</div>
														<div class="sort-new-bar"><?php echo get_field('sort_detail') ?></div>
														<!-- <div class="cate-bott">
															<ul>
																<li><a href="javascript:void(0)"><?php echo get_the_category()[0]->name ; ?></a></li>
																<li><?php echo get_the_date( $d = 'd/m/Y' ) ?></li>
															</ul>
														</div> -->
													</div>
								                <?php endwhile ?>
								            <?php endif;wp_reset_query(); ?>
										</div>
									</div>
									<div class="box-bar">
										<div class="title-bar text-center"><a href="/tu-van-hoi-dap/">Tư vấn - Hỏi đáp</a></div>
										<div class="new-bar">
											<?php 
						                        $args=array(
						                        	'category_name' => 'Tư vấn hỏi đáp', 
						                            'post_type' => 'post',
						                            'orderby'   => 'publish_date',
						                            'order'     => 'DESC',
						                            'posts_per_page' => 4,
						                        );
						                        $my_query = new wp_query($args);
						                    ?>
						                    <?php $i = 0; ?>

						                    <?php if ( $my_query->have_posts() ): ?>
						                        <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
													<div class="item-bar">
														<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
														<div class="info">
															<h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h4>
														</div>
														<div class="sort-new-bar"><?php echo get_field('sort_detail') ?></div>
													</div>
								                <?php endwhile ?>
								            <?php endif;wp_reset_query(); ?>
										</div>
									</div>
									<div class="box-bar">
										<div class="title-bar text-center"><a href="/dich-vu-luat-su/">Dịch vụ - Luật sư</a></div>
										<div class="new-bar">
											<?php 
						                        $args=array(
						                        	'category_name' => 'Dịch vụ luật sư', 
						                            'post_type' => 'post',
						                            'orderby'   => 'publish_date',
						                            'order'     => 'DESC',
						                            'posts_per_page' => 4,
						                        );
						                        $my_query = new wp_query($args);
						                    ?>
						                    <?php $i = 0; ?>

						                    <?php if ( $my_query->have_posts() ): ?>
						                        <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
													<div class="item-bar">
														<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
														<div class="info">
															<h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h4>
														</div>
														<div class="sort-new-bar"><?php echo get_field('sort_detail') ?></div>
													</div>
								                <?php endwhile ?>
								            <?php endif;wp_reset_query(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9"> 
					

					
				</div>
				
			</div>
		</div>
	</section>
</main>
<?php get_footer() ?> 