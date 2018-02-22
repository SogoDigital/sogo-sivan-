<div class="wrapper">
    <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title',$this->loc); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"
               type="text" value="<?php echo $title; ?>" />
    </p>

    <!--Select Post type-->
    <p><label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Post Type:',$this->loc ); ?></label>
        <select class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" >
            <?php   $args = array(
                'public'   => true
            );

            $output = 'object'; // names or objects, note names is the default
            $post_types = get_post_types( $args, $output );

            foreach ( $post_types  as $obj ) {
                echo '<option value="'.$obj->name.'" '. selected($post_type,$obj->name, false ) .'>' . __($obj->name,$this->loc) . '</option>';
            }
            ?>
        </select> </p>
    <!--Display post per page-->
    <p><label for="<?php echo $this->get_field_id( 'post_per_page' ); ?>"><?php _e( 'Number post display',$this->loc); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'post_per_page' ); ?>" name="<?php echo $this->get_field_name( 'post_per_page' ); ?>"
               type="number" value="<?php echo $post_per_page; ?>" />
    </p>

    <ul class="sortable">
        <li>
            <!--Display post post_title-->
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'post_title' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'post_title' ); ?>" name="<?php echo $this->get_field_name( 'post_title' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'post_title' ); ?>"><?php _e( 'Display post title?',$this->loc ); ?></label>
            </p>
        </li>
        <li>
            <!--Select post date-->
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'post_date' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'post_date' ); ?>" name="<?php echo $this->get_field_name( 'post_date' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'post_date' ); ?>"><?php _e( 'Display post date?',$this->loc ); ?></label>
            </p>

        </li>
        <li>
            <!--Display post category-->
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'category' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Display post category?',$this->loc ); ?></label>
            </p>
        </li>
        <li>
            <!--Display post excerpt-->
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'excerpt' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e( 'Display post excerpt?',$this->loc ); ?></label>
            </p>
        </li>
        <li>
            <!--Display post Image-->
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'image' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Display post image?',$this->loc ); ?></label>
            </p>
        </li>


    </ul>










</div><!-- /wrapper -->