			<!-- Header -->
            <div id="header-wrapper">
					<div class="container">

						<!-- Header -->
							<header id="header">
								<div class="inner">

									<!-- Logo -->
										<h1><a href="<?php echo get_home_url(); ?>" id="logo">Hellion</a></h1>

									<!-- Nav -->
                                    <nav id="nav">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'main-menu',
                                                'container' => false,
                                                'menu_class' => '',
                                                'items_wrap' => '<ul>%3$s</ul>',
                                            )
                                        );
                                        ?>
                                    </nav>


								</div>
							</header>