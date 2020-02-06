<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

        <!-- Banner -->
        <section class="banner">
            <div class="container">
                <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    endif;
                ?>
            </div>
            <!-- /.container -->
        </section>
    </div>
    <!-- /.header-bg -->

    <!-- Search form -->
    <section class="search-form">
        <div class="container">
            <form action="/" method="get">
                <label for="from" class="from">
                    <input type="text" id="from" placeholder="<?php the_field( 'input_from' ); ?>" value="<?php the_search_query(); ?>" />
                </label>
                <label for="wantGo" class="want-go">
                    <input type="text" id="wantGo" placeholder="<?php the_field( 'input_want_go' ); ?>" value="<?php the_search_query(); ?>" />
                </label>
                <label for="date" class="date">
                    <input type="text" id="date" placeholder="<?php the_field( 'input_date' ); ?>" value="<?php the_search_query(); ?>" />
                </label>
                <button type="submit" class="search-btn"><?php the_field( 'button_search' ); ?></button>
            </form>
        </div>
        <!-- /.container -->
    </section>

<?php get_footer(); ?>