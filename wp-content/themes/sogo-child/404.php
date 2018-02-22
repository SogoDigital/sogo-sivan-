<?php // Template Name: 404 page ?>
<?php get_header() ?>

<section id="error-floor-1" class="floor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <header class="page-header">
                    <h1 class="page-title color-green"><?php _e('Oops! No page found...','sogoc')?> </h1>

                    <h3 class="page-sub-title ">404</h3>
                </header>
                <div class="oval-speech"><p class="uppercase"><?php _e('please try again','sogoc')?></p></div>

                <!-- .page-header -->
            </div>
        </div>
    </div>
</section> <!-- 404-floor-1 -->




<footer id="customers-logos">
    <ul class="flex-slider">
        <?php
        $logos = sogo_meta('customers_logos');
        if ($logos) {
            foreach ($logos as $id => $logo) {
                echo "<li>";
                sogo_print_image($id, $logo);
                echo "</li>";
            }
        }
        ?>
    </ul>
</footer>






<?php get_footer() ?>
