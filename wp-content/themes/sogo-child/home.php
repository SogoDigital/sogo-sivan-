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
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <!-- CAT NAVIGATION -->
                        <ul class="plugin-nav"  >
                            <?php
                            wp_list_categories(array(
                                    'hide_empty' => 1,
                                    'current_category' => 0,
                                    'title_li' => '',
                                )
                            );
                            ?>
                        </ul>
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
                    <?php
                    while (have_posts()): the_post();
                        get_template_part('content', 'excerpt');
                    endwhile;

                    ?>
                </div>
            </div>



        </div>

    </div>


</section> <!-- #contact-floor-2 -->
<?php get_footer() ?>
