<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TeerapongBoonmak
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main">

			<?php 
			$author = get_the_author();
		    $blog_query = null;
	        $args_blog = array (
	          'post_type' => 'blog',
	        );
	        $blog_query = new WP_Query( $args_blog );
			if ( have_posts() || $blog_query->have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					echo "<h4>Biography </h4>";
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

			      /*if ( $blog_query->have_posts() ) {
			      echo "<h3> Blog </h5>";
			      echo "<ul>";
			        while ( $blog_query->have_posts() ) {
			          $blog_query->the_post();
			          echo "<li class='hidden'>"; $author_temp = the_author(); echo "</li>";
			          if ($author === $author_temp) {
			          ?>
			            <li>
			              <h5><?php echo'<a href="'; the_permalink(); echo'">';?><?php the_title(); echo'</a>'; ?></h5>
			              <?php the_author_posts_link();?>
			              <div class="author-img-blog"><?php echo'<a href="'; the_permalink(); echo'">';?><?php the_post_thumbnail(); echo'</a>';?></div>
			              <?php the_content();?>
			            </li>
			         	<hr> 
			         <?php
			      	  }
			          //get_template_part( 'template-parts/content', get_post_type() );

			        }
			      echo "</ul>";
			      }
			      wp_reset_postdata();*/

				//the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
