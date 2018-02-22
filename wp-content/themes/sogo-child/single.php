<?php
if (is_attachment()) {
    wp_redirect(site_url('/'));
    exit;
}
// Template Name: single page ?>
<?php get_header();

the_post(); ?>

    <section id="single-floor-1" class="blog-gray margin-top-75">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-lg-push-1 col-md-8">
                    <div class="single-article-wrapper">
                        <div class="white-box">
                            <article itemscope itemtype="http://schema.org/Periodical">
                                <header>
                                    <div class="thumbnail-wrapper text-center">
                                        <img itemtype="http://schema.org/ImageObject" itemprop="image"
                                             src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>"
                                             alt="<?php echo esc_attr(get_the_title()) ?>">
                                    </div>
                                    <h1 itemprop="headline" class="article">
                                        <?php the_title() ?>
                                    </h1>
                                </header>
                                <div class="publish-wrapper bg-green">
                                    <span
                                            class="bold color-white"> <?php echo sprintf(__('Publish in: %s', 'sogoc'), get_the_category_list(',')); ?></span>
                                    <span class="color-white"> | <?php the_date(get_option('date_format')) ?> </span>
                                    <span class="bold color-white" itemprop="author" itemscope
                                          itemtype="http://schema.org/LocalBusiness"> |     <span itemprop="name"><?php _e('By Sogo','sogoc')?></span></span></span>

                                    <div class="socials-share inline-block float-right color-white">
                                        <span class="inline-block"><?php _e('share', 'sogoc') ?>:</span>
                                        <a href="<?php the_permalink() ?>"
                                           class="color-white facebook-share"><span class="inline-block"><i
                                                        class="fa fa-facebook"></i>  </span></a>|
                                        <a href="https://twitter.com/share" class="color-white"><span
                                                    class="inline-block"><i
                                                        class="fa fa-twitter witter-share-button"></i> </span></a>|

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&summary=<?php echo esc_url(get_the_title()) ?>&source=LinkedIn"
                                           class="color-white">
                                            <span class="inline-block"><i
                                                        class="fa fa-linkedin"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content" itemprop="mainEntityOfPage">
                                    <?php the_content() ?>
                                </div>
                                <div class=" text-center">
                                    <a class="btn-link margin"
                                       href="<?php echo get_permalink(get_option('page_for_posts')) ?>">
                                        <?php _e('back to articles', 'sogoc') ?>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-push-1 col-md-4 hidden-sm">
                    <form id="search-bar" action="<?php echo site_url('/') ?>">
                        <span id="search-id" class='glyphicon glyphicon-search'></span>
                        <input id="s" name="s" type="text" placeholder="<?php _e('SEARCH IN BLOG', 'sogoc') ?>"/>
                        <input type="hidden" name="post_type" value="post">
                    </form>

                    <!--                    <h3 class="black bold widget-title">-->
                    <!--                        --><?php //_e('you may also like','sogoc') ?><!--:-->
                    <!--                    </h3>-->
                    <?php dynamic_sidebar('blog_sidebar'); ?>

                </div>
            </div>
        </div>
    </section> <!-- #contact-floor-1 -->
<?php include('js/social-share.php') ?>
<?php get_footer() ?>