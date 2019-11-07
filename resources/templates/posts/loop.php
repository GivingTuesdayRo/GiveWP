<div class="post-loop">
    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            /* Start the Loop */
            while (have_posts()) : the_post();
                $i++;
                ?>
                <div class="col-sm-6">
                    <?php
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('resources/templates/posts/boxes/generic', get_post_format());
                    ?>
                </div>
                <?php echo (fmod($i, 2) == 0) ? '<div class="w-100"></div>' : ''; ?>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>
