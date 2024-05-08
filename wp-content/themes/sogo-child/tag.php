<?php
$blog_page_id = get_option('page_for_posts');
$blog_page = get_post($blog_page_id);
?>
<?php get_header() ?>

<section id="" class="cover" style="background-image: url('<?php echo get_field('_sogo_tag_bg_banner', 'option') ?>'); padding: 200px 0 100px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <header class="page-header">
                    <h1 class="page-title color-white"><?php echo get_field('_sogo_tag_title', 'option') ?></h1>

                    <h2 class="page-sub-title color-white "><?php echo get_field('_sogo_tag_subtitle', 'option') ?></h2>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #contact-floor-1 -->

<section id="tag-floor-2" class="" style="background-color: #f1f1f1">
    <div class="container-fluid">
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
