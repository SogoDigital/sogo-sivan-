<?php
$template =  get_field('_sogo_template');


if(!$template ||$template === 'single-project.php' ){
    $template = 'template-single-1.php';
}


 include $template;