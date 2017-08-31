<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <?php foreach ([1, 2, 3, 4] as $item) { ?>
                <div class="col-sm-3 widget-area">
                    <?php dynamic_sidebar('footer-' . $item); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</footer><!-- #colophon -->
