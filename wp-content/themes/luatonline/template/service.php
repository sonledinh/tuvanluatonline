<?php /* Template Name: catalog */ ?>
<?php 
$pa = 4;
$title = 'Dịch vụ luật sư';
if ($post->post_name == 'tu-van-hoi-dap') {
	$pa = 3;
	$title = 'Tư vấn hỏi đáp';
}
global $wp;
$link_cur = home_url( $wp->request );
$query = $_SERVER['QUERY_STRING'];

$parent = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'parent' => $pa,
) );
print_r('inin');
if ($query) {
	// echo $query; 
	$args=array(
    	'category__in' => $query,
        'post_type' => 'post',
        'orderby'   => 'publish_date',
        'order'     => 'DESC',
        'paged'     => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 1,
    ); 
}else{
	$args=array(
    	'category__in' => $parent[0]->term_id,
        'post_type' => 'post',
        'orderby'   => 'publish_date',
        'order'     => 'DESC',
        'paged'     => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 1,
		
    ); 
}
get_header() 
?>
<main>
	<section class="breadcrumbs" style="background: url('images/bread.png') no-repeat center;">
		<div class="container">
			<div class="content-bread">
				<h2><?php echo $title; ?></h2>
			</div>
		</div>
	</section>
	<section class="box-category p-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="bar-category">
						<div class="date-notice">
							<ul>
								<?php 
								foreach ($parent as $key => $value) {
								?>
									<li><a href="?<?php echo $value->term_id; ?>"><i class="fa fa-caret-right"></i><?php echo $value->name; ?></a></li>
								<?php 
								}
								?>
								
								
							</ul>
						</div>
					</div>
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
														 <!-- <div class="cate-top">
														 	<ul>
														 		<li><a href="javascript:void(0)"><?php echo get_the_category()[0]->name ; ?></a></li>
														 		<li><div class="date"><?php echo get_the_date('d/m/Y') ?></div></li>
														 	</ul>
														 </div> -->
														 <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
														 <div class="desc">
														 	<!-- <?php echo get_the_excerpt(); ?>  -->
														 	<?php echo get_field('sort_detail') ?>
														 </div>
														<!--  <div class="info-bott">
														 	<ul>
														 		<li>
														 			<div class="username">
														 				<div class="i-user"><img src="<?php echo  get_avatar_url( get_the_author_meta( 'ID' ), array("size"=>36)); ?>" class="img-fluid"></div>
														 				<div class="name"><h6><?php the_author(); ?></h6></div>
														 			</div>
														 		</li>
														 		<li><a href="<?php echo get_the_permalink() ?>">Xem thêm <span>🡢</span></a></li>
														 	</ul>
														 </div> -->
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
													'format' => '?paged=%#%',
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
										<input type="text" placeholder="Tìm kiếm ...">
										<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
									</div>
									<div class="box-bar">
										<div class="title-bar text-center">Tin tức ThinkSmart</div>
										<div class="new-bar">
											<?php 
						                        $args=array(
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
														<div class="cate-bott">
															<ul>
																<li><a href="javascript:void(0)"><?php echo get_the_category()[0]->name ; ?></a></li>
																<li><?php echo get_the_date( $d = 'd/m/Y' ) ?></li>
															</ul>
														</div>
													</div>
								                <?php endwhile ?>
								            <?php endif;wp_reset_query(); ?>
										</div>
									</div>
									<div class="box-bar">
										<div class="title-bar text-center">Tư vấn hỏi đáp</div>
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
														<div class="cate-bott">
															<ul>
																<li><a href="javascript:void(0)"><?php echo get_the_category()[0]->name ; ?></a></li>
																<li><?php echo get_the_date( $d = 'd/m/Y' ) ?></li>
															</ul>
														</div>
													</div>
								                <?php endwhile ?>
								            <?php endif;wp_reset_query(); ?>
										</div>
									</div>
									<div class="box-bar">
										<div class="title-bar text-center">Dịch vụ luật sư</div>
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
														<div class="cate-bott">
															<ul>
																<li><a href="javascript:void(0)"><?php echo get_the_category()[0]->name ; ?></a></li>
																<li><?php echo get_the_date( $d = 'd/m/Y' ) ?></li>
															</ul>
														</div>
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