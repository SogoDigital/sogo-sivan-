<?php
	/**
	 * User: Oren
	 * Date: 7/23/2015
	 * Time: 11:13 AM
	 */

	namespace sogo;


	class survey {
		private $post_type;
		private $max;
		private $posts;

		function __construct ( $args = array() ) {

			$this->post_type = isset( $args[ 'post_type' ] ) ? $args[ 'post_type' ] : 'surveys';
			$this->max = isset( $args[ 'max' ] ) ? $args[ 'max' ] : 1;
			$this->set_query ();;
		}


		private function set_query () {
			$arr = array(
				'post_type'      => $this->post_type,
				'posts_per_page' => $this->max,
				'meta_query'     => array(
					array(
						'key' => '_sogo_end_date',
						'value' <= time ()
					)
				)
			);

			$this->posts = get_posts ( $arr );


		}

		function get_post () {

		}

		public function print_survey ( $id = false, $results = false ) {

			if ( $id ) {
				$post = get_post ( $id );

			} else {
				//$id =  $this->posts[ 0 ];
				$post = $this->posts[ 0 ];
			}
			$date = sogo_meta ( 'end_date', $post->ID );

			if ( $date < time ()  || $results || isset( $_COOKIE[ 'vote-' . $post->ID ])) {
				// survey is finish
				// print display
				$this->show_results ( $post->ID );
				return;
			}
			$options = sogo_meta ( 'votes', $post->ID );
			$output = '';
			if ( $options !== '' ) {
				$output = '<form class="survey-form" data-survey-id="' . $post->ID . '">';
				$output .= '<input type="hidden" value="' . $post->ID . '"/>';
				$output .= sprintf ( '<h3>%s</h3>', get_the_title ( $post->ID ) );
				$output .= get_the_post_thumbnail ( $post->ID );

				foreach ( (array)$options as $key => $option ) {
					$output .= sprintf ( '<label for="sur-%1$s">%2$s</label><input id="sur-%1$s" type="radio" name="survey" value="%1$s">',
						$key, $option[ 'txt' ] );
				}
				$output .= sprintf ( '<input type=submit value="%s"/></form>', __ ( 'Vote', 'sogoc' ) );
			}
			echo $output;
			wp_reset_postdata ();

		}

		public function show_results ( $id ) {
			$post = get_post ( $id );
			if ( !$post ) {
				return false;
			}

			$options = sogo_meta ( 'votes', $post->ID );

			$votes = maybe_unserialize(sogo_meta ( 'votes-count', $post->ID ));

			$total = 0;
			$percentage = 0;
			foreach ( (array)$votes as $v ) {
				$total += intval($v);
				//echo $v;
			}
            $output = sprintf ( '<h3 class="specific-survey-title">%s</h3>', get_the_title ( $post->ID ) );
            $output .= sprintf ( '<div class="specific-survey-img">%s</div>', get_the_post_thumbnail ( $post->ID ) );
//            $output .= get_the_post_thumbnail ( $post->ID );
			$output .= '<ul class="votes-results">';
			foreach ( (array)$options as $key => $option ) {
				$v = isset( $votes[ $key ] ) ? $votes[ $key ] : 0;
				if($total > 0){
					$percentage = round ( ( intval ( $v ) / intval ( $total ) ) * 100 );
				}


				$output = $output .'<li class="bar-container">';

				//$output .= $this->get_image ( $option );
				$output .='<div data-percentage="'.$percentage.'" class="bar"><strong>' . $percentage . '%</strong>'.$this->get_image ( $option ).'</div>';
				$output .= '<span class="bar-title">' . $option[ 'txt' ] . '</span></li>';

			}
			$output .= '</ul>';
			echo $output;
		}


		private function get_image ( $option ) {
			ob_start ();
			sogo_image_group (  'image',$option );
			return ob_get_clean ();
		}

		public function do_slider () {
			$slides = ''; ?>
			<h3 class='roof-title'><?php _e ( 'Shimoshnaim', 'sogoc' ); ?></h3>
			<?php
			foreach ( (array)$this->links as $link ) {
				$id = $link->ID;
				$title = get_the_title ( $id );
				$link = sogo_meta ( 'url', $id );
				$image = get_the_post_thumbnail ( $id, 'shimoshnaim' );
				$title_2 = sogo_meta ( 'title_2', $id );
				$slides .= '<li><a href="' . esc_url ( $link ) . '" title="' . esc_attr ( $title ) . '">' . $image
					. '<span class="shimoshnaim-title">' . $title . '</span>' . '<span class="shimoshnaim-sub-title">' . $title_2 . '</span>' . '</a></li>';

			}
			echo '<ul class="naim-links">' . $slides . '</ul>';


		}
	}