<header class="entry-header">
    <div id="banner-picture" style="
            background: url(<?php the_post_thumbnail_url('large') ?>);
            background-repeat: no-repeat;background-size: cover;background-position: top center; ">
        <div class="banner-overlay">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </div>
    </div>

    <div class="entry-meta">
        <?php givingtuesday_posted_on(); ?>
    </div><!-- .entry-meta -->
</header>