<?php
$post_id = get_query_var('post_id') ?: get_the_ID();
$counter = (int) get_query_var('counter');
$delay   = ($counter % 4) * 200;

$thumb_id  = get_post_thumbnail_id($post_id);
$thumb_url = wp_get_attachment_url($thumb_id);
// Heavy animated GIFs: if a same-named .mp4/.webm (and optional -poster.jpg) sits next to the GIF, show a video instead
$videos = array();
$poster = '';
if ('image/gif' === get_post_mime_type($thumb_id)) {
    $gif_file = get_attached_file($thumb_id);
    $base_url = preg_replace('/\.gif$/i', '', $thumb_url);
    $base     = preg_replace('/\.gif$/i', '', $gif_file);
    foreach (array('webm' => 'video/webm', 'mp4' => 'video/mp4') as $ext => $type) {
        if (file_exists("$base.$ext")) {
            $videos[$type] = "$base_url.$ext?v=" . filemtime("$base.$ext");
        }
    }
    if (file_exists("$base-poster.jpg")) {
        $poster = "$base_url-poster.jpg?v=" . filemtime("$base-poster.jpg");
    }
}
?>
<div class="col-md-4 col-sm-6 col-lg-3 archive-project" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
    <div class="project-box zoom-in-effect">
        <div itemscope itemtype="http://schema.org/CreativeWork" class="thumbnail-wrapper img-box">
            <a itemprop="url" href="<?php the_permalink($post_id) ?>" title="<?php echo esc_attr(get_the_title($post_id)) ?>">
                <figure>
                    <?php if ($videos) : ?>
                        <video class="js-lazy-video" muted loop playsinline preload="none"
                               <?php if ($poster) : ?>poster="<?php echo esc_url($poster) ?>"<?php endif; ?>
                               aria-label="<?php echo esc_attr(get_the_title($post_id)) ?>">
                            <?php foreach ($videos as $type => $url) : ?>
                                <source src="<?php echo esc_url($url) ?>" type="<?php echo $type ?>">
                            <?php endforeach; ?>
                        </video>
                    <?php else : ?>
                        <?php // srcset + sizes: the grid shows ~256px on desktop, so the browser picks the 300w copy, not the original
                        echo wp_get_attachment_image($thumb_id, 'full', false, array(
                            'itemprop'      => 'image',
                            'loading'       => 'lazy',
                            'decoding'      => 'async',
                            'fetchpriority' => 'low',
                            'alt'           => get_the_title($post_id),
                            'sizes'         => '(min-width: 1200px) 260px, (min-width: 992px) 33vw, (min-width: 768px) 50vw, 100vw',
                        )); ?>
                    <?php endif; ?>
                </figure>
            </a>
        </div>
    </div>
    <div class="project-title">
        <span itemprop="name"><?php echo esc_attr(get_the_title($post_id)) ?></span>
    </div>
    <div class="project-small-title text-right">
        <span itemprop="sub_title"><?php echo get_field('sogo_subtitle_main_page', $post_id) ?></span>
    </div>
</div>