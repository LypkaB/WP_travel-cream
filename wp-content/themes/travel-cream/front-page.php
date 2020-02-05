<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

        <!-- Banner -->
        <div class="banner">
            <div class="container">
                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                ?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.banner -->
    </div>
    <!-- /.header-bg -->

<?php get_footer(); ?>