<?php get_header(); ?>

				<!-- Banner 
						<div id="banner">
								<h2><strong>Hellion:</strong> A free responsive site template
								<br />
								built on HTML5 and CSS3 by <a href="http://html5up.net">HTML5 UP</a></h2>
								<p>Does this statement make you want to click the big shiny button?</p>
								<a href="#" class="button large icon solid fa-check-circle">Yes it does</a>
						</div>-->

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

                <div class="wrapper style3">
						<div class="inner">
							<div class="container">
								<div class="row">
									<div class="col-8 col-12-medium">
                                        <!-- Article list -->
                                    <?php get_template_part( 'template-parts/recent-posts' ); ?>
									</div>
									<div class="col-4 col-12-medium">

                                    <?php get_template_part( 'template-parts/spotlight' ); ?>
                                    		<!-- Spotlight 
											<section class="box spotlight">
												<h2 class="icon fa-file-alt">Spotlight</h2>
												<article>
													<a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic07.jpg" alt=""></a>
													<header>
														<h3><a href="#">Neural Implants</a></h3>
														<p>The pros and cons. Mostly cons.</p>
													</header>
													<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus semper mod
													quisturpis nisi consequat ornare in, hendrerit in lectus semper mod quis eget mi quat etiam
													lorem. Phasellus quam turpis, feugiat sed et lorem ipsum dolor consequat dolor feugiat sed
													et tempus consequat etiam.</p>
													<p>Lorem ipsum dolor quam turpis, feugiat sit amet ornare in, hendrerit in lectus semper
													mod quisturpis nisi consequat etiam lorem sed amet quam turpis.</p>
													<footer>
														<a href="#" class="button alt icon solid fa-file-alt">Continue Reading</a>
													</footer>
												</article>
											</section>-->

									</div>
								</div>
							</div>
						</div>
					</div>

				<?php get_footer(); ?>
					