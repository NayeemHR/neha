<!DOCTYPE html>
<html class="no-js">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Aviato E-Commerce Template">

	<meta name="author" content="Themefisher.com">

	<!-- Mobile Specific Meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

</head>

<body id="body">

	<!-- Header Start -->
	<header class="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<!-- header Nav Start -->
					<nav class="navbar">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
									data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only"><?php _e("Toggle navigation", 'neha'); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?php home_url( "/" ) ?>">
									<?php 
                                    if(has_custom_logo()){
                                        the_custom_logo();
                                    }else{ 
                                        echo '<h4>' . get_bloginfo('name') . '</h4>';
                                    }
                                    ?>
								</a>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
                            <?php get_template_part('template-parts/common/navigation'); ?>
						</div><!-- /.container-fluid -->
					</nav>

				</div>
                <div class="col-md-2"><?php get_search_form(); ?></div>
			</div>
		</div>
	</header><!-- header close -->
