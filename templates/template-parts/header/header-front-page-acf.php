<?php
/**
 * Tags page ACF header content template
 *
 * @package    Korey_One
 * @subpackage Templates
 * @category   Headers
 * @since      1.0.0
 */

namespace KoreyOne;

// Alias namespaces.
use KoreyOne\Tags      as Tags,
	KoreyOne\Customize as Customize;

// Get the navigation location setting from the Customizer.
$nav_location = Customize\nav_location( get_theme_mod( 'kwo_nav_location' ) );

// Get the author section display setting from the Customizer.
$header_image = Customize\header_image( get_theme_mod( 'kwo_header_image' ) );

$options = get_post_meta( get_the_ID(), 'kwo_post_options', true );
$enable  = $options ? in_array( 'enable_header', $options, true ) : false;
$disable = $options ? in_array( 'disable_header', $options, true ) : false;

?>
<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">

	<div class="site-branding-wrap<?php do_action( 'KoreyOne\site_branding_wrap_class' ); ?>">
		<div class="site-branding">

			<?php echo Tags\site_logo(); ?>

			<div class="site-title-description">

			<?php if ( is_paged() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_attr( esc_url( get_bloginfo( 'url' ) ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php endif; ?>

				<?php

				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $site_description; ?></p>
				<?php endif; ?>

			</div>
		</div>
		<?php Tags\front_page_sections_nav(); ?>
	</div>
</header>
