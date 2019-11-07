<?php
// Previous/next page navigation.
the_posts_pagination([
    'prev_text' => __('Previous page'),
    'next_text' => __('Next page'),
    'before_page_number' =>
        '<span class="meta-nav screen-reader-text">'
        .__('Page')
        .' </span>',
]);
