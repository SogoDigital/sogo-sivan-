<?php
/**
 * דף הבית: פתיחה (סליידר וידאו/תמונה), אודות, שירותים, לקוחות, שאלות נפוצות, תוכן חופשי.
 * כל הטקסטים והתמונות נערכים ב"דף הבית" (לשוניות ACF) בלוח הבקרה.
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();

/* ---------- ערכי ברירת מחדל, כדי שהעמוד יהיה מלא גם לפני שמילאו שדות ---------- */
$default_services = [
    ['title' => 'בניית אתרים',  'color' => 'red'],
    ['title' => 'עיצוב UX/UI',  'color' => 'green'],
    ['title' => 'קידום ממומן',  'color' => 'yellow'],
    ['title' => 'קידום אורגני', 'color' => 'magenta'],
    ['title' => 'מיתוג',        'color' => 'blue'],
];

$kicker       = sogo26_field('hero_kicker', 'סוכנות דיגיטל');
$scroll_text  = sogo26_field('hero_scroll_text', 'גללו למטה');
$slides       = array_values(array_filter((array) sogo26_field('hero_slides', []), function ($s) {
    return !empty($s['image']['url']) || !empty($s['video']);
}));
$seconds      = max(3, (int) sogo26_field('hero_seconds', 7));
$logo_raw     = function_exists('get_field') ? get_field('hero_show_logo') : null;
$show_logo    = ($logo_raw === null) ? true : (bool) $logo_raw;

$about_label  = sogo26_field('about_label', 'סוכנות דיגיטל לבניית אתרים, קמפיינים ומיתוג');
$about_text   = sogo26_field('about_text', 'שלום, *אנחנו סוגו.* אנחנו בונים אתרים, מנהלים קמפיינים ויוצרים מותגים שאי אפשר להתעלם מהם.');

$svc_title    = sogo26_field('services_title', "אנחנו יוצרים אתרים וקמפיינים\nשקשה להתעלם מהם.");
$svc_image    = sogo26_field('services_image');
$svc_items    = sogo26_field('services_items', $default_services);

$clients_title = sogo26_field('clients_title', 'עם מי אנחנו עובדים?');
$clients       = array_values(array_filter((array) sogo26_field('clients_logos', []), function ($c) {
    return !empty($c['logo']['url']);
}));

$faq_title   = sogo26_field('faq_title', 'שאלות נפוצות');
$faq_items   = array_values(array_filter((array) sogo26_field('faq_items', []), function ($f) {
    return !empty($f['question']) && !empty($f['answer']);
}));
$editor_title   = sogo26_field('editor_title');
$editor_content = sogo26_field('editor_content');

$arrow = '<svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M17 7 7 17M16 7H7v9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>

<!-- ============ פתיחה (סליידר וידאו / תמונה במסך מלא) ============ -->
<section class="hero hero--dark<?php echo $slides ? ' hero--slides' : ''; ?>" data-hero data-dark data-seconds="<?php echo esc_attr($seconds); ?>">
    <div class="hero__media" aria-hidden="true">
        <?php if ($slides) : foreach ($slides as $i => $s) :
            $is_video = (($s['type'] ?? 'image') === 'video') && !empty($s['video']);
            $img      = $s['image']['url'] ?? '';
            $img_m    = $s['image_mobile']['url'] ?? '';
            ?>
            <div class="hero__slide<?php echo $i === 0 ? ' is-active' : ''; ?>" data-slide>
                <?php if ($is_video) : ?>
                    <video class="hero__video" muted loop playsinline preload="<?php echo $i === 0 ? 'auto' : 'metadata'; ?>" disablepictureinpicture<?php echo $img ? ' poster="' . esc_url($img) . '"' : ''; ?>>
                        <source src="<?php echo esc_url($s['video']); ?>">
                    </video>
                <?php elseif ($img) : ?>
                    <picture>
                        <?php if ($img_m) : ?><source media="(max-width: 700px)" srcset="<?php echo esc_url($img_m); ?>"><?php endif; ?>
                        <img class="hero__img" src="<?php echo esc_url($img); ?>" alt="" <?php echo $i === 0 ? '' : 'loading="lazy"'; ?>>
                    </picture>
                <?php endif; ?>
            </div>
        <?php endforeach; else : ?>
            <!-- רקע זז זמני עד שמוסיפים שקופיות באזור הפתיחה -->
            <div class="hero__ambient"><i></i><i></i><i></i><i></i><i></i></div>
        <?php endif; ?>
        <div class="hero__shade"></div>
    </div>

    <div class="hero__inner" data-hero-inner>
        <p class="hero__kicker"><?php echo esc_html($kicker); ?></p>
        <?php if ($show_logo || !$slides) : ?>
            <h1 class="hero__logo<?php echo $slides ? ' hero__logo--small' : ''; ?>" aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'סוגו'); ?>">
                <?php echo sogo26_logo_svg(false); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </h1>
        <?php endif; ?>
        <?php if ($slides) : ?>
            <div class="hero__captions">
                <?php foreach ($slides as $i => $s) :
                    if (empty($s['title']) && empty($s['subtitle']) && empty($s['button_text'])) { echo '<div class="hero__caption' . ($i === 0 ? ' is-active' : '') . '" data-caption></div>'; continue; }
                    ?>
                    <div class="hero__caption<?php echo $i === 0 ? ' is-active' : ''; ?>" data-caption>
                        <?php if (!empty($s['title'])) : ?>
                            <?php echo $show_logo ? '<p' : '<h2'; ?> class="hero__title"><?php echo esc_html($s['title']); ?><?php echo $show_logo ? '</p>' : '</h2>'; ?>
                        <?php endif; ?>
                        <?php if (!empty($s['subtitle'])) : ?><p class="hero__sub"><?php echo esc_html($s['subtitle']); ?></p><?php endif; ?>
                        <?php if (!empty($s['button_text']) && !empty($s['button_link'])) : ?>
                            <a class="btn" href="<?php echo esc_url($s['button_link']); ?>"><?php echo esc_html($s['button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (count($slides) > 1) : ?>
        <div class="hero__dots" role="group" aria-label="בחירת שקופית">
            <?php foreach ($slides as $i => $s) : ?>
                <button type="button" class="hero__dot<?php echo $i === 0 ? ' is-active' : ''; ?>" data-dot="<?php echo (int) $i; ?>" aria-label="שקופית <?php echo (int) $i + 1; ?>"></button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <p class="hero__scroll" aria-hidden="true">
        <span><?php echo esc_html($scroll_text); ?></span>
        <i></i>
    </p>
</section>

<!-- ============ אודות: משפט שנחשף בגלילה ============ -->
<section class="about" data-about>
    <div class="about__sticky">
        <p class="about__label"><?php echo esc_html($about_label); ?></p>
        <p class="about__text" data-words aria-label="<?php echo esc_attr(str_replace('*', '', $about_text)); ?>">
            <?php echo sogo26_reveal_words($about_text); // phpcs:ignore WordPress.Security.EscapeOutput ?>
        </p>
    </div>
</section>

<!-- ============ שירותים ============ -->
<section class="services" data-services>
    <div class="services__bg" aria-hidden="true">
        <i class="orb orb--red"></i><i class="orb orb--green"></i><i class="orb orb--yellow"></i>
    </div>
    <div class="services__pin">
        <div class="services__media">
            <?php if (!empty($svc_image['url'])) : ?>
                <img src="<?php echo esc_url($svc_image['url']); ?>" alt="<?php echo esc_attr($svc_image['alt'] ?? ''); ?>" loading="lazy">
            <?php else : ?>
                <div class="services__placeholder" aria-hidden="true">
                    <i class="big-dot big-dot--red"></i><i class="big-dot big-dot--green"></i>
                </div>
            <?php endif; ?>
        </div>

        <div class="services__content">
            <h2 class="services__title"><?php echo nl2br(esc_html($svc_title)); ?></h2>

            <div class="services__viewport">
                <div class="services__track" data-track>
                    <?php foreach ((array) $svc_items as $item) :
                        $color = !empty($item['color']) ? $item['color'] : 'red';
                        $link  = !empty($item['link']) ? $item['link'] : '';
                        $image = $item['image']['url'] ?? '';
                        $tag   = $link ? 'a' : 'div';
                        ?>
                        <<?php echo $tag; ?> class="svc-card svc-card--<?php echo esc_attr($color); ?><?php echo $image ? ' svc-card--img' : ' svc-card--noimg'; ?>"<?php echo $link ? ' href="' . esc_url($link) . '"' : ''; ?>>
                            <?php if ($image) : ?>
                                <img class="svc-card__img" src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
                                <span class="svc-card__shade" aria-hidden="true"></span>
                            <?php else : ?>
                                <i class="svc-card__dot" aria-hidden="true"></i>
                            <?php endif; ?>
                            <span class="svc-card__title"><?php echo esc_html($item['title'] ?? ''); ?></span>
                            <?php if ($link) : ?><span class="svc-card__arrow" aria-hidden="true"><?php echo $arrow; // phpcs:ignore ?></span><?php endif; ?>
                        </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="services__progress" aria-hidden="true"><span data-progress></span></div>
        </div>
    </div>
</section>

<!-- ============ לקוחות ============ -->
<section class="clients" data-clients>
    <div class="clients__inner">
        <h2 class="clients__title"><?php echo esc_html($clients_title); ?></h2>
        <ul class="clients__grid">
            <?php if ($clients) : foreach ($clients as $c) :
                $img = '<img src="' . esc_url($c['logo']['sizes']['medium'] ?? $c['logo']['url']) . '" alt="' . esc_attr($c['name'] ?: ($c['logo']['alt'] ?? '')) . '" loading="lazy">';
                ?>
                <li class="clients__item">
                    <?php echo !empty($c['link']) ? '<a href="' . esc_url($c['link']) . '" target="_blank" rel="noopener">' . $img . '</a>' : $img; // phpcs:ignore ?>
                </li>
            <?php endforeach; else : for ($i = 0; $i < 8; $i++) : ?>
                <li class="clients__item clients__item--placeholder" aria-hidden="true"><span>לוגו לקוח</span></li>
            <?php endfor; endif; ?>
        </ul>
    </div>
</section>

<?php if ($faq_items) : ?>
<!-- ============ שאלות נפוצות ============ -->
<section class="faq" data-faq>
    <div class="faq__inner">
        <h2 class="faq__title"><?php echo esc_html($faq_title); ?></h2>
        <div class="faq__list">
            <?php foreach ($faq_items as $f) : ?>
                <details class="faq__item">
                    <summary><span><?php echo esc_html($f['question']); ?></span><i aria-hidden="true"></i></summary>
                    <div class="faq__a"><?php echo nl2br(esc_html($f['answer'])); ?></div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
    <script type="application/ld+json"><?php
        echo wp_json_encode([
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(function ($f) {
                return ['@type' => 'Question', 'name' => wp_strip_all_tags($f['question']), 'acceptedAnswer' => ['@type' => 'Answer', 'text' => wp_strip_all_tags($f['answer'])]];
            }, $faq_items),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // phpcs:ignore
    ?></script>
</section>
<?php endif; ?>

<?php if ($editor_content) : ?>
<!-- ============ תוכן חופשי ============ -->
<section class="free-content">
    <div class="free-content__inner">
        <?php if ($editor_title) : ?><h2 class="free-content__title"><?php echo esc_html($editor_title); ?></h2><?php endif; ?>
        <div class="entry__content"><?php echo apply_filters('the_content', $editor_content); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
    </div>
</section>
<?php endif; ?>

<?php
get_footer();
