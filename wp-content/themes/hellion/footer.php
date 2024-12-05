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
			                <?php if (is_active_sidebar('footer-sidebar4')) : ?>
			                    <div id="footer-sidebar4" class="widget-area" role="complementary">
			                        <?php dynamic_sidebar('footer-sidebar4'); ?>
			                    </div>
			                <?php endif; ?>

			                <!-- Contact -->
			                <?php if (is_active_sidebar('footer-sidebar5')) : ?>
			                    <div id="footer-sidebar5" class="widget-area" role="complementary">
			                        <?php dynamic_sidebar('footer-sidebar5'); ?>
			                    </div>
			                <?php endif; ?>

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