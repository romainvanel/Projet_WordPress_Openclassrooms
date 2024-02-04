<?php

/**
 * Adds Foo_Widget widget.
 */
class Bloc_Lien_Image extends WP_Widget {

    /**
     * Register widget with WordPress
     */
    public function __construct() {
        parent::__construct(
            'bloc_lien_image_widget', // Base ID
            'Widget block lien image', // Name
            ['description' => __('Widget d\'un lien avec background image', 'text_domain'), ]
        );
    }

    /**
     * Front-end display of widget.
     * 
     * @see WP_Widget::widget()
     * 
     * @param array $args   Widget arguments.
     * @param array $instance Saved values from database
     */
    public function widget($args, $instance) 
    {
        extract($args);
        $title = $instance['title'];
        $urlImage = $instance['url_image'];
        $urlLien = $instance['url_lien'];

        echo $before_widget;

        if (! empty( $urlImage ) && ! empty( $urlLien)) {
            ?>
            <a class="bloc-lien-image-widget" href="<?= $urlLien ?>" style="background-image: url(<?= $urlImage ?>)";>
                <span class="titre"><?= $title ?></span>
            </a>
            <?php
        }

        echo $after_widget;
    }

    /**
     * Back-end widget form. 
     * 
     * @see WP_widget::form()
     * 
     * @param array $instance Previously saved values form database
     */
    public function form($instance) 
    {
        if ( isset( $instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = "Titre d'image";
        }
        if ( isset ($instance['url_image'])) {
            $urlImage = $instance['url_image'];
        } else {
            $urlImage = "";
        }
        if (isset ($instance['url_lien'])) {
            $urlLien = $instance['url_lien'];
        } else {
            $urlLien = "";
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">Titre</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'url_image' ); ?>">Url de L'image</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url_image' ); ?>" name="<?php echo $this->get_field_name( 'url_image' ); ?>" type="text" value="<?php echo esc_attr( $urlImage ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'url_lien'); ?>">Url du lien</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url_lien'); ?>" name= "<?php echo $this->get_field_name( 'url_lien')?>" type="text" value="<?php echo esc_attr( $urlLien ); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     * 
     * @see WP_Widget::update()
     * 
     * @param array $new_instance Value just send to be saved.
     * @param array $old_instance Previously saved values from database
     * 
     * @return array Updated safe values to be saved
     */
    public function update($new_instance, $old_instance) 
    {
        $instance = [];
        $instance['title'] = ( !empty( $new_instance['title'])) ? strip_tags( $new_instance['title']) : '';
        $instance['url_image'] = ( !empty( $new_instance['url_image'])) ? strip_tags($new_instance['url_image']) : '';
        $instance['url_lien'] = ( !empty( $new_instance['url_lien'])) ? strip_tags($new_instance['url_lien']) : '';
        return $instance;
    }

} // class Foo_Widget

?>