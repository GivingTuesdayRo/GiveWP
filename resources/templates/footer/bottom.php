<footer id="bottom-colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 links">
                <nav role="navigation">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'menu_id' => 'menu-footer-menu',
                        'menu_class' => 'menu',
                        'container_class' => 'menu-footer-menu-container',
                    ]);
                    ?>
                </nav><!-- #site-navigation -->
                <p>
                    Copyright
                    © <?php echo date('Y'); ?>
                    Giving Tuesday Romania
                </p>
            </div>
            <div class="col-sm-4 design-by">
                Crafted by
                <a href="//gabrielsolomon.ro/" target="_blank">Gabriel Solomon</a>
            </div>
        </div>
    </div>

    <div class="footer-overlay"></div>
</footer>