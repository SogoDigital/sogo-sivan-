<?php
	/**
	 * User: Oren
	 * Date: 6/22/2015
	 * Time: 9:09 AM
	 */

	namespace sogo;


	class front_page {
		private $section_no;
		private $posts_in;

		public function top_cube () {
			$format = sogo_meta ( 'home-row-1-format' );

			/* format can be:
					1: one post
					2, 3 posts
					3, 3 posts left big
					4, 3 posts right big
					5: 2 posts, left big
					6: 6 posts
					7: 2 posts, right big
			*/

			$output = '';
			switch ( $format ) {
				case "1":
					$output .= '<div class="col-md-9 title-big">' .
						$this->get_post ( 1, 'full-size' ) . '
                           </div>';
					break;
				case "2":

					for ( $i = 1; $i <= 3; $i++ ) {
						$output .= '<div class="col-sm-4 col-md-3 title-small full-article">' .
							$this->get_post ( $i, 'small', true ) .
							'</div>';
					}
					break;
				case "3":
					$output = '<div class="col-md-3 title-small col-sm-4 title-small">' .
						$this->get_post ( 1, 'small' ) .
						$this->get_post ( 2, 'small' ) . '
                           </div>';
					$output .= '<div class="col-md-6 col-sm-8 title-big">' .
						$this->get_post ( 3, 'big', true ) . '
                           </div>';
					break;
				case "4":
					$output = '<div class="col-md-6 col-sm-8 title-big">' .
						$this->get_post ( 1, 'big', true ) . '
                           </div>';
					$output .= '<div class="col-sm-4 col-md-3 title-small">' .
						$this->get_post ( 2, 'small' ) .
						$this->get_post ( 3, 'small' ) . '
                               </div>';
					break;
				case "5":
					$output = '<div class="col-md-3 col-sm-4 title-long">' .
						$this->get_post ( 1, 'long' ) .
						'</div>';
					$output .= '<div class="col-md-6 col-sm-8 title-big">' .
						$this->get_post ( 2, 'big', true ) . '
                           </div>';
					break;
				case "7":
					$output = '<div class="col-md-6 col-sm-8 title-big">' .
						$this->get_post ( 1, 'big', true ) .
						'</div>';
					$output .= '<div class="col-sm-4 col-md-3 title-long">' .
						$this->get_post ( 2, 'long' ) . '
                           </div>';
					break;
				case "6":
					// 6 boxes in 2 rows - define a new row so it
					$output = '<div class="col-md-9"><div class="row">';
					for ( $i = 1; $i <= 6; $i++ ) {
						$output .= '<div class="col-sm-4 col-md-4 title-small">' .
							$this->get_post ( $i, 'small' ) .
							'</div>';
					}
					$output .= '</div></div>';
					break;
				default:

					break;
			}
			echo $output;
		}


		public function get_post ( $no, $size = 'thumbnail', $excerpt = false ) {
			$post_id = sogo_meta ( 'home-row-1-' . $no );
			if ( $post_id == '' ) {
			//	$posts = get_posts ( array( 'posts_per_page' => 1, 'offset' => $no - 1 ,'orderby'=> 'modified',	'order' => 'DESC',) );
				$posts = get_posts ( array( 'posts_per_page' => 1, 'offset' => $no - 1 ) );
				if ( isset( $posts[ 0 ] ) ) {
					$post_id = $posts[ 0 ]->ID;

				} else {
					return false;
				}
			}
			$output = $this->post_html ( $post_id, $size, $excerpt );
			$this->posts_in[] = intval ( $post_id );

			return $output;

		}

		private function post_html ( $post_id, $size = 'thumbnail', $excerpt = false ) {
			global $post;
			$post = get_post ( $post_id );

			/* we have post id, continue build its layout
			 * we need:
			 * 1. Title
			 * 2. post thumbnail
			 * 3. ruf title
			 * 4. permalink
			 * * */
            $img = has_post_thumbnail($post_id) ? get_the_post_thumbnail ( $post_id, $size ):"<img src='". get_stylesheet_directory_uri() .'/images/img.jpg' ."'/>";
                $output = '
                <article  class="'. implode(' ' ,get_post_class() ).'">
                    <a href="' . get_permalink () . '" title="' . esc_attr ( get_the_title () ) . '">
                        <div class="thumbnail-wrapper">
                            ' . $img . '
                        </div>

                    </a>

                     <header class="caption">';

			if('' != sogo_meta('roof')) {
				$output .= '      <h2 class="roof-title">' . sogo_meta ( 'roof' ) . '</h2>';
			} ;
			$output .= '      <h2 class="post-title">
                            <a href="' . get_permalink () . '" title="' . esc_attr ( get_the_title () ) . '">' . get_the_title () . '</a></h2>';

			if ( $excerpt ) {
				$output .= '<p class="article-excerpt">' .  get_the_excerpt() . '</p>';
			}
			$output .= ' </header>
                </article>
        ';
			wp_reset_postdata ();

			return $output;
		}

		public function get_category_block ( $section_no ) {

			$this->section_no = $section_no;
			$main_cat = sogo_meta ( 'main_category_section_' . $section_no );
			$sub_cat = sogo_meta ( 'sub_category_section_' . $section_no );
			$this->print_tab_start ( 'main_category_section_' . $section_no );


			// need to print the tab nav
			$this->print_tab_nav_ele ( $main_cat );
			$tabs = '';
			$tabs .= $this->print_cat_tab ( $main_cat );

			foreach ( (array)$sub_cat as $cat ) {
				$this->print_tab_nav_ele ( $cat );
				$tabs .= $this->print_cat_tab ( $cat );

			}
			$this->print_close_tab_nav ();
			echo $tabs;
			$this->print_close_tab ();
			// need to print the tabs
			wp_reset_postdata ();

		}

		private function print_tab_start ( $section_no ) {
			$output = '
				<div class="cat-tabs" id="cat-tabs-' . $section_no . '">
				  <ul>';
			echo $output;
		}

		private function print_close_tab_nav () {
			$output = '
				  </ul>';
			echo $output;
		}

		private function print_close_tab () {
			$output = '
				  </div>';
			echo $output;
		}

		private function print_tab_nav_ele ( $ele_id ) {
			$tab = $this->tab_name ( $ele_id );
			$term = get_category ( $ele_id );

			if ( is_wp_error ( $term ) || !$term ) {
				$name = '';//'empty-'.$ele_id;
			} else {
				$name = $term->name;
			}
			$output = '
			<li><a href="#' . $tab . '">' . $name . '</a></li>	';
			echo $output;

		}

		private function get_cat_posts ( $ele_id ) {
			$tab_format = $this->section_no == 4 ? 1 : 2;
		//	$posts = get_posts ( array( 'posts_per_page' => 8, 'cat' => $ele_id, 'exclude' => $this->posts_in  ,'orderby'=> 'modified',	'order' => 'DESC' ) );
			$posts = get_posts ( array( 'posts_per_page' => 8, 'cat' => $ele_id, 'exclude' => $this->posts_in  ) );
			global $post;
			$output = '';
			ob_start ();
			// 1: big image title text meta below
			// 2- 6 small image title meta below
			// 7-8 title meta below small image left
			if ( $this->section_no == 4 ) {
				$i = 1;
				foreach ( (array)$posts as $post ) {
					setup_postdata ( $post );
					$size = 'article-small';
					$block_format = "article-small";
					$excerpt = false;
					$meta = true;
					if ( $i == 1 ) {
						$size = 'article-big';
						$block_format = 'article-big';
						$excerpt = true;
					} else if ( $i > 6 ) {
						$size = 'article-tiny';
						$block_format = 'article-tiny';
					}


					//$output .= $this->post_html ( $post, 'thumbnail', true );
					// get_template_part('content','post-1');
					include ( locate_template ( 'templates/content-post-1.php' ) );
					$i++;
				}

			} elseif ( $this->section_no == 5 ) {
				$posts = get_posts ( array( 'posts_per_page' => 9, 'cat' => $ele_id, 'exclude' => $this->posts_in ) );
				// 1-2: big image title text meta below
				// 3- 5 small image title meta below
				// 6-8 title meta below small image left
				$i = 1;
				$meta = true;
				foreach ( (array)$posts as $post ) {
					setup_postdata ( $post );
					$size = '5-article-small';
					$block_format = "article-small";
					$excerpt = false;
					if ( $i < 3 ) {
						$size = '5-article-big';
						$block_format = 'article-big';
						$excerpt = true;
					} else if ( $i > 6 ) {
						$size = '';
						$block_format = 'article-tiny';
					}


					//$output .= $this->post_html ( $post, 'thumbnail', true );
					// get_template_part('content','post-1');
					include ( locate_template ( 'templates/content-post-2.php' ) );
					$i++;
				}


			} else { // == 6 ort 7

				// 1: big image title text meta below
				// 2-5 small image title meta below
				// 6-8 title meta below small image left
				$posts = get_posts ( array( 'posts_per_page' => 7, 'cat' => $ele_id, 'exclude' => $this->posts_in ) );

				$i = 1;
				$meta = true;
				foreach ( (array)$posts as $post ) {
					setup_postdata ( $post );
					$size = 'article-small';
					$block_format = "article-small";
					$excerpt = true;
					if ( $i < 2 ) {
						$size = 'article-big';
						$block_format = 'article-big';
						$excerpt = true;
						//  $meta = true;
					} else if ( $i > 4 ) {
						$size = 'article-tiny';
						$block_format = 'article-tiny';
						$excerpt = false;
						//  $meta = true;
					}


					//$output .= $this->post_html ( $post, 'thumbnail', true );
					// get_template_part('content','post-1');
					include ( locate_template ( 'templates/content-post-2.php' ) );
					$i++;
				}

			}


			return ob_get_clean ();

			//	return $output;

		}

		private function print_cat_tab ( $ele_id ) {
			$tab = $this->tab_name ( $ele_id );

			$output = "<div id='" . $tab . "' class='clearfix'>";
			$output .= $this->get_cat_posts ( $ele_id );
			$output .= "</div>";

			return $output;
		}

		/**
		 * @param $ele_id
		 * @return string
		 */
		private function tab_name ( $ele_id ) {
			$tab = "tabs-" . $this->section_no . "-" . $ele_id;

			return $tab;
		}


		private function get_value () {

		}
	}


?>
