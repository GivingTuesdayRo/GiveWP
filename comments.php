<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) { ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if (1 === $comment_count) {
                printf(
                /* translators: 1: title. */
                    esc_html_e('One thought on &ldquo;%1$s&rdquo;', 'givingtuesday'),
                    '<span>'.get_the_title().'</span>'
                );
            } else {
                printf( // WPCS: XSS OK.
                /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comment_count, 'comments title', 'givingtuesday')),
                    number_format_i18n($comment_count),
                    '<span>'.get_the_title().'</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style' => 'ol',
                'short_ping' => true,
            ]);
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'givingtuesday'); ?></p>
        <?php

        endif; // Check for have_comments().
    }
    ?>
    <?php
    $req = true;
    $aria_req = ($req ? " aria-required='true'" : '');

    $comments_arg = [
        'form' => [
            'class' => 'form-horizontal',
        ],
        'fields' => apply_filters('comment_form_default_fields', [
            'autor' => '<div class="form-group">'.'<label for="author">'.__('Name',
                    'wp_babobski').'</label> '.($req ? '<span>*</span>' : '').
                '<input id="author" name="author" class="form-control" type="text" value="" size="30"'.$aria_req.' />'.
                '<p id="d1" class="text-danger"></p>'.'</div>',
            'email' => '<div class="form-group">'.'<label for="email">'.__('Email',
                    'wp_babobski').'</label> '.($req ? '<span>*</span>' : '').
                '<input id="email" name="email" class="form-control" type="text" value="" size="30"'.$aria_req.' />'.
                '<p id="d2" class="text-danger"></p>'.'</div>',
            'url' => '',
        ]),
        'comment_field' => '<div class="form-group">'.'<label for="comment">'.__('Comment',
                'wp_babobski').'</label><span>*</span>'.
            '<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea><p id="d3" class="text-danger"></p>'.'</div>',
        'comment_notes_after' => '',
        'class_submit' => 'btn btn-default',
    ];

    comment_form($comments_arg);
    ?>
</div><!-- #comments -->
