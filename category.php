<?php get_header(); do_action('cat_count', single_cat_title('',false));?>
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>
                            <?php
                            do_action('before_cat_title'); title_for_cat(); single_cat_title(); do_action('after_cat_title');
                            ?> </h1>
                        <p> <?php
                            echo category_description();
                            echo apply_filters('desc_filter', 'hello', 'world');
                            ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <?php while(have_posts()){
                    the_post();
                    ?>
                    <div class="col-md-6 ">
                        <div class="post">
                            <div class="post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail('neha-blog', array("class" => "img-responsive"));
                                    }else{
                                        echo '<p class="no-image" >';
                                        _e('NO IMAGE', 'neha');
                                        echo '</p>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="ion-calendar"></i> <?php echo get_the_date('j, M Y');?>
                                    </li>
                                    <li>
                                        <i class="ion-android-people"></i> <?php _e('POSTED BY ', 'neha'); the_author(); ?>
                                    </li>
                                    <li>
                                        <i class="ion-pricetags"></i>
                                        <?php echo get_the_category_list(', '); ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-main"><?php _e('Read More'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if(!have_posts()){
                    echo '<p class="text-center">There is no post in this category.</p>';
                } ?>

            </div>
            <div class="text-center">
                <?php neha_pagination(); ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>