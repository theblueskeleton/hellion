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

                <div class="wrapper style2">
						<div class="inner">
							<!-- Feature 2 -->
								<section class="container box feature2">
									<div class="row">
										<div class="col-6 col-12-medium">
											<section>
												<header class="major">
													<h2>And this is a subheading</h2>
													<p>It’s important but clearly not *that* important</p>
												</header>
												<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
												Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
												Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
												consequat etiam.</p>
												<footer>
													<a href="#" class="button medium icon solid fa-arrow-circle-right">Let's do this</a>
												</footer>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<header class="major">
													<h2>This is also a subheading</h2>
													<p>And is as unimportant as the other one</p>
												</header>
												<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
												Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
												Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
												consequat etiam.</p>
												<footer>
													<a href="#" class="button medium alt icon solid fa-info-circle">Wait, what?</a>
												</footer>
											</section>
										</div>
									</div>
								</section>
						</div>
				</div>

    
<?php get_footer(); ?>
					