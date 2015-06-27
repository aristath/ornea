<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text"><?php _e( 'Search for:', 'ornea' ); ?></label>
    <input id="header-search"type="search" value="<?php echo esc_textarea( get_search_query() ); ?>" name="s" class="search-field" placeholder="<?php _e( 'Search', 'ornea' ); ?> <?php bloginfo( 'name' ); ?>" required>
</form>
