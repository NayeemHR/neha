
	<!-- footer Start -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
                    get_template_part('template-parts/common/bottom-navigation');

                    if(is_active_sidebar('bottom_widget')){
                        dynamic_sidebar('bottom_widget');
                    }
                    ?>

				</div>
			</div>
		</div>
	</footer>

	<!-- 
    Essential Scripts
    =====================================-->

    <?php wp_footer(); ?>

</body>

</html>