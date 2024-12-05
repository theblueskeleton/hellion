<?php get_header(); ?>

					</div>
				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">
					<div class="wrapper style1">
						<div class="inner">

							<!-- Feature 1 -->
								<section class="container box feature1">
									<div class="row">
										<div class="col-12">
											<header class="first major">
                                            <h2><?php the_title(); ?></h2>
                                            <a href="#" class="image featured"><img src="<?php echo get_the_post_thumbnail_url(); ?>" style="width: 55vw; min-width: 330px;" alt="" /></a> 
                                            <p><?php the_content(); ?></p>
											</header>
										</div>
								</section>

						</div>
					</div>
				</div>

                <div class="wrapper style2">
						<div class="inner">
                                <!-- Feature 2 -->
                                <?php get_template_part( 'template-parts/feature2' ); ?>
						</div>
				</div>

    
<?php get_footer(); ?>
					