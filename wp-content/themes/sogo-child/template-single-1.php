<?php
global $fullpage;
$fullpage = 'fullpage';
get_header();
the_post();
$bg = wp_is_mobile() ? sogo_meta('bg-mobile') : sogo_meta('bg');
$col = wp_is_mobile() ? 'col-md-12': 'col-md-4';
?>
    <section id="single-project-info-floor-1" class="section cover active vertical-middle"
             style="background-image: url('<?php echo $bg ?>')">
        <div class="container-fluid">
            <div class="row">
                <div class="<?php echo $col ?>">
                    <div class="project-info-wrapper">

                        <img src="<?php echo sogo_meta('image')?>"/>
                        <h1>
                            <?php the_title(); ?>
                        </h1>

                        <div class="entry-content">
                            <?php the_content() ?>
                        </div>
                        <?php if (wp_is_mobile()): ?>
                            <img src="<?php echo sogo_meta('image-mobile')?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-nav">
                        <!--                    @todo link btn to next and previews project-->

                        <?php echo sogo_loop_post_link(false, "btn-link margin previews-btn", '%link', '<i class="fa fa-angle-left"></i>' . __('previews project', 'sogoc')); ?>
                        <?php echo sogo_loop_post_link(true, "btn-link margin next-btn", '%link', __('next project', 'sogoc') . '<i class="fa fa-angle-right"></i>'); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer() ?>