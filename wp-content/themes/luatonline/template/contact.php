<?php /* Template Name: contact */ ?>
<?php get_header() ?>
<main>
	<section class="breadcrumbs" style="background: url('<?php the_field('anh_nen'); ?>') no-repeat center;">
		<div class="container">
			<div class="content-bread">
				<h2>Liên hệ</h2>
			</div>
		</div>
	</section>
	<section class="contact">
		<div class="container">
			<div class="box-contact">
				<div class="row">
					<div class="col-md-6">
						<div class="ctn-left">
							<h1>CÔNG TY LUẬT TNHH THINKSMART</h1>
							<ul>
								<?php while ( has_sub_field('place_contact' ) ) : ?>
									<li><i class="fa <?php the_sub_field( 'icon' ); ?>"></i><?php the_sub_field( 'content_contact' ); ?></li>
								<?php endwhile; ?>
								<li>Hồ sơ năng lực: <a href="<?php echo the_field('contact_hso') ?>" target="_blank"> xem tại đây</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="ctn-right">
							<h3 class="text-center">KẾT NỐI VỚI CHÚNG TÔI</h3>
							<!-- <div class="hotline-ctn">Hotline 1900 636391</div>  -->
							<div class="form-ctn">
			                    <?php echo do_shortcode('[contact-form-7 id="86" title="Form liên hệ"]'); ?>
							</div>
						</div>
					</div>
				</div>
                
			</div>
		</div> 
		<div class="maps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.434320712136!2d105.78024781540213!3d21.015300893612476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab755606f0c9%3A0x6404bf1c337c2882!2zQ8O0bmcgdHkgbHXhuq10IFRoaW5rU21hcnQ!5e0!3m2!1svi!2s!4v1618419205949!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>

		<!-- popup-message -->
		<button type="button" class="clc-popup-contact" data-toggle="modal" data-target="#myModal" style="display: none;">Open modal</button>
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog modal-contact">
		    <div class="modal-content">
		      <!-- Modal body -->
		      <div class="modal-body">
		        <div class="content-popup-ctn text-center">
		        	<h3>GỬI THÔNG TIN THÀNH CÔNG</h3>
		        	<div class="desc">
		        		<p>Cảm ơn bạn đã gửi thông tin đến ThinkSmart. Chúng tôi sẽ kết nối với bạn trong thời gian sớm nhất!</p>
		        		<p><a href="">Quay lại biểu mẫu</a></p>
		        	</div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- end popup-message -->
	</section>
</main>
<?php get_footer() ?>   
