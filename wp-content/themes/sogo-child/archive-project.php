<?php // Template Name: projects page ?>
<?php get_header() ?>

<section id="projects-floor-1" class="section">
    <div class="container-fluid">
        <div class="row">
            <div itemscope itemtype="https://schema.org/WebPage" class="col-md-8 col-md-offset-2 text-center">
                <header class="page-header">
                    <h1 itemprop="headline"
                        class="page-title margin-top-250"><?php echo sogo_option('projects_title') ?></h1>
                    <p itemprop="description"
                       class="page-sub-title"><?php echo nl2br(sogo_option('projects_text')) ?> </p>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #contact-floor-1 -->
<section id="projects-floor-2" class="section bg-light-gray">
    <div class="container-fluid">
        <div class="project_cat_filter">
            <ul class="tab-list px-1">

                <li class="in pl-2">
                    <a class="selectProjectType" href="<?php echo get_post_type_archive_link('project') ?>">
                        <span class="px-2 p font-weight-bold pb-1">כל הפרויקטים</span>
                    </a>
                </li>
                <?php
                $terms = get_terms(array('taxonomy' => 'project-cat'));
                $current_term = is_tax() ? get_queried_object()->term_id : false;

                foreach ($terms as $term) : ?>
                    <li class="pl-2">
                        <a class="selectProjectType <?php echo $current_term === $term->term_id ? 'active' : '' ?>"
                           href="<?php echo get_term_link($term) ?>">
                            <span class="px-2 p font-weight-bold pb-1"><?php echo $term->name; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="row">
            <?php while (have_posts()): the_post(); ?>
                <div class="col-md-4 col-sm-6 col-lg-4">
                    <div class="project-box zoom-in-effect">
                        <div itemscope itemtype="http://schema.org/CreativeWork" class="thumbnail-wrapper img-box">

                            <a itemprop="url" href="<?php the_permalink() ?>"
                               title="<?php echo esc_attr(get_the_title()) ?>">
                                <div class="show-on-hover">
                                    <span itemprop="name"> <?php _e('view a project', 'sogoc') ?></span>
                                </div>
                            </a>

                            <figure>
                                <img itemprop="image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>"
                                     alt="<?php echo esc_attr(get_the_title()) ?>">
                                <div class="project-small-title text-right">
                                    <span itemprop="sub_title"><?php echo get_field('sogo_subtitle_main_page'); ?></span>
                                </div>
                                <div class="project-title text-right">
                                    <span itemprop="name"><?php the_title() ?></span>
                                </div>
                            </figure>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!--        <div class="row">-->
        <!--            --><?php //while (have_posts()): the_post(); ?>
        <!--                <div class="col-md-4 col-sm-6 col-lg-3">-->
        <!--                    <div class="project-box zoom-in-effect">-->
        <!--                        <div  itemscope itemtype="http://schema.org/CreativeWork"  class="thumbnail-wrapper img-box">-->
        <!--                            -->
        <!--                            <a itemprop="url" href="--><?php //the_permalink() ?><!--"-->
        <!--                               title="--><?php //echo esc_attr(get_the_title()) ?><!--">-->
        <!--                                <div class="show-on-hover">-->
        <!--                                    <span itemprop="name"> -->
        <?php //_e('view a project', 'sogoc') ?><!--</span>-->
        <!--                                </div>-->
        <!--                            </a>-->
        <!--                            -->
        <!--                            <figure>-->
        <!--                                <img itemprop="image" src="-->
        <?php //echo wp_get_attachment_url(get_post_thumbnail_id()) ?><!--" alt="-->
        <?php //echo esc_attr(get_the_title())?><!--">-->
        <!--                                <div class="project-small-title text-right">-->
        <!--                                    <span itemprop="sub_title">-->
        <?php //echo get_field('sogo_subtitle_main_page'); ?><!--</span>-->
        <!--                                </div>-->
        <!--                                <div class="project-title text-right">-->
        <!--                                    <span itemprop="name">--><?php //the_title() ?><!--</span>-->
        <!--                                </div>-->
        <!--                            </figure>-->
        <!---->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            --><?php //endwhile; ?>
        <!--        </div>-->
    </div>
</section> <!-- #contact-floor-2 -->


<!--    <footer id="customers-logos" class="section fp-auto-height">-->
<!--        <ul class="flex-slider">-->
<!--            --><?php
//            $logos = sogo_option('customers_logos');
//            if ($logos) {
//                foreach ($logos as $id => $logo) {
//                    echo "<li>";
//                    sogo_print_image($id, $logo);
//                    echo "</li>";
//                }
//            }
//            ?>
<!--        </ul>-->
<!--    </footer>-->


<?php get_footer() ?>
