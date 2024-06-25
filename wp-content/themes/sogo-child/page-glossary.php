<?php
// Template Name: Glossary page
$rtl = is_rtl();
?>
<?php get_header() ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<main class="container-fluid py-3 py-lg-5" style="margin-top: 72px">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <h1 class="h2 text-center text-color-1 font-weight-bold mb-2 uppercase"><?php the_title(); ?></h1>
        </div>
    </div>
    <?php $alphas = ($rtl) ? array_map('utfChr', range(utfOrd('א'), utfOrd('ת'))) : range('a', 'z');?>
    <div class="row justify-content-center glossary-intro py-3">
        <div class="col-12 text-center shortcuts <?php echo ($rtl) ? 'rtl' : '' ?>">
            <?php foreach ($alphas as $alpha){ ?>
                <?php if ($alpha === 'ך' || $alpha === 'ן' || $alpha === 'ף' || $alpha === 'ץ' || $alpha === 'ם'):
                    continue;
                endif; ?>
                <a class="h4 p-1 mx-1 mb-0" href="#<?php echo $alpha;?>">
                    <span class="uppercase">
                        <?php echo $alpha;?>
                    </span>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 py-2 p-lg-0">
            <input id="search-criteria" class="text-color-1 w-100 outline-none bg-white border-2 border-color-4 mb-3 my-lg-4 py-1 px-2" type="text" value="" placeholder="<?php echo get_field('_sogo_topsearch_placeholder', 'option') ?>" />
        </div>
    </div>
    <div class="row justify-content-center align-items-center flex-row">
        <div class="col-12 col-lg-6 py-2 p-lg-0">
            <?php
            $glossary = get_field('_sogo_glossary');
            foreach( $glossary as $letter => $repeater ){

                $order = array();
                foreach( $repeater as $i => $row ) {
                    $order[ $i ] = $row['title'];
                }
//                var_dump($order);
                array_multisort( $order, SORT_ASC, $repeater );
                if( $repeater ):?>
                    <div id="<?php echo $letter ?>" class="glossary-block">
                        <p class="glossary-letter uppercase mb-3"><?php echo $letter;?></p>
                        <?php foreach( $repeater as $i => $row ): ?>
                            <div id="<?php echo $row['title'] ?>" class="glossary-block-item border-color-4 border-1 p-3">
                                <h4 class="mb-2 purple font-weight-medium"><?php echo $row['title']?></h4>
                                <div><?php echo $row['text']?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif;
            } ?>
            <div class="no-match">No Matches</div>
        </div>
    </div>
</main>

<script>

    let $ = jQuery;
    var stickyNavTop = $('.glossary-intro').offset().top;
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop();
        if (scrollTop > stickyNavTop-90) {
            $('.glossary-intro').addClass('sticky');
        } else {
            $('.glossary-intro').removeClass('sticky');
        }
    };
    stickyNav();
    $(window).scroll(function() {
        stickyNav();
    });

    $(document).ready(function () {
        $('.shortcuts a').click(function () {
            $('.glossary-block-item').show();
            $('.glossary-letter').show();
            $('#search-criteria').val('');
            $('.shortcuts a').removeClass('active-letter');
            $(this).addClass('active-letter');
        })
    })

    $('.glossary-block-item').each(function() {
        $(this).attr('data-search-term', $(this).find('h4').text().toLowerCase());
    });

    $('#search-criteria').on('keyup', function() {

        var searchTerm = $(this).val().toLowerCase();

        $('.glossary-block-item').hide();
        $('.glossary-letter').hide();

        if (searchTerm) {
            var matches = $('.glossary-block-item').filter('[data-search-term *= ' + searchTerm + ']');
            console.log(matches)
            $('.no-match').toggle(matches.length == 0)
            matches.show();
            matches.parent().find('.glossary-letter').show();
        }else {
            $('.glossary-block-item').show();
            $('.glossary-letter').show();
        }
    });

</script>
<style>
    .no-match {
        display: none;
    }
</style>

<?php get_footer() ?>
