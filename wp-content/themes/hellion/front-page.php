<?php get_header(); ?>

<!-- Banner -->
<div id="banner">
								<h2><strong>Hellion:</strong> A free responsive site template
								<br />
								built on HTML5 and CSS3 by <a href="http://html5up.net">HTML5 UP</a></h2>
								<p>Does this statement make you want to click the big shiny button?</p>
								<a href="#" class="button large icon solid fa-check-circle">Yes it does</a>
							</div>

					</div>
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