<?php // Template Name: projects page ?>
<?php get_header() ?>

<section id="projects-floor-1" class="section">
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex align-items-center">
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


        <select name="post-category-select" id="post-category-select" class="text-center">

            <?php $current_all = is_home() ? 'current-item' : ''; ?>

            <option class="<?php echo $current_all; ?> text-center text-p no-wrap ml-2 mb-2 mb-lg-0"
                    value="<?php echo get_post_type_archive_link( 'post' ); ?>">
                <p>כל הפרויקטים</p>
            </option>

            <?php
            foreach ( $terms as $term ) :
                $current   = get_queried_object_id() == $term->term_id ? 'selected' : '';
                printf(
                    '<option %s class="blog-cat mb-2 mb-md-0 px-4 py-1 mx-1" value="%s">%s</option>',

                    $current,
                    esc_url( get_term_link( $term ) ),
                    esc_html( $term->name )
                );
            endforeach;
            ?>
        </select>

        <div class="row projects_grid_con">
            <div class="col-md-11">
                <div class="row d-flex archive-projects">
                <?php while (have_posts()): the_post(); ?>
                    <?php echo get_template_part('template-arcive-project'); ?>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
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
