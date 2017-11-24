<?php
/**
 * default search form
 */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="input-group">
            <input type="search" placeholder="<?php echo esc_attr( 'Search…', 'presentation' ); ?>" class="form-control" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
            <span class="input-group-btn">
            <button  type="submit"><i class="fa  fa-search"></i></button>
            </span>
            </div>
</form>