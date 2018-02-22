
<?php

/**
 * Created by PhpStorm.
 * User: oren
 * Date: 11/30/2015
 * Time: 6:32 PM
 */ ?>
<div class="col-md-4 col-sm-6 col-lg-3">
    <div class="plugin-box">
        <div itemscope itemtype="http://schema.org/CreativeWork" class="thumbnail-wrapper">
            <a href="<?php the_permalink()?>" title="<?php echo esc_attr(get_the_title())?>">
                <img itemprop="image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php echo esc_attr(get_the_title())?>">
            </a>
        </div>
        <div class="publish-wrapper">
            <span class="float-left">
                <span itemprop="author" class="">
                    <?php
                    $tax = get_post_type() == 'post'? 'category': 'plugin-cat';
                    echo sprintf(__('Publish in: %s','sogoc'),get_the_term_list( get_the_ID(), $tax, null,',' )); ?></span>
            </span>
            <span itemprop="datePublished" content="<?php the_time(get_option('date_format')) ?>" class="float-right"><?php the_time(get_option('date_format')) ?> </span>
        </div>
        <div class="plugin-title red text-center">
            <a href="<?php the_permalink()?>" title="<?php echo esc_attr(get_the_title())?>"><span><?php the_title() ?></span></a>
        </div>
<!--        <div class="plugin-description text-center">-->
<!--            <p>-->
<!--                --><?php //the_excerpt() ?>
<!--            </p>-->
<!--        </div>-->
    </div>
</div>