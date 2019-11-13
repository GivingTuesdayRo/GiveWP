<form role="search" method="get" class="form search-form" action="<?php echo home_url(); ?>/">
    <div class="input-group">
        <input name="s" type="text" class="form-control" placeholder="<?php _e('Search'); ?>">
        <span class="input-group-btn">
            <button type="submit" value="Search" class="btn btn-danger">
                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                <?php _e('Search'); ?>
            </button>
      </span>
    </div>
</form>