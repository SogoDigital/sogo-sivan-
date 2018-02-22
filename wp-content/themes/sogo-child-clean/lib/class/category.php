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

  class post_category {
    private $terms; // all terms assign to our post
    private $term_id; // hold last child term id
    private $term;// hold last child term
    private $post_id;
    private $image_meta_image_name = 'feature_image';
    private $image_meta_class_name = 'color_picker';
    private $term_image = '';
    private $term_class = '';

    /**
     * @param null $post_id
     * @param null $term_id
     */
    function __construct ( $post_id = null, $term_id = null ) {
      $this->post_id = $post_id === null ? get_the_ID () : $post_id;
      $this->term_id = $term_id === null ? $this->setTermid () : $term_id;
	    if($post_id){
		    $this->_set_categories ();
	    }

      $this->term_image = $this->getTermImage ();
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId ( $post_id ) {
      $this->post_id = $post_id;
    }


    /**
     * @param mixed $term_id
     */
    public function setTermId ( $term_id = null ) {
      if ( $term_id !== null ) {
        $this->term_id = $term_id;

        return $term_id;
      }
      if ( $this->post_id === null ) {
        return false;
      }
      $this->_set_categories ();

      return $term_id;
    }


    /**
     * @return string
     */
    public function getTermName () {
      if ( $this->term ) return $this->term->name;

      return '';
    }

    /**
     * @return string
     */

    public function termRoof ($tag = 'h1', $class='roof-title roof-down') {
      termRoof($this->term_id, $tag, $class);
    }

	  public function getTermLink(){
		  $class = $this->term_class == "" || $this->term_class == "#"? "#337ab7"  : $this->term_class;

		  echo sprintf ( "<a class='category-name ' style='background-color:%s' href='%s' >%s</a>", $class,get_category_link ( $this->term_id ),$this->getTermName() );

	  }

    /**
     * @return bool|mixed|null
     */
    public function getTermId () {
      return $this->term_id;
    }


    /**
     * @return string
     */
    public function getTermImage ( $term_id = null ) {

      if ( $term_id ) {
        $id = $term_id;
        $term = get_category ( $id );

      } else {
        $id = $this->term_id;
        $term = $this->term;
      }

      if ( $id ) {
        $image = sogo_term_meta ( $this->image_meta_image_name, $id );
        // limitation: go till the first image found
	      $class = sogo_term_meta ( $this->image_meta_class_name, $id );

	      if($class !== '' && $this->term_class === ''){
	        $this->term_class=$class;
        }else{
		     // $this->term_class = "bc-dark-blue";
        }

        if ( isset( $image[ 'src' ] ) ) {
          $image_src = $image[ 'src' ];
        } else {
          if ( $term && $term->parent !== 0  ) {
            $image_src = $this->getTermImage ( get_category ( $term->parent ) );
          } else {
            return get_stylesheet_directory_uri() .'/images/category.jpg';
          }

        }

        return $image_src;
      }

      return '';
    }

    public function termImage ( $term_id = null ) {
      if ( $term_id !== null ) {
        // generate first the image
        $this->getTermImage ( $term_id );
      }

      echo sprintf (  $this->term_image, $this->getTermName (), $this->getTermName () );
    }

    /**
     * Set categories
     */
    private function _set_categories () {
      if ( $this->post_id ) {
        $list = get_the_category ( $this->post_id );
        $this->terms = $list;
        if ( !empty( $list ) ) {

          $this->term = end ( $list );
          $this->term_id = $this->term->term_id;
        }
      }
    }

  }