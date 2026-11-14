<?php
/**
 * דף הבית: פתיחה, אודות, שירותים, לקוחות.
 * כל הטקסטים והתמונות נערכים ב"דף הבית" (שדות ACF) בלוח הבקרה.
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();

/* ---------- ערכי ברירת מחדל, כדי שהעמוד יהיה מלא גם לפני שמילאו שדות ---------- */
$default_services = [
    ['title' => 'בניית אתרים',  'text' => 'אתרים מהירים, מותאמים לנייד וקלים לעריכה.',         'color' => 'red'],
    ['title' => 'עיצוב UX/UI',  'text' => 'ממשקים ברורים שמובילים את הגולש לפעולה.',           'color' => 'green'],
    ['title' => 'קידום ממומן',  'text' => 'קמפיינים בגוגל ובמטא שנמדדים עד הליד.',            'color' => 'yellow'],
    ['title' => 'קידום אורגני', 'text' => 'SEO ותוכן שמביאים תנועה איכותית לאורך זמן.',        'color' => 'magenta'],
    ['title' => 'מיתוג',        'text' => 'זהות חזותית אחידה בכל נקודת מגע עם הלקוח.',         'color' => 'blue'],
];

$kicker       = sogo26_field('hero_kicker', 'סוכנות דיגיטל');
$hero_video   = sogo26_field('hero_video');
$hero_poster  = sogo26_field('hero_poster');
$scroll_text  = sogo26_field('hero_scroll_text', 'גללו למטה');

$about_label  = sogo26_field('about_label', 'סוכנות דיגיטל לבניית אתרים, קמפיינים ומיתוג');
$about_text   = sogo26_field('about_text', 'שלום, *אנחנו סוגו.* אנחנו בונים אתרים, מנהלים קמפיינים ויוצרים מותגים שאי אפשר להתעלם מהם.');

$svc_title    = sogo26_field('services_title', "אנחנו יוצרים אתרים וקמפיינים\nשקשה להתעלם מהם.");
$svc_image    = sogo26_field('services_image');
$svc_items    = sogo26_field('services_items', $default_services);

$clients_title = sogo26_field('clients_title', 'עם מי אנחנו עובדים?');
$clients_logos = sogo26_field('clients_logos', []);
?>

<!-- ============ פתיחה ============ -->
<section class="hero" data-hero>
    <?php if ($hero_video) : ?>
        <video class="hero__video" autoplay muted loop playsinline <?php echo $hero_poster ? 'poster="' . esc_url($hero_poster) . '"' : ''; ?>>
            <source src="<?php echo esc_url($hero_video); ?>">
        </video>
        <div class="hero__shade" aria-hidden="true"></div>
    <?php endif; ?>

    <div class="hero__inner" data-hero-inner>
        <p class="hero__kicker"><?php echo esc_html($kicker); ?></p>
        <h1 class="hero__logo">
            <img src="<?php echo esc_url(SOGO26_URI . '/assets/img/logo-animated.svg'); ?>" alt="<?php echo esc_attr(get_bloginfo('name') ?: 'סוגו'); ?>" width="568" height="318">
        </h1>
    </div>

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

<!-- ============ מה אנחנו עושים ============ -->
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
                        $tag   = $link ? 'a' : 'div';
                        ?>
                        <<?php echo $tag; ?> class="svc-card svc-card--<?php echo esc_attr($color); ?>"<?php echo $link ? ' href="' . esc_url($link) . '"' : ''; ?>>
                            <span class="svc-card__media">
                                <?php if (!empty($item['image']['url'])) : ?>
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="" loading="lazy">
                                <?php else : ?>
                                    <i class="svc-card__dot" aria-hidden="true"></i>
                                <?php endif; ?>
                            </span>
                            <span class="svc-card__title"><?php echo esc_html($item['title'] ?? ''); ?></span>
                            <span class="svc-card__text"><?php echo esc_html($item['text'] ?? ''); ?></span>
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
            <?php if (!empty($clients_logos)) : foreach ($clients_logos as $logo) : ?>
                <li class="clients__item">
                    <img src="<?php echo esc_url($logo['sizes']['medium'] ?? $logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: $logo['title']); ?>" loading="lazy">
                </li>
            <?php endforeach; else : for ($i = 0; $i < 8; $i++) : ?>
                <li class="clients__item clients__item--placeholder" aria-hidden="true"><span>לוגו לקוח</span></li>
            <?php endfor; endif; ?>
        </ul>
    </div>
</section>

<?php
get_footer();
