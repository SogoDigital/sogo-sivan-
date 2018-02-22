<?php
	/**
	 * User: Oren
	 * Date: 6/24/2015
	 * Time: 5:58 PM
	 */

	namespace sogo;

	/*
	* will get x nuber of posts (daily image)
	* each post has file_list with all images of the specific day
	* each image as it title.
	*
	*/
	class dailyImage {
		private $max;
		private $size;
		private $daily;
		private $post_type;

		function __construct ( $args = array() ) {
			$this->enqueue_script ();
			$this->post_type = isset( $args[ 'post_type' ] ) ? $args[ 'post_type' ] : 'daily-image';
			$this->max = isset( $args[ 'max' ] ) ? $args[ 'max' ] : 1;
			$this->size = isset( $args[ 'size' ] ) ? $args[ 'size' ] : '250';
			$this->set_query ();;
		}

		private function set_query () {
			$arr = array(
				'post_type'      => $this->post_type,
				'posts_per_page' => $this->max,
			);
			$arr = sogo_get_category_filter($arr);
			$this->daily = get_posts ( $arr );


		}

		private function enqueue_script () {
			wp_enqueue_style ( 'slick', get_template_directory_uri () . '/assets/js/slick/slick.min.css' );
			wp_enqueue_script ( 'slick', get_template_directory_uri () . '/assets/js/slick/slick.min.js', 'jquery' );
		}

		public function do_slider () {

			$slides = '';
			$thumbs = '';
			foreach ( (array)$this->daily as $day ) {
				$day_images = sogo_meta ( 'gallery', $day->ID );
				foreach ( (array)$day_images as $image ) {
					$img = '';
					$title = get_the_title ( $image[ 'image_id' ] );

                    if ( isset($image[ 'url' ]) && $image[ 'url' ]   ) {
                        $target = isset($image[ 'new-window' ]) && $image[ 'new-window' ] == 'on' ? 'target="_blank"': '';
                            $img .= '<a '.$target.' title="'.esc_attr($title).'" href="'.esc_url($image['url']).'">';
                    }
					$img .= $this->get_image ( $image[ 'image_id' ], false, 'daily-big' );
					if ( isset($image[ 'url' ]) && $image[ 'url' ]   ) {
						$img .= '</a>';
					}
					// main slide
					$slides .= $this->do_slide ( $img, $title );


					$img = $this->get_image ( $image[ 'image_id' ], false, 'daily-small' );

					$thumbs .= $this->do_slide ( $img, $title );

				}

			}
			$main = '<div class="slider slider-for">';
			$nav = '<div class="slider slider-nav">';
			$main = $main . $slides . '</div>';

			$nav = $nav . $thumbs . '</div>';
			echo $main;
			echo $nav;
			$this->script ();
		}

		private function do_slide ( $img, $title ) {
			$output = '<div class="daily-slide">';
			$output .= $img;
			$output .= "<div class='caption'>$title</div>";
			$output .= '</div>';

			return $output;
		}

		private function get_image ( $id, $src, $size ) {
			$alt = esc_attr ( get_post_meta ( $id, '_wp_attachment_image_alt', true ) );
			$title = esc_attr ( get_the_title ( $id ) );
			if ( $src === false ) {
				$src = wp_get_attachment_image_src ( $id, $size );

				if ( isset( $src[ 0 ] ) ) {
					$src = $src[ 0 ];
				}
			}

			return "<img src='$src' title='$title' alt='$alt'/>";
		}

		private function script () {

			echo "
        <script>
            jQuery(document).ready(function(){
                jQuery('.slider-for').slick({
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      arrows: false,
                      fade: true,
                      rtl: true,
                      asNavFor: '.slider-nav'
                });
                jQuery('.slider-nav').slick({
                      slidesToShow: 4,
                      slidesToScroll: 1,
                      asNavFor: '.slider-for',
                      dots: false,
                      rtl: true,
                      centerMode: false,
                      focusOnSelect: true
                });
            });
        </script>
        ";
		}

	}