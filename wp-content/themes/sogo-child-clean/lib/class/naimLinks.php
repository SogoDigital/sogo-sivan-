<?php
/**
 * User: Oren
 * Date: 6/25/2015
 * Time: 7:18 AM
 */

namespace sogo;


class naimLinks {

    private $max;
    private $links ;
    private $post_type ;

    function __construct( $args = array() )
    {

        $this->post_type = isset($args['post_type']) ? $args['post_type'] : 'naim-links';
        $this->max = isset($args['max']) ? $args['max'] : -1;
        $this->set_query();
        ;
    }

    private function set_query(){
        $arr = array(
            'post_type' => $this->post_type,
            'posts_per_page' => $this->max,
        );

        $this->links= get_posts( $arr );



    }



    public function do_slider(){
        $slides = ''; ?>
<!--        <h3 class='roof-title'>--><?php //_e( 'Shimoshnaim', 'sogoc' );?><!--</h3>-->
        <?php
        foreach((array) $this->links as $link ){
            $id = $link->ID;
            $title = get_the_title($id);
            $link = sogo_meta( 'link', $id );
            $image = get_the_post_thumbnail($id, 'shimoshnaim');
            $title_2 = sogo_meta( 'title_2', $id);
            $slides .= '<li><a href="'.esc_url($link).'" title="'.esc_attr($title).'">' . $image
              . '<span class="shimoshnaim-title">'.$title.'</span>' .'<span class="shimoshnaim-sub-title">'.$title_2.'</span>' . '</a></li>';

        }
        echo '<ul class="naim-links">'. $slides .'</ul>';


    }
} 