<?php global $_moz_opts; ?>
	<header id="masthead" class="site-header header-v1" role="banner">
		<?php _moz_top_menu(); ?>
		<div class="container">
			<div class="site-branding row">
				<div class="site-title clearfix text-center">
					<?php _moz_logo(); ?>
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				</div>
				<div class="top-search col-xs-12 visible-xs">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php _moz_nav(); ?>