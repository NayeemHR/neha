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