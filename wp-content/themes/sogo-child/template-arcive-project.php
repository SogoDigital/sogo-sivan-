<?php $post_id = get_query_var('post_id') ?>
<div class="col-md-4 col-sm-6 col-lg-3 archive-project">
    <div class="project-box zoom-in-effect">
        <div itemscope itemtype="http://schema.org/CreativeWork" class="thumbnail-wrapper img-box">
            <a itemprop="url" href="<?php the_permalink($post_id) ?>" title="<?php echo esc_attr(get_the_title($post_id)) ?>">
                <figure>
                    <img itemprop="image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)) ?>"
                         alt="<?php echo esc_attr(get_the_title($post_id)) ?>">
                </figure>
            </a>
        </div>
    </div>
    <div class="project-title">
        <span itemprop="name"><?php echo esc_attr(get_the_title($post_id)) ?></span>
    </div>
    <div class="project-small-title text-right">
        <span itemprop="sub_title"><?php echo get_field('sogo_subtitle_main_page') ?></span>
    </div>
</div>