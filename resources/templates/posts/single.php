<?php
while (have_posts()) : the_post();

    get_template_part('resources/templates/posts/content/content', 'single');

    the_post_navigation();

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

endwhile; // End of the loop.
