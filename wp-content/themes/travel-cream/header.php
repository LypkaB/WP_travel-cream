<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="section-bg" style="background-image: url( '<?php the_field( 'banner_bg' ); ?>' )">

        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="header__wrap">
                    <div class="header__logo">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_field( 'header_text_logo' ); ?>
                        </a>
                    </div>
                    <!-- /.header__logo -->

                    <div class="header__btn-menu">
                        <span></span>
                    </div>
                    <!-- /.header__btn-menu -->

                    <nav class="nav__menu">
                        <?php
                            wp_nav_menu( [
                                'menu'        => 'Top nav menu',
                                'container'   => false,
                                'echo'        => true,
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap'  => '<ul class="nav__list">%3$s</ul>',
                                'depth'       => 0
                            ] );
                        ?>
                    </nav>
                    <!-- /.nav__menu -->

                    <button class="header__login-btn">
                        <?php the_field( 'header_login_btn' ); ?>
                    </button>
                </div>
                <!-- /.header__wrap -->
            </div>
            <!-- /.container -->
        </header>