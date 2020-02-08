<?php
/*
Template Name: Home
*/
?>

<?php
    $flights_blocks_title_1 = get_field('flights_blocks_title_1');
    $flights_blocks_title_2 = get_field('flights_blocks_title_2');
    $flights_blocks_title_3 = get_field('flights_blocks_title_3');
    $flights_blocks_title_4 = get_field('flights_blocks_title_4');
    $flights_blocks_title_5 = get_field('flights_blocks_title_5');
    $flights_blocks_title_6 = get_field('flights_blocks_title_6');
?>

<?php get_header(); ?>

        <!-- Banner -->
        <section class="banner">
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
        </section>
    </div>
    <!-- /.header-bg -->

    <!-- Search form -->
    <section class="search-form">
        <div class="container">
            <form action="/" method="get">
                <label for="from" class="from">
                    <input type="text" id="from" placeholder="<?php the_field('input_from'); ?>" value="<?php the_search_query(); ?>" />
                </label>
                <label for="wantGo" class="want-go">
                    <input type="text" id="wantGo" placeholder="<?php the_field('input_want_go'); ?>" value="<?php the_search_query(); ?>" />
                </label>
                <label for="date" class="date">
                    <input type="text" id="date" placeholder="<?php the_field('input_date'); ?>" value="<?php the_search_query(); ?>" />
                </label>
                <button type="submit" class="search-btn"><?php the_field('button_search'); ?></button>
            </form>
        </div>
        <!-- /.container -->
    </section>

    <!-- Flights -->
    <section class="flights">
        <div class="container">
            <div class="flights__header">
                <div class="section-title">
                    <h2><?php the_field( 'flights_section_title' ); ?></h2>
                </div>
                <!-- /.section-title -->

                <div class="flights__categories">
                    <?php
                        $flights_categories = get_terms('flights-category');
                        if (!empty($flights_categories) && !is_wp_error($flights_categories)) {
                            echo "<ul>";
                            foreach ($flights_categories as $flights_category) {
                                echo "<li>" . $flights_category -> name . "</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
                <!-- /.flights__categories -->
            </div>
            <!-- /.flights__header -->

            <div class="flights__blocks">
                <ul>
                    <li><?= $flights_blocks_title_1 ?></li>
                    <li><?= $flights_blocks_title_2 ?></li>
                    <li><?= $flights_blocks_title_3 ?></li>
                    <li><?= $flights_blocks_title_4 ?></li>
                    <li><?= $flights_blocks_title_5 ?></li>
                    <li><?= $flights_blocks_title_6 ?></li>
                </ul>

                <?php
                    global $post;
                    $args = [
                        'post_type'     => 'flights',
                        'numberposts'   => 5,
                        'orderby'       => 'date',
                        'order'         => 'DESC'
                    ];

                    $flights_post = get_posts($args);

                    if ($flights_post) :
                        foreach ($flights_post as $post) : setup_postdata($post)
                ?>
                    <div class="flights__post">
                        <span class="flights__post_blocks_title"><?= $flights_blocks_title_1 ?></span>
                        <div class="flights__post_airline">
                            <?php
                                $flights_post_aln_img = get_field('fgs_post_airline_img');
                                if (!empty($flights_post_aln_img)) :
                            ?>
                                <div class="flights__post_airline-img">
                                    <img src="<?= $flights_post_aln_img['url']; ?>" alt="<?= $flights_post_aln_img['alt']; ?>">
                                </div>
                                <!-- /.flights__post_airline-img -->
                            <?php endif; ?>

                            <div class="flights__post_airline-info flights__post_col">
                                <span><?php the_field('fgs_post_airline_cn'); ?></span>
                                <span><?php the_field('fgs_post_airline_num'); ?></span>
                            </div>
                            <!-- /.flights__post_airline-info -->
                        </div>
                        <!-- /.flights__post_airline -->

                        <span class="flights__post_blocks_title"><?= $flights_blocks_title_2 ?></span>
                        <div class="flights__post_date flights__post_col">
                            <span><?php the_field('fgs_post_date'); ?></span>
                            <span><?php the_field('fgs_post_date_days'); ?></span>
                        </div>
                        <!-- /.flights__post_date -->

                        <span class="flights__post_blocks_title"><?= $flights_blocks_title_3 ?></span>
                        <div class="flights__post_departure flights__post_col">
                            <span><?php the_field('fgs_post_departure'); ?></span>
                            <span><?php the_field('fgs_post_departure_time'); ?></span>
                        </div>
                        <!-- /.flights__post_departure -->

                        <span class="flights__post_blocks_title"><?= $flights_blocks_title_4 ?></span>
                        <div class="flights__post_arrival flights__post_col">
                            <span><?php the_field('fgs_post_arrival'); ?></span>
                            <span><?php the_field('fgs_post_arrival_time'); ?></span>
                        </div>
                        <!-- /.flights__post_arrival -->

                        <span class="flights__post_blocks_title"><?= $flights_blocks_title_5 ?></span>
                        <div class="flights__post_time flights__post_col">
                            <span><?php the_field('fgs_post_time'); ?></span>
                            <span><?php the_field('fgs_post_time_info'); ?></span>
                        </div>
                        <!-- /.flights__post_time -->

                        <span class="flights__post_blocks_title"><?= $flights_blocks_title_6 ?></span>
                        <div class="flights__post_price">
                            <a href="#!"><?php the_field('fgs_post_price'); ?></a>
                        </div>
                        <!-- /.flights__post_price -->
                    </div>
                    <!-- /.flights__post -->
                <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
            <!-- /.flights__blocks -->

            <div class="flights__see-all-btn">
                <a href="#!"><?php the_field('flights_see_all_btn'); ?></a>
            </div>
            <!-- /.flights__see-all-btn -->
        </div>
        <!-- /.container -->
    </section>

<?php get_footer(); ?>