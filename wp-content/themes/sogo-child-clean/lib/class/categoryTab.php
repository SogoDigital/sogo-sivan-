<?php
	/**
	 * User: Oren
	 * Date: 7/10/2015
	 * Time: 6:32 AM
	 */
// use it only with post
	namespace sogo;
		// get cat name
		// get cat image
		// get cat description
		// get cat link
		// get cat roof title

//		@todo: check if we dot have any sub cats
	/**
	 * Class categoryTab
	 *
	 * @package sogo
	 */
	class categoryTab {
		private $format; // 4,5, 6 ,7 according to the box format
		private $type; // category or page
		private $index;  // index on the page - section id
		private $main_term_id; // hold last child term id
		private $sub_terms;// hold last child term
		private $image_meta_image_name = 'feature_image';
		private $image_meta_class_name = 'color';


		/**
		 * @param array $args
		 * format - 4,5,6,7
		 * type - category page
		 * id = term_id
		 * index - section number
		 */
		function __construct ( $args = array() ) {
			// $this->setParams($args);

		}

		private function setParams ( $args = array() ) {
			$this->format = isset( $args[ 'format' ] ) ? $args[ 'format' ] : 1;
			$this->main_term_id = isset( $args[ 'id' ] ) ? $args[ 'id' ] : false;
			$this->index = isset( $args[ 'index' ] ) ? $args[ 'index' ] : 1;
			if ( $this->main_term_id === false ) {
				return;
			}
			// we have id continue.


			//@todo: if not set use index category automatically by tax order.
			// we are category view
			//	$this->main_term_id = get_tax_meta ( $this->id, '_sogo_main_category_section_' . $this->index, true );
			//	$this->sub_terms = get_tax_meta ( $this->id, '_sogo_sub_category_section_' . $this->index, true );
			if ( $this->main_term_id == '' ) {
				$terms = get_terms ( 'category', array( 'parent' => $this->main_term_id ) );
	//			$this->main_term_id = $terms[ 0 ]->term_id;
				if ( $terms ) {
					$subs = array_slice ( $terms, 0, 5 );
					foreach ( (array)$subs as $key => $term ) {

						if ( $key >= 4 )
							exit();
						$this->sub_terms[] = $term->term_id;
					}

					//	$this->sub_terms = array_pluck('term_id',);
				}

			}

		}


		public function get_category_block ( $args = array() ) {
			$this->setParams ( $args );

			$this->print_tab_start ();

			// need to print the tab nav
			$this->print_tab_nav_ele ( $this->main_term_id );
			$tabs = '';
			$tabs .= $this->print_cat_tab ( $this->main_term_id );

			foreach ( (array)$this->sub_terms as $cat ) {
				$this->print_tab_nav_ele ( $cat );
				$tabs .= $this->print_cat_tab ( $cat );

			}
			$this->print_close_tab_nav ();
			echo $tabs;
			$this->print_close_tab ();
			// need to print the tabs
			wp_reset_postdata ();

		}

		/*
		 * private functions
		 *
		 * */

		private function print_tab_start () {
			$output = '
				<div class="cat-tabs" id="cat-tabs-main_category_section_' . $this->index . '">
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
				$name = '';//'empty-' . $ele_id;
			} else {
				$name = $term->name;
			}
			$output = '
			<li><a href="#' . $tab . '">' . $name . '</a></li>	';
			echo $output;

		}

		private function get_cat_posts ( $ele_id ) {
			$tab_format = $this->index == 4 ? 1 : 2;
			//$posts = get_posts ( array( 'posts_per_page' => 8, 'cat' => $ele_id, 'orderby'=> 'modified',	'order' => 'ASC',) );
			$posts = get_posts ( array( 'posts_per_page' => 8, 'cat' => $ele_id) );
			global $post;
			$output = '';
			ob_start ();
			// 1: big image title text meta below
			// 2- 6 small image title meta below
			// 7-8 title meta below small image left
			switch ( $this->format ):
				case 4:
					$i = 1;
					foreach ( (array)$posts as $post ) {
						setup_postdata ( $post );
						$size = 'article-small';
						$block_format = "article-small";
						$meta = true;
						$excerpt = false;
						if ( $i == 1 ) {
							$size = 'article-big';
							$block_format = 'article-big';
							$excerpt = true;
						} else if ( $i > 6 ) {
							$size = 'article-tiny';
							$block_format = 'article-tiny';
						}
						include ( locate_template ( 'templates/content-post-1.php' ) );
						$i++;
					}
					break;
				case 5:
					$posts = get_posts ( array( 'posts_per_page' => 9, 'cat' => $ele_id ) );
					// 1-2: big image title text meta below
					// 3- 5 small image title meta below
					// 6-8 title meta below small image left
					$i = 1;
					foreach ( (array)$posts as $post ) {
						setup_postdata ( $post );
						$size = '5-article-small';
						$block_format = "article-small";
						$excerpt = false;
						$meta = true;
						if ( $i < 3 ) {
							$size = '5-article-big';
							$block_format = 'article-big';
							$excerpt = true;
						} else if ( $i > 6 ) {
							$size = '';
							$block_format = 'article-tiny';
						}
						include ( locate_template ( 'templates/content-post-2.php' ) );
						$i++;
					}
					break;
				default:
					// 1: big image title text meta below
					// 2-5 small image title meta below
					// 6-8 title meta below small image left
					$posts = get_posts ( array( 'posts_per_page' => 7, 'cat' => $ele_id ) );

					$i = 1;
					foreach ( (array)$posts as $post ) {
						setup_postdata ( $post );
						$size = 'article-small';
						$block_format = "article-small";
						$excerpt = true;
						$meta = true;
						if ( $i < 2 ) {
							$size = '6-article-big';
							$block_format = 'article-big';
							$excerpt = true;
						} else
							if ( $i > 4 ) {
								$size = 'article-tiny';
								$block_format = 'article-tiny';
								$excerpt = false;
							}


						//$output .= $this->post_html ( $post, 'thumbnail', true );
						// get_template_part('content','post-1');
						include ( locate_template ( 'templates/content-post-2.php' ) );
						$i++;
					}
			endswitch;

			return ob_get_clean ();

		}

		private
		function print_cat_tab ( $ele_id ) {
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
		private
		function tab_name ( $ele_id ) {

			$tab = "tabs-" . $this->index . "-" . $ele_id;

			return $tab;
		}

		private
		function format_args () {

		}
	}