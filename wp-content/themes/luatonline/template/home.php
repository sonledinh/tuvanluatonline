<?php /* Template Name: Home */ ?>
<?php 
get_header();
$parent = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'parent' => 4,
) ); 
?>
<main style="background: #fff">
	<section class="banner">  
		<div class="slide-banner">
			<?php while ( has_sub_field('banner' ) ) : ?>
				<div class="item-slide">
					<a href="<?php the_sub_field( 'link_banner' ); ?>" class="link-bn-abs"></a>
					<div class="avarta"><img src="<?php echo get_sub_field( 'banner_img' )['url']; ?>" class="img-fluid w-100" alt=""></div>
					<div class="caption"> 
						<div class="container">  
							<div class="row justify-content-center text-center">
								<div class="col-md-8">
									<div class="info-caption">
										<h3><?php the_sub_field( 'title_top' ); ?></h3>
										<h2><?php the_sub_field( 'title_bott' ); ?></h2>
										<div class="desc">
											<?php the_sub_field( 'sort_desc' ); ?>
										</div>
										<div class="btn-hotline">
											<a href="<?php the_sub_field( 'link_button' ); ?>"><?php the_sub_field( 'hotline' ); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>  
					</div> 
				</div> 
			<?php endwhile; ?>
		</div>
	</section>
	<section class="box-about">
		<div class="container">
			<div class="title-about">
				<h2><span><?php the_field('titlte-about'); ?></span></h2> 
			</div>
			<div class="description-ab">
				<div class="row">
					<div class="col-md-5">
						<div class="txt-about">
							<div class="desc">
								<?php the_field('desc_about'); ?>
							</div>
							<div class="btn-page"><a href="<?php the_field('link_about'); ?>">Xem thêm</a></div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="videoabout">
							<div class="avarta"><img src="<?php echo get_field('img_about')['url'];?>" class="img-fluid w-100" alt=""></div>
							<div class="icon-play"><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-video"><img src="<?php echo __BASE_URL__; ?>/images/play-video.png" class="img-fluid" alt=""></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade modal-popup" id="modal-video">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<div class="content-popup">
		      		<?php the_field('iframe_video'); ?>
		      	</div>
		      </div>
		    </div>
		  </div>
		</div>
	</section>
	<section class="box-tab-news">
		<div class="container">
			<ul class="tabs">
				<li class="tab-link active" data-tab="tab-1"><a href="javascript:void(0)">Tin tức nổi bật</a></li>
				<li class="tab-link" data-tab="tab-2"><a href="javascript:void(0)">Tin tức mới nhất</a></li>
			</ul> 
			<div class="box-content-tab">
				<div class="tab-content active" id="tab-1">
					<div class="list-news-home">
						<div class="row-slide">
							<?php 
		                        $args_nb=array(
		                        	'category_name' => 'Tin tức nổi bật', 
		                            'post_type' => 'post',
		                            'orderby'   => 'publish_date',
		                            'order'     => 'DESC',
		                            'posts_per_page' => 10,
		                        );  
		                        $my_query_nb = new wp_query($args_nb);
		                    ?>
		                    <?php $i = 0; ?>
		                    <?php if ( $my_query_nb->have_posts() ): ?>
		                        <?php while ($my_query_nb->have_posts()):$my_query_nb->the_post(); ?>
		                            <?php $i++ ?>
									<div class="col-md-3 col-sm-6">
										<div class="item-new-home">
											<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
											<div class="info">
												<h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
												<div class="sort-desc">
													<?php echo get_field('sort_detail'); ?>
												</div>
											</div>
										</div>
									</div>
		                        <?php endwhile ?>
		                    <?php endif;wp_reset_query(); ?>
						</div>
					</div>
				</div>
				<div class="tab-content" id="tab-2">
					<div class="list-news-home"> 
						<div class="row-slide">
							<?php 
		                        $args=array(
		                            'post_type' => 'post',
		                            'orderby'   => 'publish_date',
		                            'order'     => 'DESC',
		                            'posts_per_page' => 10,
		                        );
		                        $my_query = new wp_query($args);
		                    ?>
		                    <?php $i = 0; ?>

		                    <?php if ( $my_query->have_posts() ): ?>
		                        <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
				                    <div class="col-md-3 col-sm-6">
										<div class="item-new-home">
											<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
											<div class="info">
												<h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
												<div class="sort-desc">
													<?php echo get_field('sort_detail'); ?>
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
		</div>
	</section>
	<section class="box-service" style="background: url('<?php echo __BASE_URL__ ?>/images/bn-service.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="left">
						<div class="title-srv"><?php echo get_field('title_srv'); ?></div>
						<div class="side-srv">
							<ul>
								<?php 
								foreach ($parent as $key => $value) {
									$locmb = array();
									$locmb1 = array();
								?>
									<li>
										<a href="javascript:void(0)" class="<?php echo ( $key == 0 ) ? 'active' : ''; ?>" data-tab="tab-srv-<?php echo $key;?>"><?php echo $value->name; ?></a>
										<div class="box-srv-mobile <?php echo ( $key == 0 ) ? 'active' : ''; ?>">
											<div class="slide-srv-mb slide-mb-tv">
												<?php
												$cut = substr($value->slug, 0, -16);
												$cate_slug = $value->slug.'-tu-van-hoi-dap,'.$cut;
												$locmb=array(
													'category_name' => $cate_slug ,
													'post_type' => 'post',
													'orderby'   => 'publish_date',
													'order'     => 'DESC',
													'posts_per_page' => 12,
													'category__not_in' => array( $value->term_id ), 
												); 	
												$dbmb = new WP_Query( $locmb );
												$dbmb = $dbmb->get_posts();
												if($dbmb){
													foreach( array_chunk($dbmb, 6, true) as $data ) {
												?>
												<div class="item-slide">
													<?php
														foreach( $data as $p ) {
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'single-post-thumbnail' ); 
													?>
														<div class="item-hot">
															<div class="avarta"><a href="<?php echo get_permalink( $p->ID );?>"><img src="<?php echo $image[0]; ?>" class="img-fluid w-100" alt=""></a></div>
															<div class="info">
																<h4><a href="<?php echo get_permalink( $p->ID );?>"><?php  echo wpautop(wp_trim_words( $p->post_title,12, $more = null ));  ?></a></h4>
																<p>Ngày đăng: <?php echo date('d/m/Y', strtotime($p->post_date)); ?></p>
											
															</div>
														</div>
													<?php			
														}
													?>
												</div> 
												<?php 
												}}
												?>
											</div>
											<div class="slide-srv-mb slide-mb-dv">
												<?php
												$locmb1 = array(
													'cat' => $value->term_id,
													'post_type' => 'post',
													'orderby'   => 'publish_date',
													'order'     => 'DESC',
													'posts_per_page' => 12,
												); 	
												$dbmb1 = new WP_Query( $locmb1 );
												$dbmb1 = $dbmb1->get_posts();
												if($dbmb1){
													foreach( array_chunk($dbmb1, 3, true) as $data ) {
												?>
												<div class="item-slide">
													<?php
														foreach( $data as $p1 ) {
														$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $p1->ID ), 'single-post-thumbnail' ); 
													?>
														<div class="item-hot">
															<div class="avarta"><a href="<?php echo get_permalink( $p1->ID );?>"><img src="<?php echo $image1[0]; ?>" class="img-fluid w-100" alt=""></a></div>
															<div class="info">
																<h4><a href="<?php echo get_permalink( $p1->ID );?>"><?php  echo wpautop(wp_trim_words( $p1->post_title,12, $more = null ));  ?></a></h4>
																<p>Ngày đăng: <?php echo date('d/m/Y', strtotime($p1->post_date)); ?></p>
											
															</div>
														</div>
													<?php			
														}
													?>
												</div> 
												<?php 
												}}
												?>
											</div>
										</div>
									</li>
								<?php 
								}
								?>
							</ul>
						</div>
					</div>
				</div> 
				<div class="col-md-9">
					<div class="right">
						<div class="title-srv">Dân sự - Thừa kế - Hợp đồng 123</div>
						<div class="box-new-hot">
							<div class="list-new-hot hot-other">
								<?php 
								foreach ($parent as $key => $value) {
									$loc = array();
									$loc1 = array();
								?>
								<div class="content-tab <?php echo ( $key == 0 ) ? 'active' : ''; ?>" id="tab-srv-<?php echo $key;?>">
									<div class="box-tab-srv-content">
										<div class="title-field-tab">Tư vấn - Hỏi đáp</div>
										<div class="desc">
											<?php echo get_field('sort_srv1'); ?>
										</div> 
										<div class="slide-tab slide-tab-1">
											<?php 
												$cut = substr($value->slug, 0, -16);
												$cate_slug = $value->slug.'-tu-van-hoi-dap,'.$cut;
												$loc=array(
													'category_name' => $cate_slug ,
													'post_type' => 'post',
													'orderby'   => 'publish_date',
													'order'     => 'DESC',
													'posts_per_page' => 12,
													'category__not_in' => array( $value->term_id ), 
												); 	
						                    ?>

											<?php
												$db = new WP_Query( $loc );
												$db = $db->get_posts();
												if($db){
													foreach( array_chunk($db, 2, true) as $data ) {
													?>
													<div class="item-sldie">
														<?php
															foreach( $data as $p3 ){
																if (has_post_thumbnail( $p3->ID ) ): 
																	$image3 = wp_get_attachment_image_src( get_post_thumbnail_id( $p3->ID ), 'single-post-thumbnail' ); 
																endif; 
															?>
														
															<div class="item-hot">
																<div class="avarta"><a href="<?php echo get_permalink( $p3->ID );?>"><img src="<?php echo $image3[0]; ?>" class="img-fluid w-100" alt=""></a></div>
																<div class="info">
																	<h4><a href="<?php echo get_permalink( $p3->ID );?>"><?php  echo $p3->post_title  ?></a></h4>
																	<!-- <h4><a href="<?php echo get_permalink( $p3->ID );?>"><?php  echo wpautop(wp_trim_words( $p3->post_title,14, $more = null ));  ?></a></h4> -->
																</div>
															</div>
														<?php			
															}
														?>
													</div>
											<?php			
													}
												}
											?>
										</div>
										<div class="btn-readmore-hot text-center"><a href="/tu-van-hoi-dap/">Xem thêm</a></div> 
									</div>
									<div class="box-tab-srv-content">
										<div class="title-field-tab">Dịch vụ Luật sư</div>
										<div class="desc">
											<?php echo get_field('sort_srv2'); ?>
										</div> 
										<div class="slide-tab slide-tab-2">
											<?php 
												$loc1=array(
													'cat' => $value->term_id,
													'post_type' => 'post',
													'orderby'   => 'publish_date',
													'order'     => 'DESC',
													'posts_per_page' => 12,
												); 	
						                    ?>

											<?php
												$db1 = new WP_Query( $loc1 );
												$db1 = $db1->get_posts();
												if($db1){
													foreach( array_chunk($db1, 1, true) as $data ) {
													?>
													<div class="item-sldie">
														<?php
															foreach( $data as $p4 ){
																if (has_post_thumbnail( $p4->ID ) ): 
																	$image4 = wp_get_attachment_image_src( get_post_thumbnail_id( $p4->ID ), 'single-post-thumbnail' ); 
																endif; 
															?>
														
															<div class="item-hot">
																<div class="avarta"><a href="<?php echo get_permalink( $p4->ID );?>"><img src="<?php echo $image4[0]; ?>" class="img-fluid w-100" alt=""></a></div>
																<div class="info">
																	<h4><a href="<?php echo get_permalink( $p4->ID );?>"><?php  echo $p4->post_title  ?></a></h4>
																	<!-- <p>Ngày đăng: <?php echo date('d/m/Y', strtotime($p4->post_date)); ?></p>  -->
												
																</div>
															</div>
														<?php			
															}
														?>
													</div>
											<?php			
													}
												}
											?>
										</div>
										<div class="btn-readmore-hot text-center"><a href="/dich-vu-luat-su/">Xem thêm</a></div>
									</div>
								</div>
								<?php 
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<section class="box-qc">
		<div class="container">
			<div class="row">
				<?php while ( has_sub_field('bn_qc' ) ) : ?>
					<div class="col-md-6">
						<div class="item-qc"><a href="<?php the_sub_field( 'link_ads' ); ?>" target="_blank"><img src="<?php echo get_sub_field( 'img_ads' )['url']; ?>" class="img-fluid" alt=""></a></div>
					</div> 
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<section class="box-rule">
		<div class="slide-rule">
			<?php while ( has_sub_field('rule_box' ) ) : ?>
				<div class="item-slide">
					<a href="<?php the_sub_field( 'link' ); ?>" class="abs-rule"></a>
					<div class="avarta"><img src="<?php echo get_sub_field( 'img_rule' )['url']; ?>" class="img-fluid w-100" alt=""></div>
					<div class="caption-rule">
						<div class="container">
							<div class="row"> 
								<div class="col-md-8">
									<div class="item-rule">
										<h3><?php the_sub_field( 'title_rule' ); ?></h3>
										<div class="desc">
											<?php while ( has_sub_field('desc_rule' ) ) : ?>
												<p><?php the_sub_field( 'ntac_ruler' ); ?></p>
											<?php endwhile; ?>
										</div>
										<div class="btn-hotline">
											<a href="<?php the_sub_field( 'link_button_ntac' ); ?>"><?php the_sub_field( 'button' ); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
</main>  
<?php get_footer() ?>   