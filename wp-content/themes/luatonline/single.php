<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package luatonline
 */

get_header();
?>

<main>
	<section class="breadcrumbs" style="background: url('<?php echo get_field('banner_detail_box')['url'] ?>') no-repeat center;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div> 
				<div class="col-md-9">
					<div class="content-bread bread-detail">
						<div class="br-top text-left">
							<div class="title-detail">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="bott-br">
								<ul class="list-inline">
									<li class="list-inline-item">Người đăng: <?php echo the_author_meta( 'user_nicename', $post->post_author ); ?></li>
									<li class="list-inline-item">Thời gian: <?php echo get_the_date('d/m/Y'); ?></li>
								</ul>
							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="box-category p-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">  
					<div class="bar-category">
						<div class="table-content">
							<h3 class="text-center text-uppercase">Mục lục</h3>
							<ul class="mluc-bar">
								<?php $count_title = 1 ?>
								<?php while ( has_sub_field('table_content' ) ) : ?>
									<li><a href="#<?php echo $count_title++ ?>"><?php the_sub_field( 'text_table_content' ); ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="box-right-cate p-0">
						<div class="content-detail">
							<div class="detail text-justify">
								<?php echo get_the_content(); ?> 
							</div>

							<div class="like-dislike">
								<ul class="list-inline">
									<li class="list-inline-item"><span>Nội dung này có hữu ích với bạn? </span></li>
									<li class="list-inline-item">
										<a href="javascript:void(0)" class="btn-reaction" data-type="like" data-id="<?php echo get_the_ID() ?>"><i class="fa fa-thumbs-up"></i> 
											<span class="numb_like"><?php echo the_field('numb_like') ?></span>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0)" class="btn-reaction" data-type="dislike" data-id="<?php echo get_the_ID() ?>"><i class="fa fa-thumbs-down"></i> 
											<span class="numb_dislike"><?php echo the_field('numb_dislike') ?></span>
										</a>
									</li>
								</ul>
								<div class="nnotice-like">Cảm ơn bạn đã nhận xét. ThinkSmart luôn nổ lực cải tiến mỗi ngày để xứng đáng với sự quan tâm của bạn !</div>
							</div>

							

							<!-- <div class="sc-share">
								<ul class="list-inline text-center">
									<li class="list-inline-item"><a href=""><img src="images/i-1.png" class="img-fluid" alt=""></a></li>
									<li class="list-inline-item"><a href=""><img src="images/i-2.png" class="img-fluid" alt=""></a></li>
									<li class="list-inline-item"><a href=""><img src="images/i-3.png" class="img-fluid" alt=""></a></li>
									<li class="list-inline-item"><a href=""><img src="images/i-4.png" class="img-fluid" alt=""></a></li>
								</ul>
							</div> -->

							<div class="box-form-detail">
								<h3>Yêu cầu tư vấn pháp luật</h3>
								<div class="btn-frm-detail">
									<ul class="list-inline">
										<?php while ( has_sub_field('contact-detail','option' ) ) : ?>
		                                    <li class="list-inline-item"><a href="<?php echo get_sub_field('link_button_detail','option') ?>"><?php echo get_sub_field('button_1','option') ?></a></li>
		                                <?php endwhile; ?>

									</ul> 
								</div>
							</div>
							<div class="other-news">
								<div class="title-other text-center">Bài viết liên quan</div>
								<div class="list-other">
									<div class="row">
		                                <?php
											$categories = get_the_category(get_the_ID());
											if ($categories){
											    $category_ids = array();
											    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
											    $args=array(
											        'category__in' => $category_ids,
											        'post__not_in' => array(get_the_ID()),
											        'posts_per_page' => 4,
											    );
											    $my_query = new wp_query($args);
											    if( $my_query->have_posts() ):
											        while ($my_query->have_posts()):$my_query->the_post();
											            ?>
											             <div class="col-md-3 col-sm-6">
															<div class="item-new-home">
																<div class="avarta"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-fluid w-100" alt=""></a></div>
																<div class="info">
																	<h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
																	<div class="sort-desc">
																		<?php echo get_field('sort_detail') ?>
																	</div>
																</div>
															</div>
														</div>
											            <?php
											        endwhile;
											    endif; wp_reset_query();
											}
											?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer() ?>
<script>
	$(document).ready(function() {
		$('.btn-reaction').on('click', function(event) {
			$('.btn-reaction').removeClass('active');
			$(this).addClass('active');
			$('.nnotice-like').slideDown();
			event.preventDefault();
			let $type = $(this).data('type');
			let $id = $(this).data('id');

			$.ajax({
				url: '<?php echo admin_url('admin-ajax.php');?>',
				type: 'POST',
				data : {
                    action: "reaction",
                    type: $type,
                    id: $id,
                },
			})
			.done(function(res) {
				if(res.data.code === 1){
					$('.numb_like').text(res.data.data.numb_like);
					$('.numb_dislike').text(res.data.data.numb_dislike);
				}
			});
			
		});
	});
</script>