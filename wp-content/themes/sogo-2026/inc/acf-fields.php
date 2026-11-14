<?php
/**
 * שדות העריכה בעברית (ACF Pro).
 *
 * השדות מוגדרים כאן בקוד ולכן נשמרים ב-git ולא נעלמים אם מסד הנתונים מתחלף.
 * כל שדה מקבל ערך ברירת מחדל בתבנית, כך שהאתר נראה תקין גם לפני שמילאו אותם.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** עמוד אפשרויות: "הגדרות האתר" בתפריט הצד של לוח הבקרה. */
add_action('acf/init', function () {
    if (!function_exists('acf_add_options_page')) {
        return;
    }
    acf_add_options_page([
        'page_title' => 'הגדרות האתר',
        'menu_title' => 'הגדרות האתר',
        'menu_slug'  => 'sogo-settings',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-admin-generic',
        'position'   => 3,
        'redirect'   => false,
    ]);
});

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    /* ------------------------------------------------------------------
     * הגדרות האתר (כותרת עליונה, תחתית, רשתות, יצירת קשר)
     * ------------------------------------------------------------------ */
    acf_add_local_field_group([
        'key'      => 'group_sogo26_settings',
        'title'    => 'הגדרות האתר',
        'location' => [[['param' => 'options_page', 'operator' => '==', 'value' => 'sogo-settings']]],
        'fields'   => [
            ['key' => 'field_s26_tab_header', 'label' => 'כותרת עליונה', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_s26_cta_text', 'name' => 'header_cta_text', 'label' => 'טקסט הכפתור בכותרת', 'type' => 'text', 'default_value' => 'בואו נדבר', 'instructions' => 'הכפתור בכרטיס הלבן בראש הדף.'],
            ['key' => 'field_s26_cta_url', 'name' => 'header_cta_url', 'label' => 'קישור הכפתור', 'type' => 'url', 'instructions' => 'למשל קישור לעמוד "צור קשר". אם ריק, הכפתור מוביל לתחתית הדף.'],

            ['key' => 'field_s26_tab_contact', 'label' => 'פרטי יצירת קשר', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_s26_email', 'name' => 'contact_email', 'label' => 'אימייל', 'type' => 'email'],
            ['key' => 'field_s26_phone', 'name' => 'contact_phone', 'label' => 'טלפון', 'type' => 'text', 'instructions' => 'כפי שיוצג באתר, למשל 03-1234567.'],
            ['key' => 'field_s26_tagline', 'name' => 'footer_tagline', 'label' => 'משפט בתחתית', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'אנחנו בונים אתרים, קמפיינים ומותגים שקשה להתעלם מהם.'],
            ['key' => 'field_s26_footer_bg', 'name' => 'footer_bg', 'label' => 'תמונת רקע לתחתית', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'מומלץ תמונה כהה ורחבה. אם ריק, הרקע יהיה כהה אחיד.'],

            ['key' => 'field_s26_tab_social', 'label' => 'רשתות חברתיות', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_s26_facebook', 'name' => 'social_facebook', 'label' => 'פייסבוק', 'type' => 'url'],
            ['key' => 'field_s26_instagram', 'name' => 'social_instagram', 'label' => 'אינסטגרם', 'type' => 'url'],
            ['key' => 'field_s26_linkedin', 'name' => 'social_linkedin', 'label' => 'לינקדאין', 'type' => 'url'],
            ['key' => 'field_s26_whatsapp', 'name' => 'social_whatsapp', 'label' => 'וואטסאפ', 'type' => 'url', 'instructions' => 'קישור מהצורה https://wa.me/972501234567'],
        ],
    ]);

    /* ------------------------------------------------------------------
     * דף הבית
     * ------------------------------------------------------------------ */
    acf_add_local_field_group([
        'key'      => 'group_sogo26_home',
        'title'    => 'דף הבית',
        'location' => [[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']]],
        'fields'   => [

            // אזור פתיחה
            ['key' => 'field_h26_tab_hero', 'label' => 'אזור פתיחה', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_h26_kicker', 'name' => 'hero_kicker', 'label' => 'כותרת קטנה מעל הלוגו', 'type' => 'text', 'default_value' => 'סוכנות דיגיטל'],
            ['key' => 'field_h26_video', 'name' => 'hero_video', 'label' => 'וידאו רקע (MP4)', 'type' => 'file', 'return_format' => 'url', 'mime_types' => 'mp4,webm', 'instructions' => 'לא חובה. וידאו קצר וקל (עד כ-8MB), בלי קול. אם ריק, מוצג הלוגו המונפש.'],
            ['key' => 'field_h26_poster', 'name' => 'hero_poster', 'label' => 'תמונה לפני טעינת הווידאו', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium'],
            ['key' => 'field_h26_scroll', 'name' => 'hero_scroll_text', 'label' => 'טקסט "גלול"', 'type' => 'text', 'default_value' => 'גללו למטה'],

            // אודות
            ['key' => 'field_h26_tab_about', 'label' => 'אודות (משפט גדול)', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_h26_about_label', 'name' => 'about_label', 'label' => 'כותרת קטנה', 'type' => 'text', 'default_value' => 'סוכנות דיגיטל לבניית אתרים, קמפיינים ומיתוג'],
            ['key' => 'field_h26_about_text', 'name' => 'about_text', 'label' => 'המשפט הגדול', 'type' => 'textarea', 'rows' => 4, 'default_value' => 'שלום, *אנחנו סוגו.* אנחנו בונים אתרים, מנהלים קמפיינים ויוצרים מותגים שאי אפשר להתעלם מהם.', 'instructions' => 'המשפט נחשף מילה אחרי מילה בגלילה. כדי להדגיש מילים בצבע אדום, הקיפו אותן בכוכביות, למשל: שלום, *אנחנו סוגו.*'],

            // שירותים
            ['key' => 'field_h26_tab_services', 'label' => 'מה אנחנו עושים (שירותים)', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_h26_services_title', 'name' => 'services_title', 'label' => 'כותרת האזור', 'type' => 'textarea', 'rows' => 2, 'default_value' => "אנחנו יוצרים אתרים וקמפיינים\nשקשה להתעלם מהם.", 'instructions' => 'אפשר לרדת שורה בלחיצה על Enter.'],
            ['key' => 'field_h26_services_image', 'name' => 'services_image', 'label' => 'תמונה גדולה בצד', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'התמונה נשארת במקום בזמן שהכרטיסים זזים. מומלץ תמונה אנכית.'],
            [
                'key' => 'field_h26_services_items', 'name' => 'services_items', 'label' => 'כרטיסי השירותים', 'type' => 'repeater',
                'layout' => 'block', 'button_label' => 'הוספת שירות', 'min' => 0,
                'sub_fields' => [
                    ['key' => 'field_h26_si_title', 'name' => 'title', 'label' => 'שם השירות', 'type' => 'text'],
                    ['key' => 'field_h26_si_text', 'name' => 'text', 'label' => 'תיאור קצר', 'type' => 'textarea', 'rows' => 2],
                    ['key' => 'field_h26_si_image', 'name' => 'image', 'label' => 'תמונה או לוגו', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => 'לא חובה. אם ריק, הכרטיס מקבל עיגול צבעוני.'],
                    ['key' => 'field_h26_si_color', 'name' => 'color', 'label' => 'צבע הכרטיס', 'type' => 'select', 'choices' => ['red' => 'אדום', 'green' => 'ירוק', 'yellow' => 'צהוב', 'orange' => 'כתום', 'magenta' => 'מג׳נטה', 'purple' => 'סגול', 'blue' => 'תכלת'], 'default_value' => 'red'],
                    ['key' => 'field_h26_si_link', 'name' => 'link', 'label' => 'קישור (לא חובה)', 'type' => 'url'],
                ],
            ],

            // לקוחות
            ['key' => 'field_h26_tab_clients', 'label' => 'לקוחות', 'type' => 'tab', 'placement' => 'top'],
            ['key' => 'field_h26_clients_title', 'name' => 'clients_title', 'label' => 'כותרת האזור', 'type' => 'text', 'default_value' => 'עם מי אנחנו עובדים?'],
            ['key' => 'field_h26_clients_logos', 'name' => 'clients_logos', 'label' => 'לוגואים של לקוחות', 'type' => 'gallery', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => 'מומלץ לוגואים כהים על רקע שקוף (PNG או SVG).'],
        ],
    ]);
});
