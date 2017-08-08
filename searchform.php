<?php
/**
 * The template for displaying search forms in xtremelysocial
 *
 * @package totomo
 */
?>


<form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group" >
            <input class="form-control" type="text" id="searchterm" placeholder="<?php echo esc_attr_x( 'Type Here&hellip;', 'placeholder', 'dblogger' ); ?>"  value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'dblogger' ); ?>"/>
            <span class="input-group-btn">
            <button type="text"  value="<?php echo esc_attr_x( 'Search', 'submit button', 'dblogger' ); ?>"><i class="fa  fa-search"></i></button>
                
                </span></div>
</form>
