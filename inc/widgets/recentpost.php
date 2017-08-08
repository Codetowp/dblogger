<?php 

class Dblogger_WP_Widget_Recent_Posts extends WP_Widget {

function __construct() {
 $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site with thumbnails"), 'customize_selective_refresh' => true, );
 parent::__construct('thirst-recent-posts', __('Dblogger Recent Posts'), $widget_ops);
 $this->alt_option_name = 'widget_recent_entries';

add_action( 'save_post', array($this, 'flush_widget_cache') );
 add_action( 'deleted_post', array($this, 'flush_widget_cache') );
 add_action( 'switch_theme', array($this, 'flush_widget_cache') );
 }

function widget($args, $instance) {
 $cache = wp_cache_get('widget_recent_posts', 'widget');

if ( !is_array($cache) )
 $cache = array();

if ( ! isset( $args['widget_id'] ) )
 $args['widget_id'] = $this->id;

if ( isset( $cache[ $args['widget_id'] ] ) ) {
 echo $cache[ $args['widget_id'] ];
 return;
 }

ob_start();
 extract($args);


    
$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
    
 if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 $number = 10;
 $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__not_in' => array(23,24,25,26,27) ) ) );
 if ($r->have_posts()) :
?>
 <?php echo $before_widget; ?>
 <?php if ( $title ) echo $before_title . $title . $after_title; ?>
           <ul class="media-list main-list">
              <?php while ( $r->have_posts() ) : $r->the_post(); ?>
              
                      
               
                 <li class="media"> <a  href="<?php the_permalink() ?>">
                <?php add_image_size( 'footer_recent_post', 96, 80,  array( 'top', 'center' ) );
                     
                 if  ( get_the_post_thumbnail()=='')
                {
                     $background_img_relatedpost   = get_template_directory_uri()."/img/t-1.jpg";
                    
                   echo  $post_thumbnail= '<img class="media-object" src="'.$background_img_relatedpost.'" alt="...">';
                }
                else
                {
                   echo $post_thumbnail = get_the_post_thumbnail( get_the_ID() );
                }   
        ?>
                </a>
              <div class="media-body">
                <p class="media-heading"><a href="<?php the_permalink() ?>"> <?php if ( get_the_title() ) {
 $title = get_the_title();
 echo substr($title, 0,40);
 }
 else the_ID(); ?></a></p>
                  
                   <p class="by-author"><a href="<?php the_permalink() ?>">Read more</a></p>
                  <?php if ( $show_date ) : ?>
                <p class="dter"><?php echo get_the_date(); ?></p>
                   <?php endif;

 //thirst_number_comments();

 ?>
              </div>
            </li>
            <?php endwhile; ?>
         

              
 <?php echo $after_widget; ?>
<?php
 // Reset the global $the_post as this query will have stomped on it
 wp_reset_postdata();

endif;

$cache[$args['widget_id']] = ob_get_flush();
 wp_cache_set('widget_recent_posts', $cache, 'widget');
 }

function update( $new_instance, $old_instance ) {
 $instance = $old_instance;
 $instance['title'] = strip_tags($new_instance['title']);
 $instance['number'] = (int) $new_instance['number'];
 $instance['show_date'] = (bool) $new_instance['show_date'];
 $this->flush_widget_cache();

$alloptions = wp_cache_get( 'alloptions', 'options' );
 if ( isset($alloptions['widget_recent_entries']) )
 delete_option('widget_recent_entries');

return $instance;
 }

function flush_widget_cache() {
 wp_cache_delete('widget_recent_posts', 'widget');
 }

function form( $instance ) {
 $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
 $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
 $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
 <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
 <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
 <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

<p><input type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
 <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
 }
}


function Dblogger_WP_Widget_Recent_Posts() {
 // define widget title and description
 $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site with thumbnails") );
 // register the widget
 $this->WP_Widget('dblogger-recent-posts', __('Dblogger Recent Posts'), $widget_ops);
 }
function Dblogger_WP_Widget_Recent_Posts_init()
{
 register_widget('Dblogger_WP_Widget_Recent_Posts');
}
add_action('widgets_init','Dblogger_WP_Widget_Recent_Posts_init');

?>