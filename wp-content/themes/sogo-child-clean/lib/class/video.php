<?php
	/**
	 * User: Oren
	 * Date: 6/24/2015
	 * Time: 9:00 AM
	 */

	namespace sogo;


	class video {
		private $max;
		private $size;
		private $post_type;
		private $video_post_format;
		private $videos;
		private $wrapper;
        private $is_slider;

		function __construct ( $args = array() ) {

			$this->post_type = isset( $args[ 'post_type' ] ) ? $args[ 'post_type' ] : 'post';
			$this->video_post_format = ( $this->post_type == 'post' );
			$this->max = isset( $args[ 'max' ] ) ? $args[ 'max' ] : 10;
			$this->size = isset( $args[ 'size' ] ) ? $args[ 'size' ] : '250';
			$this->wrapper = isset( $args[ 'wrapper' ] ) ? $args[ 'wrapper' ] : '';
			$this->is_slider = isset( $args[ 'is_slider' ] ) ? $args[ 'is_slider' ] : true;
			$this->set_query ();
		}

public function has_videos(){
	return !empty($this->videos);
}
		private function set_query () {

			$arr = array(
				'post_type'      => $this->post_type,
				'posts_per_page' => $this->max,

			);
			$arr = sogo_get_category_filter($arr);

			if ( $this->video_post_format ) {
				$arr[ 'post_format' ] = 'post-format-video';
			}

			$this->videos = get_posts ( $arr );

		}


		/**
		 *
		 */
		public function build_strip () {
			if ( empty( $this->videos ) ) {
				return false;
			}
			$this->start_strip ();
			foreach ( (array)$this->videos as $video ):
				$this->single_video ( $video );
			endforeach;
			$this->end_strip ();
		}

		private function get_link ( $video ) {
			$link = sogo_meta ( 'url', $video->ID );
			// if set return that link
			if ( '' != $link ) {
				return $link;
			}
			// link not set - check if post_content is empty
			if ( '' == $video->post_content ) {
				return false;
			}

			return get_permalink ( $video->ID );


		}

		private function get_title ( $video ) {
			$link_start = $link_end = '';
			$link = $this->get_link ( $video );

			if ( $link ) {
				$link_start = '<a href="' . esc_url ( $link ) . '" title="' . esc_attr ( get_the_title ( $video->ID ) ) . '">';
				$link_end = '</a>';
			}

			echo ' <h3 class="video-title">';
			echo sprintf ( "%s %s %s ", $link_start, get_the_title ( $video->ID ), $link_end );
			echo '   </h3>';
		}

		private function single_video ( $video ) {
			// @todo: check if video has url
			//  $embed_code = wp_oembed_get(sogo_meta('video', $video->ID), array('width'=>$this->size));

			echo
				'<li>

                <div class="video-wrapper"><a href="' . sogo_meta ( 'video',
					$video->ID ) . '" class="fancybox-youtube">' .
				sogo_youtube_thumbnail ( $video->ID ) . '</a></div>

                 ';
			$this->get_title ( $video );
			echo '</li>';
		}

		private function start_strip () {
            $slider = $this->is_slider ? ' video-strip slider' : '';
            $display_none = $this->is_slider ? ' style="display:none"' : '';
			echo
			'<div class="'.$this->wrapper.' " >
			 <div class="video-strip-wrapper " >
                   <ul class=" '.$slider.' " '.$display_none.'>
            ';
		}

		private function end_strip () {
			echo
			'</ul>
             </div>
             </div>
            ';
		}


	}