<?php // Template Name: plugins page ?>
<?php get_header() ?>
<section id="plugins-floor-1" class="cover">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <header class="page-header">
                    <h1 class="page-title color-white"><?php echo sogo_option('plugins_title')?></h1>
                    <h3 class="page-sub-title color-white"><?php echo sogo_option('plugins_text')?></h3>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #contact-floor-1 -->

<section id="plugins-floor-2" class="bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <!-- CAT NAVIGATION -->
                <ul class="plugin-nav"  >
                    <?php
                    wp_list_categories(array(
                            'hide_empty' => 1,
                            'current_category' => 0,
                            'title_li' => '',
                            'taxonomy' => 'plugin-cat'
                        )

                    );
                    ?>
                </ul>
                <!-- CAT CONTENT -->
            </div>
            <div class="col-md-3">
                <form id="search-bar" action="<?php echo site_url('/') ?>">
                    <span id="search-id" class='glyphicon glyphicon-search'></span>
                    <input id="s" name="s" type="text" placeholder="<?php _e('SEARCH IN PLUGINS', 'sogoc') ?>"/>
                    <input name="post_type" type="hidden" value="plugin"  />
                </form>
            </div>
        </div>
        <div class="row">
            <?php while (have_posts()): the_post();
                get_template_part('content', 'excerpt');
            endwhile; ?>
        </div>

    </div>
</section> <!-- #contact-floor-2 -->


<!--<footer id="customers-logos" class="">-->
<!--    <ul class="flex-slider">-->
<!--        --><?php
//        $logos = sogo_meta('customers_logos');
//        if ($logos) {
//            foreach ($logos as $id => $logo) {
//                echo "<li>";
//                sogo_print_image($id, $logo);
//                echo "</li>";
//            }
//        }
//        ?>
<!--    </ul>-->
<!--</footer>-->




<?php get_footer() ?>
