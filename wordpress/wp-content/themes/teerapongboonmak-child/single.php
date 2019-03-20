<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TeerapongBoonmak
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );
				
				$path = explode("/", $_SERVER['REQUEST_URI']);
				
				if ($path[1] === 'blog') {
					echo "<b>Author: </b>"; the_author_posts_link();
				}

				if ($path[1] === 'book') {
					echo "<b>Author: </b>"; echo get_field( "authors_book" );
					echo "<br>";
					echo "<b>ISBN Code: </b>"; echo get_field( "isbn_code" );
					echo "<br>";
					echo "<b>Category: </b>"; 
					$categories = get_the_category();
					foreach( $categories as $key => $category ) {
						//echo "<a href='".get_category_link( $category->term_id )."'>".$category->name."</a> | ";
						if ($key !== 0) {
							echo " | ";
						}
						echo $category->name;
					}
				}

				//the_post_navigation();

 				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
			
		</div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
