
<?php

/**
 * Created by PhpStorm.
 * User: oren
 * Date: 11/30/2015
 * Time: 6:32 PM
 */ ?>
<?php $post_id = get_query_var('post_id') ?>
<div class="col-12 col-sm-6 col-md-6 col-lg-3" style="margin-bottom: 30px">
    <div class="plugin-box">
        <div itemscope itemtype="http://schema.org/CreativeWork" class="thumbnail-wrapper">
            <a href="<?php the_permalink($post_id)?>" title="<?php echo esc_attr(get_the_title($post_id))?>">
                <img itemprop="image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)) ?>" alt="<?php echo esc_attr(get_the_title($post_id))?>">
            </a>
        </div>
        <div class="publish-wrapper">
            <div itemprop="datePublished" class="publish-wrapper-date">
                <span>פורסם בתאריך: <?php echo get_the_date('d/m/Y', $post_id); ?></span>
            </div>

            <div class="">
                <span itemprop="author" class="">
                    <?php
                    $tax = get_post_type() == 'post'? 'category': 'plugin-cat';
                    echo sprintf(__('קטגוריות: %s'),get_the_term_list( $post_id, $tax, null,', ' )); ?></span>
            </div>
<!--            <span itemprop="datePublished" content="--><?php //the_time(get_option('date_format')) ?><!--" class="float-right">-->
<!--                --><?php //the_time(get_option('date_format')) ?>
<!--            </span>-->
        </div>
        <div class="plugin-title red text-center">
            <a href="<?php the_permalink($post_id)?>" title="<?php echo esc_attr(get_the_title($post_id))?>"><span><?php echo get_the_title($post_id) ?></span></a>
        </div>
<!--        <div class="plugin-description text-center">-->
<!--            <p>-->
<!--                --><?php //the_excerpt() ?>
<!--            </p>-->
<!--        </div>-->
    </div>
</div>