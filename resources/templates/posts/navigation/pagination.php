<?php

$prev_text = sprintf(
    '%s <span class="nav-prev-text">%s</span>',
    '<span aria-hidden="true">&larr;</span>',
    __( 'Previous page' )
);
$next_text = sprintf(
    '<span class="nav-next-text">%s</span> %s',
    __( 'Next page' ),
    '<span aria-hidden="true">&rarr;</span>'
);

$posts_pagination = get_the_posts_pagination(
    [
        'mid_size'           => 1,
        'type'               => 'list',
        'prev_text'          => $prev_text,
        'next_text'          => $next_text,
        'screen_reader_text' => __( 'Posts navigation' ),
    ]
);


$posts_pagination = str_replace(
    '<ul class=\'page-numbers\'>',
    '<ul class=\'page-numbers pagination\'>',
    $posts_pagination
);

$posts_pagination = str_replace(
    '<li>',
    '<li class="page-item">',
    $posts_pagination
);

$posts_pagination = str_replace(
    '<li class="page-item"><span aria-current="page" class="page-numbers',
    '<li class="page-item disabled"><a href="#" aria-current="page" class="page-numbers page-link',
    $posts_pagination
);

$posts_pagination = str_replace(
    '<li class="page-item"><span class="page-numbers',
    '<li class="page-item disabled"><a href="#" class="page-numbers page-link',
    $posts_pagination
);

$posts_pagination = str_replace(
    '</span></li>',
    '</a></li>',
    $posts_pagination
);

$posts_pagination = str_replace(
    'page-numbers"',
    'page-link page-numbers"',
    $posts_pagination
);

$posts_pagination = str_replace(
    'screen-reader-text"',
    'screen-reader-text" style="display:none" ',
    $posts_pagination
);

//// If we're not outputting the previous page link, prepend a placeholder with visibility: hidden to take its place.
//if ( strpos( $posts_pagination, 'prev page-numbers' ) === false ) {
//	$posts_pagination = str_replace(
//		'<div class="nav-links">',
//		'<div class="nav-links"><span class="prev page-numbers placeholder" aria-hidden="true">' . $prev_text . '</span>',
//		$posts_pagination
//	);
//}
//
//// If we're not outputting the next page link, append a placeholder with visibility: hidden to take its place.
//if ( strpos( $posts_pagination, 'next page-numbers' ) === false ) {
//	$posts_pagination = str_replace(
//		'</div>',
//		'<span class="next page-numbers placeholder" aria-hidden="true">' . $next_text . '</span></div>',
//		$posts_pagination );
//}

if ( $posts_pagination ) { ?>
    <nav class="pagination-wrapper section-inner">
        <hr class="styled-separator pagination-separator is-style-wide" aria-hidden="true"/>
        <?php echo $posts_pagination;
        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation. ?>
    </nav><!-- .pagination-wrapper -->
    <?php
}
