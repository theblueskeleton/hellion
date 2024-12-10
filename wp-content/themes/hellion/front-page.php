<?php get_header(); ?>

            <!-- Feature 1 -->
            <?php get_template_part( 'template-parts/banner' ); ?>
            </div>
			<!-- Main Wrapper -->
				<div id="main-wrapper">
					<div class="wrapper style1">
						<div class="inner">

							<!-- Feature 1 -->
                            <?php get_template_part( 'template-parts/feature1' ); ?>

						</div>
					</div>
					<div class="wrapper style2">
						<div class="inner">

							<!-- Feature 2 -->
                            <?php get_template_part( 'template-parts/feature2' ); ?>

							</div>
					</div>
					<div class="wrapper style3">
						<div class="inner">
							<div class="container">
								<div class="row">
									<div class="col-8 col-12-medium">

										<!-- Article list -->
										<?php get_template_part( 'template-parts/recent-posts' ); ?>
									</div>
									<div class="col-4 col-12-medium">

										<!-- Spotlight -->
                                        <?php get_template_part( 'template-parts/spotlight' ); ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php get_footer(); ?>