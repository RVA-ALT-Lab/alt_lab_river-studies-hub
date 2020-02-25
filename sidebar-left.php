<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
<div class="col-md-3 widget-area" id="left-sidebar" role="complementary">
	<div class="sticky-side-nav">
		<?php if ( get_the_post_thumbnail() ) : ?>
			<a href="<?php echo get_site_url() ;?>">
			<img class="sidebar-menu-river" src="<?php echo THEME_IMG_PATH  . 'rs_logo_black_words_out_curve.svg';?>">
			</a>
			<?php endif; ?>
		<?php else : ?>
<div class="col-md-4 widget-area" id="left-sidebar" role="complementary">
	<div class="sticky-side-nav">
		<?php if ( get_the_post_thumbnail() ) : ?>
			<a href="<?php echo get_site_url() ;?>">
			<img class="sidebar-menu-river" src="<?php echo THEME_IMG_PATH  . 'rs_logo_black_words_out_curve.svg';?>">
			</a>
			<?php endif; ?>
		<?php endif; ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>
	</div>
</div><!-- #secondary -->
