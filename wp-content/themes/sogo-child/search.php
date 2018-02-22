<?php
if(isset($_GET['post_type'])){
    switch($_GET['post_type']){
        case "plugin":
            include('archive-plugin.php');
            break;
        default:
            include('home.php');
            break;
    }
}