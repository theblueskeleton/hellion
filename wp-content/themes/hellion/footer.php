			<!-- Footer Wrapper -->
			<div id="footer-wrapper">
			    <footer id="footer" class="container">
			        <div class="row">
			            <div class="col-3 col-6-medium col-12-small">
                        <!-- Links Footer 1 -->
			                <?php if (is_active_sidebar('footer-sidebar1')) : ?>
			                    <div id="footer-sidebar1" class="widget-area" role="complementary">
			                        <?php dynamic_sidebar('footer-sidebar1'); ?>
			                    </div>
			                <?php endif; ?>

			                <!-- Links -->

			            </div>
			            <div class="col-3 col-6-medium col-12-small">

			                <!-- Links Footer 2 -->
			                <?php if (is_active_sidebar('footer-sidebar2')) : ?>
			                    <div id="footer-sidebar2" class="widget-area" role="complementary">
			                        <?php dynamic_sidebar('footer-sidebar2'); ?>
			                    </div>
			                <?php endif; ?>

			                <!-- Links Footer 3 -->
			                <?php if (is_active_sidebar('footer-sidebar3')) : ?>
			                    <div id="footer-sidebar3" class="widget-area" role="complementary">
			                        <?php dynamic_sidebar('footer-sidebar3'); ?>
			                    </div>
			                <?php endif; ?>

			            </div>
			            <div class="col-6 col-12-medium imp-medium">

			                <!-- Links Footer 4 -->
			                <section>
			                    <h2><strong>ZeroFour</strong> by HTML5 UP</h2>
			                    <p>Hi! This is <strong>ZeroFour</strong>, a free, fully responsive HTML5 site
			                        template by <a href="http://twitter.com/ajlkn">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a>.
			                        It's <a href="http://html5up.net/license/">Creative Commons Attribution</a>
			                        licensed so use it for any personal or commercial project (just credit us
			                        for the design!).</p>
			                    <a href="#" class="button alt icon solid fa-arrow-circle-right">Learn More</a>
			                </section>

			                <!-- Contact -->
			                <section>
			                    <h2>Get in touch</h2>
			                    <div>
			                        <div class="row">
			                            <div class="col-6 col-12-small">
			                                <dl class="contact">
			                                    <dt>Twitter</dt>
			                                    <dd><a href="#">@untitled-corp</a></dd>
			                                    <dt>Facebook</dt>
			                                    <dd><a href="#">facebook.com/untitled</a></dd>
			                                    <dt>WWW</dt>
			                                    <dd><a href="#">untitled.tld</a></dd>
			                                    <dt>Email</dt>
			                                    <dd><a href="#">user@untitled.tld</a></dd>
			                                </dl>
			                            </div>
			                            <div class="col-6 col-12-small">
			                                <dl class="contact">
			                                    <dt>Address</dt>
			                                    <dd>
			                                        1234 Fictional Rd<br />
			                                        Nashville, TN 00000-0000<br />
			                                        USA
			                                    </dd>
			                                    <dt>Phone</dt>
			                                    <dd>(000) 000-0000</dd>
			                                </dl>
			                            </div>
			                        </div>
			                    </div>
			                </section>

			            </div>
			            <div class="col-12">
			                <div id="copyright">
			                    <ul class="menu">
			                        <li>&copy; Daniel Yordanov. All rights reserved</li>
			                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			    </footer>
			</div>

			</div>
			<?php wp_footer(); ?>
			</body>

			</html>