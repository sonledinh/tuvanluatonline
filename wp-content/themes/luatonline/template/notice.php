<?php /* Template Name: Nhật ký  */ ?>
<?php 
get_header();
$listcate =  get_terms( array(
    'taxonomy' => 'tax_168',
    'hide_empty' => false,
) ); 
$query = $_SERVER['QUERY_STRING'];

if ($query) {
	$args=array(
        'orderby'   => 'publish_date',
        'order'     => 'DESC',
        'paged'     => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 10,
		'post_type' => 'cpt_167',
		'tax_query' => array(
			array(
				'taxonomy' => 'tax_168',
				'field'    => 'slug',
				'terms'    =>  $query,
			),
		),
    ); 
}else{
	$args=array(
        'orderby'   => 'publish_date',
        'order'     => 'DESC',
        'paged'     => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 10,
		'post_type' => 'cpt_167',
		'tax_query' => array(
			array(
				'taxonomy' => 'tax_168',
				'field'    => 'slug',
				'terms'    =>  $listcate[0]->slug,
			),
		),
    ); 
}
?>
<main>
	<section class="breadcrumbs" style="background: url('<?php echo get_field('img_banner')['url'] ?>') no-repeat center;">
		<div class="container">
			<div class="content-bread">
				<h2><?php echo get_field('title_page') ?></h2>
			</div>
		</div>
	</section>
	<section class="box-notice">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="bar-category">
						<div class="date-notice"> 
							<ul>
								<?php 
								
								foreach ($listcate as $key => $value) {
									
								?>
									<li><a href="?<?php echo $value->slug; ?>"><i class="fa fa-caret-right"></i><?php echo $value->name; ?></a></li>
								<?php 
								}
								?>
							</ul>
						</div> 
					</div> 
				</div>
				<div class="col-md-9 text-center">
					<div class="list-notice box-right-cate">

						<?php 
	                        // $args=array(
	                        //     'post_type' => 'cpt_167',
	                        //     'orderby'   => 'publish_date',
	                        //     'order'     => 'DESC',
	                        //     'posts_per_page' => 10,
	                        // );
	                        $my_query = new wp_query($args);
	                    ?>
						<?php if ( $my_query->have_posts() ): ?>
							<?php $index = 1; ?> 
	                        <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
								<div class="item-notice" data-toggle="modal" data-target="#myModal-<?php echo $index++ ?>">
									<div class="avar-big"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></div>
									<div class="info text-left">
										<div class="date text-left">Ngày: <?php echo get_the_date('d/m/Y') ?></div>
										<h3><a href="javascript:void(0)"><?php echo get_the_title(); ?></a></h3>
										<div class="desc-not">
											<div class="desc"><?php echo the_field('sort_notice') ?></div>
											<!-- <div class="link-view"><a href="javascript:void(0)">Chi tiết</a></div>  -->
										</div>
									</div>
								</div> 
								<div class="modal modal-notice fade" id="myModal-<?php echo $index-=1 ?>">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-body">
									        <div class="content-popup">
									        	<button type="button" class="close" data-dismiss="modal">&times;</button>
									        	<div class="detail-notice">
									        		<h1 class="text-left"><?php echo get_the_title() ?></h1>
									        		<div class="date-share">
									        			<div class="row">
									        				<div class="col-md-6">
									        					<div class="date text-left">Ngày: <?php echo get_the_date('d/m/Y') ?></div>
									        				</div>
									        				<div class="col-md-6">
									        					<div class="sc-notice text-right">
									        						<ul class="list-inline">
									        							<li class="list-inline-item"><a href=""><img src="<?php echo __BASE_URL__ ?>/images/n-1.png" class="img-fluid" alt=""></a></li>
									        							<li class="list-inline-item"><a href=""><img src="<?php echo __BASE_URL__ ?>/images/n-2.png" class="img-fluid" alt=""></a></li>
									        							<li class="list-inline-item"><a href=""><img src="<?php echo __BASE_URL__ ?>/images/n-3.png" class="img-fluid" alt=""></a></li>
									        						</ul>
									        					</div>
									        				</div>
									        			</div>
									        		</div>
									        		<div class="slide-notice">
									        			<?php 
										        			$thuvien = get_field('gallery_notice');
										        		?>
									        			<div class="slide-thumb">
															<div class="slider-for">
																<?php foreach( $thuvien as $image_id ): ?>
								                                    <div class="carousel-item">
								                                        <img class="" src="<?php echo esc_url($image_id['url']); ?>" class="img-fluid" width="100%" alt="<?php echo $image_id['url']; ?>">
								                                        <div class="cap"><?php echo $image_id['caption']; ?></div> 
								                                    </div>
						                                        <?php endforeach; ?>
							                                </div>
							                                <div class="slider-nav">

							                                	<?php foreach( $thuvien as $image_id ): ?>
						                                            <div class="clc">
								                                     	<div class="item"><img class="" src="<?php echo esc_url($image_id['url']); ?>" width="100%" alt="<?php echo esc_url($image_id['url']); ?>"></div>
								                                     </div>
						                                        <?php endforeach; ?>
							                                </div>
														</div>
									        		</div>
									        	</div>
									        </div>
									      </div>
									    </div>
									  </div>
									</div>
	                        <?php endwhile ?>
	                    <?php endif;wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer() ?>   