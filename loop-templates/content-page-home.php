<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="light-gray-solid-bar"></div>
					<div class="grid-cards">
						<div class="course-cards"><a href="http://localhost.com/multihome/envsriverhub/certifications/"><img class="aligncenter size-full wp-image-173" src="http://localhost.com/multihome/envsriverhub/wp-content/uploads/sites/19/2020/02/certs_img.jpg" alt="" width="489" height="622" />RSL Certificate</a></div>

						<div class="course-cards"><a href="http://localhost.com/multihome/envsriverhub/courses/"><img class="aligncenter size-full wp-image-174" src="http://localhost.com/multihome/envsriverhub/wp-content/uploads/sites/19/2020/02/course_img.jpg" alt="" width="495" height="624" />Courses</a></div>

						<div class="course-cards"><a href="http://localhost.com/multihome/envsriverhub/field-courses/"><img class="aligncenter size-full wp-image-167" src="http://localhost.com/multihome/envsriverhub/wp-content/uploads/sites/19/2020/02/IMG_20180717_185347702_HDR-scaled-1.jpg" alt="River study by a group of scientists" width="2560" height="1920" />Field Courses</a></div>
		</div>

			<?php the_content(); ?>

				<h2 class="light-gray-solid-bar">River Studies News</h2>

				<?php echo do_shortcode ( '[display-posts category="news" posts_per_page="2" include_excerpt="true" excerpt_length="35" include_date="true" date_format="F j, Y" image_size="large" wrapper="div" wrapper_class="display-posts-listing image-left" meta_key="_thumbnail_id"] [display-posts category="news" offset="2" posts_per_page="6" image_size="medium" wrapper="div" wrapper_class="display-posts-listing grid" meta_key="_thumbnail_id"]' ) ?>
			

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
