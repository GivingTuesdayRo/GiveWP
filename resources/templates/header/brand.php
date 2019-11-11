<!-- Your site title as branding in the menu -->
    <?php if (!has_custom_logo()) { ?>
        <?php if (is_front_page() && is_home()) { ?>
            <h1 class="">
                <a rel="home" href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
        <?php } else { ?>
            <a rel="home" href="<?php echo esc_url(home_url('/')); ?>"
               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        <?php } ?>
    <?php } else { ?>
        <?php the_custom_logo(); ?>
    <?php } ?>
<!-- end custom logo -->