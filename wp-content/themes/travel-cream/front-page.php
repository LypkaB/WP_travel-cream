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
    $flights_section_title = get_field('flights_section_title');
    $see_all_btn = get_field('see_all_btn');
    $hotels_section_title = get_field('hotels_section_title');
    $attractions_section_title = get_field('attractions_section_title');
    $trips_section_title = get_field('trips_section_title');
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
            <div class="section__header">
                <div class="section__header-title">
                    <h2><?= $flights_section_title ?></h2>
                </div>
                <!-- /.section__header-title -->

                <div class="section__header-categories">
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
                <!-- /.section__header-categories -->
            </div>
            <!-- /.section__header -->

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
                        <div class="price-btn">
                            <a href="#!"><?php the_field('fgs_post_price'); ?></a>
                        </div>
                        <!-- /.price-btn -->
                    </div>
                    <!-- /.flights__post -->
                <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
            <!-- /.flights__blocks -->

            <div class="see-all-btn">
                <a href="#!">
                    <?= $see_all_btn ?>
                    <span><?=$flights_section_title ?></span>
                </a>
            </div>
            <!-- /.see-all-btn -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Hotels -->
    <section class="hotels">
        <div class="container">
            <div class="section__header">
                <div class="section__header-title">
                    <h2><?= $hotels_section_title ?></h2>
                </div>
                <!-- /.section__header-title -->

                <div class="section__header-categories">
                    <?php
                        $hotels_categories = get_terms('hotels-category');
                        if (!empty($hotels_categories) && !is_wp_error($hotels_categories)) {
                            echo "<ul>";
                            foreach ($hotels_categories as $hotels_category) {
                                echo "<li>" . $hotels_category -> name . "</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
                <!-- /.section__header-categories -->
            </div>
            <!-- /.section__header -->

            <div class="hotels__blocks">
                <?php
                    global $post;
                    $args = [
                        'post_type'     => 'hotels',
                        'numberposts'   => 6,
                        'order'         => 'DESC'
                    ];

                    $hotels_post = get_posts($args);

                    if ($hotels_post) :
                        foreach ($hotels_post as $post) : setup_postdata($post)
                ?>
                    <div class="hotels__post">
                        <?php
                            $hotels_post_img = get_field('hotels_post_img');
                            if (!empty($hotels_post_img)) :
                        ?>
                            <div class="hotels__post-img">
                                <img src="<?= $hotels_post_img['url']; ?>" alt="<?= $hotels_post_img['alt']; ?>">
                            </div>
                            <!-- /.hotels__post-img -->
                        <?php endif; ?>

                        <div class="hotels__post_wrap">
                            <span class="hotels__post-title"><?php the_title(); ?></span>

                            <div class="hotels__post_info">
                                <span><?php the_field('hotels_post_dtc'); ?></span>
                                <span><?php the_field('hotels_post_desc'); ?></span>
                            </div>
                            <!-- /.hotels__post_info -->

                            <div class="price-btn">
                                <a href="#!"><?php the_field('hotels_post_price'); ?></a>
                            </div>
                            <!-- /.price-btn -->
                        </div>
                        <!-- /.hotels__post_wrap -->
                    </div>
                    <!-- /.hotels__post -->
                <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
            <!-- /.hotels__blocks -->

            <div class="see-all-btn">
                <a href="#!">
                    <?= $see_all_btn ?>
                    <span><?=$hotels_section_title ?></span>
                </a>
            </div>
            <!-- /.see-all-btn -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Attractions -->
    <section class="attractions">
        <div class="container">
            <div class="section__header">
                <div class="section__header-title">
                    <h2><?= $attractions_section_title ?></h2>
                </div>
                <!-- /.section__header-title -->

                <div class="section__header-categories">
                    <?php
                        $attractions_categories = get_terms('attractions-category');
                        if (!empty($attractions_categories) && !is_wp_error($attractions_categories)) {
                            echo "<ul>";
                            foreach ($attractions_categories as $attractions_category) {
                                echo "<li>" . $attractions_category -> name . "</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
                <!-- /.section__header-categories -->
            </div>
            <!-- /.section__header -->

            <div class="attractions__blocks">
                <?php
                    global $post;
                    $args = [
                        'post_type'     => 'attractions',
                        'numberposts'   => 6,
                        'order'         => 'ASC'
                    ];

                    $attractions_post = get_posts($args);

                    if ($attractions_post) :
                        foreach ($attractions_post as $post) : setup_postdata($post)
                ?>
                    <div class="attractions__post" style="background-image: url('<?php the_field('attractions_post_img'); ?>')">
                        <span class="attractions__post-title"><?php the_title(); ?></span>
                    </div>
                    <!-- /.attractions__post -->
                <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
            <!-- /.attractions__blocks -->

            <div class="see-all-btn">
                <a href="#!">
                    <?= $see_all_btn ?>
                    <span><?=$attractions_section_title ?></span>
                </a>
            </div>
            <!-- /.see-all-btn -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Trips -->
    <section class="trips">
        <div class="container">
            <div class="section__header">
                <div class="section__header-title">
                    <h2><?= $trips_section_title ?></h2>
                </div>
                <!-- /.section__header-title -->

                <div class="section__header-categories">
                    <?php
                        $trips_categories = get_terms('category');
                        if (!empty($trips_categories) && !is_wp_error($trips_categories)) {
                            echo "<ul>";
                            foreach ($trips_categories as $trips_category) {
                                echo "<li>" . $trips_category -> name . "</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
                <!-- /.section__header-categories -->
            </div>
            <!-- /.section__header -->

            <div class="trips__blocks">
                <?php
                    $args = [
                        'numberposts'   => 3,
                        'order'         => 'DESC'
                    ];

                    $posts = get_posts($args);

                    if ($posts) :
                        foreach ($posts as $post) : setup_postdata($post)
                ?>
                    <div class="trips__post">
                        <div class="trips__post-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <!-- /.trips__post-img -->

                        <div class="trips__post_content">
                            <span><?php the_title(); ?></span>
                            <?php the_excerpt(); ?>
                        </div>
                        <!-- /.trips__post_content -->

                        <a href="<?php the_permalink(); ?>" class="trips__post-link"></a>
                    </div>
                    <!-- /.trips__post -->
                <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
            <!-- /.trips__blocks -->

            <div class="see-all-btn">
                <a href="#!">
                    <?= $see_all_btn ?>
                    <span><?=$trips_section_title ?></span>
                </a>
            </div>
            <!-- /.see-all-btn -->
        </div>
        <!-- /.container -->
    </section>

<?php get_footer(); ?>