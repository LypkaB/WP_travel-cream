    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="categories">
                <div class="categories__cities">
                    <?php
                        wp_nav_menu([
                            'menu'        => 'Footer menu cities',
                            'container'   => false,
                            'echo'        => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap'  => '<ul>%3$s</ul>',
                            'depth'       => 0
                        ]);
                    ?>
                </div>
                <!-- /.categories_cities -->

                <div class="categories__explore">
                    <?php
                        wp_nav_menu([
                            'menu'        => 'Footer menu explore',
                            'container'   => false,
                            'echo'        => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap'  => '<ul>%3$s</ul>',
                            'depth'       => 0
                        ]);
                    ?>
                </div>
                <!-- /.categories_explore -->

                <div class="categories__about">
                    <?php
                        wp_nav_menu([
                            'menu'        => 'Footer menu about',
                            'container'   => false,
                            'echo'        => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap'  => '<ul>%3$s</ul>',
                            'depth'       => 0
                        ]);
                    ?>
                </div>
                <!-- /.categories_about -->

                <div class="categories__contact">
                    <?php
                        wp_nav_menu([
                            'menu'        => 'Footer menu contact',
                            'container'   => false,
                            'echo'        => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap'  => '<ul>%3$s</ul>',
                            'depth'       => 0
                        ]);
                    ?>
                </div>
                <!-- /.categories_contact -->
            </div>
            <!-- /.categories -->
        </div>
        <!-- /.container -->
    </footer>

<?php wp_footer(); ?>

</body>
</html>