<?php
if (have_posts()) :

    if (is_home() && !is_front_page()) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>

        <?php
    endif;

    get_template_part('resources/templates/posts/loop', get_post_format());

    get_template_part('resources/templates/posts/navigation/pagination', get_post_format());

else :

    get_template_part('resources/templates/posts/content/content', 'none');

endif; ?>
