<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package accesspress_parallax
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php
        if ( function_exists( 'wp_body_open' ) ) {
           wp_body_open();
        } ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'accesspress-parallax' ); ?></a>
        <div id="page" class="hfeed site">
            
            <?php
            if ( accesspress_parallax_of_get_option( 'show_social' ) == 1 ):
                do_action( 'accesspress_social' );
            endif;
            ?>
            <?php $header_bottom = (accesspress_parallax_of_get_option( 'enable_bottom_border' )) ? 'header-bottom-border' : ""; ?>
            <header id="masthead" class="<?php echo esc_attr( accesspress_parallax_of_get_option( 'header_layout' ) ) . ' ' . esc_attr($header_bottom); ?>">
                <div class="mid-content clearfix">
                    <div class="flex-box">
                        <div id="site-logo">
                            <?php if ( get_header_image() ) : ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            <?php else: ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                            <?php endif; ?>
                        </div>

                        <nav id="site-navigation" class="main-navigation">

                            <button class="toggle menu-toggle"><?php esc_html_e( 'Menu', 'accesspress-parallax' ); ?></button>

                            <?php
                            $sections = accesspress_parallax_get_plx_sections();
                            if ( (accesspress_parallax_of_get_option( 'enable_parallax' ) == 1 && accesspress_parallax_of_get_option( 'enable_parallax_nav' ) == 1) || (is_page_template( 'home-page.php' ) && accesspress_parallax_of_get_option( 'enable_parallax_nav' ) == 1) ):
                                ?>
                                <ul class="nav single-page-nav">
                                    <?php
                                    $home_text = accesspress_parallax_of_get_option( 'home_text' );
                                    if ( accesspress_parallax_of_get_option( 'show_slider' ) == "yes" && !empty( $home_text ) ) :
                                        $home_text = apply_filters( 'accesspress_translate_string', $home_text, __( 'Home Text in Menu', 'accesspress-parallax' ) );
                                        ?>
                                        <li class="current"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#main-slider"><?php echo esc_html( $home_text ); ?></a></li>
                                        <?php
                                    endif;

                                    if ( !empty( $sections ) ):
                                        foreach ( $sections as $single_sections ):
                                            if ( $single_sections[ 'layout' ] != "action_template" && $single_sections[ 'layout' ] != "blank_template" && $single_sections[ 'layout' ] != "googlemap_template" && !empty( $single_sections[ 'page' ] ) ) :
                                                $title_id = apply_filters( 'accesspress_translate_id', $single_sections[ 'page' ] );
                                                $title_text = get_the_title( $title_id );
                                                ?>
                                                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#section-<?php echo esc_attr( $single_sections[ 'page' ] ); ?>"><?php echo esc_html( $title_text ); ?></a></li>
                                                <?php
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                                <?php
                            else:
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'container' => false
                                ) );
                            endif;
                            ?>

                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </header><!-- #masthead -->

            <?php
            $accesspress_show_slider = accesspress_parallax_of_get_option( 'show_slider' );
            $content_class = "";
            if ( empty( $accesspress_show_slider ) || $accesspress_show_slider == "no" ):
                $content_class = "no-slider";
            endif;
            ?>
            <div id="content" class="site-content <?php echo esc_attr( $content_class ); ?>">
                <?php
                if ( is_home() || is_front_page() ) :
                    do_action( 'accesspress_bxslider' );
                endif;
                ?>