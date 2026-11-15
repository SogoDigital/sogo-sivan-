<?php
/**
 * שדות העריכה בעברית (ACF Pro).
 *
 * מבנה העריכה: לשוניות עליונות, ובכל אזור חוזר (שקופיות, שירותים, לקוחות, שאלות)
 * טבלה עם עמודות. השדות מוגדרים בקוד ולכן נשמרים ב-git ולא נעלמים אם מסד הנתונים מתחלף.
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

    $tab = function ($key, $label) {
        return ['key' => $key, 'label' => $label, 'type' => 'tab', 'placement' => 'top'];
    };

    /* ------------------------------------------------------------------
     * הגדרות האתר (כותרת עליונה, תחתית, רשתות, יצירת קשר)
     * ------------------------------------------------------------------ */
    acf_add_local_field_group([
        'key'      => 'group_sogo26_settings',
        'title'    => 'הגדרות האתר',
        'location' => [[['param' => 'options_page', 'operator' => '==', 'value' => 'sogo-settings']]],
        'fields'   => [
            $tab('field_s26_tab_header', 'כותרת עליונה'),
            ['key' => 'field_s26_cta_text', 'name' => 'header_cta_text', 'label' => 'טקסט הכפתור בכותרת', 'type' => 'text', 'default_value' => 'בואו נדבר', 'instructions' => 'הכפתור בכרטיס הלבן בראש הדף.'],
            ['key' => 'field_s26_cta_url', 'name' => 'header_cta_url', 'label' => 'קישור הכפתור', 'type' => 'url', 'instructions' => 'למשל קישור לעמוד "צור קשר". אם ריק, הכפתור מוביל לתחתית הדף.'],

            $tab('field_s26_tab_contact', 'פרטי יצירת קשר'),
            ['key' => 'field_s26_email', 'name' => 'contact_email', 'label' => 'אימייל', 'type' => 'email'],
            ['key' => 'field_s26_phone', 'name' => 'contact_phone', 'label' => 'טלפון', 'type' => 'text', 'instructions' => 'כפי שיוצג באתר, למשל 03-1234567.'],
            ['key' => 'field_s26_tagline', 'name' => 'footer_tagline', 'label' => 'משפט בתחתית', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'אנחנו בונים אתרים, קמפיינים ומותגים שקשה להתעלם מהם.'],
            ['key' => 'field_s26_footer_bg', 'name' => 'footer_bg', 'label' => 'תמונת רקע לתחתית', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'מומלץ תמונה כהה ורחבה. אם ריק, הרקע יהיה כהה אחיד.'],

            $tab('field_s26_tab_texts', 'טקסטים כלליים'),
            ['key' => 'field_s26_t_copy', 'name' => 'text_copyright', 'label' => 'שורת זכויות יוצרים בתחתית', 'type' => 'text', 'default_value' => '© {year} סוגו', 'instructions' => 'אפשר לכתוב {year} והשנה תתעדכן אוטומטית.'],
            ['key' => 'field_s26_t_priv', 'name' => 'text_privacy', 'label' => 'טקסט הקישור למדיניות פרטיות', 'type' => 'text', 'default_value' => 'מדיניות פרטיות'],
            ['key' => 'field_s26_t_menu', 'name' => 'text_menu', 'label' => 'שם כפתור התפריט (לקורא מסך)', 'type' => 'text', 'default_value' => 'תפריט'],
            ['key' => 'field_s26_t_skip', 'name' => 'text_skip', 'label' => 'קישור "דלג לתוכן" (לנגישות)', 'type' => 'text', 'default_value' => 'דלג לתוכן'],
            ['key' => 'field_s26_t_blog', 'name' => 'text_blog_title', 'label' => 'כותרת עמוד הבלוג', 'type' => 'text', 'default_value' => 'הבלוג'],
            ['key' => 'field_s26_t_search', 'name' => 'text_search_title', 'label' => 'כותרת תוצאות חיפוש', 'type' => 'text', 'default_value' => 'תוצאות חיפוש', 'instructions' => 'אחריה יופיע מונח החיפוש.'],
            ['key' => 'field_s26_t_prev', 'name' => 'text_prev', 'label' => 'כפתור "הקודם" (מעבר בין עמודים)', 'type' => 'text', 'default_value' => 'הקודם'],
            ['key' => 'field_s26_t_next', 'name' => 'text_next', 'label' => 'כפתור "הבא" (מעבר בין עמודים)', 'type' => 'text', 'default_value' => 'הבא'],
            ['key' => 'field_s26_t_empty', 'name' => 'text_no_posts', 'label' => 'הודעה כשאין תוכן להצגה', 'type' => 'text', 'default_value' => 'לא נמצא תוכן להצגה.'],
            ['key' => 'field_s26_t_404', 'name' => 'text_404_title', 'label' => 'כותרת עמוד שגיאה 404', 'type' => 'text', 'default_value' => 'העמוד שחיפשתם לא נמצא.'],
            ['key' => 'field_s26_t_404b', 'name' => 'text_404_button', 'label' => 'כפתור בעמוד שגיאה 404', 'type' => 'text', 'default_value' => 'חזרה לעמוד הבית'],

            $tab('field_s26_tab_fx', 'אפקטים'),
            ['key' => 'field_s26_preloader', 'name' => 'preloader_on', 'label' => 'מסך טעינה', 'type' => 'true_false', 'ui' => 1, 'default_value' => 1, 'ui_on_text' => 'פעיל', 'ui_off_text' => 'כבוי', 'instructions' => 'לוגו ומונה אחוזים שמוצגים בכניסה לאתר, פעם אחת בכל ביקור.'],
            ['key' => 'field_s26_footer_video', 'name' => 'footer_video', 'label' => 'וידאו לתחתית (נשלט בגלילה)', 'type' => 'file', 'return_format' => 'url', 'mime_types' => 'mp4,webm', 'instructions' => 'הווידאו מתקדם קדימה ואחורה לפי הגלילה. מומלץ וידאו קצר (5-10 שניות), בלי קול, עד כ-6MB. אם ריק, מוצגת תמונת הרקע.'],

            $tab('field_s26_tab_social', 'רשתות חברתיות'),
            ['key' => 'field_s26_facebook', 'name' => 'social_facebook', 'label' => 'פייסבוק', 'type' => 'url'],
            ['key' => 'field_s26_instagram', 'name' => 'social_instagram', 'label' => 'אינסטגרם', 'type' => 'url'],
            ['key' => 'field_s26_linkedin', 'name' => 'social_linkedin', 'label' => 'לינקדאין', 'type' => 'url'],
            ['key' => 'field_s26_whatsapp', 'name' => 'social_whatsapp', 'label' => 'וואטסאפ', 'type' => 'url', 'instructions' => 'קישור מהצורה https://wa.me/972501234567'],
        ],
    ]);

    /* ------------------------------------------------------------------
     * דף הבית: לשוניות עליונות, אזורים חוזרים כטבלאות
     * ------------------------------------------------------------------ */
    acf_add_local_field_group([
        'key'      => 'group_sogo26_home',
        'title'    => 'דף הבית',
        'location' => [[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']]],
        'fields'   => [

            /* ===== אזור פתיחה (סליידר: וידאו או תמונה) ===== */
            $tab('field_h26_tab_hero', 'אזור פתיחה'),
            ['key' => 'field_h26_help', 'type' => 'message', 'label' => 'איך עורכים את דף הבית', 'esc_html' => 0, 'new_lines' => 'wpautop',
             'message' => 'כל טקסט, כותרת, כפתור, תמונה וסרטון בדף נערכים כאן. בחרו לשונית למעלה (פתיחה, אודות, שירותים, לקוחות, שאלות, תוכן חופשי), שנו ולחצו <strong>עדכון</strong> בצד. טלפון, אימייל, כפתור הכותרת והתחתית נמצאים בתפריט <strong>הגדרות האתר</strong>. התפריט הראשי נערך ב<strong>מראה ← תפריטים</strong>.'],
            ['key' => 'field_h26_hero_logo', 'name' => 'hero_show_logo', 'label' => 'להציג את הלוגו המונפש מעל השקופיות', 'type' => 'true_false', 'ui' => 1, 'default_value' => 1, 'ui_on_text' => 'כן', 'ui_off_text' => 'לא'],
            ['key' => 'field_h26_hero_seconds', 'name' => 'hero_seconds', 'label' => 'כמה שניות כל שקופית (כשיש יותר מאחת)', 'type' => 'number', 'default_value' => 7, 'min' => 3, 'max' => 30],
            [
                'key' => 'field_h26_hero_slides', 'name' => 'hero_slides', 'label' => 'שקופיות', 'type' => 'repeater',
                'layout' => 'table', 'button_label' => 'הוספת שקופית', 'min' => 0,
                'instructions' => 'כל שורה היא שקופית במסך מלא: וידאו או תמונה. אם אין שקופיות, מוצג רקע זז עם הלוגו.',
                'sub_fields' => [
                    ['key' => 'field_h26_hs_type', 'name' => 'type', 'label' => 'סוג', 'type' => 'select', 'choices' => ['image' => 'תמונה', 'video' => 'וידאו'], 'default_value' => 'image', 'ui' => 0],
                    ['key' => 'field_h26_hs_video', 'name' => 'video', 'label' => 'וידאו (MP4)', 'type' => 'file', 'return_format' => 'url', 'mime_types' => 'mp4,webm', 'instructions' => 'עד כ-8MB, בלי קול.',
                        'conditional_logic' => [[['field' => 'field_h26_hs_type', 'operator' => '==', 'value' => 'video']]]],
                    ['key' => 'field_h26_hs_image', 'name' => 'image', 'label' => 'תמונה (במחשב)', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail'],
                    ['key' => 'field_h26_hs_image_m', 'name' => 'image_mobile', 'label' => 'תמונה בנייד', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail'],
                    ['key' => 'field_h26_hs_title', 'name' => 'title', 'label' => 'כותרת', 'type' => 'text'],
                    ['key' => 'field_h26_hs_sub', 'name' => 'subtitle', 'label' => 'תת-כותרת', 'type' => 'text'],
                    ['key' => 'field_h26_hs_btn', 'name' => 'button_text', 'label' => 'טקסט הכפתור', 'type' => 'text'],
                    ['key' => 'field_h26_hs_link', 'name' => 'button_link', 'label' => 'קישור הכפתור', 'type' => 'url'],
                ],
            ],
            ['key' => 'field_h26_kicker', 'name' => 'hero_kicker', 'label' => 'כותרת קטנה מעל הלוגו', 'type' => 'text', 'default_value' => 'סוכנות דיגיטל'],
            ['key' => 'field_h26_scroll', 'name' => 'hero_scroll_text', 'label' => 'טקסט "גלול"', 'type' => 'text', 'default_value' => 'גללו למטה'],

            /* ===== אודות ===== */
            $tab('field_h26_tab_about', 'אודות (משפט גדול)'),
            ['key' => 'field_h26_about_label', 'name' => 'about_label', 'label' => 'כותרת קטנה', 'type' => 'text', 'default_value' => 'סוכנות דיגיטל לבניית אתרים, קמפיינים ומיתוג'],
            ['key' => 'field_h26_about_text', 'name' => 'about_text', 'label' => 'המשפט הגדול', 'type' => 'textarea', 'rows' => 4, 'default_value' => 'שלום, *אנחנו סוגו.* אנחנו בונים אתרים, מנהלים קמפיינים ויוצרים מותגים שאי אפשר להתעלם מהם.', 'instructions' => 'המשפט נחשף מילה אחרי מילה בגלילה. כדי להדגיש מילים באדום, הקיפו אותן בכוכביות, למשל: שלום, *אנחנו סוגו.*'],

            /* ===== שירותים (כרטיסים: תמונה + שם + קישור) ===== */
            $tab('field_h26_tab_services', 'שירותים'),
            ['key' => 'field_h26_services_title', 'name' => 'services_title', 'label' => 'כותרת האזור', 'type' => 'textarea', 'rows' => 2, 'default_value' => "אנחנו יוצרים אתרים וקמפיינים\nשקשה להתעלם מהם.", 'instructions' => 'אפשר לרדת שורה בלחיצה על Enter.'],
            ['key' => 'field_h26_services_image', 'name' => 'services_image', 'label' => 'תמונה גדולה בצד', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'נשארת במקום בזמן שהכרטיסים זזים. מומלץ תמונה אנכית.'],
            [
                'key' => 'field_h26_services_items', 'name' => 'services_items', 'label' => 'כרטיסי השירותים', 'type' => 'repeater',
                'layout' => 'table', 'button_label' => 'הוספת שירות', 'min' => 0,
                'instructions' => 'כל כרטיס מציג תמונה עם שם השירות. לחיצה עליו פותחת את עמוד השירות.',
                'sub_fields' => [
                    ['key' => 'field_h26_si_image', 'name' => 'image', 'label' => 'תמונה', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail'],
                    ['key' => 'field_h26_si_title', 'name' => 'title', 'label' => 'שם השירות', 'type' => 'text'],
                    ['key' => 'field_h26_si_link', 'name' => 'link', 'label' => 'קישור לעמוד השירות', 'type' => 'url'],
                    ['key' => 'field_h26_si_color', 'name' => 'color', 'label' => 'צבע (כשאין תמונה)', 'type' => 'select', 'choices' => ['red' => 'אדום', 'green' => 'ירוק', 'yellow' => 'צהוב', 'orange' => 'כתום', 'magenta' => 'מג׳נטה', 'purple' => 'סגול', 'blue' => 'תכלת'], 'default_value' => 'red', 'ui' => 0],
                ],
            ],

            /* ===== לקוחות ===== */
            $tab('field_h26_tab_clients', 'לקוחות'),
            ['key' => 'field_h26_clients_title', 'name' => 'clients_title', 'label' => 'כותרת האזור', 'type' => 'text', 'default_value' => 'עם מי אנחנו עובדים?'],
            [
                'key' => 'field_h26_clients_logos', 'name' => 'clients_logos', 'label' => 'לוגואים של לקוחות', 'type' => 'repeater',
                'layout' => 'table', 'button_label' => 'הוספת לקוח', 'min' => 0,
                'instructions' => 'מומלץ לוגואים כהים על רקע שקוף (PNG או SVG).',
                'sub_fields' => [
                    ['key' => 'field_h26_cl_logo', 'name' => 'logo', 'label' => 'לוגו', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail'],
                    ['key' => 'field_h26_cl_name', 'name' => 'name', 'label' => 'שם הלקוח', 'type' => 'text'],
                    ['key' => 'field_h26_cl_link', 'name' => 'link', 'label' => 'קישור (לא חובה)', 'type' => 'url'],
                ],
            ],

            /* ===== תמונה במסך מלא (מתרחבת בגלילה) ===== */
            $tab('field_h26_tab_zoom', 'תמונה במסך מלא'),
            ['key' => 'field_h26_zoom_image', 'name' => 'zoom_image', 'label' => 'תמונה', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'תמונה רחבה. בגלילה היא מתרחבת ממסגרת קטנה למסך מלא. אם ריק, האזור לא מוצג.'],
            ['key' => 'field_h26_zoom_title', 'name' => 'zoom_title', 'label' => 'כותרת על התמונה', 'type' => 'text'],
            ['key' => 'field_h26_zoom_text', 'name' => 'zoom_text', 'label' => 'טקסט על התמונה', 'type' => 'text'],

            /* ===== מספרים (רצים מאפס) ===== */
            $tab('field_h26_tab_stats', 'מספרים'),
            ['key' => 'field_h26_stats_title', 'name' => 'stats_title', 'label' => 'כותרת (לא חובה)', 'type' => 'text'],
            [
                'key' => 'field_h26_stats_items', 'name' => 'stats_items', 'label' => 'מספרים', 'type' => 'repeater',
                'layout' => 'table', 'button_label' => 'הוספת מספר', 'min' => 0,
                'instructions' => 'המספר "רץ" מאפס כשמגיעים אליו בגלילה. אם אין שורות, האזור לא מוצג.',
                'sub_fields' => [
                    ['key' => 'field_h26_st_num', 'name' => 'number', 'label' => 'מספר', 'type' => 'number', 'step' => 'any'],
                    ['key' => 'field_h26_st_prefix', 'name' => 'prefix', 'label' => 'לפני המספר', 'type' => 'text', 'instructions' => 'למשל ₪'],
                    ['key' => 'field_h26_st_suffix', 'name' => 'suffix', 'label' => 'אחרי המספר', 'type' => 'text', 'instructions' => 'למשל + או %'],
                    ['key' => 'field_h26_st_label', 'name' => 'label', 'label' => 'כיתוב', 'type' => 'text'],
                ],
            ],

            /* ===== שאלות נפוצות ===== */
            $tab('field_h26_tab_faq', 'שאלות נפוצות'),
            ['key' => 'field_h26_faq_title', 'name' => 'faq_title', 'label' => 'כותרת האזור', 'type' => 'text', 'default_value' => 'שאלות נפוצות'],
            [
                'key' => 'field_h26_faq_items', 'name' => 'faq_items', 'label' => 'שאלות ותשובות', 'type' => 'repeater',
                'layout' => 'table', 'button_label' => 'הוספת שאלה', 'min' => 0,
                'instructions' => 'השאלות נפתחות בלחיצה, ומוגדרות גם לגוגל כך שיוכלו להופיע בתוצאות החיפוש.',
                'sub_fields' => [
                    ['key' => 'field_h26_fq_q', 'name' => 'question', 'label' => 'שאלה', 'type' => 'text'],
                    ['key' => 'field_h26_fq_a', 'name' => 'answer', 'label' => 'תשובה', 'type' => 'textarea', 'rows' => 3],
                ],
            ],

            /* ===== תוכן חופשי ===== */
            $tab('field_h26_tab_editor', 'תוכן חופשי'),
            ['key' => 'field_h26_ed_title', 'name' => 'editor_title', 'label' => 'כותרת', 'type' => 'text'],
            ['key' => 'field_h26_ed_content', 'name' => 'editor_content', 'label' => 'תוכן', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 1, 'instructions' => 'טקסט חופשי בסוף הדף, למשל תוכן לקידום אורגני.'],
        ],
    ]);
});
