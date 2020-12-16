<?php // Template Name: methodology page ?>
<?php get_header() ?>

<?php if (sogo_meta('section-1-bg-mobile')): ?>
    <style>

         .bg-red{
            background: <?php echo sogo_meta('color-1')?>;
         }
         .bg-green{
             background: <?php echo sogo_meta('color-2')?>;
         }
        <?php for ($i = 1 ;$i <= 9; $i++) : ?>
        #methodology-floor-<?php echo $i ?> {
            background-image: url("<?php echo sogo_meta('section-'.$i.'-bg-mobile')?>");
        }

        <?php endfor; ?>
        @media (min-width: 992px) {
        <?php for ($i = 1 ;$i <= 9; $i++) :?>
            #methodology-floor-<?php echo $i ?> {
                background-image: url("<?php echo sogo_meta('section-'.$i.'-bg')?>");
            }


        <?php endfor; ?>
        }


    </style>
<?php endif; ?>
<section id="methodology-floor-1" class="section floor cover <?php sogo_extra_class('section-1-align') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <header class="page-header mobile-middle">
                    <h1 class="page-title color-white"><?php the_title() ?></h1>

                    <h2 class="page-sub-title color-white">
                        <?php echo sogo_meta('sub_title') ?>
                    </h2>
                </header>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #methodology-floor-1 -->
<?php if('on' !== sogo_meta('section-2-hide')): ?>
<section id="methodology-floor-2" class="section floor cover <?php sogo_extra_class('section-2-align') ?>">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-5 col-md-offset-1 text-center">
                <header class="floor-header">
                    <h2 class="page-title floor-title text-left"><?php echo sogo_meta('section-2-title') ?></h2>

                    <p class="text-left">
                        <?php echo nl2br(sogo_meta('section-2-text')) ?>
                    </p>

                </header>
                <div class="cool-effect bg-red full-radius animated grow hidden-xs hidden-sm">
                    <span class="bold uppercase"><?php _e('nice', 'sogoc') ?></span>
                    <span><?php _e('to meet', 'sogoc') ?></span>
                    <span class="bold uppercase"><?php _e('you', 'sogoc') ?></span>
                </div>
                <div id="e1" class="circle bg-green full-radius animated grow hidden-xs hidden-sm">
                    <span class="bold uppercase"></span>
                </div>
                <div id="e2" class="circle bg-red full-radius animated grow hidden-xs hidden-sm">
                    <span class="bold uppercase"></span>
                </div>
                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- #methodology-floor-2 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-3-hide')): ?>
<section id="methodology-floor-3" class="section floor cover <?php sogo_extra_class('section-3-align') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="cool-effect bg-green full-radius animated grow hidden-xs hidden-sm">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/bulp.png" alt="sogo methodology">
            </div>
            <div id="e3" class="circle bg-green full-radius animated grow hidden-xs hidden-sm hidden-md">
                <span class="bold uppercase"></span>
            </div>
            <div class="col-md-5 col-md-offset-6">
                <header class="page-header">
                    <h2 class="page-title floor-title text-right"><?php echo sogo_meta('section-3-title') ?></h2>

                    <p class="text-right">
                        <?php echo nl2br(sogo_meta('section-3-text')) ?>
                    </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-3 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-4-hide')): ?>
<section id="methodology-floor-4" class="dark-mask section floor cover <?php sogo_extra_class('section-4-align') ?>">
    <div class="container-fluid">
        <div class="cool-effect bg-red full-radius animated grow hidden-xs hidden-sm hidden-md">
            <span class="bold uppercase"><?php _e('what we need?', 'sogoc') ?></span>
        </div>
        <div id="e5" class="circle bg-green full-radius animated grow hidden-xs hidden-sm hidden-md">
            <span class="bold uppercase"></span>
        </div>
        <div id="e6" class="circle bg-red full-radius animated grow hidden-xs hidden-sm hidden-md">
            <span class="bold uppercase"></span>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header page-header">
                    <h1 class="floor-title text-center color-white"><?php echo sogo_meta('section-4-title') ?></h1>

                    <p class="text-center color-white">
                        <?php echo nl2br(sogo_meta('section-4-text')) ?>
                    </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-4 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-5-hide')): ?>
<section id="methodology-floor-5" class="dark-mask section floor cover <?php sogo_extra_class('section-5-align') ?>">
    <div class="container-fluid">
        <div class="cool-effect bg-red full-radius animated grow hidden-xs hidden-sm hidden-md">
            <span class="bold uppercase"><?php _e('how to do that?', 'sogoc') ?></span>
        </div>
        <div id="e4" class="circle bg-green full-radius animated grow hidden-xs hidden-sm hidden-md">
            <span class="bold uppercase"></span>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header page-header">
                    <h1 class="floor-title margin-top-25 color-white"><?php echo sogo_meta('section-5-title') ?></h1>

                    <p class="color-white">
                        <?php echo nl2br(sogo_meta('section-5-text')) ?>
                    </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-5 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-6-hide')): ?>
<section id="methodology-floor-6" class="dark-mask section floor cover <?php sogo_extra_class('section-6-align') ?>">
    <div class="container-fluid">
        <div class="cool-effect bg-red full-radius animated grow hidden-xs hidden-sm">
            <span class="bold uppercase"><?php _e('how to create it?', 'sogoc') ?></span>
        </div>
        <div id="e7" class="circle bg-green full-radius animated grow hidden-xs hidden-sm">
            <span class="bold uppercase"></span>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header page-header">
                    <h1 class="floor-title"><?php echo sogo_meta('section-6-title') ?></h1>

                    <p class="width-50">
                        <?php echo nl2br(sogo_meta('section-6-text')) ?>                 </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-6 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-7-hide')): ?>
<section id="methodology-floor-7" class="dark-mask section floor cover <?php sogo_extra_class('section-7-align') ?>">
    <div class="container-fluid">
        <div class="cool-effect bg-green full-radius animated grow hidden-xs hidden-sm">
            <span class="bold uppercase"><?php _e('how to objectify it?', 'sogoc') ?></span>
        </div>
        <div id="e8" class="circle bg-green full-radius animated grow hidden-xs hidden-sm">
            <span class="bold uppercase"></span>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header page-header">
                    <h1 class="floor-title color-white"><?php echo sogo_meta('section-7-title') ?></h1>

                    <p class="width-50 color-white ">
                        <?php echo nl2br(sogo_meta('section-7-text')) ?>                  </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-7 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-8-hide')): ?>
<section id="methodology-floor-8" class="section floor cover <?php sogo_extra_class('section-8-align') ?>">
    <div class="container-fluid">
        <div id="user-1">
            <div class="cool-effect-user bg-green  animated fadeInLeft hidden-xs hidden-sm">
                <div class="user-wrapper">
                    <span class="comment bold uppercase bg-green animated pulse infinite hidden-xs hidden-sm">*</span>
                    <img class="float-left full-radius"
                         src="<?php echo get_stylesheet_directory_uri() ?>/images/user-1.png" alt="sogo methodology">

                    <div class="user-text-wrapper">
                        <span class="user-name bold uppercase"><?php _e('client:', 'sogoc') ?></span>
                        <span class="user-text weight-100"><?php _e('Too large banner', 'sogoc') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="user-2">
            <div class="cool-effect-user bg-red animated fadeInLeft second-user hidden-xs hidden-sm">
                <div class="user-wrapper">
                    <img class="float-right full-radius"
                         src="<?php echo get_stylesheet_directory_uri() ?>/images/user-2.png" alt="sogo methodology">

                    <div class="user-text-wrapper">
                        <span class="user-name bold uppercase"><?php echo sogo_meta('section-8-title') ?></span>
                        <span class="user-text weight-100"><?php _e('Done :)', 'sogoc') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="user-3">
            <div class="cool-effect-user bg-green  animated fadeInRight hidden-xs hidden-sm">
                <div class="user-wrapper">
                    <span class="comment bold uppercase bg-green animated pulse infinite">*</span>
                    <img class="float-left full-radius"
                         src="<?php echo get_stylesheet_directory_uri() ?>/images/user-3.png" alt="sogo methodology">

                    <div class="user-text-wrapper">
                        <span class="user-name bold uppercase"><?php _e('client:', 'sogoc') ?></span>
                        <span class="user-text weight-100"><?php _e('Face link error', 'sogoc') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="user-4">
            <div class="cool-effect-user bg-red animated fadeInRight second-user hidden-xs hidden-sm">
                <div class="user-wrapper">
                    <img class="float-right full-radius"
                         src="<?php echo get_stylesheet_directory_uri() ?>/images/user-4.png" alt="sogo methodology">

                    <div class="user-text-wrapper">
                        <span class="user-name bold uppercase"><?php _e('QA:', 'sogoc') ?></span>
                        <span class="user-text weight-100"><?php _e('Checking', 'sogoc') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header page-header">
                    <h2 class="floor-title"><?php echo sogo_meta('section-8-title') ?></h2>

                    <p class="width-50">
                        <?php echo nl2br(sogo_meta('section-8-text')) ?>                  </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-8 -->
<?php endif; ?>
<?php if('on' !== sogo_meta('section-9-hide')): ?>
<section id="methodology-floor-9" class="section floor <?php sogo_extra_class('section-9-align') ?>">
    <div class="container-fluid">
        <div class="cool-effect animated slideInLeft hidden-xs hidden-sm">
            <span class=""><img src="<?php echo get_stylesheet_directory_uri() ?>/images/car.png"
                                alt="sogo methodology"></span>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="floor-header page-header">
                    <h2 class="floor-title"><?php echo sogo_meta('section-9-title') ?></h2>

                    <p class="width-50">
                        <?php echo nl2br(sogo_meta('section-9-text')) ?>
                    </p>
                </header>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section><!-- #methodology-floor-9 -->
<?php endif; ?>

<?php get_footer() ?>
