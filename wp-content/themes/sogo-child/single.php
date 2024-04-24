<?php
if (is_attachment()) {
    wp_redirect(site_url('/'));
    exit;
}
// Template Name: single page ?>
<?php get_header();

the_post(); ?>

    <section id="single-floor-1" class="margin-top-75">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="single-article-wrapper">
<!--                        <div class="white-box">-->
                            <article itemscope itemtype="http://schema.org/Periodical">
                                <header>
                                    <div class="thumbnail-wrapper text-center">
                                        <img itemtype="http://schema.org/ImageObject" itemprop="image"
                                             src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>"
                                             alt="<?php echo esc_attr(get_the_title()) ?>">
                                    </div>
                                    <h1 itemprop="headline" class="article text-center">
                                        <?php the_title() ?>
                                    </h1>
                                </header>
                                <div class="publish-wrapper">
                                    <span class=""><?php the_date(get_option('date_format')) ?> </span>
                                    <span class="" itemprop="author" itemscope
                                          itemtype="http://schema.org/LocalBusiness"> |     <span itemprop="name"><?php _e('By Sogo','sogoc')?></span></span></span>


                                </div>
                                <div class="entry-content" itemprop="mainEntityOfPage">
                                    <?php the_content() ?>
                                </div>
                                <div class="publish-wrapper">
                                    <span class="publish-wrapper-category"> <?php echo sprintf(('%s'), get_the_category_list(' ')); ?></span>

                                    <div class="socials-share inline-block float-right">
<!--                                        <span class="inline-block">--><?php //_e('share', 'sogoc') ?><!--:</span>-->
                                        <a href="<?php the_permalink() ?>"
                                           class=" facebook-share"><span class="inline-block"><i
                                                        class="fa fa-facebook"></i>  </span></a>
                                        <a href="https://twitter.com/share" class=""><span
                                                    class="inline-block"><i
                                                        class="fa fa-twitter witter-share-button"></i> </span></a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&summary=<?php echo esc_url(get_the_title()) ?>&source=LinkedIn"
                                           class="">
                                            <span class="inline-block"><i
                                                        class="fa fa-linkedin"></i></span>
                                        </a>
                                    </div>
                                </div>
<!--                                <div class=" text-center">-->
<!--                                    <a class="btn-link margin"-->
<!--                                       href="--><?php //echo get_permalink(get_option('page_for_posts')) ?><!--">-->
<!--                                        --><?php //_e('back to articles', 'sogoc') ?>
<!--                                    </a>-->
<!--                                </div>-->
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
                        <!--                --><?php //var_dump($related) ?>
                        <div class="col-12 col-xl-8 position-relative mt-4">
                            <div class="container-fluid mb-0 mb-lg-4">
                                <div class="row related-posts">
                                    <?php if( $related ) :
                                        foreach( $related as $item ) :
                                            setup_postdata($item);?>
                                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                                <a class="d-block related-item" href="<?php echo get_permalink($item->ID)?>">
                                                    <?php echo get_the_post_thumbnail($item->ID, 'full', array('class'=> 'img-fluid p-0')) ; ?>
                                                    <span class="related-title"><?php echo get_the_title($item->ID); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach;
                                        wp_reset_postdata();
                                    endif; ?>
                                </div>
                                <!--                        <div class="row">-->
                                <!--                            --><?php //yarpp_related(); ?>
                                <!--                        </div>-->
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