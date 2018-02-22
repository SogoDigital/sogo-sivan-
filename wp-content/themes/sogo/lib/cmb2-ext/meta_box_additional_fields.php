<?php
/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function sogo_get_post_options( $query_args  = array()) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => 10,
          ) );

    $posts = get_posts( $args );

    $post_options = array();
    $post_options[-1]= '';
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}

function sogo_array_to_string($posts){
    $val = '';
    foreach ( (array)$posts as $key=>$post ) {
        $val .= "<option value='$key'>$post</option>";
    }
    return $val ;

}



	/**
	 * Gets a number of terms and displays them as options
	 * @param  string       $taxonomy Taxonomy terms to retrieve. Default is category.
	 * @param  string|array $args     Optional. get_terms optional arguments
	 * @return array                  An array of options that matches the CMB2 options array
	 */
	function cmb2_get_term_options( $taxonomy = 'category', $args = array() ) {

		$args['taxonomy'] = $taxonomy;
		// $defaults = array( 'taxonomy' => 'category' );
		$args = wp_parse_args( $args, array( 'taxonomy' => 'category' ) );

		$taxonomy = $args['taxonomy'];
		$terms = (array) get_terms( $taxonomy, $args );

		// Initate an empty array
		$term_options = array();
		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$term_options[ $term->term_id ] = $term->name;
			}
		}

		return $term_options;
	}


	function chosen_cmb2_get_category_get_children() {

		die(json_encode(cmb2_get_term_options('category', array('parent'=> $_GET['parent']))));
	}

	add_action('wp_ajax_get_term_children', 'chosen_cmb2_get_category_get_children');

