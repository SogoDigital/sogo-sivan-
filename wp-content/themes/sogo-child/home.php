<?php
// Template Name: blog page
$blog_page_id = get_option('page_for_posts');
$blog_page = get_post($blog_page_id);
?>
<?php get_header() ?>

<section id="blog-floor-1" class="cover">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <header class="page-header">
                    <h1 class="page-title   color-white"><?php echo get_the_title($blog_page_id) ?></h1>

                    <h2 class="page-sub-title color-white "><?php echo $blog_page->post_content ?></h2>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #contact-floor-1 -->

<section id="blog-floor-2" class="" style="background-color: #f1f1f1">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-xs-12 col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <!-- CAT NAVIGATION -->
                        <ul class="plugin-nav js-blog-cats-slider">
                            <?php
                            wp_list_categories(array(
                                    'hide_empty' => 1,
                                    'current_category' => 0,
                                    'title_li' => '',
                                )
                            );
                            ?>
                        </ul>
                        <!-- CAT NAVIGATION MOBILE -->
<!--                        <select name="post-category-select" id="post-category-select" class="text-center">-->
<!---->
<!--                            --><?php //$current_all = is_home() ? 'current-item' : ''; ?>
<!---->
<!--                            <option class="--><?php //echo $current_all; ?><!-- text-center text-p no-wrap ml-2 mb-2 mb-lg-0"-->
<!--                                    value="--><?php //echo get_post_type_archive_link( 'post' ); ?><!--">-->
<!--                                <p>כל כתבות</p>-->
<!--                                --><?php ////echo get_field( '_sogo_blog_all_articles', 'option' ) ?>
<!--                            </option>-->
<!---->
<!--                            --><?php
//                            foreach ( get_categories() as $category ) :
//                                $current   = get_queried_object_id() == $category->term_id ? 'selected' : '';
//                                printf(
//                                    '<option %s class="blog-cat mb-2 mb-md-0 px-4 py-1 mx-1" value="%s">%s</option>',
//
//                                    $current,
//                                    esc_url( get_category_link( $category ) ),
//                                    esc_html( $category->name )
//                                );
//                            endforeach;
//                            ?>
<!--                        </select>-->

                        <!-- CAT CONTENT -->
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                          <form id="search-bar" class="w-50" action="<?php echo site_url('/') ?>">
                            <span id="search-id" class='glyphicon glyphicon-search'></span>
                            <input id="s" name="s" type="text" placeholder="<?php _e('SEARCH IN BLOG', 'sogoc') ?>"/>
                            <input   name="post_type" type="hidden" value="post"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row d-flex flex-wrap">
<!--                    --><?php
//                    while (have_posts()): the_post();
//                        get_template_part('content', 'excerpt');
//                    endwhile;
//                    ?>

                    <?php $counter = 0; ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php set_query_var('counter', $counter); ?>
                        <?php get_template_part('content', 'excerpt'); ?>
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                </div>
            </div>



        </div>

    </div>


</section> <!-- #contact-floor-2 -->
<?php get_footer() ?>
