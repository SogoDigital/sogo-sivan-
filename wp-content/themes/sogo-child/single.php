<?php
if (is_attachment()) {
    wp_redirect(site_url('/'));
    exit;
}
// Template Name: single page ?>
<?php get_header();

the_post(); ?>

    <section id="single-floor-1" class="margin-top-75">
        <div class="single-floor-1-wrapper">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
<!--                    <div class="col-12 col-md-8 col-xl-8 col-lg-5">-->
                        <div class="single-article-wrapper">
    <!--                        <div class="white-box">-->
                                <article itemscope itemtype="http://schema.org/Periodical">
                                    <header>
                                        <div class="thumbnail-wrapper text-center">
    <!--                                        <img itemtype="http://schema.org/ImageObject" itemprop="image"-->
    <!--                                             src="--><?php //echo wp_get_attachment_url(get_post_thumbnail_id()) ?><!--"-->
    <!--                                             alt="--><?php //echo esc_attr(get_the_title()) ?><!--">-->
                                        </div>
                                        <h1 itemprop="headline" class="article text-center">
                                            <?php the_title() ?>
                                        </h1>
                                        <?php if(get_field('_sogo_single_subtitle')): ?>
                                            <h2 class="single-article-subtitle text-center">
                                                <?php echo get_field('_sogo_single_subtitle'); ?>
                                            </h2>
                                        <?php endif; ?>

                                    </header>
                                    <div class="publish-wrapper d-flex justify-content-center">
                                        <div class="d-flex align-items-center publish-wrapper-icon-author">
                                            <span class="publish-wrapper-icon"><?php echo do_shortcode('[avatar]'); ?></span>
                                            <span class="publish-wrapper-author"><?php echo get_the_author(); ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                        <span class="publish-wrapper-calendar">
                                            <img class="" src="<?php echo get_stylesheet_directory_uri() . '/images/calander.png' ?>">
                                        </span>
    <!--                                    <span class="">--><?php //the_date(get_option('date_format')) ?><!-- </span>-->
                                        <span class="publish-wrapper-date"><?php echo get_the_date('d/m/Y'); ?></span>
    <!--                                    <span class="" itemprop="author" itemscope-->
    <!--                                          itemtype="http://schema.org/LocalBusiness"> |     <span itemprop="name">--><?php //_e('By Sogo','sogoc')?><!--</span></span></span>-->
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img class="" itemtype="http://schema.org/ImageObject" itemprop="image"
                                             src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>"
                                             alt="<?php echo esc_attr(get_the_title()) ?>" style="border-radius: 16px">
                                    </div>
                                    <div class="entry-content" itemprop="mainEntityOfPage">
                                        <?php the_content() ?>
                                    </div>
                                    <div class="publish-wrapper">
                                        <?php $tags = get_the_tags(); ?>
                                        <?php if($tags): ?>
                                            <div class="tags">
                                                <p>תגיות:</p>
                                                <div class="d-flex flex-wrap">
                                                    <?php foreach ( $tags as $tag ) { ?>
                                                        <a class="tag-item d-block" href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag">
                                                            <?php echo $tag->name; ?>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
    <!--                                    <span class="publish-wrapper-category"> --><?php //echo sprintf(('%s'), get_the_category_list(' ')); ?><!--</span>-->
                                        <div class="mt-5">
                                            <p class="text-center"><?php echo get_field('_sogo_posts_share_title', 'option'); ?></p>
<!--                                            --><?php //echo sharethis_inline_buttons(); ?>
                                        </div>
                                    </div>


                                </article>
    <!--                        </div>-->
                        </div>
                    </div>
    <!--                <div class="col-lg-3 col-lg-push-1 col-md-4 hidden-sm">-->
    <!--                    <form id="search-bar" action="--><?php //echo site_url('/') ?><!--">-->
    <!--                        <span id="search-id" class='glyphicon glyphicon-search'></span>-->
    <!--                        <input id="s" name="s" type="text" placeholder="--><?php //_e('SEARCH IN BLOG', 'sogoc') ?><!--"/>-->
    <!--                        <input type="hidden" name="post_type" value="post">-->
    <!--                    </form>-->

                        <!--                    <h3 class="black bold widget-title">-->
                        <!--                        --><?php //_e('you may also like','sogoc') ?><!--:-->
                        <!--                    </h3>-->
    <!--                    --><?php //dynamic_sidebar('blog_sidebar'); ?>

    <!--                </div>-->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                <?php
                $related = get_posts(
                    array(
                        'category__in' => wp_get_post_categories( $post->ID ),
                        'numberposts'  => 3,
                        'post__not_in' => array( $post->ID )
                    )
                );
                ?>
                <section class="container-fluid pt-2 single-recent">
                    <div class="row justify-content-center">
                        <h2 class="single-recent-title col-12 text-center font-weight-bold uppercase">מאמרים נוספים שעשויים לעניין אותך</h2>
                        <div class="col-12 col-xl-8 position-relative mt-4">
                            <div class="container-fluid mb-0 mb-lg-4">
                                <div class="row related-posts">
                                    <?php if( $related ) :
                                        foreach( $related as $item ) :
                                            setup_postdata($item);
                                            set_query_var( 'post_id', $item->ID );
                                            get_template_part('content', 'excerpt');
                                        ?>
                                        <?php endforeach;
                                        wp_reset_postdata();
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
        </div>

    </section> <!-- #contact-floor-1 -->
<?php //include('js/social-share.php') ?>
<?php get_footer() ?>