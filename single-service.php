<?php get_header(); the_post();?>

<section class="page-title bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h1> <?php _e('Blog', 'neha');?> </h1>
                    <p> <?php _e('We love to write.', 'neha');?> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<h2 class="post-title">
                        <?php
                        the_title();
                        ?>
                    </h2>

					<div class="post-meta">
						<ul>
							<li>
								<i class="ion-calendar"></i> <?php the_date('j, M Y'); ?>
							</li>
							<li>
								<i class="ion-android-people"></i> <?php _e('Posted by '); the_author_link(); ?>
							</li>
							<li>
								<i class="ion-pricetags"></i> <?php the_category(', ');?>
							</li>

						</ul>
					</div>
					<div class="post-thumb">
                        <?php the_post_thumbnail('neha-blog-large', array( 'class'=>'img-responsive')); ?>
					</div>
					<div class="post-content post-excerpt">
						<?php the_content(); ?>

                        <?php
                        if(!post_password_required()) {
                            echo '<hr>';
                            wp_link_pages();
                        }
                        ?>
                        <?php

                            $neha_chargs = array(
                                'post_type' => 'sub_service',
                                'posts_per_page' => -1,
                                'meta_key' => 'parent_service',
                                'meta_value' => get_the_ID()
                            );
                            $neha_sub_services = new WP_Query($neha_chargs);
                        echo '<h2>';
                            if($neha_sub_services->have_posts()){
                                echo $neha_sub_services->found_posts;
                                _e(' Sub Services', 'neha');
                            }
                        echo '</h2>';



                            $neha_cmb2_sub_service = get_post_meta(get_the_ID(), 'attached_cmb2_attached_posts', true);

                            if(!empty($neha_cmb2_sub_service)){
                            foreach ($neha_cmb2_sub_service as $nch) {
                                $neha_chl = get_the_permalink($nch);
                                $neha_cht = get_the_title($nch);
                                printf("<a href='%s'>%s</a><br>", $neha_chl, $neha_cht);
                            }

                            }else{
                                _e('Info: If you don\'t see the list of sub service, go to the service and drag drop that post you want to see.');
                            }

                        ?>
					</div>
                    <?php
                    if(!post_password_required()){
                        comments_template();
                    }
                    ?>

				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>