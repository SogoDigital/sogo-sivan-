<?php  get_header(); the_post();  ?>

    <section id="single-floor-1" class="blog-gray margin-top-75">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-md-push-1">
                    <div class="single-article-wrapper">
                        <div class="plugin-box">
                            <article>
                                <header>
                                <div class="thumbnail-wrapper text-center">
                                   <?php the_post_thumbnail('full')?>
                                </div>
                                <h1 class="article color-white">
                                  <?php the_title() ?>
                                </h1>
                                </header>
                                <div class="publish-wrapper bg-green">
                                    <span class="bold color-white"> <?php echo sprintf(__('Publish in: %s'), get_the_category_list(',')); ?></span>
                                    <span class="color-white"> | <?php  the_date(get_option('date_format'))?> </span>
                                    <div class="socials-share inline-block float-right color-white">
                                        <span class="inline-block">share(todo):</span>
                                        <a href="#" class="color-white"><span class="inline-block"><i class="fa fa-facebook"></i> | </span></a>
                                        <a href="#" class="color-white"><span class="inline-block"><i class="fa fa-twitter"></i> | </span></a>
                                        <a href="#" class="color-white"><span class="inline-block"><i class="fa fa-linkedin"></i></span></a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                   <?php the_content()?>
                                </div>
                                <div class="text-center">
                                    <a class="classic-btn margin-30" href="<?php get_permalink(get_option('page_for_posts'))?>"><?php _e('back to articles','sogoc')?></a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-push-1">
                    <form id="search-bar" action="<?php echo site_url('/') ?>">
                        <span id="search-id" class='glyphicon glyphicon-search'></span>
                        <input id="s" name="s" type="text" placeholder="<?php _e('SEARCH IN BLOG', 'sogoc') ?>"/>
                        <input type="hidden" name="post_type" value="post">
                    </form>
                    <h3 class="black bold">
                        you may also like (todo):
                    </h3>
                    <div class="plugin-box">
                        <a href="<?php the_permalink()?>">
                            <div class="thumbnail-wrapper">
                                <img src="http://dev.sogo.co.il/sogo-new/wp-content/themes/sogo-child/images/plugin-img-1.jpg">
                            </div>
                        </a>

                        <div class="publish-wrapper">
                            <span class="float-left">Published in: Design</span>
                            <span class="float-right">October 22, 2015 </span>
                        </div>
                        <a href="<?php the_permalink()?>">
                            <div class="plugin-title dukim-green text-center">
                                <span>WHAT’S ON YOUR BOOKSHELF?</span>
                            </div>
                        </a>
                        <div class="plugin-description text-center">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur vestibulum quam
                                non lacinia.
                            </p>
                        </div>
                    </div>
                    <div class="plugin-box">
                        <a href="<?php the_permalink()?>">
                            <div class="thumbnail-wrapper">
                                <img src="http://dev.sogo.co.il/sogo-new/wp-content/themes/sogo-child/images/plugin-img-1.jpg">
                            </div>
                        </a>

                        <div class="publish-wrapper">
                            <span class="float-left">Published in: Design</span>
                            <span class="float-right">October 22, 2015 </span>
                        </div>
                        <a href="<?php the_permalink()?>">
                            <div class="plugin-title dukim-green text-center">
                                <span>WHAT’S ON YOUR BOOKSHELF?</span>
                            </div>
                        </a>
                        <div class="plugin-description text-center">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur vestibulum quam
                                non lacinia.
                            </p>
                        </div>
                    </div>
                    <div class="plugin-box">
                        <a href="<?php the_permalink()?>">
                            <div class="thumbnail-wrapper">
                                <img src="http://dev.sogo.co.il/sogo-new/wp-content/themes/sogo-child/images/plugin-img-1.jpg">
                            </div>
                        </a>

                        <div class="publish-wrapper">
                            <span class="float-left">Published in: Design</span>
                            <span class="float-right">October 22, 2015 </span>
                        </div>
                        <a href="<?php the_permalink()?>">
                            <div class="plugin-title dukim-green text-center">
                                <span>WHAT’S ON YOUR BOOKSHELF?</span>
                            </div>
                        </a>
                        <div class="plugin-description text-center">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur vestibulum quam
                                non lacinia.
                            </p>
                        </div>
                    </div>
                    <div class="plugin-box">
                        <a href="<?php the_permalink()?>">
                            <div class="thumbnail-wrapper">
                                <img src="http://dev.sogo.co.il/sogo-new/wp-content/themes/sogo-child/images/plugin-img-1.jpg">
                            </div>
                        </a>

                        <div class="publish-wrapper">
                            <span class="float-left">Published in: Design</span>
                            <span class="float-right">October 22, 2015 </span>
                        </div>
                        <a href="<?php the_permalink()?>">
                            <div class="plugin-title dukim-green text-center">
                                <span>WHAT’S ON YOUR BOOKSHELF?</span>
                            </div>
                        </a>
                        <div class="plugin-description text-center">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur vestibulum quam
                                non lacinia.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> <!-- #contact-floor-1 -->
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