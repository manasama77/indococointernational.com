<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package accesspress_parallax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-wrap' ); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-parallax' ),
            'after' => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php edit_post_link( '<i class="fa fa-pencil-square-o"></i>' . __( 'Edit', 'accesspress-parallax' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->