<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package qm
 */


if ( ! function_exists( 'qm_posts_navigation' ) ) :
    /**
     * Post navigation to be used on archive pages.
     * 
     * (adapted from twentynineteen)
     */
    function qm_posts_navigation() {
        the_posts_pagination(
            array(
                'mid_size'  => 1,
                'prev_text' => sprintf(
                    '%s <span class="nav-prev-text">%s</span>',
                    '<svg class="svg-icon" width="22" height="22" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>',
                    __( 'Newer posts', 'qm' )
                ),
                'next_text' => sprintf(
                    '<span class="nav-next-text">%s</span> %s',
                    __( 'Older posts', 'qm' ),
                    '<svg class="svg-icon" width="22" height="22" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>'
                ),
            )
        );
    }
endif;


if ( ! function_exists( 'qm_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     * 
     * (adapted from twentynineteen)
     */
    function qm_entry_footer() {

        // Hide author, post date, category and tag text for pages.
        if ( 'post' === get_post_type() ) {

            // Posted by
            qm_posted_by();

            // Posted on
            qm_posted_on();

            /* translators: used between list items, there is a space after the comma. */
            $categories_list = get_the_category_list( __( ', ', 'qm' ) );
            if ( $categories_list ) {
                printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                    '<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
                    '', // svg icon goes here.
                    __( 'Posted in', 'qm' ),
                    $categories_list
                ); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma. */
            $tags_list = get_the_tag_list( '', __( ', ', 'qm' ) );
            if ( $tags_list ) {
                printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
                    '<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
                    '', // svg icon goes here.
                    __( 'Tags:', 'qm' ),
                    $tags_list
                ); // WPCS: XSS OK.
            }
        }

        // Comment count.
        if ( ! is_singular() ) {
            qm_comment_count();
        }

        // Edit post link.
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers. */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'qm' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">', // . edit svg icon goes here
            '</span>'
        );
    }
endif;


if ( ! function_exists( 'qm_posted_by' ) ) :
    /**
     * Prints HTML with meta information about theme author.
     * 
     * (adapted from twentynineteen)
     */
    function qm_posted_by() {
        printf(
            /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
            '<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
            '', // person svg icon goes here.
            __( 'Posted by', 'qm' ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_html( get_the_author() )
        );
    }
endif; 


if ( ! function_exists( 'qm_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     * 
     * (adapted from twentynineteen)
     */
    function qm_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        printf(
            '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
            '', // watch svg icon goes here.
            esc_url( get_permalink() ),
            $time_string
        );
    }
endif;


if ( ! function_exists( 'qm_comment_count' ) ) :
    /**
     * Prints HTML with the comment count for the current post.
     */
    function qm_comment_count() {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            // comment svg icon goes here.

            /* translators: %s: Name of current post. Only visible to screen readers. */
            comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'qm' ), get_the_title() ) );

            echo '</span>';
        }
    }
endif;


if ( ! function_exists( 'qm_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     * 
     * (adapted from twentynineteen)
     */
    function qm_post_thumbnail() {

        if ( ! qm_can_show_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <figure class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </figure><!-- .post-thumbnail -->

            <?php
        else :
            ?>

        <figure class="post-thumbnail">
            <a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail( 'post-thumbnail' ); ?>
            </a>
        </figure>

            <?php
        endif; // End is_singular().
    }
endif;

/**
 * Determines if post thumbnail can be displayed.
 */
function qm_can_show_post_thumbnail() {
	return apply_filters( 'qm_can_show_post_thumbnail', !post_password_required() && !is_attachment() && has_post_thumbnail() );
}